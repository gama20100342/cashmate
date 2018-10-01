<?php
App::uses('AppController', 'Controller');
/**
 * Groupmenus Controller
 *
 * @property Groupmenu $Groupmenu
 * @property PaginatorComponent $Paginator
 */
class GroupmenusController extends AppController {

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
		$this->Groupmenu->recursive = 0;
		$this->set('groupmenus', $this->Paginator->paginate());
		//$this->set('groupmenus', $this->Groupmenu->find('all', array('order' => array('Groupmenu.id' => 'ASC'))));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Groupmenu->exists($id)) {
			throw new NotFoundException(__('Invalid groupmenu'));
		}
		$options = array('conditions' => array('Groupmenu.' . $this->Groupmenu->primaryKey => $id));
		$this->set('groupmenu', $this->Groupmenu->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Groupmenu->create();
			if ($this->Groupmenu->save($this->request->data)) {
				//$this->Session->setFlash(__('The groupmenu has been saved.'));
				$this->Message->msgCommonSuccess();
				return $this->redirect(array('action' => 'add'));
			} else {
				$this->Message->msgCommonError();
				//$this->Session->setFlash(__('The groupmenu could not be saved. Please, try again.'));
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
		if (!$this->Groupmenu->exists($id)) {
			throw new NotFoundException(__('Invalid groupmenu'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Groupmenu->save($this->request->data)) {
				//$this->Session->setFlash(__('The groupmenu has been saved.'));
				$this->Message->msgCommonUpdate();
				return $this->redirect(array('action' => 'edit', $id));
			} else {
				$this->Message->msgCommonError();
				//$this->Session->setFlash(__('The groupmenu could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Groupmenu.' . $this->Groupmenu->primaryKey => $id));
			$this->request->data = $this->Groupmenu->find('first', $options);
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
		$this->Groupmenu->id = $id;
		if (!$this->Groupmenu->exists()) {
			throw new NotFoundException(__('Invalid groupmenu'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Groupmenu->delete()) {
			$this->Session->setFlash(__('The groupmenu has been deleted.'));
		} else {
			$this->Session->setFlash(__('The groupmenu could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
