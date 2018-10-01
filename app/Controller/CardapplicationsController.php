<?php
App::uses('AppController', 'Controller');
/**
 * Cardapplications Controller
 *
 * @property Cardapplication $Cardapplication
 * @property PaginatorComponent $Paginator
 */
class CardapplicationsController extends AppController {

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
		$this->Cardapplication->recursive =-1;
		//$this->set('cardapplications', $this->Paginator->paginate());
		$this->set('cardapplications', $this->Cardapplication->find('all', 
				array(
					'conditions' => array(
						'Cardapplication.status' => 0
					),				
					'joins' =>  array(
						array(
							'table' => 'cardholders',
							'alias'	=> 'Cardholder',
							'type'	=> 'INNER',
							'conditions' => array(
								'Cardholder.refid = Cardapplication.refid'
							)
						),
						array(
							'table' => 'cardtypes',
							'alias'	=> 'Cardtype',
							'type'	=> 'LEFT',
							'conditions' => array(
								//'Cardtype.id = Cardapplication.cardtype_id'
								'Cardapplication.cardtype_id = Cardtype.id'
							)
						)
					),
					'fields' => array(
						'Cardapplication.*', 'Cardholder.*', 'Cardtype.*'
					)
				)
			)
		);
		
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Cardapplication->exists($id)) {
			throw new NotFoundException(__('Invalid cardapplication'));
		}
		$options = array('conditions' => array('Cardapplication.' . $this->Cardapplication->primaryKey => $id));
		$this->set('cardapplication', $this->Cardapplication->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Cardapplication->create();
			if ($this->Cardapplication->save($this->request->data)) {
				$this->Session->setFlash(__('The cardapplication has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The cardapplication could not be saved. Please, try again.'));
			}
		}
		$cardstatuses = $this->Cardapplication->Cardstatus->find('list');
		$users = $this->Cardapplication->User->find('list');
		$branches = $this->Cardapplication->Branch->find('list');
		$this->set(compact('cardstatuses', 'users', 'branches'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Cardapplication->exists($id)) {
			throw new NotFoundException(__('Invalid cardapplication'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Cardapplication->save($this->request->data)) {
				$this->Session->setFlash(__('The cardapplication has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The cardapplication could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Cardapplication.' . $this->Cardapplication->primaryKey => $id));
			$this->request->data = $this->Cardapplication->find('first', $options);
		}
		$cardstatuses = $this->Cardapplication->Cardstatus->find('list');
		$users = $this->Cardapplication->User->find('list');
		$branches = $this->Cardapplication->Branch->find('list');
		$this->set(compact('cardstatuses', 'users', 'branches'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	/*
	public function delete($id = null) {
		$this->Cardapplication->id = $id;
		if (!$this->Cardapplication->exists()) {
			throw new NotFoundException(__('Invalid cardapplication'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Cardapplication->delete()) {
			$this->Session->setFlash(__('The cardapplication has been deleted.'));
		} else {
			$this->Session->setFlash(__('The cardapplication could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}*/
	
}
