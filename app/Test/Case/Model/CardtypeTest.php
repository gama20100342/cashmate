<?php
App::uses('Cardtype', 'Model');

/**
 * Cardtype Test Case
 *
 */
class CardtypeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.cardtype',
		'app.status',
		'app.card',
		'app.cardapplication',
		'app.cardstatus',
		'app.user',
		'app.branch',
		'app.atmstation',
		'app.transbalanceinquiry',
		'app.transcashout',
		'app.transloadcash',
		'app.transpurchase',
		'app.postation',
		'app.currency',
		'app.cardholder',
		'app.transbillspayment',
		'app.transchangepin',
		'app.withdrawal'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Cardtype = ClassRegistry::init('Cardtype');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Cardtype);

		parent::tearDown();
	}

}
