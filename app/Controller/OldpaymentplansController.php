<?php
App::uses('AppController', 'Controller');
/**
 * OldPaymentPlans Controller
 *
 * @property OldPaymentPlan $OldPaymentPlan
 */
class OldPaymentPlansController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index($id = null) 
        {
            $this->loadModel('Quote');
                $oldPaymentPlans = $this->OldPaymentPlan->find('all', array('conditions' => array('OldPaymentPlan.quote_id' => $id), 'recursive' => -1));
                $quote = $this->Quote->find('first', array('conditions' => array('Quote.id' => $oldPaymentPlans[0]['OldPaymentPlan']['quote_id'])));

                $this->set(compact('oldPaymentPlans', 'quote', 'id'));
		$this->set('oldPaymentPlans', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->OldPaymentPlan->exists($id)) {
			throw new NotFoundException(__('Invalid old payment plan'));
		}
		//$options = array('conditions' => array('OldPaymentPlan.' . $this->OldPaymentPlan->primaryKey => $id));
		
                $this->LoadModel('Clientcase');
                $this->LoadModel('ApplicantQuote');
                
                $oldPaymentPlan = $this->OldPaymentPlan->find('first', array('conditions' => array('OldPaymentPlan.id' => $id)));
                
                $appQuote = $this->ApplicantQuote->find('first', array('conditions' => array('quote_id' => $oldPaymentPlan['Quote']['id']), 'recursive' => 1));
                
                $this->set(compact('oldPaymentPlan', 'appQuote'));
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
		$this->OldPaymentPlan->id = $id;
		if (!$this->OldPaymentPlan->exists()) {
			throw new NotFoundException(__('Invalid old payment plan'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->OldPaymentPlan->delete()) {
			$this->Session->setFlash(__('Old payment plan deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Old payment plan was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
