<?php
App::uses('AppController', 'Controller');
/**
 * Debitcredits Controller
 *
 * @property Debitcredit $Debitcredit
 * @property PaginatorComponent $Paginator
 */
class DebitcreditsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
	
	
	public function generate_debit_report($date_from=null, $date_to=null){
		$this->layout 	= 'pdf';		
		$this->set('date_from', $date_from);		
		$this->set('date_to', $date_to);		
		$this->set('title', !empty($date_from) && !empty($date_to) ? $date_from.' - '.$date_to : 'ALL');
		//$this->set('trans', $trans);
		$this->set('filename', 'debit_report');
				
		$this->render();
	}
	
	public function generate_credit_report($date_from=null, $date_to=null){
		$this->layout 	= 'pdf';		
		$this->set('date_from', $date_from);		
		$this->set('date_to', $date_to);		
		$this->set('title', !empty($date_from) && !empty($date_to) ? $date_from.' - '.$date_to : 'ALL');
		//$this->set('trans', $trans);
		$this->set('filename', 'credit_report');
				
		$this->render();
	}
	
	
	
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Debitcredit->recursive = 0;
		$this->set('debitcredits', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Debitcredit->exists($id)) {
			throw new NotFoundException(__('Invalid debitcredit'));
		}
		$options = array('conditions' => array('Debitcredit.' . $this->Debitcredit->primaryKey => $id));
		$this->set('debitcredit', $this->Debitcredit->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Debitcredit->create();
			if ($this->Debitcredit->save($this->request->data)) {
				$this->Session->setFlash(__('The debitcredit has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The debitcredit could not be saved. Please, try again.'));
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
		if (!$this->Debitcredit->exists($id)) {
			throw new NotFoundException(__('Invalid debitcredit'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Debitcredit->save($this->request->data)) {
				$this->Session->setFlash(__('The debitcredit has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The debitcredit could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Debitcredit.' . $this->Debitcredit->primaryKey => $id));
			$this->request->data = $this->Debitcredit->find('first', $options);
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
		$this->Debitcredit->id = $id;
		if (!$this->Debitcredit->exists()) {
			throw new NotFoundException(__('Invalid debitcredit'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Debitcredit->delete()) {
			$this->Session->setFlash(__('The debitcredit has been deleted.'));
		} else {
			$this->Session->setFlash(__('The debitcredit could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
