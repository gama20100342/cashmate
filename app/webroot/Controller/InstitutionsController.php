<?php
App::uses('AppController', 'Controller');
/**
 * Institutions Controller
 *
 * @property Institution $Institution
 * @property PaginatorComponent $Paginator
 */
class InstitutionsController extends AppController {

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
 
	public function getInsitutionProducts($id){
		$this->Institution->recursive =-1;
		$products = $this->Institution->find('first', array(
			'conditions' => array(
					'Institution.id' => $id
			),
			'fields' => array(
				'Institution.product_id'
			)
		));
		
	
	}
	
	public function getproducts($intid){
		$this->layout = ' ajax';
		$this->view = false;
		$this->autoRender = false; 
		
		
		$this->Institution->recursive=-1;
		$int = $this->Institution->findById($intid);
		$_int = array();
		$_data = array();
		$_int = explode(",", $int['Institution']['product_id']);
		
		$this->Institution->Product->recursive=-1;
		$products = $this->Institution->Product->find('all', array(
				'conditions' => array(
					'Product.id' => $_int
				)
			)
		);
		
		foreach($products as $p):
			$_data[] = array(
				'id' => $p['Product']['id'],
				'name' => $p['Product']['name']
			);
		endforeach;
		
		return json_encode(
			array(
				"_data" => $_data
			)
		);
	}
	
	public function index() {
		$this->Institution->recursive =-1;
		
		
		//$data = array(1,2,3,4,5,6);
		
		//$this->set('institutions', $this->Paginator->paginate());
		$this->set('institutions', $this->Institution->find('all'));
		$this->set('products', $this->getAllProducts());
		
				
	}
	
	private function getAllProducts(){
		$this->Institution->Product->recursive =-1;
		$products = $this->Institution->Product->find('all', array(
				'fields' => array(
					'Product.id', 'Product.name'
				),
				'group' => array(
					'Product.id'
				)
			)
		);
		/*$_data = array();
		
		foreach($products as $product):
			$_data[] = array(
				'data' => array(
					'id' => $product['Product']['id'],
					'name' => $product['Product']['name']
				)
			);
		endforeach;*/
		
		return $products;
	}
	
/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Institution->exists($id)) {
			throw new NotFoundException(__('Invalid institution'));
		}
		$options = array('conditions' => array('Institution.' . $this->Institution->primaryKey => $id));
		$this->set('institution', $this->Institution->find('first', $options));
	}
	
	
	private function getAuthor(){
		return $this->Auth->user('username');
	}
	
/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->set('author', $this->getAuthor());
		$_products = array();
		
		if ($this->request->is('post')) {	
			if(!empty($this->data['Institution']['product_id'])){
					
					foreach($this->data['Institution']['product_id'] as $pro):
						$_products[] = $pro;
					endforeach;
					
					$data = array(
						'Institution' => array(
							'code' 			=> $this->data['Institution']['code'],
							'mnemonic' 		=> $this->data['Institution']['mnemonic'],
							'name' 			=> $this->data['Institution']['name'],
							'product_id' 	=> implode(",", $_products)
						)
					);
					
				$this->Institution->create();
				if ($this->Institution->save($data)) {
					//$this->Session->setFlash(__('The institution has been saved.'));
					$this->Message->msgCommonSuccess();
					return $this->redirect(array('action' => 'add'));
				}else{
					$this->Message->msgCommonError();
				}
			} else {
				$this->Message->msgError("Please select at least one (1) product.");
				//$this->Session->setFlash(__('The institution could not be saved. Please, try again.'));
			}
		}
		
		//products = $this->Institution->Product->find('all');
		$this->set('pro', $this->Institution->Product->find('all', array(
			'group' => array('Product.id'),
			'order' => array('Product.id' => 'ASC')
		)));
		//$this->set(compact('products'));
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
		
		if (!$this->Institution->exists($id)) {
			throw new NotFoundException(__('Invalid institution'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Institution->save($this->request->data)) {
				//$this->Session->setFlash(__('The institution has been saved.'));
				$this->Message->msgCommonUpdate();
				return $this->redirect(array('action' => 'edit', $id));
			} else {
				$this->Message->msgCommonError();
				//$this->Session->setFlash(__('The institution could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Institution.' . $this->Institution->primaryKey => $id));
			$this->request->data = $this->Institution->find('first', $options);
		}
		
		//$products = $this->Institution->Product->find('list');
		//$this->set(compact('products'));
		
		$this->set('pro', $this->Institution->Product->find('all', array(
			'group' => array('Product.id'),
			'order' => array('Product.id' => 'ASC')
		)));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Institution->id = $id;
		if (!$this->Institution->exists()) {
			throw new NotFoundException(__('Invalid institution'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Institution->delete()) {
			$this->Session->setFlash(__('The institution has been deleted.'));
		} else {
			$this->Session->setFlash(__('The institution could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
