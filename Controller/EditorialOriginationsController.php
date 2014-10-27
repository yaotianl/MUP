<?php

class EditorialOriginationsController extends AppController {

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
            return $this->redirect(array(
                'controller'=>'books',
                'action'=>'add'
            ));
        }

        // The table exists, so we can update it.
        $count = $this->EditorialOrigination->find('count', array(
            'conditions'=>array('EditorialOrigination.book_id'=>$this->Session->read('Book'))
        ));
        if($count != 0) {
            return $this->redirect(array(
                'controller'=>'editorialOriginations',
                'action'=>'edit',
                1
            ));
        }

        // Otherwise, we just add the new record.
        if ($this->request->is('post')) {
            $this->request->data['EditorialOrigination']['book_id'] = $this->Session->read('Book');

            // Avoid creating many EditorialOrigination for one book
            $count = $this->EditorialOrigination->find('count', array(
                'conditions'=>array('EditorialOrigination.book_id'=>$this->Session->read('Book'))
            ));
            if($count == 0){
                if ($this->EditorialOrigination->save($this->request->data)) {
                    $this->redirect(array(
                      'controller'=>'productionOriginations',
                        'action'=>'add'
                    ));
                }
                else
                    $this->Session->setFlash('Unable to save!');
            }
            else
                $this->Session->setFlash('You already created EditorialOrigination, please edit on editing section !');

        }
    }

    public function edit($option = 0) {
        if ($option == 0) {
            $this->layout = 'editABook';
        }
        $book_id = $this->Session->read('Book');

        if(!$book_id) {
            throw new NotFoundException(__('Invalid book'));
        }
        // $book = $this->Book->findByID($id);
        $editorialOrigination = $this->EditorialOrigination->find('first', array(
            'conditions'=>array('EditorialOrigination.book_id'=>$book_id)));


        if($this->request->is(array('post', 'put'))) {
            $this->request->data['EditorialOrigination']['book_id'] = $book_id;
            if($this->EditorialOrigination->save($this->request->data)) {
                $this->Session->setFlash('Successfully update!');
                return $this->redirect(array(
                    'controller'=>'summaries',
                    'action'=>'index'
                ));
            }
            else
                $this->Session->setFlash('Update failed!');
        }

        if(!$this->request->data) {
            $this->request->data = $editorialOrigination;
        }
    }

}

?>