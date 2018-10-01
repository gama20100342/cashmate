<?php
App::uses('Transloadcash', 'Model');

/**
 * Transloadcash Test Case
 *
 */
class TransloadcashTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.transloadcash',
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
		'app.transcashout',
		'app.transchangepin',
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
		$this->Transloadcash = ClassRegistry::init('Transloadcash');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Transloadcash);

		parent::tearDown();
	}

}
