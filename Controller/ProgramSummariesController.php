<?php
/**
 * Created by PhpStorm.
 * User: yaotianlin
 * Date: 15/10/2014
 * Time: 4:17 PM
 */
class ProgramSummariesController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
        $this->layout = 'admin';
    }

    public function index($year) {
        if($this->request->is(array("post", "put"))) {
            debug($year);
        }
    }

}