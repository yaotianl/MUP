<?php

class RoyaltiesController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
        $this->layout = 'addABook';
    }

    public function add() {
        if ($this->request->is('POST')) {
            if ($this->Royalty->save($this->request->data)) {
                return $this->redirect(array(
                    'controller'=>'publishingOriginations',
                    'action'=>'add'
                ));
            }
            $this->Session->setFlash('Unable to save! ');
        }
    }
}

?>