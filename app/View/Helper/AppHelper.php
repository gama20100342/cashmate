<?php
/**
 * Application level View Helper
 *
 * This file is application-wide helper file. You can put all
 * application-wide helper-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Helper
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Helper', 'View');

/**
 * Application helper
 *
 * Add your application-wide methods in the class below, your helpers
 * will inherit them.
 *
 * @package       app.View.Helper
 */


class AppHelper extends Helper {

    public $helpers = array('Html', 'Form');
	
	public function alignData($label, $data, $left=null, $right=null){
		
		if(empty($left)){
			$left = 'col-md-4 nopadding-left';
		}
		
		if(empty($right)){
			$right = 'col-md-8 nopadding-right';
		}
		
		return '<div class="'.$left.'">'.$label.'</div><div class="'.$right.' bold">'.$data.'</div><div class="clear"></div>';
	}
	
	public function showStatus($stat){
		$strings = array(
			"0" => '<span class="text-danger">For Approval</span>',
			"1" => '<span class="text-success">Approved</span>'
		);
		
		return $strings[$stat];
	}
	
	public function raquo(){
		return '&nbsp;<i class="fas fa-angle-double-right fa-lg"></i>&nbsp;';
	}
	
	public function CommonBreadcrumbs($slinks){
		$str = '';
		$str .='<div class="col-md-12 p-t-10 p-b-10 fs-10">';
		if(count($slinks) > 1){
			$i = 0;
			foreach($slinks as $key => $l):
			$i++;
				if(count($slinks)==$i){
					$str .= $l;
				}else{
					$str .= $l .' <i class="fas fa-angle-double-right fa-lg"></i> ';
				}
			endforeach;
		}else{
			$str .= $slinks;
		}
		$str .='</div>';
		
		return $str;
	}
	
	public function ShowNormaLink($text, $controller=null, $action=null){
		if(!empty($controller) && !empty($action)){
			return $this->Html->link($text, array('controller' => $controller, 'action' => $action), array('escape' => false, 'class' => 'text-success'));
		}else{
			return '<span class="text-success">'.$text.'</span>';
		}

	}
	
    public function showUserPicture($image, $size_class, $opt_class){
        
        if(isset($image) && !empty($image)){
            //$user_image = $this->Html->image($image, array('class' => 'img-'.$size_class.' '.$opt_class));
			$user_image = '<img src="'.$image.'" class="img-'.$size_class.' '.$opt_class.'" />'; 
        }else{            
            $user_image =  '<div class="user-no-pics-'.$size_class.' '.$opt_class.' bg-666"></div>';
        }

        return $user_image;
    }


    public function CommonHeader($text=null, $btn=null){

		$str = '';    
        $str .= '<legend class="fs-11">';
					$str .='<div class="text-default pull-left">'.$text.'</div>';
					if(isset($btn) && !empty($btn)):
						$str .='<div class="pull-right">'.$btn.'</div><div class="clear"></div>';
					endif;
		$str .='</legend>';
		$str .= '<div class="clear"></div>';		
		return $str;
    }
	
	/* public function CommonHeader($text=null, $bcs=null, $ctr=null){

		$blink = '';
		if(isset($bcs) && !empty($bcs)){
			$blink .='<span class="pull-right">';			
			//if(count($bcs[0]) > 2){
				foreach($bcs[0] as $vw):				
					if($vw=="/"){
						$blink .='<span> &raquo; </span>';
					}else{
						//if(in_array(array("add", "edit"), $vw){							
							$blink .= $this->Html->link($vw, array('controller' => $ctr, 'action' => $vw), array('escape' => false)); 
						//}
					}
				endforeach;
				$blink .='</span>';
			//}
		}
		
		$str = '';
        //$str .= '<legend class="text-uppercase fs-11"><span class="text-default">'.$text.'</span> '.$blink.' </legend>';
        $str .= '<legend class="text-uppercase fs-11"><span class="text-default">'.$text.'</span></legend>';
		$str .= '<div class="clear"></div>';		
		return $str;
    }*/
	
	
	
