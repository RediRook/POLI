<?php
App::uses('AppModel', 'Model');
/**
 * OldPaymentPlan Model
 *
 * @property Quote $Quote
 */
class OldPaymentPlan extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
public function beforeValidate($options = array())
    {
        if(!empty($this->data['OldPaymentPlan']['installment_date1']))
        {
            $this->data['OldPaymentPlan']['installment_date1'] = date('Y-m-d', strtotime($this->data['OldPaymentPlan']['installment_date1']));
        }
        
        if(!empty($this->data['OldPaymentPlan']['installment_date2']))
        {
            $this->data['OldPaymentPlan']['installment_date2'] = date('Y-m-d', strtotime($this->data['OldPaymentPlan']['installment_date2']));
        }
        
        if(!empty($this->data['OldPaymentPlan']['installment_date3']))
        {
            $this->data['OldPaymentPlan']['installment_date3'] = date('Y-m-d', strtotime($this->data['OldPaymentPlan']['installment_date3']));
        }
        
        if(!empty($this->data['PaymentPlan']['installment_date4']))
        {
            $this->data['OldPaymentPlan']['installment_date4'] = date('Y-m-d', strtotime($this->data['OldPaymentPlan']['installment_date4']));
        }
        
        if(!empty($this->data['OldPaymentPlan']['installment_date5']))
        {
            $this->data['OldPaymentPlan']['installment_date5'] = date('Y-m-d', strtotime($this->data['OldPaymentPlan']['installment_date5']));
        }
        
        if(!empty($this->data['OldPaymentPlan']['installment_date6']))
        {
            $this->data['OldPaymentPlan']['installment_date6'] = date('Y-m-d', strtotime($this->data['OldPaymentPlan']['installment_date6']));
        }
        
        return true;
    }
    
    public function afterFind($results, $primary=false)
    {
        foreach ($results as $key => $val)
        {
            if(isset($val['OldPaymentPlan']['installment_date1']))
            {
                $results[$key]['OldPaymentPlan']['installment_date1'] = date('d-m-Y', strtotime($val['OldPaymentPlan']['installment_date1']));
            }
            
            if(isset($val['OldPaymentPlan']['installment_date2']))
            {
                $results[$key]['OldPaymentPlan']['installment_date2'] = date('d-m-Y', strtotime($val['OldPaymentPlan']['installment_date2']));
            }
            
            if(isset($val['OldPaymentPlan']['installment_date3']))
            {
                $results[$key]['OldPaymentPlan']['installment_date3'] = date('d-m-Y', strtotime($val['OldPaymentPlan']['installment_date3']));
            }
            
            if(isset($val['OldPaymentPlan']['installment_date4']))
            {
                $results[$key]['OldPaymentPlan']['installment_date4'] = date('d-m-Y', strtotime($val['OldPaymentPlan']['installment_date4']));
            }
            
            if(isset($val['OldPaymentPlan']['installment_date5']))
            {
                $results[$key]['OldPaymentPlan']['installment_date5'] = date('d-m-Y', strtotime($val['OldPaymentPlan']['installment_date5']));
            }
            
            if(isset($val['OldPaymentPlan']['installment_date6']))
            {
                $results[$key]['OldPaymentPlan']['installment_date6'] = date('d-m-Y', strtotime($val['OldPaymentPlan']['installment_date6']));
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
