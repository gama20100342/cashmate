<?php
App::uses('AppController', 'Controller');
/**
 * Cardstatuses Controller
 *
 * @property Cardstatus $Cardstatus
 * @property PaginatorComponent $Paginator
 */
class CardstatusesController extends AppController {

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
		$this->Cardstatus->recursive = 0;
		$this->set('cardstatuses', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Cardstatus->exists($id)) {
			throw new NotFoundException(__('Invalid cardstatus'));
		}
		$options = array('conditions' => array('Cardstatus.' . $this->Cardstatus->primaryKey => $id));
		$this->set('cardstatus', $this->Cardstatus->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Cardstatus->create();
			if ($this->Cardstatus->save($this->request->data)) {
				//$this->Session->setFlash(__('The cardstatus has been saved.'));
				$this->Message->msgCommonSuccess();
				return $this->redirect(array('action' => 'add'));
			} else {
				//$this->Session->setFlash(__('The cardstatus could not be saved. Please, try again.'));
				$this->Message->msgCommonError();
			}
		}
		$statuses = $this->Cardstatus->Status->find('list');
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
		if (!$this->Cardstatus->exists($id)) {
			throw new NotFoundException(__('Invalid cardstatus'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Cardstatus->save($this->request->data)) {
				//$this->Session->setFlash(__('The cardstatus has been saved.'));
				$this->Message->msgCommonUpdate();
				return $this->redirect(array('action' => 'edit', $id));
			} else {
				$this->Message->msgCommonError();
				//$this->Session->setFlash(__('The cardstatus could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Cardstatus.' . $this->Cardstatus->primaryKey => $id));
			$this->request->data = $this->Cardstatus->find('first', $options);
		}
		$statuses = $this->Cardstatus->Status->find('list');
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
		$this->Cardstatus->id = $id;
		if (!$this->Cardstatus->exists()) {
			throw new NotFoundException(__('Invalid cardstatus'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Cardstatus->delete()) {
			$this->Session->setFlash(__('The cardstatus has been deleted.'));
		} else {
			$this->Session->setFlash(__('The cardstatus could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