	public function CommonHeaderWithButton($text=null, $btn=null){		
		$str = '';        
        $str .= '<legend class="fs-11 bg_gray nopadding-top nopadding-left nopadding-right">';
			//$str .='<span class="text-info p-head fs-10"><i class="fas fa-info-circle"></i> '.$text.'</span>';
			if(isset($btn) && !empty($btn)):
				//$str .='<div class="btn-group pull-right">'.$btn.'</div><div class="clear"></div>';
				$str .= $btn.'<div class="clear"></div>';
			endif;
		$str .='</legend>';						
		return $str;
    }
	
    /*---------------------
    |FORM AND BUTTONS
    ---------------------*/
    public function Showbutton($name, $opt_class, $ctrl, $actn, $icon=null, $param1=null, $param2=null, $param3=null){
	   $icon 	= isset($icon) && !empty($icon) ? $icon : 'reply';	 
	   if($icon=="plus"){
		$icon = 'plus-circle';	
	   }
       $btn 	= $this->Html->link('<i class="fas fa-'.$icon.' fa-lg"></i> '.$name, array('controller' => $ctrl, 'action' => (empty($actn) ? 'index' : $actn), $param1, $param2, $param3), array('class' => 'btn btn-sm '.$opt_class, 'escape' => false));       
       return $btn;
    }
	
	public function ShowbuttonAjax($name, $opt_class, $icon=null, $url){
	   $icon 	= isset($icon) && !empty($icon) ? $icon : 'reply';	   
       //$btn 	= $this->Html->link('<i class="fas fa-'.$icon.' fa-lg"></i> '.$name, '#', array('url' => $url, 'class' => 'm-b-5 btn btn-sm '.$opt_class, 'escape' => false));       
	   $btn		= '<button type="button" url ="'.$url.'" class="m-b-5 btn btn-sm '.$opt_class.'"><i class="fas fa-'.$icon.' fa-lg"></i> '.$name.'</button>';
       return $btn;
    }
	
	
	public function ShowbuttonAjaxWithReport($name, $opt_class, $icon=null, $id, $url=null){
	   $icon 	= isset($icon) && !empty($icon) ? $icon : 'reply';	   
      // $btn 	= $this->Html->link('<i class="fas fa-'.$icon.' fa-lg"></i> ', '#', array('url' => $url, 'id' => $id, 'class' => 'm-b-5'.$opt_class, 'escape' => false));       
	  switch($icon){
		case "print": 
			$text = 'Print';
		break;
		case "file-pdf":
			$text = 'Download PDF';
		break;
		case "file-excel":
			$text = 'Download CSV';
		break;
	  }
       //$btn 	= $this->Html->link('<i class="fas fa-'.$icon.' fa-lg"></i> ', '#', array('url' => $url, 'id' => $id, 'class' => 'm-b-5'.$opt_class, 'escape' => false));       
       $btn 	= $this->Html->link('[ '.$text.' ]', '#', array('url' => $url, 'id' => $id, 'class' => 'm-b-5'.$opt_class, 'escape' => false));       
       return $btn;
    }
	
	

   
	
