<?php
App::uses('AppController', 'Controller');
/**
 * Merchants Controller
 *
 * @property Merchant $Merchant
 * @property PaginatorComponent $Paginator
 */
class MerchantsController extends AppController {

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
		$this->Merchant->recursive = 0;
		$this->set('merchants', $this->Paginator->paginate());
	}
	
	
	public function indexAjax($status=null){
		
		$this->Merchant->recursive = -1;	
		$status 			= isset($status) && !empty($status) ? $status : 'Active';
		$this->layout 		= 'ajax';
		$this->autoRender 	= false;
		$this->view 		= false;
		
		
		if($this->request->is('ajax')){
			if(isset($status) && !empty($status)){			
				$options  = array(
					'conditions' => array(				
						'Merchant.status' => $status
					),
					'order' => array(				
						'Merchant.id' => 'DESC'
					)
				);
					
				$merchant =  $this->Merchant->find('all', $options);
				
				if($merchant){
						$data = array();
					
						if(count($merchant) > 0){
							$data = array();
							foreach($merchant as $t):
								$data[] = array(
									$t['Merchant']['name'],																			
									$t['Merchant']['owner'],																			
									$t['Merchant']['code'],																			
									$t['Merchant']['posdevice_id'],																			
									$t['Merchant']['tel_no'],																			
									$t['Merchant']['contact_no'],																												
									$t['Merchant']['status'],
									'<a href="'.$this->webroot.'merchants/edit/'.$t['Merchant']['id'].'" title="Make Changes" class="fs-11"><i class="fas fa-edit fa-lg"></i></a>',									
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
		if (!$this->Merchant->exists($id)) {
			throw new NotFoundException(__('Invalid merchant'));
		}
		$options = array('conditions' => array('Merchant.' . $this->Merchant->primaryKey => $id));
		$this->set('merchant', $this->Merchant->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	private function getAllBranchAssignedDevice(){
		$this->Merchant->recursive = -1;
		return $registered_devices = $this->Merchant->find('list', array(
			'group' => array(
					'Merchant.posdevice_id'
			),
			'fields' => array(
					'posdevice_id'
			)
			)
		);		
	}
	
	public function add() {
		if ($this->request->is('post')) {
			$this->Merchant->create();
			if ($this->Merchant->save($this->request->data)) {
				//$this->Session->setFlash(__('The merchant has been saved.'));
				$this->Message->msgCommonSuccess();
				return $this->redirect(array('action' => 'add'));
			} else {
				//$this->Message->msgCommonSuccess();$this->Session->setFlash(__('The merchant could not be saved. Please, try again.'));
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
		
		$posdevices = $this->Merchant->Posdevice->find('list', $conditions);		
		
		//$posdevices = $this->Merchant->Posdevice->find('list');
		$this->set(compact('posdevices'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Merchant->exists($id)) {
			throw new NotFoundException(__('Invalid merchant'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Merchant->save($this->request->data)) {
				//$this->Session->setFlash(__('The merchant has been saved.'));
				$this->Message->msgCommonUpdate();
				return $this->redirect(array('action' => 'edit', $id));
			} else {
				//$this->Session->setFlash(__('The merchant could not be saved. Please, try again.'));
				$this->Message->msgCommonError();
			}
		} 
			$options = array('conditions' => array('Merchant.' . $this->Merchant->primaryKey => $id));
			$merchant =   $this->Merchant->find('first', $options);
			$this->request->data = $merchant;
			
		
		$registered_devices =  $this->getAllBranchAssignedDevice();
		if(!empty($registered_devices)){
			if(count($registered_devices) > 1){
				$conditions = array(
					'conditions' => array(
						'Posdevice.id NOT IN' => $registered_devices,
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
		
		$posdevices = $this->Merchant->Posdevice->find('list', $conditions);	
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
		$this->Merchant->id = $id;
		if (!$this->Merchant->exists()) {
			throw new NotFoundException(__('Invalid merchant'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Merchant->delete()) {
			$this->Session->setFlash(__('The merchant has been deleted.'));
		} else {
			$this->Session->setFlash(__('The merchant could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}*/
}
