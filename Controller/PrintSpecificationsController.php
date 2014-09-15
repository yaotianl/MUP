<?php

class PrintSpecificationsController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
        $this->layout = 'addABook';
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->request->data['PrintSpecification']['book_id'] = $this->Session->read('Book');
            if ($this->PrintSpecification->save($this->request->data)) {
                $this->redirect(array(
                    'controller'=>'salesForecasts',
                    'action'=>'add'
                ));
            }
            else
                $this->Session->setFlash('Unable to save!');
        }
    }
}

?>