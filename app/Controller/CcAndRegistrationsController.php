<?php
App::uses('AppController', 'Controller');
/**
 * CcAndRegistrations Controller
 *
 * @property CcAndRegistration $CcAndRegistration
 */
class CcAndRegistrationsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->CcAndRegistration->recursive = 0;
		$this->set('ccAndRegistrations', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->CcAndRegistration->exists($id)) {
			throw new NotFoundException(__('Invalid cc and registration'));
		}
		$options = array('conditions' => array('CcAndRegistration.' . $this->CcAndRegistration->primaryKey => $id));
		$this->set('ccAndRegistration', $this->CcAndRegistration->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->CcAndRegistration->create();
			if ($this->CcAndRegistration->save($this->request->data)) {
				$this->Session->setFlash(__('The cc and registration has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The cc and registration could not be saved. Please, try again.'));
			}
		}
		$quotes = $this->CcAndRegistration->Quote->find('list');
		$this->set(compact('quotes'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->CcAndRegistration->exists($id)) {
			throw new NotFoundException(__('Invalid cc and registration'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->CcAndRegistration->save($this->request->data)) {
				$this->Session->setFlash(__('The cc and registration has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The cc and registration could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('CcAndRegistration.' . $this->CcAndRegistration->primaryKey => $id));
			$this->request->data = $this->CcAndRegistration->find('first', $options);
		}
		$quotes = $this->CcAndRegistration->Quote->find('list');
		$this->set(compact('quotes'));
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
		$this->CcAndRegistration->id = $id;
		if (!$this->CcAndRegistration->exists()) {
			throw new NotFoundException(__('Invalid cc and registration'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->CcAndRegistration->delete()) {
			$this->Session->setFlash(__('Cc and registration deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Cc and registration was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
