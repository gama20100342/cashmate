<?php
App::uses('AppController', 'Controller');
/**
 * Transwithdrawals Controller
 *
 * @property Transwithdrawal $Transwithdrawal
 * @property PaginatorComponent $Paginator
 */
class TranswithdrawalsController extends AppController {

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
		$this->Transwithdrawal->recursive = 0;
		$this->set('transwithdrawals', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Transwithdrawal->exists($id)) {
			throw new NotFoundException(__('Invalid transwithdrawal'));
		}
		$options = array('conditions' => array('Transwithdrawal.' . $this->Transwithdrawal->primaryKey => $id));
		$this->set('transwithdrawal', $this->Transwithdrawal->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Transwithdrawal->create();
			if ($this->Transwithdrawal->save($this->request->data)) {
				$this->Session->setFlash(__('The transwithdrawal has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The transwithdrawal could not be saved. Please, try again.'));
			}
		}
		$cards = $this->Transwithdrawal->Card->find('list');
		$cardholders = $this->Transwithdrawal->Cardholder->find('list');
		$terminals = $this->Transwithdrawal->Terminal->find('list');
		$this->set(compact('cards', 'cardholders', 'terminals'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Transwithdrawal->exists($id)) {
			throw new NotFoundException(__('Invalid transwithdrawal'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Transwithdrawal->save($this->request->data)) {
				$this->Session->setFlash(__('The transwithdrawal has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The transwithdrawal could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Transwithdrawal.' . $this->Transwithdrawal->primaryKey => $id));
			$this->request->data = $this->Transwithdrawal->find('first', $options);
		}
		$cards = $this->Transwithdrawal->Card->find('list');
		$cardholders = $this->Transwithdrawal->Cardholder->find('list');
		$terminals = $this->Transwithdrawal->Terminal->find('list');
		$this->set(compact('cards', 'cardholders', 'terminals'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Transwithdrawal->id = $id;
		if (!$this->Transwithdrawal->exists()) {
			throw new NotFoundException(__('Invalid transwithdrawal'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Transwithdrawal->delete()) {
			$this->Session->setFlash(__('The transwithdrawal has been deleted.'));
		} else {
			$this->Session->setFlash(__('The transwithdrawal could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
