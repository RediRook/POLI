<?php
App::uses('AppModel', 'Model');
/**
 * PaymentPlan Model
 *
 * @property Quote $Quote
 */
class PaymentPlan extends AppModel {
/*
    public function beforeValidate($options = array())
    {
        if(!empty($this->data['PaymentPlan']['date_created']))
        {
            $this->data['PaymentPlan']['date_created'] = date('Y-m-d', strtotime($this->data['PaymentPlan']['date_created']));
        }
        if(!empty($this->data['PaymentPlan']['installment_date1']))
        {
            $this->data['PaymentPlan']['installment_date1'] = date('Y-m-d', strtotime($this->data['PaymentPlan']['installment_date1']));
        }
        
        if(!empty($this->data['PaymentPlan']['installment_date2']))
        {
            $this->data['PaymentPlan']['installment_date2'] = date('Y-m-d', strtotime($this->data['PaymentPlan']['installment_date2']));
        }
        
        if(!empty($this->data['PaymentPlan']['installment_date3']))
        {
            $this->data['PaymentPlan']['installment_date3'] = date('Y-m-d', strtotime($this->data['PaymentPlan']['installment_date3']));
        }
        
        if(!empty($this->data['PaymentPlan']['installment_date4']))
        {
            $this->data['PaymentPlan']['installment_date4'] = date('Y-m-d', strtotime($this->data['PaymentPlan']['installment_date4']));
        }
        
        if(!empty($this->data['PaymentPlan']['installment_date5']))
        {
            $this->data['PaymentPlan']['installment_date5'] = date('Y-m-d', strtotime($this->data['PaymentPlan']['installment_date5']));
        }
        
        if(!empty($this->data['PaymentPlan']['installment_date6']))
        {
            $this->data['PaymentPlan']['installment_date6'] = date('Y-m-d', strtotime($this->data['PaymentPlan']['installment_date6']));
        }
        
        return true;
    }*/
    
    public function afterFind($results, $primary=false)
    {
        foreach ($results as $key => $val)
        {
            if(isset($val['PaymentPlan']['date_created']))
            {
                $results[$key]['PaymentPlan']['date_created'] = date('d-m-Y', strtotime($val['PaymentPlan']['date_created']));
            }
            
            if(isset($val['PaymentPlan']['installment_date1']))
            {
                $results[$key]['PaymentPlan']['installment_date1'] = date('d-m-Y', strtotime($val['PaymentPlan']['installment_date1']));
            }
            
            if(isset($val['PaymentPlan']['installment_date2']))
            {
                $results[$key]['PaymentPlan']['installment_date2'] = date('d-m-Y', strtotime($val['PaymentPlan']['installment_date2']));
            }
            
            if(isset($val['PaymentPlan']['installment_date3']))
            {
                $results[$key]['PaymentPlan']['installment_date3'] = date('d-m-Y', strtotime($val['PaymentPlan']['installment_date3']));
            }
            
            if(isset($val['PaymentPlan']['installment_date4']))
            {
                $results[$key]['PaymentPlan']['installment_date4'] = date('d-m-Y', strtotime($val['PaymentPlan']['installment_date4']));
            }
            
            if(isset($val['PaymentPlan']['installment_date5']))
            {
                $results[$key]['PaymentPlan']['installment_date5'] = date('d-m-Y', strtotime($val['PaymentPlan']['installment_date5']));
            }
            
            if(isset($val['PaymentPlan']['installment_date6']))
            {
                $results[$key]['PaymentPlan']['installment_date6'] = date('d-m-Y', strtotime($val['PaymentPlan']['installment_date6']));
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
		'installment_price1' => array(
			'money' => array(
				'rule' => array('comparison', 'greater or equal',0),
				'message' => 'Must be a positive number',
				'allowEmpty' => true,
				'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'installment_date1' => array(
			'date' => array(
				'rule' => array('date'),
				'message' => 'Please add a date',
				//'allowEmpty' => false,
				//'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'installment_price2' => array(
			'money' => array(
				'rule' => array('comparison', 'greater or equal',0),
				'message' => 'Must be a positive number',
				'allowEmpty' => true,
				'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'installment_date2' => array(
			'date' => array(
				'rule' => array('date'),
				'message' => 'Please add a date',
				//'allowEmpty' => false,
				//'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'installment_price3' => array(
			'money' => array(
				'rule' => array('comparison', 'greater or equal',0),
				'message' => 'Must be a positive number',
				'allowEmpty' => true,
				'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
            'installment_date3' => array(
			'date' => array(
				'rule' => array('date'),
				'message' => 'Must be in the format  dd/mm/yyyy',
				'allowEmpty' => true,
				'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'installment_price4' => array(
			'money' => array(
				'rule' => array('comparison', 'greater or equal',0),
				'message' => 'Must be a positive number',
				'allowEmpty' => true,
				'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
            'installment_date4' => array(
			'date' => array(
				'rule' => array('date'),
				'message' => 'Must be in the format  dd/mm/yyyy',
				'allowEmpty' => true,
				'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
            'installment_price5' => array(
			'money' => array(
				'rule' => array('comparison', 'greater or equal',0),
				'message' => 'Must be a positive number',
				'allowEmpty' => true,
				'required' => false,                             
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
              'installment_date6' => array(
			'date' => array(
				'rule' => array('date'),
				'message' => 'Must be in the format dd/mm/yyyy',
				'allowEmpty' => true,
				'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'total' => array(
			'money' => array(
				'rule' => array('comparison', 'greater or equal',0),
				'message' => 'Must be a positive number',
				'allowEmpty' => true,
				'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'interest_rate' => array(
			'money' => array(
				'rule' => array('comparison', 'greater or equal',0),
				'message' => 'Must be a positive number',
				'allowEmpty' => true,
				'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
                'installment_date_period' => array(
                        'notempty' => array(
                                'rule' => array('numeric'),
                            'message' => 'Must be a positive numer',
                            'allowEmpty' => 'false',
                            'required' => 'true',
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
