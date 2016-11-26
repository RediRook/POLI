<?php   
class ImageuploadsController extends AppController {  

    var $name = 'Imageuploads';  

    var $uses = array('Imageupload');  

    var $helpers = array(  
        'Html',  
        'Form',  
        'Js',  
        'Number' // Used to show readable filesizes  
    );  

    function index() {  
        $this->layout = 'admin'; 
        $this->set(  
            'images',  
            $this->Imageupload->readFolder(WWW_ROOT.DS.'uploads')  
        );  
    }  

    function upload() {  
        // Upload an image  
        if (!empty($this->data)) {  
            // Validate and move the file  
            if($this->Imageupload->upload($this->data)) {  
                $this->Session->setFlash('The image was successfully uploaded.','flash_good');
            } else {  
                $this->Session->setFlash('There was an error with the uploaded file.','flash_bad');
            }  
              
            $this->redirect(  
                array(  
                    'action' => 'index'  
                )  
            );  
        } else {  
            $this->redirect(  
                array(  
                    'action' => 'index'  
                )  
            );  
        }  
    } 
public function delete($fileurl = null){
	
			$file = new File(WWW_ROOT .'/uploads/'.$fileurl);
			if($file->delete()){
				$this->Session->setFlash('The image was successfully deleted.','flash_good');
				$this->redirect(array('action' => 'index'));
			}else{
				$this->Session->setFlash('The image could not be deleted, please try again.','flash_bad');
				$this->redirect(array('action' => 'index'));
			}
		}
		
}  
?> 