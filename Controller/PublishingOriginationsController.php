<?php

class PublishingOriginationsController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
        $this->layout = 'origination';
    }

    public function index() {

    }

    public function add() {
        if ($this->request->is('post')) {
            $this->request->data['PublishingOrigination']['book_id'] = $this->Session->read('Book');
            if ($this->PublishingOrigination->save($this->request->data)) {
                $this->redirect(array(
                    'controller' => 'editorialOriginations',
                    'action' => 'add'
                ));
            }
            $this->Session->setFlash('Unable to save!');
        }
    }


}

?>