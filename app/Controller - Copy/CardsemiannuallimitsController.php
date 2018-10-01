<?php
App::uses('AppController', 'Controller');
/**
 * Cardsemiannuallimits Controller
 *
 * @property Cardsemiannuallimit $Cardsemiannuallimit
 * @property PaginatorComponent $Paginator
 */
class CardsemiannuallimitsController extends AppController {

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
		$this->Cardsemiannuallimit->recursive = 0;
		$this->set('cardsemiannuallimits', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Cardsemiannuallimit->exists($id)) {
			throw new NotFoundException(__('Invalid cardsemiannuallimit'));
		}
		$options = array('conditions' => array('Cardsemiannuallimit.' . $this->Cardsemiannuallimit->primaryKey => $id));
		$this->set('cardsemiannuallimit', $this->Cardsemiannuallimit->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Cardsemiannuallimit->create();
			if ($this->Cardsemiannuallimit->save($this->request->data)) {
				$this->Session->setFlash(__('The cardsemiannuallimit has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The cardsemiannuallimit could not be saved. Please, try again.'));
			}
		}
		$products = $this->Cardsemiannuallimit->Product->find('list');
		$cardtypes = $this->Cardsemiannuallimit->Cardtype->find('list');
		$this->set(compact('products', 'cardtypes'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Cardsemiannuallimit->exists($id)) {
			throw new NotFoundException(__('Invalid cardsemiannuallimit'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Cardsemiannuallimit->save($this->request->data)) {
				$this->Session->setFlash(__('The cardsemiannuallimit has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The cardsemiannuallimit could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Cardsemiannuallimit.' . $this->Cardsemiannuallimit->primaryKey => $id));
			$this->request->data = $this->Cardsemiannuallimit->find('first', $options);
		}
		$products = $this->Cardsemiannuallimit->Product->find('list');
		$cardtypes = $this->Cardsemiannuallimit->Cardtype->find('list');
		$this->set(compact('products', 'cardtypes'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Cardsemiannuallimit->id = $id;
		if (!$this->Cardsemiannuallimit->exists()) {
			throw new NotFoundException(__('Invalid cardsemiannuallimit'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Cardsemiannuallimit->delete()) {
			$this->Session->setFlash(__('The cardsemiannuallimit has been deleted.'));
		} else {
			$this->Session->setFlash(__('The cardsemiannuallimit could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
