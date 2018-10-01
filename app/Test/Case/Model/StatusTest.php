<?php
App::uses('Status', 'Model');

/**
 * Status Test Case
 *
 */
class StatusTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.status',
		'app.cardstatus',
		'app.cardapplication',
		'app.user',
		'app.branch',
		'app.atmstation',
		'app.transbalanceinquiry',
		'app.transcashout',
		'app.transloadcash',
		'app.transpurchase',
		'app.postation',
		'app.transbillspayment',
		'app.card',
		'app.cardtype',
		'app.currency',
		'app.cardholder',
		'app.transchangepin',
		'app.withdrawal',
		'app.groupsetting',
		'app.group',
		'app.groupsettingscategory',
		'app.transactiontype'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Status = ClassRegistry::init('Status');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Status);

		parent::tearDown();
	}

}
