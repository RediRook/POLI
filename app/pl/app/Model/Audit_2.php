<?php
App::uses('AppModel', 'Model');
/**
 * Audit Model
 *
 */
class Audit extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'event';
    public $hasOne = array(
        'AuditDelta' => array(
            'className'    => 'AuditDelta',
            'conditions'   =>'',

        )
    );



}
