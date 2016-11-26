<?php
App::uses('AppController', 'Controller');
/**
 * Enquiries Controller
 *
 * @property Enquiry $Enquiry
 */
class EnquiriesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Enquiry->recursive = 0;
		$this->set('enquiries', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	
	
	public function view($id = null) {
		
		if (!$this->Enquiry->exists($id)) {
			throw new NotFoundException(__('Invalid enquiry'));
		}
		$options = array('conditions' => array('Enquiry.' . $this->Enquiry->primaryKey => $id));
		$this->set('enquiry', $this->Enquiry->find('first', $options));
	}
	
	public function myenquiry($id = null) {
		$id = $this->Auth->user('id');
		$enquiry = $this->Enquiry->find('first', array('conditions' => array('user_id'=>$id)));
        $this->set('enquiry', $enquiry);
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Enquiry->create();
			if ($this->Enquiry->save($this->request->data)) {
				$this->Session->setFlash(__('The enquiry has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The enquiry could not be saved. Please, try again.'));
			}
		}
		$users = $this->Enquiry->User->find('list');
		$this->set(compact('users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Enquiry->exists($id)) {
			throw new NotFoundException(__('Invalid enquiry'));
		}
		if ($this->request->is('post') || $this->request->is('put')) 
                {
			if ($this->Enquiry->save($this->request->data)) 
                        {
				$this->Session->setFlash(__('The enquiry has been saved'));
				$this->redirect(array('action' => 'index'));
			} else 
                        {
				$this->Session->setFlash(__('The enquiry could not be saved. Please, try again.'));
			}
		} 
                else 
                {
			$options = array('conditions' => array('Enquiry.' . $this->Enquiry->primaryKey => $id));
			$this->request->data = $this->Enquiry->find('first', $options);
		}
		$users = $this->Enquiry->User->find('list');
		$this->set(compact('users'));
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
		$this->Enquiry->id = $id;
		if (!$this->Enquiry->exists()) {
			throw new NotFoundException(__('Invalid enquiry'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Enquiry->delete()) {
			$this->Session->setFlash(__('Enquiry deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Enquiry was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
