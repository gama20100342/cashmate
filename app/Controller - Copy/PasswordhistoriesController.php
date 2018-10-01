<?php
App::uses('AppController', 'Controller');
/**
 * Passwordhistories Controller
 *
 * @property Passwordhistory $Passwordhistory
 * @property PaginatorComponent $Paginator
 */
class PasswordhistoriesController extends AppController {

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
		$this->Passwordhistory->recursive = 0;
		$this->set('passwordhistories', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Passwordhistory->exists($id)) {
			throw new NotFoundException(__('Invalid passwordhistory'));
		}
		$options = array('conditions' => array('Passwordhistory.' . $this->Passwordhistory->primaryKey => $id));
		$this->set('passwordhistory', $this->Passwordhistory->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Passwordhistory->create();
			if ($this->Passwordhistory->save($this->request->data)) {
				$this->Session->setFlash(__('The passwordhistory has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The passwordhistory could not be saved. Please, try again.'));
			}
		}
		$users = $this->Passwordhistory->User->find('list');
		$this->set(compact('users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Passwordhistory->exists($id)) {
			throw new NotFoundException(__('Invalid passwordhistory'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Passwordhistory->save($this->request->data)) {
				$this->Session->setFlash(__('The passwordhistory has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The passwordhistory could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Passwordhistory.' . $this->Passwordhistory->primaryKey => $id));
			$this->request->data = $this->Passwordhistory->find('first', $options);
		}
		$users = $this->Passwordhistory->User->find('list');
		$this->set(compact('users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Passwordhistory->id = $id;
		if (!$this->Passwordhistory->exists()) {
			throw new NotFoundException(__('Invalid passwordhistory'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Passwordhistory->delete()) {
			$this->Session->setFlash(__('The passwordhistory has been deleted.'));
		} else {
			$this->Session->setFlash(__('The passwordhistory could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
