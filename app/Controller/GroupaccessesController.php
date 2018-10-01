<?php
App::uses('AppController', 'Controller');
/**
 * Groupaccesses Controller
 *
 * @property Groupaccess $Groupaccess
 * @property PaginatorComponent $Paginator
 */
class GroupaccessesController extends AppController {
	
	
	public function beforeFilter(){
		parent::beforeFilter();
		if(!$this->Auth->user('id')=="1" || !$this->Auth->user('group_id')=="1"){
			exit();
		}
	}
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
		$this->Groupaccess->recursive = 0;
		//$this->set('groupaccesses', $this->Paginator->paginate());
		$this->set('groupaccesses', $this->Groupaccess->find('all', 
			array(
				'order' => array(
					'Groupaccess.id' => 'ASC'
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
	/*public function view($id = null) {
		if (!$this->Groupaccess->exists($id)) {
			throw new NotFoundException(__('Invalid groupaccess'));
		}
		$options = array('conditions' => array('Groupaccess.' . $this->Groupaccess->primaryKey => $id));
		$this->set('groupaccess', $this->Groupaccess->find('first', $options));
	}*/

/**
 * add method
 *
 * @return void
 */	
	private function checkExistence($group, $controller){
		return $this->Groupaccess->find('count', array(
			'conditions' => array(
				'Groupaccess.group_id' => $group,
				'Groupaccess.controller' => $controller
			)
		));
	}
	
	public function add() {
		$_action = array();
		$this->set('selected', 'branches');
		if ($this->request->is('post')) {			
			if($this->checkExistence($this->data['Groupaccess']['group_id'], $this->data['Groupaccess']['controller']) <= 0){
				
				if(!empty($this->data['Groupaccess']['action'])){
					
					foreach($this->data['Groupaccess']['action'] as $action):
						$_action[] = $action;
					endforeach;
					
					$data = array(
						'Groupaccess' => array(
							'group_id' 		=> $this->data['Groupaccess']['group_id'],
							'controller' 	=> $this->data['Groupaccess']['controller'],
							'action' 		=> implode(",", $_action)
						)
					);
					
					$this->Groupaccess->create();
					if ($this->Groupaccess->save($data)) {
						//$this->Session->setFlash(__('The groupaccess has been saved.'));
						$this->Message->msgCommonSuccess();
						$this->set('selected', $this->data['Groupaccess']['controller']);
						//return $this->redirect(array('action' => 'add'));
					} else {
						//$this->Session->setFlash(__('The groupaccess could not be saved. Please, try again.'));
						$this->Message->msgCommonError();
					}
				}else{
					$this->Message->msgError("Invalid settings, please try again.");
				}
			}else{
				$this->Message->msgError("Setting already exists");
			}
			
		}
		
		//$groupmenus = $this->Groupaccess->Groupmenu->find('list');
		$groups = $this->Groupaccess->Group->find('list', array('conditions' => array('Group.id >' => 1)));
		//$this->set(compact('groupmenus', 'groups'));
		$this->set(compact('groups'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Groupaccess->exists($id)) {
			throw new NotFoundException(__('Invalid groupaccess'));
		}
		
		$_action = array();
		$_views = array();
			
		if ($this->request->is(array('post', 'put'))) {
				
				if(!empty($this->data['Groupaccess']['action'])):
				foreach($this->data['Groupaccess']['action'] as $action):
					$_action[] = $action;
				endforeach;
				endif;
					
				$this->Groupaccess->id = $id;
				if ($this->Groupaccess->saveField('action', implode(",", $_action))) {				
					$this->Message->msgCommonUpdate();
					return $this->redirect(array('action' => 'edit', $id));
				} else {					
					$this->Message->msgCommonError();
				}
			
		}else{
			$options = array('conditions' => array('Groupaccess.' . $this->Groupaccess->primaryKey => $id));
			$this->request->data = $this->Groupaccess->find('first', $options);
			
			foreach(explode(",", $this->request->data['Groupaccess']['action']) as $d):
				$_views[$d] = $d;
			endforeach;
			
			
		}
			
		$this->set('_views', $_views);
		
		$groups = $this->Groupaccess->Group->find('list', array('conditions' => array('Group.id >' => 1)));
		$this->set(compact('groups'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	
	/*public function delete($id = null) {
		$this->Groupaccess->id = $id;
		if (!$this->Groupaccess->exists()) {
			throw new NotFoundException(__('Invalid groupaccess'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Groupaccess->delete()) {
			$this->Session->setFlash(__('The groupaccess has been deleted.'));
		} else {
			$this->Session->setFlash(__('The groupaccess could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}*/
	
}
