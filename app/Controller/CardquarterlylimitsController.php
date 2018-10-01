<?php
App::uses('AppController', 'Controller');
/**
 * Cardquarterlylimits Controller
 *
 * @property Cardquarterlylimit $Cardquarterlylimit
 * @property PaginatorComponent $Paginator
 */
class CardquarterlylimitsController extends AppController {

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
		$this->Cardquarterlylimit->recursive = 0;
		$this->set('Cardquarterlylimits', $this->Paginator->paginate());
	}
	
	


/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Cardquarterlylimit->exists($id)) {
			throw new NotFoundException(__('Invalid Cardquarterlylimit'));
		}
		$options = array('conditions' => array('Cardquarterlylimit.' . $this->Cardquarterlylimit->primaryKey => $id));
		$this->set('Cardquarterlylimit', $this->Cardquarterlylimit->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */	
	private function getAuthor(){
		return $this->Auth->user('firstname').' '.$this->Auth->user('lastname');
	}
	
	private function checkSettingsNotExists($productid, $cardtypeid){
		$settings = $this->Cardquarterlylimit->find('count', array(
			'conditions' => array(
				'Cardquarterlylimit.product_id' => $productid,
				'Cardquarterlylimit.cardtype_id' => $cardtypeid
			)
		));
		
		if($settings > 0){
			return false;
		}else{
			return true;
		}
	}
	
	private function ChannelIsNotEmpty($pos, $atm, $bol){
		if(empty($pos) && empty($atm) && empty($bol)){
			return false;
		}else{
			return true;
		}
	}
	
	public function getLimitList($productid){
		
		$this->layout = 'ajax';
		$this->autoRender = false;
		$this->view = false;
		
		
		if($this->request->is('ajax')){
			
		$limits = $this->Cardquarterlylimit->find('all', 
			array(
				'conditions' => array(
					'Cardquarterlylimit.product_id' => $productid
				)
			)
		);
		
		if(empty($productid) && !$this->Cardquarterlylimit->Product->exists($productid)){
			//throw new NotFoundException(__('Invalid parameter'));
			$response = $this->Message->respMsg(500);
		}else{
			//if($limits){
				$data = array();
				if(count($limits) > 0 ){
					foreach($limits as $t):
						//<i class="fas fa-save fa-lg"></i>
						$atm_icon = !empty($t['Cardquarterlylimit']['channel_atm']) ? '<i class="fas fa-check fa-lg"></i>' : '<i class="fas fa-times fa-lg"></i>';
						$pos_icon = !empty($t['Cardquarterlylimit']['channel_pos']) ? '<i class="fas fa-check fa-lg"></i>' : '<i class="fas fa-times fa-lg"></i>';
						$bol_icon = !empty($t['Cardquarterlylimit']['channel_bol']) ? '<i class="fas fa-check fa-lg"></i>' : '<i class="fas fa-times fa-lg"></i>';
						
						
						$data[] = array(
							'<div>'.$t['Cardtype']['name'].'</div>
							<div class="fs-9 text-success">
								<div class="col-md-4 text-center">ATM <br />'.$atm_icon.'</div>
								<div class="col-md-4 text-center">POS <br />'.$pos_icon.'</div>
								<div class="col-md-4 text-center">BOL <br />'.$bol_icon.'</div>
							</div>',	
							'<div>'.
								'Limit Cycle Value <div class="text-success bold"> '.number_format($t['Cardquarterlylimit']['min_withdrawalvalue'], 2, ".", ",").'</div>'.
								'Limit Cycle Fee <div class="text-success bold"> '.number_format($t['Cardquarterlylimit']['min_withdrawalfee'], 2, ".", ",").'</div>
							</div>',
							'<div>'.
								'Limit Cycle Value <div class="text-success bold"> '.number_format($t['Cardquarterlylimit']['max_transvalue'], 2, ".", ",").'</div>'.
								'Limit Cycle Fee <div class="text-success bold"> '.number_format($t['Cardquarterlylimit']['max_transfee'], 2, ".", ",").'</div>
							</div>',
							'<div>'.
								'Limit Cycle Value <div class="text-success bold"> '.number_format($t['Cardquarterlylimit']['total_withdrawalvalue'], 2, ".", ",").'</div>'.
								'Limit Cycle Fee <div class="text-success bold"> '.number_format($t['Cardquarterlylimit']['total_withdrawalfee'], 2, ".", ",").'</div>
							</div>',
							'<div>'.
								'Limit Cycle Value <div class="text-success bold"> '.number_format($t['Cardquarterlylimit']['total_fundtransvalue'], 2, ".", ",").'</div>'.
								'Limit Cycle Fee <div class="text-success bold"> '.number_format($t['Cardquarterlylimit']['total_fundtransfee'], 2, ".", ",").'</div>
							</div>',
							'<div>'.
								'Limit Cycle Value <div class="text-success bold"> '.number_format($t['Cardquarterlylimit']['min_loadingvalue'], 2, ".", ",").'</div>'.
								'Limit Cycle Fee <div class="text-success bold"> '.number_format($t['Cardquarterlylimit']['min_loadingfee'], 2, ".", ",").'</div>
							</div>',
							'<div>'.
								'Limit Cycle Value <div class="text-success bold"> '.number_format($t['Cardquarterlylimit']['max_loadingvalue'], 2, ".", ",").'</div>'.
								'Limit Cycle Fee <div class="text-success bold"> '.number_format($t['Cardquarterlylimit']['max_loadingfee'], 2, ".", ",").'</div>
							</div>',
							'<a href="'.$this->webroot.'cardquarterlylimits/edit/'.$t['Cardquarterlylimit']['id'].'/'.$t['Product']['id'].'/quarterly"><i class="fas fa-edit fa-lg"></i></a>'
						);
					endforeach;
				}
				
				$response = array(
								'status' 	=> 200,
								'message' 	=> 'Success',
								'data'		=> $data
							);
							
			//}else{
				//$response = $this->Message->respMsg(400);
			//}
		}
		
		echo json_encode($response);
		
		}
		
		
		
	}
	
	public function add($productid=null, $duration=null) {
			
			if(empty($productid) || !$this->Cardquarterlylimit->Product->exists($productid)){
				throw new NotFoundException(__('Invalid parameter'));
			}
			
		
			
			$this->set('productid', $productid);
			$this->set('duration', $duration);
			$this->set('author', $this->getAuthor());
			

			$options = array(
				'conditions' => array(
					'Product.id' => $productid
				),
				'order' => array(
					'Product.name' => 'ASC'
				)
			);
			
			$this->set('prd', $this->Cardquarterlylimit->Product->findById($productid));
						
	
		
		if ($this->request->is('post')) {
			if($this->ChannelIsNotEmpty($this->data['Cardquarterlylimit']['channel_pos'], $this->data['Cardquarterlylimit']['channel_atm'], $this->data['Cardquarterlylimit']['channel_bol'])){				
				if($this->checkSettingsNotExists($this->data['Cardquarterlylimit']['product_id'], $this->data['Cardquarterlylimit']['cardtype_id'])){
					$this->Cardquarterlylimit->create();
					if ($this->Cardquarterlylimit->save($this->request->data)) {
						//$this->Session->setFlash(__('The Cardquarterlylimit has been saved.'));
						$this->Message->msgCommonSuccess();
						return $this->redirect(array('action' => 'add', $productid, $duration));
					} else {
						//$this->Session->setFlash(__('The Cardquarterlylimit could not be saved. Please, try again.'));
						$this->Message->msgCommonError();
					}
				}else{
					$this->Message->msgCommonExists();
				}
			}else{
				$this->Message->msgError("Please select at least one (1) channel");
			}
		}
		
		$products 	= $this->Cardquarterlylimit->Product->find('list', $options);
		$cardtypes 	= $this->Cardquarterlylimit->Cardtype->find('list');
		
		$this->set(compact('products', 'cardtypes'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null, $productid=null, $duration=null) {
		if (!$this->Cardquarterlylimit->exists($id) || empty($productid) || !$this->Cardquarterlylimit->Product->exists($productid)) {
			throw new NotFoundException(__('Invalid Cardquarterlylimit'));
		}
		
		
		if ($this->request->is(array('post', 'put'))) {
			if($this->ChannelIsNotEmpty($this->data['Cardquarterlylimit']['channel_pos'], $this->data['Cardquarterlylimit']['channel_atm'], $this->data['Cardquarterlylimit']['channel_bol'])){				
				//if($this->checkSettingsNotExists($this->data['Cardquarterlylimit']['product_id'], $this->data['Cardquarterlylimit']['cardtype_id'])){									
					if ($this->Cardquarterlylimit->save($this->request->data)) {
						//$this->Session->setFlash(__('The Cardquarterlylimit has been saved.'));
						$this->Message->msgCommonUpdate();
						return $this->redirect(array('action' => 'edit', $id, $productid, $duration));
					} else {
						//$this->Session->setFlash(__('The Cardquarterlylimit could not be saved. Please, try again.'));
						$this->Message->msgCommonError();
					}
				//}else{
					//$this->Message->msgCommonExists();
				//}
			}else{
				$this->Message->msgError("Please select at least one (1) channel");
			}
		} else {
			$options = array('conditions' => array('Cardquarterlylimit.' . $this->Cardquarterlylimit->primaryKey => $id));
			$this->request->data = $this->Cardquarterlylimit->find('first', $options);
		}
		
		$products = $this->Cardquarterlylimit->Product->find('list');
		$cardtypes = $this->Cardquarterlylimit->Cardtype->find('list');
		$this->set('author', $this->getAuthor());
		$this->set('productid', $productid);
		$this->set('duration', $duration);
			
		$this->set(compact('products', 'cardtypes'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	/*public function delete($id = null) {
		$this->Cardquarterlylimit->id = $id;
		if (!$this->Cardquarterlylimit->exists()) {
			throw new NotFoundException(__('Invalid Cardquarterlylimit'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Cardquarterlylimit->delete()) {
			$this->Session->setFlash(__('The Cardquarterlylimit has been deleted.'));
		} else {
			$this->Session->setFlash(__('The Cardquarterlylimit could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}*/
}
