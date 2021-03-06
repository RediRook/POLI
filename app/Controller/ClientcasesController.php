<?php

App::uses('AppController', 'Controller');

/**
 * Clientcases Controller
 *
 * @property Clientcase $Clientcase
 * @property PaginatorComponent $Paginator
 */
class ClientcasesController extends AppController {

    public $components = array('Paginator');

    /**
     * index method
     *
     * Displays a dynamically-searchable list of cases.
     * List can be filtered by status.
     */
    public function index($id = null) {
        $this->loadModel('Status');
        $this->Clientcase->recursive = 0;
        if (empty($id)) {
            $clientcases = $this->Clientcase->find('all');
        } else {
            $clientcases = $this->Clientcase->find('all', array('conditions' => array('Clientcase.status_id' => $id)));
        }

        if ($this->request->is('post') || $this->request->is('put')) {
            return $this->redirect(array('controller' => 'clientcases', 'action' => 'index', $this->request->data['Clientcases']['status_id']));
        }

        $statuses = $this->Status->find('list');
        $this->set(compact('statuses', 'clientcases', 'id'));
    }

    /**
     * view method
     *
	 *
     *
     * The case page for a client's case. Contains virtually all of the information relating to the case.
     */
    public function view($id = null) {
        if (!$this->Clientcase->exists($id)) {
            throw new NotFoundException(__('Invalid Case.'));
        }
        $userid = $this->Session->read('UserAuth.User.id');
        $this->loadModel('Applicant');
        $this->loadModel('Document');
        $this->loadModel('Employee');
        $this->loadModel('Archiveloan');
        $this->loadModel('Casestatus');
        $this->loadModel('Status');
        $this->loadModel('Documenttype');
        $this->loadModel('Ancestortype');
        $this->loadModel('Archive');
        $this->loadModel('User');
        $this->loadModel('Address');
        $this->loadModel('ApplicantQuote');
        $this->loadModel('Quote');
        $this->Loadmodel('ResearchTask');
        $this->LoadModel('ResearchStep');

        $documentTypes = $this->Documenttype->find('list', array('fields' => array('Documenttype.id', 'Documenttype.type'), 'order' => 'type ASC'));
        $ancestorTypes = $this->Ancestortype->find('list', array('fields' => array('Ancestortype.id', 'Ancestortype.ancestor_type'), 'order' => 'ancestor_type ASC'));

        if ($this->request->is('post') || $this->request->is('put')) {
            $this->Archiveloan->save($this->request->data);
        }

        $statuses = $this->Casestatus->Status->find('list');
        $employee = $this->Employee->find('first', array('conditions' => array('Employee.user_id' => $userid)));
        $clientcase = $this->Clientcase->find('first', array('conditions' => array('Clientcase.' . $this->Clientcase->primaryKey => $id)));
        $archivecount = $this->Clientcase->find('count', array('conditions' => array('Clientcase.archive_id' => $clientcase['Clientcase']['archive_id'])));


        $applicantslist = $this->Applicant->find('list', array('conditions' => array('Applicant.clientcase_id' => $clientcase['Clientcase']['id']), 'fields' => array('Applicant.id', 'Applicant.first_name'), 'order' => 'first_name ASC'));

        $options = array('conditions' => array('User.id' => $clientcase['Clientcase']['user_id']));
        $this->set('updateAppointmentDate', $this->User->find('all', $options));

        //$applicants = $this->Applicant->find('all', array('conditions' => array('Applicant.clientcase_id' => $id), 'order'=>'first_name ASC', 'recursive' => -1));
        $mainapplicant = $this->Applicant->find('first', array('conditions' => array('Applicant.id' => $clientcase['Clientcase']['applicant_id'])));

        $applicants = $this->Applicant->find('all', array('conditions' => array('Applicant.clientcase_id' => $clientcase['Clientcase']['id'], 'NOT' => array('Applicant.id' => $clientcase['Clientcase']['applicant_id']))));

        $address = $this->Address->find('first', array('conditions' => array('Address.applicant_id' => $id, 'Address.date_changed' => NULL)));
        $options = array('conditions' => array('Document.archive_id' => $clientcase['Clientcase']['archive_id'], 'Document.applicant_id' => NULL, 'Document.copy_type' => 'Digital'));
        $this->set('ancestordocuments', $this->Document->find('all', $options), $this->Paginator->paginate());


        $options = array('conditions' => array('Document.archive_id' => $clientcase['Clientcase']['archive_id'], 'Document.applicant_id' => NULL, 'NOT' => array('Document.copy_type' => 'Digital')));
        $this->set('physicalancdocuments', $this->Document->find('all', $options), $this->Paginator->paginate());

        $options = array('conditions' => array('Document.archive_id' => $clientcase['Clientcase']['archive_id'], 'Document.ancestortype_id' => NULL, 'NOT' => array('Document.copy_type' => 'Digital')), 'order' => 'applicant_id ASC');
        $this->set('physicalappdocuments', $this->Document->find('all', $options), $this->Paginator->paginate());


        $options = array('conditions' => array('Document.archive_id' => $clientcase['Clientcase']['archive_id'], 'Document.ancestortype_id' => NULL, 'Document.copy_type' => 'Digital'), 'order' => 'applicant_id ASC');
        $this->set('applicantdocuments', $this->Document->find('all', $options), $this->Paginator->paginate());
        $casestatuses = $this->Casestatus->find('all', array('conditions' => array('Casestatus.clientcase_id' => $clientcase['Clientcase']['id']), 'order' => array('Casestatus.date_updated DESC')));
        $currentloan = $this->Archiveloan->find('first', array('conditions' => array('Archiveloan.archive_id' => $clientcase['Clientcase']['archive_id'], 'Archiveloan.date_returned' => NULL)));
        $user = $this->User->find('first', array('conditions' => array('User.id' => $clientcase['Clientcase']['user_id'])));

        $appdate = date('d/m/Y', strtotime($clientcase['Clientcase']['appointment_date']));

        $addresses = $this->Address->find('all', array('conditions' => array('Address.applicant_id' => $clientcase['Clientcase']['applicant_id'])));

        $quoteApplicants = $this->Applicant->find('all', array('conditions' => array('Applicant.clientcase_id' => $id), 'order' => 'first_name ASC', 'recursive' => -1));

        $applicant_id = Set::classicExtract($quoteApplicants, '{n}.Applicant.id');
        //find all quotes that were made for the applicant id
        $applicantquotes = $this->ApplicantQuote->find('all', array('conditions' => array('ApplicantQuote.applicant_id' => $applicant_id)));
        //extract the quote id out of the applicat_quotes table
        $quote_id = Set::classicExtract($applicantquotes, '{n}.ApplicantQuote.quote_id');
        //find the quotes using the quote id

        $quotes = $this->Quote->find('all', array('conditions' => array('Quote.id' => $quote_id), 'recursive' => 0));
    
        $tasks = $this->ResearchTask->find('all', array('conditions' => array('clientcase_id' => $id), 'recursive' => -1));

        foreach ($tasks as $task) {
            $status = $task['ResearchTask']['status'];
            $completeCount = 0;
            $ongoingCount = 0;
            $pendingCount = 0;
            $steps = $this->ResearchStep->find('all', array('conditions' => array('ResearchStep.task_id' => $task['ResearchTask']['id']), 'recursive' => -1));
            $totalSteps = count($steps);
            foreach ($steps as $step) {
                if ($step['ResearchStep']['status'] == 'Complete') {
                    $completeCount++;
                }
                if ($step['ResearchStep']['status'] == 'Ongoing') {
                    $ongoingCount++;
                }

                if ($completeCount >= $totalSteps) {
                    $task['ResearchTask']['status'] = 'Complete';
                } elseif (($ongoingCount > 0 && $completeCount > 0) || $ongoingCount > 0 || $pendingCount > 0) {
                    $task['ResearchTask']['status'] = 'Ongoing';
                } elseif ($completeCount == 0 && $ongoingCount == 0) {
                    $task['ResearchTask']['status'] = 'Pending';
                }

                if ($task['ResearchTask']['status'] != $status) {
                    $this->ResearchTask->save($task);
                }
            }
        }
        
        $tasks = $this->ResearchTask->find('all', array('conditions' => array('clientcase_id' => $id), 'recursive' => -1));
        $totalTaskCount = $this->ResearchTask->find('count', array('conditions' => array('clientcase_id' => $id)));
        $completedTaskCount = $this->ResearchTask->find('count', array('conditions' => array('clientcase_id' => $id, 'ResearchTask.status' => 'Complete')));

        $this->set(compact('clientcase', 'applicants', 'currentloan', 'employee', 'casestatuses', 'statuses', 'id', 'documentTypes', 'ancestorTypes', 'applicantslist', 'user', 'addresses', 'archivecount', 'address', 'mainapplicant', 'appdate', 'quoteApplicants', 'quotes', 'tasks', 'totalTaskCount', 'completedTaskCount'));
    }

