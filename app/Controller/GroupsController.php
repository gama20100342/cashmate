<?php
App::uses('AppController', 'Controller');
/**
 * Groups Controller
 *
 * @property Group $Group
 * @property PaginatorComponent $Paginator
 */
class GroupsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components 		= array('Paginator');
	public $table_prefix 	= 'cm_';

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Group->recursive = 0;
		//$this->set('groups', $this->Paginator->paginate());		
		$this->set('groups', $this->Group->find('all'));
		/*$this->set('groups', $this->Group->find('all', array(
			'fields' => array(
				'*', 
				'(SELECT COUNT(*) FROM '.$this->table_prefix.'users WHERE group_id = Group.id) AS `total_user`',
				'(SELECT COUNT(*) FROM '.$this->table_prefix.'groupsettings WHERE group_id = Group.id) AS `total_setting`'
				)
			)
		));*/
	}

	
/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {		
		if (!$this->Group->exists($id)) {			
			throw new NotFoundException(__('Invalid group'));
		}

		//$this->Group->recursive = -2;
		$options = array('conditions' => array('Group.' . $this->Group->primaryKey => $id));
		$this->set('group', $this->Group->find('first', $options));

		/*$this->set('userdata', $this->Group->User->find('all', array(
			'fields' => array('COUNT(*)'),
			'group' => 'group_id',
        	'contain' => array('Group')
		)));*/

	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Group->create();
			if ($this->Group->save($this->request->data)) {
				//$this->Session->setFlash(__('The group has been saved.'));
				$this->Message->msgSuccess('New System Role has been successfully added');
				return $this->redirect(array('action' => 'add'));
			} else {
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
		if (!$this->Group->exists($id)) {
			throw new NotFoundException(__('Invalid group'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Group->save($this->request->data)) {
				$this->Message->msgCommonUpdate();
				return $this->redirect(array('action' => 'edit', $id));
			} else {
				$this->Message->msgCommonError();
			}
		} else {
			$options = array('conditions' => array('Group.' . $this->Group->primaryKey => $id));
			$this->request->data = $this->Group->find('first', $options);
		}
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
		$this->Group->id = $id;
		if (!$this->Group->exists()) {
			throw new NotFoundException(__('Invalid group'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Group->delete()) {
			$this->Session->setFlash(__('The group has been deleted.'));
		} else {
			$this->Session->setFlash(__('The group could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
*/

}
