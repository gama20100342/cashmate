<?php
App::uses('Useravatar', 'Model');

/**
 * Useravatar Test Case
 *
 */
class UseravatarTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.useravatar',
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
		'app.cardholder',
		'app.transcashout',
		'app.terminal',
		'app.transchangepin',
		'app.transloadcash',
		'app.postation',
		'app.transpurchase',
		'app.withdrawal',
		'app.cardtype',
		'app.currency',
		'app.partner'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Useravatar = ClassRegistry::init('Useravatar');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Useravatar);

		parent::tearDown();
	}

}
