<?php
App::uses('Transchangepin', 'Model');

/**
 * Transchangepin Test Case
 *
 */
class TranschangepinTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.transchangepin',
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
		'app.transbillspayment',
		'app.partner',
		'app.terminal',
		'app.transcashout',
		'app.transloadcash',
		'app.transpurchase',
		'app.withdrawal',
		'app.postation',
		'app.groupsetting',
		'app.group',
		'app.groupsettingscategory'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Transchangepin = ClassRegistry::init('Transchangepin');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Transchangepin);

		parent::tearDown();
	}

}
