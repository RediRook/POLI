<?php
App::uses('AppModel', 'Model');
/**
 * PeselAndAppointment Model
 *
 * @property Quote $Quote
 */
class PeselAndAppointment extends AppModel {

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
		'preparing_pesel_app_quantity' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Must be a positive number',
				//'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
            	'preparing_pesel_app_price' => array(
			'money' => array(
				'rule' => array('money'),
				'message' => 'Must be a positive number',
				//'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'preparing_pesel_app_total' => array(
			'money' => array(
				'rule' => array('money'),
				'message' => 'Must be a positive number',
				//'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'appointment_consul_standard_quantity' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Must be a positive number',
				//'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
            	'appointment_consul_standard_price' => array(
			'money' => array(
				'rule' => array('money'),
				'message' => 'Must be a positive number',
				//'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'appointment_consul_standard_total' => array(
			'money' => array(
				'rule' => array('money'),
				'message' => 'Must be a positive number',
				//'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'appointment_consul_nonstandard_quantity' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Must be a positive number',
				//'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
            	'appointment_consul_nonstandard_price' => array(
			'money' => array(
				'rule' => array('money'),
				'message' => 'Must be a positive number',
				//'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'appointment_consul_nonstandard_total' => array(
			'money' => array(
				'rule' => array('money'),
				'message' => 'Must be a positive number',
				//'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'pesel_app_apointment_out_aus_quantity' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Must be a positive number',
				//'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
            	'pesel_app_apointment_out_aus_price' => array(
			'money' => array(
				'rule' => array('money'),
				'message' => 'Must be a positive number',
				//'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'pesel_app_apointment_out_aus_total' => array(
			'money' => array(
				'rule' => array('money'),
				'message' => 'Must be a positive number',
				//'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'pesel_and_appointments_total' => array(
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
