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
	public $components = array('Paginator', 'Common');
	
	function beforeFilter(){	
		parent::beforeFilter();	
       // $this->set('breadcrumbs', $this->Common->setBreadcrumb(isset($this->params['url']['url']) ? $this->params['url']['url'] : 'Home'));
		if($this->params['action']=="home"){
			return $this->redirect(array('action' => 'index'));
		}
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
				$this->view($card['Card']['id']	, $card['Card']['cardno']);				
			}else{	
				$this->view = 'add';
				$this->add();
			}
		
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
					
						if(count($cards) > 0){
							$data = array();
							foreach($cards as $t):
								$data[] = array(
									$t['Card']['cardno'],	
									//'<a href="'.$this->webroot.'cardholders/view/'.$t['Cardholder']['id'].'" title="View Details" class="fs-11 tab_table_link" data-toggle="modal" data-target="#view_content_"><i class="fas fa-eye fa-lg"></i> &nbsp;'.$t['Cardholder']['firstname'].' '.$t['Cardholder']['middlename'].' '.$t['Cardholder']['lastname'].'</a>',									
									'<a href="#" 
										url="'.$this->webroot.'cardholders/view/'.$t['Cardholder']['id'].'" 
										title="View Card Holder" 
										data-td-id = "td_'.$t['Cardholder']['id'].'"
										data-_murl = "'.$this->webroot.'cardholders/view/'.$t['Cardholder']['id'].'"
										data-_type = "holder"
										data-toggle="modal"
										data-target="#view_card_detail_"										
										class="fs-11 card-link-modal nooutline td_'.$t['Cardholder']['id'].'">'.$t['Cardholder']['firstname'].' '.$t['Cardholder']['middlename'].' '.$t['Cardholder']['lastname'].'</a>',
									$t['Product']['name'],				
									$t['Cardtype']['name'],				
									date('Y M d', strtotime($t['Card']['registration'])),
									date('Y M d', strtotime($t['Card']['modified'])),
									//$t['Card']['last_transaction'],																			
									number_format($t['Card']['balance'], 2, ".", ","),		
									$t['Cardstatus']['name'],
									'<a href="#" 
										url="'.$this->webroot.'cards/viewClientCard/'.$t['Cardholder']['id'].'/'.$t['Cardholder']['refid'].'" 
										title="View Card" 
										data-td-id = "td_'.$t['Cardholder']['id'].'"
										data-_murl = "'.$this->webroot.'transpurchases/getTransactions/'.$t['Card']['cardno'].'"
										data-toggle="modal"
										data-_type = "card"										
										data-target="#view_card_detail_"
										class="fs-11 card-link-modal nooutline td_'.$t['Cardholder']['id'].'"><i class="fas fa-eye fa-lg"></i></a>
									<a href="'.$this->webroot.'cards/edit/'.$t['Card']['id'].'/'.$t['Card']['cardholder_id'].'/'.$t['Card']['refid'].'" title="Make Changes" class="fs-10"><i class="fas fa-edit fa-lg"></i></a>
										'
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
	
	
	public function dashboard(){
		$this->set('count_active', $this->countCardHolders(1));
		$this->set('count_inactive', $this->countCardHolders(4));
		$this->set('count_pending', $this->countCardHolders(3));	
		
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
		
		//if($this->request->is('ajax')){
			$this->layout = 'ajax';
			
			if (!$this->Card->exists($id)) {
				throw new NotFoundException(__('Invalid card'));
			}
			
			if($this->checkCardStatus($id, $cardno)){
				$options = array('conditions' => array('Card.' . $this->Card->primaryKey => $id));
				$this->set('card', $this->Card->find('first', $options));
			}else{
				throw new NotFoundException(__('Invalid card'));
			}
						
		//}
		
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
	
	private function getCardLastSequence(){
		$this->Card->recursive = -2;
		$sequence = $this->Card->find('first', array(			
			'fields' => array(
				'Card.id'
			),
			'order' => array(
				'Card.id' => 'DESC'
			),
			'limit'	=> 1
		));
		
		return !empty($sequence) ? $sequence['Card']['id'] : 0;
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
	
	public function add($cardholder_id=null, $cardholder_ref=null, $org_stat=null) {
		
		if(empty($cardholder_id) || empty($cardholder_ref) || !$this->Card->Cardholder->exists($cardholder_id)){
			throw new NotFoundException(__('Invalid card holder'));
		}
		
		
		if($this->cardHolderHasCard($cardholder_id, $cardholder_ref)){
			$this->Message->msgSuccess("New card has been successfully registered");
			return $this->redirect(array('controller' => 'cardholders', 'action' => 'add'));	
		}
		//check if the holder has card already
		
		$this->set('last_id', $this->getCardLastSequence());
		$this->set('processed_by', $this->Auth->User('firstname').' '.$this->Auth->User('lastname'));
		$this->set('pin', $this->Common->generate_pin());
		$this->set('bin', $this->getBankDetail('bin'));
		$this->set('check_digit', $this->getBankDetail('check_digit'));
		$this->set('cardholder_ref', $cardholder_ref);
		$this->set('cardholder_id', $cardholder_id);
		
		$this->set('holder', $this->getHolderDetailsByIdAndRef($cardholder_id, $cardholder_ref));
		
		if ($this->request->is('post')) {
				
				$cardno = $this->data['Card']['cardno_1'] . $this->data['Card']['cardno_2'] . $this->data['Card']['cardno_3'] . $this->data['Cardholder']['cardno_4'];
				
				$this->Card->create();			
				//if ($this->Card->save($this->request->data)) {
					
					
					//send the pin via SMS and email
					
					/*
					if($this->Cardholder->Card->Cardapplication->save(
						array(
							'Cardapplication' => array(
								'cardno' 		=> $cardno,
								'cardstatus_id' => $this->data['Cardholder']['cardstatus_id'],
								'user_id'		=> $this->Auth->user('id'),
								'terminal_id'	=> $this->Auth->user('terminal_id'),
								'refid'			=> $this->data['Cardholder']['refid']
							)
						))){
							
							
							$holder = $this->getCardHolderByRefId($this->data['Cardholder']['refid']);
							$application = $this->getApplicationByRefId($this->data['Cardholder']['refid']);
				
							if(empty($holder)){
								throw new NotFoundException(__('Unable to get card holder details, please contact the system administrator'));
							}*/
							
							
							if($this->Card->save(
								array(
									'Card'	=> array(										
										'cardholder_id'		 => $this->data['Card']['cardholder_id'],
										'product_id'		 => $this->data['Card']['product_id'],
										'cardno'			 => $cardno,
										'cardstatus_id'		 => $this->data['Card']['cardstatus_id'],
										'bin'		 		 => $this->data['Card']['cardno_1'],						
										'sequence'		 	 => $this->data['Card']['cardno_3'],						
										'check_digit'		 => $this->data['Card']['cardno_4'],						
										'cardtype_id'		 => $this->data['Card']['cardtype_id'],						
										'pincode'			 => $this->data['Card']['pincode'],
										'balance'			 => $this->data['Card']['balance'],
										'currency_id'		 => '1',
										'refid'				 => $this->data['Card']['refid'],
										'processed_by'		 => $this->data['Card']['processed_by'],
										'registration'		 => date('Y-m-d'),
										'modified'		 	 => date('Y-m-d')
									)
							))){
							
								/*$this->Session->setFlash($this->Message->showMsg('success_save_normal_data'), 'success_message');
								
							}else{
								
								//$this->Session->setFlash($this->Message->showMsg('cardholder_second_save'), 'info_message');	
								$this->Message->msgError("Unable card details, please contact the system administrator");
							}
						
					}else{
					
						$this->Message->msgError("Unable card application details, please contact the system administrator");
					}*/
					
					$this->Message->msgSuccess("New card has been successfully registered");
					return $this->redirect(array('controller' => 'cardholders', 'action' => 'add'));			
				} else {
					$this->Session->setFlash($this->Message->showMsg('error_save_normal_data'), 'error_message');
					$ds_cardholder->rollback();
				}
		
		}
				
		//$cardstatuses = $this->Card->Cardstatus->find('list');		
		$cardtypes = $this->Card->Cardtype->find('list');
		$products = $this->Card->Product->find('list');
		//$this->set(compact('cardtypes', 'cardstatuses', 'products'));
		$this->set(compact('cardtypes', 'products'));
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
