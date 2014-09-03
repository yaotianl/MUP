<?php

class ProductionOriginationsController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
        $this->layout = 'origination';
    }
    public function add() {
        if ($this->request->is('post')) {
            $this->request->data['ProductionOrigination']['book_id'] = $this->Session->read('Book');
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