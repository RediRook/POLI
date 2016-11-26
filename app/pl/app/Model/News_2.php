<?php
App::uses('AppModel', 'Model');
/**
 * News Model
 *
 */
class News extends AppModel {

 	public $actsAs = array( 'AuditLog.Auditable' );
	
	public function currentUser() {
		return array('id' => AuthComponent::user('id'));
	}
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'title';
    function afterFind($results, $primary=false)
    {
        foreach ($results as $key => $val)
        {
            if (isset($val['News']['date']))
            {
                $results[$key]['News']['date'] = $this->dateFormatAfterFind($val['News']['date']);
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
        if (!empty($this->data['News']['date']))
        {
            $this->data['News']['date'] = $this->dateFormatBeforeSave($this->data['News']['date']);
        }
        return true;
    }


}
