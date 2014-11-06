<?php
/**
 * Created by PhpStorm.
 * User: yaotianlin
 * Date: 29/10/2014
 * Time: 4:59 PM
 */
class AnnualSummariesController extends AppController {
    public function beforeFilter() {
        parent::beforeFilter();
        $this->layout = 'admin';
    }
    public function index($data) {
        debug($data);
        $summary = $this->AnnualSummary->find('first', array(
            'conditions'=>array('AnnualSummary.id'=>$data)
        ));
        debug($summary);
    }
}
?>