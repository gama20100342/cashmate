<?php
App::uses('AppController', 'Controller');
/**
 * Atmstations Controller
 *
 * @property Atmstation $Atmstation
 * @property PaginatorComponent $Paginator
 */
class AtmstationsController extends AppController {

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
		$this->Atmstation->recursive = 0;
		$this->set('atmstations', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Atmstation->exists($id)) {
			throw new NotFoundException(__('Invalid atmstation'));
		}
		$options = array('conditions' => array('Atmstation.' . $this->Atmstation->primaryKey => $id));
		$this->set('atmstation', $this->Atmstation->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Atmstation->create();
			if ($this->Atmstation->save($this->request->data)) {
				$this->Session->setFlash(__('The atmstation has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The atmstation could not be saved. Please, try again.'));
			}
		}
		$branches = $this->Atmstation->Branch->find('list');
		$this->set(compact('branches'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Atmstation->exists($id)) {
			throw new NotFoundException(__('Invalid atmstation'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Atmstation->save($this->request->data)) {
				$this->Session->setFlash(__('The atmstation has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The atmstation could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Atmstation.' . $this->Atmstation->primaryKey => $id));
			$this->request->data = $this->Atmstation->find('first', $options);
		}
		$branches = $this->Atmstation->Branch->find('list');
		$this->set(compact('branches'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Atmstation->id = $id;
		if (!$this->Atmstation->exists()) {
			throw new NotFoundException(__('Invalid atmstation'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Atmstation->delete()) {
			$this->Session->setFlash(__('The atmstation has been deleted.'));
		} else {
			$this->Session->setFlash(__('The atmstation could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
