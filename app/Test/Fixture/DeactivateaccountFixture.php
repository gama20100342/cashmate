<?php
/**
 * DeactivateaccountFixture
 *
 */
class DeactivateaccountFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'cardholder_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'processed_date' => array('type' => 'date', 'null' => false, 'default' => null),
		'processed_by' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 35, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'cardholder_id' => 1,
			'processed_date' => '2018-09-27',
			'processed_by' => 'Lorem ipsum dolor sit amet'
		),
	);

}
