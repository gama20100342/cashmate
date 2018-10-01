<?php
App::uses('AppController', 'Controller');
/**
 * Usertokens Controller
 *
 * @property Usertoken $Usertoken
 * @property PaginatorComponent $Paginator
 */
class UsertokensController extends AppController {

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
		$this->Usertoken->recursive = 0;
		$this->set('usertokens', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Usertoken->exists($id)) {
			throw new NotFoundException(__('Invalid usertoken'));
		}
		$options = array('conditions' => array('Usertoken.' . $this->Usertoken->primaryKey => $id));
		$this->set('usertoken', $this->Usertoken->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Usertoken->create();
			if ($this->Usertoken->save($this->request->data)) {
				$this->Session->setFlash(__('The usertoken has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The usertoken could not be saved. Please, try again.'));
			}
		}
		$users = $this->Usertoken->User->find('list');
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
		if (!$this->Usertoken->exists($id)) {
			throw new NotFoundException(__('Invalid usertoken'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Usertoken->save($this->request->data)) {
				$this->Session->setFlash(__('The usertoken has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The usertoken could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Usertoken.' . $this->Usertoken->primaryKey => $id));
			$this->request->data = $this->Usertoken->find('first', $options);
		}
		$users = $this->Usertoken->User->find('list');
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
		$this->Usertoken->id = $id;
		if (!$this->Usertoken->exists()) {
			throw new NotFoundException(__('Invalid usertoken'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Usertoken->delete()) {
			$this->Session->setFlash(__('The usertoken has been deleted.'));
		} else {
			$this->Session->setFlash(__('The usertoken could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
