<?php
App::uses('AppController', 'Controller');
/**
 * Withdrawals Controller
 *
 * @property Withdrawal $Withdrawal
 * @property PaginatorComponent $Paginator
 */
class WithdrawalsController extends AppController {
	
	
	public function beforeFilter(){
		parent::beforeFilter();
		$_controller = array("reports-all");
		
		return true;
	}
	
	public function Acl(){
		
	}
	
/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
	
	
	public function getTransactions($cardno = null){
		
		$this->layout = 'ajax';
		$this->autoRender = false;
		$this->view = false;

		
		if($this->request->is('ajax')){
			if (!$this->checkCardExists($cardno)) {
				$response = array(
					'message' => 'Not found',
					'cardno'  => $cardno
				);
			}else{
				$trans = $this->Withdrawal->find('all', array(
						'conditions' => array(
							'Withdrawal.cardno' => $cardno
						)
					)
				);
				
				if($trans){
						$data = array();
					
						if(count($trans) > 0){
							$data = array();
							foreach($trans as $t):
								$data[] = array(
									$t['Withdrawal']['terminal_id'],
									date('Y M d h:i A', strtotime($t['Withdrawal']['transdate'])),
									number_format($t['Withdrawal']['current_balance'], 2, ".", ","),	
									number_format($t['Withdrawal']['withdrawal_amount'], 2, ".", ","),									
									number_format($t['Withdrawal']['remaining_balance'], 2, ".", ","),	
									$t['Status']['name']
								);
							endforeach;					
						}
					
						$response = array(
							'status' 	=> 200,
							'message' 	=> 'Success',
							'data'		=> $data
						);
						
				}else{
					$response = $this->Message->respMsg(400);
				}
				
			}
			
			echo json_encode($response);
		}
		
	}
	
	private function checkCardExists($cardno){		
		if(!$this->Withdrawal->Card->findByCardno($cardno)){
			return false;
		}else{
			return true;
		}				
	}
	
/**
 * index method
 *
 * @return void
 */
	/*public function index() {
		$this->Withdrawal->recursive = 0;
		$this->set('withdrawals', $this->Paginator->paginate());
	}*/

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	/*public function view($id = null) {
		if (!$this->Withdrawal->exists($id)) {
			throw new NotFoundException(__('Invalid withdrawal'));
		}
		$options = array('conditions' => array('Withdrawal.' . $this->Withdrawal->primaryKey => $id));
		$this->set('withdrawal', $this->Withdrawal->find('first', $options));
	}*/

/**
 * add method
 *
 * @return void
 */
	/*public function add() {
		if ($this->request->is('post')) {
			$this->Withdrawal->create();
			if ($this->Withdrawal->save($this->request->data)) {
				$this->Session->setFlash(__('The withdrawal has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The withdrawal could not be saved. Please, try again.'));
			}
		}
		$transactiontypes = $this->Withdrawal->Transactiontype->find('list');
		$cards = $this->Withdrawal->Card->find('list');
		$cardholders = $this->Withdrawal->Cardholder->find('list');
		$terminals = $this->Withdrawal->Terminal->find('list');
		$statuses = $this->Withdrawal->Status->find('list');
		$this->set(compact('transactiontypes', 'cards', 'cardholders', 'terminals', 'statuses'));
	}*/

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	/*public function edit($id = null) {
		if (!$this->Withdrawal->exists($id)) {
			throw new NotFoundException(__('Invalid withdrawal'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Withdrawal->save($this->request->data)) {
				$this->Session->setFlash(__('The withdrawal has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The withdrawal could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Withdrawal.' . $this->Withdrawal->primaryKey => $id));
			$this->request->data = $this->Withdrawal->find('first', $options);
		}
		$transactiontypes = $this->Withdrawal->Transactiontype->find('list');
		$cards = $this->Withdrawal->Card->find('list');
		$cardholders = $this->Withdrawal->Cardholder->find('list');
		$terminals = $this->Withdrawal->Terminal->find('list');
		$statuses = $this->Withdrawal->Status->find('list');
		$this->set(compact('transactiontypes', 'cards', 'cardholders', 'terminals', 'statuses'));
	}*/

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	/*public function delete($id = null) {
		$this->Withdrawal->id = $id;
		if (!$this->Withdrawal->exists()) {
			throw new NotFoundException(__('Invalid withdrawal'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Withdrawal->delete()) {
			$this->Session->setFlash(__('The withdrawal has been deleted.'));
		} else {
			$this->Session->setFlash(__('The withdrawal could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}*/
}
