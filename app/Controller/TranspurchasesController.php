<?php
App::uses('AppController', 'Controller');
App::import('Vendor', 'custom',	array('file' => 'tcpdf/custom.php'));

/**
 * Transpurchases Controller
 *
 * @property Transpurchase $Transpurchase
 * @property PaginatorComponent $Paginator
 */
class TranspurchasesController extends AppController {

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
				$trans = $this->Transpurchase->find('all', array(
						'conditions' => array(
							'Transpurchase.cardno' => $cardno
						),
						'order' => array(
							'Transpurchase.transdate' => 'DESC'
						),
					)
				);
				
				if($trans){
						$data = array();
					
						if(count($trans) > 0){
							$data = array();
							foreach($trans as $t):
								$data[] = array(									
										$t['Transpurchase']['cardno'],
										$t['Transpurchase']['trace_number'],									
										$t['Transpurchase']['transaction_type'],									
										$t['Transpurchase']['processing_code'],									
										$t['Transpurchase']['channels'],									
										$t['Transpurchase']['acquirer_institution'],									
										//$t['Transpurchase']['service_charge'],									
										date('Y M d h:i A', strtotime($t['Transpurchase']['transdate'])),																		
										$t['Transpurchase']['deviceno'],
										$t['Transpurchase']['response']															
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
			$this->set('file_name', !empty($date_from) && !empty($date_to) ? 'Purchase_'.$date_from.'-'.$date_to : 'Purchase_'.date('Y-m-d'));
			$this->set('trans', $this->getListofTransactions($date_from, $date_to));
			$this->render();
	}
	
	public function generate_csv_report($date_from=null, $date_to=null){	
			$this->layout = 'pdf'; 
			$this->set('trans', $this->getListofTransactions($date_from, $date_to));
			$this->set('file_name', !empty($date_from) && !empty($date_to) ? 'Purchase_'.$date_from.'-'.$date_to : 'Purchase_'.date('Y-m-d'));
			$this->set('title', !empty($date_from) && !empty($date_to) ? $date_from.'-'.$date_to : date('Y-m-d'));
			$this->render();
	}
	
	
	private function getListofTransactions($date_from=null, $date_to=null){
			if(!empty($date_from) && !empty($date_to)){
					if($date_to > $date_from){
						$trans = $this->Transpurchase->find('all', 
							array(
								'conditions' => array(							
									'Transpurchase.transdate BETWEEN ? AND ?' => array(
										$date_from, $date_to
									)
								),															
								'order' => array(
									'Transpurchase.transdate' => 'DESC'
								)
							)							
						);
					}else{
						$trans = false;
					}
				}else{
					$trans = $this->Transpurchase->find('all', array(
							'order' => array(
								'Transpurchase.transdate' => 'DESC'
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
									$t['Transpurchase']['cardno'],
									$t['Transpurchase']['trace_number'],									
									$t['Transpurchase']['transaction_type'],									
									$t['Transpurchase']['processing_code'],									
									$t['Transpurchase']['channels'],									
									$t['Transpurchase']['acquirer_institution'],									
									//$t['Transpurchase']['service_charge'],									
									date('Y M d h:i A', strtotime($t['Transpurchase']['transdate'])),																		
									$t['Transpurchase']['deviceno'],
									$t['Transpurchase']['response'],
									$t['Transpurchase']['username']								
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
		if(!$this->Transpurchase->Card->findByCardno($cardno)){
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
		$this->Transpurchase->recursive = 0;
		$this->set('transpurchases', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	/*public function view($id = null) {
		if (!$this->Transpurchase->exists($id)) {
			throw new NotFoundException(__('Invalid transpurchase'));
		}
		$options = array('conditions' => array('Transpurchase.' . $this->Transpurchase->primaryKey => $id));
		$this->set('transpurchase', $this->Transpurchase->find('first', $options));
	}*/

/**
 * add method
 *
 * @return void
 */
	/*public function add() {
		if ($this->request->is('post')) {
			$this->Transpurchase->create();
			if ($this->Transpurchase->save($this->request->data)) {
				$this->Session->setFlash(__('The transpurchase has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The transpurchase could not be saved. Please, try again.'));
			}
		}
		$transactiontypes = $this->Transpurchase->Transactiontype->find('list');
		$users = $this->Transpurchase->User->find('list');
		$cards = $this->Transpurchase->Card->find('list');
		$cardholders = $this->Transpurchase->Cardholder->find('list');
		$terminals = $this->Transpurchase->Terminal->find('list');
		$postations = $this->Transpurchase->Postation->find('list');
		$atmstations = $this->Transpurchase->Atmstation->find('list');
		$statuses = $this->Transpurchase->Status->find('list');
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
		if (!$this->Transpurchase->exists($id)) {
			throw new NotFoundException(__('Invalid transpurchase'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Transpurchase->save($this->request->data)) {
				$this->Session->setFlash(__('The transpurchase has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The transpurchase could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Transpurchase.' . $this->Transpurchase->primaryKey => $id));
			$this->request->data = $this->Transpurchase->find('first', $options);
		}
		$transactiontypes = $this->Transpurchase->Transactiontype->find('list');
		$users = $this->Transpurchase->User->find('list');
		$cards = $this->Transpurchase->Card->find('list');
		$cardholders = $this->Transpurchase->Cardholder->find('list');
		$terminals = $this->Transpurchase->Terminal->find('list');
		$postations = $this->Transpurchase->Postation->find('list');
		$atmstations = $this->Transpurchase->Atmstation->find('list');
		$statuses = $this->Transpurchase->Status->find('list');
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
		$this->Transpurchase->id = $id;
		if (!$this->Transpurchase->exists()) {
			throw new NotFoundException(__('Invalid transpurchase'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Transpurchase->delete()) {
			$this->Session->setFlash(__('The transpurchase has been deleted.'));
		} else {
			$this->Session->setFlash(__('The transpurchase could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}*/
}
