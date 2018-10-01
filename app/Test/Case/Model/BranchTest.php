<?php
App::uses('Branch', 'Model');

/**
 * Branch Test Case
 *
 */
class BranchTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.branch',
		'app.atmstation',
		'app.transbalanceinquiry',
		'app.transcashout',
		'app.transloadcash',
		'app.transpurchase',
		'app.cardapplication',
		'app.postation'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Branch = ClassRegistry::init('Branch');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Branch);

		parent::tearDown();
	}

}
