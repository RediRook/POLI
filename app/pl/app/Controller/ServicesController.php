<?php
App::uses('AppController', 'Controller');
/**
 * Services Controller
 *
 * @property Service $Service
 */
class ServicesController extends AppController {

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
		$this->Service->recursive = 0;
		$this->set('services', $this->paginate());
	}

    public function serviceIndex() {
        if($this->Auth->user('role')=='1'){
            $this->redirect(array('controller'=>'pages','action'=>'error'));
    }
        if($this->Auth->user('role')=='2'){
            $this->redirect(array('controller'=>'pages','action'=>'error'));
        }
        if($this->Auth->user('role')=='3'){
            $this->layout='customer';

        }

        $this->Service->recursive = 0;
        $this->set('services', $this->paginate());
    }

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	/*public function view($id = null) {
		if (!$this->Service->exists($id)) {
			throw new NotFoundException(__('Invalid service'));
		}
		$options = array('conditions' => array('Service.' . $this->Service->primaryKey => $id));
		$this->set('service', $this->Service->find('first', $options));
	}*/

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
			$this->Service->create();
			if ($this->Service->save($this->request->data)) {
				$this->Session->setFlash('The service has been saved','flash_good');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The service could not be saved. Please, try again.','flash_bad');
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

		if (!$this->Service->exists($id)) {
			throw new NotFoundException(__('Invalid service'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
		if (isset( $this->params['data']['cancel'])) {
                $this->Session->setFlash('Changes were not saved. User cancelled.','flash_bad');
                $this->redirect( array( 'action' => 'index' ));
            }
			 else{
			if ($this->Service->save($this->request->data)) {
				$this->Session->setFlash('The service has been saved','flash_good');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The service could not be saved. Please, try again.','flash_bad');
			}
		} }else {
			$options = array('conditions' => array('Service.' . $this->Service->primaryKey => $id));
			$this->request->data = $this->Service->find('first', $options);
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
		$this->Service->id = $id;
		if (!$this->Service->exists()) {
			throw new NotFoundException(__('Invalid service'));
		}
		/*$this->request->onlyAllow('post', 'delete');*/
		if ($this->Service->delete()) {
			$this->Session->setFlash('Service deleted','flash_good');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('Service was not deleted','flash_bad');
		$this->redirect(array('action' => 'index'));
	}
}
