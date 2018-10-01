<?php
App::uses('Transbalanceinquiry', 'Model');

/**
 * Transbalanceinquiry Test Case
 *
 */
class TransbalanceinquiryTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.transbalanceinquiry',
		'app.transactiontype',
		'app.status',
		'app.cardstatus',
		'app.cardapplication',
		'app.user',
		'app.branch',
		'app.atmstation',
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
		'app.terminal'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Transbalanceinquiry = ClassRegistry::init('Transbalanceinquiry');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Transbalanceinquiry);

		parent::tearDown();
	}

}
