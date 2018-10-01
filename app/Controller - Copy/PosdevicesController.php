<?php
App::uses('AppController', 'Controller');
/**
 * Posdevices Controller
 *
 * @property Posdevice $Posdevice
 * @property PaginatorComponent $Paginator
 */
class PosdevicesController extends AppController {

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
	
	public function getListofDevices($status=null) {		
		$this->Posdevice->recursive = -2;	
		$status 		= isset($status) && !empty($status) ? $status : 'Active';
		$this->layout = 'ajax';
		$this->autoRender = false;
		$this->view = false;
		
		
		if($this->request->is('ajax')){
			if(isset($status) && !empty($status)){
			
				$options  = array(
					'conditions' => array(				
						'Posdevice.status' => $status
					),
					'order' => array(				
						'Posdevice.id' => 'DESC'
					)
				);
					
				$device =  $this->Posdevice->find('all', $options);
				
				if($device){
						$data = array();
					
						if(count($device) > 0){
							$data = array();
							foreach($device as $t):
								$data[] = array(
									$t['Posdevice']['name'],																			
									$t['Posdevice']['model'],																			
									$t['Posdevice']['sn'],																			
									$t['Posdevice']['imei'],																			
									$t['Branch']['name'],																			
									$t['Posdevice']['ip'],																			
									$t['Posdevice']['mac'],																			
									date('Y M d', strtotime($t['Posdevice']['registered'])),									
									'<a href="'.$this->webroot.'posdevices/edit/'.$t['Posdevice']['id'].'" title="Make Changes" class="fs-11"><i class="fas fa-edit fa-lg"></i></a>',									
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
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Posdevice->recursive = -2;
		$this->set('posdevices', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Posdevice->exists($id)) {
			throw new NotFoundException(__('Invalid posdevice'));
		}
		$options = array('conditions' => array('Posdevice.' . $this->Posdevice->primaryKey => $id));
		$this->set('posdevice', $this->Posdevice->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */	
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
	
	
	private function getlastPOSNumber(){
		$this->Posdevice->recursive = -1;
		$device = $this->Posdevice->find('first', array(
				'fields' => array(
					'posnumber'				
				),
				'order' => array(
					'id' => 'DESC'
				)
			)
		);
		
		if(!empty($device)){
			return $device['Posdevice']['posnumber'] + 1;			
		}else{		
			return $this->getBankDetail('bankcode').'0001';
		}
	}
	
	public function add() {
		$this->Posdevice->recursive = -2;
				
		if ($this->request->is('post')) {			
		
			$data = array(
				'Posdevice' => array(
					'posnumber' 	=> $this->getlastPOSNumber(),
					'name'			=> $this->data['Posdevice']['name'],
					'model'			=> $this->data['Posdevice']['model'],
					'sn'			=> $this->data['Posdevice']['sn'],
					'imei'			=> $this->data['Posdevice']['imei'],
					'ip'			=> $this->data['Posdevice']['ip'],
					'mac'			=> $this->data['Posdevice']['mac'],
					'registered'	=> date('Y-m-d'),
					'status'		=> 'Active'					
				)
			);
			
			$this->Posdevice->create();
			if ($this->Posdevice->save($data)){				
				$this->Message->msgCommonSuccess();
				return $this->redirect(array('action' => 'add'));
			}else{				
				$this->Message->msgCommonError();
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Posdevice->exists($id)) {
			throw new NotFoundException(__('Invalid posdevice'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Posdevice->save($this->request->data)) {
				//$this->Session->setFlash(__('The posdevice has been saved.'));
				$this->Message->msgCommonUpdate();
				return $this->redirect(array('action' => 'edit', $id));
			} else {
				//$this->Session->setFlash(__('The posdevice could not be saved. Please, try again.'));
				$this->Message->msgCommonError();
			}
		} else {
			$options = array('conditions' => array('Posdevice.' . $this->Posdevice->primaryKey => $id));
			$this->request->data = $this->Posdevice->find('first', $options);
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
		$this->Posdevice->id = $id;
		if (!$this->Posdevice->exists()) {
			throw new NotFoundException(__('Invalid posdevice'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Posdevice->delete()) {
			$this->Session->setFlash(__('The posdevice has been deleted.'));
		} else {
			$this->Session->setFlash(__('The posdevice could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}*/
}
