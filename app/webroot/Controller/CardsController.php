<?php
App::uses('AppController', 'Controller');
App::uses('AuthComponent', 'Controller/Component');

/**
 * Cards Controller
 *
 * @property Card $Card
 * @property PaginatorComponent $Paginator
 */
class CardsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Upload');
	
	function beforeFilter(){	
		parent::beforeFilter();	
       // $this->set('breadcrumbs', $this->Common->setBreadcrumb(isset($this->params['url']['url']) ? $this->params['url']['url'] : 'Home'));
		if($this->params['action']=="home"){
			return $this->redirect(array('action' => 'index'));
		}
    }
	
	
	
	public function upload_reissuance(){
		
	}
	
	public function received_cards(){
		
	}
	
	public function generate_alltranstype($response, $date_from=null, $date_to=null){
		
		$this->layout = 'pdf';		
		$this->view = 'generate_alltranstype_report';		
		$this->set('date_from', $date_from);		
		$this->set('date_to', $date_to);		
		$this->set('response', $response);		
		$this->set('title', !empty($date_from) && !empty($date_to) ? $date_from.' - '.$date_to : date('Y-m-d H:i:s'));

		switch($response){
			case "Approved": $filename = 'approved_alltrans'; break;
			case "Rejected": $filename = 'rejected_alltrans'; break;
			case "Reversal": $filename = 'reversal_alltrans'; break;		
		}
		
		$this->set('filename', $filename);
		
		/*$this->layout = 'ajax';
		$this->autoRender = false;
		$this->view = false;*/
		
		$date_from 	= (isset($date_from) && !empty($date_from)) ? $date_from : '2018-07-01'; //date('Y-m-d');
		$date_to 	= (isset($date_to) && !empty($date_to)) ? $date_to : '2018-10-10'; //date('Y-m-d');
		$_onus = array();
		$_acquirer = array();
		$_issuer = array();
		$__onus = array();
		$__issuer = array();
		$__acquirer = array();
		
		
		$_onus = array(
			"Purchase" 		=> $this->generate_alltranstype_report("On Us", $response, "Transpurchase", $date_from, $date_to),			
			"Withdrawal" 	=> $this->generate_alltranstype_report("On Us", $response, "Transwithdrawal", $date_from, $date_to),			
			"Cashout" 		=> $this->generate_alltranstype_report("On Us", $response, "Transcashout", $date_from, $date_to),			
			"Loadcash" 		=> $this->generate_alltranstype_report("On Us", $response, "Transloadcash", $date_from, $date_to),			
			"Balance" 		=> $this->generate_alltranstype_report("On Us", $response, "Transbalanceinquiry", $date_from, $date_to),			
			"Fundtransfer" 	=> $this->generate_alltranstype_report("On Us", $response, "Transinterbank", $date_from, $date_to),			
			"Billspayment" 	=> $this->generate_alltranstype_report("On Us", $response, "Transbillspayment", $date_from, $date_to)			
		);
		$_acquirer = array(
			"Purchase" 		=> $this->generate_alltranstype_report("Acquirer", $response, "Transpurchase", $date_from, $date_to),			
			"Withdrawal" 	=> $this->generate_alltranstype_report("Acquirer", $response, "Transwithdrawal", $date_from, $date_to),			
			"Cashout" 		=> $this->generate_alltranstype_report("Acquirer", $response, "Transcashout", $date_from, $date_to),			
			"Loadcash" 		=> $this->generate_alltranstype_report("Acquirer", $response, "Transloadcash", $date_from, $date_to),			
			"Balance" 		=> $this->generate_alltranstype_report("Acquirer", $response, "Transbalanceinquiry", $date_from, $date_to),			
			"Fundtransfer" 	=> $this->generate_alltranstype_report("Acquirer", $response, "Transinterbank", $date_from, $date_to),			
			"Billspayment" 	=> $this->generate_alltranstype_report("Acquirer", $response, "Transbillspayment", $date_from, $date_to)			
		);
		
		$_issuer = array(
			"Purchase" 		=> $this->generate_alltranstype_report("Issuer", $response, "Transpurchase", $date_from, $date_to),			
			"Withdrawal" 	=> $this->generate_alltranstype_report("Issuer", $response, "Transwithdrawal", $date_from, $date_to),			
			"Cashout" 		=> $this->generate_alltranstype_report("Issuer", $response, "Transcashout", $date_from, $date_to),			
			"Loadcash" 		=> $this->generate_alltranstype_report("Issuer", $response, "Transloadcash", $date_from, $date_to),			
			"Balance" 		=> $this->generate_alltranstype_report("Issuer", $response, "Transbalanceinquiry", $date_from, $date_to),			
			"Fundtransfer" 	=> $this->generate_alltranstype_report("Issuer", $response, "Transinterbank", $date_from, $date_to),			
			"Billspayment" 	=> $this->generate_alltranstype_report("Issuer", $response, "Transbillspayment", $date_from, $date_to)			
		);
		

		/*-------------
		
		| ON US
		--------------*/
		
		
		foreach($_onus["Purchase"] as $_t): 
			$__onus[] = array(
				"transdate" 			=> $_t["Transpurchase"]["transdate"],
				"cardno" 				=> $_t["Transpurchase"]["cardno"],
				"trace_number"			=> $_t["Transpurchase"]["trace_number"],
				"transaction_type"		=> $_t["Transpurchase"]["transaction_type"],
				"processing_code"		=> $_t["Transpurchase"]["processing_code"],
				"channels"				=> $_t["Transpurchase"]["channels"],
				"deviceno"				=> $_t["Transpurchase"]["deviceno"],
				"response"				=> $_t["Transpurchase"]["response"],
				"transaction_amount" 	=> $_t["Transpurchase"]["transaction_amount"]
			);
		endforeach;
		
		foreach($_onus["Withdrawal"] as $_t): 
			$__onus[] = array(
				"transdate" 			=> $_t["Transwithdrawal"]["transdate"],
				"cardno" 				=> $_t["Transwithdrawal"]["cardno"],
				"trace_number"			=> $_t["Transwithdrawal"]["trace_number"],
				"transaction_type"		=> $_t["Transwithdrawal"]["transaction_type"],
				"processing_code"		=> $_t["Transwithdrawal"]["processing_code"],
				"channels"				=> $_t["Transwithdrawal"]["channels"],
				"deviceno"				=> $_t["Transwithdrawal"]["deviceno"],
				"response"				=> $_t["Transwithdrawal"]["response"],
				"transaction_amount" 	=> $_t["Transwithdrawal"]["transaction_amount"]
			);
		endforeach;
		
		foreach($_onus["Cashout"] as $_t): 
			$__onus[] = array(
				"transdate" 			=> $_t["Transcashout"]["transdate"],
				"cardno" 				=> $_t["Transcashout"]["cardno"],
				"trace_number"			=> $_t["Transcashout"]["trace_number"],
				"transaction_type"		=> $_t["Transcashout"]["transaction_type"],
				"processing_code"		=> $_t["Transcashout"]["processing_code"],
				"channels"				=> $_t["Transcashout"]["channels"],
				"deviceno"				=> $_t["Transcashout"]["deviceno"],
				"response"				=> $_t["Transcashout"]["response"],
				"transaction_amount" 	=> $_t["Transcashout"]["transaction_amount"]
			);
		endforeach;
		
		foreach($_onus["Loadcash"] as $_t): 
			$__onus[] = array(
				"transdate" 			=> $_t["Transloadcash"]["transdate"],
				"cardno" 				=> $_t["Transloadcash"]["cardno"],
				"trace_number"			=> $_t["Transloadcash"]["trace_number"],
				"transaction_type"		=> $_t["Transloadcash"]["transaction_type"],
				"processing_code"		=> $_t["Transloadcash"]["processing_code"],
				"channels"				=> $_t["Transloadcash"]["channels"],
				"deviceno"				=> $_t["Transloadcash"]["deviceno"],
				"response"				=> $_t["Transloadcash"]["response"],
				"transaction_amount" 	=> $_t["Transloadcash"]["transaction_amount"]
			);
		endforeach;
		
		foreach($_onus["Balance"] as $_t): 
			$__onus[] = array(
				"transdate" 			=> $_t["Transbalanceinquiry"]["transdate"],
				"cardno" 				=> $_t["Transbalanceinquiry"]["cardno"],
				"trace_number"			=> $_t["Transbalanceinquiry"]["trace_number"],
				"transaction_type"		=> $_t["Transbalanceinquiry"]["transaction_type"],
				"processing_code"		=> $_t["Transbalanceinquiry"]["processing_code"],
				"channels"				=> $_t["Transbalanceinquiry"]["channels"],
				"deviceno"				=> $_t["Transbalanceinquiry"]["deviceno"],
				"response"				=> $_t["Transbalanceinquiry"]["response"],
				"transaction_amount" 	=> $_t["Transbalanceinquiry"]["transaction_amount"]
			);
		endforeach;
		
		foreach($_onus["Fundtransfer"] as $_t): 
			$__onus[] = array(
				"transdate" 			=> $_t["Transinterbank"]["transdate"],
				"cardno" 				=> $_t["Transinterbank"]["cardno"],
				"trace_number"			=> $_t["Transinterbank"]["trace_number"],
				"transaction_type"		=> $_t["Transinterbank"]["transaction_type"],
				"processing_code"		=> $_t["Transinterbank"]["processing_code"],
				"channels"				=> $_t["Transinterbank"]["channels"],
				"deviceno"				=> $_t["Transinterbank"]["deviceno"],
				"response"				=> $_t["Transinterbank"]["response"],
				"transaction_amount" 	=> $_t["Transinterbank"]["transaction_amount"]
			);
		endforeach;
		
		foreach($_onus["Billspayment"] as $_t): 
			$__onus[] = array(
				"transdate" 			=> $_t["Transbillspayment"]["transdate"],
				"cardno" 				=> $_t["Transbillspayment"]["cardno"],
				"trace_number"			=> $_t["Transbillspayment"]["trace_number"],
				"transaction_type"		=> $_t["Transbillspayment"]["transaction_type"],
				"processing_code"		=> $_t["Transbillspayment"]["processing_code"],
				"channels"				=> $_t["Transbillspayment"]["channels"],
				"deviceno"				=> $_t["Transbillspayment"]["deviceno"],
				"response"				=> $_t["Transbillspayment"]["response"],
				"transaction_amount" 	=> $_t["Transbillspayment"]["transaction_amount"]
			);
		endforeach;
		
		
		/*-------------
		
		| ACQUIRER
		--------------*/
		
		
		foreach($_acquirer["Purchase"] as $_t): 
			$__acquirer[] = array(
				"transdate" 			=> $_t["Transpurchase"]["transdate"],
				"cardno" 				=> $_t["Transpurchase"]["cardno"],
				"trace_number"			=> $_t["Transpurchase"]["trace_number"],
				"transaction_type"		=> $_t["Transpurchase"]["transaction_type"],
				"processing_code"		=> $_t["Transpurchase"]["processing_code"],
				"channels"				=> $_t["Transpurchase"]["channels"],
				"deviceno"				=> $_t["Transpurchase"]["deviceno"],
				"response"				=> $_t["Transpurchase"]["response"],
				"transaction_amount" 	=> $_t["Transpurchase"]["transaction_amount"]
			);
		endforeach;
		
		foreach($_acquirer["Withdrawal"] as $_t): 
			$__acquirer[] = array(
				"transdate" 			=> $_t["Transwithdrawal"]["transdate"],
				"cardno" 				=> $_t["Transwithdrawal"]["cardno"],
				"trace_number"			=> $_t["Transwithdrawal"]["trace_number"],
				"transaction_type"		=> $_t["Transwithdrawal"]["transaction_type"],
				"processing_code"		=> $_t["Transwithdrawal"]["processing_code"],
				"channels"				=> $_t["Transwithdrawal"]["channels"],
				"deviceno"				=> $_t["Transwithdrawal"]["deviceno"],
				"response"				=> $_t["Transwithdrawal"]["response"],
				"transaction_amount" 	=> $_t["Transwithdrawal"]["transaction_amount"]
			);
		endforeach;
		
		foreach($_acquirer["Cashout"] as $_t): 
			$__acquirer[] = array(
				"transdate" 			=> $_t["Transcashout"]["transdate"],
				"cardno" 				=> $_t["Transcashout"]["cardno"],
				"trace_number"			=> $_t["Transcashout"]["trace_number"],
				"transaction_type"		=> $_t["Transcashout"]["transaction_type"],
				"processing_code"		=> $_t["Transcashout"]["processing_code"],
				"channels"				=> $_t["Transcashout"]["channels"],
				"deviceno"				=> $_t["Transcashout"]["deviceno"],
				"response"				=> $_t["Transcashout"]["response"],
				"transaction_amount" 	=> $_t["Transcashout"]["transaction_amount"]
			);
		endforeach;
		
		foreach($_acquirer["Loadcash"] as $_t): 
			$__acquirer[] = array(
				"transdate" 			=> $_t["Transloadcash"]["transdate"],
				"cardno" 				=> $_t["Transloadcash"]["cardno"],
				"trace_number"			=> $_t["Transloadcash"]["trace_number"],
				"transaction_type"		=> $_t["Transloadcash"]["transaction_type"],
				"processing_code"		=> $_t["Transloadcash"]["processing_code"],
				"channels"				=> $_t["Transloadcash"]["channels"],
				"deviceno"				=> $_t["Transloadcash"]["deviceno"],
				"response"				=> $_t["Transloadcash"]["response"],
				"transaction_amount" 	=> $_t["Transloadcash"]["transaction_amount"]
			);
		endforeach;
		
		foreach($_acquirer["Balance"] as $_t): 
			$__acquirer[] = array(
				"transdate" 			=> $_t["Transbalanceinquiry"]["transdate"],
				"cardno" 				=> $_t["Transbalanceinquiry"]["cardno"],
				"trace_number"			=> $_t["Transbalanceinquiry"]["trace_number"],
				"transaction_type"		=> $_t["Transbalanceinquiry"]["transaction_type"],
				"processing_code"		=> $_t["Transbalanceinquiry"]["processing_code"],
				"channels"				=> $_t["Transbalanceinquiry"]["channels"],
				"deviceno"				=> $_t["Transbalanceinquiry"]["deviceno"],
				"response"				=> $_t["Transbalanceinquiry"]["response"],
				"transaction_amount" 	=> $_t["Transbalanceinquiry"]["transaction_amount"]
			);
		endforeach;
		
		foreach($_acquirer["Fundtransfer"] as $_t): 
			$__acquirer[] = array(
				"transdate" 			=> $_t["Transinterbank"]["transdate"],
				"cardno" 				=> $_t["Transinterbank"]["cardno"],
				"trace_number"			=> $_t["Transinterbank"]["trace_number"],
				"transaction_type"		=> $_t["Transinterbank"]["transaction_type"],
				"processing_code"		=> $_t["Transinterbank"]["processing_code"],
				"channels"				=> $_t["Transinterbank"]["channels"],
				"deviceno"				=> $_t["Transinterbank"]["deviceno"],
				"response"				=> $_t["Transinterbank"]["response"],
				"transaction_amount" 	=> $_t["Transinterbank"]["transaction_amount"]
			);
		endforeach;
		
		foreach($_acquirer["Billspayment"] as $_t): 
			$__acquirer[] = array(
				"transdate" 			=> $_t["Transbillspayment"]["transdate"],
				"cardno" 				=> $_t["Transbillspayment"]["cardno"],
				"trace_number"			=> $_t["Transbillspayment"]["trace_number"],
				"transaction_type"		=> $_t["Transbillspayment"]["transaction_type"],
				"processing_code"		=> $_t["Transbillspayment"]["processing_code"],
				"channels"				=> $_t["Transbillspayment"]["channels"],
				"deviceno"				=> $_t["Transbillspayment"]["deviceno"],
				"response"				=> $_t["Transbillspayment"]["response"],
				"transaction_amount" 	=> $_t["Transbillspayment"]["transaction_amount"]
			);
		endforeach;
		
		
		/*-------------
		
		| ISSUER
		--------------*/
		
		
		foreach($_issuer["Purchase"] as $_t): 
			$__issuer[] = array(
				"transdate" 			=> $_t["Transpurchase"]["transdate"],
				"cardno" 				=> $_t["Transpurchase"]["cardno"],
				"trace_number"			=> $_t["Transpurchase"]["trace_number"],
				"transaction_type"		=> $_t["Transpurchase"]["transaction_type"],
				"processing_code"		=> $_t["Transpurchase"]["processing_code"],
				"channels"				=> $_t["Transpurchase"]["channels"],
				"deviceno"				=> $_t["Transpurchase"]["deviceno"],
				"response"				=> $_t["Transpurchase"]["response"],
				"transaction_amount" 	=> $_t["Transpurchase"]["transaction_amount"]
			);
		endforeach;
		
		foreach($_issuer["Withdrawal"] as $_t): 
			$__issuer[] = array(
				"transdate" 			=> $_t["Transwithdrawal"]["transdate"],
				"cardno" 				=> $_t["Transwithdrawal"]["cardno"],
				"trace_number"			=> $_t["Transwithdrawal"]["trace_number"],
				"transaction_type"		=> $_t["Transwithdrawal"]["transaction_type"],
				"processing_code"		=> $_t["Transwithdrawal"]["processing_code"],
				"channels"				=> $_t["Transwithdrawal"]["channels"],
				"deviceno"				=> $_t["Transwithdrawal"]["deviceno"],
				"response"				=> $_t["Transwithdrawal"]["response"],
				"transaction_amount" 	=> $_t["Transwithdrawal"]["transaction_amount"]
			);
		endforeach;
		
		foreach($_issuer["Cashout"] as $_t): 
			$__issuer[] = array(
				"transdate" 			=> $_t["Transcashout"]["transdate"],
				"cardno" 				=> $_t["Transcashout"]["cardno"],
				"trace_number"			=> $_t["Transcashout"]["trace_number"],
				"transaction_type"		=> $_t["Transcashout"]["transaction_type"],
				"processing_code"		=> $_t["Transcashout"]["processing_code"],
				"channels"				=> $_t["Transcashout"]["channels"],
				"deviceno"				=> $_t["Transcashout"]["deviceno"],
				"response"				=> $_t["Transcashout"]["response"],
				"transaction_amount" 	=> $_t["Transcashout"]["transaction_amount"]
			);
		endforeach;
		
		foreach($_issuer["Loadcash"] as $_t): 
			$__issuer[] = array(
				"transdate" 			=> $_t["Transloadcash"]["transdate"],
				"cardno" 				=> $_t["Transloadcash"]["cardno"],
				"trace_number"			=> $_t["Transloadcash"]["trace_number"],
				"transaction_type"		=> $_t["Transloadcash"]["transaction_type"],
				"processing_code"		=> $_t["Transloadcash"]["processing_code"],
				"channels"				=> $_t["Transloadcash"]["channels"],
				"deviceno"				=> $_t["Transloadcash"]["deviceno"],
				"response"				=> $_t["Transloadcash"]["response"],
				"transaction_amount" 	=> $_t["Transloadcash"]["transaction_amount"]
			);
		endforeach;
		
		foreach($_issuer["Balance"] as $_t): 
			$__issuer[] = array(
				"transdate" 			=> $_t["Transbalanceinquiry"]["transdate"],
				"cardno" 				=> $_t["Transbalanceinquiry"]["cardno"],
				"trace_number"			=> $_t["Transbalanceinquiry"]["trace_number"],
				"transaction_type"		=> $_t["Transbalanceinquiry"]["transaction_type"],
				"processing_code"		=> $_t["Transbalanceinquiry"]["processing_code"],
				"channels"				=> $_t["Transbalanceinquiry"]["channels"],
				"deviceno"				=> $_t["Transbalanceinquiry"]["deviceno"],
				"response"				=> $_t["Transbalanceinquiry"]["response"],
				"transaction_amount" 	=> $_t["Transbalanceinquiry"]["transaction_amount"]
			);
		endforeach;
		
		foreach($_issuer["Fundtransfer"] as $_t): 
			$__issuer[] = array(
				"transdate" 			=> $_t["Transinterbank"]["transdate"],
				"cardno" 				=> $_t["Transinterbank"]["cardno"],
				"trace_number"			=> $_t["Transinterbank"]["trace_number"],
				"transaction_type"		=> $_t["Transinterbank"]["transaction_type"],
				"processing_code"		=> $_t["Transinterbank"]["processing_code"],
				"channels"				=> $_t["Transinterbank"]["channels"],
				"deviceno"				=> $_t["Transinterbank"]["deviceno"],
				"response"				=> $_t["Transinterbank"]["response"],
				"transaction_amount" 	=> $_t["Transinterbank"]["transaction_amount"]
			);
		endforeach;
		
		foreach($_issuer["Billspayment"] as $_t): 
			$__issuer[] = array(
				"transdate" 			=> $_t["Transbillspayment"]["transdate"],
				"cardno" 				=> $_t["Transbillspayment"]["cardno"],
				"trace_number"			=> $_t["Transbillspayment"]["trace_number"],
				"transaction_type"		=> $_t["Transbillspayment"]["transaction_type"],
				"processing_code"		=> $_t["Transbillspayment"]["processing_code"],
				"channels"				=> $_t["Transbillspayment"]["channels"],
				"deviceno"				=> $_t["Transbillspayment"]["deviceno"],
				"response"				=> $_t["Transbillspayment"]["response"],
				"transaction_amount" 	=> $_t["Transbillspayment"]["transaction_amount"]
			);
		endforeach;
		

		$this->set("__onus", $__onus);
		$this->set("__acquirer", $__acquirer);
		$this->set("__issuer", $__issuer);
		
		$this->render();
		
		
	}
	
	public function generate_alltranstype_report($transtype, $response, $model, $date_from=null, $date_to=null){
		
		$this->Card->{$model}->recursive=-1;
		$trans = $this->Card->{$model}->find('all', array(
			'conditions' => array(
				$model.'.transaction_type' => $transtype,
				$model.'.response' => $response,
				$model.'.transdate BETWEEN ? AND ?' => array(
					$date_from, $date_to
				)
			)
		));
		
		return $trans;
	}
	
	public function generate_mass_enrollment_report($date_from=null, $date_to=null){
		$this->layout 	= 'pdf';		
		$this->set('date_from', $date_from);		
		$this->set('date_to', $date_to);		
		$this->set('title', !empty($date_from) && !empty($date_to) ? $date_from.' - '.$date_to : date('Y-m-d H:i:s'));
		//$this->set('trans', $trans);
		$this->set('filename', 'mass_enrollment');
				
		$this->render();
	}
	
	public function generate_audit_trail_report($date_from=null, $date_to=null){
		$this->layout 	= 'pdf';		
		$this->set('date_from', $date_from);		
		$this->set('date_to', $date_to);		
		$this->set('title', !empty($date_from) && !empty($date_to) ? $date_from.' - '.$date_to : date('Y-m-d H:i:s'));
		//$this->set('trans', $trans);
		$this->set('filename', 'audit_trail');
				
		$this->render();
	}
	
	public function generate_total_balances_report($date_from=null, $date_to=null){
		$this->layout 	= 'pdf';		
		$this->set('date_from', $date_from);		
		$this->set('date_to', $date_to);		
		$this->set('title', !empty($date_from) && !empty($date_to) ? $date_from.' - '.$date_to : date('Y-m-d H:i:s'));
		//$this->set('trans', $trans);
		$this->set('filename', 'total_balance');
				
		$this->render();
	}
	
	public function generate_summary_of_expired_cards($date_from=null, $date_to=null){
		$this->layout 	= 'pdf';		
		$this->set('date_from', $date_from);		
		$this->set('date_to', $date_to);		
		$this->set('title', !empty($date_from) && !empty($date_to) ? $date_from.' - '.$date_to : 'ALL');
		//$this->set('trans', $trans);
		$this->set('filename', 'total_balance');
				
		$this->render();
	}
	
	public function generate_cardstatus_report($status, $date_from=null, $date_to=null){	
		$this->layout 	= 'pdf';		
		
		
		switch($status){
			case "1":
				$trans =  $this->countCardStatus(1, $date_from, $date_to);
				$filename = 'activated_card';
				$view = 'generate_cardstatus_activated_report';
			break;
			case "5":
			case "6":
				$trans = $this->countCardStatus(array(5,6), $date_from, $date_to);
				$filename = 'blocked_card';
				$view = 'generate_cardstatus_blocked_report';
			break;
			case "7":
				$trans = $this->countCardStatus("expired", $date_from, $date_to);
				$filename = 'expired_card';
				$view = 'generate_cardstatus_expired_report';
			break;
		}		
		
		$this->set('date_from', $date_from);		
		$this->set('date_to', $date_to);		
		$this->set('title', !empty($date_from) && !empty($date_to) ? $date_from.' - '.$date_to : 'ALL');
		$this->set('trans', $trans);
		$this->set('filename', $filename);
		$this->view = $view;
		
		$this->render();
	}
	
	private function countCardStatus($status, $date_from=null, $date_to=null){
			$this->Card->recursive=0;
			$fields = array(				
				'Cardholder.fullname',
				'Card.cardno',
				'Product.name',
				'Card.embossed_name',
				'Card.approved_by',
				'Card.registration',
				'Card.modified',
				'Card.activated',
				'Card.approved_by'
			);
			
			if(!empty($date_from) && !empty($date_to)){
					if($date_to >= $date_from){
						$trans = $this->Card->find('all', 
							array(
								'conditions' => array(							
									'Card.modified BETWEEN ? AND ?' => array(
										$date_from, $date_to
									),
									'Card.cardstatus_id' => $status
								),															
								'order' => array(
									'Card.modified' => 'DESC'
								),
								'fields' => $fields			
							)							
						);
					}else{
						$trans = false;
					}
				}else{
					$trans = $this->Card->find('all', array(
							'conditions' => array(														
								'Card.cardstatus_id' => $status
							),
							'order' => array(
								'Card.modified' => 'DESC'
							),
							'fields' => $fields	
						)
					);
				}
		
		return $trans;
	}
	
		
	private function generate_main_report($date_from=null, $date_to=null){	
		$this->layout = 'pdf'; 
		$this->set('trans', $this->getListofTransactions($date_from, $date_to));
		$this->set('file_name', !empty($date_from) && !empty($date_to) ? 'Purchase_'.$date_from.'-'.$date_to : 'Purchase_'.date('Y-m-d'));
		$this->set('title', !empty($date_from) && !empty($date_to) ? $date_from.'-'.$date_to : date('Y-m-d'));
		$this->render();
	}
	
	
	public function generate_transaction_report($type=null, $status=null, $date_from=null, $date_to=null){	
		switch($type){
			case "onus": 
				$_type = "On Us"; 
				$opt = "onus"; 
				$view = 'generate_transaction_report_onus';
			break;
			case "acquirer": 
				$_type = "Acquirer"; 
				$opt = "acq"; 
				$view = 'generate_transaction_report_acquirer';
			break;
			case "issuer": 
				$_type = "Issuer"; 
				$opt = "iss"; 
				$view = 'generate_transaction_report_issuer';
			break;
			
			
		}
		
		switch($status){
			case "Approved":
				switch($type){
					case "onus": 
							$filename = "approved_trans_onus"; 					
					break;
					case "acquirer": 
							$filename = "approved_trans_acquirer"; 	
					break;
					case "issuer": 
							$filename = "approved_trans_issuer"; 									
					break;					
				}					
			break;
			case "Rejected":
				switch($type){
					case "onus": 
							$filename = "rejected_trans_onus"; 							
					break;
					case "acquirer": 
							$filename = "rejected_trans_acquirer"; 						
					break;
					case "issuer": 
							$filename = "rejected_trans_issuer"; 						
					break;					
				}	
			break;
			case "Reversal":
				switch($type){
					case "onus": 
							$filename = "reversal_trans_onus"; 
					break;
					case "acquirer": 
							$filename = "reversal_trans_acquirer"; 
					break;
					case "issuer": 
							$filename = "reversal_trans_issuer";
					break;					
				}	
			break;
		}
		
		
		
		//$this->layout = 'ajax';
		/*$this->view = false;
		//$this->autoRender = false;*/
		$this->layout 	= 'pdf';
		$this->view 	= $view;
		
		$this->set('filename', $filename);
		$this->set('date_from', $date_from);
		$this->set('status', strtoupper($status));
		$this->set('date_to', $date_to);
		$this->set('title', !empty($date_from) && !empty($date_to) ? $date_from.' - '.$date_to : 'ALL');
		
		/*${$opt."__balance_inquiries"} = $this->getAllCustomTransactions($date_from, $date_to, 'Transbalanceinquiry', $type, "Balance Inquiry", $status);		
		echo json_encode(${$opt."__balance_inquiries"});
		*/
		
		$this->set($opt.'_balance_inquiries', $this->getAllCustomTransactions($date_from, $date_to, 'Transbalanceinquiry', $_type, "Balance Inquiry", $status));
		$this->set($opt.'_balinq_total_proc', $this->getTotalTransAmount($date_from, $date_to,'Transbalanceinquiry',  $_type, "Balance Inquiry", $status));		
		$this->set($opt.'_purchase', $this->getAllCustomTransactions($date_from, $date_to, 'Transpurchase',  $_type, "Purchase", $status));
		$this->set($opt.'_purchase_total_proc', $this->getTotalTransAmount($date_from, $date_to, 'Transpurchase',  $_type, "Purchase", $status));
		$this->set($opt.'_withdrawals', $this->getAllCustomTransactions($date_from, $date_to, 'Transwithdrawal',  $_type, "Withdrawal", $status));
		$this->set($opt.'_withdrawals_total_proc', $this->getTotalTransAmount($date_from, $date_to, 'Transwithdrawal',  $_type, "Withdrawal", $status));
		$this->set($opt.'_loadcash', $this->getAllCustomTransactions($date_from, $date_to, 'Transloadcash',  $_type, "Cash Load", $status));
		$this->set($opt.'_loadcash_total_proc', $this->getTotalTransAmount($date_from, $date_to, 'Transloadcash',  $_type, "Cash Load", $status));
		$this->set($opt.'_billspayment', $this->getAllCustomTransactions($date_from, $date_to, 'Transbillspayment',  $_type, "Bills Payment", $status));
		$this->set($opt.'_billspayment_total_proc', $this->getTotalTransAmount($date_from, $date_to, 'Transbillspayment',  $_type, "Bills Payment", $status));
		$this->set($opt.'_changepin', $this->getAllCustomTransactions($date_from, $date_to, 'Transchangepin',  $_type, "Change Pin", $status));
		$this->set($opt.'_changepin_total_proc', $this->getTotalTransAmount($date_from, $date_to, 'Transchangepin',  $_type, "Change Pin", $status));
		$this->set($opt.'_cashout', $this->getAllCustomTransactions($date_from, $date_to, 'Transcashout',  $_type, "Cash Out", $status));
		$this->set($opt.'_cashout_total_proc', $this->getTotalTransAmount($date_from, $date_to, 'Transcashout',  $_type, "Cash Out", $status));
		

		$this->render();
		
	}
	
	
	
	public function generateMainReport($date_from=null, $date_to=null){
		/*$this->loadModel('Transwithdrawal');
		$this->loadModel('Transpurchase');
		$this->loadModel('Transchangepin');
		$this->loadModel('Transcashout');
		$this->loadModel('Transbalanceinquiry');
		$this->loadModel('Transbillspayment');
		$this->loadModel('Transloadcash');*/
		
		$this->layout = 'pdf'; 			
		$this->view = 'generate_main_report'; 
		$this->set('file_name', !empty($date_from) && !empty($date_to) ? 'Main_Report_'.$date_from.'-'.$date_to : 'Main_Report_'.date('Y-m-d'));
		$this->set('title', !empty($date_from) && !empty($date_to) ? $date_from.' - '.$date_to : date('Y-m-d'));
		
		//BALANCE INQRUIRY ON US
		$this->set('onus_balance_inquiries', $this->getAllCustomTransactions($date_from, $date_to, 'Transbalanceinquiry', 'On Us', 'Balance Inquiry'));
		$this->set('onus_balinq_total_proc', $this->getTotalTransAmount($date_from, $date_to, 'Transbalanceinquiry', 'On Us', 'Balance Inquiry'));
		$this->set('acq_balance_inquiries', $this->getAllCustomTransactions($date_from, $date_to, 'Transbalanceinquiry', 'Acquirer', 'Balance Inquiry'));
		$this->set('acq_balinq_total_proc', $this->getTotalTransAmount($date_from, $date_to, 'Transbalanceinquiry', 'Acquirer', 'Balance Inquiry'));
		$this->set('iss_balance_inquiries', $this->getAllCustomTransactions($date_from, $date_to, 'Transbalanceinquiry', 'Issuer', 'Balance Inquiry'));
		$this->set('iss_balinq_total_proc', $this->getTotalTransAmount($date_from, $date_to, 'Transbalanceinquiry', 'Issuer', 'Balance Inquiry'));
		//END OF BALANCE INQRUIRY
		
		//PURCHASE
		$this->set('onus_purchase', $this->getAllCustomTransactions($date_from, $date_to, 'Transpurchase', 'On Us', 'Purchase'));
		$this->set('onus_purchase_total_proc', $this->getTotalTransAmount($date_from, $date_to, 'Transpurchase', 'On Us', 'Purchase'));
		$this->set('acq_purchase', $this->getAllCustomTransactions($date_from, $date_to, 'Transpurchase', 'Acquirer', 'Purchase'));
		$this->set('acq_purchase_total_proc', $this->getTotalTransAmount($date_from, $date_to, 'Transpurchase', 'Acquirer', 'Purchase'));
		$this->set('iss_purchase', $this->getAllCustomTransactions($date_from, $date_to, 'Transpurchase', 'Issuer', 'Purchase'));
		$this->set('iss_purchase_total_proc', $this->getTotalTransAmount($date_from, $date_to, 'Transpurchase', 'Issuer', 'Purchase'));
		//END OF PURCHASE
		
		//WITHDRAWALS
		$this->set('onus_withdrawals', $this->getAllCustomTransactions($date_from, $date_to, 'Transwithdrawal', 'On Us', 'Withdrawal'));
		$this->set('onus_withdrawals_total_proc', $this->getTotalTransAmount($date_from, $date_to, 'Transwithdrawal', 'On Us', 'Withdrawal'));
		$this->set('acq_withdrawals', $this->getAllCustomTransactions($date_from, $date_to, 'Transwithdrawal', 'Acquirer', 'Withdrawal'));
		$this->set('acq_withdrawals_total_proc', $this->getTotalTransAmount($date_from, $date_to, 'Transwithdrawal', 'Acquirer', 'Withdrawal'));
		$this->set('iss_withdrawals', $this->getAllCustomTransactions($date_from, $date_to, 'Transwithdrawal', 'Issuer', 'Withdrawal'));
		$this->set('iss_withdrawals_total_proc', $this->getTotalTransAmount($date_from, $date_to, 'Transwithdrawal', 'Issuer', 'Withdrawal'));
		//END OF WITHDRAWALS
		
		//CASHLOAD
		$this->set('onus_loadcash', $this->getAllCustomTransactions($date_from, $date_to, 'Transloadcash', 'On Us', 'Cash Load'));
		$this->set('onus_loadcash_total_proc', $this->getTotalTransAmount($date_from, $date_to, 'Transloadcash', 'On Us', 'Cash Load'));
		$this->set('acq_loadcash', $this->getAllCustomTransactions($date_from, $date_to, 'Transloadcash', 'Acquirer', 'Cash Load'));
		$this->set('acq_loadcash_total_proc', $this->getTotalTransAmount($date_from, $date_to, 'Transloadcash', 'Acquirer', 'Cash Load'));
		$this->set('iss_loadcash', $this->getAllCustomTransactions($date_from, $date_to, 'Transloadcash', 'Issuer', 'Cash Load'));
		$this->set('iss_loadcash_total_proc', $this->getTotalTransAmount($date_from, $date_to, 'Transloadcash', 'Issuer', 'Cash Load'));
		//END OF CASHLOAD
		
		//BILLS PAYMENT
		$this->set('onus_billspayment', $this->getAllCustomTransactions($date_from, $date_to, 'Transbillspayment', 'On Us', 'Bills Payment'));
		$this->set('onus_billspayment_total_proc', $this->getTotalTransAmount($date_from, $date_to, 'Transbillspayment', 'On Us', 'Bills Payment'));
		$this->set('acq_billspayment', $this->getAllCustomTransactions($date_from, $date_to, 'Transbillspayment', 'Acquirer', 'Bills Payment'));
		$this->set('acq_billspayment_total_proc', $this->getTotalTransAmount($date_from, $date_to, 'Transbillspayment', 'Acquirer', 'Bills Payment'));
		$this->set('iss_billspayment', $this->getAllCustomTransactions($date_from, $date_to, 'Transbillspayment', 'Issuer', 'Bills Payment'));
		$this->set('iss_billspayment_total_proc', $this->getTotalTransAmount($date_from, $date_to, 'Transbillspayment', 'Issuer', 'Bills Payment'));
		//END OF BILLS PAYMENT
				
		//CASHOUT
		$this->set('onus_cashout', $this->getAllCustomTransactions($date_from, $date_to, 'Transcashout', 'On Us', 'Cash Out'));
		$this->set('onus_cashout_total_proc', $this->getTotalTransAmount($date_from, $date_to, 'Transcashout', 'On Us', 'Cash Out'));
		$this->set('acq_cashout', $this->getAllCustomTransactions($date_from, $date_to, 'Transcashout', 'Acquirer', 'Cash Out'));
		$this->set('acq_cashout_total_proc', $this->getTotalTransAmount($date_from, $date_to, 'Transcashout', 'Acquirer', 'Cash Out'));
		$this->set('iss_cashout', $this->getAllCustomTransactions($date_from, $date_to, 'Transcashout', 'Issuer', 'Cash Out'));
		$this->set('iss_cashout_total_proc', $this->getTotalTransAmount($date_from, $date_to, 'Transcashout', 'Issuer', 'Cash Out'));
		//CASHOUT
		
		//CHANGE PIN
		$this->set('onus_changepin', $this->getAllCustomTransactions($date_from, $date_to, 'Transchangepin', 'On Us', 'Change Pin'));
		$this->set('onus_changepin_total_proc', $this->getTotalTransAmount($date_from, $date_to, 'Transchangepin', 'On Us', 'Change Pin'));
		$this->set('acq_changepin', $this->getAllCustomTransactions($date_from, $date_to, 'Transchangepin', 'Acquirer', 'Change Pin'));
		$this->set('acq_changepin_total_proc', $this->getTotalTransAmount($date_from, $date_to, 'Transchangepin', 'Acquirer', 'Change Pin'));
		$this->set('iss_changepin', $this->getAllCustomTransactions($date_from, $date_to, 'Transchangepin', 'Issuer', 'Change Pin'));
		$this->set('iss_changepin_total_proc', $this->getTotalTransAmount($date_from, $date_to, 'Transchangepin', 'Issuer', 'Change Pin'));
		//CHANGE PIN
		
		$this->render();	


		/*$this->layout = false;	
		$this->autoRender = false;	
		$this->view = false;	
		
		$onus_balance_inquiries = $this->getAllCustomTransactions($date_from, $date_to, 'Transbalanceinquiry', 'Acquirer', 'Balance Inquiry');
		$onus_balinq_total_proc = $this->getTotalTransAmount($date_from, $date_to, 'Transbalanceinquiry', 'Acquirer', 'Balance Inquiry');
		//$this->set('file_name', !empty($date_from) && !empty($date_to) ? 'Main_Report_'.$date_from.'-'.$date_to : 'Main_Report_'.date('Y-m-d'));
		//$this->set('title', !empty($date_from) && !empty($date_to) ? $date_from.'-'.$date_to : date('Y-m-d'));
		//$this->render();	
		
		var_dump($onus_balance_inquiries);
		echo "<br /><br />";
		echo "TOTAL" . var_dump($onus_balinq_total_proc);*/
			
	}
		
	
	private function getTotalTransAmount($date_from=null, $date_to=null, $model=null, $type=null, $code=null, $status=null){		
		$this->loadModel($model);		
		$this->{$model}->recursive =-1;
		//$status = isset($status) && !empty($status) ? $status : 'Approved';
		
		if(isset($status) && !empty($status)){
			if(!empty($date_to) && !empty($date_to) && ($date_to >= $date_from)){				
				$options = array(
					'conditions' => array(
						$model.'.transaction_type' => $type,
						$model.'.processing_code' => $code,
						$model.'.response' => $status,
						$model.'.transdate BETWEEN ? AND ?' => array(
							$date_from, $date_to
						)
					),
					'fields' => array(
						'SUM('.$model.'.transaction_amount) as total_proc'
					)
				);
			}else{
				$options = array(
					'conditions' => array(
						$model.'.transaction_type' => $type,
						$model.'.processing_code' => $code,
						$model.'.response' => $status						
					),
					'fields' => array(
						'SUM('.$model.'.transaction_amount) as total_proc'
					)
				);
			}
		}else{
			$options = array(
				'conditions' => array(
					$model.'.transaction_type' => $type,
					$model.'.processing_code' => $code
				),
				'fields' => array(
					'SUM('.$model.'.transaction_amount) as total_proc'
				)
			);
		}
		
		$trans = $this->{$model}->find('all', $options);
		
		return number_format($trans[0][0]["total_proc"], 2, ".", ",");
		
	}
	
	private function getAllCustomTransactions($date_from=null, $date_to=null, $model=null, $type=null, $code=null, $status=null){		
		$this->loadModel($model);		
		$this->{$model}->recursive =-1;
		//$status = isset($status) && !empty($status) ? $status : 'Approved';
		
		if(isset($status) && !empty($status)){
			if(!empty($date_to) && !empty($date_to) && ($date_to > $date_from)){				
				$options = array(
					'conditions' => array(
						$model.'.transaction_type' => $type,
						$model.'.processing_code' => $code,
						$model.'.response' => $status,
						$model.'.transdate BETWEEN ? AND ?' => array(
							$date_from, $date_to
						)
					),
					'order' => array(
						$model.'.transdate' => 'DESC'
					)
				);
			}else{
				$options = array(
					'conditions' => array(
						$model.'.transaction_type' => $type,
						$model.'.processing_code' => $code,
						$model.'.response' => $status						
					),
					'order' => array(
						$model.'.transdate' => 'DESC'
					)
				);
			}
		}else{
			$options = array(
				'conditions' => array(
					$model.'.transaction_type' => $type,
					$model.'.processing_code' => $code
				),
				'order' => array(
					$model.'.transdate' => 'DESC'
				)
			);
		}
		
		$trans = $this->{$model}->find('all', $options);
		
		return $trans;
		
	}
	
