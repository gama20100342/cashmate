<?php
App::uses('AppController', 'Controller');
App::import('Vendor', 'custom',	array('file' => 'tcpdf/custom.php'));

/**
 * Transbalanceinquiries Controller
 *
 * @property Transbalanceinquiry $Transbalanceinquiry
 * @property PaginatorComponent $Paginator
 */
class TransbalanceinquiriesController extends AppController {

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
				$trans = $this->Transbalanceinquiry->find('all', array(
						'conditions' => array(
							'Transbalanceinquiry.cardno' => $cardno
						)
					)
				);
				
				if($trans){
						$data = array();
					
						if(count($trans) > 0){
							$data = array();
							foreach($trans as $t):
								$data[] = array(									
										$t['Transbalanceinquiry']['cardno'],
										$t['Transbalanceinquiry']['trace_number'],									
										$t['Transbalanceinquiry']['transaction_type'],									
										$t['Transbalanceinquiry']['processing_code'],									
										$t['Transbalanceinquiry']['channels'],									
										$t['Transbalanceinquiry']['acquirer_institution'],									
										//$t['Transpurchase']['service_charge'],									
										date('Y M d h:i A', strtotime($t['Transbalanceinquiry']['transdate'])),																		
										$t['Transbalanceinquiry']['deviceno'],
										$t['Transbalanceinquiry']['response']															
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
			$this->set('file_name', !empty($date_from) && !empty($date_to) ? 'Balance_Inquiries_'.$date_from.'-'.$date_to : 'Balance_Inquiries_'.date('Y-m-d'));
			$this->set('trans', $this->getListofTransactions($date_from, $date_to));
			$this->render();
	}
	
	public function generate_csv_report($date_from=null, $date_to=null){	
			$this->layout = 'pdf'; 
			$this->set('trans', $this->getListofTransactions($date_from, $date_to));
			$this->set('file_name', !empty($date_from) && !empty($date_to) ? 'Balance_Inquiries_'.$date_from.'-'.$date_to : 'Balance_Inquiries_'.date('Y-m-d'));
			$this->set('title', !empty($date_from) && !empty($date_to) ? $date_from.'-'.$date_to : date('Y-m-d'));
			$this->render();
	}
	
	
	private function getListofTransactions($date_from=null, $date_to=null){
			if(!empty($date_from) && !empty($date_to)){
					if($date_to > $date_from){
						$trans = $this->Transbalanceinquiry->find('all', 
							array(
								'conditions' => array(							
									'Transbalanceinquiry.transdate BETWEEN ? AND ?' => array(
										$date_from, $date_to
									)
								),															
								'order' => array(
									'Transbalanceinquiry.transdate' => 'DESC'
									)
							)							
						);
					}else{
						$trans = false;
					}
				}else{
					$trans = $this->Transbalanceinquiry->find('all', array(
							'order' => array(
								'Transbalanceinquiry.transdate' => 'DESC'
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

		
		//if($this->request->is('ajax')){
				
				
				$trans = $this->getListofTransactions($date_from, $date_to);

				if($trans){
						$data = array();
					
						if(count($trans) > 0){
							$data = array();
							foreach($trans as $t):
								$data[] = array(
									$t['Transbalanceinquiry']['cardno'],
									$t['Transbalanceinquiry']['trace_number'],									
									$t['Transbalanceinquiry']['transaction_type'],									
									$t['Transbalanceinquiry']['processing_code'],									
									$t['Transbalanceinquiry']['channels'],									
									$t['Transbalanceinquiry']['acquirer_institution'],									
									//$t['Transbalanceinquiry']['service_charge'],									
									date('Y M d h:i A', strtotime($t['Transbalanceinquiry']['transdate'])),																		
									$t['Transbalanceinquiry']['deviceno'],
									$t['Transbalanceinquiry']['response'],
									$t['Transbalanceinquiry']['username']
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
	//	}
		
	}
	
	
	private function checkCardExists($cardno){		
		if(!$this->Transbalanceinquiry->Card->findByCardno($cardno)){
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
		$this->Transbalanceinquiry->recursive = 0;
		$this->set('transbalanceinquiries', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	/*public function view($id = null) {
		if (!$this->Transbalanceinquiry->exists($id)) {
			throw new NotFoundException(__('Invalid transbalanceinquiry'));
		}
		$options = array('conditions' => array('Transbalanceinquiry.' . $this->Transbalanceinquiry->primaryKey => $id));
		$this->set('transbalanceinquiry', $this->Transbalanceinquiry->find('first', $options));
	}*/

/**
 * add method
 *
 * @return void
 */
	/*public function add() {
		if ($this->request->is('post')) {
			$this->Transbalanceinquiry->create();
			if ($this->Transbalanceinquiry->save($this->request->data)) {
				$this->Session->setFlash(__('The transbalanceinquiry has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The transbalanceinquiry could not be saved. Please, try again.'));
			}
		}
		$transactiontypes = $this->Transbalanceinquiry->Transactiontype->find('list');
		$cards = $this->Transbalanceinquiry->Card->find('list');
		$cardholders = $this->Transbalanceinquiry->Cardholder->find('list');
		$terminals = $this->Transbalanceinquiry->Terminal->find('list');
		$postations = $this->Transbalanceinquiry->Postation->find('list');
		$atmstations = $this->Transbalanceinquiry->Atmstation->find('list');
		$statuses = $this->Transbalanceinquiry->Status->find('list');
		$this->set(compact('transactiontypes', 'cards', 'cardholders', 'terminals', 'postations', 'atmstations', 'statuses'));
	}*/

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	/*public function edit($id = null) {
		if (!$this->Transbalanceinquiry->exists($id)) {
			throw new NotFoundException(__('Invalid transbalanceinquiry'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Transbalanceinquiry->save($this->request->data)) {
				$this->Session->setFlash(__('The transbalanceinquiry has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The transbalanceinquiry could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Transbalanceinquiry.' . $this->Transbalanceinquiry->primaryKey => $id));
			$this->request->data = $this->Transbalanceinquiry->find('first', $options);
		}
		$transactiontypes = $this->Transbalanceinquiry->Transactiontype->find('list');
		$cards = $this->Transbalanceinquiry->Card->find('list');
		$cardholders = $this->Transbalanceinquiry->Cardholder->find('list');
		$terminals = $this->Transbalanceinquiry->Terminal->find('list');
		$postations = $this->Transbalanceinquiry->Postation->find('list');
		$atmstations = $this->Transbalanceinquiry->Atmstation->find('list');
		$statuses = $this->Transbalanceinquiry->Status->find('list');
		$this->set(compact('transactiontypes', 'cards', 'cardholders', 'terminals', 'postations', 'atmstations', 'statuses'));
	}*/

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	/*
	public function delete($id = null) {
		$this->Transbalanceinquiry->id = $id;
		if (!$this->Transbalanceinquiry->exists()) {
			throw new NotFoundException(__('Invalid transbalanceinquiry'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Transbalanceinquiry->delete()) {
			$this->Session->setFlash(__('The transbalanceinquiry has been deleted.'));
		} else {
			$this->Session->setFlash(__('The transbalanceinquiry could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}*/
	
}