	 public function showForminputs($inputs, $vertical=false){
        $str = '';
		$align = !$vertical ? 'col-md-12' : 'col-md-4';
		
		
        foreach($inputs as $key => $input):
                
                    $label = (isset($input['label']) && !empty($input['label']) ? $input['label']  : false);
                    $type =  (isset($input['type']) && !empty($input['type']) ? $input['type']  : 'text');
					$align = (isset($input['wrapper']) && !empty($input['wrapper']) ? $input['wrapper'] : $align);
					
                    switch($type){
                        case "select":							
                            $str .=  $this->Form->input($input['input'], array(                    
                                'div' => 'input-wrap '.$align.' nopadding-left',
                                'type'  => 'select',
                                'label' => $label,
                                'id' => $input['input'],   
                                'disabled' => (isset($input['read-only']) &&  $input['read-only']) ? true : false,
                                'separator' => '',
								'default' => isset($input['selected']) && !empty($input['selected']) ? $input['selected'] : '',
                                'empty' => isset($input['empty']) && !$input['empty'] ? false : '--Choose',
                                'options' => isset($input['options']) && !empty($input['options']) ? $input['options'] : '',
                                'class' => 'noradius noshadow border-bottom text-left form-control comonkeypress input-md '.(isset($input['class']) && !empty(isset($input['class'])) ? $input['class'] : ''),
                                'after' => '<div class="clear"></div>'
                            ));
                        break;  
                        case "textarea":
                            $str .=  $this->Form->input($input['input'], array(                    
                                'div' => 'input-wrap '.$align.' nopadding-left',
                                'type'  => 'textarea',
                                'label' => $label,
                                'id' => $input['input'],       
                                'disabled' => (isset($input['read-only']) &&  $input['read-only']) ? true : false,            
                                'separator' => '',                            
                                'class' => 'noradius noshadow text-left form-control comonkeypress input-md '.(isset($input['class']) && !empty(isset($input['class'])) ? $input['class'] : ''),
                                'after' => '<div class="clear"></div>'
                            ));
							
							
                        break;                     
                        default:
                            //$str .='<div class="input-wrap '.$align.' nopadding-left '.((isset($input['class']) && $input['class']=="date") ? 'input-group input-with-addon' : '').'">';                            
                            $str .='<div class="input-wrap '.$align.' nopadding-left '.((isset($input['class']) && $input['class']=="date") ? ' input-with-addon' : '').'">';                            
                                $str .=  $this->Form->input($input['input'], array(                                                    
                                    'type'  => $type,
                                    'label' => $label,
                                    'id' => $input['input'],   
                                    'disabled' => (isset($input['read-only']) &&  $input['read-only']) ? true : false,                
                                    'separator' => '',
									'default' => isset($input['default']) && !empty($input['default']) ? $input['default'] : '',
                                    'placeholder' => isset($input['placeholder']) && !empty($input['placeholder']) ? $input['placeholder'] : '',
                                    'class' => 'noradius noshadow border-bottom text-left form-control comonkeypress input-md '.(isset($input['class']) && !empty(isset($input['class'])) ? $input['class'] : '')                                
                                ));
                            
                               /* if(isset($input['class']) && $input['class']=="date"){
                                    $str .='<span class="input-group-addon border-bottom"><i class="fas fa-calendar fa-lg cal"></i></span>';
                                }*/
								
								if(isset($input['note']) && !empty($input['note'])){
                                    $str .='<div class="fs-9 text-warning">'.$input['note'].'</div>';
                                }
                            $str .='</div>';
							
							
								
                        break;
						
                       
                    }
					
					if(isset($input['clear']) && $input['clear']=="1"){
						$str .='<div class="clear"></div>';
					}
        endforeach;

        return $str;
    }

    public function formEnd($label=null, $id=null, $type=null){
        $type = isset($type) && !empty($type) ? $type : 'button';
        $str    = '';
		$str 	.='<div class="clear"></div>';
		$str 	.='<div class="m-t-10"></div>';		
        $str    .='<button type="button" class="btn btn-success btnsave pull-right m-t-20 m-b-20" id="'.$id.'" form-id="'.$id.'"><i class="fas fa-save fa-lg"></i> '.$label.'</button>';        
        $str 	.='<div class="clear"></div>';
		$str    .='</form>';		
		$str 	.='<div class="clear"></div>';
		$str 	.='<div class="p-t-10"></div>';
        return $str;
    }
	
