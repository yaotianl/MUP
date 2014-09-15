<?php

class SalesForecastsController extends AppController {

    public function beforeFiter(){
        parent::beforeFilter();
        $this->layout = 'addBook';
    }

    public function add() {

    }

    public function edit() {
        
    }
}

?>