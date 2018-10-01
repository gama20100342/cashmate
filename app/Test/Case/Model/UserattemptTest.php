<?php
App::uses('Userattempt', 'Model');

/**
 * Userattempt Test Case
 *
 */
class UserattemptTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.userattempt',
		'app.user',
		'app.group',
		'app.groupsetting',
		'app.groupsettingscategory',
		'app.status',
		'app.cardstatus',
		'app.cardapplication',
		'app.cardholder',
		'app.cardholderstatus',
		'app.card',
		'app.institution',
		'app.product',
		'app.carddailylimit',
		'app.cardtype',
		'app.productlimit',
		'app.cardweeklylimit',
		'app.cardmonthlylimit',
		'app.cardquarterlylimit',
		'app.cardsemiannuallimit',
		'app.cardyearlylimit',
		'app.transbillspayment',
		'app.terminal',
		'app.branch',
		'app.posdevice',
		'app.merchant',
		'app.atmstation',
		'app.transbalanceinquiry',
		'app.transcashout',
		'app.transloadcash',
		'app.transpurchase',
		'app.postation',
		'app.transchangepin',
		'app.transwithdrawal',
		'app.withdrawal',
		'app.transactiontype',
		'app.currency',
		'app.cardno',
		'app.cardholderid',
		'app.approvedaccount',
		'app.deactivateaccount',
		'app.groupaccess',
		'app.groupmenu',
		'app.useravatar',
		'app.passwordhistory'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Userattempt = ClassRegistry::init('Userattempt');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Userattempt);

		parent::tearDown();
	}

}
