<?php
App::uses('AppModel', 'Model');
/**
 * CcAndRegistration Model
 *
 * @property Quote $Quote
 */
class CcAndRegistration extends AppModel {

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
		'apostille_quantity' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Must be a positive number',
				//'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
            	'apostille_price' => array(
			'money' => array(
				'rule' => array('money'),
				'message' => 'Must be a positive number',
				//'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'apostille_total' => array(
			'money' => array(
				'rule' => array('money'),
				'message' => 'Must be a positive number',
				//'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'trans_german_english_quantity' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Must be a positive number',
				//'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
            	'trans_german_english_price' => array(
			'money' => array(
				'rule' => array('money'),
				'message' => 'Must be a positive number',
				//'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'trans_german_english_total' => array(
			'money' => array(
				'rule' => array('money'),
				'message' => 'Must be a positive number',
				//'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
                'trans_other_languages_quantity' => array(
                        'numeric' => array(
                            'rule' => array('numeric'),
                            'message' => 'Must be a positive number',
                            //'allowEmpty' => true,
                        ),
                ),
                'trans_other_languages_price' => array(
                    'money' => array(
                        'rule' => array('money'),
                        'message' => 'Must be a positive number',
                        //'allowEmpty' => true,
                    ),
                ),
                'trans_other_languages_total' => array(
                    'money' => array(
                        'rule' => array('money'),
                        'message' => 'Must be a positive number',
                        //'allowEmpty' => true,
                    ),
                ),
		'polish_notary_quantity' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Must be a positive number',
				//'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
            	'polish_notary_price' => array(
			'money' => array(
				'rule' => array('money'),
				'message' => 'Must be a positive number',
				//'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'polish_notary_total' => array(
			'money' => array(
				'rule' => array('money'),
				'message' => 'Must be a positive number',
				//'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'application_attachments_quantity' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Must be a positive number',
				//'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
            	'application_attachments_price' => array(
			'money' => array(
				'rule' => array('money'),
				'message' => 'Must be a positive number',
				//'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'application_attachments_total' => array(
			'money' => array(
				'rule' => array('money'),
				'message' => 'Must be a positive number',
				//'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'marriage_cert_reg_quantity' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Must be a positive number',
				//'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
            	'marriage_cert_reg_price' => array(
			'money' => array(
				'rule' => array('money'),
				'message' => 'Must be a positive number',
				//'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'marriage_cert_reg_total' => array(
			'money' => array(
				'rule' => array('money'),
				'message' => 'Must be a positive number',
				//'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'birth_cert_reg_quantity' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Must be a positive number',
				//'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
            	'birth_cert_reg_price' => array(
			'money' => array(
				'rule' => array('money'),
				'message' => 'Must be a positive number',
				//'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'birth_cert_reg_total' => array(
			'money' => array(
				'rule' => array('money'),
				'message' => 'Must be a positive number',
				//'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'case_manager_fee_quantity' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Must be a positive number',
				'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
            	'case_manager_fee_price' => array(
			'money' => array(
				'rule' => array('money'),
				'message' => 'Must be a positive number',
				//'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'case_manager_fee_total' => array(
			'money' => array(
				'rule' => array('money'),
				'message' => 'Must be a positive number',
				//'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'postage_quantity' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Must be a positive number',
				//'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
            	'postage_price' => array(
			'money' => array(
				'rule' => array('money'),
				'message' => 'Must be a positive number',
				//'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'postage_total' => array(
			'money' => array(
				'rule' => array('money'),
				'message' => 'Must be a positive number',
				//'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'cc_and_registration_total' => array(
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
