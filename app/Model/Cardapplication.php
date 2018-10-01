<?php
App::uses('AppModel', 'Model');
/**
 * Cardapplication Model
 *
 * @property Card $Card
 */
class Cardapplication extends AppModel {
	
	
	public function beforeSave($options=array()){
		parent::beforeSave();
		return true;
	}
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'refid' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'registration' => array(
			'date' => array(
				'rule' => array('date'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		)
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

		
/**
 * hasMany associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Cardholder' => array(
			'className' => 'Cardholder',
			'foreignKey' => 'refid',
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
		'Cardtype' => array(
			'className' => 'Cardtype',
			'foreignKey' => 'cardtype_id',
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
