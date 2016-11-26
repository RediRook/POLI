<?php
App::uses('AppController', 'Controller');
/**
 * SetFees Controller
 *
 * @property SetFee $SetFee
 */
class SetFeesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->SetFee->recursive = 0;
		$this->set('setFees', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->SetFee->exists($id)) {
			throw new NotFoundException(__('Invalid set fee'));
		}
		$options = array('conditions' => array('SetFee.' . $this->SetFee->primaryKey => $id));
		$this->set('setFee', $this->SetFee->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->SetFee->create();
			if ($this->SetFee->save($this->request->data)) {
				$this->Session->setFlash(__('The set fee has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The set fee could not be saved. Please, try again.'));
			}
		}
		$quotes = $this->SetFee->Quote->find('list');
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
		if (!$this->SetFee->exists($id)) {
			throw new NotFoundException(__('Invalid set fee'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->SetFee->save($this->request->data)) {
				$this->Session->setFlash(__('The set fee has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The set fee could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('SetFee.' . $this->SetFee->primaryKey => $id));
			$this->request->data = $this->SetFee->find('first', $options);
		}
		$quotes = $this->SetFee->Quote->find('list');
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
		$this->SetFee->id = $id;
		if (!$this->SetFee->exists()) {
			throw new NotFoundException(__('Invalid set fee'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->SetFee->delete()) {
			$this->Session->setFlash(__('Set fee deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Set fee was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
