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
        if ($this->Session->read('Book') == null) {
            $this->Session->setFlash('Please create the book first!');
            return;
        }
        // The table exists, so we can update it.
        $count = $this->PrintSpecification->find('count', array(
            'conditions'=>array('PrintSpecification.book_id'=>$this->Session->read('Book'))
        ));
        if($count != 0) {
            return $this->redirect(array(
                'controller'=>'printSpecifications',
                'action'=>'edit',
                1
            ));
        }

        // Otherwise, we just add the new record.
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

    public function edit($option = 0) {
        if ($option == 0) {
            $this->layout = 'editABook';
        }
        $book_id = $this->Session->read('Book');
        if (!$book_id) {
            throw new NotFoundException(__('Invalid book'));
        }

        $printSpecification = $this->PrintSpecification->find('first', array(
            'conditions'=>array('PrintSpecification.book_id'=>$book_id)
        ));
        if ($this->request->is(array('put', 'post'))) {
            $this->request->data['PrintSpecification']['book_id'] = $book_id;
            if( $this->PrintSpecification->save($this->request->data)) {
                $this->Session->setFlash('Successfully update!');
            }
            else
                $this->Session->setFlash('Update failed!');
        }

        if (!$this->request->data) {
            $this->request->data = $printSpecification;
        }
    }
}

?>