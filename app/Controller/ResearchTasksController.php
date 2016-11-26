<?php

App::uses('AppController', 'Controller', 'Session', 'AuthComponent');

/**
 * ResearchTasks Controller
 *
 * @property ResearchTask $ResearchTask
 */
class ResearchTasksController extends AppController {

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $num = 0;
        debug($num);
        $this->ResearchTask->recursive = 0;
        $this->set('researchTasks', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        $this->LoadModel('ResearchStep');
        $this->LoadModel('Employee');
        $this->LoadModel('Clientcase');

        $task = $this->ResearchTask->find('first', array('conditions' => array('ResearchTask.id' => $id), 'recursive' => -1));

        $status = $task['ResearchTask']['status'];

        $completeCount = 0;
        $ongoingCount = 0;
        $pendingCount = 0;
        $steps = $this->ResearchStep->find('all', array('conditions' => array('ResearchStep.task_id' => $task['ResearchTask']['id']), 'recursive' => -1));
        $totalSteps = count($steps);
        foreach ($steps as $step) {
            if ($step['ResearchStep']['status'] == 'Complete') {
                $completeCount++;
            }
            if ($step['ResearchStep']['status'] == 'Ongoing') {
                $ongoingCount++;
            }
            if ($step['ResearchStep']['status'] == 'Pending') {
                $pendingCount++;
            }

            if ($completeCount >= $totalSteps) {
                $task['ResearchTask']['status'] = 'Complete';
            } elseif (($ongoingCount > 0 && $completeCount > 0) || $ongoingCount > 0 || $pendingCount > 0) {
                $task['ResearchTask']['status'] = 'Ongoing';
            } elseif ($completeCount == 0 && $ongoingCount == 0) {
                $task['ResearchTask']['status'] = 'Pending';
            }

            if ($task['ResearchTask']['status'] != $status) {
                $this->ResearchTask->save($task);
            }
        }

        $researchSteps = $this->ResearchStep->find('all', array('conditions' => array('ResearchStep.task_id' => $id), 'recursive' => -1));

        $totalStepCount = $this->ResearchStep->find('count', array('conditions' => array('ResearchStep.task_id' => $id), 'recursive' => -1));
        $completedStepCount = $this->ResearchStep->find('count', array('conditions' => array('ResearchStep.task_id' => $id, 'ResearchStep.status' => 'Complete'), 'recursive' => -1));
        $createdBy = $this->Employee->find('first', array('conditions' => array('Employee.id' => $task['ResearchTask']['creator_id']), 'recursive' => -1));
        $responsibleFor = $this->Employee->find('first', array('conditions' => array('Employee.id' => $task['ResearchTask']['responsible_id']), 'recursive' => -1));
        $case = $this->Clientcase->find('first', array('conditions' => array('Clientcase.id' => $task['ResearchTask']['clientcase_id']), 'recursive' => 0));

        $this->set(compact('researchSteps', 'totalStepCount', 'completedStepCount', 'createdBy', 'responsibleFor', 'id', 'task', 'case'));

        $check = $_POST;
        if ($check != null) {
            if ($check['Button'] == 'Cancel') {
                $task = $this->ResearchTask->find('first', array('conditions' => array('ResearchTask.id' => $id), 'recursive' => -1));
                $this->redirect(('/clientcases/view/' . $task['ResearchTask']['clientcase_id'] . '#tab8'));
            }
            if ($check['Button'] == 'Add a Step') {
                $this->redirect(array('controller' => 'ResearchSteps', 'action' => 'add', $id));
            }
        }
        if (!$this->ResearchTask->exists($id)) {
            throw new NotFoundException(__('Invalid research task'));
        }
        $options = array('conditions' => array('ResearchTask.' . $this->ResearchTask->primaryKey => $id));
        $this->set('researchTask', $this->ResearchTask->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add($caseid = null) {
        $this->LoadModel('TemplateTask');
        $this->LoadModel('User');
        $this->LoadModel('Employee');
        $this->LoadModel('Clientcase');

        $employees = $this->Employee->find('all', array('recursive' => -1));
        $templates = $this->TemplateTask->find('all');
        $case = $this->Clientcase->find('first', array('conditions' => array('Clientcase.id' => $caseid), 'recursive' => 0));


        $this->set(compact('templates', 'caseid', 'employees', 'case'));

        if ($this->request->is('post')) {
            $cancelCheck = $_POST;
            if ($cancelCheck['Button'] == 'Cancel') {
                $this->redirect('/clientcases/view/' . $caseid . '#tab8');
            }

            $this->ResearchTask->create();
            $task = $this->request->data;

            unset($task['Button']);

            $task['ResearchTask']['clientcase_id'] = $caseid;

            $task['ResearchTask']['completion_date'] = null;

            if ($task['ResearchTask']['status'] == 0) {
                $task['ResearchTask']['status'] = 'Pending';
            } elseif ($task['ResearchTask']['status'] == 1) {
                $task['ResearchTask']['status'] = 'Ongoing';
            } elseif ($task['ResearchTask']['status'] == 2) {
                $task['ResearchTask']['status'] = 'Complete';
            }


            $loggedInUser = $this->Auth->user('id');
            $createdBy = $this->Employee->find('first', array('conditions' => array('Employee.user_id' => $loggedInUser), 'recursive' => -1));
            $task['ResearchTask']['creator_id'] = $createdBy['Employee']['id'];

            if ($this->ResearchTask->save($task)) {
                $this->Session->setFlash('Research Task created', 'success');
                $this->redirect('/clientcases/view/' . $caseid . '#tab8');
            } else {
                $this->Session->setFlash(__('The research task could not be saved. Please, try again.'));
            }
        }
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        $this->LoadModel('Employee');
        $this->LoadModel('Clientcase');

        $task = $this->ResearchTask->find('first', array('conditions' => array('ResearchTask.id' => $id), 'recursive' => -1));
        $employees = $this->Employee->find('all', array('recursive' => -1));
        $currEmp = $this->Employee->find('first', array('conditions' => array('Employee.id' => $task['ResearchTask']['responsible_id'])));
        $case = $this->Clientcase->find('first', array('conditions' => array('Clientcase.id' => $task['ResearchTask']['clientcase_id']), 'recursive' => 0));

        $this->set(compact('employees', 'currEmp', 'id', 'task', 'case'));

        if (!$this->ResearchTask->exists($id)) {
            throw new NotFoundException(__('Invalid research task'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            $task = $this->ResearchTask->find('first', array('conditions' => array('ResearchTask.id' => $id), 'recursive' => -1));

            $data = $this->request->data;

            if ($data['Button'] == 'Cancel') {
                $this->redirect(('/clientcases/view/' . $task['ResearchTask']['clientcase_id'] . '#tab8'));
            }
            unset($data['_method']);
            unset($data['Button']);

            if ($data['ResearchTask']['status'] == 0) {
                $data['ResearchTask']['status'] = 'Pending';
            } elseif ($data['ResearchTask']['status'] == 1) {
                $data['ResearchTask']['status'] = 'Ongoing';
            } elseif ($data['ResearchTask']['status'] == 2) {
                $data['ResearchTask']['status'] = 'Complete';
            }

            if ($this->ResearchTask->save($data)) {
                $this->Session->setFlash('Research Task saved', 'success');
                $this->redirect(('/clientcases/view/' . $task['ResearchTask']['clientcase_id'] . '#tab8'));
            } else {
                $this->Session->setFlash(__('The research task could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('ResearchTask.' . $this->ResearchTask->primaryKey => $id));
            $this->request->data = $this->ResearchTask->find('first', $options);
        }
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @throws MethodNotAllowedException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->LoadModel('ResearchStep');
        $task = $this->ResearchTask->find('first', array('conditions' => array('ResearchTask.id' => $id), 'recursive' => -1));
        $this->ResearchTask->id = $id;
        if (!$this->ResearchTask->exists()) {
            throw new NotFoundException(__('Invalid research task'));
        }

        $steps = $this->ResearchStep->find('all', array('conditions' => array('ResearchStep.task_id' => $task['ResearchTask']['id']), 'recursive' => -1));


        foreach ($steps as $step) {
            $this->ResearchStep->delete($step['ResearchStep']['id'], false);
        }

        if ($this->ResearchTask->delete($id, true)) {
            $this->Session->setFlash('Task deleted', 'success');
            $this->redirect('/clientcases/view/' . $task['ResearchTask']['clientcase_id'] . '#tab8');
        }

        $this->Session->setFlash(__('Research task was not deleted'));
    }

    public function use_template($id = null) {
        $this->LoadModel('TemplateTask');
        $this->LoadModel('User');
        $this->LoadModel('Employee');
        $this->LoadModel('Clientcase');

        $caseid = 0;
        $length = strlen($id);
        $count = 0;
        $templateid = 0;
        while ($count < $length) {
            if ($id[$count] == ' ') {
                $idLength = $length - ($count + 1);
                $caseid = substr($id, -$idLength);
                $templateid = substr($id, 0, $count);
            }
            $count++;
        }

        $template = $this->TemplateTask->find('first', array('conditions' => array('TemplateTask.id' => $templateid)));
        $employees = $this->Employee->find('all', array('recursive' => -1));
        $case = $this->Clientcase->find('first', array('conditions' => array('Clientcase.id' => $caseid), 'recursive' => 0));

        $this->Set(compact('template', 'employees', 'caseid', 'id', 'case'));

        if ($this->request->is('post')) {
            $cancelCheck = $_POST;
            if ($cancelCheck['Button'] == 'Cancel') {
                $this->redirect('/clientcases/view/' . $caseid . '#tab8');
            }

            $this->ResearchTask->create();
            $task = $this->request->data;

            unset($task['Button']);

            $task['ResearchTask']['clientcase_id'] = $caseid;

            $task['ResearchTask']['completion_date'] = null;

            if ($task['ResearchTask']['status'] == 0) {
                $task['ResearchTask']['status'] = 'Pending';
            } elseif ($task['ResearchTask']['status'] == 1) {
                $task['ResearchTask']['status'] = 'Ongoing';
            } elseif ($task['ResearchTask']['status'] == 2) {
                $task['ResearchTask']['status'] = 'Complete';
            }

            $loggedInUser = $this->Auth->user('id');
            $createdBy = $this->Employee->find('first', array('conditions' => array('Employee.user_id' => $loggedInUser), 'recursive' => -1));
            $task['ResearchTask']['creator_id'] = $createdBy['Employee']['id'];

            if ($this->ResearchTask->save($task)) {
                $this->Session->setFlash('Research Task created', 'success');
                $this->redirect('/clientcases/view/' . $caseid . '#tab8');
            } else {
                $this->Session->setFlash(__('The research task could not be saved. Please, try again.'));
            }
        }
    }

    public function progress()
    {
        $this->LoadModel('Clientcase');
        
        $userid = $this->Auth->user('id');
        $case = $this->Clientcase->find('first', array('conditions' => array('Clientcase.user_id' => $userid), 'recursive' => -1));
        $tasks = $this->ResearchTask->find('all', array('conditions' => array('ResearchTask.clientcase_id' => $case['Clientcase']['id']), 'recursive' => -1));
        debug($tasks);
        $this->set(compact('tasks'));
    }
}

