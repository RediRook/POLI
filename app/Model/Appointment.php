<?php
App::uses('AppModel', 'Model');
/**
 * Appointment Model
 *
 * @property Clientcase $Clientcase
 * @property Applicant $Applicant
 */
class Appointment extends AppModel {

 	/**public $actsAs = array( 'AuditLog.Auditable' );
	
	public function currentUser() {
		return array('id' => AuthComponent::user('id'));
	}

 * Display field
 *
 * @var string
 */
	public $displayField = 'id';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
    /*public $hasAndBelongsToMany = array(
        'Employee'=>array(
            'joinTable' => 'employees',
            'unique' => true,
            'foreignKey' => 'appointment_id',
            'associationForeignKey' => 'employee_id',
        ),
       
    );*/



    public $belongsTo = array(
		'Applicant' => array(
			'className' => 'Applicant',
			'foreignKey' => 'applicant_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Employee' => array(
			'className' => 'Employee',
			'foreignKey' => 'employee_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		));
        
    function afterFind($results, $primary=false)
    {
        foreach ($results as $key => $val)
        {
            if (isset($val['Appointment']['date']))
            {
                $results[$key]['Appointment']['date'] = $this->dateFormatAfterFind($val['Appointment']['date']);
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
        if (!empty($this->data['Appointment']['date']))
        {
            $this->data['Appointment']['date']= $this->dateFormatBeforeSave($this->data['Appointment']['date']);
        }
        return true;
    }

}
