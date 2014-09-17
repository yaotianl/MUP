<?php

class PrintSpecificationsController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
        $this->layout = 'addABook';
    }

    /**
     * Add a EditorialOrigination table and link to the existing book, make sure we can only create one.
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->request->data['PrintSpecification']['book_id'] = $this->Session->read('Book');

            // Avoid creating many PrintSpecification for one book
            $count = $this->PrintSpecification->find('count', array(
                'conditions'=>array('PrintSpecification.book_id'=>$this->Session->read('Book'))
            ));
            if ($count == 0) {
                if ($this->PrintSpecification->save($this->request->data)) {
                    $this->redirect(array(
                        'controller'=>'salesForecasts',
                        'action'=>'add'
                    ));
                }
                else
                    $this->Session->setFlash('Unable to save!');
            }
            else
                $this->Session->setFlash('You already created PrintSpecification, please edit on editing section !');

        }
    }
}

?>