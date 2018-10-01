<?php
App::uses('Transbillspayment', 'Model');

/**
 * Transbillspayment Test Case
 *
 */
class TransbillspaymentTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.transbillspayment',
		'app.transactiontype',
		'app.status',
		'app.cardstatus',
		'app.cardapplication',
		'app.user',
		'app.branch',
		'app.atmstation',
		'app.transbalanceinquiry',
		'app.card',
		'app.cardtype',
		'app.currency',
		'app.cardholder',
		'app.transcashout',
		'app.transchangepin',
		'app.transloadcash',
		'app.transpurchase',
		'app.withdrawal',
		'app.terminal',
		'app.postation',
		'app.groupsetting',
		'app.group',
		'app.groupsettingscategory',
		'app.partner'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Transbillspayment = ClassRegistry::init('Transbillspayment');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Transbillspayment);

		parent::tearDown();
	}

}
