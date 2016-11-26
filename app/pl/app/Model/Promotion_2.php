<?php
App::uses('AppModel', 'Model');
/**
 * Promotion Model
 *
 */
class Promotion extends AppModel {

/**
 * Primary key field
 *
 * @var string
 */
 	public $actsAs = array( 'AuditLog.Auditable' );
	
	public function currentUser() {
		return array('id' => AuthComponent::user('id'));
	}

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'Title';
    public $hasOne = array(

        'Photo' => array(
            'className'    => 'Photo',
            'conditions'   =>'',
            'dependent'    => true
        )
    );


    function afterFind($results, $primary=false)
    {
        foreach ($results as $key => $val)
        {
            if (isset($val['Promotion']['date']))
            {
                $results[$key]['Promotion']['date'] = $this->dateFormatAfterFind($val['Promotion']['date']);
            }
        }
        return $results;
    }

    function dateFormatAfterFind($date)
    {
        return date('d-m-Y', strtotime($date));
    }

    function dateFormatBeforeSave($date)
    {
        $newDate = explode("-",$date);
        return $newDate[2]."-".$newDate[1]."-".$newDate[0];
    }

    function beforeSave($options = array() )
    {
        if (!empty($this->data['Promotion']['date']))
        {
            $this->data['Promotion']['date'] = $this->dateFormatBeforeSave($this->data['Promotion']['date']);
        }
        return true;
    }


}
