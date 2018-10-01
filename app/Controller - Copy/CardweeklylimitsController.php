<?php
App::uses('AppController', 'Controller');
/**
 * Cardweeklylimits Controller
 *
 * @property Cardweeklylimit $Cardweeklylimit
 * @property PaginatorComponent $Paginator
 */
class CardweeklylimitsController extends AppController {

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
		$this->Cardweeklylimit->recursive = 0;
		$this->set('cardweeklylimits', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Cardweeklylimit->exists($id)) {
			throw new NotFoundException(__('Invalid cardweeklylimit'));
		}
		$options = array('conditions' => array('Cardweeklylimit.' . $this->Cardweeklylimit->primaryKey => $id));
		$this->set('cardweeklylimit', $this->Cardweeklylimit->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Cardweeklylimit->create();
			if ($this->Cardweeklylimit->save($this->request->data)) {
				$this->Session->setFlash(__('The cardweeklylimit has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The cardweeklylimit could not be saved. Please, try again.'));
			}
		}
		$products = $this->Cardweeklylimit->Product->find('list');
		$cardtypes = $this->Cardweeklylimit->Cardtype->find('list');
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
		if (!$this->Cardweeklylimit->exists($id)) {
			throw new NotFoundException(__('Invalid cardweeklylimit'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Cardweeklylimit->save($this->request->data)) {
				$this->Session->setFlash(__('The cardweeklylimit has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The cardweeklylimit could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Cardweeklylimit.' . $this->Cardweeklylimit->primaryKey => $id));
			$this->request->data = $this->Cardweeklylimit->find('first', $options);
		}
		$products = $this->Cardweeklylimit->Product->find('list');
		$cardtypes = $this->Cardweeklylimit->Cardtype->find('list');
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
		$this->Cardweeklylimit->id = $id;
		if (!$this->Cardweeklylimit->exists()) {
			throw new NotFoundException(__('Invalid cardweeklylimit'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Cardweeklylimit->delete()) {
			$this->Session->setFlash(__('The cardweeklylimit has been deleted.'));
		} else {
			$this->Session->setFlash(__('The cardweeklylimit could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
