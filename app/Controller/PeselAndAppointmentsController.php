<?php
App::uses('AppController', 'Controller');
/**
 * PeselAndAppointments Controller
 *
 * @property PeselAndAppointment $PeselAndAppointment
 */
class PeselAndAppointmentsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->PeselAndAppointment->recursive = 0;
		$this->set('peselAndAppointments', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->PeselAndAppointment->exists($id)) {
			throw new NotFoundException(__('Invalid pesel and appointment'));
		}
		$options = array('conditions' => array('PeselAndAppointment.' . $this->PeselAndAppointment->primaryKey => $id));
		$this->set('peselAndAppointment', $this->PeselAndAppointment->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->PeselAndAppointment->create();
			if ($this->PeselAndAppointment->save($this->request->data)) {
				$this->Session->setFlash(__('The pesel and appointment has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The pesel and appointment could not be saved. Please, try again.'));
			}
		}
		$quotes = $this->PeselAndAppointment->Quote->find('list');
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
		if (!$this->PeselAndAppointment->exists($id)) {
			throw new NotFoundException(__('Invalid pesel and appointment'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->PeselAndAppointment->save($this->request->data)) {
				$this->Session->setFlash(__('The pesel and appointment has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The pesel and appointment could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('PeselAndAppointment.' . $this->PeselAndAppointment->primaryKey => $id));
			$this->request->data = $this->PeselAndAppointment->find('first', $options);
		}
		$quotes = $this->PeselAndAppointment->Quote->find('list');
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
		$this->PeselAndAppointment->id = $id;
		if (!$this->PeselAndAppointment->exists()) {
			throw new NotFoundException(__('Invalid pesel and appointment'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->PeselAndAppointment->delete()) {
			$this->Session->setFlash(__('Pesel and appointment deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Pesel and appointment was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
