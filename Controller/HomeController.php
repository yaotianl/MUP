<?php

/**
 * Class HomeController
 * @author: Yaotian Lin
 */
class HomeController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
        $this->layout = 'admin';
    }

    public function index() {
    }

}

?>