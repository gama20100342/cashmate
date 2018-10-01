<?php
App::uses('Groupmenu', 'Model');

/**
 * Groupmenu Test Case
 *
 */
class GroupmenuTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.groupmenu',
		'app.groupaccess',
		'app.group',
		'app.groupsetting',
		'app.groupsettingscategory',
		'app.status',
		'app.cardstatus',
		'app.cardapplication',
		'app.user',
		'app.terminal',
		'app.transbalanceinquiry',
		'app.transactiontype',
		'app.transbillspayment',
		'app.card',
		'app.product',
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
		'app.cardtype',
		'app.currency',
		'app.cardno',
		'app.partner',
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
		$this->Groupmenu = ClassRegistry::init('Groupmenu');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Groupmenu);

		parent::tearDown();
	}

}
