<?php

App::uses('AppController', 'Controller');

/**
 * IE team 76 
 *
 * @property Quote $Quote
 */
class QuotesController extends AppController {

    public $helpers = array("PDF");

//public $virtualFields = array( 
// 'full_name' => 'CONCAT(Customer.cust_fname, ", ", Customer.cust_fname)' 
//); 

    /**
     * index method 
     * 
     * @return void 
     */
    public function index() {

        $this->Quote->recursive = 1;
        $this->set('quotes', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        $this->LoadModel('Applicant');
        $this->LoadModel('PaymentPlan');
        $this->LoadModel('OldPaymentPlan');

        $quote = $this->Quote->find('first', array('conditions' => array('Quote.id' => $id), 'recursive' => 1));

        $applicants = Set::classicExtract($quote, 'Applicant.{n}');
        $planCount = $this->PaymentPlan->find('count', array('conditions' => array('quote_id' => $id)));
        $oldPlanCount = $this->OldPaymentPlan->find('count', array('conditions' => array('quote_id' => $id)));

        /* ------ Checks for button redirects ------ */
        if ($this->request->is('post')) {
            $buttonCheck = $_POST;

            if ($buttonCheck['QuoteButton'] == 'Cancel') {
                $case = Set::classicExtract($applicants, '{n}.clientcase_id');
                $this->redirect('/clientcases/view/' . $case[0] . '#tab6');
            } elseif ($buttonCheck['QuoteButton'] == 'Create Quote pdf') {
                $date = $buttonCheck['data']['empty']['validUntil'];
                $this->redirect(array('controller' => 'quotes', 'action' => 'viewPdf', '?' => array('date' => $date, 'id' => $id)));
            } elseif ($buttonCheck['QuoteButton'] == 'Make Payment Plan') {
                $this->redirect('/paymentplans/add/' . $id);
            } elseif ($buttonCheck['QuoteButton'] == 'View Payment Plan') {
                $plan = $this->PaymentPlan->find('first', array('conditions' => array('quote_id' => $quote['Quote']['id']), 'recursive' => -1));
                $this->redirect('/paymentplans/view/' . $plan['PaymentPlan']['id']);
            } elseif ($buttonCheck['QuoteButton'] == 'View Payment Plan pdf') {
                $this->redirect('/paymentplans/ViewPdf/' . $id);
            } elseif ($buttonCheck['QuoteButton'] == 'Old Payment Plans') {
                $this->redirect('/oldpaymentplans/index/' . $id);
            }
        }

        if (!$this->Quote->exists($id)) {
            throw new NotFoundException(__('Invalid quote'));
        }
        $this->set(compact('quote', 'applicants', 'planCount', 'id', 'oldPlanCount'));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Quote->create();
            if ($this->Quote->save($this->request->data)) {
                $this->Session->setFlash(__('The quote has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The quote could not be saved. Please, try again.'));
            }
        }
        $applicants = $this->Quote->Applicant->find('list');
        $this->set(compact('applicants'));
    }

    /*
     */

