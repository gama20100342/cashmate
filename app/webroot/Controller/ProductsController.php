<?php
App::uses('AppController', 'Controller');
/**
 * Products Controller
 *
 * @property Product $Product
 * @property PaginatorComponent $Paginator
 */
class ProductsController extends AppController {

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
		$this->Product->recursive =-1;
		
		//$this->set('products', $this->Paginator->paginate());
		$this->set('products', $this->Product->find('all', array('order' => array('Product.id' => 'ASC'))));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null, $duration=null) {
		if (!$this->Product->exists($id)) {
			throw new NotFoundException(__('Invalid product'));
		}
		
		$options = array('conditions' => array('Product.' . $this->Product->primaryKey => $id));
		$this->set('product', $this->Product->find('first', $options));
		$duration = empty($duration) ? 'daily' : $duration;		
		$this->set('duration', $duration);		
		
		switch($duration){
			case "daily": $init_table = "#daily_limit_"; $init_url="carddailylimits"; break;
			case "weekly": $init_table = "#weekly_limit_"; $init_url="cardweeklylimits"; break;
			case "monthly": $init_table = "#monthly_limit_"; $init_url="cardmonthlylimits"; break;
			case "quarterly": $init_table = "#quarterly_limit_"; $init_url="cardquarterlylimits"; break;
			case "semiannual": $init_table = "#semiannual_limit_"; $init_url="cardsemiannuallimits"; break;
			case "yearly": $init_table = "#yearly_limit_"; $init_url="cardannuallimits"; break;
		}
		
		$this->set('init_table', $init_table);
		$this->set('url', $this->webroot. $init_url.'/getLimitList/'.$id);
	
		
		$this->set('limits', $this->Product->Productlimit->find('all', array(
					'conditions' => array(
						'Productlimit.product_id' => $id
					)
				)
			)
		);
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Product->create();
			if ($this->Product->save($this->request->data)) {
				//$this->Session->setFlash(__('The product has been saved.'));
				$this->Message->msgCommonSuccess();
				return $this->redirect(array('action' => 'add'));
			} else {
				//$this->Session->setFlash(__('The product could not be saved. Please, try again.'));
				$this->Message->msgCommonError();
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
		if (!$this->Product->exists($id)) {
			throw new NotFoundException(__('Invalid product'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Product->save($this->request->data)) {
				//$his->Session->setFlash(__('The product has been saved.'));
				$this->Message->msgCommonUpdate();
				return $this->redirect(array('action' => 'edit', $id));
			} else {
				$this->Message->msgCommonError();
				//$this->Session->setFlash(__('The product could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Product.' . $this->Product->primaryKey => $id));
			$this->request->data = $this->Product->find('first', $options);
		}
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
		$this->Product->id = $id;
		if (!$this->Product->exists()) {
			throw new NotFoundException(__('Invalid product'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Product->delete()) {
			$this->Session->setFlash(__('The product has been deleted.'));
		} else {
			$this->Session->setFlash(__('The product could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}*/
}
