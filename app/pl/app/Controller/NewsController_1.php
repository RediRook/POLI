<?php
App::uses('AppController', 'Controller');
/**
 * News Controller
 *
 * @property News $News
 */
class NewsController extends AppController {

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
	
    var $paginate=array(
    'limit'=>'10000000',
        'order'=>array('News.id'=>'desc')
);
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
		$this->News->recursive = 0;
		$this->set('news', $this->paginate());
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
		if (!$this->News->exists($id)) {
			throw new NotFoundException(__('Invalid news'));
		}
		$options = array('conditions' => array('News.' . $this->News->primaryKey => $id));
		$this->set('news', $this->News->find('first', $options));
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
			$this->News->create();
			if ($this->News->save($this->request->data)) {
				$this->Session->setFlash('The news has been saved','flash_good');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The news could not be saved. Please, try again.','flash_bad');
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
		if (!$this->News->exists($id)) {
			throw new NotFoundException(__('Invalid news'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->News->save($this->request->data)) {
				$this->Session->setFlash('The news has been saved','flash_good');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The news could not be saved. Please, try again.','flash_bad');
			}
		} else {
			$options = array('conditions' => array('News.' . $this->News->primaryKey => $id));
			$this->request->data = $this->News->find('first', $options);
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
		$this->News->id = $id;
		if (!$this->News->exists()) {
			throw new NotFoundException(__('Invalid news'));
		}

		if ($this->News->delete()) {
			$this->Session->setFlash('News deleted','flash_good');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('News was not deleted','flash_bad');
		$this->redirect(array('action' => 'index'));
	}
    public function customerView(){
        if($this->Auth->user('role')=='1'){
            $this->redirect(array('controller'=>'pages','action'=>'error'));
        }
        if($this->Auth->user('role')=='2'){
            $this->redirect(array('controller'=>'pages','action'=>'error'));
        }
        if($this->Auth->user('role')=='3'){
            $this->layout='customer';

        }

        $new=$this->News->find('first',array('order'=>'id DESC'));
        $this->set('news',$new);
    }
}