	public function formEndAjax($label=null, $formid=null, $url=null){
        $str    = '';
		$str 	.='<div class="clear"></div>';
		$str 	.='<div class="m-t-10 divseparator"></div>';		
        $str    .='<button type="button" class="btn btn-success btnajaxsubmit pull-right m-t-20 m-b-20" url="'.$url.'" form="'.$formid.'"><i class="fas fa-save fa-lg"></i> '.$label.'</button>';        
        $str    .='</form>';		
		$str 	.='<div class="clear"></div>';
		$str 	.='<div class="p-t-10"></div>';
        return $str;
    }
	

    public function pageLink($text, $controller, $action, $param1=null, $param2=null, $param3=null){
        $param1 = isset($param1) && !empty($param1) ? $param1 : '';
        $param2 = isset($param2) && !empty($param2) ? $param2 : '';
        $param3 = isset($param3) && !empty($param3) ? $param3 : '';

        return $this->Html->link($text, array('controller' => $controller, 'action' => $action, $param1, $param2, $param3), array('escape' => false, 'class' => 'cslink'));
    }
	
	public function reportLinkModal($text, $controller, $action){       
        return $this->Html->link($text, '#', array(
			'controller' 	=> $controller, 
			'action' 		=> $action, 
			'escape' 		=> false,
			'data-toggle'	=> 'modal',
			'data-url'		=> $this->webroot . $controller.'/'.$action,
			'data-title'	=> $text,
			'data-target'	=> '#_reports_date_modal'
		));
    }
	

    public function btnLink($text, $icon, $controller, $action, $param_1=null, $param_2=null, $param_3=null, $param_4=null, $param_5=null){
        switch($icon){
            case "edit": $icon  = 'edit'; break;
            case "view": $icon  = 'eye';break;
			case "approved": $icon  = 'check-circle';break;
            case "delete": $icon  = 'trash-alt';break;            
            default: $icon = $icon; break;
        }

        return $this->Html->link('<i class="fas fa-'.$icon.' fa-lg"></i>', 
            array(
				'controller' => $controller, 
				'action' => $action, 
				(isset($param_1) && !empty($param_1) ? $param_1 :''),
				(isset($param_2) && !empty($param_2) ? $param_2 :''),
				(isset($param_3) && !empty($param_3) ? $param_3 :''),
				(isset($param_4) && !empty($param_4) ? $param_4 :''),
				(isset($param_5) && !empty($param_5) ? $param_5 :''),
			), 
            array('escape' => false, 'title' => $text)
        );

    }

    public function tHead($headers, $tableid=null){		
        $str = '';
        $str .='<table id="'.(isset($tableid) && !empty($tableid) ? $tableid : 'tableid').'" class="table fs-11 display">';
        $str .='<thead><tr>';
			if(!empty($headers) && (count($headers) > 0)){
				foreach($headers as $h):
						if($h=="Action"){
							 $str .='<th class="text-left text-violet" style="width: 8%;">'.ucwords($h).'</th>';
						}else{                   
							$str .='<th class="text-left text-violet">'.ucwords($h).'</th>';
						}
				endforeach;
			}
        $str .='</tr></thead><tbody>';
        return $str;
    }
	
	 public function tHeadNormal($headers, $tableid=null){		
        $str = '';
        $str .='<table class="table fs-11 table-bordered">';
        $str .='<thead><tr>';
            foreach($headers as $h):
					if($h=="Action"){
						 $str .='<th class="text-left text-violet" style="width: 8%;">'.ucwords($h).'</th>';
					}else{                   
						$str .='<th class="text-left text-violet">'.ucwords($h).'</th>';
					}
            endforeach;
        $str .='</tr></thead><tbody>';
        return $str;
    }
	
	
	/* public function tHead($headers, $normal=false, $tableid = null, $noborder=false){
		
		if(empty($tableid)){
			$tableid = 'tableid';			
		}
		
		if($noborder){
			$noborder = 'datatable_defaul_noborder';
		}else{
			$noborder = 'datatable_default';
		}
		
        $str = '';
        $str .='<table id="'.$tableid.'" class="fs-11 '.$noborder.' table commontable'.(($normal) ? 'table' : '').'">';
        $str .='<thead><tr>';
            foreach($headers as $h):
                    $str .='<th class="text-left">'.ucwords($h).'</th>';
            endforeach;
        $str .='</tr></thead><tbody>';
        return $str;
    }*/
	
	
	public function tFFoot($headers=null){			
        $str = '';      
		if(!empty($headers)){
			/*$str .='</tbody><tfoot><tr>';
				foreach($headers as $h):
						$str .='<th class="text-left text-violet">'.ucwords($h).'</th>';
				endforeach;
			$str .='</tr></tfoot></table><div class="clear"></div><div class="m-t-20"></div>';
			*/
			
			$str .='</tbody></table><div class="clear"></div><div class="m-t-20"></div>';
		}else{
			$str .='</tbody></table><div class="clear"></div><div class="m-t-20"></div>';	
		}
        return $str;
    }

