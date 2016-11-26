<?php
App::uses('AppController', 'Controller');
/**
 * Staffs Controller
 *
 * @property Staff $Staff
 */
class StaffsController extends AppController {

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
         'limit'=>'1000000',
        'order'=>array(
            'Staff.lastName'=>'asc'));
    public $components = array('Auth');
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
		$this->Staff->recursive = 0;
		$this->set('staffs', $this->paginate());

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
		if (!$this->Staff->exists($id)) {
			throw new NotFoundException(__('Invalid staff'));
		}
		$options = array('conditions' => array('Staff.' . $this->Staff->primaryKey => $id));
		$this->set('staff', $this->Staff->find('first', $options));
   

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
        if (!empty($this->request->data)) {
            // We can save the User data:
            // it should be in $this->request->data['User']
            if( $this->Staff->saveAll($this->request->data)){
                $id=$this->Staff->getLastInsertId();


                if($this->uploadImages($id) == false)
                    $error = true;

                if($error)
                    $this->Session->setFlash('Unable to upload photos. Try again soon', 'flash_bad');
                else
                {

                    $this->Session->setFlash('Upload photos successfully', 'flash_good');
                }
                $staff=$this->Staff->find('all',array('conditions'=>array('Staff.id'=>$id)));
                $this->Staff->User->saveField('username',$staff[0]['Staff']['email']);
                $this->Session->setFlash('The staff has been saved','flash_good');
                $this->redirect(array('action' => 'index'));

        }
         else
         {
             $this->Session->setFlash('The staff could not be saved. Please, try again.','flash_bad');
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
		if (!$this->Staff->exists($id)) {
			throw new NotFoundException(__('Invalid staff'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
            if (isset( $this->params['data']['cancel'])) {
                $this->Session->setFlash('Changes were not saved. User cancelled.','flash_bad');
                $this->redirect( array( 'action' => 'index' ));
            }
            else{
			if ($this->Staff->save($this->request->data)) {
                if($this->uploadImages($id) == false)
                    $error = true;

                if($error)
                    $this->Session->setFlash('Unable to upload photos. Try again soon', 'flash_bad');
                else
                {

                    $this->Session->setFlash('Upload photos successfully', 'flash_good');
                }

                $this->Session->setFlash('The staff has been saved','flash_good');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The staff could not be saved. Please, try again.','flash_bad');
			}
            }} else {
			$options = array('conditions' => array('Staff.' . $this->Staff->primaryKey => $id));
			$this->request->data = $this->Staff->find('first', $options);
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
    public function delete($id) {
        $this->Staff->id = $id;
        if (!$this->Staff->exists()) {
            throw new NotFoundException(__('Invalid staff'));
        }



        if ( $this->Staff->delete($id)) {
            $this->Session->setFlash('Staff deleted','flash_good');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash('Staff was not deleted','flash_bad');
        $this->redirect(array('action' => 'index'));
    }
    public function staffIndex() {
        if($this->Auth->user('role')=='1'){
            $this->redirect(array('controller'=>'pages','action'=>'error'));
        }
        if($this->Auth->user('role')=='2'){
            $this->redirect(array('controller'=>'pages','action'=>'error'));
        }
        if($this->Auth->user('role')=='3'){
            $this->layout='customer';

        }
        $this->Staff->recursive = 0;
        $this->set('staffs', $this->paginate());

    }
    public function staffView($id = null) {
        if($this->Auth->user('role')=='1'){
            $this->redirect(array('controller'=>'pages','action'=>'error'));
        }
        if($this->Auth->user('role')=='2'){
            $this->redirect(array('controller'=>'pages','action'=>'error'));
        }
        if($this->Auth->user('role')=='3'){
            $this->layout='customer';

        }
        if (!$this->Staff->exists($id)) {
            throw new NotFoundException(__('Invalid staff'));
        }
        $options = array('conditions' => array('Staff.' . $this->Staff->primaryKey => $id));
        $this->set('staff', $this->Staff->find('first', $options));

    }

  

    public function generateThumb($path, $image, $thumbHeight)
    {
        //Our thumbnails will live in the same directory as their bigger brothers, and have _thumb appended to the end of their name


        $file = explode('.', $image['name']);

        if(preg_match('/jpg|jpeg/', $file[1]))
            $src_img = imagecreatefromjpeg(WWW_ROOT . $path . "/" . $image['name']);

        else if(preg_match('/png/', $file[1]))
            $src_img = imagecreatefrompng(WWW_ROOT . $path . "/" . $image['name']);


        $oldWidth = imageSX($src_img);
        $oldHeight = imageSY($src_img);

        $aspectRatio = $oldWidth / $oldHeight;

        $thumbWidth = floor($thumbHeight * $aspectRatio);

        $dst_img=ImageCreateTrueColor($thumbWidth, $thumbHeight);
        imagecopyresampled($dst_img,$src_img, 0, 0, 0, 0, $thumbWidth, $thumbHeight, $oldWidth, $oldHeight);


        if(preg_match('/jpg|jpeg/', $file[1]))
            imagejpeg($dst_img, WWW_ROOT . $path . "/" . $file[0] . "_thumb" . "." . $file[1], 90);

        else if(preg_match('/png/', $file[1]))
            imagepng($dst_img, WWW_ROOT . $path . "/" . $file[0] . "_thumb" . "." . $file[1], 2);


        imagedestroy($dst_img);
        imagedestroy($src_img);

        return $path . "/" . $file[0] . "_thumb" . "." . $file[1];


    }

   
    public function getNamedParam($name)
    {
        //grabs and returns the specified param off the end of the URL
        if(isset($this->params['named'][$name]))
            return $this->params['named'][$name];
        else
            return null;
    }


}
