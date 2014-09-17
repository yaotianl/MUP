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
        if ($this->request->is('post')) {
            $this->request->data['PublishingOrigination']['book_id'] = $this->Session->read('Book');

            // Avoid creating many PublishingOrigination for one book
            $count = $this->PublishingOrigination->find('count', array(
                'conditions'=>array('PublishingOrigination.book_id'=>$this->Session->read('Book'))
            ));
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

    public function edit() {
        $book_id = $this->Session->read('book_id');
        $this->layout = 'editABook';

        if(!$book_id) {
            throw new NotFoundException(__('Invalid book'));
        }
        // $book = $this->Book->findByID($id);
        $publishingOrigination = $this->publishingOrigination->find('first', array(
            'condition'=>array('PublishingOrigination.book_id'=>$book_id)));

        if(!$publishingOrigination) {
            throw new NotFoundException(__('Invalid book'));
        }

        if($this->request->is(array('post', 'put'))) {
            if($this->PublishingOrigination->save($this->request->data)) {
                $this->Session->setFlash('The book has been updated!');
            }
        }

        if(!$this->request->data) {
            $this->request->data = $publishingOrigination;
        }
    }

}

?>