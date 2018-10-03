<?php
App::uses('AppController', 'Controller');
/**
 * Useresetpasswords Controller
 *
 * @property Useresetpassword $Useresetpassword
 * @property PaginatorComponent $Paginator
 */
class UseresetpasswordsController extends AppController {

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
		$this->Useresetpassword->recursive = 0;
		$this->set('useresetpasswords', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Useresetpassword->exists($id)) {
			throw new NotFoundException(__('Invalid useresetpassword'));
		}
		$options = array('conditions' => array('Useresetpassword.' . $this->Useresetpassword->primaryKey => $id));
		$this->set('useresetpassword', $this->Useresetpassword->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Useresetpassword->create();
			if ($this->Useresetpassword->save($this->request->data)) {
				$this->Session->setFlash(__('The useresetpassword has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The useresetpassword could not be saved. Please, try again.'));
			}
		}
		$users = $this->Useresetpassword->User->find('list');
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
		if (!$this->Useresetpassword->exists($id)) {
			throw new NotFoundException(__('Invalid useresetpassword'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Useresetpassword->save($this->request->data)) {
				$this->Session->setFlash(__('The useresetpassword has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The useresetpassword could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Useresetpassword.' . $this->Useresetpassword->primaryKey => $id));
			$this->request->data = $this->Useresetpassword->find('first', $options);
		}
		$users = $this->Useresetpassword->User->find('list');
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
		$this->Useresetpassword->id = $id;
		if (!$this->Useresetpassword->exists()) {
			throw new NotFoundException(__('Invalid useresetpassword'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Useresetpassword->delete()) {
			$this->Session->setFlash(__('The useresetpassword has been deleted.'));
		} else {
			$this->Session->setFlash(__('The useresetpassword could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
