<?php

App::uses('AppController', 'Controller');

/**
 * ResearchSteps Controller
 *
 * @property ResearchStep $ResearchStep
 */
class ResearchStepsController extends AppController {

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->ResearchStep->recursive = 0;
        $this->set('researchSteps', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->ResearchStep->exists($id)) {
            throw new NotFoundException(__('Invalid research step'));
        }

        $check = $_POST;
        if ($check != null) {
            if ($check['Button'] == 'Cancel') {
                $step = $this->ResearchStep->find('first', array('conditions' => array('ResearchStep.id' => $id), 'recursive' => -1));
                $this->redirect('/researchTasks/view/' . $step['ResearchStep']['task_id']);
            }
        }

        $this->LoadModel('Employee');
        $this->Loadmodel('ResearchTask');
        
        $researchStep = $this->ResearchStep->find('first', array('conditions' => array('ResearchStep.id' => $id), 'recursive' => -1));
        $createdBy = $this->Employee->find('first', array('conditions' => array('Employee.id' => $researchStep['ResearchStep']['creator_id']), 'recursive' => -1));
        $responsibleFor = $this->Employee->find('first', array('conditions' => array('Employee.id' => $researchStep['ResearchStep']['responsible_id']), 'recursive' => -1));
        $task = $this->ResearchTask->find('first', array('conditions' => array('ResearchTask.id' => $researchStep['ResearchStep']['task_id']), 'recursive' => -1));

