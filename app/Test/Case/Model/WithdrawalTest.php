<?php
App::uses('Withdrawal', 'Model');

/**
 * Withdrawal Test Case
 *
 */
class WithdrawalTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.withdrawal',
		'app.transactiontype',
		'app.status',
		'app.cardstatus',
		'app.cardapplication',
		'app.user',
		'app.group',
		'app.groupsetting',
		'app.groupsettingscategory',
		'app.terminal',
		'app.transbalanceinquiry',
		'app.card',
		'app.cardtype',
		'app.currency',
		'app.cardholder',
		'app.transbillspayment',
		'app.partner',
		'app.postation',
		'app.branch',
		'app.atmstation',
		'app.transcashout',
		'app.transloadcash',
		'app.transpurchase',
		'app.transchangepin'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Withdrawal = ClassRegistry::init('Withdrawal');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Withdrawal);

		parent::tearDown();
	}

}
