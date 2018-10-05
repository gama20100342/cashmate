<?php
App::uses('AppController', 'Controller');
//App::import('Vendor', 'tcpdf',array('file' => 'tcpdf/tcpdf.php'));
//App::import('Vendor', 'custom',	array('file' => 'tcpdf/custom.php'));

/**
 * Transinterbanks Controller
 *
 * @property Transinterbank $Transinterbank
 * @property PaginatorComponent $Paginator
 */
class TransinterbanksController extends AppController {

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
				$trans = $this->Transinterbank->find('all', array(
						'conditions' => array(
							'Transinterbank.cardno' => $cardno
						)
					)
				);
				
				if($trans){
						$data = array();
					
						if(count($trans) > 0){
							$data = array();
							foreach($trans as $t):
										$data[] = array(									
										$t['Transinterbank']['cardno'],
										$t['Transinterbank']['trace_number'],									
										$t['Transinterbank']['transaction_type'],									
										$t['Transinterbank']['processing_code'],									
										$t['Transinterbank']['channels'],									
										$t['Transinterbank']['acquirer_institution'],									
										//$t['Transinterbank']['service_charge'],									
										date('Y M d h:i A', strtotime($t['Transinterbank']['transdate'])),																		
										$t['Transinterbank']['deviceno'],
										$t['Transinterbank']['response']																
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
			$this->set('file_name', !empty($date_from) && !empty($date_to) ? 'Report_Interbank_Fund_Transfer_'.$date_from.'-'.$date_to : 'Report_Interbank_Fund_Transfer_'.date('Y-m-d'));
			$this->set('trans', $this->getListofTransactions($date_from, $date_to));
			$this->render();
	}
	
	public function generate_csv_report($date_from=null, $date_to=null){	
			$this->layout = 'pdf'; 
			$this->set('trans', $this->getListofTransactions($date_from, $date_to));
			$this->set('filename', 'interbank');
			$this->set('date_from', $date_from);
			$this->set('date_to', $date_to);
			$this->set('title', !empty($date_from) && !empty($date_to) ? $date_from.'-'.$date_to : date('Y-m-d'));
			$this->render();
	}
	
	
	private function getListofTransactions($date_from=null, $date_to=null){
			if(!empty($date_from) && !empty($date_to)){
					if($date_to > $date_from){
						$trans = $this->Transinterbank->find('all', 
							array(
								'conditions' => array(							
									'Transinterbank.transdate BETWEEN ? AND ?' => array(
										$date_from, $date_to
									)
								),															
								'order' => array(
									'Transinterbank.transdate' => 'DESC'
									)
							)							
						);
					}else{
						$trans = false;
					}
				}else{
					$trans = $this->Transinterbank->find('all', array(
							'order' => array(
								'Transinterbank.transdate' => 'DESC'
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
									$t['Transinterbank']['deviceno'],
									$t['Transinterbank']['trace_number'],									
									$t['Transinterbank']['trans_cardnumber'],									
									$t['Transinterbank']['receiving_accountno'],																	
									number_format($t['Transinterbank']['transaction_amount'], 2, ".", ","),									
									date('Y M d h:i A', strtotime($t['Transinterbank']['transdate'])),																		
									$t['Transinterbank']['response']	
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
		if(!$this->Transinterbank->Card->findByCardno($cardno)){
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
		$this->Transinterbank->recursive = 0;
		$this->set('Transinterbanks', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	/*public function view($id = null) {
		if (!$this->Transinterbank->exists($id)) {
			throw new NotFoundException(__('Invalid Transinterbank'));
		}
		$options = array('conditions' => array('Transinterbank.' . $this->Transinterbank->primaryKey => $id));
		$this->set('Transinterbank', $this->Transinterbank->find('first', $options));
	}*/

/**
 * add method
 *
 * @return void
 */
	/*public function add() {
		if ($this->request->is('post')) {
			$this->Transinterbank->create();
			if ($this->Transinterbank->save($this->request->data)) {
				$this->Session->setFlash(__('The Transinterbank has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Transinterbank could not be saved. Please, try again.'));
			}
		}
		$transactiontypes = $this->Transinterbank->Transactiontype->find('list');
		$cards = $this->Transinterbank->Card->find('list');
		$cardholders = $this->Transinterbank->Cardholder->find('list');
		$terminals = $this->Transinterbank->Terminal->find('list');
		$atmstations = $this->Transinterbank->Atmstation->find('list');
		$statuses = $this->Transinterbank->Status->find('list');
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
		if (!$this->Transinterbank->exists($id)) {
			throw new NotFoundException(__('Invalid Transinterbank'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Transinterbank->save($this->request->data)) {
				$this->Session->setFlash(__('The Transinterbank has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Transinterbank could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Transinterbank.' . $this->Transinterbank->primaryKey => $id));
			$this->request->data = $this->Transinterbank->find('first', $options);
		}
		$transactiontypes = $this->Transinterbank->Transactiontype->find('list');
		$cards = $this->Transinterbank->Card->find('list');
		$cardholders = $this->Transinterbank->Cardholder->find('list');
		$terminals = $this->Transinterbank->Terminal->find('list');
		$atmstations = $this->Transinterbank->Atmstation->find('list');
		$statuses = $this->Transinterbank->Status->find('list');
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
		$this->Transinterbank->id = $id;
		if (!$this->Transinterbank->exists()) {
			throw new NotFoundException(__('Invalid Transinterbank'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Transinterbank->delete()) {
			$this->Session->setFlash(__('The Transinterbank has been deleted.'));
		} else {
			$this->Session->setFlash(__('The Transinterbank could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}*/
}
