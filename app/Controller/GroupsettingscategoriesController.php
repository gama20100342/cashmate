<?php
App::uses('AppController', 'Controller');
/**
 * Groupsettingscategories Controller
 *
 * @property Groupsettingscategory $Groupsettingscategory
 * @property PaginatorComponent $Paginator
 */
class GroupsettingscategoriesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Message');
	
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Groupsettingscategory->recursive = 0;
		//$this->set('groupsettingscategories', $this->Paginator->paginate());
		$this->set('groupsettingscategories', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Groupsettingscategory->exists($id)) {
			throw new NotFoundException(__('Invalid groupsettingscategory'));
		}
		$options = array('conditions' => array('Groupsettingscategory.' . $this->Groupsettingscategory->primaryKey => $id));
		$this->set('groupsettingscategory', $this->Groupsettingscategory->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Groupsettingscategory->create();
			if ($this->Groupsettingscategory->save($this->request->data)) {				
				$this->Message->msgSuccess('Category details has been added');				
				return $this->redirect(array('action' => 'add'));
			} else {
				$this->Message->msgError('Unable to save details, please try again. 
				If this still exists please contact the system administrator.');	
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
		if (!$this->Groupsettingscategory->exists($id)) {
			throw new NotFoundException(__('Invalid groupsettingscategory'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Groupsettingscategory->save($this->request->data)) {
				$this->Message->msgSuccess('Category details changes has been added');		
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Message->msgError('Category details could not be saved, please try again.');		
			}
		} else {
			$options = array('conditions' => array('Groupsettingscategory.' . $this->Groupsettingscategory->primaryKey => $id));
			$this->request->data = $this->Groupsettingscategory->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Groupsettingscategory->id = $id;
		if (!$this->Groupsettingscategory->exists()) {
			throw new NotFoundException(__('Invalid groupsettingscategory'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Groupsettingscategory->delete()) {
			$this->Session->setFlash(__('The groupsettingscategory has been deleted.'));
		} else {
			$this->Session->setFlash(__('The groupsettingscategory could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
