<?php
App::uses('Transinterbank', 'Model');

/**
 * Transinterbank Test Case
 *
 */
class TransinterbankTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.transinterbank',
		'app.card',
		'app.cardapplication',
		'app.cardstatus',
		'app.status',
		'app.cardtype',
		'app.productlimit',
		'app.product',
		'app.carddailylimit',
		'app.cardweeklylimit',
		'app.cardmonthlylimit',
		'app.cardquarterlylimit',
		'app.cardsemiannuallimit',
		'app.cardyearlylimit',
		'app.groupsetting',
		'app.group',
		'app.user',
		'app.terminal',
		'app.branch',
		'app.posdevice',
		'app.merchant',
		'app.atmstation',
		'app.transbalanceinquiry',
		'app.cardholder',
		'app.cardholderstatus',
		'app.cardholderid',
		'app.transbillspayment',
		'app.transcashout',
		'app.transchangepin',
		'app.transloadcash',
		'app.transpurchase',
		'app.withdrawal',
		'app.transactiontype',
		'app.postation',
		'app.transwithdrawal',
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
		$this->Transinterbank = ClassRegistry::init('Transinterbank');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Transinterbank);

		parent::tearDown();
	}

}
