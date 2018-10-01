<?php
App::uses('AppController', 'Controller');
/**
 * Cardannuallimits Controller
 *
 * @property Cardannuallimit $Cardannuallimit
 * @property PaginatorComponent $Paginator
 */
class CardannuallimitsController extends AppController {

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
		$this->Cardannuallimit->recursive = 0;
		$this->set('cardannuallimits', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Cardannuallimit->exists($id)) {
			throw new NotFoundException(__('Invalid cardannuallimit'));
		}
		$options = array('conditions' => array('Cardannuallimit.' . $this->Cardannuallimit->primaryKey => $id));
		$this->set('cardannuallimit', $this->Cardannuallimit->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Cardannuallimit->create();
			if ($this->Cardannuallimit->save($this->request->data)) {
				$this->Session->setFlash(__('The cardannuallimit has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The cardannuallimit could not be saved. Please, try again.'));
			}
		}
		$products = $this->Cardannuallimit->Product->find('list');
		$cardtypes = $this->Cardannuallimit->Cardtype->find('list');
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
		if (!$this->Cardannuallimit->exists($id)) {
			throw new NotFoundException(__('Invalid cardannuallimit'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Cardannuallimit->save($this->request->data)) {
				$this->Session->setFlash(__('The cardannuallimit has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The cardannuallimit could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Cardannuallimit.' . $this->Cardannuallimit->primaryKey => $id));
			$this->request->data = $this->Cardannuallimit->find('first', $options);
		}
		$products = $this->Cardannuallimit->Product->find('list');
		$cardtypes = $this->Cardannuallimit->Cardtype->find('list');
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
		$this->Cardannuallimit->id = $id;
		if (!$this->Cardannuallimit->exists()) {
			throw new NotFoundException(__('Invalid cardannuallimit'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Cardannuallimit->delete()) {
			$this->Session->setFlash(__('The cardannuallimit has been deleted.'));
		} else {
			$this->Session->setFlash(__('The cardannuallimit could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
