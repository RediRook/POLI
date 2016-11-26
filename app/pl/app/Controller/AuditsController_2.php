<?php
App::uses('AppController', 'Controller');
/**
 * Audits Controller
 *
 * @property Audit $Audit
 */
class AuditsController extends AppController {

/**
 * index method
 *
 * @return void
 */
    var $paginate=array(
        'limit'=>'1000000',
        'order'=>array(
            'Audit.created'=>'desc'));
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
		$this->Audit->recursive = 0;
		$this->set('audits', $this->paginate());
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
		if (!$this->Audit->exists($id)) {
			throw new NotFoundException(__('Invalid audit'));
		}
		$options = array('conditions' => array('Audit.' . $this->Audit->primaryKey => $id));
		$this->set('audit', $this->Audit->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */

}