    public function makeQuote() {
        $this->loadModel('Applicant');
        $this->LoadModel('ApplicantQuote');
        $this->LoadModel('Setfee');
        $this->LoadModel('Clientcase');
        $this->LoadModel('Internalprice');
        $this->LoadModel('Clientprice');

        /* ------ retrieving client and internal prices for display ------ */
        $internal = $this->Internalprice->find('all');
        $client = $this->Clientprice->find('all');

        //retrieves the applicants chosen from the view_quotes page
        $args = $this->params['url'];
        //get the case id from the previous page

        $case = $args['data']['caseid'];
        //remove move some unnecessary things from the args array
        unset($args['data']['caseid']);
        unset($args['id']);
        //retrieve the applicant information from the database using the applicant array
        $applicants = $this->Applicant->find('all', array('conditions' => array('id' => $args['data']),
            'order' => 'first_name ASC', 'recursive' => -1));

        $app_id = Set::classicExtract($applicants, '{n}.Applicant.id');

        if ($applicants == null) {//redirect back to view quotes page if no applicants were chosen
            $this->Session->setflash('Choose at least one applicant');
            $this->redirect('/clientcases/view/' . $case . '#tab5');
        }

        $this->set(compact('applicants', 'case', 'args', 'internal', 'client'));

        if ($this->request->is('post')) {
            $cancelCheck = $_POST;
            if ($cancelCheck['QuoteButton'] == 'Cancel') {
                $this->redirect('/clientcases/view/' . $case);
            }

            $quote = $this->request->data;
            unset($quote['QuoteButton']);

            $quote['Applicant'] = array();
            $quote['Applicant']['Applicant'] = array();

            $count = 0;
            foreach ($app_id as $key => $id) {
                $quote['Applicant']['Applicant']['applicant_id'] = $app_id[$count];
                $count++;
            }

            $gst = 0;
            if ($quote['Quote']['includeGST'] == 1) {
                $total = $quote['Quote']['total'];

                if ($total > 0) {
                    $gst = $total / 10;
                }
            }
            $quote['Quote']['GST'] = $gst;
            unset($quote['Quote']['includeGST']);
            if (!($quote['Quote']['total'] == 0 || $quote['Quote']['total'] < 0)) {
                if ($this->Quote->saveAll($quote, true)) {
                    $this->Session->setFlash('Quote Saved', 'success');
                    $this->redirect('/clientcases/view/' . $case . '#tab6');
                }
            } else {
                $this->Session->setflash('Quote Failed to Save, All fields must be filled in and total greater than 0');
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
        $this->LoadModel('Internalprice');
        $this->LoadModel('ApplicantQuote');
        $this->LoadModel('Applicant');

        $internal = $this->Internalprice->find('all');
        $quoteApp = $this->ApplicantQuote->find('first', array('conditions' => array('ApplicantQuote.quote_id' => $id), 'recursive' => -1));
        $applicant = $this->Applicant->find('first', array('conditions' => array('Applicant.id' => $quoteApp['ApplicantQuote']['applicant_id']), 'recursive' => -1));

        $this->set(compact('internal', 'applicant', 'id'));
        if (!$this->Quote->exists($id)) {
            throw new NotFoundException(__('Invalid quote'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            $quote = $this->Quote->find('first', array('conditions' => array('Quote.id' => $id), 'recursive' => 1));
            $applicants = Set::classicExtract($quote, 'Applicant.{n}');
            $case = Set::classicExtract($applicants, '{n}.clientcase_id');
            $cancelCheck = $_POST;
            if ($cancelCheck['QuoteButton'] == 'Cancel') {
                $this->redirect('/clientcases/view/' . $case[0] . '#tab6');
            }

            $saveQuote = $this->request->data;
            $gst = 0;
            $total = $saveQuote['Quote']['total'];
            if ($total > 0) {
                $gst = $total / 10;
            }
            $saveQuote['Quote']['GST'] = $gst;
            unset($saveQuote['QuoteButton']);

            if ($saveQuote['Quote']['quote_accepted'] == 1) {
                $saveQuote['Quote']['research_accepted'] = 1;
                $saveQuote['Quote']['cc_accepted'] = 1;
                $saveQuote['Quote']['pesel_accepted'] = 1;
                $saveQuote['Quote']['setfees_accepted'] = 1;
            }

            if ($this->Quote->saveAll($saveQuote, true)) {
                $this->Session->setFlash('Quote Changes Saved', 'success');
                $this->redirect('/clientcases/view/' . $case[0] . '#tab6');
            } else {
                $this->Session->setFlash('Quote Failed to Save, please check form');
            }
        } else {
            $quote = $this->Quote->find('first', array('conditions' => array('Quote.id' => $id), 'recursive' => 1));
            $this->request->data = $quote;
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
        $this->loadModel('Applicant');
        $this->LoadModel('ApplicantQuote');
        $this->LoadModel('Setfee');
        $this->LoadModel('QuoteResearch');
        $this->LoadModel('PeselAndAppointment');
        $this->LoadModel('CcAndRegistration');
        $this->LoadModel('PaymentPlan');

        $this->Quote->id = $id;

        $quote = $this->Quote->find('first', array('conditions' => array('Quote.id' => $id), 'recursive' => 1));
        $applicants = Set::classicExtract($quote, 'Applicant.{n}');
        $case = Set::classicExtract($applicants, '{n}.clientcase_id');

        $research = $this->QuoteResearch->find('first', array('conditions' => array('Quote.id' => $id)));
        if ($this->QuoteResearch->exists($research['QuoteResearch']['id'])) {
            $this->QuoteResearch->delete($research['QuoteResearch']['id']);
        }
        $setfee = $this->Setfee->find('first', array('conditions' => array('Quote.id' => $id)));
        if ($this->Setfee->exists($setfee['Setfee']['id'])) {
            $this->Setfee->delete($setfee['Setfee']['id']);
        }
        $pesel = $this->PeselAndAppointment->find('first', array('conditions' => array('Quote.id' => $id)));
        if ($this->PeselAndAppointment->exists($pesel['PeselAndAppointment']['id'])) {
            $this->PeselAndAppointment->delete($pesel['PeselAndAppointment']['id']);
        }
        $cc = $this->CcAndRegistration->find('first', array('conditions' => array('Quote.id' => $id)));
        if ($this->CcAndRegistration->exists($cc['CcAndRegistration']['id'])) {
            $this->CcAndRegistration->delete($cc['CcAndRegistration']['id']);
        }
        $app = $this->ApplicantQuote->find('first', array('conditions' => array('Quote.id' => $id)));
        if ($this->ApplicantQuote->exists($app['ApplicantQuote']['id'])) {
            $this->ApplicantQuote->delete($app['ApplicantQuote']['id']);
        }
        $paymentcount = $this->PaymentPlan->find('count', array('conditions' => array('Quote.id' => $id), 'recursive' => 0));
        if ($paymentcount > 0) {
            $paymentplan = $this->PaymentPlan->find('first', array('conditions' => array('Quote.id' => $id)));

            $this->PaymentPlan->delete($paymentplan['PaymentPlan']['id']);
        }

        if (!$this->Quote->exists($id)) {
            throw new NotFoundException(__('Invalid quote'));
        }
        //$this->request->onlyAllow('post', 'delete');
        if ($this->Quote->delete($id)) {
            $this->Session->setFlash('Quote deleted', 'success');
            $this->redirect('/clientcases/view/' . $case[0] . '#tab6');
        }

        $this->Session->setFlash(__('Quote was not deleted'));
        $this->redirect('/clientcases/view/' . $case[0] . '#tab6');
    }

    function viewPdf($id = null) {
        $this->LoadModel('Address');
        $this->LoadModel('Clientcase');

        date_default_timezone_set('Australia/Melbourne');

        $data = $this->params['url'];
        $dateValid = $data['date'];
        
        if($dateValid == '')
        {
            //gets a unix timestamp two weeks from today
            $dateValid = mktime(0, 0, 0, date("m")  , date("d")+15, date("Y"));
            //formats the timestamp into a string
            $dateValid = gmdate("d-m-Y", $dateValid);
        }
        
        $quote = $this->Quote->find('all', array('conditions' => array('Quote.id' => $data['id'])));
        $address = $this->Address->find('first', array('conditions' => array('Address.applicant_id' => $quote[0]['Applicant'][0]['id'])));
        $case = $this->Clientcase->find('first', array('conditions' => array('Clientcase.id' => $quote[0]['Applicant'][0]['clientcase_id']), 'recursive' => 0));

        $this->set(compact('quote', 'address', 'dateValid', 'case'));

        $this->layout = 'pdf'; //this will use the pdf.ctp layout 
        $this->render();
    }
}
