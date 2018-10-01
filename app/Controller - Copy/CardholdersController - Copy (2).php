<?php
App::uses('AppController', 'Controller');
App::uses('AuthComponent', 'Controller/Component');


/**
 * Cardholders Controller
 *
 * @property Cardholder $Cardholder
 * @property PaginatorComponent $Paginator
 */
class CardholdersController extends AppController {

	public $components = array('Paginator');
	public $helpers = array('Lang');
	
	function beforeFilter(){	
		parent::beforeFilter();	
        $this->set('breadcrumbs', $this->Common->setBreadcrumb(isset($this->params['url']['url']) ? $this->params['url']['url'] : 'Home'));
		if($this->params['action']=="home"){
			return $this->redirect(array('action' => 'index'));
		}
    }
	
/**
 * Components
 *
 * @var array
 */
	

/**
 * index method
 *
 * @return void
 */
	private function countCards($stat){
		return	$this->Cardholder->find('count', array(
				'conditions' => array(				
					'Cardholder.cardholderstatus_id' => $stat
				)
			)
		);
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
			$this->set('file_name', $this->Common->generateFilename('activated_card', $date_from, $date_to));
			$this->render();
	}
	
	
	private function getListofTransactions($date_from=null, $date_to=null, $status=null){
			if(!empty($date_from) && !empty($date_to)){
					if($date_to > $date_from){
						$trans = $this->Cardholder->find('all', 
							array(
								'conditions' => array(							
									'Cardholder.modified BETWEEN ? AND ?' => array(
										$date_from, $date_to
									),
									'Carholder.cardholderstatus_id' => 1
								),															
								'order' => array(
									'Cardholder.modified' => 'DESC'
									)
							)							
						);
					}else{
						$trans = false;
					}
				}else{
					$trans = $this->Cardholder->find('all', array(
							'order' => array(
								'Cardholder.modified' => 'DESC'
							)
						)
					);
				}
		
		return $trans;
	}
	
	public function index($status=null) {		
		$this->Cardholder->recursive = 0;	
		$status 		= isset($status) && !empty($status) ? $status : 1;

		if(isset($status) && !empty($status)){
			if(!$this->Cardholder->Cardholderstatus->exists($status)){
				throw new NotFoundException(__('Invalid card holder status'));
			}
			/*$options  = array(
				'conditions' => array(				
					'Cardholder.cardholderstatus_id' => $status
				),
				'order' => array(				
					'Cardholder.lastname' => 'DESC'
				)
			);
				*/
			//$cardholders =  $this->Cardholder->find('all', $options);
		
			//$this->set('cardholders', $cardholders);
			$this->set('count_active', $this->countCards(1));
			$this->set('count_inactive', $this->countCards(4));
			$this->set('count_pending', $this->countCards(3));
			$this->set('status', $status);
			
		}else{			
			throw new NotFoundException(__('Invalid Request, please try again.'));			
		}
		
	}
	
	public function countCardHolders($status = null){
		
	}
	
	public function updateCardStatus($status=null, $holder_ref=null, $holder_id=null, $org_stat=null){
		//$this->layout = 'ajax';
		$this->autoRender = false;
		$this->view = false;
		
		if(!$this->Cardholder->Cardholderstatus->exists($status) && !$this->Cardholder->exists($id)){
			throw new NotFoundException(__('Invalid Card Holder'));
		}
				
		//if($this->request->is('put')){
			$this->Cardholder->recursive = 1;
			$holder = $this->Cardholder->find('first', array(
					'conditions' => array(
						'Cardholder.id' 	=> $holder_id,
						'Cardholder.refid' 	=> $holder_ref
					),
					'fields' => array(
						'Cardholder.id',
						'Card.id'
					)
				)
			);
			
			if(!empty($holder)){
				$this->Cardholder->id = $holder['Cardholder']['id'];
				if($this->Cardholder->saveField('cardholderstatus_id', $status) && $this->Cardholder->saveField('approved_by', $this->Auth->user('firstname').' '.$this->Auth->user('lastname'))){					

					$this->Cardholder->Card->id = $holder['Card']['id'];
					if($this->Cardholder->Card->saveField("cardstatus_id", 1) && $this->Cardholder->Card->saveField('approved_by', $this->Auth->user('firstname').' '.$this->Auth->user('lastname')) && $this->Cardholder->Card->saveField("modified", date('Y-m-d'))){		
						$this->Message->msgCommonUpdate();
						if($org_stat!=="1" && !$this->holderHasCard($holder_id, $holder_ref)){
							return $this->redirect(array('controller' => 'cards', 'action' => 'add', $holder_id, $holder_ref, $org_stat));			
						}else{
							return $this->redirect(array('action' => 'index', $org_stat));		
						}
					}else{
						$this->Message->msgCommonError();
						return $this->redirect(array('action' => 'index', $org_stat));				
					}
					
				}else{
					$this->Message->msgCommonError();
					return $this->redirect(array('action' => 'index', $org_stat));			
				}
			}else{
				$this->Message->msgCommonError();
				return $this->redirect(array('action' => 'index', $org_stat));			
			}
			
			
		//}
	}
	
