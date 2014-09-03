<?php

class ProductionOriginationsController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
        $this->layout = 'origination';
    }
    public function add() {
        if ($this->request->is('post')) {
            if ($this->ProductionOrigination->save($this->request->data)) {
                $this->redirect(array(
                    'controller' => 'printSpecification',
                    'action' => 'add'
                ));
            }
            $this->Session->setFlash('Unable to save!');
        }
    }
}

?>