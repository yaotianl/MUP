<?php

class PublishingOriginationsController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
        $this->layout = 'addABook';
    }

    public function index() {

    }

    /**
     * Add a PublishingOrigination table and link to the existing book, make sure we can only create one.
     */
    public function add() {
        // The Book table has not yet created.
        if ($this->Session->read('Book') == null) {
            $this->Session->setFlash('Please create the book first!');
            return;
        }
        // The table exists, so we can update it.
        $count = $this->PublishingOrigination->find('count', array(
            'conditions'=>array('PublishingOrigination.book_id'=>$this->Session->read('Book'))
        ));
        if($count != 0) {
            return $this->redirect(array(
                'controller'=>'publishingOriginations',
                'action'=>'edit',
                1
            ));
        }
        // Otherwise, we just add the new record.
        if ($this->request->is('post')) {
            $this->request->data['PublishingOrigination']['book_id'] = $this->Session->read('Book');

            // Avoid creating many PublishingOrigination for one book

            if ($count == 0) {
                if ($this->PublishingOrigination->save($this->request->data)) {
                    $this->redirect(array(
                        'controller' => 'editorialOriginations',
                        'action' => 'add'
                    ));
                }
                else
                    $this->Session->setFlash('Unable to save!');
            }
            else
                $this->Session->setFlash('You already created PublishingOrigination, please edit on editing section !');

        }
    }

    public function edit($option = 0) {
        if ($option == 0) {
            $this->layout = 'editABook';
        }
        $book_id = $this->Session->read('book_id');

        if(!$book_id) {
            throw new NotFoundException(__('Invalid book'));
        }
        // $book = $this->Book->findByID($id);
        $publishingOrigination = $this->PublishingOrigination->find('first', array(
            'conditions'=>array('PublishingOrigination.book_id'=>$book_id)));

        if(!$publishingOrigination) {
            throw new NotFoundException(__('Invalid book'));
        }

        if($this->request->is(array('post', 'put'))) {
            if($this->PublishingOrigination->save($this->request->data)) {
            }
            else
                $this->Session->setFlash('Update failed!');
        }

        if(!$this->request->data) {
            $this->request->data = $publishingOrigination;
        }
    }

}

?>