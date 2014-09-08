<?php

class RoyaltiesController extends AppController {

    public $validate = array(
        'advancedPayment' => array(
            'rule' => 'notEmpty'
        ),
        'startingRate' => array(
            'rule' => 'notEmpty'
        ),
        'rightsIncomeSplit' => array(
            'rule' => 'notEmpty'
        )
    );

    public function beforeFilter() {
        parent::beforeFilter();
        $this->layout = 'addABook';
    }

    public function add() {
        if ($this->request->is('POST')) {
            $this->request->data['Royalty']['book_id'] = $this->Session->read('Book');
            debug($this->request->data);
            if ($this->Royalty->save($this->request->data)) {
//                return $this->redirect(array(
//                    'controller'=>'publishingOriginations',
//                    'action'=>'add'
//                ));
            }
            $this->Session->setFlash('Unable to save! ');
        }
    }
}

?>