<?php
App::uses('AppModel', 'Model');
/**
 * QuoteResearch Model
 *
 * @property Quote $Quote
 */
class QuoteResearch extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'quote_researches';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Must be a positive number',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'prep_of_loa_quantity' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Must be a positive number',
				//'allowEmpty' => false,
				//'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
                'prep_of_loa_price' => array(
			'money' => array(
				'rule' => array('money'),
				'message' => 'Must be a positive number',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'prep_of_loa_total' => array(
			'money' => array(
				'rule' => array('money'),
				'message' => 'Must be a positive number',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'NAA_quantity' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Must be a positive number',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
            	'NAA_price' => array(
			'money' => array(
				'rule' => array('money'),
				'message' => 'Must be a positive number',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'NAA_total' => array(
			'money' => array(
				'rule' => array('money'),
				'message' => 'Must be a positive number',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'ITS_quantity' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Must be a positive number',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
                'ITS_price' => array(
			'money' => array(
				'rule' => array('money'),
				'message' => 'Must be a positive number',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'ITS_total' => array(
			'money' => array(
				'rule' => array('money'),
				'message' => 'Must be a positive number',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'IPN_quantity' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Must be a positive number',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
            	'IPN_price' => array(
			'money' => array(
				'rule' => array('money'),
				'message' => 'Must be a positive number',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'IPN_total' => array(
			'money' => array(
				'rule' => array('money'),
				'message' => 'Must be a positive number',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'POL_GER_registy_research_quantity' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Must be a positive number',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
            	'POL_GER_registy_research_price' => array(
			'money' => array(
				'rule' => array('money'),
				'message' => 'Must be a positive number',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'POL_GER_registy_research_total' => array(
			'money' => array(
				'rule' => array('money'),
				'message' => 'Must be a positive number',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'obtaining_docs_POL_GER_quantity' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Must be a positive number',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
            	'obtaining_docs_POL_GER_price' => array(
			'money' => array(
				'rule' => array('money'),
				'message' => 'Must be a positive number',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'obtaining_docs_POL_GER_total' => array(
			'money' => array(
				'rule' => array('money'),
				'message' => 'Must be a positive number',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'administrative_fees_quantity' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Must be a positive number',
				//'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
            	'administrative_fees_price' => array(
			'money' => array(
				'rule' => array('money'),
				'message' => 'Must be a positive number',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'administrative_fees_total' => array(
			'money' => array(
				'rule' => array('money'),
				'message' => 'Must be a positive number',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'initial_meeting_quantity' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Must be a positive number',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
            	'initial_meeting_price' => array(
			'money' => array(
				'rule' => array('money'),
				'message' => 'Must be a positive number',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'initial_meeting_total' => array(
			'money' => array(
				'rule' => array('money'),
				'message' => 'Must be a positive number',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'research_total' => array(
			'money' => array(
				'rule' => array('money'),
				'message' => 'Must be a positive number',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'quote_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
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
