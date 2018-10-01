<?php
App::uses('AppModel', 'Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');
/**
 * User Model
 *
 * @property Group $Group
 * @property Terminal $Terminal
 * @property Cardapplication $Cardapplication
 * @property Transchangepin $Transchangepin
 * @property Transloadcash $Transloadcash
 * @property Transpurchase $Transpurchase
 */
class User extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */

	public function beforeSave($options = array()){
		parent::beforeSave();

		$passHash = new BlowfishPasswordHasher();

		if(isset($this->data['User']['password']) && !empty(($this->data['User']['password']))){
			$this->data['User']['password'] = $passHash->hash($this->data['User']['password']);
		}
		
		if(isset($this->data['User']['new_password']) && !empty(($this->data['User']['new_password']))){
			$this->data['User']['password'] = $passHash->hash($this->data['User']['new_password']);
		}
		
		if(isset($this->data['User']['contact_no'])){
			$this->data['User']['contact_no'] = "+63" . $this->data['User']['contact_no'];
		}

		return true;
	}

	public $virtualFields = array(
		'name' => 'CONCAT(User.firstname, " ",User.middlename," ",User.lastname)'
	);

	public $validate = array(
		'username' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Required',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'isUnique' =>array(
				'rule' 		=> array('isUnique'),
				'message' 	=> 'This username is already is use'
			)
			
		),
		'email' => array(
			'required' => array(
				'rule' => array('email'),
				'message' => 'Kindly provide your email for verification.'
			),
			'maxLength' => array(
				'rule' => array('maxLength', 255),
				'message' => 'Email cannot be more than 255 characters.'
			),
			'unique' => array(
				'rule' => 'isUnique',
				'message' => 'Provided Email already exists.'
			)
		),
		'firstname' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Requried',				
			)
		),
		'middlename' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Requried',				
			)
		),
		'lastname' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Requried',				
			)
		),
		'contact_no' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Requried',				
			),
			'isUnique' =>array(
				'rule' 		=> array('isUnique'),
				'message' 	=> 'This number is already is use'
			)
		),
		'group_id' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Requried',				
			),
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Invalid detail',				
			)
		)/*,
		'terminal_id' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Requried',				
			),
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Invalid detail',				
			)
		)*/
	);

	public $belongsTo = array(
		'Group' => array(
			'className' => 'Group',
			'foreignKey' => 'group_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Terminal' => array(
			'className' => 'Terminal',
			'foreignKey' => 'terminal_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Status' => array(
			'className' => 'Status',
			'foreignKey' => 'status_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Userattempt' => array(
			'className' => 'Userattempt',
			'foreignKey' => 'user_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Passwordhistory' => array(
			'className' => 'Passwordhistory',
			'foreignKey' => 'user_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		/*'Cardapplication' => array(
			'className' => 'Cardapplication',
			'foreignKey' => 'user_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),*/
		'Transchangepin' => array(
			'className' => 'Transchangepin',
			'foreignKey' => 'username',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Transcashout' => array(
			'className' => 'Transcashout',
			'foreignKey' => 'username',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Transwithdrawal' => array(
			'className' => 'Transwithdrawal',
			'foreignKey' => 'username',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),		
		'Transloadcash' => array(
			'className' => 'Transloadcash',
			'foreignKey' => 'username',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Transpurchase' => array(
			'className' => 'Transpurchase',
			'foreignKey' => 'username',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Transbillspayment' => array(
			'className' => 'Transbillspayment',
			'foreignKey' => 'username',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);
	
	public $hasOne = array(
		'Useravatar' => array(
			'className' => 'Useravatar',
			'foreignKey' => 'user_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
