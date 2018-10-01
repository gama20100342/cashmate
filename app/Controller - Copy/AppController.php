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
    }
	
	
    public function isAuthorized($user) {
       // if (isset($user['group_id']) && $user['group_id'] === '1') {
            return true;
        //}

       // return false;
    }
     
	 
	 

}

