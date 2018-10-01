<?php
App::uses('AppModel', 'Model');
/**
 * Cardholderstatus Model
 *
 */
class Cardholderstatus extends AppModel {
	
	
	public function beforeSave($options = array()){
		parent::beforeSave();
		return true;
	}
/**
 * Validation rules
 *
 * @var array
 */
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
	);
	
	
	public $hasMany = array(
		'Cardholder' => array(
			'className' => 'Cardholder',
			'foreignKey' => 'cardholderstatus_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => ''		
		)
	);
	
}
