<?php
App::uses('AppController', 'Controller');
App::uses('CakeTime', 'Utility');
/**
 * Addresses Controller
 *
 * Stores the addresses for clients
 */
class AddressesController extends AppController {

	public $components = array('Paginator');

/**
 * add method
 *
 * Used by staff on the case page.
 * Adds an address to a client's case.
 */
	public function add($id = null) {
        $this->loadModel('Clientcase');
        $this->loadModel('Country');
        $this->request->data['Address']['applicant_id'] = $id;
        $clientcase = $this->Clientcase->find('first', array('conditions' => array('Clientcase.applicant_id' => $id)));
		if ($this->request->is('post')) {
			$this->Address->create();
			if ($this->Address->save($this->request->data)) {
				$this->Session->setFlash(__('The address has been saved', null),'default', array('class' => 'alert-success'));
				return $this->redirect(array('controller' => 'clientcases', 'action' => 'view', $clientcase['Clientcase']['id']));
			} else {
				$this->Session->setFlash(__('The address could not be saved. Please try again.', null),'default', array('class' => 'alert-danger'));
			}
		}
		$countries = $this->Country->find('list');
        $this->set(compact('countries'));
	}

/**
 * edit method
 *
 * Used by staff on the case page.
 * Edits the address attached to a client's case.
 */
	public function edit($id = null) {
        $this->loadModel('Applicant');
        $this->loadModel('Address');

        $address = $this->Address->find('first', array('conditions' => array('Address.id' => $id)));
        $applicant = $this->Applicant->find('first', array('conditions' => array('Applicant.id' => $address['Address']['applicant_id'])));
        $this->request->data['Address']['applicant_id'] = $address['Address']['applicant_id'];

		if (!$this->Address->exists($id)) {
			throw new NotFoundException(__('Invalid address'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {

            $this->Address->create();
			if ($this->Address->save($this->request->data)) {
				$this->Session->setFlash(__('The address has been saved', null),'default', array('class' => 'alert-success'));

                $this->Address->set('id', $id);
                $this->request->data['Address']['date_changed'] = date('y-m-d');
                $this->Address->save($this->request->data);

				return $this->redirect(array('controller' => 'clientcases', 'action' => 'view', $applicant['Applicant']['clientcase_id']));
			} else {
				$this->Session->setFlash(__('The address could not be saved. Please try again.', null),'default', array('class' => 'alert-danger'));
			}
        }
        $options = array('conditions' => array('Address.' . $this->Address->primaryKey => $id));
        $this->request->data = $this->Address->find('first', $options);

		$countries = $this->Address->Country->find('list', array('fields' => array('Country.id', 'Country.country_name')));
		$this->set(compact('applicant', 'countries'));
	}
}
