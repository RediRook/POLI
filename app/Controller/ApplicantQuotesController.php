<?php
App::uses('AppController', 'Controller');
/**
 * ApplicantQuotes Controller
 *
 * @property ApplicantQuote $ApplicantQuote
 */
class ApplicantQuotesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->ApplicantQuote->recursive = 0;
		$this->set('applicantQuotes', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ApplicantQuote->exists($id)) {
			throw new NotFoundException(__('Invalid applicant quote'));
		}
		$options = array('conditions' => array('ApplicantQuote.' . $this->ApplicantQuote->primaryKey => $id));
		$this->set('applicantQuote', $this->ApplicantQuote->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ApplicantQuote->create();
			if ($this->ApplicantQuote->save($this->request->data)) {
				$this->Session->setFlash(__('The applicant quote has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The applicant quote could not be saved. Please, try again.'));
			}
		}
		$quotes = $this->ApplicantQuote->Quote->find('list');
		$applicants = $this->ApplicantQuote->Applicant->find('list');
		$this->set(compact('quotes', 'applicants'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->ApplicantQuote->exists($id)) {
			throw new NotFoundException(__('Invalid applicant quote'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ApplicantQuote->save($this->request->data)) {
				$this->Session->setFlash(__('The applicant quote has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The applicant quote could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ApplicantQuote.' . $this->ApplicantQuote->primaryKey => $id));
			$this->request->data = $this->ApplicantQuote->find('first', $options);
		}
		$quotes = $this->ApplicantQuote->Quote->find('list');
		$applicants = $this->ApplicantQuote->Applicant->find('list');
		$this->set(compact('quotes', 'applicants'));
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
		$this->ApplicantQuote->id = $id;
		if (!$this->ApplicantQuote->exists()) {
			throw new NotFoundException(__('Invalid applicant quote'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->ApplicantQuote->delete()) {
			$this->Session->setFlash(__('Applicant quote deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Applicant quote was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