    public function tFoot(){        
        $str  = '</tbody></table>';
		$str .='<div class="clear"></div>';
        $str .='<div id="table_page_Info_search" class="p-b-10"></div>';
		$str .='<div class="clear"></div>';
        return $str;
    }
	

	
	public function getTheDateAfter($after, $date){
		//return strtotime(date('Y-m-d', strtotime(date('Y-m-d'))) ." +30 days");
		$date = new DateTime($date);
		$date->modify($after);
		return $date->format("Y-m-d");
	}
	
	public function formatSequence($no){
		return str_pad($no, 6, "0", STR_PAD_LEFT);
	}
	
	public function formatSeq($no, $limit){
		return str_pad($no, $limit, "0", STR_PAD_LEFT);
	}
	
	public function showHolderStatusAction($stat, $holder_ref, $holder_id){
		
		$btn = '';
					
		switch($stat){
			case "1":
				/*
				Active 1 
				 - Deactivate 3 
				 */
				
					$btn .= $this->ShowbuttonAjax(
							'Deactivate', 
							'btn btn-violet pull-left m-l-3 m-r-3 fs-9 holder_status', 						
							'times',
							$this->webroot.'cardholders/updateCardStatus/2/'.$holder_ref.'/'.$holder_id.'/2'
						);
					
						/*$btn .= $this->ShowbuttonAjax(
							'Reject', 
							'btn btn-violet pull-left m-l-3 m-r-3 fs-9 holder_status', 						
							'times',
							$this->webroot.'cardholders/updateCardStatus/5/'.$holder_ref.'/'.$holder_id.'/1'
						);*/
						
				
			break;
			case "2":
				/* 
					- Inactive					
				*/
					/*$btn .= $this->ShowbuttonAjax(
							'Deactivate', 
							'btn btn-violet pull-left fs-9 m-l-3 m-r-3 holder_status', 						
							'eye-slash',
							$this->webroot.'cardholders/updateCardStatus/3/'.$holder_ref.'/'.$holder_id.'/1'
						);
						
					$btn .= $this->ShowbuttonAjax(
							'Block', 
							'btn btn-violet pull-left m-l-3 m-r-3 fs-9 holder_status', 						
							'times',
							$this->webroot.'cardholders/updateCardStatus/6/'.$holder_ref.'/'.$holder_id.'/1'
						);*/
						
					$btn .= $this->ShowbuttonAjax(
							'Activate', 
							'btn btn-violet pull-left m-l-3 m-r-3 fs-9 holder_status', 						
							'check',
							$this->webroot.'cardholders/updateCardStatus/1/'.$holder_ref.'/'.$holder_id.'/1'
						);
						
			break;
			case "3":
					$btn .= $this->ShowbuttonAjax(
							'Activate', 
							'btn btn-violet pull-left m-l-3 m-r-3 fs-9 holder_status', 						
							'check',
							$this->webroot.'cardholders/updateCardStatus/1/'.$holder_ref.'/'.$holder_id.'/1'
						);
			break;
			
			//case "6":			
				/*inactive 3
					- activate 2
				*/
				
				/*$btn .= $this->ShowbuttonAjax(
							'Activate', 
							'btn btn-violet pull-left m-l-3 m-r-3 fs-9 holder_status', 						
							'eye',
							$this->webroot.'cardholders/updateCardStatus/2/'.$holder_ref.'/'.$holder_id.'/1'
						);
						
			break;
			case "4":
				/* pending 4
				 - approved 1
				 - reject 5
				*/
				/*$btn .= $this->ShowbuttonAjax(
							'Approved', 
							'btn btn-violet pull-left m-l-3 m-r-3 fs-9 holder_status', 						
							'check',
							$this->webroot.'cardholders/updateCardStatus/1/'.$holder_ref.'/'.$holder_id.'/1'
						);
				
				/*$btn .= $this->ShowbuttonAjax(
							'Reject', 
							'btn btn-violet pull-left m-l-3 m-r-3 fs-9 holder_status', 						
							'times',
							$this->webroot.'cardholders/updateCardStatus/5/'.$holder_ref.'/'.$holder_id.'/1'
						);*/
						
			//break;
			
		}
		

		return $btn;
	}
	
