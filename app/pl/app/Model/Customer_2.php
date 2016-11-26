<?php
App::uses('AppModel', 'Model');
/**
 * Customer Model
 *
 */
class Customer extends AppModel {

/**
 * Display field
 *
 * @var string
 */ 
 	public $actsAs = array( 'AuditLog.Auditable' );
	
	public function currentUser() {
		return array('id' => AuthComponent::user('id'));
	}
 
 public $virtualFields = array(
    'customer_name' => "CONCAT(Customer.firstName, ' ', Customer.lastName)"
);
    public $displayField = 'customer_name';
    public $hasOne = array(
        'User' => array(
            'className'    => 'User',
            'conditions'   =>'',

        )
    );

    var $validate = array(
        'firstName'=>array('rule'=>'notEmpty',
            'message'=>'Please enter a value for the first name field.'),
        'lastName'=>array('rule'=>'notEmpty',
            'message'=>'Please enter a value for the last name field.'),
        'phone'=>array(
            'rule'=>'numeric',
            'message'=>'*Please enter mobile number.'),


        'email'=>array(
            'Valid email'=>array(
                'rule'=>'email',
                'message'=>'*Please enter a valid email address.'
            ),
            'Unique email'=>array(
                'rule'=>'isUnique',
                'message'=>'*This email has already been taken.'
            )),


        'address'=>array('rule'=>'notEmpty',
            'message'=>'Please enter a value for the address field.'));

    function afterFind($results, $primary=false)
    {
        foreach ($results as $key => $val)
        {
            if (isset($val['Customer']['birthday']))
            {
                $results[$key]['Customer']['birthday'] = $this->dateFormatAfterFind($val['Customer']['birthday']);
            }
        }
        return $results;
    }

    function dateFormatAfterFind($birthday)
    {
        return date('d-m-Y', strtotime($birthday));
    }

    function dateFormatBeforeSave($birthday)
    {
        $newDate = explode("-",$birthday);
        return $newDate[2]."-".$newDate[1]."-".$newDate[0];
    }

    function beforeSave($options = array() )
    {
        if (!empty($this->data['Customer']['birthday']))
        {
            $this->data['Customer']['birthday'] = $this->dateFormatBeforeSave($this->data['Customer']['birthday']);
        }
        return true;
    }


}
