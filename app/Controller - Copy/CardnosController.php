<?php
App::uses('AppController', 'Controller');
/**
 * Cardnos Controller
 *
 * @property Cardno $Cardno
 * @property PaginatorComponent $Paginator
 */
class CardnosController extends AppController {

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
		$this->Cardno->recursive = 0;
		$this->set('cardnos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Cardno->exists($id)) {
			throw new NotFoundException(__('Invalid cardno'));
		}
		$options = array('conditions' => array('Cardno.' . $this->Cardno->primaryKey => $id));
		$this->set('cardno', $this->Cardno->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Cardno->create();
			if ($this->Cardno->save($this->request->data)) {
				$this->Session->setFlash(__('The cardno has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The cardno could not be saved. Please, try again.'));
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
		if (!$this->Cardno->exists($id)) {
			throw new NotFoundException(__('Invalid cardno'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Cardno->save($this->request->data)) {
				$this->Session->setFlash(__('The cardno has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The cardno could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Cardno.' . $this->Cardno->primaryKey => $id));
			$this->request->data = $this->Cardno->find('first', $options);
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
		$this->Cardno->id = $id;
		if (!$this->Cardno->exists()) {
			throw new NotFoundException(__('Invalid cardno'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Cardno->delete()) {
			$this->Session->setFlash(__('The cardno has been deleted.'));
		} else {
			$this->Session->setFlash(__('The cardno could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
