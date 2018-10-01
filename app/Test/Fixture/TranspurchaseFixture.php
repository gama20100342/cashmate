<?php
/**
 * TranspurchaseFixture
 *
 */
class TranspurchaseFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'transactiontype_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 1, 'unsigned' => false),
		'transcode' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 35, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'card_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'cardholder_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'accountname' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'terminal_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 1, 'unsigned' => false),
		'transdate' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'remaining_balance' => array('type' => 'decimal', 'null' => false, 'default' => null, 'length' => '12,2', 'unsigned' => false),
		'total_amount' => array('type' => 'decimal', 'null' => false, 'default' => null, 'length' => '12,2', 'unsigned' => false),
		'current_balance' => array('type' => 'decimal', 'null' => false, 'default' => null, 'length' => '12,2', 'unsigned' => false),
		'postation_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'atmstation_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'status_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 1, 'unsigned' => false),
		'soa' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 20, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'ornumber' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 20, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
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
			'user_id' => 1,
			'card_id' => 1,
			'cardholder_id' => 1,
			'accountname' => 'Lorem ipsum dolor sit amet',
			'terminal_id' => 1,
			'transdate' => '2018-07-02 08:32:33',
			'remaining_balance' => '',
			'total_amount' => '',
			'current_balance' => '',
			'postation_id' => 1,
			'atmstation_id' => 1,
			'status_id' => 1,
			'soa' => 'Lorem ipsum dolor ',
			'ornumber' => 'Lorem ipsum dolor '
		),
	);

}
