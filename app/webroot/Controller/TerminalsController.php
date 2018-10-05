<?php
App::uses('AppController', 'Controller');
/**
 * Terminals Controller
 *
 * @property Terminal $Terminal
 * @property PaginatorComponent $Paginator
 */
class TerminalsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

	
	public function generate_terminal_transreport($response, $date_from=null, $date_to=null){
		
		///$this->layout = 'ajax';		
		//$this->autoRender = false;
		//$this->view = false;
	
		$this->layout = 'pdf';		
		$this->view = 'generate_csv_report';		
		$this->set('date_from', $date_from);		
		$this->set('date_to', $date_to);		
		$this->set('response', $response);		
		$this->set('title', !empty($date_from) && !empty($date_to) ? $date_from.' - '.$date_to : date('Y-m-d H:i:s'));
		//$this->set('trans', $trans);
		
		switch($response){
			case "Approved": $filename = 'approved_trans_per_terminal'; break;
			case "Rejected": $filename = 'rejected_trans_per_terminal'; break;
			case "Reversal": $filename = 'reversal_trans_per_terminal'; break;		
		}
		
		$this->set('filename', $filename);
		
		
		$_onus_data 		= array();
		$_acq_data 			= array();
		$_iss_data 			= array();
		
		
		$this->Terminal->recursive=-1;
		$terminals = $this->Terminal->find('all', array(
			'order' => array(
				'Terminal.deviceno' => 'ASC'
			),
			'group' => array(
				'Terminal.deviceno'
			),
			'fields' => array(
				'Terminal.deviceno'
			)
		));
		
		
		foreach($terminals as $t):
		
			$_onus_data[] = array(
				'deviceno' 					=> $t['Terminal']['deviceno'],				
				'total_balance_inquiry' 	=> $this->countTermianlTransactions($t['Terminal']['deviceno'], "Transbalanceinquiry", "On Us", $response),								
				'total_cash_withdrawals' 	=> $this->countTermianlTransactions($t['Terminal']['deviceno'], "Transwithdrawal", "On Us", $response),								
				'total_cash_out' 			=> $this->countTermianlTransactions($t['Terminal']['deviceno'], "Transcashout", "On Us", $response),								
				'total_purchase' 			=> $this->countTermianlTransactions($t['Terminal']['deviceno'], "Transpurchase", "On Us", $response),								
				'total_fund_transfer' 		=> $this->countTermianlTransactions($t['Terminal']['deviceno'], "Transinterbank", "On Us", $response),								
				'total_cash_load' 			=> $this->countTermianlTransactions($t['Terminal']['deviceno'], "Transloadcash", "On Us", $response),								
				'total_bills_payment' 		=> $this->countTermianlTransactions($t['Terminal']['deviceno'], "Transbillspayment", "On Us", $response)								
			
			);

			$_acq_data[] = array(
				'deviceno' 					=> $t['Terminal']['deviceno'],				
				'total_balance_inquiry' 	=> $this->countTermianlTransactions($t['Terminal']['deviceno'], "Transbalanceinquiry", "Acquirer", $response),								
				'total_cash_withdrawals' 	=> $this->countTermianlTransactions($t['Terminal']['deviceno'], "Transwithdrawal", "Acquirer", $response),								
				'total_cash_out' 			=> $this->countTermianlTransactions($t['Terminal']['deviceno'], "Transcashout", "Acquirer", $response),								
				'total_purchase' 			=> $this->countTermianlTransactions($t['Terminal']['deviceno'], "Transpurchase", "Acquirer", $response),								
				'total_fund_transfer' 		=> $this->countTermianlTransactions($t['Terminal']['deviceno'], "Transinterbank", "Acquirer", $response),								
				'total_cash_load' 			=> $this->countTermianlTransactions($t['Terminal']['deviceno'], "Transloadcash", "Acquirer", $response),								
				'total_bills_payment' 		=> $this->countTermianlTransactions($t['Terminal']['deviceno'], "Transbillspayment", "Acquirer", $response)								
			
			);
			
			$_iss_data[] = array(
				'deviceno' 					=> $t['Terminal']['deviceno'],				
				'total_balance_inquiry' 	=> $this->countTermianlTransactions($t['Terminal']['deviceno'], "Transbalanceinquiry", "Issuer", $response),								
				'total_cash_withdrawals' 	=> $this->countTermianlTransactions($t['Terminal']['deviceno'], "Transwithdrawal", "Issuer", $response),								
				'total_cash_out' 			=> $this->countTermianlTransactions($t['Terminal']['deviceno'], "Transcashout", "Issuer", $response),								
				'total_purchase' 			=> $this->countTermianlTransactions($t['Terminal']['deviceno'], "Transpurchase", "Issuer", $response),								
				'total_fund_transfer' 		=> $this->countTermianlTransactions($t['Terminal']['deviceno'], "Transinterbank", "Issuer", $response),								
				'total_cash_load' 			=> $this->countTermianlTransactions($t['Terminal']['deviceno'], "Transloadcash", "Issuer", $response),								
				'total_bills_payment' 		=> $this->countTermianlTransactions($t['Terminal']['deviceno'], "Transbillspayment", "Issuer", $response)
			
			);
			
			
		endforeach;
		
		/*
		return json_encode(array(
			"onus_data" => $terminals,
			//"aqc_data" => $_acq_data,
			//"iss_data" => $_iss_data
			)
		);
		*/
		
		$this->set("_onus_data", $_onus_data);
		$this->set("_acq_data", $_acq_data);
		$this->set("_iss_data", $_iss_data);
		
		$this->render();
	}
	
	private function countTermianlTransactions($deviceno, $model, $_transtype, $response){
		
		//$transtype = array("On Us", "Acquirer", "Issuer");
		
		//if(in_array($_transtype, $transtype)){			
			return $this->Terminal->{$model}->find('count', array(
					'conditions' => array(
						$model.'.deviceno' 			=> $deviceno,
						$model.'.transaction_type' 	=> $_transtype,
						$model.'.response' 			=> $response
					)
				)
			);
			
		//}else{
			//return 0;
		//}
	}
	
	
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Terminal->recursive =0;
		//$this->set('terminals', $this->Paginator->paginate());
		$this->set('terminals', $this->Terminal->find('all'));
	}
	
	private function getAuthor(){
		return $this->Auth->user('username');
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Terminal->exists($id)) {
			throw new NotFoundException(__('Invalid terminal'));
		}
		$options = array('conditions' => array('Terminal.' . $this->Terminal->primaryKey => $id));
		$this->set('terminal', $this->Terminal->find('first', $options));
	}
	
	
	private function getlastPOSNumber(){
		$this->Terminal->recursive = -1;
		$device = $this->Terminal->find('first', array(
				'fields' => array(
					'deviceno'				
				),
				'order' => array(
					'id' => 'DESC'
				)
			)
		);
		
		if(!empty($device)){
			return $device['Terminal']['deviceno'] + 1;			
		}else{		
			return $this->getBankDetail('bankcode')."000001";
		}
	}
	
	
	
	private function getBankDetail($field=null){		
		$this->LoadModel('Setting');
		$this->Setting->recursive = -2;
		$bin = $this->Setting->findById(1);
		
		if(isset($field) && !empty($field)){
			return $bin['Setting'][$field];
		}else{
			return $bin;
		}
	}
	
