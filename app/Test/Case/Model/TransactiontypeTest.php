<?php
App::uses('Transactiontype', 'Model');

/**
 * Transactiontype Test Case
 *
 */
class TransactiontypeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.transactiontype',
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
		'app.groupsettingscategory'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Transactiontype = ClassRegistry::init('Transactiontype');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Transactiontype);

		parent::tearDown();
	}

}
