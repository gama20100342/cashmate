<?php
App::uses('Cardholderstatus', 'Model');

/**
 * Cardholderstatus Test Case
 *
 */
class CardholderstatusTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.cardholderstatus'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Cardholderstatus = ClassRegistry::init('Cardholderstatus');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Cardholderstatus);

		parent::tearDown();
	}

}
