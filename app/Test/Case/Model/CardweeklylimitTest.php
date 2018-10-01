<?php
App::uses('Cardweeklylimit', 'Model');

/**
 * Cardweeklylimit Test Case
 *
 */
class CardweeklylimitTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.cardweeklylimit',
		'app.product',
		'app.card',
		'app.cardapplication',
		'app.cardstatus',
		'app.status',
		'app.cardtype',
		'app.productlimit',
		'app.groupsetting',
		'app.group',
		'app.user',
		'app.terminal',
		'app.transbalanceinquiry',
		'app.transactiontype',
		'app.transbillspayment',
		'app.cardholder',
		'app.cardholderstatus',
		'app.cardholderid',
		'app.transcashout',
		'app.atmstation',
		'app.branch',
		'app.posdevice',
		'app.merchant',
		'app.postation',
		'app.transloadcash',
		'app.transpurchase',
		'app.transchangepin',
		'app.withdrawal',
		'app.partner',
		'app.useravatar',
		'app.passwordhistory',
		'app.groupaccess',
		'app.groupmenu',
		'app.groupsettingscategory',
		'app.currency',
		'app.cardno'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Cardweeklylimit = ClassRegistry::init('Cardweeklylimit');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Cardweeklylimit);

		parent::tearDown();
	}

}