        $this->set(compact('researchStep', 'createdBy', 'responsibleFor', 'task', 'id'));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add($id = null) {
        $this->LoadModel('Templatestep');
        $this->LoadModel('ResearchTask');
        $this->LoadModel('Employee');
        
        $templates = $this->Templatestep->find('all');
        $employees = $this->Employee->find('all', array('recursive' => -1));
        $task = $this->ResearchTask->find('first', array('conditions' => array('ResearchTask.id' => $id), 'recursive' => -1));

        $this->set(compact('templates', 'id', 'employees', 'task'));

        if ($this->request->is('post')) {
            $cancelCheck = $_POST;
            if ($cancelCheck['Button'] == 'Cancel') {
                $this->redirect('/ResearchTasks/view/' . $id . '#tab8');
            }
        }

        if ($this->request->is('post')) {
            $data = $this->request->data;
            $data['ResearchStep']['task_id'] = $id;

            $data['ResearchStep']['completion_date'] = null;

            if ($data['ResearchStep']['status'] == 0) {
                $data['ResearchStep']['status'] = 'Pending';
            } elseif ($data['ResearchStep']['status'] == 1) {
                $data['ResearchStep']['status'] = 'Ongoing';
            } elseif ($data['ResearchStep']['status'] == 2) {
                $data['ResearchStep']['status'] = 'Complete';
            }
            unset($data['Button']);

            $loggedInUser = $this->Auth->user('id');
            $createdBy = $this->Employee->find('first', array('conditions' => array('Employee.user_id' => $loggedInUser), 'recursive' => -1));
            $data['ResearchStep']['creator_id'] = $createdBy['Employee']['id'];

            if ($this->ResearchStep->save($data)) {
                $this->Session->setFlash('The research step has been saved', 'success');
                $this->redirect(array('controller' => 'ResearchTasks', 'action' => 'view/' . $id));
            } else {
                $this->Session->setFlash(__('The research step could not be saved. Please, try again.'));
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
        $this->LoadModel('ResearchTask');
        $step = $this->ResearchStep->find('first', array('conditions' => array('ResearchStep.id' => $id), 'recursive' => -1));
        $task = $this->ResearchTask->find('first', array('conditions' => array('ResearchTask.id' => $step['ResearchStep']['task_id']), 'recusrive' => -1));

        $this->set(compact('id', 'task'));
        
        if (!$this->ResearchStep->exists($id)) {
            throw new NotFoundException(__('Invalid research step'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            $data = $this->request->data;
            $step = $this->ResearchStep->find('first', array('conditions' => array('ResearchStep.id' => $id), 'recursive' => -1));

            if ($data['Button'] == 'Cancel') {
                $this->redirect(('/researchtasks/view/' . $step['ResearchStep']['task_id']));
            }
            unset($data['_method']);
            unset($data['Button']);

            if ($data['ResearchStep']['status'] == 0) {
                $data['ResearchStep']['status'] = 'Pending';
            } elseif ($data['ResearchStep']['status'] == 1) {
                $data['ResearchStep']['status'] = 'Ongoing';
            } elseif ($data['ResearchStep']['status'] == 2) {
                $data['ResearchStep']['status'] = 'Complete';
            }
            if ($this->ResearchStep->save($data)) {
                $this->Session->setFlash('Research Step saved', 'success');
                $this->redirect(('/researchtasks/view/' . $step['ResearchStep']['task_id']));
            } else {
                $this->Session->setFlash(__('The research step could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('ResearchStep.' . $this->ResearchStep->primaryKey => $id));
            $this->request->data = $this->ResearchStep->find('first', $options);
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
        $this->ResearchStep->id = $id;
        if (!$this->ResearchStep->exists()) {
            throw new NotFoundException(__('Invalid research step'));
        }
        $this->request->onlyAllow('post', 'delete');
        $step = $this->ResearchStep->find('first', array('conditions' => array('ResearchStep.id' => $id), 'recursive' => -1));

        if ($this->ResearchStep->delete($id)) {
            $this->Session->setFlash('Research step deleted', 'success');
            $this->redirect('/ResearchTasks/view/' . $step['ResearchStep']['task_id']);
        }
        $this->Session->setFlash(__('Research step was not deleted'));
        $this->redirect('/ResearchTasks/view/' . $step['ResearchStep']['task_id']);
    }

    public function use_template($id = null) {
        $this->LoadModel('Templatestep');
        $this->LoadModel('Employee');
        $this->LoadModel('ResearchTask');
        
        $taskid = 0;
        $length = strlen($id);
        $count = 0;
        $templateid = 0;
        while ($count < $length) {
            if ($id[$count] == ' ') {
                $idLength = $length - ($count + 1);
                $taskid = substr($id, -$idLength);
                $templateid = substr($id, 0, $count);
            }
            $count++;
        }

        $task = $this->ResearchTask->find('first', array('conditions' => array('ResearchTask.id' => $taskid), 'recursive' => -1));
        $employees = $this->Employee->find('all', array('recursive' => -1));
        $template = $this->Templatestep->find('first', array('conditions' => array('Templatestep.id' => $templateid)));

        $this->Set(compact('template', 'employees', 'id', 'taskid', 'task'));

        if ($this->request->is('post')) {
            $cancelCheck = $_POST;
            if ($cancelCheck['Button'] == 'Cancel') {
                $this->redirect('/researchTasks/view/' . $taskid);
            }

            $this->ResearchStep->create();

            if ($this->request->is('post')) {
                $data = $this->request->data;
                $data['ResearchStep']['task_id'] = $taskid;


                $data['ResearchStep']['completion_date'] = null;

                if ($data['ResearchStep']['status'] == 0) {
                    $data['ResearchStep']['status'] = 'Pending';
                } elseif ($data['ResearchStep']['status'] == 1) {
                    $data['ResearchStep']['status'] = 'Ongoing';
                } elseif ($data['ResearchStep']['status'] == 2) {
                    $data['ResearchStep']['status'] = 'Complete';
                }

                unset($data['Button']);

                if ($this->ResearchStep->save($data)) {
                    $this->Session->setFlash('Research Step created', 'success');
                    $this->redirect('/researchTasks/view/' . $taskid);
                } else {
                    $this->Session->setFlash(__('The research step could not be saved. Please, try again.'));
                }
            }
        }
    }

}