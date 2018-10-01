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
	public function index($status=null) {		
		$this->Cardholder->recursive = 0;		
		if(isset($status) && !empty($status)){
			if(!$this->Cardholder->Cardholderstatus->exists($status)){
				throw new NotFoundException(__('Invalid card holder status'));
			}
			$options  = array(
				'conditions' => array(				
					'Cardholder.cardholderstatus_id' => $status
				),
				'order' => array(				
					'Cardholder.lastname' => 'DESC'
				)
			);
		}else{
			$options  = array(
				'order' => array(				
					'Cardholder.lastname' => 'DESC'
				)
			);	
		}
		$this->set('cardholders', $this->Cardholder->find('all', $options));
		
		
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Cardholder->exists($id)) {
			throw new NotFoundException(__('Invalid cardholder'));
		}
		$options = array('conditions' => array('Cardholder.' . $this->Cardholder->primaryKey => $id));
		$this->set('cardholder', $this->Cardholder->find('first', $options));
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
		 
		
		$ds_cardholder	= $this->Cardholder->getdatasource();		
		$ds_card		= $this->Cardholder->Card->getdatasource();		
		$ds_application	= $this->Cardholder->Card->Cardapplication->getdatasource();		
		
		
		if ($this->request->is('post')) {
			$cardno = $this->data['Cardholder']['cardno_1'] . $this->data['Cardholder']['cardno_2'] . $this->data['Cardholder']['cardno_3'] . $this->data['Cardholder']['cardno_4'];
			
			//check card holder exists();
			
			if($this->checkCardholderExistence($this->data['Cardholder']['firstname'], $this->data['Cardholder']['lastname'], $this->data['Cardholder']['middlename'], $this->data['Cardholder']['birthdate'])){
				$this->Cardholder->create();			
				if ($this->Cardholder->save($this->request->data)) {
					
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
								
								$ds_application->commit();
								$ds_cardholder->commit();
								$ds_card->commit();
							
								$this->Session->setFlash($this->Message->showMsg('success_save_normal_data'), 'success_message');
								
							}else{
								$ds_application->rollback();
								$ds_card->rollback();
								$ds_cardholder->rollback();
								//$this->Session->setFlash($this->Message->showMsg('cardholder_second_save'), 'info_message');	
								$this->Message->msgError("Unable card details, please contact the system administrator");
							}
						
					}else{
						$ds_application->rollback();					
						$ds_cardholder->rollback();
						$this->Message->msgError("Unable card application details, please contact the system administrator");
					}
				
					return $this->redirect(array('action' => 'add'));
				} else {
					$this->Session->setFlash($this->Message->showMsg('error_save_normal_data'), 'error_message');
					$ds_cardholder->rollback();
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
				if($this->data['Cardholder']['cardholderstatus_id'] !=="1"){
					//deactivate all the cards
					$this->deactivateAllCards($this->data['Cardholder']['id'], $this->data['Cardholder']['refid']);
				}
			
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
		$cardtypes = $this->Cardholder->Card->Cardtype->find('list');
		$cardholderstatuses = $this->Cardholder->Cardholderstatus->find('list');
		$this->set(compact('cardtypes', 'cardholderstatuses'));
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
