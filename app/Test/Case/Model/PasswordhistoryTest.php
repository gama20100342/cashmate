<?php
App::uses('Passwordhistory', 'Model');

/**
 * Passwordhistory Test Case
 *
 */
class PasswordhistoryTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.passwordhistory',
		'app.user',
		'app.group',
		'app.groupsetting',
		'app.groupsettingscategory',
		'app.status',
		'app.cardholder',
		'app.card',
		'app.cardapplication',
		'app.cardstatus',
		'app.branch',
		'app.atmstation',
		'app.transbalanceinquiry',
		'app.transactiontype',
		'app.transbillspayment',
		'app.partner',
		'app.terminal',
		'app.transcashout',
		'app.transchangepin',
		'app.transloadcash',
		'app.postation',
		'app.transpurchase',
		'app.withdrawal',
		'app.cardtype',
		'app.currency',
		'app.useravatar'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Passwordhistory = ClassRegistry::init('Passwordhistory');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Passwordhistory);

		parent::tearDown();
	}

}
