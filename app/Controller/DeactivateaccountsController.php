<?php
App::uses('AppController', 'Controller');
/**
 * Deactivateaccounts Controller
 *
 * @property Deactivateaccount $Deactivateaccount
 * @property PaginatorComponent $Paginator
 */
class DeactivateaccountsController extends AppController {

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
		$this->Deactivateaccount->recursive = 0;
		$this->set('deactivateaccounts', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Deactivateaccount->exists($id)) {
			throw new NotFoundException(__('Invalid deactivateaccount'));
		}
		$options = array('conditions' => array('Deactivateaccount.' . $this->Deactivateaccount->primaryKey => $id));
		$this->set('deactivateaccount', $this->Deactivateaccount->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Deactivateaccount->create();
			if ($this->Deactivateaccount->save($this->request->data)) {
				$this->Session->setFlash(__('The deactivateaccount has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The deactivateaccount could not be saved. Please, try again.'));
			}
		}
		$cardholders = $this->Deactivateaccount->Cardholder->find('list');
		$this->set(compact('cardholders'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Deactivateaccount->exists($id)) {
			throw new NotFoundException(__('Invalid deactivateaccount'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Deactivateaccount->save($this->request->data)) {
				$this->Session->setFlash(__('The deactivateaccount has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The deactivateaccount could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Deactivateaccount.' . $this->Deactivateaccount->primaryKey => $id));
			$this->request->data = $this->Deactivateaccount->find('first', $options);
		}
		$cardholders = $this->Deactivateaccount->Cardholder->find('list');
		$this->set(compact('cardholders'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Deactivateaccount->id = $id;
		if (!$this->Deactivateaccount->exists()) {
			throw new NotFoundException(__('Invalid deactivateaccount'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Deactivateaccount->delete()) {
			$this->Session->setFlash(__('The deactivateaccount has been deleted.'));
		} else {
			$this->Session->setFlash(__('The deactivateaccount could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
