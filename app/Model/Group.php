<?php
App::uses('AppModel', 'Model');
/**
 * Group Model
 *
 * @property Groupsetting $Groupsetting
 * @property User $User
 */
class Group extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
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
				'message' => 'This field is required',
			),
			'isUnique' => array(
				'rule' => array('isUnique'),
				'message' => 'This details already exists',
			),
		)/*,
		'description' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'This field is required',
			),
		),*/
	);
	
	public $hasMany = array(
		'Groupsetting' => array(
			'className' => 'Groupsetting',
			'foreignKey' => 'group_id',
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
			'foreignKey' => 'group_id',
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
		'Groupaccess' => array(
			'className' => 'Groupaccess',
			'foreignKey' => 'group_id',
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