/**
 * index method
 *
 * @return void
 */
 
	public function index($status=null) {		
		$this->Card->recursive = 0;		
		if(isset($status) && !empty($status)){
			if(!$this->Card->Cardstatus->exists($status)){
				throw new NotFoundException(__('Invalid card status'));
			}
			$options  = array(
				'conditions' => array(				
					'Card.cardstatus_id' => $status
				),
				'order' => array(				
					'Card.last_transaction' => 'DESC'
				)
			);
		}else{
			$options  = array(
				'order' => array(				
					'Card.last_transaction' => 'DESC'
				)
			);	
		}
		
		$this->set('cards', $this->Card->find('all', $options));
		
		
	}
	
	/*--------------------
	| Generate CSV Report
	--------------------*/
	public function generate_csv_report($status=null, $date_from=null, $date_to=null){		
			$this->layout 	= 'pdf'; 		
			$date_from 		= isset($date_from) && !empty($date_from) ? $date_from : '';
			$date_to 		= isset($date_to) && !empty($date_to) ? $date_to : '';
			$status			= isset($status) && !empty($status) ? $status : 1;
			
			$this->set('trans', $this->getListofTransactions($date_from, $date_to, $status));
			$this->set('date_from', $date_from);
			$this->set('date_to', $date_to);
			$this->set('status', $status);
			
			//$this->set('file_name', $this->Common->generateFilename('activated_card', $date_from, $date_to));
			$this->render();
	}
	
	
	private function getListofTransactions($date_from=null, $date_to=null, $status=null){
			$this->Card->recursive =0;
			
			$fields = array(
				'Cardholder.firstname',
				'Cardholder.middlename',
				'Cardholder.lastname',
				'Card.cardno',
				'Cardtype.name',
				'Product.name',
				'Cardtype.name',
				'Card.balance',
				'Card.registration',
				'Card.modified',
				'Cardstatus.name'
			);
			
			if(!empty($date_from) && !empty($date_to)){
					if($date_to > $date_from){
						$trans = $this->Card->find('all', 
							array(
								'conditions' => array(							
									'Card.modified BETWEEN ? AND ?' => array(
										$date_from, $date_to
									),
									'Card.cardstatus_id' => $status
								),															
								'order' => array(
									'Card.modified' => 'DESC'
								),
								'fields' => $fields			
							)							
						);
					}else{
						$trans = false;
					}
				}else{
					$trans = $this->Card->find('all', array(
							'conditions' => array(														
								'Card.cardstatus_id' => $status
							),
							'order' => array(
								'Card.modified' => 'DESC'
							),
							'fields' => $fields	
						)
					);
				}
		
		return $trans;
	}
	
	
	public function viewClientCard($holderid=null, $holder_ref=null){
			if(!$this->Card->Cardholder->exists($holderid)){
				throw new NotFoundException(__('Invalid card holder'));
			}
			
			$this->Card->recursive = -2;
			$card = $this->Card->find('first', array('conditions' => array(
						'Card.cardholder_id' => $holderid,
						'Card.refid' => $holder_ref
					)
				)
			);
			
			
			if(!empty($card)){
				$this->view = 'view';
				//$this->view($card['Card']['id']	, $card['Card']['cardno']);				
					if($this->checkCardStatus($card['Card']['id'], $card['Card']['cardno'])){
						$options = array('conditions' => array('Card.' . $this->Card->primaryKey => $card['Card']['id']));
						$this->set('card', $this->Card->find('first', $options));
					}else{
						throw new NotFoundException(__('Invalid card'));
					}
						
			}else{	
				$this->view = 'add';
				$this->add();
			}
			
			$cardstatuses = '';
			
			if($card['Card']['cardstatus_id']==1){
				$cardstatuses = $this->Card->Cardstatus->find('list', array('conditions' => array('Cardstatus.id >' => 2), 'order' => array('Cardstatus.id' => 'ASC')));
			}
			
			if($card['Card']['cardstatus_id']==5){
				$cardstatuses = $this->Card->Cardstatus->find('list', array('conditions' => array('Cardstatus.id' => 1), 'order' => array('Cardstatus.id' => 'ASC')));
			}
			
			
			$this->set(compact('cardstatuses'));
		
	}
	
	
	public function getCards($status=null) {		
		$this->Card->recursive = 0;	
		$status 		= isset($status) && !empty($status) ? $status : 1;
		$this->layout = 'ajax';
		$this->autoRender = false;
		$this->view = false;
		
		
		if($this->request->is('ajax')){
			if(isset($status) && !empty($status)){
				if(!$this->Card->Cardstatus->exists($status)){
					$response = $this->Message->respMsg(400);
				}
				$options  = array(
					'conditions' => array(				
						'Card.cardstatus_id' => $status
					),
					'order' => array(				
						'Card.id' => 'DESC'
					),
					'fields' => array(
						'Card.cardno',
						'Card.cardstatus_id',
						'Cardholder.id',
						'Cardholder.firstname',
						'Cardholder.middlename',
						'Cardholder.lastname',
						'Cardholder.refid',
						'Card.refid',
						'Card.balance',
						'Card.registration',
						'Card.cardholder_id',
						'Card.modified',
						'Card.last_transaction',
						'Cardstatus.name',
						'Product.name',
						'Cardtype.name'
					)					
				);
					
				$cards =  $this->Card->find('all', $options);
				
				if($cards){
						$data = array();
						$tag = '';
						if(count($cards) > 0){
							$data = array();
							
							foreach($cards as $t):
								if($status==2){
									$tag = ' <a href="#" title="Tag This Card to an Account" class="fs-10" data-toggle="modal" data-target="#maintenance"><i class="fas fa-tag fa-lg"></i></a>';
								}	

								if($status==3 || $status==4){
									$tag = ' <a href="#" title="Replace this card" class="fs-10" data-toggle="modal" data-target="#maintenance"><i class="fas fa-plus-square fa-lg"></i></a>';	
								}
								
								$data[] = array(
									$t['Card']['cardno'],	
									//'<a href="'.$this->webroot.'cardholders/view/'.$t['Cardholder']['id'].'" title="View Details" class="fs-11 tab_table_link" data-toggle="modal" data-target="#view_content_"><i class="fas fa-eye fa-lg"></i> &nbsp;'.$t['Cardholder']['firstname'].' '.$t['Cardholder']['middlename'].' '.$t['Cardholder']['lastname'].'</a>',									
									/*'<a href="#" 
										url="'.$this->webroot.'cardholders/view/'.$t['Cardholder']['id'].'" 
										title="View Card Holder" 
										data-td-id = "td_'.$t['Cardholder']['id'].'"
										data-_murl = "'.$this->webroot.'cardholders/view/'.$t['Cardholder']['id'].'"
										data-_type = "holder"
										data-toggle="modal"
										data-target="#view_card_detail_"										
										class="fs-11 card-link-modal nooutline td_'.$t['Cardholder']['id'].'">'.$t['Cardholder']['firstname'].' '.$t['Cardholder']['middlename'].' '.$t['Cardholder']['lastname'].'</a>',
									*/
									$t['Product']['name'],				
									$t['Cardtype']['name'],				
									date('Y M d H:i:s', strtotime($t['Card']['registration'])),
									//date('Y M d', strtotime($t['Card']['modified'])),
									//$t['Card']['last_transaction'],																			
									//number_format($t['Card']['balance'], 2, ".", ","),		
									$t['Cardstatus']['name'],
									'<a href="#" 
										url="'.$this->webroot.'cards/viewClientCard/'.$t['Cardholder']['id'].'/'.$t['Cardholder']['refid'].'" 
										title="View Card" 
										data-td-id = "td_'.$t['Cardholder']['id'].'"
										data-_murl = "'.$this->webroot.'transpurchases/getTransactions/'.$t['Card']['cardno'].'"
										data-toggle="modal"
										data-cardno="'.$t['Card']['cardno'].'"
										data-_type = "card"										
										data-target="#view_card_detail_"
										class="fs-11 card-link-modal nooutline td_'.$t['Cardholder']['id'].'"><i class="fas fa-eye fa-lg"></i></a>
									'.$tag.'
									<a href="#" 
										url="'.$this->webroot.'cardholders/view/'.$t['Cardholder']['id'].'" 
										title="View Card Holder" 
										data-td-id = "td_'.$t['Cardholder']['id'].'"
										data-_murl = "'.$this->webroot.'cardholders/view/'.$t['Cardholder']['id'].'"
										data-_type = "holder"
										data-toggle="modal"
										data-target="#view_card_detail_"										
										class="fs-11 card-link-modal nooutline td_'.$t['Cardholder']['id'].'"><i class="fas fa-user fa-lg"></i></a>'
										
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
	}
	
	private function renderGroupView(){
		$group_access = $this->Auth->user('group_id');
		switch($group_access){
			case 1:
			case 13: // System and Data Administrator Officer 
			case 14:  //Technical and Technical Compliance Officer
				$view =  $this->view = 'dashboard';
			break;		
			case 22: //Agent Branch - Branches 					
			case 21: //Agent Branch - Central Unit 					
			case 18: //BRB Branch - Officer 					
			case 17: //BRB Branch - Staff 				
			case 20: //Card Management Department Officer 				
			case 19: // Card Production Department Officer 					
			case 15: //Customer Care Officer 					
			case 16: //Customer Care Staff 								
				$view =  $this->view = 'dashboard-welcome';
			break;			
		}
		
		return $view;
	}
	
	private function getPendingApplications(){
		return $this->Card->Cardtype->Cardapplication->find('count', array(
				'conditions' => array(
					'Cardapplication.status' => 0
				)
			)
		);
	}
	
	
	public function dashboard(){
		
		$this->renderGroupView();
		
		
		$this->set('count_active', $this->countCardHolders(1));
		$this->set('count_inactive', $this->countCardHolders(4));
		$this->set('count_pending', $this->getPendingApplications());	
		
		$this->set('active_card', $this->countCards(1));			
		$this->set('inactive_card', $this->countCards(2));			
		$this->set('suspended_card', $this->countCards(3));			
		$this->set('lost_card', $this->countCards(4));			
		
		$this->set('application_this_week', $this->getTotalApplications(1, "week"));			
		$this->set('application_this_month', $this->getTotalApplications(1, "month"));	
		$this->set('monday', date('F d, Y', strtotime('monday this week')));
		$this->set('sunday', date('F d, Y', strtotime('sunday this week')));
		$this->set('first_date', date('F d, Y', strtotime('first day of this month')));
		$this->set('last_date', date('F d, Y', strtotime('last day of this month')));
		
		$_purchase = array();		
		//foreach($this->Common->listofMos() as $mo):
		for($i =1; $i <= 12; $i++){			
			$_purchase[] = $this->getCardTransactions('purchase', $i, date('Y'));			
			$_cashout[] = $this->getCardTransactions('cashout', $i, date('Y'));			
			$_load[] = $this->getCardTransactions('load', $i, date('Y'));			
			$_changepin[] = $this->getCardTransactions('changepin', $i, date('Y'));			
			$_billspayment[] = $this->getCardTransactions('bills', $i, date('Y'));			
			$_balance[] = $this->getCardTransactions('balance', $i, date('Y'));			
		}
		//endforeach;
		
		$this->set('_purchase', $_purchase);						
		$this->set('_cashout', $_cashout);						
		$this->set('_load', $_load);						
		$this->set('_changepin', $_changepin);						
		$this->set('_billspayment', $_billspayment);						
		$this->set('_balance', $_balance);						
	}
	
	private function getCardTransactions($trans=null, $month=null, $year=null){
		$year = isset($year) && !empty($year) ? $year : date('Y');
		
		switch($trans){
			case "purchase":
				$_modal = 'Transpurchase';
			break;
			case "changepin":
				$_modal = 'Transchangepin';
			break;
			case "cashout":
				$_modal = 'Transcashout';
			break;
			case "load":
				$_modal = 'Transloadcash';
			break;
			case "bills":
				$_modal = 'Transbillspayment';
			break;
			case "balance":
				$_modal = 'Transbalanceinquiry';
			break;			
		}
		
		return $this->Card->{$_modal}->find('count', array(
			'conditions' => array(
				'MONTH(transdate)' => $month,
				'YEAR(transdate)'  => $year
			)
		));
	}	
	
	private function countCardHolders($stat){
		return	$this->Card->Cardholder->find('count', array(
				'conditions' => array(				
					'Cardholder.cardholderstatus_id' => $stat
				)
			)
		);
	}
	
	private function countCards($stat){
		return	$this->Card->find('count', array(
				'conditions' => array(				
					'Card.cardstatus_id' => $stat
				)
			)
		);
	}
	

	private function getTotalApplications($stat, $type=null){
		
		switch($type){
			case "week":
				$between = array(
					date('Y-m-d', strtotime('monday this week')),
					date('Y-m-d', strtotime('sunday this week'))
				);
			break;
			case "month":
				$between = array(
					date('Y-m-d', strtotime('first day of this month')),
					date('Y-m-d', strtotime('last day of this month'))
				);
			break;
		}
		
		return	$this->Card->Cardholder->find('count', array(
				'conditions' => array(				
					'Cardholder.cardholderstatus_id' => $stat,
					'Cardholder.registration BETWEEN ? AND ?' => $between
				)
			)
		);
	}
	
/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null, $cardno=null) {
		
		if($this->request->is('ajax')){
			$this->layout = 'ajax';
			$this->autoRender = false;
			
			if (!$this->Card->exists($id)) {
				throw new NotFoundException(__('Invalid card'));
			}
			
			if($this->checkCardStatus($id, $cardno)){
				$options = array('conditions' => array('Card.' . $this->Card->primaryKey => $id));
				$this->set('card', $this->Card->find('first', $options));
			}else{
				throw new NotFoundException(__('Invalid card'));
			}
						
		}
		
		$cardstatuses = $this->Card->Cardstatus->find('list', array('order' => array('Cardstatus.id' => 'ASC')));
		$this->set(compact('cardstatuses'));
		
		
	}
	
	
	public function register_new_card($cardholder, $refid, $firstname, $lastname){
		if (!$this->Card->Cardholder->exists($cardholder)) {
			throw new NotFoundException(__('Invalid card holder'));
		}
	}
	
	public function generate_reports_by_category($report=null){
		$this->view = 'reports';
		
	}

/**
 * add method
 *
 * @return void
 */
	
	private function getBankDetail($field=null){
		$this->LoadModel('Setting');
		$bin = $this->Setting->findById(1);
		
		if(isset($field) && !empty($field)){
			return $bin['Setting'][$field];
		}else{
			return $bin;
		}
	}
	
	public function getCardLastSequence($product_id){
		$response = array();
		$this->Card->recursive = -2;
		$sequence = $this->Card->find('first', array(	
			'conditions' => array(
				'Card.product_id' => $product_id
			),
			'fields' => array(
				'Card.id'
			),
			'order' => array(
				'Card.id' => 'DESC'
			),
			'limit'	=> 1
		));
		
		if($this->request->is('ajax')){
			$this->layout = 'ajax';
			$this->view = false;
			$this->autoRender = false;
			$response = array(
					"status" 	=> 200,
					"message" 	=> $this->formatSequence(!empty($sequence) ? $sequence['Card']['id'] : 0)
			);
								
			return json_encode($response);
		}else{
			return !empty($sequence) ? $sequence['Card']['id'] : 0;
		}
	}
	
	private function formatSequence($no){
		return str_pad($no, 6, "0", STR_PAD_LEFT);
	}
	
	private function getHolderDetailsByIdAndRef($id, $refid){
		$this->Card->Cardholder->recursive = -2;
		$cardholder = $this->Card->Cardholder->find('first', array('conditions' => array(
					'Cardholder.id' => $id,
					'Cardholder.refid' => $refid
				)
			)
		);
		
		return $cardholder;

	}
	
	public function edit($id = null, $cardholder_id=null, $cardholder_ref=null) {
		if (!$this->Card->exists($id)) {
			throw new NotFoundException(__('Invalid card'));
		}
		
		if(empty($cardholder_id) || empty($cardholder_ref) || !$this->Card->Cardholder->exists($cardholder_id)){
			throw new NotFoundException(__('Invalid card holder'));
		}
		
		//check if the holder has card already
		
		$this->set('holder', $this->getHolderDetailsByIdAndRef($cardholder_id, $cardholder_ref));
		
		$this->set('cardholder_ref', $cardholder_ref);
		$this->set('cardholder_id', $cardholder_id);
		
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Card->save($this->request->data)) {
				$this->Message->msgSuccess("Card has been successfully loaded.");
				return $this->redirect(array('action' => 'edit', $id, $cardholder_id, $cardholder_ref));
			} else {
				$this->Message->msgError("Unable to load the card, please try again.");
			}
		} else {
			$options = array('conditions' => array('Card.' . $this->Card->primaryKey => $id));
			$this->request->data = $this->Card->find('first', $options);
		}
		
		$cardtypes = $this->Card->Cardtype->find('list');
		$products = $this->Card->Product->find('list');		
		$this->set(compact('cardtypes', 'products'));
	}
	
	private function cardHolderHasCard($holder, $refid){
		
		$conditions = array(
					'Card.cardholder_id' => $holder,
					'Card.refid'		=> $refid
				);
		
		if($this->Card->hasAny($conditions)){
			return true;
		}else{
			return false;
		}
	}
	
	private function getAvailablePregenCards($product, $institution){
		$this->loadModel('Cardpregen');
		$this->Cardpregen->recursive=-1;
		$cards = $this->Cardpregen->find('all', array(
			'conditions' => array(
				'Cardpregen.status' => 0
			)
		));
		
		return $cards;		
	}
	
	
	public function add($cardholder_id=null, $cardholder_ref=null, $org_stat=null) {
		
		if(empty($cardholder_id) || empty($cardholder_ref) || !$this->Card->Cardholder->exists($cardholder_id)){
			throw new NotFoundException(__('Invalid card holder'));
		}
		
		
		if($this->cardHolderHasCard($cardholder_id, $cardholder_ref)){
			$this->Message->msgSuccess("Registration Complete.");
			return $this->redirect(array('controller' => 'cardholders', 'action' => 'add'));	
		}
		//check if the holder has card already
		
		$this->set('last_id', $this->getCardLastSequence(1));
		$this->set('processed_by', $this->Auth->User('firstname').' '.$this->Auth->User('lastname'));
		$this->set('pin', $this->Common->generate_pin());
		$this->set('bin', $this->getBankDetail('bin'));
		//$this->set('check_digit', $this->getBankDetail('check_digit'));
		$this->set('check_digit', $this->Common->generate_pin(1));
		$this->set('cardholder_ref', $cardholder_ref);
		$this->set('cardholder_id', $cardholder_id);
		
		$this->set('holder', $this->getHolderDetailsByIdAndRef($cardholder_id, $cardholder_ref));
		
		if ($this->request->is('post')) {
				
				//if(isset($this->data['Card']['cardno_4']) && !empty($this->data['Card']['cardno_4'])){
					
					
					if(isset($this->data['Card']['_cardno']) && !empty($this->data['Card']['_cardno'])){
						$cardno = $this->data['Card']['_cardno'];
						
						$data  = array(
									'Card'	=> array(										
										'cardholder_id'		 => $this->data['Card']['_cardholder_id'],
										'product_id'		 => $this->data['Card']['_product_id'],
										'cardno'			 => $cardno,
										//'cardstatus_id'		 => $this->data['Card']['cardstatus_id'],
										'cardstatus_id'		 => 2, //pending status,													
										'pincode'			 => $this->data['Card']['_pin_clone'],
										'balance'			 => 0,
										'currency_id'		 => '1',
										'refid'				 => $this->data['Card']['_refid'],
										'processed_by'		 => $this->data['Card']['_processed_by'],
										'registration'		 => date('Y-m-d h:i:s'),
										'modified'		 	 => date('Y-m-d h:i:s')
									)
								);
								
					}else{
						$cardno = $this->data['Card']['cardno_1'] .''. $this->data['Card']['cardno_2'] .''. $this->data['Card']['cardno_3'] .''. $this->data['Card']['cardno_4'];
						$data  = array(
									'Card'	=> array(										
										'cardholder_id'		 => $this->data['Card']['cardholder_id'],
										'product_id'		 => $this->data['Card']['product_id'],
										'cardno'			 => $cardno,
										//'cardstatus_id'		 => $this->data['Card']['cardstatus_id'],
										'cardstatus_id'		 => 2, //pending status,
										'bin'		 		 => $this->data['Card']['cardno_1'],						
										'sequence'		 	 => $this->data['Card']['cardno_3'],						
										'check_digit'		 => $this->data['Card']['cardno_4'],						
										'cardtype_id'		 => $this->data['Card']['cardtype_id'],						
										'pincode'			 => $this->data['Card']['pincode'],
										'balance'			 => $this->data['Card']['balance'],
										'currency_id'		 => '1',
										'refid'				 => $this->data['Card']['refid'],
										'processed_by'		 => $this->data['Card']['processed_by'],
										'registration'		 => date('Y-m-d h:i:s'),
										'modified'		 	 => date('Y-m-d h:i:s')
									)
								);
								
									echo "no data";
					}
				
				
							$this->Card->create();									
							if($this->Card->save($data)){
								if(isset($this->data['Card']['_cardno']) && !empty($this->data['Card']['_cardno'])){									
									if($this->updateCardGen($this->data['Card']['_cardno'])){
										$this->Message->msgSuccess("Card Linking Complete.");	
									}else{
										$this->Message->msgSuccess("Card Linking Complete. But unable to update the pre-generated card");	
									}
								}else{								
									$this->Message->msgSuccess("Card Linking Complete.");
								}
								return $this->redirect(array('controller' => 'cardapplications', 'action' => 'index'));			
							} else {
								$this->Session->setFlash($this->Message->showMsg('error_save_normal_data'), 'error_message');
								$ds_cardholder->rollback();
							}
			/*	}else{
					$this->Message->msgError("Card registration not complete, invalid check digit.");
				}*/
		
		}
				
		//$cardstatuses = $this->Card->Cardstatus->find('list');		
		$cardtypes = $this->Card->Cardtype->find('list', array('conditions' => array('Cardtype.id' => 2)));
		$_cardtypes = $this->Card->Cardtype->find('list', array('conditions' => array('Cardtype.id' => 1)));
		$products = $this->Card->Product->find('list', array('order' => array('Product.id' => 'ASC')));
		$institutions = $this->Card->Institution->find('list', array('order' => array('Institution.id' => 'ASC')));
		//$this->set('pregens', $this->getAvailablePregenCards());
		//$this->set(compact('cardtypes', 'cardstatuses', 'products'));
		$this->set(compact('cardtypes', 'products', 'institutions', '_cardtypes'));
	}
	
	private function updateCardGen($cardno){
		$this->loadModel('Cardpregen');
		//$this->Cardpregen->recursive=-1;
		if($this->Cardpregen->updateAll(array("status"=> 1),array("cardno"=> $cardno))){
			return true;
		}else{
			return false;
		}
	}
	
	public function add_card_account($id, $firstname, $lastname, $refid){
		
		if(!$this->Card->Cardholder->exists($id) || !$this->checkCardHolderExists($id, $firstname, $lastname, $refid)){
			throw new NotFoundException(__('Due to some security issue, the system canceled your request. Please try again.'));
		}
		
		$this->set('cardholder', $this->checkCardHolderExists($id, $firstname, $lastname, $refid, "details"));
		$this->set('refid', $this->Common->generateRandomString(12));
		$this->set('pin', $this->Common->generate_pin());
		
		$ds_card		= $this->Card->getdatasource();		
		$ds_application	= $this->Card->Cardapplication->getdatasource();		
		
			if ($this->request->is('post')) {
					//$this->Card->Cardapplication->create();
					if($this->Card->Cardapplication->save(
						array(
							'Cardapplication' => array(
								'cardstatus_id' => $this->data['Card']['cardstatus_id'],
								'user_id'		=> $this->Auth->user('id'),							
								'terminal_id'	=> $this->Auth->user('terminal_id'),
								'refid'			=> $this->data['Card']['refid']
							)
						))){
							
							//$this->Card->create();
							if($this->Card->save(
								array(
									'Card'	=> array(
										'cardapplication_id' => $this->Card->Cardapplication->getLastInsertId(),
										'cardholder_id'		 => $id,
										'cardno'			 => $this->data['Card']['cardno'],
										'cardstatus_id'		 => $this->data['Card']['cardstatus_id'],	
										'cardtype_id'		 => $this->data['Card']['cardtype_id'],						
										'pincode'			 => $this->data['Card']['pincode'],
										'balance'			 => $this->data['Card']['balance'],
										'currency_id'		 => $this->data['Card']['currency_id'],
										'refid'				 => $this->data['Card']['refid']
									)
							))){
								
								//if ($this->Card->save($this->request->data)) {								
								$this->Message->msgSuccess("New card has been registered to ".$firstname.' '.$lastname);
								return $this->redirect(array('action' => 'index'));
								
								$ds_application->commint();
								$ds_card->commint();
								
							} else {								
								$ds_application->rollback();
								$ds_card->rollback();
								
								$this->Message->msgError($this->data['Card']['cardno']);
							
							}
						
					}else{
						$ds_application->rollback();
						//$ds_card->rollback();
						$this->Message->msgError("Unable to save card details, please try again.");
					}
		
			}
			
			//$cardapplications = $this->Card->Cardapplication->find('list');
			$cardstatuses = $this->Card->Cardstatus->find('list');
			$cardtypes = $this->Card->Cardtype->find('list');
			$currencies = $this->Card->Currency->find('list');
			$this->set(compact('cardstatuses', 'cardtypes', 'currencies'));
			
	}
	
	public function checkCardHolderExists($id, $firstname, $lastname, $refid, $return=null){
		$this->Card->Cardholder->recursive = -2;
		$cardholder = $this->Card->Cardholder->find('first', array('conditions' => array(
					'Cardholder.id' => $id,
					'Cardholder.firstname' => $firstname,
					'Cardholder.lastname' => $lastname,
					'Cardholder.refid' => $refid
				)
			)
		);
		
		
		if(!empty($cardholder)){
			if(isset($return) && !empty($return) && $return=="details"){
				return $cardholder;
			}else{
				return true;
			}
		}else{
			return false;
		}

	}
	
	public function checkCardStatus($cardid, $cardno){
		if (!$this->Card->exists($cardid)) {
			throw new NotFoundException(__('Invalid card'));
		}	
		
		$account_exists = $this->Card->find('first', array(
			'conditions' => array(
				'Card.id' 		=> $cardid,
				'Card.cardno' 	=> $cardno
			)
		));
		
		if(!empty($account_exists)){
			return true;
		}else{
			return false;
		}
	}
	
	private function checkDataExists($fields){
		$card = $this->Card->find('first', array('conditions' => array($fields)));
		
		if(!empty($card)){
			return true;
		}else{
			return false;
		}
	}		
	
	private function checkPregenExists($fields){
		$this->loadModel('Cardpregen');		
		$this->Cardpregen->recursive =-1;
		$card = $this->Cardpregen->find('first', array('conditions' => array($fields)));
		
		if(!empty($card)){
			return true;
		}else{
			return false;
		}
	}
	
	public function updateCardStatusViaForm(){
		$response = array();
		$this->layout = 'ajax';
		$this->autoRender = false;
		$this->view = false;
			
		if($this->request->is('ajax')){
			
			
			$cardid 	= $this->data['Card']['cardid'];
			$holderid	= $this->data['Card']['holderid'];
			$refid		= $this->data['Card']['refid'];
			$status		= $this->data['Card']['status'];
			
			$check_data = array(
				'Card.id' => $cardid,
				'Card.cardholder_id' => $holderid,
				'Card.refid' => $refid,
				//'Card.cardstatus_id' => $status
			);
			
			if($this->checkDataExists($check_data)){
			
					/*if (!$this->Card->exists($cardid) || $this->Card->Cardstatus->exists($status)) {
						$response = $this->Message->respMsg(400);
					}	*/
					
					$account_exists = $this->Card->Cardholder->find('first', array(
						'conditions' => array(
							'Cardholder.id' 	=> $holderid,
							'Cardholder.refid' 	=> $refid
						)
					));
					
					if(empty($account_exists)){
						$response = $this->Message->respMsg(400);
					}else{
						//$this->Card->recursive = 0;
						$card = $this->Card->find('first', array(
								'conditions' => array(
									'Card.id' 				=> $cardid,
									'Card.cardholder_id' 	=> $holderid,
									'Card.refid' 			=> $refid
								),
								'fields' => array(
									'Card.id',
									'Cardholder.cardholderstatus_id' 
								)
							)
						);
						
						$author = $this->Auth->user('firstname').' '.$this->Auth->user('lastname');
						
						//check if the card holder account is active_card
						
						if(!empty($card)){
							
							if($card['Cardholder']['cardholderstatus_id']=="1"){
								$this->Card->id = $card['Card']['id'];
								if($this->Card->saveField('cardstatus_id', $status) && $this->Card->saveField('modified_by', $author) && $this->Card->saveField('modified', date('Y-m-d'))){
									$response = array(
										"status" 	=> 200,
										"message" 	=> "Card status has been successfully updated"
									);
								}else{
									$response = $this->Message->respMsg(400);
								}
							}else{
								$response = $this->Message->respMsg(400, "Please activate first the status of the card holder account");
							}
						}else{
							$response = $this->Message->respMsg(400);
						}
					}
			}else{
				$response = $this->Message->respMsg(400, "Invalid data, please try again.".$cardid .$holderid .$refid. $status);	
			}
			
			return json_encode($response);
		}
	}
	
	public function updateCardStatus($cardid, $holderid, $refid, $status){
		$response = array();
		$this->layout = 'ajax';
		$this->autoRender = false;
		$this->view = false;
			
		if($this->request->is('ajax')){
			if (!$this->Card->exists($cardid) || $this->Card->Cardstatus->exists($status)) {
				$response = $this->Message->respMsg(400);
			}	
			
			$account_exists = $this->Card->Cardholder->find('first', array(
				'conditions' => array(
					'Cardholder.id' 	=> $holderid,
					'Cardholder.refid' 	=> $refid
				)
			));
			
			if(empty($account_exists)){
				$response = $this->Message->respMsg(400);
			}else{
				//$this->Card->recursive = 0;
				$card = $this->Card->find('first', array(
						'conditions' => array(
							'Card.id' 				=> $cardid,
							'Card.cardholder_id' 	=> $holderid,
							'Card.refid' 			=> $refid
						),
						'fields' => array(
							'Card.id',
							'Cardholder.cardholderstatus_id' 
						)
					)
				);
				
				$author = $this->Auth->user('firstname').' '.$this->Auth->user('lastname');
				
				//check if the card holder account is active_card
				
				if(!empty($card)){
					
					if($card['Cardholder']['cardholderstatus_id']=="2"){
						$this->Card->id = $card['Card']['id'];
						if($this->Card->saveField('cardstatus_id', $status) && $this->Card->saveField('modified_by', $author) && $this->Card->saveField('modified', date('Y-m-d'))){
							$response = array(
								"status" 	=> 200,
								"message" 	=> "Card status has been successfully updated"
							);
						}else{
							$response = $this->Message->respMsg(400);
						}
					}else{
						$response = $this->Message->respMsg(400, "Please activate first the status of the card holder account");
					}
				}else{
					$response = $this->Message->respMsg(400);
				}
			}
			
			return json_encode($response);
		}
	}
	
	public function generate_perso(){
		$this->view = 'generate_perso_file';
		
	}
	
	private function encrypt_perso_data(){
			
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	
	
	private function getCardBalance($id = null, $cardno=null, $field=null){
		$this->Card->recursive = -1;
		
		if (!$this->Card->exists($id) || !$this->checkCardStatus($id, $cardno)) {
			throw new NotFoundException(__('Invalid card'));
		}	
		
		
		$balance = $this->Card->find('first', array(
			'conditions' => array(
				'Card.id' 		=> $id,
				'Card.cardno' 	=> $cardno
			)
		));
		
		return $balance['Card'][$field];
	}
	
	
	public function loadCard($id = null, $cardno=null) {		
			if (!$this->Card->exists($id) || !$this->checkCardStatus($id, $cardno)) {
				throw new NotFoundException(__('Invalid card'));
			}

			$this->view = 'load-card';			
			//get card balance		
			if ($this->request->is(array('post', 'put'))) {
				$current_balance = $this->getCardBalance($id, $cardno, 'balance');
				$this->Card->id = $id;								
				$newbalance = ($current_balance + $this->data['Card']['new_balance']);
				//save load transaction
				
				if ($this->Card->saveField('balance', $newbalance)) {
					//save load transactions
					/*$fields = array(
						'Transloadcash' => array(
							'transactiontype_id' => '',
						)
					);*/

					$this->Message->msgSuccess("Card has been successfully loaded.");
					return $this->redirect(array('action' => 'view', $id, $cardno));
				} else {
					$this->Message->msgError("Could not load the card, please try again.");
				}
			} else {
				
				$options = array('conditions' => array('Card.id' => $id));
				$this->set('card', $this->Card->find('first', $options));
			}
					
		
		
	}
	
	private function getTheAuthor(){
		return $this->Auth->user('username');
	}
	
	public function uploadcard(){
		$this->set('author', $this->getTheAuthor());
	}
	
	
	
	private function cardDontExists($cardno){
		$this->Card->recursive=-1;
		$card = $this->Card->findByCardno($cardno);
		if(!empty($card)){
			return false;
		}else{
			return true;
		}
	}
	
	public function extract_uploaded(){
		$this->layout 		= 'ajax';
		$this->view  		= false;
		$this->autoRender 	= false;
		$_sdata 			= array();
		$_ssdata 			= array();
		
		//if ($this->request->is('ajax')) {
				if(isset($_FILES["userpic"])){
							$error = $_FILES["userpic"]["error"];						
							if($error){
								//echo json_encode(array("message" => "An error has occured during the upload ".$error));
								$response = array(
											'status' => 200,
											'message' => "Unable to process your request please try again."
										);
							}else{
								if(!is_array($_FILES["userpic"]["name"])){
									$fileName 		= $_FILES["userpic"];										
									//$extension 		= pathinfo($fileName['name'], PATHINFO_EXTENSION);
									$new_file_name   = 'Perso_file_'.date('Y-m-d-h-s').'_'.$this->Auth->user('username');
									
									if($this->Upload->RenameandUpload($fileName, $new_file_name, "csv")){
										$new_file = APP.'webroot/Uploads/'.date('Y').'/'.date('m').'/'.$new_file_name.".csv";
										$row = 1;
										//if (file_exists($new_file)) {
										if (($handle = fopen($new_file, "r")) !== FALSE) {
											while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
												$num = count($data);												
												$row++;
												for ($c=0; $c < $num; $c++) {													
													if(!empty($data[$c])){
														//check if card number exists
														//if($this->cardDontExists($data[0])){
														$_sdata[] = $data[0];
															
													}
												}
											}
											
											
											fclose($handle);
											
											if(!empty($_sdata)){
												foreach($_sdata as $key => $d):
														$sd = preg_replace('/\s+/', ',', $d);									
														$_sd = explode(",", $sd);
														
														$_ssdata[] = array(
															'_data' => array(
																$_sd[0],														
																$_sd[7]														
															)
														);
													
												endforeach;
											}
											
											$response = array(
												'status' 	=> 200,
												'message' 	=> "All pre-generated card has been successfully added",
												'data'	  	=> $_ssdata								
																		
											);
											
										}else{
											$response = array(
												'status' 	=> 200,
												'message' 	=> "Unable to extract the file." .$new_file							
											);
										}

									
									
									
								
									}else{
										$response = array(
											'status' => 200,
											'message' => "Unable to process your request please try again."
										);
									}
									
								}else{
									$response = array(
											'status' => 200,
											'message' => "Unable to read the file, please try again."
										);
								}
							}	
			
				}else{
					$response = array(
											'status' => 200,
											'message' => "Unable- to process your request please try again."
										);
				}
				
				return json_encode($response);
		//}
		
	}
	
	
	public function upload_pregenerated(){
		
		$this->loadModel('Uploadpregeneratecard');
		$this->loadModel('Cardpregen');
		
		if ($this->request->is('ajax')) {
			$this->layout 		= 'ajax';
			$this->view  		= false;
			$this->autoRender 	= false;
			$_sdata 			= array();
			$_ssdata 			= array();
			$uid_key 			= strtoupper($this->Common->generateRandomString(6));
			$_tabledata 		= array();
			$status 			= '<span class="text-success">New Card ( Registered )</span>';
			
			if(isset($_FILES["csvfile"])){
							$error = $_FILES["csvfile"]["error"];						
							if($error){							
								$response = array(
									'status' => 400,
									'message' => "Unable to process your request please try again."
								);
								
							}else{
								if(!is_array($_FILES["csvfile"]["name"])){
									$fileName 		= $_FILES["csvfile"];										
									//$extension 		= pathinfo($fileName['name'], PATHINFO_EXTENSION);
									//$new_file_name   = 'pre_generated_'.date('Y-m-d-h-s').'_'.$this->Auth->user('username');
									$new_file_name   = 'PRE_GENERATED'.$uid_key;
									
									
									if($this->Upload->RenameandUpload($fileName, $new_file_name, "csv")){											
										$new_file = APP.'webroot/Uploads/'.date('Y').'/'.date('m').'/'.$new_file_name.".csv";
										
										$_data = array(
											'Uploadpregeneratecard' => array(
												'user_id' => $this->Auth->user('id'),
												'path'	  => 'webroot/Uploads/'.date('Y').'/'.date('m').'/'.$new_file_name.".csv",
												'date_time' => date('Y-m-d H:i:s')
											)
										);
														
										if($this->Uploadpregeneratecard->save($_data)){										
											$row = 0;											
											if (($handle = fopen($new_file, "r")) !== FALSE) {
												while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
													$num = count($data);												
													$row++;
													if($row > 1){ // do not include the header name	
														if(!empty($data[0])){
															$check_data = array(
																'Cardpregen.cardno' => str_replace("-", "", $data[0])
															);
															
															
															if(!$this->checkPregenExists($check_data)){
																
																$new_data[] = array(
																	/*'Card'	=> array(										
																		'institution_id'	 => $this->data['Card']['institution_id'],
																		'product_id'		 => $this->data['Card']['product_id'],
																		'cardno'			 => str_replace("-", "", $data[0]),																		
																		'cardstatus_id'		 => 2, //pending status,																			
																		'cardtype_id'		 => $this->data['Card']['cardtype_id'],
																		'pincode'			 => $data[1],
																		'balance'			 => 0,
																		'currency_id'		 => '1',
																		//'refid'				 => $this->data['Card']['refid'],
																		'processed_by'		 => $this->Auth->user('username'),
																		'registration'		 => date('Y-m-d H:i:s')																		
																	)*/
																	
																	'Cardpregen'	=> array(										
																		'user_id'	 		 => $this->Auth->user('id'),
																		'cardno'			 => str_replace("-", "", $data[0]),			
																		'pincode'			 => $data[1],			
																		'cardtype'		 	 => $this->data['Cardpregen']['cardtype_id'],
																		'product'		 	 => $this->data['Cardpregen']['product_id'],
																		'institution'	 	 => $this->data['Cardpregen']['institution_id'],
																		'date_time'			 => date('Y-m-d H:i:s'),			
																		'status'			 => 0																																	
																																	
																	)
																	
																);
															}else{
																$status = '<span class="text-danger">Card No. Already Exists.</span>';
																$existing_data[] = array(
																	/*'Card'	=> array(										
																		'institution_id'	 => $this->data['Card']['institution_id'],
																		'product_id'		 => $this->data['Card']['product_id'],
																		'cardno'			 => str_replace("-", "", $data[0]),																		
																		'cardstatus_id'		 => 2, //pending status,																			
																		'cardtype_id'		 => $this->data['Card']['cardtype_id'],
																		'pincode'			 => $data[1],
																		'balance'			 => 0,
																		'currency_id'		 => '1',
																		//'refid'				 => $this->data['Card']['refid'],
																		'processed_by'		 => $this->Auth->user('username'),
																		'registration'		 => date('Y-m-d H:i:s')
																	)*/
																	'Cardpregen'	=> array(										
																		'user_id'	 		 => $this->Auth->user('id'),
																		'cardno'			 => str_replace("-", "", $data[0]),			
																		'pincode'			 => $data[1],			
																		'cardtype'		 	 => $this->data['Cardpregen']['cardtype_id'],
																		'product'		 	 => $this->data['Cardpregen']['product_id'],
																		'institution'	 	 => $this->data['Cardpregen']['institution_id'],
																		'date_time'			 => date('Y-m-d H:i:s'),			
																		'status'			 => 0																																	
																																	
																	)
																	
																);
															}
															
															$_tabledata[] = array(
																	$data[0],
																	$status
															);
														}
													}
												}
												
												
												fclose($handle);
												
													if(!empty($new_data)){
														if($this->Cardpregen->saveAll($new_data)){
															$response = array(
																'status' 	=> 200,
																'message' 	=> "File has been uploaded and all the data has been processed.",
																'_data' 	=> $_tabledata
															);
														}else{
															$response = array(
																'status' 	=> 200,
																'message' 	=> "File has been uploaded but unable to processed the data",
																'_data' 	=> $_tabledata																
																						
															);
														}
													}else{
														$response = array(
															'status' 	=> 200,
															'message' 	=> "File has been uploaded but no data found on the file.",
															'_data' 	=> $_tabledata
														);	
													}
												
											}else{
												$response = array(
													'status' 	=> 400,
													'message' 	=> "Unable to extract the file." .$new_file							
												);
											}

										}else{
											$response = array(
												'status' => 400,
												'message' => "There was an error while uploading the file, please try again."
											);	
										}
									
									
								
									}else{
										$response = array(
											'status' => 400,
											'message' => "Unable to process your request please try again."
										);
									}
									
								}else{
									$response = array(
											'status' => 400,
											'message' => "Unable to read the file, please try again."
										);
								}
							}	
			
				}else{
					$response = array(
											'status' => 400,
											'message' => "Unable to process your request please try again."
										);
				}
				
				return json_encode($response);
		}else{
			$cardtypes = $this->Card->Cardtype->find('list', array('conditions' => array('Cardtype.id' => 1)));
			$products = $this->Card->Product->find('list', array('order' => array('Product.id' => 'ASC')));
			$institutions = $this->Card->Institution->find('list', array('order' => array('Institution.id' => 'ASC')));			
			$this->set(compact('cardtypes', 'products', 'institutions'));
		}
		
	}
	

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	
	/*public function delete($id = null) {
		$this->Card->id = $id;
		if (!$this->Card->exists()) {
			throw new NotFoundException(__('Invalid card'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Card->delete()) {
			$this->Session->setFlash(__('The card has been deleted.'));
		} else {
			$this->Session->setFlash(__('The card could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}*/
}
