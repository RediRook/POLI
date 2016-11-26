<?php
App::uses('AppModel', 'Model');

class Photo extends AppModel {
    public $name = 'Photo';

    public $useTable = 'photos';

    //Each photo belongs to a graffiti record, or a break-in record
    public $belongsTo = array(
        'Staff' => array(
            'className'    => 'Staff',
            'foreignKey'   => 'staff_id'),
        'Promotion' => array(
            'className'    => 'Promotion',
            'foreignKey'   => 'promotion_id')
    );



}
?>
