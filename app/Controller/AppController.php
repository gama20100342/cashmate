<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
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
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */

App::uses('Controller', 'Controller');

class AppController extends Controller {
    public $components = array(
        'Auth' => array(
            'loginRedirect' => array(
                'controller'    => 'cards',
                'action'        => 'dashboard'
            ),
            'logoutRedirect' => array(
                'controller'    => 'users',
                'action'        => 'login'            
            ),
            'authenticate' => array(
                'Form' => array(
                    'passwordHasher' => 'Blowfish'
                )
            ),
        'authorize' => array('Controller')
    ),    
    'Session',
    'RequestHandler',
    'Message',
	'Common'
	//'Breadcrumb'
   );

	public $helpers = array('Html', 'Form', 'Session', 'Time');
    
    public function beforeFilter(){
        $this->Auth->allow('*');    
		if($this->Auth->user('pass_expire') <= date('Y-m-d')){
			$allowed_action = array("changemypassword", "logout", "login");
			if(!in_array($this->params['action'], $allowed_action)){
			//if($this->params['action']!=="changemypassword" || $this->params['action']!=="logout"){			
				$this->Message->msgError("Your pasword has expired, you must change it right now");
				return $this->redirect(array('controller' => 'users', 'action' => 'changemypassword', $this->Auth->user('refid'), $this->Auth->user('id')));
			}
		}
		
			$group_access = $this->Auth->user('group_id');
			switch($group_access){
				case 1: //Super Administrator
					$this->layout = 'default';
				break;
				case 22: //Agent Branch - Branches 	
					$this->layout = 'agent-branch-branches';
				break;
				case 21: //Agent Branch - Central Unit 	
					$this->layout = 'agent-branch-central-unit';
				break;
				case 18: //BRB Branch - Officer 	
					$this->layout = 'brb-branch-officer';
				break;
				case 17: //BRB Branch - Staff 
					$this->layout = 'brb-branch-staff';
				break;
				case 20: //Card Management Department Officer 
					$this->layout = 'cmdo';
				break;
				case 19: // Card Production Department Officer 	
					$this->layout = 'cpdo';
				break;
				case 15: //Customer Care Officer 	
					$this->layout = 'customer-care-officer';
				break;
				case 16: //Customer Care Staff 	
					$this->layout = 'customer-care-staff';
				break;
				case 13: // System and Data Administrator Officer 
					$this->layout = 'sdao';
				break;
				case 14: //Technical and Technical Compliance Officer
					$this->layout = 'ttco';
				break;			
			}
			
		
					
    }
	
	
	/*
	public function beforeRender(){
		/*
		1 Super Administrator
		22 Agent Branch - Branches 	
		21 Agent Branch - Central Unit 	
		18 BRB Branch - Officer 	
		17 BRB Branch - Staff 	
		20 Card Management Department Officer 
		19 Card Production Department Officer 	
		15 Customer Care Officer 	
		16 Customer Care Staff 	
		1 Super Administrator 	
		13 System and Data Administrator Officer 
		14 Technical and Technical Compliance Officer*/
		
		/*$group_access = $this->Auth->user('group_id');
		switch($group_access){
			case 1: //Super Administrator
				$this->layout = 'default';
			break;
			case 22: //Agent Branch - Branches 	
				$this->layout = 'agent-branch-branches';
			break;
			case 21: //Agent Branch - Central Unit 	
				$this->layout = 'agent-branch-central-unit';
			break;
			case 18: //BRB Branch - Officer 	
				$this->layout = 'brb-branch-officer';
			break;
			case 17: //BRB Branch - Staff 
				$this->layout = 'brb-branch-staff';
			break;
			case 20: //Card Management Department Officer 
				$this->layout = 'cmdo';
			break;
			case 19: // Card Production Department Officer 	
				$this->layout = 'cpdo';
			break;
			case 15: //Customer Care Officer 	
				$this->layout = 'customer-care-officer';
			break;
			case 16: //Customer Care Staff 	
				$this->layout = 'customer-care-staff';
			break;
			case 13: // System and Data Administrator Officer 
				$this->layout = 'sdao';
			break;
			case 14: //Technical and Technical Compliance Officer
				$this->layout = 'ttco';
			break;			
		}
		
	}*/
	
    public function isAuthorized($user) {
       // if (isset($user['group_id']) && $user['group_id'] === '1') {
            return true;
        //}

       // return false;
    }
     
	 
	 

}

