<?php

App::uses('AppController', 'Controller');

/**
 * PaymentPlans Controller
 *
 * @property PaymentPlan $PaymentPlan
 */
class PaymentPlansController extends AppController {

    public $helpers = array("PLANPDF");

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->PaymentPlan->recursive = 1;
        $this->set('paymentPlans', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {

        if (!$this->PaymentPlan->exists($id)) {
            throw new NotFoundException(__('Invalid payment plan'));
        }

        $options = array('conditions' => array('PaymentPlan.' . $this->PaymentPlan->primaryKey => $id));
        $plan = $this->PaymentPlan->find('first', $options);

        $this->loadModel('Quote');
        $this->loadModel('Applicant');
        $quote = $this->Quote->find('first', array('conditions' => array('Quote.id' => $plan['PaymentPlan']['quote_id']), 'recursive' => 1));
        $this->loadModel('ApplicantQuote');
        $this->loadModel('Clientcase');
        $applicantQuote = $this->ApplicantQuote->find('list', array('conditions' => array('quote_id' => $plan['PaymentPlan']['quote_id']), 'fields' => 'applicant_id'));
        $mainApplicant = $this->Clientcase->findByapplicant_id($applicantQuote);
        $applicant = $this->Applicant->find('first', array('conditions' => array('Applicant.id' => $mainApplicant['Clientcase']['applicant_id'])));

        $this->set(compact('plan', 'applicant', 'id'));

        $this->LoadModel('PaymentPlan');

        if ($this->request->is('post')) {


            //button check takes information from the view and redirects to the appropriate page
            $buttonCheck = $_POST;
            if ($buttonCheck['PaymentButton'] == 'Cancel') {
                $this->redirect('/quotes/view/' . $quote['Quote']['id']);
            } elseif ($buttonCheck['PaymentButton'] == 'View Payment Plan pdf') {
                $this->redirect('/paymentplans/ViewPaymentPlanPdf/' . $id);
            }
        }
    }

    /**
     * add method
     *
     * @return void
     */
    public function add($id = null) {
        $this->LoadModel('Quote');
        $this->LoadModel('Clientcase');
        $this->LoadModel('Applicant');
        $this->LoadModel('ApplicantQuote');
        $count = 0;
        $countdate = 0;

        /* ------ Gathering information to display on page ------ */
        $planCheck = $this->PaymentPlan->Find('count', array('conditions' => array('Quote_id' => $id), 'recursive' => 0));

        $quote = $this->Quote->find('first', array('conditions' => array('Quote.id' => $id), 'recursive' => 1));
        $case_id = Set::classicExtract($quote, 'Applicant.{n}.clientcase_id');
        $applicants = Set::classicExtract($quote, 'Applicant');

        /* ------ Check to determine if a payment plan already exists for the chosen quote ------ */
        if ($planCheck >= 1) {
            $this->Session->setFlash('A payment plan for that case aready exists');
            $this->redirect('/quotes/view/' . $quote['Quote']['id']);
        }

        $this->set(compact('quote', 'case_id', 'applicants', 'id'));

        /* ------ Redirect for cancel button ------ */
        if ($this->request->is('post')) {
            $cancelCheck = $_POST;
            if ($cancelCheck['PaymentButton'] == 'Cancel') {
                $this->redirect('/quotes/view/' . $quote['Quote']['id']);
            }

            /* ------ Retrieving information from page ------ */
            $plan = $this->request->data;

            /* ------ Unsetting unnecessary variables ------ */
            unset($plan['payment']);
            unset($plan['Implement']);
            unset($plan['Interest']);
            unset($plan['averageBox']);
            unset($plan['PaymentButton']);
            $plan['PaymentPlan']['quote_id'] = $quote['Quote']['id'];
            $this->PaymentPlan->create();

            /* ------ checks and counters used to determine if there is an equal amount
             * of installments and installment dates ------ */
            if (!($plan['PaymentPlan']['installment_price1'] == null)) {
                $count++;
            };
            if (!($plan['PaymentPlan']['installment_price2'] == null)) {
                $count++;
            };
            if (!($plan['PaymentPlan']['installment_price3'] == null)) {
                $count++;
            };
            if (!($plan['PaymentPlan']['installment_price4'] == null)) {
                $count++;
            };
            if (!($plan['PaymentPlan']['installment_price5'] == null)) {
                $count++;
            };
            if (!($plan['PaymentPlan']['installment_price6'] == null)) {
                $count++;
            };
            if (!($plan['PaymentPlan']['installment_date1'] == null)) {
                $countdate++;
            };
            if (!($plan['PaymentPlan']['installment_date2'] == null)) {
                $countdate++;
            };
            if (!($plan['PaymentPlan']['installment_date3'] == null)) {
                $countdate++;
            };
            if (!($plan['PaymentPlan']['installment_date4'] == null)) {
                $countdate++;
            };
            if (!($plan['PaymentPlan']['installment_date5'] == null)) {
                $countdate++;
            };
            if (!($plan['PaymentPlan']['installment_date6'] == null)) {
                $countdate++;
            };

            /* ------ Change the date data from a string into an array ------ */
            if ($count == $countdate) {
                if ($plan['PaymentPlan']['installment_date1'] != null) {
                    $plan['PaymentPlan']['installment_date1'] = array('month' => substr($plan['PaymentPlan']['installment_date1'], 3, 2),
                        'day' => substr($plan['PaymentPlan']['installment_date1'], 0, 2),
                        'year' => substr($plan['PaymentPlan']['installment_date1'], 6, 9));
                }
                if ($plan['PaymentPlan']['installment_date2'] != null) {
                    $plan['PaymentPlan']['installment_date2'] = array('month' => substr($plan['PaymentPlan']['installment_date2'], 3, 2),
                        'day' => substr($plan['PaymentPlan']['installment_date2'], 0, 2),
                        'year' => substr($plan['PaymentPlan']['installment_date2'], 6, 9));
                }
                if ($plan['PaymentPlan']['installment_date3'] != null) {
                    $plan['PaymentPlan']['installment_date3'] = array('month' => substr($plan['PaymentPlan']['installment_date3'], 3, 2),
                        'day' => substr($plan['PaymentPlan']['installment_date3'], 0, 2),
                        'year' => substr($plan['PaymentPlan']['installment_date3'], 6, 9));
                }
                if ($plan['PaymentPlan']['installment_date4'] != null) {
                    $plan['PaymentPlan']['installment_date4'] = array('month' => substr($plan['PaymentPlan']['installment_date4'], 3, 2),
                        'day' => substr($plan['PaymentPlan']['installment_date4'], 0, 2),
                        'year' => substr($plan['PaymentPlan']['installment_date4'], 6, 9));
                }
                if ($plan['PaymentPlan']['installment_date5'] != null) {
                    $plan['PaymentPlan']['installment_date5'] = array('month' => substr($plan['PaymentPlan']['installment_date5'], 3, 2),
                        'day' => substr($plan['PaymentPlan']['installment_date5'], 0, 2),
                        'year' => substr($plan['PaymentPlan']['installment_date5'], 6, 9));
                }
                if ($plan['PaymentPlan']['installment_date6'] != null) {
                    $plan['PaymentPlan']['installment_date6'] = array('month' => substr($plan['PaymentPlan']['installment_date6'], 3, 2),
                        'day' => substr($plan['PaymentPlan']['installment_date6'], 0, 2),
                        'year' => substr($plan['PaymentPlan']['installment_date6'], 6, 9));
                }
                /* ------ If successful save and redirect ------ */
                if ($this->PaymentPlan->save($plan)) {
                    $this->Session->setFlash('The payment plan has been saved', 'success');
                    $this->redirect('/quotes/view/' . $quote['Quote']['id']);
                } else {
                    $this->Session->setFlash(__('The payment plan could not be saved. Please, try again.'));
                }
            } else {
                $this->Session->setFlash(__('ERROR: There should be an equal number of installments and date'));
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
        if (!$this->PaymentPlan->exists($id)) {
            throw new NotFoundException(__('Invalid payment plan'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->PaymentPlan->save($this->request->data)) {
                $this->Session->setFlash(__('The payment plan has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The payment plan could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('PaymentPlan.' . $this->PaymentPlan->primaryKey => $id));
            $this->request->data = $this->PaymentPlan->find('first', $options);
        }
        $clientcases = $this->PaymentPlan->Clientcase->find('list');
        $this->set(compact('clientcases'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @throws MethodNotAllowedException
     * @param string $id
     * @return void
     * 
     * When deleting a payment plan the plan is first saved to the old_payment_plans  table
     * to ensure that the plan is not lost
     */
    public function delete($id = null) {
        $this->LoadModel('OldPaymentPlan');

        $plan = $this->PaymentPlan->find('first', array('conditions' => array('PaymentPlan.id' => $id), 'recursive' => 1));
        $quote_id = Set::classicExtract($plan, 'Quote.id');

        if ($plan == null) {
            throw new NotFoundException(__('Invalid payment plan'));
        }

        unset($plan['Quote']);

        $old['OldPaymentPlan'] = $plan['PaymentPlan'];

        $this->OldPaymentPlan->save($old);
        if ($this->PaymentPlan->delete($id)) {
            $this->Session->setFlash('Plan deleted', 'success');
            $this->redirect('/quotes/view/' . $quote_id);
        }
        $this->Session->setFlash(__('Payment plan not deleted'));
        $this->redirect('/paymentplans/view/' . $plan['PaymentPlan']['id']);
    }

    function ViewPaymentPlanPdf($id = null) {
        $this->LoadModel('Quote');
        $this->LoadModel('ApplicantQuote');
        $this->LoadModel('Applicant');
        $this->LoadModel('Clientcase');
        $this->LoadModel('Archive');
        $this->LoadModel('Address');

        $plan = $this->PaymentPlan->find('first', array('conditions' => array('PaymentPlan.id' => $id), 'recursive' => 2));
        $appQuote = $this->ApplicantQuote->find('first', array('conditions' => array('ApplicantQuote.quote_id'), 'recursive' => -1));
        $applicant = $this->Applicant->find('first', array('conditions' => array('Applicant.id' => $appQuote['ApplicantQuote']['applicant_id']), 'recursive' => -1));
        $case = $this->Clientcase->find('first', array('conditions' => array('Clientcase.id' => $applicant['Applicant']['clientcase_id']), 'recursive' => -1));
        $archive = $this->Archive->find('first', array('conditions' => array('Archive.id' => $case['Clientcase']['archive_id']), 'recursive' => -1));
        $address = $this->Address->find('first', array('conditions' => array('Address.applicant_id' => $applicant['Applicant']['id']), 'recursive' => 0));
        
        $this->set(compact('plan', 'applicant', 'case', 'archive', 'address'));
//debug($plan);
        $this->layout = 'pdf'; //this will use the pdf.ctp layout 

        $this->render();
    }
}
