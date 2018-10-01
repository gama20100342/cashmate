<?php
App::uses('Cardno', 'Model');

/**
 * Cardno Test Case
 *
 */
class CardnoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.cardno'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Cardno = ClassRegistry::init('Cardno');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Cardno);

		parent::tearDown();
	}

}
