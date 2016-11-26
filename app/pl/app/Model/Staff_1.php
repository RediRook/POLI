<?php
App::uses('AppModel', 'Model');
/**
 * Staff Model
 *
 */
class Staff extends AppModel {

/**
 * Display field
 *
 * @var string
 */
 	public $actsAs = array( 'AuditLog.Auditable' );
	
	public function currentUser() {
		return array('id' => AuthComponent::user('id'));
	}

    public function __construct($id = false, $table = null, $ds = null){
        parent::__construct($id,$table,$ds);
        $this->virtualFields['staff_name'] = sprintf('CONCAT_WS(" ",%s.firstName,%s.lastName)',$this->alias,$this->alias);
    }
    public $displayField = 'staff_name';
    public $hasOne = array(
        'User' => array(
            'className'    => 'User',
            'conditions'   =>'',
            'dependent'    => true
        ),
        
    );

    public $hasAndBelongsToMany = array(
        'Job'=>array(
            'joinTable' => 'job_staffs',
            'unique' => true,
            'foreignKey' => 'staff_id',
            'associationForeignKey' => 'job_id',
        )
    );
    var $validate = array(
        'firstName'=>array('rule'=>'notEmpty',
            'message'=>'Please enter a value for the first name field.'),
        'lastName'=>array('rule'=>'notEmpty',
            'message'=>'Please enter a value for the last name field.'),
        'phone'=>array(
            'rule'=>'numeric',
            'message'=>'*Please enter home phone number.'),

        'mobilePhone'=>array(
            'rule'=>'numeric',
            'message'=>'*Please enter mobile phone number.'),

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
            if (isset($val['Staff']['birthday']))
            {
                $results[$key]['Staff']['birthday'] = $this->dateFormatAfterFind($val['Staff']['birthday']);
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
        if (!empty($this->data['Staff']['birthday']))
        {
            $this->data['Staff']['birthday'] = $this->dateFormatBeforeSave($this->data['Staff']['birthday']);
        }
        return true;
    }

}


?>