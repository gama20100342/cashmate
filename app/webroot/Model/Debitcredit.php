<?php
App::uses('AppModel', 'Model');
/**
 * Debitcredit Model
 *
 */
class Debitcredit extends AppModel {
	
	public function beforeSave($options = array()){
		parent::beforeSave();
		return true;
	}
}
