<?php

class EditorialOriginationsController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
        $this->layout = 'origination';
    }


    public function add() {
        if ($this->request->is('post')) {
            $this->request->data['EditorialOrigination']['book_id'] = $this->Session->read('Book');
            if ($this->EditorialOrigination->save($this->request->data)) {
                $this->redirect(array(
                    'controller'=>'productionOriginations',
                    'action'=>'add'
                ));
            }
            $this->Session->setFlash('Unable to save!');
        }
    }
}

?>