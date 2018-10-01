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
	public $components = array('Paginator', 'Common');
	
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
						'Posdevice.name',
						'Branch.status',
						'Branch.deviceadded',
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
									$t['Branch']['name'].'<br />
									<div class="col-md-12 nopadding-left fs-8 text-success">'. $t['Branch']['branchcode'].'</div>
									<div class="col-md-6 nopadding fs-8">'. $t['Branch']['contactno'].'</div> 
									<div class="col-md-6 nopadding fs-8">'. $t['Branch']['tel_no'].'</div>',																										
									$t['Posdevice']['name'],
									date('d M Y h:i A', strtotime($t['Branch']['deviceadded'])),																			
									date('d M Y h:i A', strtotime($t['Branch']['modified'])),																																											
									$t['Branch']['email'],																			
									$t['Branch']['branch_manager'],																																					
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
					'posdevice_id'		=> $this->data['Branch']['posdevice_id'],
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
		$this->set(compact('posdevices'));
		
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
