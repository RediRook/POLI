<?php
App::uses('Controller', 'Controller');
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController {

    /**
     * index method
     *
     * @return void
     *
     *
     */
    var $paginate = array(
        'limit' => '1000000',
        'order' => array(
            'User.username' => 'asc'));

    function beforeFilter() {
        $this->Auth->allow('login', 'forgetpwd', 'resetpw');
        /* $this->set('logged_in',$this->Auth->loggedIn());
          $this->set('current_user',$this->Auth->user()); */
    }

    public function login() {
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                if ($this->Auth->user('role') == '3') {
                    $this->layout = 'customer';
                    $this->redirect(array(
                        'controller' => 'users',
                        'action' => 'customer',
                    ));
                }
                if ($this->Auth->user('role') == '2') {
                    $this->layout = 'staff';
                    $this->redirect(array(
                        'controller' => 'users',
                        'action' => 'staff',
                    ));
                }
                if ($this->Auth->user('role') == '1') {
                    $this->redirect($this->Auth->redirect());
                }
            } else {
                $this->Session->setFlash('Your username/password combination was incorrect', 'flash_bad');
            }
        }
    }

    public function logout() {
        $this->redirect($this->Auth->logout());
    }

    public function index() {
        if ($this->Auth->user('role') == '1') {
            $this->layout = 'admin';
        }
        if ($this->Auth->user('role') == '2') {
            $this->redirect(array('controller' => 'pages', 'action' => 'error'));
        }
        if ($this->Auth->user('role') == '3') {
            $this->redirect(array('controller' => 'pages', 'action' => 'error'));
        }
        $this->User->recursive = 0;
        $this->set('users', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if ($this->Auth->user('role') == '1') {
            $this->layout = 'admin';
        }
        if ($this->Auth->user('role') == '2') {
            $this->redirect(array('controller' => 'pages', 'action' => 'error'));
        }
        if ($this->Auth->user('role') == '3') {
            $this->redirect(array('controller' => 'pages', 'action' => 'error'));
        }
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }
        $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
        $this->set('user', $this->User->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->Auth->user('role') == '1') {
            $this->layout = 'admin';
        }
        if ($this->Auth->user('role') == '2') {
            $this->redirect(array('controller' => 'pages', 'action' => 'error'));
        }
        if ($this->Auth->user('role') == '3') {
            $this->redirect(array('controller' => 'pages', 'action' => 'error'));
        }
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash('The user has been saved', 'flash_good');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('The user could not be saved. Please, try again.', 'flash_bad');
            }
        }
        $roles = $this->User->Role->find('list');
        $this->set(compact('roles'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if ($this->Auth->user('role') == '1') {
            $this->layout = 'admin';
        }
        if ($this->Auth->user('role') == '2') {
            $this->redirect(array('controller' => 'pages', 'action' => 'error'));
        }
        if ($this->Auth->user('role') == '3') {
            $this->redirect(array('controller' => 'pages', 'action' => 'error'));
        }
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash('The user has been saved', 'flash_good');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('The user could not be saved. Please, try again.', 'flash_bad');
            }
        } else {
            $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
            $this->request->data = $this->User->find('first', $options);
        }
        $roles = $this->User->Role->find('list');
        $this->set(compact('roles'));
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
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }

        if ($this->User->delete()) {
            $this->Session->setFlash('User deleted', 'flash_good');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash('User was not deleted', 'flash_bad');
        $this->redirect(array('action' => 'index'));
    }

    public function admin() {
        if ($this->Auth->user('role') == '1') {
            $this->layout = 'admin';
        }
        if ($this->Auth->user('role') == '2') {
            $this->redirect(array('controller' => 'pages', 'action' => 'error'));
        }
        if ($this->Auth->user('role') == '3') {
            $this->redirect(array('controller' => 'pages', 'action' => 'error'));
        }
    }

    public function staff() {
        if ($this->Auth->user('role') == '1') {
            $this->redirect(array('controller' => 'pages', 'action' => 'error'));
        }
        if ($this->Auth->user('role') == '2') {
            $this->layout = 'staff';
        }
        if ($this->Auth->user('role') == '3') {
            $this->redirect(array('controller' => 'pages', 'action' => 'error'));
        }
    }

    public function customer() {
        if ($this->Auth->user('role') == '1') {
            $this->redirect(array('controller' => 'pages', 'action' => 'error'));
        }
        if ($this->Auth->user('role') == '2') {
            $this->redirect(array('controller' => 'pages', 'action' => 'error'));
        }
        if ($this->Auth->user('role') == '3') {
            $this->layout = 'customer';
        }
    }

    function forgetpwd() {

        $this->User->recursive = -1;
        if (!empty($this->data)) {
            if (empty($this->data['User']['username'])) {
                $this->Session->setFlash('Please Provide Your Email Address that You used to Register with Us', 'flash_good');
            } else {
                $UsersEmail = $this->data['User']['username'];
                $fu = $this->User->find('first', array('conditions' => array('User.username' => $UsersEmail)));
                if ($fu) {

                    $key = Security::hash(String::uuid(), 'sha512', true);
                    $hash = sha1($fu['User']['username'] . rand(0, 100));
                    $url = Router::url(array('controller' => 'users', 'action' => 'resetpw'), true) . '/' . $key . '#' . $hash;
                    $ms = $url;

                    $ms = wordwrap($ms, 1000);

                    $fu['User']['token_hash'] = $key;
                    $this->User->id = $fu['User']['id'];
                    $this->User->token_hash = $fu['User']['token_hash'];
                    if ($this->User->saveField('token_hash', $fu['User']['token_hash'])) {

                        //============Email================//
                        /* SMTP Options */
                        $ResetEmail = new CakeEmail('contactform');
                        $ResetEmail->template('resetpw');
                        $ResetEmail->to($fu['User']['username']);
                        $ResetEmail->from('lpan27@student.monash.edu');
                        $ResetEmail->subject('Reset your password for Baysidegardner system');
                        $ResetEmail->emailFormat('both');

                        $ResetEmail->viewVars(array('ms' => $ms));
                        $ResetEmail->send();
                        //$this->set('smtp_errors', $this->ResetEmail->smtpError);
                        $this->Session->setFlash('Check your email to reset your password.', 'flash_good');
                        //============EndEmail=============//
                    } else {
                        $this->Session->setFlash('Error Generating Reset link.', 'flash_bad');
                    }
                } else {
                    $this->Session->setFlash('Email does not exist.', 'flash_bad');
                }
            }
        }
    }

    function resetpw($token = null) {
        //$this->layout="Login";
        $this->User->recursive = -1;
        if (!empty($token)) {
            $u = $this->User->findBytoken_hash($token);
            if ($u) {
                $this->User->id = $u['User']['id'];
                if (!empty($this->data)) {
                    $this->User->data = $this->data;
                    $this->User->data['User']['username'] = $u['User']['username'];
                    /* $new_hash=sha1($u['User']['username'].rand(0,100));//created token
                      debug($new_hash); */
                    /*    $this->User->data['User']['token_hash']=$new_hash; */
                    if ($this->User->validates(array('fieldList' => array('password', 'password_confirmation')))) {
                        if ($this->User->save($this->User->data)) {
                            $this->Session->setFlash('Password Has been Updated', 'flash_good');
                            $this->redirect(array('controller' => 'users', 'action' => 'login'));
                        }
                    } else {

                        $this->set('errors', $this->User->invalidFields());
                    }
                }
            } else {
                $this->Session->setFlash('Token Corrupted,Please Retry.the reset link work only for once.', 'flash_bad');
            }
        } else {
            $this->redirect('/');
        }
    }

}
