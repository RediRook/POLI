<?php
App::uses('AppModel', 'Model');
/**
 * Pagecontent Model
 *
 */
class Pagecontent extends AppModel {


/**
 * Validation rules
 *
 * @var array
 */
 	public $actsAs = array( 'AuditLog.Auditable' );
	
	public function currentUser() {
		return array('id' => AuthComponent::user('id'));
	}
	
}
