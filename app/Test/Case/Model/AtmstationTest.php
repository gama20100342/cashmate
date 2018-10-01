<?php
App::uses('Atmstation', 'Model');

/**
 * Atmstation Test Case
 *
 */
class AtmstationTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.atmstation',
		'app.branch',
		'app.transbalanceinquiry',
		'app.transcashout',
		'app.transloadcash',
		'app.transpurchase'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Atmstation = ClassRegistry::init('Atmstation');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Atmstation);

		parent::tearDown();
	}

}
