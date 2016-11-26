<?php
App::uses('AppController', 'Controller');
/**
 * Pagecontents Controller
 *
 * @property Pagecontent $Pagecontent
 */
class PagecontentsController extends AppController {

public $helpers = array('Tinymce');

/**Drafts**/

/**
 * index method
 *
 * @return void
 */

  
  
  	public function beforeFilter() {
		if( !empty( $this->data ) && empty( $this->data[$this->Auth->User] ) ) {
			$this->data[$this->Auth->User] = $this->currentUser();
		}
   }
   
   	public function currentUser() {
		return array('id' => AuthComponent::user('id'));
	}
	
	public function index() {
        if($this->Auth->user('role')=='1'){
            $this->layout='admin';
        }
        if($this->Auth->user('role')=='2'){
            $this->redirect(array('controller'=>'pages','action'=>'error'));
        }
        if($this->Auth->user('role')=='3'){
            $this->redirect(array('controller'=>'pages','action'=>'error'));
        }
		$this->Pagecontent->recursive = 0;
		$this->set('pagecontents', $this->paginate());
		$this->layout="admin";
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
        if($this->Auth->user('role')=='1'){
            $this->layout='admin';
        }
        if($this->Auth->user('role')=='2'){
            $this->redirect(array('controller'=>'pages','action'=>'error'));
        }
        if($this->Auth->user('role')=='3'){
            $this->redirect(array('controller'=>'pages','action'=>'error'));
        }
		if (!$this->Pagecontent->exists($id)) {
			throw new NotFoundException(__('Invalid pagecontent'));
		}
		$options = array('conditions' => array('Pagecontent.' . $this->Pagecontent->primaryKey => $id));
		$this->set('pagecontent', $this->Pagecontent->find('first', $options));
		$this->layout="admin";
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
        if($this->Auth->user('role')=='1'){
            $this->layout='admin';
        }
        if($this->Auth->user('role')=='2'){
            $this->redirect(array('controller'=>'pages','action'=>'error'));
        }
        if($this->Auth->user('role')=='3'){
            $this->redirect(array('controller'=>'pages','action'=>'error'));
        }

		if ($this->request->is('post')) {
			$this->Pagecontent->create();
			if ($this->Pagecontent->save($this->request->data)) {
				$this->Session->setFlash(__('The pagecontent has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The pagecontent could not be saved. Please, try again.'));
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
        if($this->Auth->user('role')=='1'){
            $this->layout='admin';
        }
        if($this->Auth->user('role')=='2'){
            $this->redirect(array('controller'=>'pages','action'=>'error'));
        }
        if($this->Auth->user('role')=='3'){
            $this->redirect(array('controller'=>'pages','action'=>'error'));
        }

		if (!$this->Pagecontent->exists($id)) {
			throw new NotFoundException(__('Invalid pagecontent'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Pagecontent->save($this->request->data)) {
				$this->Session->setFlash('The pagecontent has been saved','flash_good');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The pagecontent could not be saved. Please, try again.','flash_bad');
			}
		} else {
			$options = array('conditions' => array('Pagecontent.' . $this->Pagecontent->primaryKey => $id));
			$this->request->data = $this->Pagecontent->find('first', $options);
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
		$this->Pagecontent->id = $id;
		if (!$this->Pagecontent->exists()) {
			throw new NotFoundException(__('Invalid pagecontent'));
		}

		if ($this->Pagecontent->delete()) {
			$this->Session->setFlash('Pagecontent deleted','flash_good');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('Pagecontent was not deleted','flash_bad');
		$this->redirect(array('action' => 'index'));

	}
}
