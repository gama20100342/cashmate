<?php
App::uses('Posdevice', 'Model');

/**
 * Posdevice Test Case
 *
 */
class PosdeviceTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.posdevice',
		'app.merchant'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Posdevice = ClassRegistry::init('Posdevice');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Posdevice);

		parent::tearDown();
	}

}
