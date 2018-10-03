<?php
App::uses('AppController', 'Controller');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');
App::uses('Folder', 'Utility');
App::uses('File', 'Utility');

/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {
	
	public $components = array('Paginator', 'Upload');
	
	
	public function insertAccessLogs(){		
		$dir 		= new Folder($this->Upload->logDir($this->Auth->user('username'), 'access'));
		$file 		= new File($dir . DS . $this->Auth->user('username').'.csv');
		if(!file_exists($file)){
			
		}
		$contents 	= $file->read();
		// $file->write('I am overwriting the contents of this file');
		// $file->append('I am adding to the bottom osf this file.');
		// $file->delete(); // I am deleting this file
		$file->close(); // Be sure to close the file when you're done
	}
	
	function beforeFilter(){	
		parent::beforeFilter();
		//insertAccessLogs();
		
		//$this->set('breadcrumbs', $this->Common->setBreadcrumb(isset($this->params['url']['url']) ? $this->params['url']['url'] : ''));
		//$this->Auth->allow('api_login_45HYshAkl_oriITkasli231mnaso_1jkk_p3993', 'logout_api_connect');
    }
	
	
	
	
	/*
	private function reduceLoginAttempts(){
		$this->User->id = $this->Auth->user('id');
		$user = $this->User->find('first', array('conditions' 
		$this->User->saveField(login_attempts
	}
	
	private function resetLoginAttempts(){
			
	}*/
	
	
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
		
	private function lockAccount(){
		$this->User->Userlockaccount->recursive=-1;
		$this->User->id = $this->Auth->user('id');		
		if($this->User->Userlockaccounts->save($data) && $this->User->saveField('lock_account', 1)){
			
		}else{
				
		}
	}
	
		
	private function InitiateLockAttempts($username){
		$this->User->recursive =-1;		
		$user = $this->User->findByUsername($username);
		if(!empty($user)){
			$this->User->id = $user['User']['id'];			
			$attempts = $user['User']['attempts'];	
			if($attempts >= 3){	
				if($this->User->saveField('status_id', 4)){
					if($this->saveAttempts($user['User']['username'], $user['User']['id'], "failed")){
						return "Login failed. You have used all the attempts, your account has been locked, please contact the system administrator";
					}else{
						return "Login failed. You have used all the attempts.";
					}
				}else{
					return "Login failed, you have used all the attempts.";
				}
			}else{
				if($this->User->saveField('attempts', ($attempts + 1))){
					if($this->saveAttempts($user['User']['username'], $user['User']['id'], "failed")){
						return "Login failed. Please try again. You have used " .($attempts + 1)." out of 3 Attempts";
					}else{
						return "Login failed. Please try again.";
					}
				}else{
					return "Login failed, please try again.";
				}
			}
		}else{
			return "login failed, invalid credentials";
		}
	}
	
	private function saveAttempts($username, $id, $status){		
				$data = array(
					'Userattempt' => array(
						'user_id' 		=> $id,
						'username' 		=> $username,
						'date_time' 	=> date('Y-m-d H:i:s'),
						'ip_address' 	=> $this->getTheIPAddress(),
						'status' 		=> $status
					)
				);
				$this->User->Userattempt->create();
				if($this->User->Userattempt->save($data)){
					return true;
				}else{
					return false;
				}					
	}
	
	private function getTheIPAddress(){
			// check for shared internet/ISP IP
			if (!empty($_SERVER['HTTP_CLIENT_IP']) && validate_ip($_SERVER['HTTP_CLIENT_IP'])) {
				return $_SERVER['HTTP_CLIENT_IP'];
			}

			// check for IPs passing through proxies
			if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
				// check if multiple ips exist in var
				if (strpos($_SERVER['HTTP_X_FORWARDED_FOR'], ',') !== false) {
					$iplist = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
					foreach ($iplist as $ip) {
						if (validate_ip($ip))
							return $ip;
					}
				} else {
					if (validate_ip($_SERVER['HTTP_X_FORWARDED_FOR']))
						return $_SERVER['HTTP_X_FORWARDED_FOR'];
				}
			}
			if (!empty($_SERVER['HTTP_X_FORWARDED']) && validate_ip($_SERVER['HTTP_X_FORWARDED']))
				return $_SERVER['HTTP_X_FORWARDED'];
			if (!empty($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']) && validate_ip($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']))
				return $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'];
			if (!empty($_SERVER['HTTP_FORWARDED_FOR']) && validate_ip($_SERVER['HTTP_FORWARDED_FOR']))
				return $_SERVER['HTTP_FORWARDED_FOR'];
			if (!empty($_SERVER['HTTP_FORWARDED']) && validate_ip($_SERVER['HTTP_FORWARDED']))
				return $_SERVER['HTTP_FORWARDED'];

			// return unreliable ip since all else failed
			return $_SERVER['REMOTE_ADDR'];
	}
	
	private function validate_ip($ip) {
		if (strtolower($ip) === 'unknown')
			return false;

		// generate ipv4 network address
		$ip = ip2long($ip);

		// if the ip is set and not equivalent to 255.255.255.255
		if ($ip !== false && $ip !== -1) {
			// make sure to get unsigned long representation of ip
			// due to discrepancies between 32 and 64 bit OSes and
			// signed numbers (ints default to signed in PHP)
			$ip = sprintf('%u', $ip);
			// do private network range checking
			if ($ip >= 0 && $ip <= 50331647) return false;
			if ($ip >= 167772160 && $ip <= 184549375) return false;
			if ($ip >= 2130706432 && $ip <= 2147483647) return false;
			if ($ip >= 2851995648 && $ip <= 2852061183) return false;
			if ($ip >= 2886729728 && $ip <= 2887778303) return false;
			if ($ip >= 3221225984 && $ip <= 3221226239) return false;
			if ($ip >= 3232235520 && $ip <= 3232301055) return false;
			if ($ip >= 4294967040) return false;
		}
		return true;
	}

	private function resetTheUserAttempts(){
		$this->User->id = $this->Auth->user('id');
		if($this->User->saveField('attempts', 0)){
			return true;
		}else{
			return false;
		}
	}
	
	public function login() {
		$this->layout = ('login');
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				if(!$this->accountIsBlocked()){
					//check if the account has no more attempts
					//reset the attempts
					if($this->resetTheUserAttempts() && $this->saveAttempts($this->Auth->user('username'), $this->Auth->user('id'), "success")){
						if($this->passwordHasExpired()){
							$this->Message->msgError("Your pasword has expired, you must change it right now");
							return $this->redirect(array('action' => 'changemypassword', $this->Auth->user('refid'), $this->Auth->user('id')));
						}else{	
							return $this->redirect(array('controller' => 'cards', 'action' => 'dashboard'));
						}
					}else{
						$this->Message->msgError("Your pasword has expired, you must change it right now");
							return $this->redirect(array('action' => 'changemypassword', $this->Auth->user('refid'), $this->Auth->user('id')));
					}
				}else{
					$this->Session->setFlash('You have used all your login attempts, please contact the system Administrator.', 'error_login');
					return $this->redirect($this->Auth->logout());
				}
			} else {
				
				//check the username then initiate account locks is successive 
				//login failed
				
 				$this->Session->setFlash($this->InitiateLockAttempts($this->data['User']['username']), 'error_login');
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
	
	public function resetPassword($username){
		$this->layout = 'ajax';
		//$this->view = false;
		$this->autoRender = false;
		
		if($this->request->is('ajax')){	
			$user = $this->User->findByUsername($username);
		
			//$passHash = new BlowfishPasswordHasher();
			
			if(!empty($user)){
				//$new_pass_hash = $passHash->hash("000999");
				
				$this->User->id = $user['User']['id'];
				
						if($this->User->saveField('password', '000999') && $this->User->saveField('pass_expire', date('Y-m-d'))){													
									
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
			}else{
				$msg = array(
										'status' => 401,
										'message' => $this->Message->showMsg("cannot_change_password")
									);	
			}				
			return json_encode($msg);			
		}
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
			$username	 = $this->Auth->user('username');
			
			if(!empty($_f_old_pass) && !empty($_f_new_pass) && !empty($_f_con_pass)){
				if($_f_new_pass == $_f_con_pass){
					
					$old_pass_hash = Security::hash($_f_old_pass, 'blowfish', $user['User']['password']);
					$new_pass_hash = Security::hash($_f_new_pass, 'blowfish', $user['User']['password']);

					$pass_message = $this->strong_password_check($username, $_f_new_pass);
					//$user_message = $this->strong_username_check($username, $_f_new_pass);
			
					
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
							
							//if(empty($user_message)){
								if(empty($pass_message)){
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
								}else{
										$msg = array(
											'status' => 200,
											'message' => $pass_message
										);		
										
									
								}
							//}else{
								
								//$msg = array(
										//	'status' => 200,
											//'message' => $this->Message->msgError($user_message);
									//	);		
										
								
							//}
					
							
							

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
		
		$this->User->recursive =0;
		
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
	private function strong_username_check($username, $password) {	
		
		$pmpro_setMessage = '';
		// Check for length (8 characters)
		if ( strlen( $username ) < 6 ) {
			$pmpro_setMessage = 'Your username must be at least 6 characters long.';
		}
		// Check for username match
		if ( $password == $username ) {
			$pmpro_setMessage = 'Your username must not match your password.';
		}
		// Check for containing username
		if ( strpos( $password, $username ) !== false ) {
			$pmpro_setMessage = 'Your username must not contain your password.';
		}
		// Check for lowercase
		if ( preg_match( '/[a-z]/', $username ) ) {
			$pmpro_setMessage = 'Your username must not contain lowercase letter.';
		}
		// Check for uppercase
		if ( ! preg_match( '/[A-Z]/', $username ) ) {
			$pmpro_setMessage = 'Your username must all contain uppercase letter.';
		}
		// Check for numbers
		if ( ! preg_match( '/[0-9]/', $username ) ) {
			$pmpro_setMessage = 'Your username must contain at least 1 number.';

		}
		
		// Check for special characters
		/*if (preg_match( '/[\W]/', $username ) ) {
			$pmpro_setMessage = 'Username should not contain special character.';
		}*/
		
		return $pmpro_setMessage;
	}
	
	private function strong_password_check( $username, $password) {	
		
		$pmpro_setMessage = '';
		// Check for length (8 characters)
		if ( strlen( $password ) < 8 ) {
			$pmpro_setMessage = 'Your password must be at least 8 characters long.';
		}
		// Check for username match
		if ( $password == $username ) {
			$pmpro_setMessage = 'Your password must not match your username.';
		}
		// Check for containing username
		if ( strpos( $password, $username ) !== false ) {
			$pmpro_setMessage = 'Your password must not contain your username.';
		}
		// Check for lowercase
		if ( ! preg_match( '/[a-z]/', $password ) ) {
			$pmpro_setMessage = 'Your password must contain at least 1 lowercase letter.';
		}
		// Check for uppercase
		if ( ! preg_match( '/[A-Z]/', $password ) ) {
			$pmpro_setMessage = 'Your password must contain at least 1 uppercase letter.';
		}
		// Check for numbers
		if ( ! preg_match( '/[0-9]/', $password ) ) {
			$pmpro_setMessage = 'Your password must contain at least 1 number.';

		}
		// Check for special characters
		if ( ! preg_match( '/[\W]/', $password ) ) {
			$pmpro_setMessage = 'Your password must contain at least 1 special character.';
		}
		
		return $pmpro_setMessage;
	}

	public function add() {

		$this->set('refid', $this->Common->generateRandomString(12));
		$this->set('pass', $this->Common->generate_temp_pass());
		$this->set('author', $this->getAuthor());
		
		if ($this->request->is('post')) {
			$pass_message = $this->strong_password_check($this->data['User']['username'], $this->data['User']['password']);
			$user_message = $this->strong_username_check($this->data['User']['username'], $this->data['User']['password']);
			
			if(empty($user_message)){
				if(empty($pass_message)){
					$this->User->create();
					if ($this->User->save($this->request->data)) {
						//$this->Session->setFlash(__('The user has been saved.'));
						$this->Message->msgSuccess("New access has been successfully registered, please upload the user picture.");
						return $this->redirect(array('controller' => 'useravatars', 'action' => 'add', $this->data['User']['refid'], $this->data['User']['firstname'], $this->data['User']['lastname']));
					} else {
						//$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
						$this->Message->msgCommonError();
					}
				}else{
					$this->Message->msgError($pass_message);
				}
			}else{
				$this->Message->msgError($user_message);
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
			//$pass_message = $this->strong_password_check($this->data['User']['username'], "");
			$user_message = $this->strong_username_check($this->data['User']['username'], "");
			
			if(empty($user_message)){
				
					if ($this->User->save($this->request->data)) {
						//$this->Session->setFlash(__('The user has been saved.'));
						$this->Message->msgCommonUpdate();
						return $this->redirect(array('action' => 'edit', $id));
					} else {
						//$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
						$this->Message->msgCommonError();
					}
				
			}else{
				$this->Message->msgError($user_message);
			}
			
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
		$groups = $this->User->Group->find('list');
		$terminals = $this->User->Terminal->find('list');
		$this->set(compact('groups', 'terminals'));
	}
	
	public function reset_password($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		
		$this->User->recursive=-1;
		$user = $this->User->findById($id);
		
		$this->set('author', $this->getAuthor());
		
			
		if ($this->request->is(array('post', 'put'))) {
			
			if($this->data['User']['use_default']=="1"){
				$pass_message = "";
			}else{
				$pass_message = $this->strong_password_check($user['User']['username'], $this->data['User']['new_password']);
			}
			
			//$user_message = $this->strong_username_check($this->request->data['User']['username'], $this->data['User']['password']);
			
			//if(empty($user_message)){
				if(empty($pass_message)){
					$this->User->id = $id;
					if ($this->User->saveField('password',$this->data['User']['new_password'])) {
						//$this->Session->setFlash(__('The user has been saved.'));
						$this->Message->msgCommonUpdate();
						//$this->Message->msgError($this->data['User']['password']);
						return $this->redirect(array('action' => 'reset_password', $id));
					} else {
						//$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
						$this->Message->msgCommonError();
					}
				}else{
					$this->Message->msgError($pass_message);
					$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
					$this->request->data = $this->User->find('first', $options);
				}
			//}else{
				//$this->Message->msgError($user_message);
				//$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
				//$this->request->data = $this->User->find('first', $options);
			//}
			
		}else{
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
