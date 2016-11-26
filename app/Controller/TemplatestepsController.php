<?php

App::uses('AppController', 'Controller');

/**
 * Templatesteps Controller
 *
 * @property Templatestep $Templatestep
 */
class TemplatestepsController extends AppController {

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->Templatestep->recursive = 0;
        $this->set('templatesteps', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Templatestep->exists($id)) {
            throw new NotFoundException(__('Invalid templatestep'));
        }
        $this->set('id', $id);
        $options = array('conditions' => array('Templatestep.' . $this->Templatestep->primaryKey => $id));
        $this->set('templatestep', $this->Templatestep->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Templatestep->create();
            if ($this->Templatestep->save($this->request->data)) {
                $this->Session->setFlash('The step has been saved', 'success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The templatestep could not be saved. Please, try again.'));
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
        if (!$this->Templatestep->exists($id)) {
            throw new NotFoundException(__('Invalid templatestep'));
        }
        $this->set('id', $id);
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Templatestep->save($this->request->data)) {
                $this->Session->setFlash('The step has been saved', 'success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The templatestep could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Templatestep.' . $this->Templatestep->primaryKey => $id));
            $this->request->data = $this->Templatestep->find('first', $options);
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
        $this->Templatestep->id = $id;
        if (!$this->Templatestep->exists()) {
            throw new NotFoundException(__('Invalid templatestep'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Templatestep->delete()) {
            $this->Session->setFlash('Step deleted', 'success');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Templatestep was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

}