    public function denied($id = null) {
        $this->loadModel('Applicant');
        $clientcase = $this->Clientcase->find('first', array('conditions' => array('Clientcase.' . $this->Clientcase->primaryKey => $id)));
        $mainapplicant = $this->Applicant->find('first', array('conditions' => array('Applicant.id' => $clientcase['Clientcase']['applicant_id'])));
        $this->set(compact('clientcase', 'id', 'mainapplicant'));
    }

    public function editAppointmentDate() {
        if ($this->request->is('post') || $this->request->is('put')) {
            $this->request->data['Clientcase']['appointment_date'] = date('Y-m-d', strtotime(str_replace('/', '-', $this->request->data['Clientcase']['appointmentDate'])));
            if ($this->Clientcase->save($this->request->data, false)) {
                $this->Session->setFlash(__('The Appointment Date has been edited', null), 'default', array('class' => 'alert-success'));
                return $this->redirect(array('controller' => 'clientcases', 'action' => 'view', $this->request->data['Clientcase']['id']));
            } else {
                $this->Session->setFlash(__('The Appointment Date could not be edited. Please, try again.', null), 'default', array('class' => 'alert-danger'));
            }
        }
    }

    public function updateAppointmentDate() {
        if ($this->request->is('post') || $this->request->is('put')) {
            $this->request->data['Clientcase']['appointment_date'] = date('Y-m-d', strtotime(str_replace('/', '-', $this->request->data['Clientcase']['appointmentDate'])));
            if ($this->Clientcase->save($this->request->data, false)) {
                $this->Session->setFlash(__('The Appointment Date has been updated', null), 'default', array('class' => 'alert-success'));
                return $this->redirect(array('controller' => 'clientcases', 'action' => 'view', $this->request->data['Clientcase']['id']));
            } else {
                $this->Session->setFlash(__('The Appointment Date could not be updated. Please, try again.', null), 'default', array('class' => 'alert-danger'));
            }
        }
    }

