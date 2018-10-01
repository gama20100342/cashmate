<?php
App::uses('Groupsettingscategory', 'Model');

/**
 * Groupsettingscategory Test Case
 *
 */
class GroupsettingscategoryTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.groupsettingscategory',
		'app.groupsetting',
		'app.group',
		'app.user',
		'app.status'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Groupsettingscategory = ClassRegistry::init('Groupsettingscategory');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Groupsettingscategory);

		parent::tearDown();
	}

}
