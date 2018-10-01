<?php
App::uses('Nationality', 'Model');

/**
 * Nationality Test Case
 *
 */
class NationalityTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.nationality',
		'app.cardholder',
		'app.status',
		'app.cardstatus',
		'app.cardapplication',
		'app.user',
		'app.group',
		'app.groupsetting',
		'app.groupsettingscategory',
		'app.terminal',
		'app.transbalanceinquiry',
		'app.transactiontype',
		'app.transbillspayment',
		'app.card',
		'app.cardtype',
		'app.currency',
		'app.transcashout',
		'app.atmstation',
		'app.branch',
		'app.postation',
		'app.transloadcash',
		'app.transpurchase',
		'app.transchangepin',
		'app.withdrawal',
		'app.partner',
		'app.useravatar'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Nationality = ClassRegistry::init('Nationality');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Nationality);

		parent::tearDown();
	}

}
