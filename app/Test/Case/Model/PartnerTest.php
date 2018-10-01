<?php
App::uses('Partner', 'Model');

/**
 * Partner Test Case
 *
 */
class PartnerTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.partner',
		'app.transbillspayment',
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
		'app.transcashout',
		'app.transchangepin',
		'app.transloadcash',
		'app.transpurchase',
		'app.withdrawal',
		'app.terminal',
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
		$this->Partner = ClassRegistry::init('Partner');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Partner);

		parent::tearDown();
	}

}
