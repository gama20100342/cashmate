<?php
App::uses('AppController', 'Controller');
App::uses('AuthComponent', 'Controller/Component');


/**
 * Cardholders Controller
 *
 * @property Cardholder $Cardholder
 * @property PaginatorComponent $Paginator
 */
class CardholderidsController extends AppController {

	public $components = array('Paginator', 'Upload');
	public $helpers = array('Lang');
	
	function beforeFilter(){	
		parent::beforeFilter();	
        $this->set('breadcrumbs', $this->Common->setBreadcrumb(isset($this->params['url']['url']) ? $this->params['url']['url'] : 'Home'));
		if($this->params['action']=="home"){
			return $this->redirect(array('action' => 'index'));
		}
    }
	
	
	private function getCardholderDetailsByRefid($refid){
		$this->Cardholderid->Cardholder->recursive = -2;
		$holder = $this->Carholderid->Cardholder->findByRefid($refid);
		
		if(!empty($holder)){
			return $holder;
		}else{
			return false;
		}
	}
	
	public function add($holderid = null, $refid=null, $status=null) {
		
		/*$holder = $this->getCardholderDetailsByRefid($refid);

		if(empty($holder) || !$holder){*/
		
		if(!$this->Cardholderid->Cardholder->exists($holderid)){
			throw new NotFoundException(__('Invalid cardholder'));	
		}
		
		$this->set('holderid', $holderid);
		$this->set('refid', $refid);
		$this->set('status', $status);
		
		if ($this->request->is('ajax')) {
			$this->layout = 'ajax';
			$this->autoRender = false;
			
			$response = array();
		
			if(isset($_FILES["userids"])){
				$error = $_FILES["userids"]["error"];						
				if($error){
					$response = array(
						"status" 	=> "failed",
						"message" 	=> "An error has occured during the upload. ". $error
					);
				}else{
									if(!is_array($_FILES["userids"]["name"])){
										$fileName 		= $_FILES["userids"];	
										$extension 		= pathinfo($fileName['name'], PATHINFO_EXTENSION);
										$new_file_name   = 'ID-'.$refid . date('hs');
									
										
										if($this->Upload->RenameandUpload($fileName, $new_file_name, $extension)){
											
												$this->Cardholderid->create();
												if($this->Cardholderid->save(
													array('Cardholderid' => array(
															'cardholder_id'			=> $holderid,
															'refid'					=> $refid,
															'path'					=> 'Uploads/'.date('Y').'/'.date('m').'/'.$new_file_name.'.'.$extension,																
													)
												))){
													$response = array(
														"status" 	=> "success",
														"message" 	=> "Card holder id successfully uploaded"
													);
													
												}else{
													$response = array(
														"status" 	=> "failed",
														"message" 	=> "Card holder id was not uploaded, please try again."
													);
												}
											
										}else{
											$response = array(
														"status" 	=> "failed",
														"message" 	=> "Unable to process your request, please try again."
													);
										}
									}	
				}
				
				
						
			}
			
			return json_encode($response);
			
		}
		
	}
	
	public function uploadId($holderid = null, $refid=null){
	
		$response = array();
		
		if(isset($_FILES["userids"])){
			$error = $_FILES["userids"]["error"];						
			if($error){
				$response = array(
					"status" 	=> "failed",
					"message" 	=> "An error has occured during the upload. ". $error
				);
			}else{
								if(!is_array($_FILES["userids"]["name"])){
									$fileName 		= $_FILES["userids"];	
									$extension 		= pathinfo($fileName['name'], PATHINFO_EXTENSION);
									$new_file_name   = 'ID-'.$refid . date('hs');
								
									
									if($this->Upload->RenameandUpload($fileName, $new_file_name, $extension)){
										
											$this->Cardholderid->create();
											if($this->Cardholderid->save(
												array('Cardholderid' => array(
														'cardholder_id'			=> $holderid,
														'refid'					=> $refid,
														'path'					=> 'Uploads/'.date('Y').'/'.date('m').'/'.$new_file_name.'.'.$extension,																
												)
											))){
												$response = array(
													"status" 	=> "success",
													"message" 	=> "Card holder id successfully uploaded"
												);
												
											}else{
												$response = array(
													"status" 	=> "failed",
													"message" 	=> "Card holder id was not uploaded, please try again."
												);
											}
										
									}else{
										$response = array(
													"status" 	=> "failed",
													"message" 	=> "Unable to process your request, please try again."
												);
									}
								}	
			}
			
			return json_encode($response);
					
		}
		
	}

}