	private function holderHasCard($holder_id, $holder_ref){
		$this->Cardholder->Card->recursive = -2;
		$card = $this->Cardholder->Card->find('first', array(
					'conditions' => array(
						'Card.cardholder_id' => $holder_id,
						'Card.refid' => $holder_ref
					),
					'fields' => array(
						'Card.id'
					)
				)
			);
		
		if(!empty($card)){
			return true;
		}else{
			return false;
		}
		
		
	}
	
	
	public function getCardHolders($status=null) {		
		$this->Cardholder->recursive = 0;	
		$status 		= isset($status) && !empty($status) ? $status : 1;
		$this->layout = 'ajax';
		$this->autoRender = false;
		$this->view = false;
		$view_template = '';
		
		if($this->request->is('ajax')){
			if(isset($status) && !empty($status)){
				if(!$this->Cardholder->Cardholderstatus->exists($status)){
					$response = $this->Message->respMsg(400);
				}
				
				
				if($status!=="1"){
					$view_template = 'view-pending';
				}
				
				$options  = array(
					'conditions' => array(				
						'Cardholder.cardholderstatus_id' => $status
					),
					'order' => array(				
						'Cardholder.lastname' => 'DESC'
					),
					'fields' => array(
						'Cardholder.id',
						'Cardholder.firstname',
						'Cardholder.middlename',
						'Cardholder.lastname',
						'Cardholder.contact_no',
						'Cardholder.gender',
						'Cardholder.birthdate',
						'Cardholder.registration',
						'Cardholder.modified',
						'Card.cardno',
						'Card.id',
						'Cardholder.refid'
					)					
				);
					
				$cardholders =  $this->Cardholder->find('all', $options);
				
				if($cardholders){
						$data = array();
					
						if(count($cardholders) > 0){
							$data = array();
							foreach($cardholders as $t):
								$data[] = array(
									$t['Cardholder']['firstname'],	
									$t['Cardholder']['middlename'],	
									$t['Cardholder']['lastname'],
									'(+63)'.$t['Cardholder']['contact_no'],
									$t['Cardholder']['gender'],
									date('Y M d', strtotime($t['Cardholder']['birthdate'])),
									date('Y M d h:i A', strtotime($t['Cardholder']['registration'])),									
									date('Y M d h:i A', strtotime($t['Cardholder']['modified'])),									
									!empty($t['Card']['id']) ? '<a href="#" 
										url="'.$this->webroot.'cards/viewClientCard/'.$t['Cardholder']['id'].'/'.$t['Cardholder']['refid'].'" 
										title="View Card" 
										data-_murl = "'.$this->webroot.'transpurchases/getTransactions/'.$t['Card']['cardno'].'"
										data-toggle="modal"
										data-target="#view_card_detail_"
										class="fs-10 card-link-modal nooutline
									">'.$t['Card']['cardno'].'</a>'  : '<span class="text-danger">Unregistered</span>',
									'<a href="'.$this->webroot.'cardholders/view/'.$t['Cardholder']['id'].'/'.$view_template.'" title="View Details" class="fs-10 tab_table_link" data-toggle="modal" data-target="#view_content_"><i class="fas fa-eye fa-lg"></i></a>
									<a href="'.$this->webroot.'cardholders/edit/'.$t['Cardholder']['id'].'" title="Make Changes" class="fs-10"><i class="fas fa-edit fa-lg"></i></a>'									
									//<a href="'.$this->webroot.'cards/viewClientCard/'.$t['Cardholder']['id'].'/'.$t['Cardholder']['refid'].'" title="View Card" class="fs-14" data-toggle="modal" data-target="#view_card_detail_"><i class="fas fa-address-card fa-lg"></i></a>'									
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

	

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null, $stat_view=null) {
		if (!$this->Cardholder->exists($id)) {
			throw new NotFoundException(__('Invalid cardholder'));
		}
		
		if(isset($stat_view) && !empty($stat_view)){
			$this->view = $stat_view;
		}else{
			$this->view = 'view';
		}
		
		$options = array('conditions' => array('Cardholder.' . $this->Cardholder->primaryKey => $id));
		$this->set('cardholder', $this->Cardholder->find('first', $options));		
		$this->request->data = $this->Cardholder->find('first', $options);
			
	}

/**
 * add method
 *
 * @return void
 */
	
	public function customSave($data){
		$this->begin($this);
		if(!parent::save($data)){
			$this->rollback($this);
			return false;
		}
			
		$this->commit();
		return true;
	}
	
	private function getCardHolderByRefId($refid){
		$this->recursive = -1;
		return $this->Cardholder->findByRefid($refid);		
	}
	
	
	private function getApplicationByRefId($refid){
		$this->recursive = -1;
		return $this->Cardholder->Card->Cardapplication->findByRefid($refid);		
	}
	
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
		$this->Cardholder->Card->recursive = -2;
		$sequence = $this->Cardholder->Card->find('first', array(			
			'fields' => array(
				'Card.id'
			),
			'order' => array(
				'Card.id' => 'DESC'
			),
			'limit'	=> 1
		));
		
		return $sequence['Card']['id'];
	}
	
	private function checkCardholderExistence($firstname, $lastname, $middlename, $birthdate){
		$this->Cardholder->recursive = -2;
		$holder = $this->Cardholder->find('first', array(
				'conditions' => array(
					'Cardholder.firstname' 	=> $firstname,
					'Cardholder.middlename' => $middlename,
					'Cardholder.lastname' 	=> $lastname,
					'Cardholder.birthdate' 	=> $birthdate
				),
				'fields' => array(
					'Cardholder.id', 'Cardholder.refid'
				)				
			)
		);
		
		if(empty($holder)){
			return true;
		}else{
			return false;
		}			
		
	}
	
	
	public function add() {
						
		//get the last card sequence number then update		
		//$this->set('last_id', $this->getCardLastSequence());
		$this->set('refid', $this->Common->generateRandomString(12));
		//$this->set('pin', $this->Common->generate_pin());
		//$this->set('bin', $this->getBankDetail('bin'));
		//$this->set('check_digit', $this->getBankDetail('check_digit'));
		$this->set('processed_by', $this->Auth->User('firstname').' '.$this->Auth->User('lastname'));
		//get the bank bin for card no.
		/*
		CARD NO GENERATION FORMAT
			first 8 digit - BIN (Bank Identification Number - 56142100)
			next  1 digit - Product Type (1)
			next  6 digit - Sequence
			last  1 digit - Check digit
		 */
		
		if ($this->request->is('post')) {
			//$cardno = $this->data['Cardholder']['cardno_1'] . $this->data['Cardholder']['cardno_2'] . $this->data['Cardholder']['cardno_3'] . $this->data['Cardholder']['cardno_4'];
			
			//check card holder exists();
			
			if($this->checkCardholderExistence($this->data['Cardholder']['firstname'], $this->data['Cardholder']['lastname'], $this->data['Cardholder']['middlename'], $this->data['Cardholder']['birthdate'])){
				$this->Cardholder->create();			
				if ($this->Cardholder->save($this->request->data)) {
					$this->Message->msgSuccess("New Account has been successfully added");
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
							}
							
							if($this->Cardholder->Card->save(
								array(
									'Card'	=> array(
										'cardapplication_id' => $application['Cardapplication']['id'],
										'cardholder_id'		 => $holder['Cardholder']['id'],
										'cardno'			 => $cardno,
										'cardstatus_id'		 => $this->data['Cardholder']['cardstatus_id'],
										'bin'		 		 => $this->data['Cardholder']['cardno_1'],						
										'sequence'		 	 => $this->data['Cardholder']['cardno_3'],						
										'check_digit'		 => $this->data['Cardholder']['cardno_4'],						
										'cardtype_id'		 => $this->data['Cardholder']['cardtype'],						
										'pincode'			 => $this->data['Cardholder']['pin'],
										'balance'			 => $this->data['Cardholder']['balance'],
										'currency_id'		 => '1',
										'refid'				 => $this->data['Cardholder']['refid']
									)
							))){
							
								$this->Session->setFlash($this->Message->showMsg('success_save_normal_data'), 'success_message');
								
							}else{
								
								//$this->Session->setFlash($this->Message->showMsg('cardholder_second_save'), 'info_message');	
								$this->Message->msgError("Unable card details, please contact the system administrator");
							}
						
					}else{
					
						$this->Message->msgError("Unable card application details, please contact the system administrator");
					}*/
					
					
					$holder = $this->getCardHolderByRefId($this->data['Cardholder']['refid']);					
					return $this->redirect(array('controller' => 'cardholderids', 'action' => 'add', $holder['Cardholder']['id'], $holder['Cardholder']['refid'], $holder['Cardholder']['cardholderstatus_id']));			
					//return $this->redirect(array('controller' => 'cards', 'action' => 'add', $holder['Cardholder']['id'], $holder['Cardholder']['refid'], $holder['Cardholder']['cardholderstatus_id']));			
					//return $this->redirect(array('action' => 'add'));
				} else {
					$this->Session->setFlash($this->Message->showMsg('error_save_normal_data'), 'error_message');
					//$ds_cardholder->rollback();
				}
			}else{
				$this->Message->msgError("The same account exists, please check the details in the master record.");	
			}
		}
		$cards = $this->Cardholder->Card->find('list');
		$cardstatuses = $this->Cardholder->Card->Cardstatus->find('list');
		//$cardholderstatuses = $this->Cardholder->Cardholderstatus->find('list');
		$cardtypes = $this->Cardholder->Card->Cardtype->find('list');
		$this->set(compact('cards', 'cardtypes', 'cardstatuses'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
 
	private function deactivateAllCards($holderid, $refid){
		$this->Cardholder->Card->recursive = -2;
		$cards = $this->Cardholder->Card->find('all', array(
				'conditions' => array(
					'Card.refid' => $refid,
					'Card.cardholder_id' => $holderid
				),
				'fields' => array(
					'Card.id'
				)
			)
		);
		
		if(count($cards) > 0 ){
			foreach($cards as $key => $card):
				$this->Cardholder->Card->id = $card['Card']['id'];
				$this->Cardholder->Card->saveField('cardstatus_id', 2);
			endforeach;
		}
	}
	
	public function edit($id = null) {
		if (!$this->Cardholder->exists($id)) {
			throw new NotFoundException(__('Invalid cardholder'));
		}
		if ($this->request->is(array('post', 'put'))) {
			
			if ($this->Cardholder->save($this->request->data)) {
				/*if($this->data['Cardholder']['cardholderstatus_id'] !=="1"){
					//deactivate all the cards
					$this->deactivateAllCards($this->data['Cardholder']['id'], $this->data['Cardholder']['refid']);
				}*/
			
				//$this->Session->setFlash(__('The cardholder has been saved.'));
				$this->Message->msgCommonUpdate();
				return $this->redirect(array('action' => 'edit', $id));
			} else {
				//$this->Session->setFlash(__('The cardholder could not be saved. Please, try again.'));
				$this->Message->msgCommonError();
			}
		} else {
			$options = array('conditions' => array('Cardholder.' . $this->Cardholder->primaryKey => $id));
			$this->request->data = $this->Cardholder->find('first', $options);
		}
		//$cards = $this->Cardholder->Card->find('list');
		//$cardtypes = $this->Cardholder->Card->Cardtype->find('list');
		//$cardholderstatuses = $this->Cardholder->Cardholderstatus->find('list');
		//$this->set(compact('cardtypes', 'cardholderstatuses'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Cardholder->id = $id;
		if (!$this->Cardholder->exists()) {
			throw new NotFoundException(__('Invalid cardholder'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Cardholder->delete()) {
			$this->Session->setFlash(__('The cardholder has been deleted.'));
		} else {
			$this->Session->setFlash(__('The cardholder could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
