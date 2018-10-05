<?php
App::uses('AppController', 'Controller');
/**
 * Cardholderstatuses Controller
 *
 * @property Cardholderstatus $Cardholderstatus
 * @property PaginatorComponent $Paginator
 */
class CardholderstatusesController extends AppController {

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
		$this->Cardholderstatus->recursive = 0;
		$this->set('cardholderstatuses', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Cardholderstatus->exists($id)) {
			throw new NotFoundException(__('Invalid cardholderstatus'));
		}
		$options = array('conditions' => array('Cardholderstatus.' . $this->Cardholderstatus->primaryKey => $id));
		$this->set('cardholderstatus', $this->Cardholderstatus->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Cardholderstatus->create();
			if ($this->Cardholderstatus->save($this->request->data)) {
				$this->Session->setFlash(__('The cardholderstatus has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The cardholderstatus could not be saved. Please, try again.'));
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
		if (!$this->Cardholderstatus->exists($id)) {
			throw new NotFoundException(__('Invalid cardholderstatus'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Cardholderstatus->save($this->request->data)) {
				$this->Session->setFlash(__('The cardholderstatus has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The cardholderstatus could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Cardholderstatus.' . $this->Cardholderstatus->primaryKey => $id));
			$this->request->data = $this->Cardholderstatus->find('first', $options);
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
		$this->Cardholderstatus->id = $id;
		if (!$this->Cardholderstatus->exists()) {
			throw new NotFoundException(__('Invalid cardholderstatus'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Cardholderstatus->delete()) {
			$this->Session->setFlash(__('The cardholderstatus has been deleted.'));
		} else {
			$this->Session->setFlash(__('The cardholderstatus could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
