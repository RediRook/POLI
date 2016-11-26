<?php
App::uses('AppModel', 'Model');
/**
 * User Model
 *
 * @property Role $Role
 * @property Customer $Customer
 * @property Staff $Staff
 */
class User extends AppModel {
 	public $actsAs = array( 'AuditLog.Auditable' );
	
	public function currentUser() {
		return array('id' => AuthComponent::user('id'));
	}
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'username';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Role' => array(
			'className' => 'Role',
			'foreignKey' => 'role',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
        'Customer' => array(
            'className'    => 'Customer',
            'foreignKey'   => 'customer_id'
        ),
        'Staff' => array(
            'className' =>'Staff',
            'foreignKey' =>'staff_id'
        )
	);

/**
 * hasMany associations
 *
 * @var array
 */



    var $validate = array(
        'username' => array(array('rule'=>'isUnique',
            'message'=>'That username has already been taken'),
            array('rule'=>'notEmpty',
                'message'=>'Please enter a username')),
        'password'=>array(  'not empty'=> array('rule'=>'notEmpty',
            'message'=>'Please enter your password'),
            'Match passwords'=>array('rule'=>'matchPasswords',
                'message'=>'Your passwords do not match')),
        'token_hash'=>array(  'not empty'=> array('rule'=>'notEmpty',
            'message'=>'Please confirm your password')));

    public function matchPasswords($data){

        if($data['password']==$this->data['User']['token_hash']){

            return true;
        }
        $this->invalidate('Confirm password','Your passwords do not match');
        return false;

    }
        public function beforeValidate($options=array()){
      if($this->data['User']['token_hash'] == ""
           && $this->data['User']['password'] == ""
       && $this->data['User']['token_hash'] == ""){
           unset($this->data['User']['token_hash']);
               unset($this->data['User']['password']);
           unset($this->data['User']['token_hash']);
         }
        }
    public function beforeSave($options = array()){
        if(isset($this->data['User']['password'])){

            $this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
            $this->data['User']['token_hash'] = AuthComponent::password($this->data['User']['token_hash']);
        }

        return true;
    }
}
