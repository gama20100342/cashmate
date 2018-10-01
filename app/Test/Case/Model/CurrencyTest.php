<?php
App::uses('Currency', 'Model');

/**
 * Currency Test Case
 *
 */
class CurrencyTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.currency',
		'app.card',
		'app.cardapplication',
		'app.cardstatus',
		'app.status',
		'app.user',
		'app.branch',
		'app.atmstation',
		'app.transbalanceinquiry',
		'app.transcashout',
		'app.transloadcash',
		'app.transpurchase',
		'app.postation',
		'app.cardtype',
		'app.cardholder',
		'app.transbillspayment',
		'app.transchangepin',
		'app.withdrawal'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Currency = ClassRegistry::init('Currency');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Currency);

		parent::tearDown();
	}

}
