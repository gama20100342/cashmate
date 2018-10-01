<?php
App::uses('AppController', 'Controller');
/**
 * Cardquarterlylimits Controller
 *
 * @property Cardquarterlylimit $Cardquarterlylimit
 * @property PaginatorComponent $Paginator
 */
class CardquarterlylimitsController extends AppController {

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
		$this->Cardquarterlylimit->recursive = 0;
		$this->set('cardquarterlylimits', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Cardquarterlylimit->exists($id)) {
			throw new NotFoundException(__('Invalid cardquarterlylimit'));
		}
		$options = array('conditions' => array('Cardquarterlylimit.' . $this->Cardquarterlylimit->primaryKey => $id));
		$this->set('cardquarterlylimit', $this->Cardquarterlylimit->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Cardquarterlylimit->create();
			if ($this->Cardquarterlylimit->save($this->request->data)) {
				$this->Session->setFlash(__('The cardquarterlylimit has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The cardquarterlylimit could not be saved. Please, try again.'));
			}
		}
		$products = $this->Cardquarterlylimit->Product->find('list');
		$cardtypes = $this->Cardquarterlylimit->Cardtype->find('list');
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
		if (!$this->Cardquarterlylimit->exists($id)) {
			throw new NotFoundException(__('Invalid cardquarterlylimit'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Cardquarterlylimit->save($this->request->data)) {
				$this->Session->setFlash(__('The cardquarterlylimit has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The cardquarterlylimit could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Cardquarterlylimit.' . $this->Cardquarterlylimit->primaryKey => $id));
			$this->request->data = $this->Cardquarterlylimit->find('first', $options);
		}
		$products = $this->Cardquarterlylimit->Product->find('list');
		$cardtypes = $this->Cardquarterlylimit->Cardtype->find('list');
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
		$this->Cardquarterlylimit->id = $id;
		if (!$this->Cardquarterlylimit->exists()) {
			throw new NotFoundException(__('Invalid cardquarterlylimit'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Cardquarterlylimit->delete()) {
			$this->Session->setFlash(__('The cardquarterlylimit has been deleted.'));
		} else {
			$this->Session->setFlash(__('The cardquarterlylimit could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
