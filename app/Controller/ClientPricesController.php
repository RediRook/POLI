<?php

App::uses('AppController', 'Controller');

/**
 * Clientprices Controller
 *
 * @property Clientprice $Clientprice
 */
class ClientpricesController extends AppController {

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->Clientprice->recursive = 0;
        $this->set('clientprices', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Clientprice->exists($id)) {
            throw new NotFoundException(__('Invalid clientprice'));
        }
        $options = array('conditions' => array('Clientprice.' . $this->Clientprice->primaryKey => $id));
        $this->set('clientprice', $this->Clientprice->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Clientprice->create();
            if ($this->Clientprice->save($this->request->data)) {
                $this->Session->setFlash('The Client Price has been saved', 'success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The clientprice could not be saved. Please, try again.'));
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
        if (!$this->Clientprice->exists($id)) {
            throw new NotFoundException(__('Invalid clientprice'));
        }
        $this->set('id', $id);
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Clientprice->save($this->request->data)) {
                $this->Session->setFlash('The Client Price has been saved', 'success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The clientprice could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Clientprice.' . $this->Clientprice->primaryKey => $id));
            $this->request->data = $this->Clientprice->find('first', $options);
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
        $this->Clientprice->id = $id;
        if (!$this->Clientprice->exists()) {
            throw new NotFoundException(__('Invalid clientprice'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Clientprice->delete()) {
            $this->Session->setFlash(__('Clientprice deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Clientprice was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

}
