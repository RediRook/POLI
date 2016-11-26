<?php
App::uses('AppModel', 'Model');
/**
 * ApplicantQuote Model
 *
 * @property Quote $Quote
 * @property Applicant $Applicant
 */
class ApplicantQuote extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
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
		'applicant_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'quote_accepted' => array(
			'boolean' => array(
				'rule' => array('boolean'),
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
		),
		'Applicant' => array(
			'className' => 'Applicant',
			'foreignKey' => 'applicant_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
