<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
/**
 * Jobs Controller
 *
 * @property Job $Job
 */
class JobsController extends AppController {
    var $name = 'Jobs';
    public $helpers = array('Html');

	
	public function beforeFilter() {
		if( !empty( $this->data ) && empty( $this->data[$this->Auth->User] ) ) {
			$this->data[$this->Auth->User] = $this->currentUser();
		}
   }
   
   	public function currentUser() {
		return array('id' => AuthComponent::user('id'));
	}

    /**
 * index method
 *
 * @return void
 */
	public function index() {
        if($this->Auth->user('role')=='1'){
            $this->layout='admin';
        }
        if($this->Auth->user('role')=='2'){
            $this->layout='staff';
        }
        if($this->Auth->user('role')=='3'){
            $this->redirect(array('controller'=>'pages','action'=>'error'));
        }
        $this->Job->recursive = 0;
        $this->set('jobs', $this->paginate());
    }

    public function feed() {
        //1. Transform request parameters to MySQL datetime format.
        $mysqlstart = date('Y-m-d H:i:s', substr($this->params['url']['start'],0,10));
        $mysqlend = date('Y-m-d H:i:s', substr($this->params['url']['end'],0,10));


        $jobs = $this->Job->find('all',array(
            'conditions' =>array('Job.startTime BETWEEN ? AND ?' => array($mysqlstart,$mysqlend)),
            'contain'=>array(
                'Service'=>array('fields'=>array('id')),
                'Staff'=>array('fields'=>array('id')),
            )));

        //3. Create the json array
        $rows = array();
        foreach($jobs as $job){
            $row = array(
                'id' => $job['Job']['id'],
                'title' => $job['Job']['title'],
                'start' => date('Y-m-d H:i', strtotime($job['Job']['startTime'])),
                'end' => date('Y-m-d H:i',strtotime($job['Job']['endTime'])),
                'body' => $job['Job']['comment'],
                'customer_id' => $job['Job']['customer_id'],
                'status'=>$job['Job']['status'],
                'staff_id'=>$job['Staff'],
                'service_id'=>$job['Service']
            );
            array_push($rows,$row);
        }
        Configure::write('debug', 0);
        $this->autoRender = false;
        $this->autoLayout = false;
        $this->header('Content-Type: application/json');
        echo json_encode($rows);
        /*
        print_r ($appointments);
        */
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
            $this->layout='staff';

        }
        if($this->Auth->user('role')=='3'){
            $this->redirect(array('controller'=>'pages','action'=>'error'));
        }
        $this->loadModel('Staff');
        $this->loadModel('Service');

        if (!$this->Job->exists($id))
        {
            throw new NotFoundException(__('Invalid job'));
        }
        $options = array(
            'conditions' => array('Job.id' => $id),
            'contain'=> array(
                'Service'),
                'Staff'
                );

