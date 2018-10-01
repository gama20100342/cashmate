<?php
/**
 * CardannuallimitFixture
 *
 */
class CardannuallimitFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'product_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'cardtype_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'channel_atm' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 1, 'unsigned' => false),
		'channel_pos' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 1, 'unsigned' => false),
		'channel_bol' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 1, 'unsigned' => false),
		'min_withdrawalvalue' => array('type' => 'decimal', 'null' => true, 'default' => null, 'length' => '12,2', 'unsigned' => false),
		'min_withdrawalfee' => array('type' => 'decimal', 'null' => true, 'default' => null, 'length' => '12,2', 'unsigned' => false),
		'max_transvalue' => array('type' => 'decimal', 'null' => true, 'default' => null, 'length' => '12,2', 'unsigned' => false),
		'max_transfee' => array('type' => 'decimal', 'null' => true, 'default' => null, 'length' => '12,2', 'unsigned' => false),
		'total_withdrawalvalue' => array('type' => 'decimal', 'null' => true, 'default' => null, 'length' => '12,2', 'unsigned' => false),
		'total_withdrawalfee' => array('type' => 'decimal', 'null' => true, 'default' => null, 'length' => '12,2', 'unsigned' => false),
		'total_fundtransvalue' => array('type' => 'decimal', 'null' => true, 'default' => null, 'length' => '12,2', 'unsigned' => false),
		'total_fundtransfee' => array('type' => 'decimal', 'null' => true, 'default' => null, 'length' => '12,2', 'unsigned' => false),
		'min_loadingvalue' => array('type' => 'decimal', 'null' => true, 'default' => null, 'length' => '12,2', 'unsigned' => false),
		'min_loadingfee' => array('type' => 'decimal', 'null' => true, 'default' => null, 'length' => '12,2', 'unsigned' => false),
		'max_loadingvalue' => array('type' => 'decimal', 'null' => true, 'default' => null, 'length' => '12,2', 'unsigned' => false),
		'max_loadingfee' => array('type' => 'decimal', 'null' => true, 'default' => null, 'length' => '12,2', 'unsigned' => false),
		'added' => array('type' => 'date', 'null' => true, 'default' => null),
		'addedby' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'modified' => array('type' => 'date', 'null' => true, 'default' => null),
		'modifiedby' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
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
			'product_id' => 1,
			'cardtype_id' => 1,
			'channel_atm' => 1,
			'channel_pos' => 1,
			'channel_bol' => 1,
			'min_withdrawalvalue' => '',
			'min_withdrawalfee' => '',
			'max_transvalue' => '',
			'max_transfee' => '',
			'total_withdrawalvalue' => '',
			'total_withdrawalfee' => '',
			'total_fundtransvalue' => '',
			'total_fundtransfee' => '',
			'min_loadingvalue' => '',
			'min_loadingfee' => '',
			'max_loadingvalue' => '',
			'max_loadingfee' => '',
			'added' => '2018-09-11',
			'addedby' => 'Lorem ipsum dolor sit amet',
			'modified' => '2018-09-11',
			'modifiedby' => 'Lorem ipsum dolor sit amet'
		),
	);

}
