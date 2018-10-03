<?php
App::uses('AppController', 'Controller');
/**
 * Uploadpregeneratecards Controller
 *
 * @property Uploadpregeneratecard $Uploadpregeneratecard
 * @property PaginatorComponent $Paginator
 */
class UploadpregeneratecardsController extends AppController {

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
		$this->Uploadpregeneratecard->recursive = 0;
		$this->set('uploadpregeneratecards', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Uploadpregeneratecard->exists($id)) {
			throw new NotFoundException(__('Invalid uploadpregeneratecard'));
		}
		$options = array('conditions' => array('Uploadpregeneratecard.' . $this->Uploadpregeneratecard->primaryKey => $id));
		$this->set('uploadpregeneratecard', $this->Uploadpregeneratecard->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Uploadpregeneratecard->create();
			if ($this->Uploadpregeneratecard->save($this->request->data)) {
				$this->Session->setFlash(__('The uploadpregeneratecard has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The uploadpregeneratecard could not be saved. Please, try again.'));
			}
		}
		$users = $this->Uploadpregeneratecard->User->find('list');
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
		if (!$this->Uploadpregeneratecard->exists($id)) {
			throw new NotFoundException(__('Invalid uploadpregeneratecard'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Uploadpregeneratecard->save($this->request->data)) {
				$this->Session->setFlash(__('The uploadpregeneratecard has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The uploadpregeneratecard could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Uploadpregeneratecard.' . $this->Uploadpregeneratecard->primaryKey => $id));
			$this->request->data = $this->Uploadpregeneratecard->find('first', $options);
		}
		$users = $this->Uploadpregeneratecard->User->find('list');
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
		$this->Uploadpregeneratecard->id = $id;
		if (!$this->Uploadpregeneratecard->exists()) {
			throw new NotFoundException(__('Invalid uploadpregeneratecard'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Uploadpregeneratecard->delete()) {
			$this->Session->setFlash(__('The uploadpregeneratecard has been deleted.'));
		} else {
			$this->Session->setFlash(__('The uploadpregeneratecard could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