/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->set('author', $this->getAuthor());
		$this->set('deviceno', ''); //$this->getlastPOSNumber());
		
		if ($this->request->is('post')) {
			$this->Terminal->create();
			if ($this->Terminal->save($this->request->data)) {
				//$this->Session->setFlash(__('The terminal has been saved.'));
				$this->Message->msgCommonSuccess();
				return $this->redirect(array('action' => 'add'));
			} else {
				//$this->Session->setFlash(__('The terminal could not be saved. Please, try again.'));
				$this->Message->msgCommonError();
			}
		}
		
		$branches = $this->Terminal->Branch->find('list');
		$this->set(compact('branches'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->set('author', $this->getAuthor());
			

		if (!$this->Terminal->exists($id)) {
			throw new NotFoundException(__('Invalid terminal'));
		}
		
		$this->Terminal->recursive=-1;
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Terminal->save($this->request->data)) {
				//$this->Session->setFlash(__('The terminal has been saved.'));
				$this->Message->msgCommonUpdate();
				return $this->redirect(array('action' => 'edit', $id));
			} else {
				//$this->Session->setFlash(__('The terminal could not be saved. Please, try again.'));
				$this->Message->msgCommonError();
			}
		} else {
			
			$options = array('conditions' => array('Terminal.' . $this->Terminal->primaryKey => $id));
			$this->request->data = $this->Terminal->find('first', $options);
		}
		
		
		$branches = $this->Terminal->Branch->find('list');
		$this->set(compact('branches'));
		
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Terminal->id = $id;
		if (!$this->Terminal->exists()) {
			throw new NotFoundException(__('Invalid terminal'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Terminal->delete()) {
			$this->Session->setFlash(__('The terminal has been deleted.'));
		} else {
			$this->Session->setFlash(__('The terminal could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
