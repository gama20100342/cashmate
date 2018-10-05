<?php
App::uses('AppModel', 'Model');
/**
 * Groupsetting Model
 *
 * @property Group $Group
 * @property Groupsettingscategory $Groupsettingscategory
 * @property Status $Status
 */
class Groupsetting extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public function beforeSave($options = array()){
		parent::beforeSave();
		return true;
	}
	
	public function checkUnique($ignoreDate, $fields, $or = true){
		return $this->isUnique($fields, $or);
	}

	public $validate = array(
		'name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'This field is required',
			)
		),
		/*'group_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'This field is required',
			),
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'This field is required',
			),
		),*/
		'controller' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'This field is required',
			),			
		),
		'action' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'This field is required',
			),
		),
		'groupsettingscategory_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'This field is required',
			),
		),
		'status_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'This field is required',
			),
		),
	);

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Group' => array(
			'className' => 'Group',
			'foreignKey' => 'group_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Groupsettingscategory' => array(
			'className' => 'Groupsettingscategory',
			'foreignKey' => 'groupsettingscategory_id',
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
}
