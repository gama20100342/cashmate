<?php
App::uses('AppController', 'Controller');
/**
 * Cardtypes Controller
 *
 * @property Cardtype $Cardtype
 * @property PaginatorComponent $Paginator
 */
class CardtypesController extends AppController {

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
		$this->Cardtype->recursive = 0;
		$this->set('cardtypes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Cardtype->exists($id)) {
			throw new NotFoundException(__('Invalid cardtype'));
		}
		$options = array('conditions' => array('Cardtype.' . $this->Cardtype->primaryKey => $id));
		$this->set('cardtype', $this->Cardtype->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Cardtype->create();
			if ($this->Cardtype->save($this->request->data)) {
				//$this->Session->setFlash(__('The cardtype has been saved.'));
				$this->Message->msgCommonSuccess();
				return $this->redirect(array('action' => 'add'));
			} else {
				//$this->Session->setFlash(__('The cardtype could not be saved. Please, try again.'));
				$this->Message->msgCommonError();
			}
		}
		$statuses = $this->Cardtype->Status->find('list');
		$this->set(compact('statuses'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Cardtype->exists($id)) {
			throw new NotFoundException(__('Invalid cardtype'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Cardtype->save($this->request->data)) {
				//$this->Session->setFlash(__('The cardtype has been saved.'));
				$this->Message->msgCommonUpdate();
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Message->msgCommonError();
				//$this->Session->setFlash(__('The cardtype could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Cardtype.' . $this->Cardtype->primaryKey => $id));
			$this->request->data = $this->Cardtype->find('first', $options);
		}
		$statuses = $this->Cardtype->Status->find('list');
		$this->set(compact('statuses'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Cardtype->id = $id;
		if (!$this->Cardtype->exists()) {
			throw new NotFoundException(__('Invalid cardtype'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Cardtype->delete()) {
			$this->Session->setFlash(__('The cardtype has been deleted.'));
		} else {
			$this->Session->setFlash(__('The cardtype could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
