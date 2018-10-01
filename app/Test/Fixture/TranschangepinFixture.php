<?php
/**
 * TranschangepinFixture
 *
 */
class TranschangepinFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'transactiontype_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 1, 'unsigned' => false),
		'transcode' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 35, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'card_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'cardholder_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'accountname' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'user_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'terminal_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'transdate' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'old_pin' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 6, 'unsigned' => false),
		'new_pin' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 6, 'unsigned' => false),
		'status_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 1, 'unsigned' => false),
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
			'transactiontype_id' => 1,
			'transcode' => 'Lorem ipsum dolor sit amet',
			'card_id' => 1,
			'cardholder_id' => 1,
			'accountname' => 'Lorem ipsum dolor sit amet',
			'user_id' => 1,
			'terminal_id' => 1,
			'transdate' => '2018-07-02 08:32:27',
			'old_pin' => 1,
			'new_pin' => 1,
			'status_id' => 1
		),
	);

}
