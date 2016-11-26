<?php

App::uses('AppModel', 'Model');

/**
 * ResearchStep Model
 *
 */
class ResearchStep extends AppModel {

    public function beforeValidate($options = array()) {
        if (!empty($this->data['ResearchStep']['creation_date'])) {
            $this->data['ResearchStep']['creation_date'] = date('Y-m-d', strtotime($this->data['ResearchStep']['creation_date']));
        }
        if (!empty($this->data['ResearchStep']['completion_date'])) {
            $this->data['ResearchStep']['completion_date'] = date('Y-m-d', strtotime($this->data['ResearchStep']['completion_date']));
        }
        if (!empty($this->data['ResearchStep']['expected_completion_date'])) {
            $this->data['ResearchStep']['expected_completion_date'] = date('Y-m-d', strtotime($this->data['ResearchStep']['expected_completion_date']));
        }

        return true;
    }

    public function afterFind($results, $primary = false) {
        foreach ($results as $key => $val) {
            if (isset($val['ResearchStep']['creation_date'])) {
                $results[$key]['ResearchStep']['creation_date'] = date('d-m-Y', strtotime($val['ResearchStep']['creation_date']));
            }
            if (isset($val['ResearchStep']['completion_date'])) {
                $results[$key]['ResearchStep']['completion_date'] = date('d-m-Y', strtotime($val['ResearchStep']['completion_date']));
            }
            if (isset($val['ResearchStep']['expected_completion_date'])) {
                $results[$key]['ResearchStep']['expected_completion_date'] = date('d-m-Y', strtotime($val['ResearchStep']['expected_completion_date']));
            }
        }
        return $results;
    }

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'description' => array(
            'notempty' => array(
                'rule' => array('notempty'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'creation_date' => array(
            'date' => array(
                'rule' => array('date'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'completion_date' => array(
            'date' => array(
                'rule' => array('date'),
                //'message' => 'Your custom message here',
                'allowEmpty' => true,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'expected_completion_date' => array(
            'date' => array(
                'rule' => array('date'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'desired_outcome' => array(
            'notempty' => array(
                'rule' => array('notempty'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'status' => array(
            'notempty' => array(
                'rule' => array('notempty'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
    );
    public $belongsTo = array(
        'researchtask' => array(
            'className' => 'ResearchTask',
            'foreignKey' => 'task_id'
        ),
        'creatorEmployee' => array(
            'className' => 'Employee',
            'foreignKey' => 'creator_id'
        ),
        'responsibleEmployee' => array(
            'className' => 'Employee',
            'foreignKey' => 'responsible_id'
        )
    );

}
