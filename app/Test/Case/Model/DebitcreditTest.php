<?php
App::uses('Debitcredit', 'Model');

/**
 * Debitcredit Test Case
 *
 */
class DebitcreditTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.debitcredit'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Debitcredit = ClassRegistry::init('Debitcredit');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Debitcredit);

		parent::tearDown();
	}

}
