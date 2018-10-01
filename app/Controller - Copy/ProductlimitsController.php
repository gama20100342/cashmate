<?php
App::uses('AppController', 'Controller');
/**
 * Productlimits Controller
 *
 * @property Productlimit $Productlimit
 * @property PaginatorComponent $Paginator
 */
class ProductlimitsController extends AppController {

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
		$this->Productlimit->recursive = 0;
		$this->set('productlimits', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Productlimit->exists($id)) {
			throw new NotFoundException(__('Invalid productlimit'));
		}
		$options = array('conditions' => array('Productlimit.' . $this->Productlimit->primaryKey => $id));
		$this->set('productlimit', $this->Productlimit->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	
	private function checkDataExists($pid, $name, $cycle, $chan){
		$limit = $this->Productlimit->find('count', array('conditions' => array(
					'Productlimit.product_id' 		=> $pid,
					'Productlimit.name' 			=> $name,
					'Productlimit.limit_cycle'	 	=> $cycle,
					'Productlimit.channels' 		=> $chan
				)
			)
		);
		
		if($limit > 0){
			return false;
		}else{
			return true;
		}
	}
	
	public function saveProductLimit(){
		$this->layout = 'ajax';
		$this->autoRender = false;
		$this->view = false;
		
		
		if ($this->request->is('ajax')) {
			if($this->checkDataExists($this->data['Productlimit']['product_id'], $this->data['Productlimit']['name'], $this->data['Productlimit']['limit_cycle'], $this->data['Productlimit']['channels'])){
				$this->Productlimit->create();
				if ($this->Productlimit->save($this->request->data)) {
					
					$response = array(
									"status" 	=> 200,
									"message" 	=> "Data has been successfully saved."
								);
								
				} else {
					
					$response = $this->Message->respMsg(400, "Invalid details, please try again.");
					
				}			
			
			}else{
				$response = $this->Message->respMsg(400, "Data already exists.");
			}	
			
			return json_encode($response);
		}
	}
	
	public function updateProductLimit(){
		$this->layout = 'ajax';
		$this->autoRender = false;
		$this->view = false;
		
		
		if ($this->request->is('ajax')) {
			//if($this->checkDataExists($this->data['Productlimit']['product_id'], $this->data['Productlimit']['name'], $this->data['Productlimit']['limit_cycle'], $this->data['Productlimit']['channels'])){
				$this->Productlimit->create();
				if ($this->Productlimit->save($this->request->data)) {
					
					$response = array(
									"status" 	=> 200,
									"message" 	=> "Changes has been successfully saved."
								);
								
				} else {
					
					$response = $this->Message->respMsg(400, "Invalid details, please try again.");
					
				}			
			
			}else{
				$response = $this->Message->respMsg(400, "Data already exists.");
			}	
			
			return json_encode($response);
		//}
	}
	
	
	public function add($productid=null) {
			$options = array(
				'order' => array(
					'Product.name' => 'ASC'
				)
			);
			
			$this->set('productid', $productid);
			
		if(isset($productid) && !empty($productid)){
			$options = array(
				'conditions' => array(
					'Product.id' => $productid
				),
				'order' => array(
					'Product.name' => 'ASC'
				)
			);
			
			$this->set('prd', $this->Productlimit->Product->findById($productid));
			
			if(!$this->Productlimit->Product->exists($productid)){
				throw new NotFoundException(__('Invalid parameter'));
			}
		}
	
		
		$products 	= $this->Productlimit->Product->find('list', $options);
		$cardtypes 	= $this->Productlimit->Cardtype->find('list');
		
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
		if (!$this->Productlimit->exists($id)) {
			throw new NotFoundException(__('Invalid productlimit'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Productlimit->save($this->request->data)) {
				$this->Session->setFlash(__('The productlimit has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The productlimit could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Productlimit.' . $this->Productlimit->primaryKey => $id));
			$this->request->data = $this->Productlimit->find('first', $options);
		}
		
		$products = $this->Productlimit->Product->find('list');
		$cardtypes 	= $this->Productlimit->Cardtype->find('list');
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
		$this->Productlimit->id = $id;
		if (!$this->Productlimit->exists()) {
			throw new NotFoundException(__('Invalid productlimit'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Productlimit->delete()) {
			$this->Session->setFlash(__('The productlimit has been deleted.'));
		} else {
			$this->Session->setFlash(__('The productlimit could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