	public function showUserStatusAction($stat, $holder_ref, $holder_id){
		
		/*-----------
		1 - Active
		2 - Pending
		3 - Canceled
		4 - Blocked
		-----------*/				
		$btn = '';
					
		switch($stat){
			
			case "1":
				/* active 2
					- deactivate 3
					- block 6
				*/
					/*$btn .= $this->ShowbuttonAjax(
							'Deactivate', 
							'btn btn-violet fs-9 m-l-3 m-t-5 holder_status', 						
							'eye-slash',
							$this->webroot.'users/updateStatus/4/'.$holder_ref.'/'.$holder_id.'/1'
						);*/
						
					$btn .= $this->ShowbuttonAjax(
							'Block', 
							'btn btn-violet m-l-3 fs-10 holder_status', 						
							'times',
							$this->webroot.'users/updateStatus/4/'.$holder_ref.'/'.$holder_id.'/1'
						);
						
			break;
			case "2":
			case "3":
			/*inactive 3
					- activate 2
				*/
				
				$btn .= $this->ShowbuttonAjax(
							'Activate', 
							'btn btn-violet m-l-3 fs-10 holder_status', 						
							'check',
							$this->webroot.'users/updateStatus/1/'.$holder_ref.'/'.$holder_id.'/1'
						);
			break;
			case "4":			
				/*inactive 3
					- activate 2
				*/
				
				$btn .= $this->ShowbuttonAjax(
							'Unlock', 
							'btn btn-violet m-l-3 fs-10 holder_status', 						
							'check',
							$this->webroot.'users/updateStatus/1/'.$holder_ref.'/'.$holder_id.'/1'
						);
						
			break;
		
			
		}
		

		return $btn;
	}
	
	
	
	public function calculateAge($dob=null){
		$age = 0;
		if(isset($dob) && !empty($dob)){
			$birthdate = new DateTime($dob);
			$today   = new DateTime('today');
			$age = $birthdate->diff($today)->y;			
		}
		
		return $age;
	}
	
	public function registrationLink($step=null){
		
		$str ='<ul class="steps nopadding nomargin">
		  <li class="'.(isset($step) && $step=="1" ? 'current' : '').'">
			<a href="#" title="">
				<em class="fs-10">Step 1</em>
				<span class="fs-12 bold">Customer Information</span>
			</a>
		  </li>
		 <li class="'.(isset($step) && $step=="2" ? 'current' : '').'">
			<a href="#" title="">
				<em class="fs-10">Step 2</em>
				<span class="fs-12 bold">Scan & Upload ID</span>
			</a>
		  </li>

		</ul>';
		/*
		<li class="'.(isset($step) && $step=="3" ? 'current' : '').'">
			<a href="#" title="">
				<em class="fs-10">Step 3</em>
				<span class="fs-12 bold">Link Card</span>
			</a>
		  </li>*/
		  
		return $str;

	}
	
	
	public function report_tHeader($headers = array()){
		$str = $this->tHead($headers);				
		$str .= $this->tFoot();
		return $str;
	}
	
