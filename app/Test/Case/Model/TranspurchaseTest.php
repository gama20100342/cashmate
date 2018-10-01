<?php
App::uses('Transpurchase', 'Model');

/**
 * Transpurchase Test Case
 *
 */
class TranspurchaseTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.transpurchase',
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
		'app.transloadcash',
		'app.postation',
		'app.withdrawal',
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
		$this->Transpurchase = ClassRegistry::init('Transpurchase');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Transpurchase);

		parent::tearDown();
	}

}
