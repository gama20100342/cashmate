<?php
App::uses('AppController', 'Controller');
App::import('Vendor', 'custom',	array('file' => 'tcpdf/custom.php'));

/**
 * Transloadcashes Controller
 *
 * @property Transloadcash $Transloadcash
 * @property PaginatorComponent $Paginator
 */
class TransloadcashesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
	
	
	public function getTransactions($cardno = null){
		
		$this->layout = 'ajax';
		$this->autoRender = false;
		$this->view = false;

		
		if($this->request->is('ajax')){
			if (!$this->checkCardExists($cardno)) {
				$response = array(
					'message' => 'Not found',
					'cardno'  => $cardno
				);
			}else{
				$trans = $this->Transloadcash->find('all', array(
						'conditions' => array(
							'Transloadcash.cardno' => $cardno
						),
						'order'		=> array(
							'Transloadcash.transdate' => 'DESC'
						),
					)
				);
				
				if($trans){
						$data = array();
					
						if(count($trans) > 0){
							$data = array();
							foreach($trans as $t):
								$data[] = array(
									$t['Transloadcash']['terminal_id'],
									date('Y M d h:i A', strtotime($t['Transloadcash']['transdate'])),									
									number_format($t['Transloadcash']['current_balance'], 2, ".", ","),	
									number_format($t['Transloadcash']['load_amount'], 2, ".", ","),									
									number_format($t['Transloadcash']['remaining_balance'], 2, ".", ","),
									$t['Status']['name']
								);
							endforeach;					
						}
					
						$response = array(
							'status' 	=> 200,
							'message' 	=> 'Success',
							'data'		=> $data
						);
						
				}else{
					$response = $this->Message->respMsg(400);
				}
				
			}
			
			echo json_encode($response);
		}
		
	}
	
	
	/*------------------
	| Get list of transaction
	| Reports
	------------------*/
	public function generate_pdf_report($date_from=null, $date_to=null){	
			$this->layout = 'pdf'; 
			//$pdf= new brbPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
			$pdf= new brbPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);			
			$this->set('pdf', $pdf);	
			$this->set('file_name', !empty($date_from) && !empty($date_to) ? 'Load_Cash_'.$date_from.'-'.$date_to : 'Load_Cash_'.date('Y-m-d'));
			$this->set('trans', $this->getListofTransactions($date_from, $date_to));
			$this->render();
	}
	
	public function generate_csv_report($date_from=null, $date_to=null){	
			$this->layout = 'pdf'; 
			$this->set('trans', $this->getListofTransactions($date_from, $date_to));
			$this->set('file_name', !empty($date_from) && !empty($date_to) ? 'Load_Cash_'.$date_from.'-'.$date_to : 'Load_Cash_'.date('Y-m-d'));
			$this->render();
	}
	
	
	private function getListofTransactions($date_from=null, $date_to=null){
			if(!empty($date_from) && !empty($date_to)){
					if($date_to > $date_from){
						$trans = $this->Transloadcash->find('all', 
							array(
								'conditions' => array(							
									'Transloadcash.transdate BETWEEN ? AND ?' => array(
										$date_from, $date_to
									)
								),															
								'order' => array(
									'Transloadcash.transdate' => 'DESC'
									)
							)							
						);
					}else{
						$trans = false;
					}
				}else{
					$trans = $this->Transloadcash->find('all', array(
							'order' => array(
								'Transloadcash.transdate' => 'DESC'
							)
						)
					);
				}
		
		return $trans;
	}
	
	/*------------------------
	| List of transactions
	| -----------------------*/
	
	
	public function getAllTransactions($date_from = null, $date_to=null){
		
		$this->layout = 'ajax';
		$this->autoRender = false;
		$this->view = false;

		
		if($this->request->is('ajax')){
				
				
				$trans = $this->getListofTransactions($date_from, $date_to);
				if($trans){
						$data = array();
					
						if(count($trans) > 0){
							$data = array();
							foreach($trans as $t):
								$data[] = array(
									$t['Transloadcash']['posimei'],
									$t['Transloadcash']['cardno'],
									$t['Transloadcash']['accountname'],
									date('Y M d h:i A', strtotime($t['Transloadcash']['transdate'])),																											
									$t['Transloadcash']['load_amount'],
									$t['Transloadcash']['processed_by'],
									$t['Status']['name']
								);
							endforeach;					
						}
					
						$response = array(
							'status' 	=> 200,
							'message' 	=> 'Success',
							'data'		=> $data
						);
						
				}else{
					$response = $this->Message->respMsg(400);
				}
		
			echo json_encode($response);
		}		
	}
	
	
	private function checkCardExists($cardno){		
		if(!$this->Transloadcash->Card->findByCardno($cardno)){
			return false;
		}else{
			return true;
		}				
	}
	
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Transloadcash->recursive = 0;
		$this->set('transloadcashes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	/*public function view($id = null) {
		if (!$this->Transloadcash->exists($id)) {
			throw new NotFoundException(__('Invalid transloadcash'));
		}
		$options = array('conditions' => array('Transloadcash.' . $this->Transloadcash->primaryKey => $id));
		$this->set('transloadcash', $this->Transloadcash->find('first', $options));
	}*/

/**
 * add method
 *
 * @return void
 */
	/*public function add() {
		if ($this->request->is('post')) {
			$this->Transloadcash->create();
			if ($this->Transloadcash->save($this->request->data)) {
				$this->Session->setFlash(__('The transloadcash has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The transloadcash could not be saved. Please, try again.'));
			}
		}
		$transactiontypes = $this->Transloadcash->Transactiontype->find('list');
		$cards = $this->Transloadcash->Card->find('list');
		$cardholders = $this->Transloadcash->Cardholder->find('list');
		$users = $this->Transloadcash->User->find('list');
		$terminals = $this->Transloadcash->Terminal->find('list');
		$atmstations = $this->Transloadcash->Atmstation->find('list');
		$postations = $this->Transloadcash->Postation->find('list');
		$statuses = $this->Transloadcash->Status->find('list');
		$this->set(compact('transactiontypes', 'cards', 'cardholders', 'users', 'terminals', 'atmstations', 'postations', 'statuses'));
	}*/

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	/*public function edit($id = null) {
		if (!$this->Transloadcash->exists($id)) {
			throw new NotFoundException(__('Invalid transloadcash'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Transloadcash->save($this->request->data)) {
				$this->Session->setFlash(__('The transloadcash has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The transloadcash could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Transloadcash.' . $this->Transloadcash->primaryKey => $id));
			$this->request->data = $this->Transloadcash->find('first', $options);
		}
		$transactiontypes = $this->Transloadcash->Transactiontype->find('list');
		$cards = $this->Transloadcash->Card->find('list');
		$cardholders = $this->Transloadcash->Cardholder->find('list');
		$users = $this->Transloadcash->User->find('list');
		$terminals = $this->Transloadcash->Terminal->find('list');
		$atmstations = $this->Transloadcash->Atmstation->find('list');
		$postations = $this->Transloadcash->Postation->find('list');
		$statuses = $this->Transloadcash->Status->find('list');
		$this->set(compact('transactiontypes', 'cards', 'cardholders', 'users', 'terminals', 'atmstations', 'postations', 'statuses'));
	}*/

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	/*public function delete($id = null) {
		$this->Transloadcash->id = $id;
		if (!$this->Transloadcash->exists()) {
			throw new NotFoundException(__('Invalid transloadcash'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Transloadcash->delete()) {
			$this->Session->setFlash(__('The transloadcash has been deleted.'));
		} else {
			$this->Session->setFlash(__('The transloadcash could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}*/
}
