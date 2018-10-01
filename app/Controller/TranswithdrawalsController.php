<?php
App::uses('AppController', 'Controller');

/**
 * Transwithdrawals Controller
 *
 * @property Transwithdrawal $Transwithdrawal
 * @property PaginatorComponent $Paginator
 */
class TranswithdrawalsController extends AppController {

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
				$trans = $this->Transwithdrawal->find('all', array(
						'conditions' => array(
							'Transwithdrawal.cardno' => $cardno
						),
						'order' => array(
							'Transwithdrawal.transdate' => 'DESC'
						),
					)
				);
				
				if($trans){
						$data = array();
					
						if(count($trans) > 0){
							$data = array();
							foreach($trans as $t):
									$data[] = array(									
										$t['Transwithdrawal']['cardno'],
										$t['Transwithdrawal']['trace_number'],									
										$t['Transwithdrawal']['transaction_type'],									
										$t['Transwithdrawal']['processing_code'],									
										$t['Transwithdrawal']['channels'],									
										$t['Transwithdrawal']['acquirer_institution'],									
										//$t['Transwithdrawal']['service_charge'],									
										date('Y M d h:i A', strtotime($t['Transwithdrawal']['transdate'])),																		
										$t['Transwithdrawal']['deviceno'],
										$t['Transwithdrawal']['response']																
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
			$this->set('file_name', !empty($date_from) && !empty($date_to) ? 'Withdrawals_'.$date_from.'-'.$date_to : 'Withdrawals_'.date('Y-m-d'));
			$this->set('trans', $this->getListofTransactions($date_from, $date_to));
			$this->render();
	}
	
	public function generate_csv_report($date_from=null, $date_to=null){	
			$this->layout = 'pdf'; 
			$this->set('trans', $this->getListofTransactions($date_from, $date_to));
			$this->set('file_name', !empty($date_from) && !empty($date_to) ? 'Withdrawals_'.$date_from.'-'.$date_to : 'Withdrawals_'.date('Y-m-d'));
			$this->set('title', !empty($date_from) && !empty($date_to) ? $date_from.'-'.$date_to : date('Y-m-d'));
			$this->render();
	}
	
	
	private function getListofTransactions($date_from=null, $date_to=null){
			if(!empty($date_from) && !empty($date_to)){
					if($date_to > $date_from){
						$trans = $this->Transwithdrawal->find('all', 
							array(
								'conditions' => array(							
									'Transwithdrawal.transdate BETWEEN ? AND ?' => array(
										$date_from, $date_to
									)
								),															
								'order' => array(
									'Transwithdrawal.transdate' => 'DESC'
								)
							)							
						);
					}else{
						$trans = false;
					}
				}else{
					$trans = $this->Transwithdrawal->find('all', array(
							'order' => array(
								'Transwithdrawal.transdate' => 'DESC'
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
			
				$date_from 		= isset($date_from) && !empty($date_from) ? $date_from : '';
				$date_to 		= isset($date_to) && !empty($date_to) ? $date_to : '';
				$trans 			= $this->getListofTransactions($date_from, $date_to);
				
				if($trans){
						$data = array();
					
						if(count($trans) > 0){
							$data = array();
							foreach($trans as $t):
								$data[] = array(
									$t['Transwithdrawal']['cardno'],
									$t['Transwithdrawal']['trace_number'],									
									$t['Transwithdrawal']['transaction_type'],									
									$t['Transwithdrawal']['processing_code'],									
									$t['Transwithdrawal']['channels'],									
									$t['Transwithdrawal']['acquirer_institution'],									
									//$t['Transwithdrawal']['service_charge'],									
									date('Y M d h:i A', strtotime($t['Transwithdrawal']['transdate'])),																		
									$t['Transwithdrawal']['deviceno'],
									$t['Transwithdrawal']['response'],
									$t['Transwithdrawal']['username']											
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
		if(!$this->Transwithdrawal->Card->findByCardno($cardno)){
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
		$this->Transwithdrawal->recursive = 0;
		$this->set('Transwithdrawals', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	/*public function view($id = null) {
		if (!$this->Transwithdrawal->exists($id)) {
			throw new NotFoundException(__('Invalid Transwithdrawal'));
		}
		$options = array('conditions' => array('Transwithdrawal.' . $this->Transwithdrawal->primaryKey => $id));
		$this->set('Transwithdrawal', $this->Transwithdrawal->find('first', $options));
	}*/

/**
 * add method
 *
 * @return void
 */
	/*public function add() {
		if ($this->request->is('post')) {
			$this->Transwithdrawal->create();
			if ($this->Transwithdrawal->save($this->request->data)) {
				$this->Session->setFlash(__('The Transwithdrawal has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Transwithdrawal could not be saved. Please, try again.'));
			}
		}
		$transactiontypes = $this->Transwithdrawal->Transactiontype->find('list');
		$users = $this->Transwithdrawal->User->find('list');
		$cards = $this->Transwithdrawal->Card->find('list');
		$cardholders = $this->Transwithdrawal->Cardholder->find('list');
		$terminals = $this->Transwithdrawal->Terminal->find('list');
		$postations = $this->Transwithdrawal->Postation->find('list');
		$atmstations = $this->Transwithdrawal->Atmstation->find('list');
		$statuses = $this->Transwithdrawal->Status->find('list');
		$this->set(compact('transactiontypes', 'users', 'cards', 'cardholders', 'terminals', 'postations', 'atmstations', 'statuses'));
	}*/

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	/*public function edit($id = null) {
		if (!$this->Transwithdrawal->exists($id)) {
			throw new NotFoundException(__('Invalid Transwithdrawal'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Transwithdrawal->save($this->request->data)) {
				$this->Session->setFlash(__('The Transwithdrawal has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Transwithdrawal could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Transwithdrawal.' . $this->Transwithdrawal->primaryKey => $id));
			$this->request->data = $this->Transwithdrawal->find('first', $options);
		}
		$transactiontypes = $this->Transwithdrawal->Transactiontype->find('list');
		$users = $this->Transwithdrawal->User->find('list');
		$cards = $this->Transwithdrawal->Card->find('list');
		$cardholders = $this->Transwithdrawal->Cardholder->find('list');
		$terminals = $this->Transwithdrawal->Terminal->find('list');
		$postations = $this->Transwithdrawal->Postation->find('list');
		$atmstations = $this->Transwithdrawal->Atmstation->find('list');
		$statuses = $this->Transwithdrawal->Status->find('list');
		$this->set(compact('transactiontypes', 'users', 'cards', 'cardholders', 'terminals', 'postations', 'atmstations', 'statuses'));
	}*/

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	/*public function delete($id = null) {
		$this->Transwithdrawal->id = $id;
		if (!$this->Transwithdrawal->exists()) {
			throw new NotFoundException(__('Invalid Transwithdrawal'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Transwithdrawal->delete()) {
			$this->Session->setFlash(__('The Transwithdrawal has been deleted.'));
		} else {
			$this->Session->setFlash(__('The Transwithdrawal could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}*/
}
