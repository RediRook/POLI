<?php
App::uses('AppModel', 'Model');
/**
 * Job Model
 *
 * @property Customer $Customer
 * @property Staff $Staff
 */
class Job extends AppModel {

 	public $actsAs = array( 'AuditLog.Auditable' );
	
	public function currentUser() {
		return array('id' => AuthComponent::user('id'));
	}
/**
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
    public $hasAndBelongsToMany = array(
        'Staff'=>array(
            'joinTable' => 'job_staffs',
            'unique' => true,
            'foreignKey' => 'job_id',
            'associationForeignKey' => 'staff_id',
        ),
        'Service'=>array(
            'joinTable' => 'job_services',
            'unique' => true,
            'foreignKey' => 'job_id',
            'associationForeignKey' => 'service_id',
        ),
    );



    public $belongsTo = array(
		'Customer' => array(
			'className' => 'Customer',
			'foreignKey' => 'customer_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		));

    function afterFind($results, $primary=false)
    {
        foreach ($results as $key => $val)
        {
            if (isset($val['Job']['date']))
            {
                $results[$key]['Job']['date'] = $this->dateFormatAfterFind($val['Job']['date']);
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
        if (!empty($this->data['Job']['date']))
        {
            $this->data['Job']['date']= $this->dateFormatBeforeSave($this->data['Job']['date']);
        }
        return true;
    }

}
