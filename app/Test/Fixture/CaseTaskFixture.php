<?php
/**
 * CaseTaskFixture
 *
 */
class CaseTaskFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 12, 'key' => 'primary'),
		'clientcases_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 12, 'key' => 'index'),
		'research_tasks_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 12, 'key' => 'index'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'clientcases_id' => array('column' => 'clientcases_id', 'unique' => 0),
			'research_tasks_id' => array('column' => 'research_tasks_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'clientcases_id' => 1,
			'research_tasks_id' => 1
		),
	);

}
