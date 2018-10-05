<?php
App::uses('AppController', 'Controller');
/**
 * Cardpregens Controller
 *
 * @property Cardpregen $Cardpregen
 * @property PaginatorComponent $Paginator
 */
class CardpregensController extends AppController {

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
		$this->Cardpregen->recursive = 0;
		$this->set('cardpregens', $this->Paginator->paginate());
	}
	
	
	
	public function getAvailablePregenCardNo($product, $institution){		
			$this->layout = 'ajax';
			$this->autoRender = false;
			$this->view  = false;
			
			$this->Cardpregen->recursive=-1;
			$cards = $this->Cardpregen->find('all', array(
				'conditions' => array(				
					'Cardpregen.product' => $product,
					'Cardpregen.institution' => $institution,
					'Cardpregen.status' => 0
				),
				'fields' => array(
					'Cardpregen.cardno'
				)
			));
			
			$_data = array();
			
			if(!empty($cards)){
				foreach($cards as $c):
					$_data[] = $c['Cardpregen']['cardno'];
				endforeach;				
			}
			
			
		if($this->request->is('ajax')){
			return json_encode(array("status" => 200, "_data" => $_data));
		}
		
		
	}
	
	public function getAvailablePregenPinCode($cardno){		
			$this->layout = 'ajax';
			$this->autoRender = false;
			$this->view  = false;
			
		$this->Cardpregen->recursive=-1;
		$cards = $this->Cardpregen->find('first', array(
			'conditions' => array(				
				'Cardpregen.cardno' => $cardno
			),
			'fields' => array(
				'Cardpregen.pincode'
			)
		));
		
		if($this->request->is('ajax')){
			return json_encode(array("status" => 200, "_data" => $cards['Cardpregen']['pincode']));
		}
	}
	
/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Cardpregen->exists($id)) {
			throw new NotFoundException(__('Invalid cardpregen'));
		}
		$options = array('conditions' => array('Cardpregen.' . $this->Cardpregen->primaryKey => $id));
		$this->set('cardpregen', $this->Cardpregen->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Cardpregen->create();
			if ($this->Cardpregen->save($this->request->data)) {
				$this->Session->setFlash(__('The cardpregen has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The cardpregen could not be saved. Please, try again.'));
			}
		}
		$users = $this->Cardpregen->User->find('list');
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
		if (!$this->Cardpregen->exists($id)) {
			throw new NotFoundException(__('Invalid cardpregen'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Cardpregen->save($this->request->data)) {
				$this->Session->setFlash(__('The cardpregen has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The cardpregen could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Cardpregen.' . $this->Cardpregen->primaryKey => $id));
			$this->request->data = $this->Cardpregen->find('first', $options);
		}
		$users = $this->Cardpregen->User->find('list');
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
		$this->Cardpregen->id = $id;
		if (!$this->Cardpregen->exists()) {
			throw new NotFoundException(__('Invalid cardpregen'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Cardpregen->delete()) {
			$this->Session->setFlash(__('The cardpregen has been deleted.'));
		} else {
			$this->Session->setFlash(__('The cardpregen could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