        $job = $this->Job->find('first', $options);
        $this->set('job', $job);



    }







    /**
 * add method
 *
 * @return void
 */
    public function add() {
        Configure::write('debug', 0);
        $this->autoRender = false;
        $this->autoLayout = false;

        if ($this->request->is('post')){





           $start=$this->request->data['start'];

            $newStart=substr($start,0,24);
            $end=$this->request->data['end'];
            $newEnd=substr($end,0,24);
            $staffs=$this->request->data['staff_id'];

                $services=$this->request->data['service_id'];
            $this->request->data['Job']['title']=$this->request->data['title'];

            $this->request->data['Job']['startTime']=date('Y-m-d H:i:s' , strtotime($newStart));
            $this->request->data['Job']['endTime']=date('Y-m-d H:i:s' , strtotime($newEnd));
            $this->request->data['Job']['comment']=$this->request->data['body'];
            $this->request->data['Job']['customer_id']=$this->request->data['customer_id'];
            $this->request->data['Job']['status']=$this->request->data['status'];


            $index1=0;
            foreach($services as $service){
                $this->request->data['Service'][$index1]['service_id']=$service;
                $index1++;
            }
            $index2=0;
            foreach($staffs as $staff){
                $this->request->data['Staff'][$index2]['staff_id']=$staff;
                $index2++;
            }

            $this->Job->saveAll($this->request->data);
            Configure::write('debug', 0);
            $this->autoRender = false;
            $this->autoLayout = false;

            echo json_encode(null);
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

        if($this->request->is('post'))
        {
            $appt_id=$this->request->data['id'];
            if($appt_id==null)return;
            $this->request->data['Job']['id']=$appt_id;
            $start=$this->request->data['start'];

            $newStart=substr($start,0,24);
            $end=$this->request->data['end'];
            $newEnd=substr($end,0,24);
            $staffs=$this->request->data['staff_id'];
            $services=$this->request->data['service_id'];
            $this->request->data['Job']['title']=$this->request->data['title'];

            $this->request->data['Job']['startTime']=date('Y-m-d H:i:s' , strtotime($newStart));
            $this->request->data['Job']['endTime']=date('Y-m-d H:i:s' , strtotime($newEnd));
            $this->request->data['Job']['comment']=$this->request->data['body'];
            $this->request->data['Job']['customer_id']=$this->request->data['customer_id'];
            $this->request->data['Job']['status']=$this->request->data['status'];


            $index1=0;
            foreach($services as $service){
                $this->request->data['Service'][$index1]['service_id']=$service;
                $index1++;
            }
            $index2=0;
            foreach($staffs as $staff){
                $this->request->data['Staff'][$index2]['staff_id']=$staff;
                $index2++;
            };

               $this->Job->saveAll($this->request->data);

            Configure::write('debug', 0);
            $this->autoRender = false;
            $this->autoLayout = false;

            echo json_encode(null);
        }
    }
    public function dropResizeSaving()
    {

        if($this->request->is('post'))
        {
            $appt_id=$this->request->data['id'];
            if($appt_id==null)return;
            $start=$this->request->data['start'];
            $newStart=substr($start,0,24);
            $end=$this->request->data['end'];
            $newEnd=substr($end,0,24);

            $this->request->data['Job']['id']=$appt_id;
            $this->request->data['Job']['startTime']=date('Y-m-d H:i:s' , strtotime($newStart));
            $this->request->data['Job']['endTime']=date('Y-m-d H:i:s' , strtotime($newEnd));

            $this->Job->saveAll($this->request->data);
            Configure::write('debug', 0);
            $this->autoRender = false;
            $this->autoLayout = false;

            echo json_encode(null);
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
    public function delete(){
        $app_id=$this->request->data['id'];
        $rows = array();
        if($this->Job->delete($app_id)){
            $rows[]=array(1);
        }
        else
        {
            $rows[]=array(0);
        }
        Configure::write('debug', 0);
        $this->autoRender = false;
        $this->autoLayout = false;

        echo json_encode($rows);
    }
    public function calendar(){


        $customerCollection = $this->Job->Customer->find('all',array('order'=>'firstName ASC'));
        $arrCustomers = array();
        for ($a=0; count($customerCollection)> $a; $a++) {
            $arrCustomers[$customerCollection[$a]['Customer']['id']]=$customerCollection[$a]['Customer']['firstName']. " " .$customerCollection[$a]['Customer']['lastName'];
        }
        $this->set('customers',$arrCustomers);


        $this->loadModel('Staff');
        $this->loadModel('Service');
        $staff=$this->Staff->find('all',array('fields'=>array('id','staff_name')));
        $this->set('staffs', $staff);



        $this->set('services', $this->Service->find('all',array('fields'=>array('id','name'))));


    }
    public function addJob() {
        if($this->Auth->user('role')=='1'){
            $this->layout='admin';
        }
        if($this->Auth->user('role')=='2'){
            $this->layout='staff';
        }
        if($this->Auth->user('role')=='3'){
            $this->redirect(array('controller'=>'pages','action'=>'error'));
        }
        if ($this->request->is('post')) {
            $this->Job->create();
            if ($this->Job->save($this->request->data)) {
                $this->Session->setFlash('The job has been saved','flash_good');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('The job could not be saved. Please, try again.','flash_bad');
            }
        }
        $customers = $this->Job->Customer->find('list');
        $staffs = $this->Job->Staff->find('list');
        $services = $this->Job->Service->find('list');
        $this->set(compact('customers', 'staffs', 'services'));
    }

    public function editJob($id = null) {
        if($this->Auth->user('role')=='1'){
            $this->layout='admin';
        }
        if($this->Auth->user('role')=='2'){
            $this->layout='staff';
        }
        if($this->Auth->user('role')=='3'){
            $this->redirect(array('controller'=>'pages','action'=>'error'));
        }
        if (!$this->Job->exists($id)) {
            throw new NotFoundException(__('Invalid job'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Job->save($this->request->data)) {
                $this->Session->setFlash('The job has been saved','flash_good');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('The job could not be saved. Please, try again.','flash_bad');
            }
        } else {
            $options = array('conditions' => array('Job.' . $this->Job->primaryKey => $id));
            $this->request->data = $this->Job->find('first', $options);
        }
        $customers = $this->Job->Customer->find('list');
        $staffs = $this->Job->Staff->find('list');
        $services = $this->Job->Service->find('list');
        $this->set(compact('customers', 'staffs', 'services'));
    }
    public function deleteJob($id = null) {
        $this->Job->id = $id;
        if (!$this->Job->exists()) {
            throw new NotFoundException(__('Invalid job'));
        }

        if ($this->Job->delete()) {
            $this->Session->setFlash('Job deleted','flash_good');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash('Job was not deleted','flash_bad');
        $this->redirect(array('action' => 'index'));
    }
    public function daily()

    {
        if($this->Auth->user('role')=='1'){
            $this->layout='admin';
        }
        if($this->Auth->user('role')=='2'){
            $this->layout='staff';
        }
        if($this->Auth->user('role')=='3'){
            $this->redirect(array('controller'=>'pages','action'=>'error'));
        }
        $this->loadModel('Staff');
        $staffCollection = $this->Staff->find('list');
        $this->set('staffs',$staffCollection);

        if ($this->request->is('post')){
            //debug($this->request->data);
            //$queryDate = date('Y-m-d',time());
            if($this->request->data['Job']['queryDate'] != "" && $this->request->data['Job']['queryDate'] != null)
            {
                $queryDate = date('Y-m-d', strtotime($this->request->data['Job']['queryDate']));
            }
            $staff = $this->request->data['Staff']['Staff'];

            if(!is_array($staff))
            {
                $this->Session->setFlash('There are no staff selected!','flash_bad');
                $this->redirect($this->referer());
            } else {
                $jobs = $this->Job->find('all',array(
                    'contain'=>array(
                        'Job'=>array(
                            'conditions'=>array(
                                'Staff.id'=>$staff)
                        )
                    ),
                    'conditions'=>array(

                        'Job.startTime BETWEEN ? AND ?' => array(date('Y-m-d 00:00:00',strtotime($queryDate)),date('Y-m-d 23:59:59',strtotime($queryDate)))
                    )
                ));
                $this->set('results',$jobs);
            }
        }
        else{
            $conditions = array(
                'Job.startTime BETWEEN ? AND ?' => array(date('Y-m-d 00:00:00',time()),date('Y-m-d 23:59:59',time()))
            );
            $this->set('results',$this->Job->find('all',array('conditions' =>array($conditions))));
        }
    }
    public function send($id=null) {

        $this->loadModel('Staff');
        $this->loadModel('Service');
        $this->loadModel('Customer');
        if (!$this->Job->exists($id))
        {
            throw new NotFoundException(__('Invalid job'));
        }
        $options = array(
            'conditions' => array('Job.id' => $id),
            'contain'=> array(
                'Service'),
            'Staff'
        );

        $job = $this->Job->find('first', $options);
        $this->set('job', $job);


        $email = new CakeEmail('contactform');

        $email->emailFormat('html');
        $email->template('html_email');
        $email->from('lpan27@student.monash.edu');
        $email->to($job['Customer']['email']);
       $email->viewVars(array('job' => $job));
        $email->subject('Visit Sheet');
        $email->sendAs = 'html';
        $email->charset = 'utf-8';
        $email->send();

        $this->redirect(array('action' => 'daily'));


    }
    public function timeTable() {
        if($this->Auth->user('role')=='1'){
            $this->redirect(array('controller'=>'pages','action'=>'error'));
        }
        if($this->Auth->user('role')=='2'){
            $this->redirect(array('controller'=>'pages','action'=>'error'));
        }
        if($this->Auth->user('role')=='3'){
            $this->layout='customer';

        }
        $userId = $this->Auth->user();
        $jobs = $this->Job->find('all',array('conditions' =>array( 'Job.customer_id'=>$userId['customer_id'])));
        $this->set('jobs', $jobs);
        //debug($jobs);
    }

    public function viewJob($id = null) {
        if($this->Auth->user('role')=='1'){
            $this->redirect(array('controller'=>'pages','action'=>'error'));
        }
        if($this->Auth->user('role')=='2'){
            $this->redirect(array('controller'=>'pages','action'=>'error'));
        }
        if($this->Auth->user('role')=='3'){
            $this->layout='customer';

        }
        $this->loadModel('Staff');
        $this->loadModel('Service');

        if (!$this->Job->exists($id))
        {
            throw new NotFoundException(__('Invalid job'));
        }
        $options = array(
            'conditions' => array('Job.id' => $id),
            'contain'=> array(
                'Service'),
            'Staff'
        );

        $job = $this->Job->find('first', $options);
        $this->set('job', $job);



    }

}
