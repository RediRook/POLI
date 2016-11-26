<?php
App::uses('CaseTask', 'Model');

/**
 * CaseTask Test Case
 *
 */
class CaseTaskTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.case_task'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CaseTask = ClassRegistry::init('CaseTask');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CaseTask);

		parent::tearDown();
	}

}
