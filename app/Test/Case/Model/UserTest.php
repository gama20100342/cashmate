<?php
App::uses('User', 'Model');

/**
 * User Test Case
 *
 */
class UserTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.user',
		'app.group',
		'app.groupsetting',
		'app.groupsettingscategory',
		'app.status',
		'app.cardstatus',
		'app.cardapplication',
		'app.branch',
		'app.atmstation',
		'app.transbalanceinquiry',
		'app.transactiontype',
		'app.transbillspayment',
		'app.card',
		'app.cardtype',
		'app.currency',
		'app.cardholder',
		'app.transcashout',
		'app.terminal',
		'app.transchangepin',
		'app.transloadcash',
		'app.postation',
		'app.transpurchase',
		'app.withdrawal',
		'app.partner'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->User = ClassRegistry::init('User');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->User);

		parent::tearDown();
	}

}
