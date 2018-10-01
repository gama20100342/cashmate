<?php
App::uses('Transcashout', 'Model');

/**
 * Transcashout Test Case
 *
 */
class TranscashoutTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.transcashout',
		'app.transactiontype',
		'app.status',
		'app.cardstatus',
		'app.cardapplication',
		'app.user',
		'app.branch',
		'app.atmstation',
		'app.transbalanceinquiry',
		'app.card',
		'app.cardtype',
		'app.currency',
		'app.cardholder',
		'app.transbillspayment',
		'app.partner',
		'app.terminal',
		'app.transchangepin',
		'app.transloadcash',
		'app.transpurchase',
		'app.withdrawal',
		'app.postation',
		'app.groupsetting',
		'app.group',
		'app.groupsettingscategory'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Transcashout = ClassRegistry::init('Transcashout');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Transcashout);

		parent::tearDown();
	}

}
