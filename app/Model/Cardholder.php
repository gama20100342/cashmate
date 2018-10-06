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
				
		
		$this->data['Cardholder']['registration'] = date('Y-m-d H:i:s');
		
		/*if(!empty($this->data['Cardholder']['birthdate'])){
			$this->data['Cardholder']['birthdate'] = date('Y-m-d', strtotime($this->data['Cardholder']['birthdate']));
		}*/
		
		return true;
		
		
	}
	
	
	public $virtualFields = array(
		'pre_address' => 'CONCAT(
			Cardholder.pre_street_no, 
			" ",
			Cardholder.pre_street_name,
			" ",
			Cardholder.pre_subd_name,
			" ",
			Cardholder.pre_brgy,
			" ",
			Cardholder.pre_town_city,
			" ",
			Cardholder.pre_province,
			" ",
			Cardholder.pre_country
		)',
		'per_address' => 'CONCAT(
			Cardholder.per_street_no, 
			" ",
			Cardholder.per_street_name,
			" ",
			Cardholder.per_subd_name,
			" ",
			Cardholder.per_brgy,
			" ",
			Cardholder.per_town_city,
			" ",
			Cardholder.per_province,
			" ",
			Cardholder.per_country
		)'
	);
	

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
				'allowEmpty' => false
			),
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message'=> 'This field is required'
			)
		),
		
		'present_address' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message'=> 'This field is required'
			)
		),
		'pre_street_no' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message'=> 'This field is required'
			)
		),
		'pre_street_name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message'=> 'This field is required'
			)
		),
		'pre_subd_name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message'=> 'This field is required'
			)
		),
		'pre_brgy' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message'=> 'This field is required'
			)
		),
		'pre_town_city' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message'=> 'This field is required'
			)
		),
		'pre_street_name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message'=> 'This field is required'
			)
		),'pre_province' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message'=> 'This field is required'
			)
		),
		'pre_country' => array(
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
		),
		'institution_id' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message'=> 'This field is required'
			)
		),
		'product_id' => array(
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
		'Cardapplication' => array(
			'className' => 'Cardapplication',
			'foreignKey' => 'refid',
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
		),
		'Institution' => array(
			'className' => 'Institution',
			'foreignKey' => 'institution_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Product' => array(
			'className' => 'Product',
			'foreignKey' => 'product_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	

	public $hasMany = array(			
		'Approvedaccount' => array(
			'className' => 'Approvedaccount',
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
		'Deactivateaccount' => array(
			'className' => 'Deactivateaccount',
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
