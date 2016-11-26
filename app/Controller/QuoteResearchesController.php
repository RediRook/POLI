<?php
App::uses('AppController', 'Controller');
/**
 * QuoteResearches Controller
 *
 * @property QuoteResearch $QuoteResearch
 */
class QuoteResearchesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->QuoteResearch->recursive = 0;
		$this->set('quoteResearches', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->QuoteResearch->exists($id)) {
			throw new NotFoundException(__('Invalid quote research'));
		}
		$options = array('conditions' => array('QuoteResearch.' . $this->QuoteResearch->primaryKey => $id));
		$this->set('quoteResearch', $this->QuoteResearch->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->QuoteResearch->create();
			if ($this->QuoteResearch->save($this->request->data)) {
				$this->Session->setFlash(__('The quote research has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The quote research could not be saved. Please, try again.'));
			}
		}
		$quotes = $this->QuoteResearch->Quote->find('list');
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
		if (!$this->QuoteResearch->exists($id)) {
			throw new NotFoundException(__('Invalid quote research'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->QuoteResearch->save($this->request->data)) {
				$this->Session->setFlash(__('The quote research has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The quote research could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('QuoteResearch.' . $this->QuoteResearch->primaryKey => $id));
			$this->request->data = $this->QuoteResearch->find('first', $options);
		}
		$quotes = $this->QuoteResearch->Quote->find('list');
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
		$this->QuoteResearch->id = $id;
		if (!$this->QuoteResearch->exists()) {
			throw new NotFoundException(__('Invalid quote research'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->QuoteResearch->delete()) {
			$this->Session->setFlash(__('Quote research deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Quote research was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
