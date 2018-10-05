<?php
App::uses('AppController', 'Controller');
App::import('Vendor', 'custom',	array('file' => 'tcpdf/custom.php'));

/**
 * Transbillspayments Controller
 *
 * @property Transbillspayment $Transbillspayment
 * @property PaginatorComponent $Paginator
 */
class TransbillspaymentsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
	
	
	private function getBillsSummary($date_from, $date_to){
		$status = "Approved";
		$model  = 'Transbillspayment';
		$this->Transbillspayment->recursive =0;
		
		if(isset($status) && !empty($status)){
			if(!empty($date_to) && !empty($date_to) && ($date_to >= $date_from)){				
				$options = array(
					'conditions' => array(
						//$model.'.transaction_type' => $type,
						//$model.'.processing_code' => $code,
						$model.'.response' => $status,
						$model.'.transdate BETWEEN ? AND ?' => array(
							$date_from, $date_to
						)
					),
					'fields' => array(
						'COUNT('.$model.'.id) as total_entry',						
						'SUM('.$model.'.transaction_amount) as total_trans',						
						'Institution.code',
						'Institution.name'
					),
					'group' => array(
						$model.'.institution_id'
					)
				);
			}else{
				$options = array(
					'conditions' => array(
						//$model.'.transaction_type' => $type,
						//$model.'.processing_code' => $code,
						$model.'.response' => $status						
					),
					'fields' => array(
						'COUNT('.$model.'.id) as total_entry',						
						'SUM('.$model.'.transaction_amount) as total_trans',
						'Institution.code',
						'Institution.name'
					),
					'group' => array(
						$model.'.institution_id'
					)
				);
			}
		}else{
			$options = array(				
				'fields' => array(
					'COUNT('.$model.'.id) as total_entry',						
					'SUM('.$model.'.transaction_amount) as total_trans',
					'Institution.code',
					'Institution.name'
				),
				'group' => array(
					$model.'.institution_id'
				)
			);
		}
		
		$trans = $this->{$model}->find('all', $options);		
		//return number_format($trans[0][0]["total_trans"], 2, ".", ",");
		return $trans;
	}
	
	public function generate_summary_report($date_from=null, $date_to=null){
		$this->layout 	= 'pdf';
		
		$this->set('filename', 'bill_payment');
		$this->set('date_from', $date_from);
		//$this->set('status', strtoupper($status));
		$this->set('date_to', $date_to);
		$this->set('title', !empty($date_from) && !empty($date_to) ? $date_from.' - '.$date_to : 'ALL');
		$this->set('trans', $this->getBillsSummary($date_from, $date_to));
				
		$this->render();
	}
	
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
				$trans = $this->Transbillspayment->find('all', array(
						'conditions' => array(
							'Transbillspayment.cardno' => $cardno
						)
					)
				);
				
				if($trans){
						$data = array();
					
						if(count($trans) > 0){
							$data = array();
							foreach($trans as $t):
								$data[] = array(									
										$t['Transbillspayment']['cardno'],
										$t['Transbillspayment']['trace_number'],									
										$t['Transbillspayment']['transaction_type'],									
										$t['Transbillspayment']['processing_code'],									
										$t['Transbillspayment']['channels'],									
										$t['Transbillspayment']['acquirer_institution'],									
										//$t['Transbillspayment']['service_charge'],									
										date('Y M d h:i A', strtotime($t['Transbillspayment']['transdate'])),																		
										$t['Transbillspayment']['deviceno'],
										$t['Transbillspayment']['response']															
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
			$this->set('file_name', !empty($date_from) && !empty($date_to) ? 'Bills_Payment_'.$date_from.'-'.$date_to : 'Bills_Payment_'.date('Y-m-d'));
			$this->set('trans', $this->getListofTransactions($date_from, $date_to));
			$this->render();
	}
	
	public function generate_csv_report($date_from=null, $date_to=null){	
			$this->layout = 'pdf'; 
			$this->set('trans', $this->getListofTransactions($date_from, $date_to));
			$this->set('file_name', !empty($date_from) && !empty($date_to) ? 'Bills_Payment_'.$date_from.'-'.$date_to : 'Bills_Payment_'.date('Y-m-d'));
			$this->set('title', !empty($date_from) && !empty($date_to) ? $date_from.'-'.$date_to : date('Y-m-d'));
			$this->render();
	}
	
	
	private function getListofTransactions($date_from=null, $date_to=null){
			if(!empty($date_from) && !empty($date_to)){
					if($date_to > $date_from){
						$trans = $this->Transbillspayment->find('all', 
							array(
								'conditions' => array(							
									'Transbillspayment.transdate BETWEEN ? AND ?' => array(
										$date_from, $date_to
									)
								),															
								'order' => array(
									'Transbillspayment.transdate' => 'DESC'
									)
							)							
						);
					}else{
						$trans = false;
					}
				}else{
					$trans = $this->Transbillspayment->find('all', array(
							'order' => array(
								'Transbillspayment.transdate' => 'DESC'
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
									$t['Transbillspayment']['cardno'],
									$t['Transbillspayment']['trace_number'],									
									$t['Transbillspayment']['transaction_type'],									
									$t['Transbillspayment']['processing_code'],									
									$t['Transbillspayment']['channels'],									
									$t['Transbillspayment']['acquirer_institution'],									
									//$t['Transbillspayment']['service_charge'],									
									date('Y M d h:i A', strtotime($t['Transbillspayment']['transdate'])),																		
									$t['Transbillspayment']['deviceno'],
									$t['Transbillspayment']['response'],
									$t['Transbillspayment']['username']													
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
		if(!$this->Transbillspayment->Card->findByCardno($cardno)){
			return false;
		}else{
			return true;
		}				
	}
/**

	
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Transbillspayment->recursive = 0;
		$this->set('transbillspayments', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	/*public function view($id = null) {
		if (!$this->Transbillspayment->exists($id)) {
			throw new NotFoundException(__('Invalid transbillspayment'));
		}
		$options = array('conditions' => array('Transbillspayment.' . $this->Transbillspayment->primaryKey => $id));
		$this->set('transbillspayment', $this->Transbillspayment->find('first', $options));
	}*/

/**
 * add method
 *
 * @return void
 */
	/*public function add() {
		if ($this->request->is('post')) {
			$this->Transbillspayment->create();
			if ($this->Transbillspayment->save($this->request->data)) {
				$this->Session->setFlash(__('The transbillspayment has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The transbillspayment could not be saved. Please, try again.'));
			}
		}
		$transactiontypes = $this->Transbillspayment->Transactiontype->find('list');
		$cards = $this->Transbillspayment->Card->find('list');
		$cardholders = $this->Transbillspayment->Cardholder->find('list');
		$partners = $this->Transbillspayment->Partner->find('list');
		$terminals = $this->Transbillspayment->Terminal->find('list');
		$postations = $this->Transbillspayment->Postation->find('list');
		$statuses = $this->Transbillspayment->Status->find('list');
		$this->set(compact('transactiontypes', 'cards', 'cardholders', 'partners', 'terminals', 'postations', 'statuses'));
	}*/

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	/*public function edit($id = null) {
		if (!$this->Transbillspayment->exists($id)) {
			throw new NotFoundException(__('Invalid transbillspayment'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Transbillspayment->save($this->request->data)) {
				$this->Session->setFlash(__('The transbillspayment has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The transbillspayment could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Transbillspayment.' . $this->Transbillspayment->primaryKey => $id));
			$this->request->data = $this->Transbillspayment->find('first', $options);
		}
		$transactiontypes = $this->Transbillspayment->Transactiontype->find('list');
		$cards = $this->Transbillspayment->Card->find('list');
		$cardholders = $this->Transbillspayment->Cardholder->find('list');
		$partners = $this->Transbillspayment->Partner->find('list');
		$terminals = $this->Transbillspayment->Terminal->find('list');
		$postations = $this->Transbillspayment->Postation->find('list');
		$statuses = $this->Transbillspayment->Status->find('list');
		$this->set(compact('transactiontypes', 'cards', 'cardholders', 'partners', 'terminals', 'postations', 'statuses'));
	}*/

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	/*public function delete($id = null) {
		$this->Transbillspayment->id = $id;
		if (!$this->Transbillspayment->exists()) {
			throw new NotFoundException(__('Invalid transbillspayment'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Transbillspayment->delete()) {
			$this->Session->setFlash(__('The transbillspayment has been deleted.'));
		} else {
			$this->Session->setFlash(__('The transbillspayment could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}*/
}
