<?php
App::uses('AppModel', 'Model');
/**
 * Branch Model
 *
 * @property Posdevice $Posdevice
 * @property Atmstation $Atmstation
 * @property Cardapplication $Cardapplication
 * @property Postation $Postation
 */
class Branch extends AppModel {
	
	public function beforeSave($options = array()){
		parent::beforeSave();
		
		if(empty($this->data['Branch']['registered'])){
			$this->data['Branch']['registered'] = date('Y-m-d');
		}
		
		if(empty($this->data['Branch']['modified'])){
			$this->data['Branch']['modified'] = date('Y-m-d h:i:s');	
		}
			
		return true;
	}
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'id'  => array(
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
				'message' => 'Branch id registered'
			)			
		),
		'name' => array(
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
				'message' => 'Branch already registered'
			)			
		),
		'posdevice_id' => array(
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
				'message' => 'Device already assigned'
			)			
		),
		'branchnumber' => array(
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
				'message' => 'BranchNumber already assigned'
			)			
		)
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Posdevice' => array(
			'className' => 'Posdevice',
			'foreignKey' => 'posdevice_id',
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
		'Atmstation' => array(
			'className' => 'Atmstation',
			'foreignKey' => 'branch_id',
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
		'Cardapplication' => array(
			'className' => 'Cardapplication',
			'foreignKey' => 'branch_id',
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
		'Postation' => array(
			'className' => 'Postation',
			'foreignKey' => 'branch_id',
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
