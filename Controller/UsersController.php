<?php

class UsersController extends AppController {

    public function index() {
        $users = $this->User->find(all);
        pr($users);

    }

    public function add() {
        if($this->request->is("post")){
            $this->User->save($this->request->data);
            $this->redirect('/users');
        }else{
            echo "NO POST";
        }
    }

    public function login() {
        if($this->request->is('post')){
//            $user = $this->User->find('first', array(
//               'conditions' => array(
//                   'email' =>  $this->request->data('User.email'),
//                   'password' => $this->request->data('User.password')
//               )
//            ));
            $user = $this->User->findByEmailAndPassword($this->request->data('User.email'), $this->request->data('User.password'));
            if($user){
                $this->Session->write("User", $user);
                $this->redirect(array(
                    'controller'=>'books',
                    'action'=>'index'
                ));
            }
            $this->Session->setFlash("The email and password are not match.");
        }
    }
}

?>