    public function changeMainApplicant() {
        $this->loadModel('Applicant');
        if ($this->request->is('post') || $this->request->is('put')) {

            $applicant = $this->Applicant->findByid($this->request->data['Clientcase']['applicant_id']);

            if (empty($applicant['Applicant']['email'])) {
                $this->Session->setFlash(__('Applicant must have an email address before it can become the main applicant', null), 'default', array('class' => 'alert-danger'));
                return $this->redirect(array('controller' => 'clientcases', 'action' => 'view', $applicant['Applicant']['clientcase_id']));
            }
            if ($this->Clientcase->save($this->request->data, false)) {
                $this->Session->setFlash(__('The main applicant was changed', null), 'default', array('class' => 'alert-success'));
                return $this->redirect(array('controller' => 'clientcases', 'action' => 'view', $this->request->data['Clientcase']['id']));
            } else {
                $this->Session->setFlash(__('The main applicant could not be changed.', null), 'default', array('class' => 'alert-danger'));
                return $this->redirect(array('controller' => 'clientcases', 'action' => 'view', $applicant['Applicant']['clientcase_id']));
            }
        }
    }

    public function updateOpenClose($id = null) {
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Clientcase->save($this->request->data, false)) {
                $this->Session->setFlash(__('The Case Information has been saved', null), 'default', array('class' => 'alert-success'));
                return $this->redirect(array('controller' => 'clientcases', 'action' => 'view', $this->request->data['Clientcase']['id']));
            } else {
                $this->Session->setFlash(__('The Case Information could not be saved. Please, try again.', null), 'default', array('class' => 'alert-danger'));
            }
        }
    }

    public function myaccount() {
        $id = $this->Session->read('UserAuth.User.id');
        $this->loadModel('Clientcase');
        $this->loadModel('Applicant');
        $this->loadModel('Address');

        $clientcase = $this->Clientcase->find('first', array('conditions' => array('Clientcase.user_id' => $id)));

        $mainapplicant = $this->Applicant->find('first', array('conditions' => array('Applicant.id' => $clientcase['Clientcase']['applicant_id'])));

        $applicants = $this->Applicant->find('all', array('conditions' => array('Applicant.clientcase_id' => $clientcase['Clientcase']['id'], 'NOT' => array('Applicant.id' => $clientcase['Clientcase']['applicant_id']))));

        $address = $this->Address->find('first', array('conditions' => array('Address.applicant_id' => $id, 'Address.date_changed' => NULL)));

        $this->set(compact('clientcase', 'mainapplicant', 'applicants', 'address'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        $this->request->data['Clientcase']['id'] = $id;
        if (!$this->Clientcase->exists($id)) {
            throw new NotFoundException(__('Invalid Client Case'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Clientcase->save($this->request->data)) {
                $this->Session->setFlash(__('The client case has been saved', null), 'default', array('class' => 'alert-success'));
                return $this->redirect(array('controller' => 'clientcases', 'action' => 'view', $this->request->data['Clientcase']['id']));
            } else {
                $this->Session->setFlash(__('The client case could not be saved. Please, try again.', null), 'default', array('class' => 'alert-danger'));
            }
        }
        $options = array('conditions' => array('Clientcase.' . $this->Clientcase->primaryKey => $id));
        $this->request->data = $this->Clientcase->find('first', $options);
        $users = $this->Clientcase->User->find('list');
        $archives = $this->Clientcase->Archive->find('list');
        $statuses = $this->Clientcase->Status->find('list');
        $applicants = $this->Clientcase->Applicant->find('list');
        $this->set(compact('users', 'archives', 'statuses', 'applicants', 'id'));
    }
    /**
     * merge method
     *
     * The page from which a staff member can initiate an archive merge.
*/
    public function merge($id = null) {
        $this->loadModel('Archive');
        $this->loadModel('Clientcase');
        if (!$this->Clientcase->exists($id)) {
            throw new NotFoundException(__('Invalid case'));
        }

        if ($this->request->is('post') || $this->request->is('put')) {
            $archive = $this->Archive->find('first', array('conditions' => array('Archive.archive_name' => $this->request->data['Clientcase']['archive_name'])));
            if (!empty($archive)) {
                $clientcase = $this->Clientcase->find('first', array('conditions' => array('Clientcase.archive_id' => $archive['Archive']['id'])));
            } else {
                $this->Session->setFlash(__('That is not a valid archive name', null), 'default', array('class' => 'alert-danger'));
            }
            $this->set(compact('clientcase'));
        }
        $this->set(compact('id'));
    }

    public function performmerge() {
        $this->loadModel('Archive');
        $this->loadModel('Clientcase');
        $this->loadModel('Archiveloan');
        $this->loadModel('Document');
        $current_client_id = $this->request->data['Clientcase']['new_clientcase_id'];
        $merging_archive_id = $this->request->data['Clientcase']['old_archive_id'];
        $currentclientcase = $this->Clientcase->find('first', array('conditions' => array('Clientcase.id' => $current_client_id), 'fields' => array('id', 'archive_id')));
        $current_archive_id = $currentclientcase['Clientcase']['archive_id'];

        $archiveloans = $this->Archiveloan->find('all', array('conditions' => array('Archiveloan.archive_id' => $current_archive_id)));

        $currentarchive = $this->Archive->find('first', array('conditions' => array('Archive.id' => $current_archive_id)));
        $mergingarchive = $this->Archive->find('first', array('conditions' => array('Archive.id' => $merging_archive_id)));

        if ($merging_archive_id != $current_archive_id) {
            //Deleting the loan records for this archive, if any.
            if (!empty($archiveloans)) {
                foreach ($archiveloans as $archiveloan):
                    $this->Archiveloan->id = $archiveloan['Archiveloan']['id'];
                    $this->Archiveloan->delete();
                endforeach;
            }

            // Setting the case's archive id to the new archive id
            $this->request->data['Clientcase']['id'] = $current_client_id;
            $this->request->data['Clientcase']['archive_id'] = $merging_archive_id;
            $this->Clientcase->save($this->request->data);


            //Copy/move docs to older archive, delete folder etc.
            $documents = $this->Document->find('all', array('conditions' => array('Document.archive_id' => $current_archive_id)));

            if (!empty($documents)) {
                $currentarchivename = str_replace('/', '-', $currentarchive['Archive']['archive_name']);
                $mergingarchivename = str_replace('/', '-', $mergingarchive['Archive']['archive_name']);
                $uploadFolder = APP . 'documents' . DS . $mergingarchivename;

                if (!file_exists($uploadFolder)) {
                    mkdir($uploadFolder);
                }
                foreach ($documents as $document):
                    if (!empty($document['Document']['applicant_id'])) {
                        $type = $document['Applicant']['first_name'];
                    } else {
                        $type = $document['Ancestortype']['ancestor_type'];
                    }
                    $ext = substr(strrchr($document['Document']['filename'], '.'), 1);
                    $newfilename = $mergingarchivename . ' ' . $type . ' ' . $document['Documenttype']['code'] . ' ' . date('d-m-y');
                    $fullname = $newfilename . '.' . $ext;

                    $i = 0;
                    $available = false;
                    do {
                        $conditions = array('Document.filename' => $fullname);

                        if ($this->Document->hasAny($conditions)) {
                            $i++;
                            $fullname = $newfilename . ' ' . $i . '.' . $ext;
                        } else {
                            $available = true;
                        }
                    } while (!$available);

                    $newfilename = $fullname;

                    $this->Document->id = $document['Document']['id'];
                    $this->request->data['Document']['archive_id'] = $merging_archive_id;
                    if ($document['Document']['copy_type'] == 'Digital') {
                        $file = new File(APP . 'documents' . DS . $currentarchivename . DS . $document['Document']['filename']);

                        $dir = new Folder($uploadFolder);
                        $file->copy($dir->path . DS . $newfilename);

                        $this->request->data['Document']['filename'] = $newfilename;
                    }
                    $this->Document->save($this->request->data);

                endforeach;
                $delFolder = APP . 'documents' . DS . $currentarchivename;
                if (file_exists($delFolder)) {
                    $oldfolder = new Folder($delFolder);
                    $oldfolder->delete();
                }
                $this->Session->setFlash(__('The archives were successfully merged', null), 'default', array('class' => 'alert-success'));

                return $this->redirect(array('action' => 'view', $current_client_id));
            }
        } else {
            $this->Session->setFlash(__('You cannot merge an archive with itself.'), 'default', array('class' => 'alert-danger'));
            return $this->redirect(array('action' => 'view', $current_client_id));
        }
    }

    public function reporting() {
        $this->loadModel('Casenote');
        $this->loadModel('Clientcase');
        $this->loadModel('Document');
        $this->loadModel('Docnote');
        $this->loadModel('Quote');
        $this->loadModel('PaymentPlan');
        $this->LoadModel('User');

        $loggedInUser = $this->Auth->user('id');
        $user = $this->User->find('first', array('conditions' => array('User.id' => $loggedInUser), 'recursive' => -1));


        if (empty($selected)) {
            $selected = 0;
        }

        if ($this->request->is('post')) {
            $date1 = date('Ymd', strtotime(str_replace('/', '-', $this->request->data['Clientcase']['date1'])));
            $date2 = date('Ymd', strtotime(str_replace('/', '-', $this->request->data['Clientcase']['date2'])));


            $selected = $this->request->data['Clientcase']['selection'];


            if ($selected == 1) {
                /* $clientcases = $this->Clientcase->query("SELECT distinct Clientcase.id, Clientcase.created, Applicant.first_name, Applicant.surname, Archive.archive_name
                  FROM clientcases AS Clientcase, applicants AS Applicant, archives AS Archive
                  WHERE Applicant.id = Clientcase.applicant_id AND Archive.id = Clientcase.archive_id AND Clientcase.open_or_closed = 'Open' AND Clientcase.status_id <> 0
                  ORDER BY Clientcase.id DESC"); */
                $clientcases = $this->Clientcase->find('all', array('conditions' => array('Clientcase.open_or_closed' => 'Open', 'DATE_FORMAT(Clientcase.created, "%Y%m%d") >= ' . $date1, 'DATE_FORMAT(Clientcase.created, "%Y%m%d") <= ' . $date2, 'NOT' => array('Clientcase.status_id' => 0))));
                //$clientcases =  $this->Clientcase->find('all');
            } else if ($selected == 2) {
                /* $deniedcases = $this->clientcase->query("SELECT distinct Clientcase.id, Clientcase.created, Applicant.first_name, Applicant.surname, Archive.archive_name
                  FROM clientcases AS Clientcase, applicants AS Applicant, archives AS Archive
                  WHERE Casenote.clientcase_id = Clientcase.id AND Applicant.id = Clientcase.applicant_id AND Archive.id = Clientcase.archive_id AND Clientcase.status_id = 0
                  ORDER BY Casenote.id DESC");
                 */
                $deniedcases = $this->Clientcase->find('all', array('conditions' => array('DATE_FORMAT(Clientcase.created, "%Y%m%d") >= ' . $date1, 'DATE_FORMAT(Clientcase.created, "%Y%m%d") <= ' . $date2, 'Clientcase.status_id' => 0)));
            } else if ($selected == 3) {
                $casenotes = $this->Casenote->query("SELECT distinct Casenote.clientcase_id, Casenote.subject, Casenote.created, Archive.archive_name, Applicant.first_name, Applicant.surname, Employee.first_name, Employee.surname
                FROM casenotes AS Casenote, clientcases AS Clientcase, archives AS Archive, applicants AS Applicant, employees AS Employee
                WHERE Casenote.clientcase_id = Clientcase.id AND Archive.id = Clientcase.archive_id AND Applicant.id = Clientcase.applicant_id
                AND Clientcase.open_or_closed = 'Open' AND Clientcase.status_id <> 0
                AND DATE_FORMAT(Casenote.created, '%Y%m%d') >= " . $date1 . " AND DATE_FORMAT(Casenote.created, '%Y%m%d') <= " . $date2 . "
                AND (Casenote.user_id = Employee.user_id OR Casenote.user_id = Clientcase.user_id)
                group by Casenote.id");
            } else if ($selected == 4) {
                $documents = $this->Document->query("SELECT distinct Documenttype.type, Document.id, Document.applicant_id, Document.ancestortype_id, Document.filename, Document.copy_type, Document.applicant_id, Document.ancestortype_id,Document.created, Clientcase.id, Applicant.first_name, Applicant.surname, Archive.archive_name
                FROM documents AS Document, clientcases AS Clientcase, applicants AS Applicant, archives AS Archive, documenttypes AS Documenttype
                WHERE Document.archive_id = Archive.id AND Applicant.id = Clientcase.applicant_id AND Archive.id = Clientcase.archive_id AND Document.documenttype_id = Documenttype.id
                AND Clientcase.open_or_closed = 'Open' AND Clientcase.status_id <> 0
                AND DATE_FORMAT(Document.created, '%Y%m%d') >= " . $date1 . " AND DATE_FORMAT(Document.created, '%Y%m%d') <= " . $date2 . "
                ORDER BY Document.id DESC");
            } else if ($selected == 5) {
                $docnotes = $this->Docnote->query("SELECT distinct Docnote.id,  Docnote.note, Docnote.document_id, Docnote.employee_id, Docnote.created, Clientcase.id, Applicant.first_name, Applicant.surname, Archive.archive_name, Employee.first_name, Employee.surname
                FROM docnotes AS Docnote, clientcases AS Clientcase, applicants AS Applicant, archives AS Archive, employees AS Employee
                WHERE Applicant.id = Clientcase.applicant_id AND Archive.id = Clientcase.archive_id
                AND Clientcase.open_or_closed = 'Open' AND Clientcase.status_id <> 0
                AND DATE_FORMAT(Docnote.created, '%Y%m%d') >= " . $date1 . " AND DATE_FORMAT(Docnote.created, '%Y%m%d') <= " . $date2 . "
                AND (Docnote.employee_id = Employee.id OR Docnote.clientcase_id = Clientcase.id)
				group by Docnote.id;");
            } else if ($selected == 6) {
                $changedcases = $this->Clientcase->query("SELECT distinct Clientcase.id, Clientcase.created, Status.status_type, Applicant.first_name, Applicant.surname, Archive.archive_name
                FROM clientcases AS Clientcase, applicants AS Applicant, archives AS Archive, statuses AS Status, casestatuses AS Casestatus
                WHERE Applicant.id = Clientcase.applicant_id AND Archive.id = Clientcase.archive_id AND Clientcase.status_id = Status.id AND Casestatus.clientcase_id = Clientcase.id AND Casestatus.status_id = Status.id
                AND Clientcase.open_or_closed = 'Open' AND Clientcase.status_id <> 0
                AND DATE_FORMAT(Casestatus.date_updated, '%Y%m%d') >= " . $date1 . " AND DATE_FORMAT(Casestatus.date_updated, '%Y%m%d') <= " . $date2 . "
                GROUP BY Clientcase.id;");
            } else if ($selected == 7) {
                $nocasenotes = $this->Casenote->query("SELECT distinct Casenote.clientcase_id, Casenote.created, Clientcase.created, Clientcase.id, Archive.archive_name, Applicant.first_name, Applicant.surname, Employee.first_name, Employee.surname
                FROM casenotes AS Casenote, clientcases AS Clientcase, archives AS Archive, applicants AS Applicant, employees AS Employee
                WHERE Casenote.clientcase_id = Clientcase.id AND Archive.id = Clientcase.archive_id AND Applicant.id = Clientcase.applicant_id
                AND Clientcase.open_or_closed = 'Open' AND Clientcase.status_id <> 0
                AND (DATE_FORMAT(Casenote.created, '%Y%m%d') NOT BETWEEN " . $date1 . " AND " . $date2 . ")
                AND (Casenote.user_id = Employee.user_id OR Casenote.user_id = Clientcase.user_id)
                group by Clientcase.id");
            } else if ($selected == 8) {
                $nochangedcases = $this->Clientcase->query("SELECT distinct Clientcase.id, Clientcase.created, Status.status_type, Applicant.first_name, Applicant.surname, Archive.archive_name
                FROM clientcases AS Clientcase, applicants AS Applicant, archives AS Archive, statuses AS Status, casestatuses AS Casestatus
                WHERE Applicant.id = Clientcase.applicant_id AND Archive.id = Clientcase.archive_id AND Clientcase.status_id = Status.id AND Casestatus.clientcase_id = Clientcase.id AND Casestatus.status_id = Status.id
                AND Clientcase.open_or_closed = 'Open' AND Clientcase.status_id <> 0
                AND (DATE_FORMAT(Casestatus.date_updated, '%Y%m%d') NOT BETWEEN " . $date1 . " AND " . $date2 . ")
                GROUP BY Clientcase.id;");
            } else if ($selected == 9) {
                $quotes = $this->Quote->find('all', array('conditions' => array('quote_accepted' => 1, 'date >= ' => $date1, 'date <= ' => $date2)));
            } else if ($selected == 10) {
                $plans = $this->PaymentPlan->find('all', array('conditions' => array('date_created >= ' => $date1, 'date_created <= ' => $date2), 'recursive' => 2));
            } else if ($selected == 11) {
                $installment1 = $this->PaymentPlan->find('all', array('conditions' => array('installment_date1 >=' => $date1, 'installment_date1 <=' => $date2), 'recursive' => 2));
                $installment2 = $this->PaymentPlan->find('all', array('conditions' => array('installment_date2 >=' => $date1, 'installment_date2 <=' => $date2), 'recursive' => 2));
                $installment3 = $this->PaymentPlan->find('all', array('conditions' => array('installment_date3 >=' => $date1, 'installment_date3 <=' => $date2), 'recursive' => 2));
                $installment4 = $this->PaymentPlan->find('all', array('conditions' => array('installment_date4 >=' => $date1, 'installment_date4 <=' => $date2), 'recursive' => 2));
                $installment5 = $this->PaymentPlan->find('all', array('conditions' => array('installment_date5 >=' => $date1, 'installment_date5 <=' => $date2), 'recursive' => 2));
                $installment6 = $this->PaymentPlan->find('all', array('conditions' => array('installment_date6 >=' => $date1, 'installment_date6 <=' => $date2), 'recursive' => 2));
            } else if ($selected == 12) {
                return $this->redirect(array('controller' => 'clientcases', 'action' => 'reportResearchTasks'));
            } else if ($selected == 13) {
                return $this->redirect(array('controller' => 'clientcases', 'action' => 'reportResearchSteps'));
            } else if ($selected == 14) {
                return $this->redirect(array('controller' => 'clientcases', 'action' => 'allResearchTasks'));
            }


            /* $noSucEnq = $this->Clientcase->find('count', array('conditions' => array('DATE_FORMAT(Clientcase.created, "%Y%m%d") >= '.$date1, 'DATE_FORMAT(Clientcase.created, "%Y%m%d") <= '.$date2)));
              $noDenEnq = 0;
              $noCaseNotes =$this->Casenote->find('count', array('conditions' => array('DATE_FORMAT(Casenote.created, "%Y%m%d") >= '.$date1, 'DATE_FORMAT(Casenote.created, "%Y%m%d") <= '.$date2)));
              $noDocsDown =$this->Document->find('count', array('conditions' => array('DATE_FORMAT(Document.created, "%Y%m%d") >= '.$date1, 'DATE_FORMAT(Document.created, "%Y%m%d") <= '.$date2)));
              $noDocNotes = $this->Docnote->find('count', array('conditions' => array('DATE_FORMAT(Docnote.created, "%Y%m%d") >= '.$date1, 'DATE_FORMAT(Docnote.created, "%Y%m%d") <= '.$date2)));


              $clientcases = $this->Clientcase->find('all', array('conditions' => array('DATE_FORMAT(Clientcase.created, "%Y%m%d") >= '.$date1, 'DATE_FORMAT(Clientcase.created, "%Y%m%d") <= '.$date2))); */
            //    $date2 = $this->request->data['Clientcase']['date2'];
        }


        //if ($this->request->is('post') || $this->request->is('put')) {
        //    $this->report();
        //}

        $this->set(compact('date1', 'date2', 'selected', 'clientcases', 'deniedcases', 'casenotes', 'documents', 'docnotes', 'changedcases', 'nocasenotes', 'nochangedcases', 'quotes', 'plans', 'installment1', 'installment2', 'installment3', 'installment4', 'installment5', 'installment6', 'user'));
        //$this->set(compact('casenotes', 'date1', 'date2', 'noSucEnq', 'noDenEnq', 'noCaseNotes', 'noDocsDown', 'noDocNotes', 'clientcases'));
    }

    public function report() {
        $this->loadModel('Clientcase');
        $date1 = date('Ymd', strtotime(str_replace('/', '-', $this->request->data['Clientcase']['date1'])));
        $date2 = date('Ymd', strtotime(str_replace('/', '-', $this->request->data['Clientcase']['date2'])));

        $data = $this->Clientcase->find('all', array('conditions' => array('Clientcase.open_or_closed' => 'Open', 'DATE_FORMAT(Clientcase.created, "%Y%m%d") >= ' . $date1, 'DATE_FORMAT(Clientcase.created, "%Y%m%d") <= ' . $date2, 'NOT' => array('Clientcase.status_id' => 0))));
        $this->set(compact('data'));
    }

    public function report2() {
        $this->loadModel('Clientcase');
        $date1 = date('Ymd', strtotime(str_replace('/', '-', $this->request->data['Clientcase']['date1'])));
        $date2 = date('Ymd', strtotime(str_replace('/', '-', $this->request->data['Clientcase']['date2'])));

        $data = $this->Clientcase->find('all', array('conditions' => array('DATE_FORMAT(Clientcase.created, "%Y%m%d") >= ' . $date1, 'DATE_FORMAT(Clientcase.created, "%Y%m%d") <= ' . $date2, 'Clientcase.status_id' => 0)));
        $this->set(compact('data'));
    }

    public function report3() {
        $this->loadModel('Clientcase');
        $date1 = date('Ymd', strtotime(str_replace('/', '-', $this->request->data['Clientcase']['date1'])));
        $date2 = date('Ymd', strtotime(str_replace('/', '-', $this->request->data['Clientcase']['date2'])));

        $data = $this->Clientcase->query("SELECT distinct Clientcase.id, Clientcase.created, Status.status_type, Applicant.first_name, Applicant.surname, Archive.archive_name
                FROM clientcases AS Clientcase, applicants AS Applicant, archives AS Archive, statuses AS Status, casestatuses AS Casestatus
                WHERE Applicant.id = Clientcase.applicant_id AND Archive.id = Clientcase.archive_id AND Clientcase.status_id = Status.id AND Casestatus.clientcase_id = Clientcase.id AND Casestatus.status_id = Status.id
                AND Clientcase.open_or_closed = 'Open' AND Clientcase.status_id <> 0
                AND DATE_FORMAT(Casestatus.date_updated, '%Y%m%d') >= " . $date1 . " AND DATE_FORMAT(Casestatus.date_updated, '%Y%m%d') <= " . $date2 . "
                GROUP BY Clientcase.id;");
        $this->set(compact('data'));
    }

    public function report4() {
        $this->loadModel('Clientcase');
        $date1 = date('Ymd', strtotime(str_replace('/', '-', $this->request->data['Clientcase']['date1'])));
        $date2 = date('Ymd', strtotime(str_replace('/', '-', $this->request->data['Clientcase']['date2'])));

        $data = $this->Clientcase->query("SELECT distinct Casenote.clientcase_id, Casenote.created, Clientcase.created, CLientcase.id, Archive.archive_name, Applicant.first_name, Applicant.surname, Employee.first_name, Employee.surname
                FROM casenotes AS Casenote, clientcases AS Clientcase, archives AS Archive, applicants AS Applicant, employees AS Employee
                WHERE Casenote.clientcase_id = Clientcase.id AND Archive.id = Clientcase.archive_id AND Applicant.id = Clientcase.applicant_id
                AND Clientcase.open_or_closed = 'Open' AND Clientcase.status_id <> 0
                AND (DATE_FORMAT(Casenote.created, '%Y%m%d') NOT BETWEEN " . $date1 . " AND " . $date2 . ")
                AND (Casenote.user_id = Employee.user_id OR Casenote.user_id = Clientcase.user_id)
                group by Clientcase.id");
        $this->set(compact('data'));
    }

    public function report5() {
        $this->loadModel('Clientcase');
        $date1 = date('Ymd', strtotime(str_replace('/', '-', $this->request->data['Clientcase']['date1'])));
        $date2 = date('Ymd', strtotime(str_replace('/', '-', $this->request->data['Clientcase']['date2'])));

        $data = $this->Clientcase->query("SELECT distinct Clientcase.id, Clientcase.created, Status.status_type, Applicant.first_name, Applicant.surname, Archive.archive_name
                FROM clientcases AS Clientcase, applicants AS Applicant, archives AS Archive, statuses AS Status, casestatuses AS Casestatus
                WHERE Applicant.id = Clientcase.applicant_id AND Archive.id = Clientcase.archive_id AND Clientcase.status_id = Status.id AND Casestatus.clientcase_id = Clientcase.id AND Casestatus.status_id = Status.id
                AND Clientcase.open_or_closed = 'Open' AND Clientcase.status_id <> 0
                AND (DATE_FORMAT(Casestatus.date_updated, '%Y%m%d') NOT BETWEEN " . $date1 . " AND " . $date2 . ")
                GROUP BY Clientcase.id;");
        $this->set(compact('data'));
    }

    public function report6() {
        $this->loadModel('Quote');
        $date1 = date('Ymd', strtotime(str_replace('/', '-', $this->request->data['Clientcase']['date1'])));
        $date2 = date('Ymd', strtotime(str_replace('/', '-', $this->request->data['Clientcase']['date2'])));

        $data = $this->Quote->find('all', array('conditions' => array('quote_accepted' => 1, 'date >= ' => $date1, 'date <= ' => $date2)));
        $this->set(compact('data'));
    }

    public function report7() {
        $this->loadModel('PaymentPlan');
        $date1 = date('Ymd', strtotime(str_replace('/', '-', $this->request->data['Clientcase']['date1'])));
        $date2 = date('Ymd', strtotime(str_replace('/', '-', $this->request->data['Clientcase']['date2'])));

        $data = $this->PaymentPlan->find('all', array('conditions' => array('date_created >= ' => $date1, 'date_created <= ' => $date2), 'recursive' => 2));

        $this->set(compact('data'));
    }

    public function report8() {
        $this->loadModel('PaymentPlan');
        $date1 = date('Ymd', strtotime(str_replace('/', '-', $this->request->data['Clientcase']['date1'])));
        $date2 = date('Ymd', strtotime(str_replace('/', '-', $this->request->data['Clientcase']['date2'])));

        $installment1 = $this->PaymentPlan->find('all', array('conditions' => array('installment_date1 >=' => $date1, 'installment_date1 <=' => $date2), 'recursive' => 2));
        $installment2 = $this->PaymentPlan->find('all', array('conditions' => array('installment_date2 >=' => $date1, 'installment_date2 <=' => $date2), 'recursive' => 2));
        $installment3 = $this->PaymentPlan->find('all', array('conditions' => array('installment_date3 >=' => $date1, 'installment_date3 <=' => $date2), 'recursive' => 2));
        $installment4 = $this->PaymentPlan->find('all', array('conditions' => array('installment_date4 >=' => $date1, 'installment_date4 <=' => $date2), 'recursive' => 2));
        $installment5 = $this->PaymentPlan->find('all', array('conditions' => array('installment_date5 >=' => $date1, 'installment_date5 <=' => $date2), 'recursive' => 2));
        $installment6 = $this->PaymentPlan->find('all', array('conditions' => array('installment_date6 >=' => $date1, 'installment_date6 <=' => $date2), 'recursive' => 2));

        $this->set(compact('installment1', 'installment2', 'installment3', 'installment4', 'installment5', 'installment6'));
    }

    public function report9() {
        $this->LoadModel('ResearchTask');

        $options = $this->request->data;

        $options['Clientcase']['date1'] = date('Ymd', strtotime(str_replace('/', '-', $options['Clientcase']['date1'])));
        $options['Clientcase']['date2'] = date('Ymd', strtotime(str_replace('/', '-', $options['Clientcase']['date2'])));

       
        $data = $this->ResearchTask->find('all', array('conditions' => array('creation_date >=' => $options['Clientcase']['date1'], 'creation_date <=' => $options['Clientcase']['date2'], 'responsible_id' => $options['Clientcase']['responsible'])));
  
        $this->set(compact('data', 'options'));
    }

    public function report10() {
        $this->LoadModel('ResearchTask');

        $options = $this->request->data;

        $options['Clientcase']['date1'] = date('Ymd', strtotime(str_replace('/', '-', $options['Clientcase']['date1'])));
        $options['Clientcase']['date2'] = date('Ymd', strtotime(str_replace('/', '-', $options['Clientcase']['date2'])));

      
        $data = $this->ResearchTask->find('all', array('conditions' => array('creation_date >=' => $options['Clientcase']['date1'], 'creation_date <=' => $options['Clientcase']['date2'])));

        $this->set(compact('data', 'options'));
    }

    public function reportResearchTasks() {
        $this->LoadModel('Employee');
        $this->LoadModel('ResearchTask');

        $employees = $this->Employee->find('all', array('recursive' => -1));
        $this->set(compact('employees'));
        $data = null;
        $tasks = null;
        if ($this->request->is('post')) {
            $data = $this->request->data;

            if ($data['created/complete'] == 'completion') {
                $data['date1'] = date('Ymd', strtotime(str_replace('/', '-', $data['date1'])));
                $data['date2'] = date('Ymd', strtotime(str_replace('/', '-', $data['date2'])));

                $tasks = $this->ResearchTask->find('all', array('conditions' => array('completion_date >=' => $data['date1'], 'completion_date <=' => $data['date2'], 'responsible_id' => $data['employee']['responsible_id'])));
            }
            if ($data['created/complete'] == 'creation') {
                $data['date1'] = date('Ymd', strtotime(str_replace('/', '-', $data['date1'])));
                $data['date2'] = date('Ymd', strtotime(str_replace('/', '-', $data['date2'])));

                $tasks = $this->ResearchTask->find('all', array('conditions' => array('creation_date >=' => $data['date1'], 'creation_date <=' => $data['date2'], 'responsible_id' => $data['employee']['responsible_id'])));
            }
        }
        $this->set(compact('tasks', 'data'));
    }

    public function reportResearchSteps() {
        $this->LoadModel('Employee');
        $this->LoadModel('ResearchStep');

        $employees = $this->Employee->find('all', array('recursive' => -1));
        $this->set(compact('employees'));
        $data = null;
        $tasks = null;
        if ($this->request->is('post')) {
            $data = $this->request->data;

            if ($data['created/complete'] == 'completion') {
                $data['date1'] = date('Ymd', strtotime(str_replace('/', '-', $data['date1'])));
                $data['date2'] = date('Ymd', strtotime(str_replace('/', '-', $data['date2'])));

                $steps = $this->ResearchStep->find('all', array('conditions' => array('ResearchStep.completion_date >=' => $data['date1'], 'ResearchStep.completion_date <=' => $data['date2'], 'ResearchStep.responsible_id' => $data['employee']['responsible_id']), 'recursive' => 2));
        
            }
            if ($data['created/complete'] == 'creation') {
                $data['date1'] = date('Ymd', strtotime(str_replace('/', '-', $data['date1'])));
                $data['date2'] = date('Ymd', strtotime(str_replace('/', '-', $data['date2'])));

                $steps = $this->ResearchStep->find('all', array('conditions' => array('ResearchStep.creation_date >=' => $data['date1'], 'ResearchStep.creation_date <=' => $data['date2'], 'ResearchStep.responsible_id' => $data['employee']['responsible_id'])));
            }
        }
        $this->set(compact('steps', 'data'));
    }

    public function allResearchTasks() {
        $this->LoadModel('ResearchTask');

        $data = null;
        $tasks = null;
        if ($this->request->is('post')) {
            $data = $this->request->data;

            if ($data['created/complete'] == 'completion') {
                $data['date1'] = date('Ymd', strtotime(str_replace('/', '-', $data['date1'])));
                $data['date2'] = date('Ymd', strtotime(str_replace('/', '-', $data['date2'])));

                $tasks = $this->ResearchTask->find('all', array('conditions' => array('completion_date >=' => $data['date1'], 'completion_date <=' => $data['date2'])));
            }
            if ($data['created/complete'] == 'creation') {
                $data['date1'] = date('Ymd', strtotime(str_replace('/', '-', $data['date1'])));
                $data['date2'] = date('Ymd', strtotime(str_replace('/', '-', $data['date2'])));

                $tasks = $this->ResearchTask->find('all', array('conditions' => array('creation_date >=' => $data['date1'], 'creation_date <=' => $data['date2'])));
            }
        }
        $this->set(compact('tasks', 'data'));
    }
}
