<?php
App::uses('AppController', 'Controller');
/**
 * Cardmonthlylimits Controller
 *
 * @property Cardmonthlylimit $Cardmonthlylimit
 * @property PaginatorComponent $Paginator
 */
class CardmonthlylimitsController extends AppController {

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
		$this->Cardmonthlylimit->recursive = 0;
		$this->set('cardmonthlylimits', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Cardmonthlylimit->exists($id)) {
			throw new NotFoundException(__('Invalid cardmonthlylimit'));
		}
		$options = array('conditions' => array('Cardmonthlylimit.' . $this->Cardmonthlylimit->primaryKey => $id));
		$this->set('cardmonthlylimit', $this->Cardmonthlylimit->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Cardmonthlylimit->create();
			if ($this->Cardmonthlylimit->save($this->request->data)) {
				$this->Session->setFlash(__('The cardmonthlylimit has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The cardmonthlylimit could not be saved. Please, try again.'));
			}
		}
		$products = $this->Cardmonthlylimit->Product->find('list');
		$cardtypes = $this->Cardmonthlylimit->Cardtype->find('list');
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
		if (!$this->Cardmonthlylimit->exists($id)) {
			throw new NotFoundException(__('Invalid cardmonthlylimit'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Cardmonthlylimit->save($this->request->data)) {
				$this->Session->setFlash(__('The cardmonthlylimit has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The cardmonthlylimit could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Cardmonthlylimit.' . $this->Cardmonthlylimit->primaryKey => $id));
			$this->request->data = $this->Cardmonthlylimit->find('first', $options);
		}
		$products = $this->Cardmonthlylimit->Product->find('list');
		$cardtypes = $this->Cardmonthlylimit->Cardtype->find('list');
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
		$this->Cardmonthlylimit->id = $id;
		if (!$this->Cardmonthlylimit->exists()) {
			throw new NotFoundException(__('Invalid cardmonthlylimit'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Cardmonthlylimit->delete()) {
			$this->Session->setFlash(__('The cardmonthlylimit has been deleted.'));
		} else {
			$this->Session->setFlash(__('The cardmonthlylimit could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
