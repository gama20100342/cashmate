<?php
App::uses('AppModel', 'Model');
/**
 * Posdevice Model
 *
 * @property Branch $Branch
 * @property Merchant $Merchant
 */
class Posdevice extends AppModel {
	
	public function beforeSave($options = array()){
		parent::beforeSave();
		return true;
	}
/**
 * Validation rules
 *
 * @var array
 */	
	/*public $virtualFields = array(
		'name' => 'CONCAT(Posdevice.model, " - ",Posdevice.imei)'
	);*/

	
	public $validate = array(
		'sn' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Required field',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'isUnique' => array(
				'rule' => array('isUnique'),
				'message' => 'IMEI number is already registered'
			)
		),
		'name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Required field',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'isUnique' => array(
				'rule' => array('isUnique'),
				'message' => 'Branch Name is already registered'
			)
		),
		'ip' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Required field',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'isUnique' => array(
				'rule' => array('isUnique'),
				'message' => 'IP Address is already registered'
			)
		),
		'imei' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Required fields',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'isUnique' => array(
				'rule' => array('isUnique'),
				'message' => 'IMEI is already registered'
			)
		),
		'status' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Required fields',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasOne = array(
		'Branch' => array(
			'className' => 'Branch',
			'foreignKey' => 'posdevice_id',
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
		'Merchant' => array(
			'className' => 'Merchant',
			'foreignKey' => 'posdevice_id',
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
