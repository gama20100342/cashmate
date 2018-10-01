<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {
	
	public $components = array('Paginator', 'Common');
	
	function beforeFilter(){	
		parent::beforeFilter();
		//$this->set('breadcrumbs', $this->Common->setBreadcrumb(isset($this->params['url']['url']) ? $this->params['url']['url'] : ''));
		//$this->Auth->allow('api_login_45HYshAkl_oriITkasli231mnaso_1jkk_p3993', 'logout_api_connect');
    }
	
	/*
	public function logout_api_connect(){
		$this->layout = 'ajax';
		$this->autoRender = false;
		$this->view = false;
		
		if($this->request->is('put')){
			if($this->Auth->logout()){
					$response = array(
						"code" => 200,
						"message"  =>"Account successfully logout"
					);
			}else{
				$response = array(
						"code" => 400,
						"message"  =>"Invalid request"
					);
			}
					
		}else{
			$response = array(
						"code" => 400,
						"message"  =>"Invalid request Initiate"
					);
		}
		echo json_encode($response);
		
	}*/
	
	
	
	/*
	
	public function api_login_45HYshAkl_oriITkasli231mnaso_1jkk_p3993(){
	
		$this->layout = 'ajax';		
		$this->view = 'api_login';
		
		if($this->request->is('post')){				
				
				if(isset($this->request->data['username']) && !empty($this->request->data['username']) && isset($this->request->data['password']) && !empty($this->request->data['password'])){
					$this->request->data['User']['username']= $this->request->data['username'];
					$this->request->data['User']['password']= $this->request->data['password'];
			
					if ($this->Auth->login()) {					
						$response = array(
							"success" => true,
							"code" => 200, 
							"message"  => "Login Successfull",
							"user_details" => array(
								"userid" => $this->Auth->user('id'),
								"username" => $this->Auth->user('username'),
								"firstname" => $this->Auth->user('firstname'),
								"lastname" => $this->Auth->user('lastname'),
								"refid" => $this->Auth->user('refid'),
								"terminal_id" => $this->Auth->user('terminal_id')
							)
						);
						
						$this->Auth->logout();
					} else {
						
						$response = array(
							"success" => false,
							"code" => 400, 
							"message"  => "Login failed, invalid credentials. Please try again."
						);

					}
				}else{
					$response = array(
						"success" => false,
						"code" => 500, 
						"message"  => "Request data is empty"
					);
				}
				
		}else{
				$response = array(
						"success" => false,
						"code" => 500, 
						"message"  => "Invalid request."
					);
		}
		
		$this->set('response', $response);
	}*/
	
/**
 * Components
 *
 * @var array
 */
	

	/*-------LOGIN RELATED FOR UPDATES-----*/

	public function isAuthorized($user) {
		if ($this->action === 'add') {
			return true;
		}
	
		/*
		if (in_array($this->action, array('edit', 'delete'))) {
			$postId = (int) $this->request->params['pass'][0];
			if ($this->Post->isOwnedBy($postId, $user['id'])) {
				return true;
			}
		}*/
	
		return parent::isAuthorized($user);
	}

	public function loggeduser($id=null){
		$id = $this->Auth->user('id');
		$user = $this->User->findById($id);			
		if(isset($this->params['requested'])){
			return $user;
		}
	}
		
	public function login() {
		$this->layout = ('login');
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				if(!$this->accountIsBlocked()){
					if($this->passwordHasExpired()){
						$this->Message->msgError("Your pasword has expired, you must change it right now");
						return $this->redirect(array('action' => 'changemypassword', $this->Auth->user('refid'), $this->Auth->user('id')));
					}else{	
						return $this->redirect(array('controller' => 'cards', 'action' => 'dashboard'));
					}
				}else{
					$this->Session->setFlash('Login failed. Your account has been blocked, please contact the system Administrator.', 'error_login');
					return $this->redirect($this->Auth->logout());
				}
			} else {
 				$this->Session->setFlash('Login failed. Invalid credentials.', 'error_login');
			}
		}
	}
	
	
	private function accountIsBlocked(){
		if($this->Auth->user('status_id') > 1){
			return true;
		}else{
			return false;
		}
	}
	
	private function passwordHasExpired(){
		if($this->Auth->user('pass_expire') <= date('Y-m-d')){
			return true;
		}else{
			return false;
		}
	}
	
	
	private function validateUser($refid, $id){
			if($refid == $this->Auth->user('refid') && $id == $this->Auth->user('id')){
				return true;
			}else{
				return false;
			}
	}
	
	public function changepassword(){
		$this->view  = 'changemypassword';
	}
	
	public function changemypassword($refid=null, $userid=null){
		
		if(!empty($refid) && !empty($userid)){
			$this->view  = 'changepassword';
		}else{
		
		$this->autoRender 	= false;
		$this->layout 		= 'ajax';
		$this->view 		= false;
			
		$this->User->recursive = -1;
		$user = $this->User->findById($this->Auth->user('id'));
			
		if($this->request->is('ajax')){	
							
			$_f_old_pass = $this->data['User']['old_password'];
			$_f_new_pass = $this->data['User']['new_password'];
			$_f_con_pass = $this->data['User']['con_password'];
			$pass_expire = $this->data['User']['pass_expire'];
			
			if(!empty($_f_old_pass) && !empty($_f_new_pass) && !empty($_f_con_pass)){
				if($_f_new_pass == $_f_con_pass){
					
					$old_pass_hash = Security::hash($_f_old_pass, 'blowfish', $user['User']['password']);
					$new_pass_hash = Security::hash($_f_new_pass, 'blowfish', $user['User']['password']);
					
					
					
					if($old_pass_hash == $user['User']['password']){								
						if($new_pass_hash == $user['User']['password']){
							$msg = array(
								'status' => 401,
								'message' => $this->Message->showMsg("password_in_used")
							);											
						}else{
							$pass_his_data = array(
								'Passwordhistory' => array(
									'user_id' 		=> $this->Auth->user('id'),
									'refpass' 		=> $user['User']['password'],
									'change_date' 	=> date('Y-m-d'),
									'expiry_date' 	=> $user['User']['pass_expire']
								)
							);
							
							$this->User->id = $this->Auth->user('id');
							$this->User->Passwordhistory->create();
							if($this->User->Passwordhistory->save($pass_his_data) && $this->User->saveField('password', $_f_new_pass) && $this->User->saveField('pass_expire', $this->Common->getTheDateAfter("+30 days", date('Y-m-d')))){													
								$this->User->saveField('pass_expire', $pass_expire);
								
								$msg = array(
									'status' => 200,
									'message' => $this->Message->showMsg("password_changed")
								);								
							}else{
								$msg = array(
									'status' => 401,
									'message' => $this->Message->showMsg("cannot_change_password")
								);	
							}

						}
						
							
								
					}else{
							$msg = array(
								'status' => 401,
								'message' => $this->Message->showMsg("password_dont_exist")
							);
					}
				}else{
							$msg = array(
								'status' => 401,
								'message' => $this->Message->showMsg("password_not_match")
							);
				}
				
			}else{
				$msg = array(
					'status' => 401,
					'message' => $this->Message->showMsg("password_not_match")
				);	
			}
			echo json_encode($msg);
		}
		}
	}
	
	public function idle_warning(){
		$this->layout = 'ajax';
		$this->autoRender = false;		
		if($this->request->is('ajax')){
			if($this->Auth->logout()){
				$this->Session->destroy();
				return json_encode(array("message" => "logout"));
			}else{
				return json_encode(array("message" => "failed"));
			}
			
		}
	}
		
	public function logout(){
		return $this->redirect($this->Auth->logout());
	}


	public function dashboard(){
		
	}

	/*----END OF LOGIN--*/
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->User->recursive = 0;
			$options  = array(
					'conditions' => array(				
						'User.group_id >' => 1
					),
					'order' => array(				
						'User.lastname' => 'DESC'
					),
					'fields' => array(
						'User.id',
						'User.firstname',
						'User.middlename',
						'User.lastname',
						'User.username',
						'User.name',
						'Group.name',
						'User.last_login',
						'Terminal.name',
						'Status.name'						
					)					
				);
								
				$this->set('users', $this->User->find('all', $options));
		
		$this->set('controller', $this->webroot.'users');
		$this->set('action', 'getUsers');

	}
	
	
	public function getUsers($status=null) {		
		$this->User->recursive = 0;	
		$status 		= isset($status) && !empty($status) ? $status : 1;
		$this->layout = 'ajax';
		$this->autoRender = false;
		$this->view = false;
		
		if($this->request->is('ajax')){
			if(isset($status) && !empty($status)){
				
				$options  = array(
					'conditions' => array(		
						'User.group_id >' 	=> 1,
						'User.status_id' 	=> $status
					),
					'order' => array(				
						'User.lastname' 	=> 'DESC'
					),
					'fields' => array(
						'User.id',
						'User.firstname',
						'User.middlename',
						'User.lastname',
						'User.username',
						'User.name',
						'Group.name',
						'User.last_login',
						'Terminal.name',
						'Status.name'						
					)					
				);
								
				$users =  $this->User->find('all', $options);
				
				if($users){
						$data = array();					
						if(count($users) > 0){
							$data = array();
							foreach($users as $t):
								$data[] = array(
									$t['User']['name'].'<div class="fs-8 text-success">'.$t['Group']['name'].'</div>',	
									$t['User']['username'],	
									$t['Group']['name'],																
									!empty($t['User']['last_login']) ? date('Y M d h:i A', strtotime($t['User']['last_login'])) : '-',	
									$t['Status']['name'],
									$t['Terminal']['name'],	
									'<a href="#" 
										url="'.$this->webroot.'users/view/'.$t['User']['id'].'" 
										title="View Card Holder" 
										data-td-id = "td_'.$t['User']['id'].'"
										data-_murl = "'.$this->webroot.'users/view/'.$t['User']['id'].'"
										data-_type = "holder"
										data-toggle="modal"
										data-target="#view_card_detail_"										
										class="fs-10 user-link-modal nooutline td_'.$t['User']['id'].'"><i class="fas fa-eye fa-lg"></i></a>									
									<a href="'.$this->webroot.'users/edit/'.$t['User']['id'].'" title="Make Changes" class="fs-10">
										<i class="fas fa-edit fa-lg"></i>
									</a>'
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
	public function view($id = null) {
		
		$this->User->recursive = -2;
		
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$user = $this->User->find('first', $options);
		$this->set('user', $user);
		
		$this->set('groupaccesses', $this->User->Group->Groupaccess->find(
				'all', array(
					'conditions' => array(
						'Groupaccess.group_id' => $user['User']['group_id']
					)
				)
			)
		);
	}
	
	
	public function viewmyprofile() {
		
		$id = $this->Auth->user('id');		
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$user = $this->User->find('first', $options);
		$this->set('user', $user);
		
		$this->set('groupaccesses', $this->User->Group->Groupaccess->find(
				'all', array(
					'conditions' => array(
						'Groupaccess.group_id' => $user['User']['group_id']
					)
				)
			)
		);
	}
	
	
	
	
	public function updateStatus($status=null, $holder_ref=null, $holder_id=null){
		$this->layout = 'ajax';
		$this->autoRender = false;
		$this->view = false;
		
		if($this->request->is('ajax')){
			if(!$this->User->Status->exists($status) && !$this->User->exists($id)){
				throw new NotFoundException(__('Invalid Card Holder'));
			}

				$this->User->recursive = 0;
				$holder = $this->User->find('first', array(
						'conditions' => array(
							'User.id' 		=> $holder_id,
							'User.refid' 	=> $holder_ref
						),
						'fields' => array(
							'User.id',
						)
					)
				);
				
				$author = $this->Auth->user('firstname').' '.$this->Auth->user('lastname');
				
				if(!empty($holder)){
					$this->User->id = $holder['User']['id'];
					if($this->User->saveField('status_id', $status)){					
							
							$this->User->saveField('modified', date('Y-m-d h:i:s'));
							$this->User->saveField('modified_by', $author);
							
							$response = array(
								"status" 		=> 200,
								"message" 		=> "User status has been successfully updated",
								"card_status"	=> $status
							);
					}else{
						
						$response = $this->Message->respMsg(400);
					}
				}else{
					
					$response = $this->Message->respMsg(400);
				}
				
			return json_encode($response);
				
		}
	
	}
	
	private function getAuthor(){
		return $this->Auth->user('firstname').' '.$this->Auth->user('lastname');
	}
/**
 * add method
 *
 * @return void
 */
	public function add() {

		$this->set('refid', $this->Common->generateRandomString(12));
		$this->set('pass', $this->Common->generate_temp_pass());
		$this->set('author', $this->getAuthor());
		
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				//$this->Session->setFlash(__('The user has been saved.'));
				$this->Message->msgSuccess("New access has been successfully registered, please upload the user picture.");
				return $this->redirect(array('controller' => 'useravatars', 'action' => 'add', $this->data['User']['refid'], $this->data['User']['firstname'], $this->data['User']['lastname']));
			} else {
				//$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
				$this->Message->msgCommonError();
			}
		}

		$groups = $this->User->Group->find('list', array('conditions' => array('Group.id >' => 1)));
		$terminals = $this->User->Terminal->find('list');
		$this->set(compact('groups', 'terminals'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		
		$this->set('author', $this->getAuthor());
			
		if ($this->request->is(array('post', 'put'))) {
			if ($this->User->save($this->request->data)) {
				//$this->Session->setFlash(__('The user has been saved.'));
				$this->Message->msgCommonUpdate();
				return $this->redirect(array('action' => 'edit', $id));
			} else {
				//$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
				$this->Message->msgCommonError();
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
		$groups = $this->User->Group->find('list');
		$terminals = $this->User->Terminal->find('list');
		$this->set(compact('groups', 'terminals'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */

 /*
	public function delete($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->User->delete()) {
			$this->Session->setFlash(__('The user has been deleted.'));
		} else {
			$this->Session->setFlash(__('The user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}*/
}
