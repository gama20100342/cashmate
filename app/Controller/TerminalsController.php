<?php
App::uses('AppController', 'Controller');
/**
 * Terminals Controller
 *
 * @property Terminal $Terminal
 * @property PaginatorComponent $Paginator
 */
class TerminalsController extends AppController {

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
		$this->Terminal->recursive =0;
		//$this->set('terminals', $this->Paginator->paginate());
		$this->set('terminals', $this->Terminal->find('all'));
	}
	
	private function getAuthor(){
		return $this->Auth->user('username');
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Terminal->exists($id)) {
			throw new NotFoundException(__('Invalid terminal'));
		}
		$options = array('conditions' => array('Terminal.' . $this->Terminal->primaryKey => $id));
		$this->set('terminal', $this->Terminal->find('first', $options));
	}
	
	
	private function getlastPOSNumber(){
		$this->Terminal->recursive = -1;
		$device = $this->Terminal->find('first', array(
				'fields' => array(
					'deviceno'				
				),
				'order' => array(
					'id' => 'DESC'
				)
			)
		);
		
		if(!empty($device)){
			return $device['Terminal']['deviceno'] + 1;			
		}else{		
			return $this->getBankDetail('bankcode').'000001';
		}
	}
	
	private function getBankDetail($field=null){		
		$this->LoadModel('Setting');
		$this->Setting->recursive = -2;
		$bin = $this->Setting->findById(1);
		
		if(isset($field) && !empty($field)){
			return $bin['Setting'][$field];
		}else{
			return $bin;
		}
	}
	
/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->set('author', $this->getAuthor());
		$this->set('deviceno', ''); //$this->getlastPOSNumber());
		
		if ($this->request->is('post')) {
			$this->Terminal->create();
			if ($this->Terminal->save($this->request->data)) {
				//$this->Session->setFlash(__('The terminal has been saved.'));
				$this->Message->msgCommonSuccess();
				return $this->redirect(array('action' => 'add'));
			} else {
				//$this->Session->setFlash(__('The terminal could not be saved. Please, try again.'));
				$this->Message->msgCommonError();
			}
		}
		
		$branches = $this->Terminal->Branch->find('list');
		$this->set(compact('branches'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->set('author', $this->getAuthor());
			

		if (!$this->Terminal->exists($id)) {
			throw new NotFoundException(__('Invalid terminal'));
		}
		
		$this->Terminal->recursive=-1;
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Terminal->save($this->request->data)) {
				//$this->Session->setFlash(__('The terminal has been saved.'));
				$this->Message->msgCommonUpdate();
				return $this->redirect(array('action' => 'edit', $id));
			} else {
				//$this->Session->setFlash(__('The terminal could not be saved. Please, try again.'));
				$this->Message->msgCommonError();
			}
		} else {
			
			$options = array('conditions' => array('Terminal.' . $this->Terminal->primaryKey => $id));
			$this->request->data = $this->Terminal->find('first', $options);
		}
		
		
		$branches = $this->Terminal->Branch->find('list');
		$this->set(compact('branches'));
		
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Terminal->id = $id;
		if (!$this->Terminal->exists()) {
			throw new NotFoundException(__('Invalid terminal'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Terminal->delete()) {
			$this->Session->setFlash(__('The terminal has been deleted.'));
		} else {
			$this->Session->setFlash(__('The terminal could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
