<?php
App::uses('AppController', 'Controller');
/**
 * Branches Controller
 *
 * @property Branch $Branch
 * @property PaginatorComponent $Paginator
 */
class BranchesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Upload');
	
	function beforeFilter(){	
		parent::beforeFilter();	
        $this->set('breadcrumbs', $this->Common->setBreadcrumb(isset($this->params['url']['url']) ? $this->params['url']['url'] : 'Home'));
		if($this->params['action']=="home"){
			return $this->redirect(array('action' => 'index'));
		}
    }

/**
 * index method
 *
 * @return void
 */
	
	private function branchCodeDoesNotExist($branchcode){
		$branch = $this->Branch->findByBranchcode($branchcode);
		if(!empty($branch)){
			return false;
		}else{
			return true;
		}
	}
	
	
	public function upload_branches(){
		
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
															/*if($this->branchCodeDoesNotExist($data[1])){
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
														}*/
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
	
	public function index() {
		$this->Branch->recursive = 0;
		$this->set('branches', $this->Paginator->paginate());
	}
	
	public function indexAjax($status=null){
		
		$this->Branch->recursive = 0;	
		$status 			= isset($status) && !empty($status) ? $status : 'Active';
		$this->layout 		= 'ajax';
		$this->autoRender 	= false;
		$this->view 		= false;
		
		
		if($this->request->is('ajax')){
			if(isset($status) && !empty($status)){			
				$options  = array(
					'conditions' => array(				
						'Branch.status' => $status
					),
					'order' => array(				
						'Branch.id' => 'DESC'
					),
					'fields' => array(
						'Branch.name',																			
						'Branch.branchcode',																			
						'Branch.contactno',																			
						'Branch.tel_no',																			
						'Branch.email',																			
						'Branch.branch_manager',																												
						//'Posdevice.name',
						'Branch.status',
						'Branch.deviceadded',
						'Branch.registered',
						'Branch.modified'
					)					
				);
					
				$branches  =  $this->Branch->find('all', $options);
				
				if($branches){
						$data = array();
					
						if(count($branches) > 0){
							$data = array();
							foreach($branches as $t):
								$data[] = array(
									$t['Branch']['name'],
									$t['Branch']['branchcode'],																																								
									date('d M Y h:i A', strtotime($t['Branch']['registered'])),	
									$t['Branch']['contactno'],									
									$t['Branch']['tel_no'],	
									$t['Branch']['branch_manager'],										
									$t['Branch']['email'],																																																															
									'<a href="'.$this->webroot.'branches/edit/'.$t['Branch']['id'].'" title="Make Changes" class="fs-11"><i class="fas fa-edit fa-lg"></i></a>',									
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
		
		//var_dump($data);
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Branch->exists($id)) {
			throw new NotFoundException(__('Invalid branch'));
		}
		$options = array('conditions' => array('Branch.' . $this->Branch->primaryKey => $id));
		$this->set('branch', $this->Branch->find('first', $options));
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
	
	
	private function getlastBranchNumber(){
		$this->Branch->recursive = -1;
		$branch = $this->Branch->find('first', array(
				'fields' => array(
					'branchnumber'				
				),
				'order' => array(
					'id' => 'DESC'
				)
			)
		);
		
		if(!empty($branch)){
			return $branch['Branch']['branchnumber'] + 1;			
		}else{		
			return $this->getBankDetail('bankcode').'0001';
		}
	}
	
/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			
			$data = array(
				'Branch' => array(					
					'branchnumber'		=> $this->getlastBranchNumber(),
					'name'				=> $this->data['Branch']['name'],
					'branchcode'		=> $this->data['Branch']['branchcode'],
					'address'			=> $this->data['Branch']['address'],
					'contactno'			=> $this->data['Branch']['contactno'],					
					'tel_no'			=> $this->data['Branch']['tel_no'],					
					'email'				=> $this->data['Branch']['email'],
					'branch_manager'	=> $this->data['Branch']['branch_manager'],
					'registered'		=> date('Y-m-d'),
					//'posdevice_id'		=> $this->data['Branch']['posdevice_id'],
					'deviceadded'		=> date('Y-m-d h:i:s'),
					'modified'			=> date('Y-m-d h:i:s'),
					'status'			=> 'Active'
				)
			);
			
			$this->Branch->create();
			if ($this->Branch->save($data)) {				
				$this->Message->msgCommonSuccess();
				return $this->redirect(array('action' => 'add'));
			} else {				
				$this->Message->msgCommonError();
			}
		}
		
		/*
		$registered_devices =  $this->getAllBranchAssignedDevice();
		
		if(!empty($registered_devices)){
			if(count($registered_devices) > 1){
				$conditions = array(
					'conditions' => array(
						'Posdevice.id NOT IN' => $registered_devices
					),
					'order'		=> array(
						'Posdevice.name' 	=> 'ASC'					
					)				
				);
			}else{
				$conditions = array(
					'conditions' => array(
						'NOT Posdevice.id' => $registered_devices
					),
					'order'		=> array(
						'Posdevice.name' 	=> 'ASC'					
					)				
				);
			}
		}else{
			$conditions = array(				
				'order'		=> array(
					'Posdevice.name' 	=> 'ASC'					
				)				
			);
		}
		
		$posdevices = $this->Branch->Posdevice->find('list', $conditions);		
		$this->set(compact('posdevices'));*/
		
	}
	
	private function getAllBranchAssignedDevice(){
		$this->Branch->recursive = -1;
		return $registered_devices = $this->Branch->find('list', array(
			'group' => array(
					'Branch.posdevice_id'
			),
			'fields' => array(
					'posdevice_id'
			)
			)
		);		
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Branch->exists($id)) {
			throw new NotFoundException(__('Invalid branch'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Branch->save($this->request->data)) {
				//$this->Session->setFlash(__('The branch has been saved.'));
				$this->Message->msgCommonUpdate();
				return $this->redirect(array('action' => 'edit', $id));
			} else {
				$this->Message->msgCommonError();
				//$this->Session->setFlash(__('The branch could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Branch.' . $this->Branch->primaryKey => $id));
			$this->request->data = $this->Branch->find('first', $options);
		}
		
		$posdevices = $this->Branch->Posdevice->find('list');
		$this->set(compact('posdevices'));
		
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	/*public function delete($id = null) {
		$this->Branch->id = $id;
		if (!$this->Branch->exists()) {
			throw new NotFoundException(__('Invalid branch'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Branch->delete()) {
			$this->Session->setFlash(__('The branch has been deleted.'));
		} else {
			$this->Session->setFlash(__('The branch could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}*/
}
