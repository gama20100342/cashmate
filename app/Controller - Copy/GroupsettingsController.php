<?php
App::uses('AppController', 'Controller');
/**
 * Groupsettings Controller
 *
 * @property Groupsetting $Groupsetting
 * @property PaginatorComponent $Paginator
 */
class GroupsettingsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Groupsetting->recursive = 0;
		//$this->set('groupsettings', $this->Paginator->paginate());
		$this->set('groupsettings', $this->Groupsetting->find(
			'all', array(
					'group' => array(
						'Groupsetting.controller',
						'Groupsetting.action'
					)
				)
			));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */

 /*
	public function view($id = null) {
		if (!$this->Groupsetting->exists($id)) {
			throw new NotFoundException(__('Invalid groupsetting'));
		}
		$options = array('conditions' => array('Groupsetting.' . $this->Groupsetting->primaryKey => $id));
		$this->set('groupsetting', $this->Groupsetting->find('first', $options));
	}*/

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$newdata = array();		
		if ($this->request->is('post')) {
			/*if(isset($this->data['Groupsetting']['group_id']) && !empty($this->data['Groupsetting']['group_id'])){
				foreach($this->data['Groupsetting']['group_id'] as $key => $index):
					$newdata[] = array(
						'Groupsetting' 	=> array(
							'name' 							=> $this->data['Groupsetting']['name'],
							'group_id' 						=> $index,
							'groupsettingscategory_id' 		=> $this->data['Groupsetting']['groupsettingscategory_id'],
							'controller' 					=> $this->data['Groupsetting']['controller'],
							'action' 						=> $this->data['Groupsetting']['action'],
							'status_id' 					=> $this->data['Groupsetting']['status_id'],
							'description' 					=> $this->data['Groupsetting']['description']
						)
					);
				endforeach;
								
			}*/
			
			$_groups 	= serialize($this->data['Groupsetting']['group_id']);
			$_action 	= serialize($this->data['Groupsetting']['action']);
			
			$_data  	= array(
				'Groupsetting' => array(
					'name' 						=> $this->data['Groupsetting']['name'],
					'groups' 					=> $_groups,
					'groupsettingscategory_id' 	=> $this->data['Groupsetting']['groupsettingscategory_id'],
					'controller' 				=> $this->data['Groupsetting']['controller'],
					'action'					=> $_action,
					'status_id'					=> $this->data['Groupsetting']['status_id']
				)
			);
			

			$this->Groupsetting->create();
			//if ($this->Groupsetting->saveAll($newdata)) {
			if ($this->Groupsetting->save($_data)) {
				//$this->Session->setFlash(__('The groupsetting has been saved.'));
				$this->Message->msgSuccess("New setting has been added");
				return $this->redirect(array('action' => 'add'));
			} else {
				$this->Message->msgCommonError();
			}
		}

		$groups = $this->Groupsetting->Group->find('list');
		$groupsettingscategories = $this->Groupsetting->Groupsettingscategory->find('list');
		$statuses = $this->Groupsetting->Status->find('list');
		$this->set(compact('groups', 'groupsettingscategories', 'statuses'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Groupsetting->exists($id)) {
			throw new NotFoundException(__('Invalid groupsetting'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Groupsetting->save($this->request->data)) {
				//$this->Session->setFlash(__('The groupsetting has been saved.'));
				$this->Message->msgCommonUpdate();
				return $this->redirect(array('action' => 'index'));
			} else {
				//$this->Session->setFlash(__('The groupsetting could not be saved. Please, try again.'));
				$this->Message->msgCommonError();
			}
		} else {
			$options = array('conditions' => array('Groupsetting.' . $this->Groupsetting->primaryKey => $id));
			$this->request->data = $this->Groupsetting->find('first', $options);
		}
		$groups = $this->Groupsetting->Group->find('list');
		$groupsettingscategories = $this->Groupsetting->Groupsettingscategory->find('list');
		$statuses = $this->Groupsetting->Status->find('list');
		$this->set(compact('groups', 'groupsettingscategories', 'statuses'));
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
		$this->Groupsetting->id = $id;
		if (!$this->Groupsetting->exists()) {
			throw new NotFoundException(__('Invalid groupsetting'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Groupsetting->delete()) {
			$this->Session->setFlash(__('The groupsetting has been deleted.'));
		} else {
			$this->Session->setFlash(__('The groupsetting could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}*/
}
