<?php
App::uses('AppController', 'Controller');
/**
 * Postations Controller
 *
 * @property Postation $Postation
 * @property PaginatorComponent $Paginator
 */
class PostationsController extends AppController {

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
		$this->Postation->recursive = 0;
		$this->set('postations', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Postation->exists($id)) {
			throw new NotFoundException(__('Invalid postation'));
		}
		$options = array('conditions' => array('Postation.' . $this->Postation->primaryKey => $id));
		$this->set('postation', $this->Postation->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Postation->create();
			if ($this->Postation->save($this->request->data)) {
				$this->Session->setFlash(__('The postation has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The postation could not be saved. Please, try again.'));
			}
		}
		$branches = $this->Postation->Branch->find('list');
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
		if (!$this->Postation->exists($id)) {
			throw new NotFoundException(__('Invalid postation'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Postation->save($this->request->data)) {
				$this->Session->setFlash(__('The postation has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The postation could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Postation.' . $this->Postation->primaryKey => $id));
			$this->request->data = $this->Postation->find('first', $options);
		}
		$branches = $this->Postation->Branch->find('list');
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
		$this->Postation->id = $id;
		if (!$this->Postation->exists()) {
			throw new NotFoundException(__('Invalid postation'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Postation->delete()) {
			$this->Session->setFlash(__('The postation has been deleted.'));
		} else {
			$this->Session->setFlash(__('The postation could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
