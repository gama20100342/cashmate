<?php
App::uses('AppController', 'Controller');
/**
 * Transactiontypes Controller
 *
 * @property Transactiontype $Transactiontype
 * @property PaginatorComponent $Paginator
 */
class TransactiontypesController extends AppController {

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
		$this->Transactiontype->recursive = 0;
		$this->set('transactiontypes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null, $type) {		
		
		
		if (!$this->Transactiontype->exists($id)) {
			throw new NotFoundException(__('Invalid transactiontype'));
		}
		
		$this->Transactiontype->recursive = 2;
		
		$options = array('conditions' => array('Transactiontype.' . $this->Transactiontype->primaryKey => $id));		
		$this->set('transactiontype', $this->Transactiontype->find('first', $options));
		
		/*$default_trans = array(
			"1" => "Purchase",
			"2" => "Balance Inquiry",
			"3" => "Load Cash",	
			"4" => "Change Pin",		
			"5" => "Bills Payment",	
			"6" => "Withdrawal"
		);*/
		
		$default_trans = array(
			"1" => "Transpurchase",
			"2" => "Transbalanceinquiry",
			"3" => "Transloadcash",	
			"4" => "Transchangepin",		
			"5" => "Transbillspayment",	
			"6" => "Withdrawal"
		);
		
		//$default_trans
		
		$this->set('table_template', 'table-template-'.$default_trans[$id]);
		$this->set('model', $default_trans[$id]);
		
		$this->set('trans', $this->Transactiontype->{$default_trans[$id]}->find(
			'all', array(
					'conditions' => array($default_trans[$id].'.transactiontype_id' => $id
				)
			)
		));
		
		
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Transactiontype->create();
			if ($this->Transactiontype->save($this->request->data)) {				
				//create the database for the new transactiontype
				$this->Message->msgSuccess("New Transaction Type has been successfully added.");				
				return $this->redirect(array('action' => 'add'));
			} else {
				$this->Message->msgError("Unable to process your request, please try again later.");
			}
		}
		$statuses = $this->Transactiontype->Status->find('list');
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
		if (!$this->Transactiontype->exists($id)) {
			throw new NotFoundException(__('Invalid transactiontype'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Transactiontype->save($this->request->data)) {
					$this->Message->msgCommonUpdate();
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Message->msgCommonError();
			}
		} else {
			$options = array('conditions' => array('Transactiontype.' . $this->Transactiontype->primaryKey => $id));
			$this->request->data = $this->Transactiontype->find('first', $options);
		}
		$statuses = $this->Transactiontype->Status->find('list');
		$this->set(compact('statuses'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	
	/*public function delete($id = null) {
		$this->Transactiontype->id = $id;
		if (!$this->Transactiontype->exists()) {
			throw new NotFoundException(__('Invalid transactiontype'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Transactiontype->delete()) {
			$this->Session->setFlash(__('The transactiontype has been deleted.'));
		} else {
			$this->Session->setFlash(__('The transactiontype could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}*/
}
