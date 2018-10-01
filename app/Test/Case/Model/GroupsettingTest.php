<?php
App::uses('Groupsetting', 'Model');

/**
 * Groupsetting Test Case
 *
 */
class GroupsettingTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.groupsetting',
		'app.group',
		'app.user',
		'app.groupsettingscategory',
		'app.status'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Groupsetting = ClassRegistry::init('Groupsetting');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Groupsetting);

		parent::tearDown();
	}

}
