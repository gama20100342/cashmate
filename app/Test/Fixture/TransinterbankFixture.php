<?php
/**
 * TransinterbankFixture
 *
 */
class TransinterbankFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'card_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'cardno' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 20, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'cardholder_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'account_name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'trace_number' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 20, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'transaction_type' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 10, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'processing_code' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 15, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'channels' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 3, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'acquirer_institution' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 15, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'response' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 15, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'transaction_amount' => array('type' => 'decimal', 'null' => false, 'default' => null, 'length' => '12,2', 'unsigned' => false),
		'service_charge' => array('type' => 'decimal', 'null' => false, 'default' => null, 'length' => '12,2', 'unsigned' => false),
		'transdate' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'terminal_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'deviceno' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 10, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'trans_cardnumber' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 20, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'receiving_accountno' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 20, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'status' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 15, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'username' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 15, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
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
			'card_id' => 1,
			'cardno' => 'Lorem ipsum dolor ',
			'cardholder_id' => 1,
			'account_name' => 'Lorem ipsum dolor sit amet',
			'trace_number' => 'Lorem ipsum dolor ',
			'transaction_type' => 'Lorem ip',
			'processing_code' => 'Lorem ipsum d',
			'channels' => 'L',
			'acquirer_institution' => 'Lorem ipsum d',
			'response' => 'Lorem ipsum d',
			'transaction_amount' => '',
			'service_charge' => '',
			'transdate' => '2018-09-15 13:53:01',
			'terminal_id' => 1,
			'deviceno' => 'Lorem ip',
			'trans_cardnumber' => 'Lorem ipsum dolor ',
			'receiving_accountno' => 'Lorem ipsum dolor ',
			'status' => 'Lorem ipsum d',
			'username' => 'Lorem ipsum d'
		),
	);

}