	public function exportButton($file_type=null, $controller=null){
		
		switch($file_type){
			case "pdf":
				$icon 	= 'file-pdf';
				$class 	= '_pdf_res';
				$text 	= 'Save as PDF';
				$url	= $this->webroot . $controller .'/generate_pdf_report';
			break;
			case "csv":
				$icon 	= 'file-excel';
				$class 	= '_csv_res';
				$text 	= 'Save as CSV';
				$url	= $this->webroot . $controller .'/generate_csv_report';
			break;
			case "print":
				$icon 	= 'print';
				$class 	= '_print_res';
				$text 	= 'Print';
				$url	= '';
			break;
		}
					
		return $this->ShowbuttonAjaxWithReport(
						$text,
						'btn-violet pull-left fs-11 text-violet m-l-5', 						
						$icon,						
						$class,
						$url
					);
	}
	
	public function exportButtonWithStatus($file_type=null, $controller=null, $status=null){
		
		switch($file_type){
			case "pdf":
				$icon 	= 'file-pdf';
				$class 	= '_pdf_res';
				$text 	= 'Save as PDF';
				$url	= $this->webroot . $controller .'/generate_pdf_report/'.$status;
			break;
			case "csv":
				$icon 	= 'file-excel';
				$class 	= '_csv_res';
				$text 	= 'Save as CSV';
				$url	= $this->webroot . $controller .'/generate_csv_report/'.$status;
			break;
			case "print":
				$icon 	= 'print';
				$class 	= '_print_res';
				$text 	= 'Print';
				$url	= '';
			break;
		}
					
		return $this->ShowbuttonAjaxWithReport(
						$text,
						'btn-violet pull-left fs-11 text-violet m-l-5 '.$class, 						
						$icon,						
						$class.'_'.$status,
						$url
					);
	}
	
	public function modalViewLink($url=null, $tbl=null){
		/*
		data-toggle="modal"
				data-target="#_default_content_modal_"										
			*/
			
		$str = '<a href="#" 
				url="'.$url.'"
				title="View Item" 		
				tbl = "'.$tbl.'"
				class="fs-10 dc-link-modal nooutline viewmodal_link">
				<i class="fas fa-eye fa-lg"></i></a>';
		return $str;
	}
	
	
	public function modalEditLink($url=null, $tbl=null){
		/*
		data-toggle="modal"
				data-target="#_default_content_modal_"										
			*/
			
		$str = '<a href="#" 
				url="'.$url.'"
				title="View Item" 		
				tbl = "'.$tbl.'"
				class="fs-10 dc-link-modal nooutline viewmodal_link">
				<i class="fas fa-edit fa-lg"></i></a>';
		return $str;
	}
	
	public function modalViewLinkCustom($url=null, $text=null, $icon=null, $tbl=null, $_green=false){
		
		$icon = isset($icon) && !empty($icon) ? $icon : 'plus';
		$btn  = isset($_green) && $_green ? 'btn-success' : 'btn-violet';
		
		$str = '<a href="#" 
				url="'.$url.'"
				title="View Item" 		
				tbl = "'.$tbl.'"
				class="fs-10 nooutline viewmodal_link btn '.$btn.' btn-xs m-r-5">
				<i class="fas fa-'.$icon.' fa-lg"></i> '.$text.'</a>';
				
		return $str;
	}
	
	
	public function modalEditLinkRe($cnt, $act, $params){
		return $this->Html->link('<i class="fas fa-edit fa-lg"></i>', array(
			'controller' 	=> $cnt, 
			'action'		=> $act, $params
		), array(
			'escape' 	=> false,
			'title' 	=> "Make Changes", 
			'class'		=> "fs-10"
		));
	}
	

}
