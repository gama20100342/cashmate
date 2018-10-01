<?php
App::uses('AppController', 'Controller');
/**
 * Userattempts Controller
 *
 * @property Userattempt $Userattempt
 * @property PaginatorComponent $Paginator
 */
class UserattemptsController extends AppController {

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
		$this->Userattempt->recursive = 0;
		$this->set('userattempts', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Userattempt->exists($id)) {
			throw new NotFoundException(__('Invalid userattempt'));
		}
		$options = array('conditions' => array('Userattempt.' . $this->Userattempt->primaryKey => $id));
		$this->set('userattempt', $this->Userattempt->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Userattempt->create();
			if ($this->Userattempt->save($this->request->data)) {
				$this->Session->setFlash(__('The userattempt has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The userattempt could not be saved. Please, try again.'));
			}
		}
		$users = $this->Userattempt->User->find('list');
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
		if (!$this->Userattempt->exists($id)) {
			throw new NotFoundException(__('Invalid userattempt'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Userattempt->save($this->request->data)) {
				$this->Session->setFlash(__('The userattempt has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The userattempt could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Userattempt.' . $this->Userattempt->primaryKey => $id));
			$this->request->data = $this->Userattempt->find('first', $options);
		}
		$users = $this->Userattempt->User->find('list');
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
		$this->Userattempt->id = $id;
		if (!$this->Userattempt->exists()) {
			throw new NotFoundException(__('Invalid userattempt'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Userattempt->delete()) {
			$this->Session->setFlash(__('The userattempt has been deleted.'));
		} else {
			$this->Session->setFlash(__('The userattempt could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
