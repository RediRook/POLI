<?php
App::uses('AppController', 'Controller');
/**
 * Promotions Controller
 *
 * @property Promotion $Promotion
 */
class PromotionsController extends AppController {

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
        'order'=>array('Promotion.id'=>'desc'));
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
		$this->Promotion->recursive = 0;
		$this->set('promotions', $this->paginate());
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
		if (!$this->Promotion->exists($id)) {
			throw new NotFoundException(__('Invalid promotion'));
		}
		$options = array('conditions' => array('Promotion.' . $this->Promotion->primaryKey => $id));
		$this->set('promotion', $this->Promotion->find('first', $options));
        $this->set('photos', $this->Promotion->Photo->find('all', array('conditions'=>array('Photo.promotion_id'=>$id))));

    }

/**
 * add method
 *
 * @return void
 */
	public function add() { if($this->Auth->user('role')=='1'){
            $this->layout='admin';
        }
        if($this->Auth->user('role')=='2'){
            $this->redirect(array('controller'=>'pages','action'=>'error'));
        }
        if($this->Auth->user('role')=='3'){
            $this->redirect(array('controller'=>'pages','action'=>'error'));
        }

		if ($this->request->is('post')) {
			$this->Promotion->create();
			if ($this->Promotion->saveAll($this->request->data)) {
                $id=$this->Promotion->getLastInsertId();


                if($this->uploadImages($id) == false)
                    $error = true;

                if($error)
                    $this->Session->setFlash('Unable to upload photos. Try again soon', 'flash_bad');
                else
                {

                    $this->Session->setFlash('Upload photos successfully', 'flash_good');
                }

				$this->Session->setFlash('The promotion has been saved','flash_good');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The promotion could not be saved. Please, try again.','flash_bad');
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
        if (!$this->Promotion->exists($id)) {
            throw new NotFoundException(__('Invalid promotion'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if (isset( $this->params['data']['cancel'])) {
                $this->Session->setFlash('Changes were not saved. User cancelled.','flash_bad');
                $this->redirect( array( 'action' => 'index' ));
            }
            else{
                if ($this->Promotion->save($this->request->data)) {
                    if($this->uploadImages($id) == false)
                        $error = true;

                    if($error)
                        $this->Session->setFlash('Unable to upload photos. Try again soon', 'flash_bad');
                    else
                    {

                        $this->Session->setFlash('Upload photos successfully', 'flash_good');
                    }

                    $this->Session->setFlash('The promotion has been saved','flash_good');
                    $this->redirect(array('action' => 'index'));
                } else {
                    $this->Session->setFlash('The promotion could not be saved. Please, try again.','flash_bad');
                }
            }} else {
            $options = array('conditions' => array('Promotion.' . $this->Promotion->primaryKey => $id));
            $this->request->data = $this->Promotion->find('first', $options);
            $this->set('photos', $this->Promotion->Photo->find('all', array('conditions'=>array('Photo.promotion_id'=>$id))));
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
		$this->Promotion->id = $id;
		if (!$this->Promotion->exists()) {
			throw new NotFoundException(__('Invalid promotion'));
		}

		if ($this->Promotion->delete()) {
			$this->Session->setFlash('Promotion deleted','flash_good');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('Promotion was not deleted','flash_bad');
		$this->redirect(array('action' => 'index'));
	}

    public function uploadImages($id)
    {
        //the final path where the photo's will reside
        $path = "promotionImage/" . $id;

        //if there are any photos (if the first element in the photo array has a filename)
        if($this->request->data['Promotion']['photos'][0]['name'] != "")
        {

            //if folder does not already exist, create it
            if(!file_exists($path))
            {
                mkdir($path);
            }

            //declare array of allowed file extensions
            $allowed_extensions = array('jpg', 'jpeg', 'png');

            //loop through them
            foreach($this->request->data['Promotion']['photos'] as $file)
            {

                //get the file extension of the file we wish to upload
                $ext = substr(strtolower(strrchr($file['name'], '.')), 1);

                //only upload if the extension is valid (our array of vaid extensions is declared in AppController)
                if(in_array($ext, $allowed_extensions))
                {

                    //move the uploaded file to its final resting place
                    if(move_uploaded_file($file['tmp_name'], WWW_ROOT . $path . "/" . $file['name']))
                    {
                        //if upload was successfull, create record in photo table
                        $this->Promotion->Photo->create();

                        //set the foreign key in the photo table to reference the Vandalism we added earlier
                        $this->Promotion->Photo->set('promotion_id', $id);

                        //store the path to the image in the database so we can easily display it
                        $this->Promotion->Photo->set('file_path', $path . "/" . $file['name']);

                        //generate thumbnail 100px tall and store path to it in database
                        $this->Promotion->Photo->set('thumb_path', $this->generateThumb($path, $file, 100));

                        //save record in the photo table
                        if($this->Promotion->Photo->save($this->request->data) == false)
                            return false;
                    }
                    else
                        return false;
                }
                else
                    return false;
            }
        }

        return true;

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

    public function deletePhoto()
    {
        $promotionID = $this->getNamedParam('promotionid');
        $photoID = $this->getNamedParam('photoid');


        $this->Promotion->id = $promotionID;
        $this->Promotion->Photo->delete($photoID);

        //unlink($this->webroot . "app/webroot/" . $this->data['Photo']['file_path']);

        $this->redirect(array('controller' => 'promotions', 'action' => 'edit', $promotionID));
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
