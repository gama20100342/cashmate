<?php
App::uses('AppModel', 'Model');
/**
 * Terminal Model
 *
 * @property Transbalanceinquiry $Transbalanceinquiry
 * @property Transbillspayment $Transbillspayment
 * @property Transcashout $Transcashout
 * @property Transchangepin $Transchangepin
 * @property Transloadcash $Transloadcash
 * @property Transpurchase $Transpurchase
 * @property User $User
 * @property Withdrawal $Withdrawal
 */
class Terminal extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public function beforeSave($options = array()){
		parent::beforeSave();
		return true;
	}

	public $validate = array(
		'name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'alias' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
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
	public $hasMany = array(
		'Transbalanceinquiry' => array(
			'className' => 'Transbalanceinquiry',
			'foreignKey' => 'terminal_id',
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
			'foreignKey' => 'terminal_id',
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
			'foreignKey' => 'terminal_id',
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
			'foreignKey' => 'terminal_id',
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
			'foreignKey' => 'terminal_id',
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
			'foreignKey' => 'terminal_id',
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
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'terminal_id',
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
			'foreignKey' => 'terminal_id',
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
