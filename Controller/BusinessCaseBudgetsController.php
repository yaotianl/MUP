<?php
/**
 * Created by PhpStorm.
 * User: yaotianlin
 * Date: 17/09/2014
 * Time: 3:17 PM
 */
class BusinessCaseBudgetsController extends AppController{

    public function beforeFilter() {
        parent::beforeFilter();
        $this->layout = 'addABook';
    }

    public function index() {
        debug($this->BusinessCaseBudget->Book->find('first', array(
            'conditions'=>array('Book.id'=>$this->Session->read('Book'))
        )));
    }

}

?>