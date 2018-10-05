<?php
App::uses('AppController', 'Controller');
/**
 * Approvedaccounts Controller
 *
 * @property Approvedaccount $Approvedaccount
 * @property PaginatorComponent $Paginator
 */
class ApprovedaccountsController extends AppController {

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
		$this->Approvedaccount->recursive = 0;
		$this->set('approvedaccounts', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Approvedaccount->exists($id)) {
			throw new NotFoundException(__('Invalid approvedaccount'));
		}
		$options = array('conditions' => array('Approvedaccount.' . $this->Approvedaccount->primaryKey => $id));
		$this->set('approvedaccount', $this->Approvedaccount->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Approvedaccount->create();
			if ($this->Approvedaccount->save($this->request->data)) {
				$this->Session->setFlash(__('The approvedaccount has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The approvedaccount could not be saved. Please, try again.'));
			}
		}
		$cardholders = $this->Approvedaccount->Cardholder->find('list');
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
		if (!$this->Approvedaccount->exists($id)) {
			throw new NotFoundException(__('Invalid approvedaccount'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Approvedaccount->save($this->request->data)) {
				$this->Session->setFlash(__('The approvedaccount has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The approvedaccount could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Approvedaccount.' . $this->Approvedaccount->primaryKey => $id));
			$this->request->data = $this->Approvedaccount->find('first', $options);
		}
		$cardholders = $this->Approvedaccount->Cardholder->find('list');
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
		$this->Approvedaccount->id = $id;
		if (!$this->Approvedaccount->exists()) {
			throw new NotFoundException(__('Invalid approvedaccount'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Approvedaccount->delete()) {
			$this->Session->setFlash(__('The approvedaccount has been deleted.'));
		} else {
			$this->Session->setFlash(__('The approvedaccount could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
