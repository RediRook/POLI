<?php
App::uses('AppModel', 'Model');
/**
 * Quote Model
 *
 * @property CcAndRegistration $CcAndRegistration
 * @property PeselAndAppointment $PeselAndAppointment
 * @property QuoteResearch $QuoteResearch
 * @property SetFee $SetFee
 */
class Quote extends AppModel {

    public function afterFind($results, $primary=false)
    {
        foreach ($results as $key => $val)
        {
            if(isset($val['Quote']['date']))
            {
                $results[$key]['Quote']['date'] = date('d-m-Y', strtotime($val['Quote']['date']));
            }
        }
        return $results;
    }
    
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
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
                /*'description' => array(
                    'description' => array(
                        'message' => 'Please enter a description',
                        //'required' => false,
                        'allowEmpty' => true,
                    ),
                ),*/
		'date' => array(
			'date' => array(
				'rule' => array('date'),
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
		'research_accepted' => array(
			'boolean' => array(
				'rule' => array('boolean'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'cc_accepted' => array(
			'boolean' => array(
				'rule' => array('boolean'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'pesel_accepted' => array(
			'boolean' => array(
				'rule' => array('boolean'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'setfees_accepted' => array(
			'boolean' => array(
				'rule' => array('boolean'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'total' => array(
			'money' => array(
				'rule' => array('money'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
                /*'GST' => array(
                        'money' => array(
                                'rule' => array('money'),
                        ),
                ),*/
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasOne associations
 *
 * @var array
 */
    
        
	public $hasOne = array(
		'CcAndRegistration' => array(
			'className' => 'CcAndRegistration',
			'foreignKey' => 'quote_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'PeselAndAppointment' => array(
			'className' => 'PeselAndAppointment',
			'foreignKey' => 'quote_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'QuoteResearch' => array(
			'className' => 'QuoteResearch',
			'foreignKey' => 'quote_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'SetFee' => array(
			'className' => 'SetFee',
			'foreignKey' => 'quote_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
             'PaymentPlan' => array(
                        'className' => 'PaymentPlan',
                        'foreignKey' => 'quote_id'
             )
	);
        
        public $hasMany = array(
              'OldPaymentPlan' => array(
                  'className' => 'OldPaymentPlan',
                  'foreignKey' => 'quote_id'
              )
        );
        
        public $hasAndBelongsToMany = array(
                        'Applicant' => array(
			'className' => 'Applicant',
                        'joinTable' => 'applicant_quotes',
			'foreignKey' => 'quote_id',
                        'associationForeignKey' => 'applicant_id',
                        'unique' => true,
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
