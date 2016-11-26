<?php

App::uses('AppModel', 'Model');

/**
 * ResearchTask Model
 *
 */
class ResearchTask extends AppModel {

    public function beforeValidate($options = array()) {
        if (!empty($this->data['ResearchTask']['creation_date'])) {
            $this->data['ResearchTask']['creation_date'] = date('Y-m-d', strtotime($this->data['ResearchTask']['creation_date']));
        }
        if (!empty($this->data['ResearchTask']['completion_date'])) {
            $this->data['ResearchTask']['completion_date'] = date('Y-m-d', strtotime($this->data['ResearchTask']['completion_date']));
        }
        if (!empty($this->data['ResearchTask']['expected_completion_date'])) {
            $this->data['ResearchTask']['expected_completion_date'] = date('Y-m-d', strtotime($this->data['ResearchTask']['expected_completion_date']));
        }

        return true;
    }

    public function afterFind($results, $primary = false) {
        foreach ($results as $key => $val) {
            if (isset($val['ResearchTask']['creation_date'])) {
                $results[$key]['ResearchTask']['creation_date'] = date('d-m-Y', strtotime($val['ResearchTask']['creation_date']));
            }
            if (isset($val['ResearchTask']['completion_date'])) {
                $results[$key]['ResearchTask']['completion_date'] = date('d-m-Y', strtotime($val['ResearchTask']['completion_date']));
            }
            if (isset($val['ResearchTask']['expected_completion_date'])) {
                $results[$key]['ResearchTask']['expected_completion_date'] = date('d-m-Y', strtotime($val['ResearchTask']['expected_completion_date']));
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
                'message' => 'Description cannot be left empty',
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
            'message' => 'An expected completion date must be entered',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'desired_outcome' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Desired outcome cannot be left empty',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'status' => array(
            'notempty' => array(
                'rule' => array('notempty'),
            'message' => 'A task must have a status',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'responsible_id' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Please choose an employee'
            ),
        ),
    );
    
    public $hasMany = array(
           'ResearchStep' => array(
                'className' => 'ResearchStep',
                'foreignKey' => 'task_id',
                'dependant' => false
            )
    );
    
            public $belongsTo = array(
                'clientcase' => array(
                    'className' => 'Clientcase',
                    'foreignKey' => 'clientcase_id'
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
