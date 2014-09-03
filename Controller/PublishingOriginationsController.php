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