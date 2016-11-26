<?php
App::uses('AppController', 'Controller');
/**
 * Internalprices Controller
 *
 * @property Internalprice $Internalprice
 */
class InternalpricesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Internalprice->recursive = 0;
		$this->set('internalprices', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Internalprice->exists($id)) {
			throw new NotFoundException(__('Invalid internalprice'));
		}
		$options = array('conditions' => array('Internalprice.' . $this->Internalprice->primaryKey => $id));
		$this->set('internalprice', $this->Internalprice->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Internalprice->create();
			if ($this->Internalprice->save($this->request->data)) {
				$this->Session->setFlash(__('The internalprice has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The internalprice could not be saved. Please, try again.'));
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
		if (!$this->Internalprice->exists($id)) {
			throw new NotFoundException(__('Invalid internalprice'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Internalprice->save($this->request->data)) {
				$this->Session->setFlash(__('The internalprice has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The internalprice could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Internalprice.' . $this->Internalprice->primaryKey => $id));
			$this->request->data = $this->Internalprice->find('first', $options);
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
		$this->Internalprice->id = $id;
		if (!$this->Internalprice->exists()) {
			throw new NotFoundException(__('Invalid internalprice'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Internalprice->delete()) {
			$this->Session->setFlash(__('Internalprice deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Internalprice was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
