<?php
App::uses('AppController', 'Controller');
/**
 * Cardweeklylimits Controller
 *
 * @property Cardweeklylimit $Cardweeklylimit
 * @property PaginatorComponent $Paginator
 */
class CardweeklylimitsController extends AppController {

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
		$this->Cardweeklylimit->recursive = 0;
		$this->set('Cardweeklylimits', $this->Paginator->paginate());
	}
	
	


/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Cardweeklylimit->exists($id)) {
			throw new NotFoundException(__('Invalid Cardweeklylimit'));
		}
		$options = array('conditions' => array('Cardweeklylimit.' . $this->Cardweeklylimit->primaryKey => $id));
		$this->set('Cardweeklylimit', $this->Cardweeklylimit->find('first', $options));
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
		$settings = $this->Cardweeklylimit->find('count', array(
			'conditions' => array(
				'Cardweeklylimit.product_id' => $productid,
				'Cardweeklylimit.cardtype_id' => $cardtypeid
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
			
		$limits = $this->Cardweeklylimit->find('all', 
			array(
				'conditions' => array(
					'Cardweeklylimit.product_id' => $productid
				)
			)
		);
		
		if(empty($productid) && !$this->Cardweeklylimit->Product->exists($productid)){
			//throw new NotFoundException(__('Invalid parameter'));
			$response = $this->Message->respMsg(500);
		}else{
			//if($limits){
				$data = array();
				if(count($limits) > 0 ){
					foreach($limits as $t):
						//<i class="fas fa-save fa-lg"></i>
						$atm_icon = !empty($t['Cardweeklylimit']['channel_atm']) ? '<i class="fas fa-check fa-lg"></i>' : '<i class="fas fa-times fa-lg"></i>';
						$pos_icon = !empty($t['Cardweeklylimit']['channel_pos']) ? '<i class="fas fa-check fa-lg"></i>' : '<i class="fas fa-times fa-lg"></i>';
						$bol_icon = !empty($t['Cardweeklylimit']['channel_bol']) ? '<i class="fas fa-check fa-lg"></i>' : '<i class="fas fa-times fa-lg"></i>';
						
						
						$data[] = array(
							'<div>'.$t['Cardtype']['name'].'</div>
							<div class="fs-9 text-success">
								<div class="col-md-4 text-center">ATM <br />'.$atm_icon.'</div>
								<div class="col-md-4 text-center">POS <br />'.$pos_icon.'</div>
								<div class="col-md-4 text-center">BOL <br />'.$bol_icon.'</div>
							</div>',	
							'<div>'.
								'Limit Cycle Value <div class="text-success bold"> '.number_format($t['Cardweeklylimit']['min_withdrawalvalue'], 2, ".", ",").'</div>'.
								'Limit Cycle Fee <div class="text-success bold"> '.number_format($t['Cardweeklylimit']['min_withdrawalfee'], 2, ".", ",").'</div>
							</div>',
							'<div>'.
								'Limit Cycle Value <div class="text-success bold"> '.number_format($t['Cardweeklylimit']['max_transvalue'], 2, ".", ",").'</div>'.
								'Limit Cycle Fee <div class="text-success bold"> '.number_format($t['Cardweeklylimit']['max_transfee'], 2, ".", ",").'</div>
							</div>',
							'<div>'.
								'Limit Cycle Value <div class="text-success bold"> '.number_format($t['Cardweeklylimit']['total_withdrawalvalue'], 2, ".", ",").'</div>'.
								'Limit Cycle Fee <div class="text-success bold"> '.number_format($t['Cardweeklylimit']['total_withdrawalfee'], 2, ".", ",").'</div>
							</div>',
							'<div>'.
								'Limit Cycle Value <div class="text-success bold"> '.number_format($t['Cardweeklylimit']['total_fundtransvalue'], 2, ".", ",").'</div>'.
								'Limit Cycle Fee <div class="text-success bold"> '.number_format($t['Cardweeklylimit']['total_fundtransfee'], 2, ".", ",").'</div>
							</div>',
							'<div>'.
								'Limit Cycle Value <div class="text-success bold"> '.number_format($t['Cardweeklylimit']['min_loadingvalue'], 2, ".", ",").'</div>'.
								'Limit Cycle Fee <div class="text-success bold"> '.number_format($t['Cardweeklylimit']['min_loadingfee'], 2, ".", ",").'</div>
							</div>',
							'<div>'.
								'Limit Cycle Value <div class="text-success bold"> '.number_format($t['Cardweeklylimit']['max_loadingvalue'], 2, ".", ",").'</div>'.
								'Limit Cycle Fee <div class="text-success bold"> '.number_format($t['Cardweeklylimit']['max_loadingfee'], 2, ".", ",").'</div>
							</div>',
							'<a href="'.$this->webroot.'cardweeklylimits/edit/'.$t['Cardweeklylimit']['id'].'/'.$t['Product']['id'].'/weekly"><i class="fas fa-edit fa-lg"></i></a>'
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
			
			if(empty($productid) || !$this->Cardweeklylimit->Product->exists($productid)){
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
			
			$this->set('prd', $this->Cardweeklylimit->Product->findById($productid));
						
	
		
		if ($this->request->is('post')) {
			if($this->ChannelIsNotEmpty($this->data['Cardweeklylimit']['channel_pos'], $this->data['Cardweeklylimit']['channel_atm'], $this->data['Cardweeklylimit']['channel_bol'])){				
				if($this->checkSettingsNotExists($this->data['Cardweeklylimit']['product_id'], $this->data['Cardweeklylimit']['cardtype_id'])){
					$this->Cardweeklylimit->create();
					if ($this->Cardweeklylimit->save($this->request->data)) {
						//$this->Session->setFlash(__('The Cardweeklylimit has been saved.'));
						$this->Message->msgCommonSuccess();
						return $this->redirect(array('action' => 'add', $productid, $duration));
					} else {
						//$this->Session->setFlash(__('The Cardweeklylimit could not be saved. Please, try again.'));
						$this->Message->msgCommonError();
					}
				}else{
					$this->Message->msgCommonExists();
				}
			}else{
				$this->Message->msgError("Please select at least one (1) channel");
			}
		}
		
		$products 	= $this->Cardweeklylimit->Product->find('list', $options);
		$cardtypes 	= $this->Cardweeklylimit->Cardtype->find('list');
		
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
		if (!$this->Cardweeklylimit->exists($id) || empty($productid) || !$this->Cardweeklylimit->Product->exists($productid)) {
			throw new NotFoundException(__('Invalid Cardweeklylimit'));
		}
		
		
		if ($this->request->is(array('post', 'put'))) {
			if($this->ChannelIsNotEmpty($this->data['Cardweeklylimit']['channel_pos'], $this->data['Cardweeklylimit']['channel_atm'], $this->data['Cardweeklylimit']['channel_bol'])){				
				//if($this->checkSettingsNotExists($this->data['Cardweeklylimit']['product_id'], $this->data['Cardweeklylimit']['cardtype_id'])){									
					if ($this->Cardweeklylimit->save($this->request->data)) {
						//$this->Session->setFlash(__('The Cardweeklylimit has been saved.'));
						$this->Message->msgCommonUpdate();
						return $this->redirect(array('action' => 'edit', $id, $productid, $duration));
					} else {
						//$this->Session->setFlash(__('The Cardweeklylimit could not be saved. Please, try again.'));
						$this->Message->msgCommonError();
					}
				//}else{
					//$this->Message->msgCommonExists();
				//}
			}else{
				$this->Message->msgError("Please select at least one (1) channel");
			}
		} else {
			$options = array('conditions' => array('Cardweeklylimit.' . $this->Cardweeklylimit->primaryKey => $id));
			$this->request->data = $this->Cardweeklylimit->find('first', $options);
		}
		
		$products = $this->Cardweeklylimit->Product->find('list');
		$cardtypes = $this->Cardweeklylimit->Cardtype->find('list');
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
		$this->Cardweeklylimit->id = $id;
		if (!$this->Cardweeklylimit->exists()) {
			throw new NotFoundException(__('Invalid Cardweeklylimit'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Cardweeklylimit->delete()) {
			$this->Session->setFlash(__('The Cardweeklylimit has been deleted.'));
		} else {
			$this->Session->setFlash(__('The Cardweeklylimit could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}*/
}
