<?php
App::uses('Cardstatus', 'Model');

/**
 * Cardstatus Test Case
 *
 */
class CardstatusTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.cardstatus',
		'app.status',
		'app.cardapplication',
		'app.user',
		'app.branch',
		'app.atmstation',
		'app.transbalanceinquiry',
		'app.transcashout',
		'app.transloadcash',
		'app.transpurchase',
		'app.postation',
		'app.card',
		'app.cardtype',
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
		$this->Cardstatus = ClassRegistry::init('Cardstatus');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Cardstatus);

		parent::tearDown();
	}

}
