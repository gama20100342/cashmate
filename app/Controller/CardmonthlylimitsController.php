<?php
App::uses('AppController', 'Controller');
/**
 * Cardmonthlylimits Controller
 *
 * @property Cardmonthlylimit $Cardmonthlylimit
 * @property PaginatorComponent $Paginator
 */
class CardmonthlylimitsController extends AppController {

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
		$this->Cardmonthlylimit->recursive = 0;
		$this->set('Cardmonthlylimits', $this->Paginator->paginate());
	}
	
	


/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Cardmonthlylimit->exists($id)) {
			throw new NotFoundException(__('Invalid Cardmonthlylimit'));
		}
		$options = array('conditions' => array('Cardmonthlylimit.' . $this->Cardmonthlylimit->primaryKey => $id));
		$this->set('Cardmonthlylimit', $this->Cardmonthlylimit->find('first', $options));
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
		$settings = $this->Cardmonthlylimit->find('count', array(
			'conditions' => array(
				'Cardmonthlylimit.product_id' => $productid,
				'Cardmonthlylimit.cardtype_id' => $cardtypeid
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
			
		$limits = $this->Cardmonthlylimit->find('all', 
			array(
				'conditions' => array(
					'Cardmonthlylimit.product_id' => $productid
				)
			)
		);
		
		if(empty($productid) && !$this->Cardmonthlylimit->Product->exists($productid)){
			//throw new NotFoundException(__('Invalid parameter'));
			$response = $this->Message->respMsg(500);
		}else{
			//if($limits){
				$data = array();
				if(count($limits) > 0 ){
					foreach($limits as $t):
						//<i class="fas fa-save fa-lg"></i>
						$atm_icon = !empty($t['Cardmonthlylimit']['channel_atm']) ? '<i class="fas fa-check fa-lg"></i>' : '<i class="fas fa-times fa-lg"></i>';
						$pos_icon = !empty($t['Cardmonthlylimit']['channel_pos']) ? '<i class="fas fa-check fa-lg"></i>' : '<i class="fas fa-times fa-lg"></i>';
						$bol_icon = !empty($t['Cardmonthlylimit']['channel_bol']) ? '<i class="fas fa-check fa-lg"></i>' : '<i class="fas fa-times fa-lg"></i>';
						
						
						$data[] = array(
							'<div>'.$t['Cardtype']['name'].'</div>
							<div class="fs-9 text-success">
								<div class="col-md-4 text-center">ATM <br />'.$atm_icon.'</div>
								<div class="col-md-4 text-center">POS <br />'.$pos_icon.'</div>
								<div class="col-md-4 text-center">BOL <br />'.$bol_icon.'</div>
							</div>',	
							'<div>'.
								'Limit Cycle Value <div class="text-success bold"> '.number_format($t['Cardmonthlylimit']['min_withdrawalvalue'], 2, ".", ",").'</div>'.
								'Limit Cycle Fee <div class="text-success bold"> '.number_format($t['Cardmonthlylimit']['min_withdrawalfee'], 2, ".", ",").'</div>
							</div>',
							'<div>'.
								'Limit Cycle Value <div class="text-success bold"> '.number_format($t['Cardmonthlylimit']['max_transvalue'], 2, ".", ",").'</div>'.
								'Limit Cycle Fee <div class="text-success bold"> '.number_format($t['Cardmonthlylimit']['max_transfee'], 2, ".", ",").'</div>
							</div>',
							'<div>'.
								'Limit Cycle Value <div class="text-success bold"> '.number_format($t['Cardmonthlylimit']['total_withdrawalvalue'], 2, ".", ",").'</div>'.
								'Limit Cycle Fee <div class="text-success bold"> '.number_format($t['Cardmonthlylimit']['total_withdrawalfee'], 2, ".", ",").'</div>
							</div>',
							'<div>'.
								'Limit Cycle Value <div class="text-success bold"> '.number_format($t['Cardmonthlylimit']['total_fundtransvalue'], 2, ".", ",").'</div>'.
								'Limit Cycle Fee <div class="text-success bold"> '.number_format($t['Cardmonthlylimit']['total_fundtransfee'], 2, ".", ",").'</div>
							</div>',
							'<div>'.
								'Limit Cycle Value <div class="text-success bold"> '.number_format($t['Cardmonthlylimit']['min_loadingvalue'], 2, ".", ",").'</div>'.
								'Limit Cycle Fee <div class="text-success bold"> '.number_format($t['Cardmonthlylimit']['min_loadingfee'], 2, ".", ",").'</div>
							</div>',
							'<div>'.
								'Limit Cycle Value <div class="text-success bold"> '.number_format($t['Cardmonthlylimit']['max_loadingvalue'], 2, ".", ",").'</div>'.
								'Limit Cycle Fee <div class="text-success bold"> '.number_format($t['Cardmonthlylimit']['max_loadingfee'], 2, ".", ",").'</div>
							</div>',
							'<a href="'.$this->webroot.'cardmonthlylimits/edit/'.$t['Cardmonthlylimit']['id'].'/'.$t['Product']['id'].'/monthly"><i class="fas fa-edit fa-lg"></i></a>'
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
			
			if(empty($productid) || !$this->Cardmonthlylimit->Product->exists($productid)){
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
			
			$this->set('prd', $this->Cardmonthlylimit->Product->findById($productid));
						
	
		
		if ($this->request->is('post')) {
			if($this->ChannelIsNotEmpty($this->data['Cardmonthlylimit']['channel_pos'], $this->data['Cardmonthlylimit']['channel_atm'], $this->data['Cardmonthlylimit']['channel_bol'])){				
				if($this->checkSettingsNotExists($this->data['Cardmonthlylimit']['product_id'], $this->data['Cardmonthlylimit']['cardtype_id'])){
					$this->Cardmonthlylimit->create();
					if ($this->Cardmonthlylimit->save($this->request->data)) {
						//$this->Session->setFlash(__('The Cardmonthlylimit has been saved.'));
						$this->Message->msgCommonSuccess();
						return $this->redirect(array('action' => 'add', $productid, $duration));
					} else {
						//$this->Session->setFlash(__('The Cardmonthlylimit could not be saved. Please, try again.'));
						$this->Message->msgCommonError();
					}
				}else{
					$this->Message->msgCommonExists();
				}
			}else{
				$this->Message->msgError("Please select at least one (1) channel");
			}
		}
		
		$products 	= $this->Cardmonthlylimit->Product->find('list', $options);
		$cardtypes 	= $this->Cardmonthlylimit->Cardtype->find('list');
		
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
		if (!$this->Cardmonthlylimit->exists($id) || empty($productid) || !$this->Cardmonthlylimit->Product->exists($productid)) {
			throw new NotFoundException(__('Invalid Cardmonthlylimit'));
		}
		
		
		if ($this->request->is(array('post', 'put'))) {
			if($this->ChannelIsNotEmpty($this->data['Cardmonthlylimit']['channel_pos'], $this->data['Cardmonthlylimit']['channel_atm'], $this->data['Cardmonthlylimit']['channel_bol'])){				
				//if($this->checkSettingsNotExists($this->data['Cardmonthlylimit']['product_id'], $this->data['Cardmonthlylimit']['cardtype_id'])){									
					if ($this->Cardmonthlylimit->save($this->request->data)) {
						//$this->Session->setFlash(__('The Cardmonthlylimit has been saved.'));
						$this->Message->msgCommonUpdate();
						return $this->redirect(array('action' => 'edit', $id, $productid, $duration));
					} else {
						//$this->Session->setFlash(__('The Cardmonthlylimit could not be saved. Please, try again.'));
						$this->Message->msgCommonError();
					}
				//}else{
					//$this->Message->msgCommonExists();
				//}
			}else{
				$this->Message->msgError("Please select at least one (1) channel");
			}
		} else {
			$options = array('conditions' => array('Cardmonthlylimit.' . $this->Cardmonthlylimit->primaryKey => $id));
			$this->request->data = $this->Cardmonthlylimit->find('first', $options);
		}
		
		$products = $this->Cardmonthlylimit->Product->find('list');
		$cardtypes = $this->Cardmonthlylimit->Cardtype->find('list');
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
		$this->Cardmonthlylimit->id = $id;
		if (!$this->Cardmonthlylimit->exists()) {
			throw new NotFoundException(__('Invalid Cardmonthlylimit'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Cardmonthlylimit->delete()) {
			$this->Session->setFlash(__('The Cardmonthlylimit has been deleted.'));
		} else {
			$this->Session->setFlash(__('The Cardmonthlylimit could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}*/
}
