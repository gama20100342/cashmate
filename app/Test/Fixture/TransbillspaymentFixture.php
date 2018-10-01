<?php
/**
 * TransbillspaymentFixture
 *
 */
class TransbillspaymentFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'transactiontype_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 3, 'unsigned' => false),
		'transcode' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 35, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'card_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'cardholder_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'accountname' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'partner_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 2, 'unsigned' => false),
		'terminal_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 1, 'unsigned' => false),
		'postation_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 3, 'unsigned' => false),
		'accountnumber' => array('type' => 'text', 'null' => true, 'default' => null, 'length' => 35),
		'transdate' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'remaining_balance' => array('type' => 'decimal', 'null' => false, 'default' => null, 'length' => '12,2', 'unsigned' => false),
		'amount_due' => array('type' => 'decimal', 'null' => false, 'default' => null, 'length' => '12,2', 'unsigned' => false),
		'customer_charge' => array('type' => 'decimal', 'null' => true, 'default' => null, 'length' => '12,2', 'unsigned' => false),
		'partner_charge' => array('type' => 'decimal', 'null' => true, 'default' => null, 'length' => '12,2', 'unsigned' => false),
		'total_amount' => array('type' => 'decimal', 'null' => false, 'default' => null, 'length' => '12,2', 'unsigned' => false),
		'status_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 1, 'unsigned' => false),
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
			'partner_id' => 1,
			'terminal_id' => 1,
			'postation_id' => 1,
			'accountnumber' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'transdate' => '2018-07-02 08:24:44',
			'remaining_balance' => '',
			'amount_due' => '',
			'customer_charge' => '',
			'partner_charge' => '',
			'total_amount' => '',
			'status_id' => 1
		),
	);

}
