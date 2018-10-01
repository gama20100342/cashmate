<?php
App::uses('Cardholder', 'Model');

/**
 * Cardholder Test Case
 *
 */
class CardholderTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.cardholder',
		'app.card',
		'app.transbalanceinquiry',
		'app.transbillspayment',
		'app.transcashout',
		'app.transchangepin',
		'app.transloadcash',
		'app.transpurchase',
		'app.withdrawal'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Cardholder = ClassRegistry::init('Cardholder');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Cardholder);

		parent::tearDown();
	}

}
