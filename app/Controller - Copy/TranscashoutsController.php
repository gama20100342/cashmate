<?php
App::uses('AppController', 'Controller');
//App::import('Vendor', 'tcpdf',array('file' => 'tcpdf/tcpdf.php'));
App::import('Vendor', 'custom',	array('file' => 'tcpdf/custom.php'));

/**
 * Transcashouts Controller
 *
 * @property Transcashout $Transcashout
 * @property PaginatorComponent $Paginator
 */
class TranscashoutsController extends AppController {

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
				$trans = $this->Transcashout->find('all', array(
						'conditions' => array(
							'Transcashout.cardno' => $cardno
						)
					)
				);
				
				if($trans){
						$data = array();
					
						if(count($trans) > 0){
							$data = array();
							foreach($trans as $t):
								$data[] = array(
									$t['Transcashout']['terminal_id'],
									date('Y M d h:i A', strtotime($t['Transcashout']['transdate'])),
									number_format($t['Transcashout']['remaining_balance'], 2, ".", ","),	
									number_format($t['Transcashout']['cashout_amount'], 2, ".", ","),									
									number_format($t['Transcashout']['current_balance'], 2, ".", ","),
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
			$this->set('file_name', !empty($date_from) && !empty($date_to) ? 'cashout_'.$date_from.'-'.$date_to : 'cashout_'.date('Y-m-d'));
			$this->set('trans', $this->getListofTransactions($date_from, $date_to));
			$this->render();
	}
	
	public function generate_csv_report($date_from=null, $date_to=null){	
			$this->layout = 'pdf'; 
			$this->set('trans', $this->getListofTransactions($date_from, $date_to));
			$this->set('file_name', !empty($date_from) && !empty($date_to) ? 'cashout_'.$date_from.'-'.$date_to : 'cashout_'.date('Y-m-d'));
			$this->render();
	}
	
	
	private function getListofTransactions($date_from=null, $date_to=null){
			if(!empty($date_from) && !empty($date_to)){
					if($date_to > $date_from){
						$trans = $this->Transcashout->find('all', 
							array(
								'conditions' => array(							
									'Transcashout.transdate BETWEEN ? AND ?' => array(
										$date_from, $date_to
									)
								),															
								'order' => array(
									'Transcashout.transdate' => 'DESC'
									)
							)							
						);
					}else{
						$trans = false;
					}
				}else{
					$trans = $this->Transcashout->find('all', array(
							'order' => array(
								'Transcashout.transdate' => 'DESC'
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
									$t['Transcashout']['posimei'],
									$t['Transcashout']['cardno'],
									$t['Transcashout']['accountname'],
									date('Y M d h:i A', strtotime($t['Transcashout']['transdate'])),																											
									$t['Transcashout']['withdrawal_amount'],
									$t['Transcashout']['processed_by'],
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
		if(!$this->Transcashout->Card->findByCardno($cardno)){
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
		$this->Transcashout->recursive = 0;
		$this->set('transcashouts', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	/*public function view($id = null) {
		if (!$this->Transcashout->exists($id)) {
			throw new NotFoundException(__('Invalid transcashout'));
		}
		$options = array('conditions' => array('Transcashout.' . $this->Transcashout->primaryKey => $id));
		$this->set('transcashout', $this->Transcashout->find('first', $options));
	}*/

/**
 * add method
 *
 * @return void
 */
	/*public function add() {
		if ($this->request->is('post')) {
			$this->Transcashout->create();
			if ($this->Transcashout->save($this->request->data)) {
				$this->Session->setFlash(__('The transcashout has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The transcashout could not be saved. Please, try again.'));
			}
		}
		$transactiontypes = $this->Transcashout->Transactiontype->find('list');
		$cards = $this->Transcashout->Card->find('list');
		$cardholders = $this->Transcashout->Cardholder->find('list');
		$terminals = $this->Transcashout->Terminal->find('list');
		$atmstations = $this->Transcashout->Atmstation->find('list');
		$statuses = $this->Transcashout->Status->find('list');
		$this->set(compact('transactiontypes', 'cards', 'cardholders', 'terminals', 'atmstations', 'statuses'));
	}*/

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	/*public function edit($id = null) {
		if (!$this->Transcashout->exists($id)) {
			throw new NotFoundException(__('Invalid transcashout'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Transcashout->save($this->request->data)) {
				$this->Session->setFlash(__('The transcashout has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The transcashout could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Transcashout.' . $this->Transcashout->primaryKey => $id));
			$this->request->data = $this->Transcashout->find('first', $options);
		}
		$transactiontypes = $this->Transcashout->Transactiontype->find('list');
		$cards = $this->Transcashout->Card->find('list');
		$cardholders = $this->Transcashout->Cardholder->find('list');
		$terminals = $this->Transcashout->Terminal->find('list');
		$atmstations = $this->Transcashout->Atmstation->find('list');
		$statuses = $this->Transcashout->Status->find('list');
		$this->set(compact('transactiontypes', 'cards', 'cardholders', 'terminals', 'atmstations', 'statuses'));
	}*/

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	/*public function delete($id = null) {
		$this->Transcashout->id = $id;
		if (!$this->Transcashout->exists()) {
			throw new NotFoundException(__('Invalid transcashout'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Transcashout->delete()) {
			$this->Session->setFlash(__('The transcashout has been deleted.'));
		} else {
			$this->Session->setFlash(__('The transcashout could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}*/
}
