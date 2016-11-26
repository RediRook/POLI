<?php
App::uses('AppModel', 'Model');
/**
 * Audit Model
 *
 */
class AuditDelta extends AppModel {

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'property_name';


    public $belongsTo = array(
        'Audit' => array(
            'className'    => 'Audit',
            'foreignKey'   => 'audit_id'
        ));
}
