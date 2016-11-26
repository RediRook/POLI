<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
App::uses('CakeTime', 'Utility');
/**
 * Appointments Controller
 *
 * @property Appointment $Appointment
 */
class AppointmentsController extends AppController {
    var $name = 'Appointments';
    public $helpers = array('Html');
    

	


    /**
 * index method
 *
 * @return void
 */
	public function index() {
        
        $this->Appointment->recursive = 0;
        $this->set('appointments', $this->paginate());
    }

    public function feed() {
        //1. Transform request parameters to MySQL datetime format.
        $mysqlstart = date('Y-m-d H:i:s', substr($this->params['url']['start'],0,10));
        $mysqlend = date('Y-m-d H:i:s', substr($this->params['url']['end'],0,10));


        $appointments = $this->Appointment->find('all',array(
            'contain'=>array(
                 
                'Employee'=>array('fields'=>array('id')),
            )));

        //3. Create the json array
        $rows = array();
        foreach($appointments as $appointment){
            $row = array(
                'id' => $appointment['Appointment']['id'],
                'title' => $appointment['Appointment']['title'],
                'start' => date('Y-m-d H:i', strtotime($appointment['Appointment']['startTime'])),
                'end' => date('Y-m-d H:i',strtotime($appointment['Appointment']['endTime'])),
                'applicant_id' => $appointment['Appointment']['applicant_id'],
                'employee_id'=>$appointment['Employee']['id'],
                'status'=>$appointment['Appointment']['status'],
               
            );
            array_push($rows,$row);
        }
        //debug($row);
        //Configure::write('debug', 0);
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
       
        $this->loadModel('Employee');
         

        if (!$this->Appointment->exists($id))
        {
            throw new NotFoundException(__('Invalid appointment'));
        }
        $options = array(
            'conditions' => array('Appointment.id' => $id));

        $appointment = $this->Appointment->find('first', $options);
        $this->set('appointment', $appointment);



    }







