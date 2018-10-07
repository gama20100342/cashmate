<?php
App::uses('AppController', 'Controller');
/**
 * Useravatars Controller
 *
 * @property Useravatar $Useravatar
 * @property PaginatorComponent $Paginator
 */
class UseravatarsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Upload');

/**
 * index method
 *
 * @return void
 */
	/*public function index() {
		$this->Useravatar->recursive = 0;
		$this->set('useravatars', $this->Paginator->paginate());
	}*/

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	/*public function view($id = null) {
		if (!$this->Useravatar->exists($id)) {
			throw new NotFoundException(__('Invalid useravatar'));
		}
		$options = array('conditions' => array('Useravatar.' . $this->Useravatar->primaryKey => $id));
		$this->set('useravatar', $this->Useravatar->find('first', $options));
	}*/

/**
 * add method
 *
 * @return void
 */
 
	
	public function add($refid=null, $firstname=null, $lastname=null) {
			
			$user =$this->checkUserExists($refid, $firstname, $lastname);
			
			if ($this->request->is('ajax')) {
				$this->layout = 'ajax';
				$this->autoRender = false;
	
			//	$user_has_pic  = $this->Useravatar->findByRefid($refid);
				/*$this->Useravatar->create();
				if ($this->Useravatar->save($this->request->data)) {
					$this->Message->msgCommonSuccess();
					return $this->redirect(array('contrller' => 'users','action' => 'add'));
				} else {
					$this->Message->msgCommonError();
				}*/

				
				/*if(!$user){
					echo json_encode(array("message" => "Avatar successfully uploaded"));
				}else{*/
					
					if(isset($_FILES["userpic"])){
							$error = $_FILES["userpic"]["error"];						
							if($error){
								echo json_encode(array("message" => "An error has occured during the upload ".$error));
							}else{
								if(!is_array($_FILES["userpic"]["name"])){
									$fileName 		= $_FILES["userpic"];	
									$extension 		= pathinfo($fileName['name'], PATHINFO_EXTENSION);
									$new_file_name   = strtoupper($refid . date('hs'));
								
									
									if($this->Upload->RenameandUpload($fileName, $new_file_name, $extension)){
										//if(!$user_has_pic){
											$this->Useravatar->create();
											if($this->Useravatar->save(
												array('Useravatar' => array(
																		'user_id'				=> $this->request->data['user_id'],
																		'refid'					=> $this->request->data['refid'],
																		'image_file'			=> 'Uploads/'.date('Y').'/'.date('m').'/'.$new_file_name.'.'.$extension,																
												)
											))){
												echo json_encode(array("message" => "Avatar successfully uploaded, you must re-login to take effect."));	
											}else{
												echo json_encode(array("message" => "Unable to upload avatar, please try again."));	
											}
										
										/*}else{
											
												$this->Useravatar->id = $user_has_pic['Useravatar']['id'];
												if($this->Useravatar->saveField('image_file', 'Uploads/'.date('Y').'/'.date('m').'/'.$new_file_name.'.'.$extension)){
													echo json_encode(array("status" => 200, "message" => "Avatar successfully updated"));	
												}else{
													echo json_encode(array("message" => "Unable to update avatar, please try again."));	
												}
											
										}*/
									}else{
										echo json_encode(array("message" => "Unable to update avatar directory is not writeable, please try again."));		
									}
								}	
							}
					//}
				}
			}else{
				
				if(!$user){		
					$this->Message->msgError("No resource user is found for uploading avatar");
					$this->render('nodata');	
				}else{
					$this->set('user_id', $user['User']['id']);
					$this->set('refid', $refid);
					$this->set('firstname', $firstname);
					$this->set('lastname', $lastname);
				}

			}
		

		//$users = $this->Useravatar->User->find('list');
		//$this->set(compact('users'));
	}
	
	
	public function edit_my_avatar($refid=null, $firstname=null, $lastname=null) {
			
			if($this->Auth->user('refid') !== $refid){
				return $this->redirect(array('contrller' => 'users','action' => 'viewmyprofile'));
			}
			
			
			$user =$this->checkUserExists($refid, $firstname, $lastname);
			
			if ($this->request->is('ajax')) {
				$this->layout = 'ajax';
				$this->autoRender = false;
	
			//	$user_has_pic  = $this->Useravatar->findByRefid($refid);
				/*$this->Useravatar->create();
				if ($this->Useravatar->save($this->request->data)) {
					$this->Message->msgCommonSuccess();
					return $this->redirect(array('contrller' => 'users','action' => 'add'));
				} else {
					$this->Message->msgCommonError();
				}*/

				
				/*if(!$user){
					echo json_encode(array("message" => "Avatar successfully uploaded"));
				}else{*/
					
					if(isset($_FILES["userpic"])){
							$error = $_FILES["userpic"]["error"];						
							if($error){
								echo json_encode(array("message" => "An error has occured during the upload ".$error));
							}else{
								if(!is_array($_FILES["userpic"]["name"])){
									$fileName 		= $_FILES["userpic"];	
									$extension 		= pathinfo($fileName['name'], PATHINFO_EXTENSION);
									$new_file_name   = strtoupper($refid . date('hs'));
								
									
									if($this->Upload->RenameandUpload($fileName, $new_file_name, $extension)){
										//if(!$user_has_pic){
											$this->Useravatar->create();
											if($this->Useravatar->save(
												array('Useravatar' => array(
																		'user_id'				=> $this->request->data['user_id'],
																		'refid'					=> $this->request->data['refid'],
																		'image_file'			=> 'Uploads/'.date('Y').'/'.date('m').'/'.$new_file_name.'.'.$extension,																
												)
											))){
												echo json_encode(array("message" => "Avatar successfully uploaded, you must re-login to take effect."));	
											}else{
												echo json_encode(array("message" => "Unable to upload avatar, please try again."));	
											}
										
										/*}else{
											
												$this->Useravatar->id = $user_has_pic['Useravatar']['id'];
												if($this->Useravatar->saveField('image_file', 'Uploads/'.date('Y').'/'.date('m').'/'.$new_file_name.'.'.$extension)){
													echo json_encode(array("status" => 200, "message" => "Avatar successfully updated"));	
												}else{
													echo json_encode(array("message" => "Unable to update avatar, please try again."));	
												}
											
										}*/
									}else{
										echo json_encode(array("message" => "Unable to update avatar directory is not writeable, please try again."));		
									}
								}	
							}
					//}
				}
			}else{
				
				if(!$user){		
					$this->Message->msgError("No resource user is found for uploading avatar");
					$this->render('nodata');	
				}else{
					$this->set('user_id', $user['User']['id']);
					$this->set('refid', $refid);
					$this->set('firstname', $firstname);
					$this->set('lastname', $lastname);
				}

			}
		

		//$users = $this->Useravatar->User->find('list');
		//$this->set(compact('users'));
	}
	

	public function checkUserExists($refid, $firstname, $lastname){
		$user = $this->Useravatar->User->find('first', array('conditions' => array('User.refid' => $refid, 'User.firstname' => $firstname, 'User.lastname' => $lastname)));
		if(!empty($user)){
			return $user;
		}else{
			return false;
		}
		
	}

	public function edit_avatar($refid=null, $userid=null) {
			
			if ($this->request->is('ajax')) {
				$this->layout('ajax');
				$this->autoRender = false;
				$avatar = $this->request->data;
				echo json_encode(array("message" => "This is the example mesasge", "data" => $avatar));				
			}else{
				$options = array(
					'conditions' => array(
						'Useravatar.user_id' => $userid,
						'Useravatar.refid' => $refid
					)
				);
			
				$this->set('useravatar', $this->Useravatar->find('first', $options));
			}
	}
	
	public function getAvatar(){
		
		$this->Useravatar->recursive=-1;
		$image = $this->Useravatar->find('first', array(
				'conditions' => array(
					'Useravatar.user_id' => $this->Auth->user('id'),
					'Useravatar.refid' => $this->Auth->user('refid')
				),
				'fields' => array(
					'Useravatar.image_file'				
				),
				'order' => array(
					'Useravatar.id' => 'DESC'
				),
			)
		);
		
		return  $image['Useravatar']['image_file'];
		
		
	}


/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	/*public function edit($id = null) {
		if (!$this->Useravatar->exists($id)) {
			throw new NotFoundException(__('Invalid useravatar'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Useravatar->save($this->request->data)) {
				$this->Session->setFlash(__('The useravatar has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The useravatar could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Useravatar.' . $this->Useravatar->primaryKey => $id));
			$this->request->data = $this->Useravatar->find('first', $options);
		}
		$users = $this->Useravatar->User->find('list');
		$this->set(compact('users'));
	}*/

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	/*public function delete($id = null) {
		$this->Useravatar->id = $id;
		if (!$this->Useravatar->exists()) {
			throw new NotFoundException(__('Invalid useravatar'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Useravatar->delete()) {
			$this->Session->setFlash(__('The useravatar has been deleted.'));
		} else {
			$this->Session->setFlash(__('The useravatar could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}*/
}
