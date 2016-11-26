<?php
App::uses('AppModel', 'Model');
/**
 * Service Model
 *
 */
class Service extends AppModel {
 	public $actsAs = array( 'AuditLog.Auditable' );
	
	public function currentUser() {
		return array('id' => AuthComponent::user('id'));
	}
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';
    public $hasAndBelongsToMany = array(
        'Job'=>array(
            'joinTable' => 'job_services',
            'unique' => true,
            'foreignKey' => 'service_id',
            'associationForeignKey' => 'job_id',
        ));
    var $validate = array(
        'name'=>array('rule'=>'notEmpty',
            'message'=>'Please enter a value for the first name field.'),
            'description'=>array('rule'=>'notEmpty',
                'message'=>'Please enter a value for the first name field.'),
        'price' => array('rule' => array('decimal', 2)),
                 );

}
