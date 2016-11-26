<?php
App::uses('AppModel', 'Model');
/**
 * SetFee Model
 *
 * @property Quote $Quote
 */
class SetFee extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'children_quantity' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Must be a positive number',
				//'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
            	'children_price' => array(
			'money' => array(
				'rule' => array('money'),
				'message' => 'Must be a positive number',
				//'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'children_total' => array(
			'money' => array(
				'rule' => array('money'),
				'message' => 'Must be a positive number',
				//'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'relatives_quantity' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Must be a positive number',
				//'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
            	'relatives_price' => array(
			'money' => array(
				'rule' => array('money'),
				'message' => 'Must be a positive number',
				//'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'relatives_total' => array(
			'money' => array(
				'rule' => array('money'),
				'message' => 'Must be a positive number',
				//'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'reg_birth_marriage_quantity' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Must be a positive number',
				//'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
            	'reg_birth_marriage_price' => array(
			'money' => array(
				'rule' => array('money'),
				'message' => 'Must be a positive number',
				//'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'reg_birth_marriage_total' => array(
			'money' => array(
				'rule' => array('money'),
				'message' => 'Must be a positive number',
				//'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'reg_birth_marriage_together_quantity' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Must be a positive number',
				//'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
            	'reg_birth_marriage_together_price' => array(
			'money' => array(
				'rule' => array('money'),
				'message' => 'Must be a positive number',
				//'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'reg_birth_marriage_together_total' => array(
			'money' => array(
				'rule' => array('money'),
				'message' => 'Must be a positive number',
				//'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'standard_fee_quantity' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Must be a positive number',
				//'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
            	'standard_fee_price' => array(
			'money' => array(
				'rule' => array('money'),
				'message' => 'Must be a positive number',
				'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'standard_fee_total' => array(
			'money' => array(
				'rule' => array('money'),
				'message' => 'Must be a positive number',
				//'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'quote_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'set_fees_total' => array(
			'money' => array(
				'rule' => array('money'),
				'message' => 'Must be a positive number',
				//'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
                'additional1_quantity' => array(
                        'numeric' => array(
                            	'rule' => array('money'),
				'message' => 'Must be a positive number',
                        ),
                ),
                'additional1_price' => array(
                        'money' => array(
				'rule' => array('money'),
				'message' => 'Must be a positive number',
				//'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'additional1_total' => array(
			'money' => array(
				'rule' => array('money'),
				'message' => 'Must be a positive number',
				//'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
                'additional2_quantity' => array(
                        'numeric' => array(
                            	'rule' => array('money'),
				'message' => 'Must be a positive number',
                        ),
                ),
                'additional2_price' => array(
                        'money' => array(
				'rule' => array('money'),
				'message' => 'Must be a positive number',
				//'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'additional2_total' => array(
			'money' => array(
				'rule' => array('money'),
				'message' => 'Must be a positive number',
				//'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Quote' => array(
			'className' => 'Quote',
			'foreignKey' => 'quote_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
