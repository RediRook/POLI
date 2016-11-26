<?php
/**
 * StaffFixture
 *
 */
class StaffFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'FirstName' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'latin1_bin', 'charset' => 'latin1'),
		'LastName' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'latin1_bin', 'charset' => 'latin1'),
		'Address' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'latin1_bin', 'charset' => 'latin1'),
		'Phone' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 20, 'collate' => 'latin1_bin', 'charset' => 'latin1'),
		'E-mail' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'latin1_bin', 'charset' => 'latin1'),
		'DateOfBirth' => array('type' => 'date', 'null' => true, 'default' => null),
		'users_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'unique'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'users_id' => array('column' => 'users_id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_bin', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'FirstName' => 'Lorem ipsum dolor sit amet',
			'LastName' => 'Lorem ipsum dolor sit amet',
			'Address' => 'Lorem ipsum dolor sit amet',
			'Phone' => 'Lorem ipsum dolor ',
			'E-mail' => 'Lorem ipsum dolor sit amet',
			'DateOfBirth' => '2013-05-04',
			'users_id' => 1
		),
	);

}