    /**
 * add method
 *
 * @return void
 */
    public function Add() {
        Configure::write('debug', 0);
        $this->autoRender = false;
        $this->autoLayout = false;
        $this->LoadModel('Employee');
        if ($this->request->is('post')){

            
           $start=$this->request->data['start'];
           
            $newStart=substr($start,0,24);
            $end=$this->request->data['end'];
            $newEnd=substr($end,0,24);
            $date = date('Y-m-d H:i:s');
            $this->request->data['Appointment']['title']=$this->request->data['title'];

            $this->request->data['Appointment']['startTime']=date('Y-m-d H:i:s' , strtotime($newStart));
            $this->request->data['Appointment']['endTime']=date('Y-m-d H:i:s' , strtotime($newEnd));
            $this->request->data['Appointment']['applicant_id']=$this->request->data['applicant_id'];
            $this->request->data['Appointment']['employee_id']=$this->request->data['employee_id'];
            $this->request->data['Appointment']['status']=$this->request->data['status'];
            $data = $this->request->data;
            $check = $this->Appointment->find('count', array('conditions' => array('Appointment.applicant_id' => $data['Appointment']['applicant_id'], 'Appointment.status' => 'notFinished')));
            if ($date < $this->request->data['Appointment']['startTime']){
                if($check == 1){
                    echo window.open('test');
                }
                else{
                if($this->Appointment->saveAll($data)) {
                    $this->email($data);
            }
                }
            }
            
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
            $this->request->data['Appointment']['id']=$appt_id;
            $start=$this->request->data['start'];

            $newStart=substr($start,0,24);
            $end=$this->request->data['end'];
            $newEnd=substr($end,0,24);
            $date = date('Y-m-d H:i:s');
            $this->request->data['Appointment']['title']=$this->request->data['title'];

            $this->request->data['Appointment']['startTime']=date('Y-m-d H:i:s' , strtotime($newStart));
            $this->request->data['Appointment']['endTime']=date('Y-m-d H:i:s' , strtotime($newEnd));
            $this->request->data['Appointment']['applicant_id']=$this->request->data['applicant_id'];
            $this->request->data['Appointment']['employee_id']=$this->request->data['employee_id'];
            $this->request->data['Appointment']['status']=$this->request->data['status'];
            $data = $this->request->data;
            $check = $this->Appointment->find('count', array('conditions' => array( 'AND' => array( 
    array('Appointment.applicant_id' => $data['Appointment']['applicant_id']),
    array('Appointment.status' => 'notFinished')))));
            if ($date < $this->request->data['Appointment']['startTime']){
                if($check == 1) {
                    $this->Appointment->saveAll($data);
                    if($data['Appointment']['status'] == 'notFinished'){
                    $this->email1($data);}
                    else {
                    $this->email2($data);
                    }
                }
            }
            //Configure::write('debug', 0);
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

            $this->request->data['Appointment']['id']=$appt_id;
            $this->request->data['Appointment']['startTime']=date('Y-m-d H:i:s' , strtotime($newStart));
            $this->request->data['Appointment']['endTime']=date('Y-m-d H:i:s' , strtotime($newEnd));
            $data = $this->request->data;
            if ($this->Appointment->saveAll($data)) {
                $this->email1($data);
            };
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
        $this->email_delete($app_id);
        if($this->Appointment->delete($app_id)){
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
        $this->LoadModel('User');
        $this->LoadModel('Employee');
        $this->LoadModel('Applicant');
        $applicantCollection = $this->Appointment->Applicant->find('all',array('order'=>'Applicant.first_name ASC'));
        $arrApplicant = array();
        for ($a=0; count($applicantCollection)> $a; $a++) {
            $arrApplicant[$applicantCollection[$a]['Applicant']['id']]=$applicantCollection[$a]['Applicant']['first_name']. " " .$applicantCollection[$a]['Applicant']['surname'];
        }
        $this->set('applicants',$arrApplicant);
        $loggedInUser = $this->Auth->user('id');
        $user = $this->User->find('first', array('conditions' => array('User.id' => $loggedInUser), 'recursive' => -1));
        //$clientcase = $this->Clientcase->find('first', array('Clientcase.user_id' => $user['User']['id']));
        $employees = $this->Employee->find('first', array('fields' => array('id'), 'Employee.user_id' => $user['User']['id'], 'recursive' => -1));
        $this->set('employees',$employees);
        
        //$this->LoadModel('Employee');
       // $employeeCollection = $this->Employee->find('all', array('fields' => array('id', 'first_name', 'surname'), 'recursive' => -1));
        //    $list = Set::combine( 
        // $employeeCollection, 
       // '{n}.Employee.id', 
        // array('%s %s', '{n}.Employee.first_name', '{n}.Employee.surname'));
        //    $this->set('employees',$list);
    }
    public function addAppointment() {
       $this->LoadModel('Employee');
         $applicantsCollection = $this->Appointment->Applicant->find('all', array('fields' => array('id', 'first_name', 'surname'), 'recursive' => -1));
         $appList = Set::combine( 
         $applicantsCollection, 
        '{n}.Applicant.id', 
         array('%s %s', '{n}.Applicant.first_name', '{n}.Applicant.surname'));
         $employeeCollection = $this->Employee->find('all', array('fields' => array('id', 'first_name', 'surname'), 'recursive' => -1));
            $list = Set::combine( 
         $employeeCollection, 
        '{n}.Employee.id', 
         array('%s %s', '{n}.Employee.first_name', '{n}.Employee.surname')); 
        
        $this->set('employees',$list);
        $this->set('applicants',$appList);
        
        if ($this->request->is('post')) {
            $employee = $this->request->data['Employee']['Employee'];
            $applicant = $this->request->data['Applicant']['Applicant'];
            
            $this->Appointment->create();
            if(!is_array($employee))
            {
                $this->Session->setFlash('There are no employee selected!');
                $this->redirect($this->referer());
            } if(!is_array($applicant)) {
                $this->Session->setFlash('There are no Applicant selected!');
                $this->redirect($this->referer());
            }   else {
            $data = $this->request->data;
            unset($data['ok']);
            
            $data['Appointment']['employee_id'] = $data['Employee']['Employee'][0];
            unset($data['Employee']);
            $data['Appointment']['applicant_id'] = $data['Applicant']['Applicant'][0];
            unset($data['Applicant']);
            if ($this->Appointment->save($data)) {
                $this->Session->setFlash('The appointment has been saved','success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('The appointment could not be saved. Please, try again.');
            }
        }
        }
         
        $this->set(compact('applicants', 'employees' ));
    }

    public function editAppointment($id = null) {
         $this->LoadModel('Employee');
        if (!$this->Appointment->exists($id)) {
            throw new NotFoundException(__('Invalid appointment'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Appointment->save($this->request->data)) {
                $this->Session->setFlash('The appointment has been saved','success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('The appointment could not be saved. Please, try again.');
            }
        } else {
            $options = array('conditions' => array('Appointment.' . $this->Appointment->primaryKey => $id));
            $this->request->data = $this->Appointment->find('first', $options);
        }

        $employees = $this->Appointment->Employee->find('list');
        $applicant = $this->Appointment->Applicant->find('list');
        
        $this->set(compact('applicant', 'employees' ));
    }
    public function deleteAppointment($id = null) {
        $this->Appointment->id = $id;
        if (!$this->Appointment->exists()) {
            throw new NotFoundException(__('Invalid appointment'));
        }

        if ($this->Appointment->delete()) {
            $this->Session->setFlash('Appointment deleted','success');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash('Appointment was not deleted');
        $this->redirect(array('action' => 'index'));
    }
    public function daily()

    {
        
        $this->loadModel('Employee');
        $employeeCollection = $this->Employee->find('all', array('fields' => array('id', 'first_name', 'surname'), 'recursive' => -1));
        $list = Set::combine( 
        $employeeCollection, 
        '{n}.Employee.id', 
         array('%s %s', '{n}.Employee.first_name', '{n}.Employee.surname')); 
        
        $this->set('employees',$list);
        
        if ($this->request->is('post')){
            //debug($this->request->data);
            //$queryDate = date('Y-m-d',time());
            if($this->request->data['Appointment']['queryDate'] != "" && $this->request->data['Appointment']['queryDate'] != null)
            {
                $queryDate = date('Y-m-d', strtotime($this->request->data['Appointment']['queryDate']));
            }
            
            $employee = $this->request->data['Employee']['Employee'];
            
            if(!is_array($employee))
            {
                $this->Session->setFlash('There are no employee selected!');
                $this->redirect($this->referer());
            } else {
                $appointments= $this->Appointment->find('all',array(
                            'conditions'=>array(
                    'Appointment.employee_id'=>$employee, 'Appointment.startTime BETWEEN ? AND ?' => array(date('Y-m-d 00:00:00',strtotime($queryDate)),date('Y-m-d 23:59:59',strtotime($queryDate)))
                    )
                ));
                $this->set('results',$appointments);
            }
        }
        else{
            $conditions = array(
                'Appointment.startTime BETWEEN ? AND ?' => array(date('Y-m-d 00:00:00',time()),date('Y-m-d 23:59:59',time()))
            );
            $all = $this->Appointment->find('all',array('conditions' =>array($conditions)));
            $this->set('results', $all);
        }
    }
    public function email($data) {
        $this->loadModel('Applicant');
        $this->loadModel('Appointment');
        
        $Appointment = $this->Appointment->find('first', array('conditions' => array('Appointment.startTime' => $data['Appointment']['startTime'])));
        $applicants = $this->Applicant->find('first', array('conditions' => array('Applicant.id' => $Appointment['Appointment']['applicant_id']), 'fields' => array('Applicant.email', 'Applicant.first_name')));
        $start = date('D, d M Y H:i A', strtotime($data['Appointment']['startTime']));
        $end = date('D, d M Y H:i A', strtotime($data['Appointment']['endTime']));
        $name = $applicants['Applicant']['first_name']. " " .$applicants['Applicant']['surname'];
        $activate_url = 'http://projects.polaron.com.au/login';
        $Email = new CakeEmail();
        $Email->config('default');

        $Email->sender(array('polarontest@gmail.com' => 'Polaron'));
        $Email->from(array('polarontest@gmail.com' => 'Polaron'));
        $Email->to($applicants['Applicant']['email']);
        $Email->subject('Appointment Made!');
        $Email->template('appointment');
        $Email->emailFormat('text');
        $Email->viewVars(array('Name' => $name, 'Start' => $start, 'End' => $end, 'Description' => $Appointment['Appointment']['title'], 'Active' => $activate_url));


        $Email->send();
    }
  
        public function email1($data) {
        $this->loadModel('Applicant');
        $this->loadModel('Appointment');
        
        $Appointment = $this->Appointment->find('first', array('conditions' => array('Appointment.startTime' => $data['Appointment']['startTime'])));
        $applicants = $this->Applicant->find('first', array('conditions' => array('Applicant.id' => $Appointment['Appointment']['applicant_id']), 'fields' => array('Applicant.email', 'Applicant.first_name')));
        $start = date('D, d M Y H:i A', strtotime($data['Appointment']['startTime']));
        $end = date('D, d M Y H:i A', strtotime($data['Appointment']['endTime']));
        $name = $applicants['Applicant']['first_name']. " " .$applicants['Applicant']['surname'];
        $activate_url = 'http://projects.polaron.com.au/login';
        $Email = new CakeEmail();
        $Email->config('default');

        $Email->sender(array('polarontest@gmail.com' => 'Polaron'));
        $Email->from(array('polarontest@gmail.com' => 'Polaron'));
        $Email->to($applicants['Applicant']['email']);
        $Email->subject('Appointment Edited!');
        $Email->template('appointment_edit');
        $Email->emailFormat('text');
        $Email->viewVars(array('Name' => $name, 'Start' => $start, 'End' => $end, 'Description' => $Appointment['Appointment']['title'], 'Active' => $activate_url));


        $Email->send();
    }
    
        public function email2($data) {
        $this->loadModel('Applicant');
        $this->loadModel('Appointment');
        
        $Appointment = $this->Appointment->find('first', array('conditions' => array('Appointment.startTime' => $data['Appointment']['startTime'])));
        $applicants = $this->Applicant->find('first', array('conditions' => array('Applicant.id' => $Appointment['Appointment']['applicant_id']), 'fields' => array('Applicant.email', 'Applicant.first_name')));
        $first = $applicants['Applicant']['first_name'];
        $last = $applicants['Applicant']['surname'];
        $name = $first. " " .$last;
        $Email = new CakeEmail();
        $Email->config('default');

        $Email->sender(array('polarontest@gmail.com' => 'Polaron'));
        $Email->from(array('polarontest@gmail.com' => 'Polaron'));
        $Email->to($applicants['Applicant']['email']);
        $Email->subject('Appointment Finished!');
        $Email->template('appointment_finished');
        $Email->emailFormat('text');
        $Email->viewVars(array('Name' => $name));


        $Email->send();
    }
    
        public function email_delete($app_id) {
        $this->loadModel('Applicant');
        $this->loadModel('Appointment');
        
        $Appointment = $this->Appointment->find('first', array('conditions' => array('Appointment.id' => $app_id)));
        $applicants = $this->Applicant->find('first', array('conditions' => array('Applicant.id' => $Appointment['Appointment']['applicant_id']), 'fields' => array('Applicant.email', 'Applicant.first_name')));
        $name = $applicants['Applicant']['first_name'];
        $Email = new CakeEmail();
        $Email->config('default');

        $Email->sender(array('polarontest@gmail.com' => 'Polaron'));
        $Email->from(array('polarontest@gmail.com' => 'Polaron'));
        $Email->to($applicants['Applicant']['email']);
        $Email->subject('Appointment Canceled!');
        $Email->template('appointment_cancel');
        $Email->emailFormat('text');
        $Email->viewVars(array('Name' => $name));


        $Email->send();
    }
    
    public function timeTable() {
        
         
        $appointments = $this->appointment->find('all',array('conditions' =>array( 'Appointment.customer_id'=>$userId['customer_id'])));
        $this->set('appointments', $appointments);
        //debug($appointments);
    }

    public function viewAppointment($id = null) {
        
        $this->loadModel('Employee');
         

        if (!$this->Appointment->exists($id))
        {
            throw new NotFoundException(__('Invalid appointment'));
        }
        $options = array(
            'conditions' => array('Appointment.id' => $id),
            'contain'=> array(
                 ),
            'Employee'
        );

        $appointment = $this->Appointment->find('first', $options);
        $this->set('appointment', $appointment);



    }

}
