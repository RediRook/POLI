<?php

App::uses('AppController', 'Controller');

/**
 * SetFees Controller
 *
 * @property SetFee $SetFee
 */
class TemplateTasksController extends AppController {

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->TemplateTask->recursive = 0;
        $this->set('templateTasks', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->TemplateTask->exists($id)) {
            throw new NotFoundException(__('Invalid Task'));
        }
        $this->set('id', $id);
        $options = array('conditions' => array('TemplateTask.' . $this->TemplateTask->primaryKey => $id));
        $this->set('templateTask', $this->TemplateTask->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $cancelCheck = $_POST;
            if ($cancelCheck['Button'] == 'Cancel') {
                $this->redirect('/TemplateTasks');
            }
            $this->TemplateTask->create();
            if ($this->TemplateTask->save($this->request->data)) {
                $this->Session->setFlash('The task has been saved', 'success');    
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The task could not be saved. Please, try again.'));
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
        if (!$this->TemplateTask->exists($id)) {
            throw new NotFoundException(__('Invalid task'));
        }
        $this->set('id', $id);
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->TemplateTask->save($this->request->data)) {
                $this->Session->setFlash('The task has been saved', 'success');    
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The task could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('TemplateTask.' . $this->TemplateTask->primaryKey => $id));
            $this->request->data = $this->TemplateTask->find('first', $options);
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
        $this->TemplateTask->id = $id;
        if (!$this->TemplateTask->exists()) {
            throw new NotFoundException(__('Invalid task'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->TemplateTask->delete()) {
            $this->Session->setFlash('Task deleted', 'success');    
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('TemplateTask was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

}
