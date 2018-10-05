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
class Cardholderid extends AppModel {

	public function beforeSave($options = array()){		
		
		return true;
		
	}
	

	public $validate = array(
		'cardholder_id' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message'=> 'This field is required'
			)
		),
		'path' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message'=> 'This field is required'
			)
		)	
	);
/**
 * hasMany associations
 *
 * @var array
 */
	
	
	public $belongsTo = array(
		
		'Cardholder' => array(
			'className' => 'Cardholder',
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
