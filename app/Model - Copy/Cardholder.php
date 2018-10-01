<?php
App::uses('AppModel', 'Model');
/**
 * Cardholder Model
 *
 * @property Card $Card
 * @property Transbalanceinquiry $Transbalanceinquiry
 * @property Transbillspayment $Transbillspayment
 * @property Transcashout $Transcashout
 * @property Transchangepin $Transchangepin
 * @property Transloadcash $Transloadcash
 * @property Transpurchase $Transpurchase
 * @property Withdrawal $Withdrawal
 */
class Cardholder extends AppModel {

	public function beforeSave($options = array()){		
		if(!empty($this->data['Cardholder']['firstname']) && !empty($this->data['Cardholder']['middlename']) && !empty($this->data['Cardholder']['firstname'])){
			$this->data['Cardholder']['fullname'] = $this->data['Cardholder']['firstname'].' '.$this->data['Cardholder']['middlename'].' '.$this->data['Cardholder']['lastname'];
		}
				
		/*if(!empty($this->data['Cardholder']['birthdate'])){
			$this->data['Cardholder']['birthdate'] = date('Y-m-d', strtotime($this->data['Cardholder']['birthdate']));
		}*/
		
		return true;
		
		
	}

	//The Associations below have been created with all possible keys, those that are not needed can be removed

	public $validate = array(
		'firstname' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message'=> 'This field is required'
			)
		),
		'middlename' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message'=> 'This field is required'
			)
		),
		'lastname' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message'=> 'This field is required'
			)
		),
		'birthdate' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message'=> 'This field is required'
			)
		),
		'placeofbirth' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message'=> 'This field is required'
			)
		),
		
		'mothermaiden' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message'=> 'This field is required'
			)
		),
		'email_address' => array(
			'email' => array(
				'rule' => array('email'),
				'message'=> 'Invalid email address',
				'allowEmpty' => true
			)
		),
		
		'present_address' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message'=> 'This field is required'
			)
		),
		'contact_no' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message'=> 'This field is required'
			)
		),
		'nationality' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message'=> 'This field is required'
			)
		),
		'civil_status' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message'=> 'This field is required'
			)
		),
		'idpresented' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message'=> 'This field is required'
			)
		)
		/*,
		'tin' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message'=> 'This field is required'
			)
		)*/		
	);
/**
 * hasMany associations
 *
 * @var array
 */
	public $hasOne = array(
		'Card' => array(
			'className' => 'Card',
			'foreignKey' => 'cardholder_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Cardholderid' => array(
			'className' => 'Cardholderid',
			'foreignKey' => 'cardholder_id',
			'dependent' => true,
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
	
	
	public $belongsTo = array(
		/*'Status' => array(
			'className' => 'Status',
			'foreignKey' => 'status_id',
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
		'Cardholderstatus' => array(
			'className' => 'Cardholderstatus',
			'foreignKey' => 'cardholderstatus_id',
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
	
	public $hasMany = array(		
		/*'Card' => array(
			'className' => 'Card',
			'foreignKey' => 'cardholder_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),*/
		'Transbalanceinquiry' => array(
			'className' => 'Transbalanceinquiry',
			'foreignKey' => 'cardholder_id',
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
			'foreignKey' => 'cardholder_id',
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
			'foreignKey' => 'cardholder_id',
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
		'Transchangepin' => array(
			'className' => 'Transchangepin',
			'foreignKey' => 'cardholder_id',
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
			'foreignKey' => 'cardholder_id',
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
			'foreignKey' => 'cardholder_id',
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
		'Withdrawal' => array(
			'className' => 'Withdrawal',
			'foreignKey' => 'cardholder_id',
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
