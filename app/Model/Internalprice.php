<?php
App::uses('AppModel', 'Model');
/**
 * Internalprice Model
 *
 */
class Internalprice extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'internal_price';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'title';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'title' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
}
