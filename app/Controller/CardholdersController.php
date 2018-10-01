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
	
	private function getTheLastCif(){
		$this->Cardholder->recursive=-1;
		$cif = $this->Cardholder->find('first', array(
			'order' => array('Cardholder.cif_no' => 'DESC'),
			'fields' => array('Cardholder.cif_no')
		));
		
		$cifno = "";
		if(!empty($cif['Cardholder']['cif_no'])){
			$cifno = 0 . ( $cif['Cardholder']['cif_no'] + 1 );
		}else{
			$cifno = "01000001";
		}
		
		return $cifno;
	}
	
	
	public function generate_cardholder_activity($date_from=null, $date_to=null){
			$this->layout = 'pdf'; 			
			$this->set('filename', 'card_holder');
			$this->set('date_from', $date_from);
			$this->set('date_to', $date_to);
			$this->set('title', !empty($date_from) && !empty($date_to) ? $date_from.'-'.$date_to : date('Y-m-d'));
			
			$this->Cardholder->recursive=-1;
			$this->set('total_holders',$this->getTotalCardHolders());
			$this->set('total_active', $this->getTotalCardHolders(1));
			$this->set('total_inactive', $this->getTotalCardHolders(2));
			
			//total number of cardholders
			//total active card holders
			//total inactive card holders
			//holders with 0
			//holders with 1 - 5
			//holders with 6 -10
			//holders with 11 - 15
			//holders with over 16
			$this->render();
	}
	
	private function getTotalCardHolders($status=null, $date_from=null, $date_to=null){
			
		
				if(!empty($date_from) && !empty($date_to)){
					if($date_to >= $date_from){
						if(!empty($status)){
							$conditions = array(
									'conditions' => array(							
										'Cardholder.registration BETWEEN ? AND ?' => array(
											$date_from, $date_to
										),
										'Cardholder.cardholderstatus_id' => $status
									)
													
								);
						}else{
							$conditions = array(
									'conditions' => array(							
										'Cardholder.registration BETWEEN ? AND ?' => array(
											$date_from, $date_to
										),
										'Cardholder.cardholderstatus_id >= ' => 1
									)
							);
						}
					}
				}else{
						if(!empty($status)){
							$conditions = array(
									'conditions' => array(							
										'Cardholder.cardholderstatus_id' => $status
									)
													
								);
						}else{
							$conditions = '';
						}
				}
				
			return $this->Cardholder->find('count', $conditions);
				
	}
	
	public function searchByHolder($cardno=null, $holder=null){
			
			$this->layout = 'ajax';
			$this->view = false;
			$this->autoRender = false;
			
			if($this->request->is('ajax')){
				if($holder=="default" && $cardno=="default"){
					$response = array(
						'status' 	=> 400,
						'message' 	=> 'You have entered an invalid keyword, please try again.'
					);
				}else{
					
					if($holder=="default"){
						$conditions = array(	
								'OR' => array(
									'Card.cardno LIKE' => "%$cardno%",									
								)
						);
					}else{
					
						if($cardno=="default"){
							$conditions = array(	
									'OR' => array(
										'Cardholder.firstname LIKE' => "%$holder%",
										'Cardholder.middlename LIKE' => "%$holder%",
										'Cardholder.lastname LIKE' => "%$holder%",
									)
							);
						}else{
							$conditions = array(	
									'OR' => array(
										'Cardholder.firstname LIKE' => "%$holder%",
										'Cardholder.middlename LIKE' => "%$holder%",
										'Cardholder.lastname LIKE' => "%$holder%",
										'Card.cardno LIKE' => "%$cardno%"
									)
							);
						}
					
					}
					
				
					$options  = array(
						'conditions' => $conditions,
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
							'Cardholderstatus.name',
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
									//	date('Y M d', strtotime($t['Cardholder']['birthdate'])),
										date('Y M d', strtotime($t['Cardholder']['registration'])),									
										date('Y M d', strtotime($t['Cardholder']['modified'])),								
										$t['Cardholderstatus']['name'],
										/*!empty($t['Card']['id']) ? '<a href="#" 
											url="'.$this->webroot.'cards/viewClientCard/'.$t['Cardholder']['id'].'/'.$t['Cardholder']['refid'].'" 
											title="View Card" 
											data-td-id = "td_'.$t['Cardholder']['id'].'"
											data-_murl = "'.$this->webroot.'transpurchases/getTransactions/'.$t['Card']['cardno'].'"
											data-toggle="modal"
											data-_type = "card"										
											data-target="#view_card_detail_"
											class="fs-10 card-link-modal nooutline td_'.$t['Cardholder']['id'].'">'.$t['Card']['cardno'].'</a>'  : '<span class="text-danger">Unregistered</span>',*/
										'<a href="#" 
											url="'.$this->webroot.'cardholders/view/'.$t['Cardholder']['id'].'" 
											title="View Card Holder" 
											data-td-id = "td_'.$t['Cardholder']['id'].'"
											data-_murl = "'.$this->webroot.'cardholders/view/'.$t['Cardholder']['id'].'"
											data-_type = "holder"
											data-toggle="modal"
											data-target="#view_card_detail_"										
											class="fs-10 user-link-modal nooutline td_'.$t['Cardholder']['id'].'"><i class="fas fa-eye fa-lg"></i></a>'									
										//<a href="'.$this->webroot.'cardholders/edit/'.$t['Cardholder']['id'].'" title="Make Changes" class="fs-10"><i class="fas fa-edit fa-lg"></i></a>'									
										//'<a href="'.$this->webroot.'cardholders/view/'.$t['Cardholder']['id'].'/'.$view_template.'" title="View Details" class="fs-10 tab_table_link" data-toggle="modal" data-target="#view_content_"><i class="fas fa-eye fa-lg"></i></a>'
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
				}
				return json_encode($response);
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
	
	private function cardholderStatus($status){
		$this->Cardholder->Cardholderstatus->recursive = -2;
		$status = $this->Cardholder->Cardholderstatus->findById($status);
		return $status['Cardholderstatus']['name'];
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
			$filename = 'cardholders_' . strtolower($this->cardholderStatus($status));			
			$this->set('file_name', !empty($date_from) && !empty($date_to) ? $filename.'_'.$date_from.'-'.$date_to : $filename.'_'.date('Y-m-d'));
			$this->render();
	}
	
	
	private function getListofTransactions($date_from=null, $date_to=null, $status=null){
			$this->Cardholder->recursive=-1;
			if(!empty($date_from) && !empty($date_to)){
					if($date_to > $date_from){
						$trans = $this->Cardholder->find('all', 
							array(
								'conditions' => array(							
									'Cardholder.modified BETWEEN ? AND ?' => array(
										$date_from, $date_to
									),
									'Carholder.cardholderstatus_id' => $status
								),															
								'order' => array(
									'Cardholder.modified' => 'DESC'
								),
								'fields' => array(
									'Cardholder.firstname',
									'Cardholder.middlename',
									'Cardholder.lastname',
									'Cardholder.registration',
									'Cardholder.modified',
									'Cardholder.processed_by',
									'Cardholder.approved_by',
									'Cardholder.refid'										
								)
								
							)							
						);
					}else{
						$trans = false;
					}
				}else{
					$trans = $this->Cardholder->find('all', 
						array(
							'conditions' => array(
								'Cardholder.cardholderstatus_id' => $status
							),							
							'order' => array(
								'Cardholder.modified' => 'DESC'
							),
							'fields' => array(
									'Cardholder.firstname',
									'Cardholder.middlename',
									'Cardholder.lastname',
									'Cardholder.registration',
									'Cardholder.modified',
									'Cardholder.processed_by',
									'Cardholder.approved_by',
									'Cardholder.refid'																
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
			//$this->set('count_approved', $this->countCards(1));
			//$this->set('count_active', $this->countCards(2));
			//$this->set('count_inactive', $this->countCards(3));
			//$this->set('count_pending', $this->countCards(4));
			//$this->set('count_rejected', $this->countCards(5));
			//$this->set('count_blocked', $this->countCards(6));
			$this->set('status', $status);
			
		}else{			
			throw new NotFoundException(__('Invalid Request, please try again.'));			
		}
		
	}
	
	public function countCardHolders($status = null){
		
	}
	
	private function cardHolderisNotActive($holder_id){
		$this->Cardholder->recursive=-1;
		$holder = $this->Cardholder->findById($holder_id);
		if($holder['Cardholder']['cardholderstatus_id']=="1"){
			return false;
		}else{
			return true;
		}
	}
	
	private function checkDataExists($fields){
		$data = $this->Cardholder->find('first', array('conditions' => array($fields)));
		
		if(!empty($data)){
			return true;
		}else{
			return false;
		}
	}		
	
	public function updateStatusViaForm(){
		$response = array();
		$this->layout = 'ajax';
		$this->autoRender = false;
		$this->view = false;
			
		if($this->request->is('ajax')){
			
			
			$holderid 	= $this->data['Cardholder']['id'];		
			$status		= $this->data['Cardholder']['status'];
			$refid		= $this->data['Cardholder']['refid'];
			
			$check_data = array(
				'Cardholder.id' => $holderid,
				'Cardholder.refid' => $refid				
			);
			
			if($this->checkDataExists($check_data)){
					$author = $this->Auth->user('username');
					$this->Cardholder->id = $holderid;
					if($this->Cardholder->saveField('cardholderstatus_id', $status) && $this->Cardholder->saveField('modified_by', $author) && $this->Cardholder->saveField('modified', date('Y-m-d h:i:s'))){
						$response = array(
							"status" 	=> 200,
							"message" 	=> "Account status has been successfully updated"
						);
					}else{
						$response = $this->Message->respMsg(400);
					}							
			}else{
				$response = $this->Message->respMsg(400, "Invalid data, please try again.".$cardid .$holderid .$refid. $status);	
			}
			
			return json_encode($response);
		}
	}
	
	public function updateCardStatus($status=null, $holder_ref=null, $holder_id=null, $org_stat=null){
		$this->layout = 'ajax';
		$this->autoRender = false;
		$this->view = false;
		
		if($this->request->is('ajax')){
			if(!$this->Cardholder->Cardholderstatus->exists($status) || !$this->Cardholder->exists($holder_id)){
				throw new NotFoundException(__('Invalid Card Holder'));
			}
			
			if($this->cardHolderisNotActive($holder_id)){
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
				
				//$author = $this->Auth->user('username').' '.$this->Auth->user('lastname');
				
				$author = $this->getTheAuthor();
				$cardapplication = $this->getCardApplication($holder_ref, "id");	
				
				
				if(!empty($holder) && !empty($cardapplication)){
					$this->Cardholder->id = $holder['Cardholder']['id'];
					if($this->Cardholder->saveField('cardholderstatus_id', $status)){					
							
							$this->Cardholder->saveField('modified', date('Y-m-d h:i:s'));
							$this->Cardholder->saveField('modified_by', $author);
													
							

							switch($status){
								case "1": //Active
										//update the application status												
										$this->Cardholder->Cardapplication->id = $cardapplication;
										$approved_holder = array(
											'Approvedaccount' => array(
												'cardholder_id' => $holder_id,
												'approved_date'	=> date('Y-m-d'),
												'approved_by'	=> $author
											)
										);
										$this->Cardholder->saveField('approved_by', $author);									
										$this->Cardholder->saveField('approved', date('Y-m-d h:i:s'));
							
										//insert into approved accounts
										if($this->Cardholder->Approvedaccount->save($approved_holder) && $this->Cardholder->Cardapplication->saveField('status', 1)){
											$response = array(
												"status" 		=> 200,
												"message" 		=> "Card Holder status has been successfully updated.",
												"card_status"	=> $status
											);
										}else{
												$response = array(
												"status" 		=> 400,
												"message" 		=> "Unable to process your request",
												"card_status"	=> $status
											);
										}

									//send notification to the client for the activation of card
								break;
								case "2": //Inactive
										//update the application status																						
										$deactivate_holder = array(
											'Approvedaccount' => array(
												'cardholder_id' => $holder_id,
												'approved_date'	=> date('Y-m-d'),
												'approved_by'	=> $author
											)
										);
										
										//insert into approved accounts
										if($this->Cardholder->Deactivateaccount->save($deactivate_holder)){
											$response = array(
												"status" 		=> 200,
												"message" 		=> "Card Holder status has been successfully updated.",
												"card_status"	=> $status
											);
										}else{
												$response = array(
												"status" 		=> 400,
												"message" 		=> "Unable to process your request",
												"card_status"	=> $status
											);
										}

								break;							
								/*case "3": //card should be inactive 2
									$this->Cardholder->Card->id = $holder['Card']['id']; 
									//$this->Cardholder->Card->saveField('cardstatus_id', 2);
									//$this->Cardholder->Card->saveField('modified', date('Y-m-d h:i:s'));
									//$this->Cardholder->Card->saveField('modified_by', $author);
								break; 
								case "6": //card should be block 5
									$this->Cardholder->Card->id = $holder['Card']['id'];
									//$this->Cardholder->Card->saveField('cardstatus_id', 5);
									//$this->Cardholder->Card->saveField('modified', date('Y-m-d h:i:s'));
									//$this->Cardholder->Card->saveField('modified_by', $author);
								break;
								default:
								break;*/
							}
							
							
						
					}else{						
						$response = $this->Message->respMsg(400);
					}
				}else{					
					$response = $this->Message->respMsg(400);
				}
			}else{
				$response = array(
					"status" 		=> 400,
					"message" 		=> "Account already activated.",
					"card_status"	=> $status
				);
			}
				
			return json_encode($response);
				
		}
		//}
	}
	
	private function getCardApplication($refid, $field=null){
		$this->Cardholder->Cardapplication->recursive =-1;
		$application = $this->Cardholder->Cardapplication->find('first', array('conditions' => array(
				'Cardapplication.refid' => $refid
			)
		));
		
		if(!empty($field)){
			if($field=="all"){
				return $application;
			}else{
				return $application['Cardapplication'][$field];		
			}
		}
		
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
									/*date('Y M d h:i A', strtotime($t['Cardholder']['registration'])),									
									date('Y M d h:i A', strtotime($t['Cardholder']['modified'])),									
									!empty($t['Card']['id']) ? '<a href="#" 
										url="'.$this->webroot.'cards/viewClientCard/'.$t['Cardholder']['id'].'/'.$t['Cardholder']['refid'].'" 
										title="View Card" 
										data-td-id = "td_'.$t['Cardholder']['id'].'"
										data-_murl = "'.$this->webroot.'transpurchases/getTransactions/'.$t['Card']['cardno'].'"
										data-toggle="modal"
										data-_type = "card"										
										data-target="#view_card_detail_"
										class="fs-10 card-link-modal nooutline td_'.$t['Cardholder']['id'].'">'.$t['Card']['cardno'].'</a>'  : '<span class="text-danger">Unregistered</span>',*/										
									'<a href="#" 
										url="'.$this->webroot.'cardholders/view/'.$t['Cardholder']['id'].'" 
										title="View Card Holder" 
										data-td-id = "td_'.$t['Cardholder']['id'].'"
										data-_murl = "'.$this->webroot.'cardholders/view/'.$t['Cardholder']['id'].'"
										data-_type = "holder"
										data-toggle="modal"
										data-target="#view_card_detail_"										
										class="fs-10 card-link-modal nooutline td_'.$t['Cardholder']['id'].'"><i class="fas fa-eye fa-lg"></i></a>									
									<a href="'.$this->webroot.'cardholders/edit/'.$t['Cardholder']['id'].'" title="Make Changes" class="fs-10"><i class="fas fa-edit fa-lg"></i></a>'									
									//'<a href="'.$this->webroot.'cardholders/view/'.$t['Cardholder']['id'].'/'.$view_template.'" title="View Details" class="fs-10 tab_table_link" data-toggle="modal" data-target="#view_content_"><i class="fas fa-eye fa-lg"></i></a>'
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
		
		$this->set('active_cards', $this->getHoldersCard(1, $id));
		$this->set('inactive_cards', $this->getHoldersCard(2, $id));
		$this->set('suspended_cards', $this->getHoldersCard(3, $id));
		$this->set('lost_cards', $this->getHoldersCard(4, $id));
		$this->set('block_cards', $this->getHoldersCard(5, $id));
		$this->set('perblock_cards', $this->getHoldersCard(6, $id));
		$this->Cardholder->Card->recursive=0;
		$this->set('card', $this->Cardholder->Card->find('first', array(
			'conditions' => array(
				'Card.cardholder_id' => $id,
				
			),
			'fields' => array(
					'Card.*', 'Cardholder.*', 'Cardtype.*', 'Product.*'
			)
		)));
		
		$cardholderstatuses = $this->Cardholder->Cardholderstatus->find('list', array('conditions' => array(
				'NOT(Cardholderstatus.id)' => array($this->request->data['Cardholder']['cardholderstatus_id'], 3) 
			)
		));
		
		$this->set(compact('cardholderstatuses'));
		
	}
	
	public function view_pending($id = null) {
		if (!$this->Cardholder->exists($id)) {
			throw new NotFoundException(__('Invalid cardholder'));
		}
		
		
		$options = array('conditions' => array('Cardholder.' . $this->Cardholder->primaryKey => $id));
		$this->set('cardholder', $this->Cardholder->find('first', $options));		
		$this->request->data = $this->Cardholder->find('first', $options);
		
		$this->set('card', $this->Cardholder->Card->find('first', array(
			'conditions' => array(
				'Card.cardholder_id' => $id,
				
			),
			'fields' => array(
						'Card.*', 'Cardholder.*', 'Cardtype.*', 'Product.*'
					)
		)));
			/*	array(
					'joins' =>  array(
						array(
							'table' => 'cards',
							'alias'	=> 'Card',
							'type'	=> 'INNER',
							'conditions' => array(
								'Card.cardholder_id = Cardholder.id'
							)
						)
					),
					'fields' => array(
						'Card.*', 'Cardholder.*'
					)
				)
			)
		);*/
			
	}
	
	
	private function getHoldersCard($status, $holder_id){
		$this->Cardholder->Card->recursive=-1;
		$cards = $this->Cardholder->Card->find(
			'all', array(
				'conditions' => array(
						'Card.cardholder_id' => $holder_id,
						'Card.cardstatus_id' => $status
				),							
				'fields' => array(
					'Card.cardno'
				)				
			)
		);
			
		return $cards;
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
	
	
	public function add($type=null) {
		
		$this->set('type', isset($type) ? $type : '');
		$this->set('cifno', $this->getTheLastCif());
		
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
					//save the card application id
					
					$cardapplication = array(
						'Cardapplication' => array(
							'refid' => $this->data['Cardholder']['refid'],
							'cardtype_id' => 2,
							'registration' => $this->data['Cardholder']['registration'],
							'processed_by' => $this->data['Cardholder']['processed_by'],
							'processed_date' => $this->data['Cardholder']['processed_date'],
							'purpose' => $this->data['Cardholder']['purpose'],
							'status' => 0
						)
					);
					
					if($this->Cardholder->Cardapplication->save($cardapplication)){
						$this->Message->msgSuccess("New Account has been successfully added");
					}else{
						$this->Message->msgSuccess("New Account has been successfully added. But was not tagged as new application");
					}
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
		
		$this->set('author', $this->Auth->user('username'));
		
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
	
	
	private function getTheAuthor(){
		return $this->Auth->user('username');
	}
	
	public function uploadaccount(){
		$this->set('author', $this->getTheAuthor());
	}
	
	
/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	/*public function delete($id = null) {
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
	}*/
	
	public function upload_holders(){
		
		if($this->request->is('ajax')){
			
			$this->layout = 'ajax';
			$this->view = false;
			$this->autoRender = false;
			$_sdata  = array();
			$_ssdata  = array();
			
			$response = array();
					
					$uid_key = date('YmdhisA') . $this->Common->generateRandomString(6);
					
					if(isset($_FILES["branchfile"])){
							$error = $_FILES["branchfile"]["error"];						
							if($error){
								//echo json_encode(array("message" => "An error has occured during the upload ".$error));
								$response = array(
											'status' => 200,
											'message' => "Unable to process your request please try again."
										);
							}else{
								if(!is_array($_FILES["branchfile"]["name"])){
									$fileName 		= $_FILES["branchfile"];											
									//$extension 		= pathinfo($fileName['name'], PATHINFO_EXTENSION);
									//$new_file_name   = 'Perso_file_'.date('Y-m-d-h-s').'_'.$this->Auth->user('username');
									
									if($this->Upload->RenameandUpload($fileName, $uid_key, "csv")){
										$file_path = APP.'webroot/Uploads/'.date('Y').'/'.date('m').'/'.$uid_key.".csv";
										
										$row = 0;
										if (file_exists($file_path)) {
											if (($handle = fopen($file_path, "r")) !== FALSE) {
												while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
														$num = count($data);
														$row++;
														if($row > 1){ // do not include the header name 
															if($this->branchCodeDoesNotExist($data[1])){
																$new_data[] = array(
																	'Branch' => array(																	
																		'name' => $data[0], //name																						
																		'branchcode' => $data[1],	//code		 																			
																		'address' => $data[2],	//address																			
																		'branch_manager' => $data[3], //branch manager
																		'email' => $data[4], //email 
																		'tel_no' => $data[5],  //tel_no
																		'contactno' => $data[6],  //contact
																		'status'	=> 'Active'
																	)
																);
															}else{
																$existing_data[] = array(
																	'Branch' => array(																	
																		'name' => $data[0], //name																						
																		'branchcode' => $data[1],	//code		 																			
																		'address' => $data[2],	//address																			
																		'branch_manager' => $data[3], //branch manager
																		'email' => $data[4], //email 
																		'tel_no' => $data[5],  //tel_no
																		'contactno' => $data[6]  //contact
																	)
																);
															}
														}
												}

												fclose($handle);
												
												
												if(!empty($new_data)){
													if($this->Branch->saveAll($new_data)){
														$response = array(
															'status' 	=> 200,
															'message' 	=> "File has been uploaded and all data has been saved."														
																					
														);
													}else{
														$response = array(
															'status' 	=> 200,
															'message' 	=> "File has been uploaded but unable to save the data"														
																					
														);
													}
												}else{
													$response = array(
														'status' 	=> 200,
														'message' 	=> "File has been uploaded but no data found on the file."
													);	
												}
												
												
											
											}else{
												$response = array(
													'status' 	=> 200,
													'message' 	=> "Unable to extract the file."
												);
											}

										}else{
											$response = array(
												'status' => 200,
												'message' => "Uploaded file does not exists, please try again."
											);
										}
									
									}else{
										$response = array(
												'status' => 200,
												'message' => "Unable to upload the file, please try again."
										);
									}
								}else{
									$response = array(
										'status' => 200,
										'message' => "Invalid file, please try again."
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
		}else{	
			$this->view = 'upload';
		}
	}
	
}
