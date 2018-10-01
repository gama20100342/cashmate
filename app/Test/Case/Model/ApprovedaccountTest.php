<?php
App::uses('Approvedaccount', 'Model');

/**
 * Approvedaccount Test Case
 *
 */
class ApprovedaccountTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.approvedaccount',
		'app.cardholder',
		'app.cardholderstatus',
		'app.card',
		'app.cardapplication',
		'app.cardtype',
		'app.status',
		'app.cardstatus',
		'app.groupsetting',
		'app.group',
		'app.user',
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
		'app.transbillspayment',
		'app.transchangepin',
		'app.transwithdrawal',
		'app.withdrawal',
		'app.transactiontype',
		'app.useravatar',
		'app.passwordhistory',
		'app.groupaccess',
		'app.groupmenu',
		'app.groupsettingscategory',
		'app.productlimit',
		'app.product',
		'app.carddailylimit',
		'app.cardweeklylimit',
		'app.cardmonthlylimit',
		'app.cardquarterlylimit',
		'app.cardsemiannuallimit',
		'app.cardyearlylimit',
		'app.currency',
		'app.cardno',
		'app.cardholderid'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Approvedaccount = ClassRegistry::init('Approvedaccount');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Approvedaccount);

		parent::tearDown();
	}

}
