<?php

class PublishingOriginationsController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
        $this->layout = 'addABook';
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
            else
                $this->Session->setFlash('Unable to save!');
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