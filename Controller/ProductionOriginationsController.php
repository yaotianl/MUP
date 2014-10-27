<?php

class ProductionOriginationsController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
        $this->layout = 'addABook';
    }
    /**
     * Add a ProductionOrigination table and link to the existing book, make sure we can only create one.
     */
    public function add() {

        // The Book table has not yet created.
        if ($this->Session->read('Book') == null) {
            $this->Session->setFlash('Please create the book first!');
            return $this->redirect(array(
                'controller'=>'books',
                'action'=>'add'
            ));
        }

        // The table exists, so we can update it.
        $count = $this->ProductionOrigination->find('count', array(
            'conditions'=>array('ProductionOrigination.book_id'=>$this->Session->read('Book'))
        ));
        if($count != 0) {
            return $this->redirect(array(
                'controller'=>'productionOriginations',
                'action'=>'edit',
                1
            ));
        }

        // Otherwise, we just add the new record.
        if ($this->request->is('post')) {
            $this->request->data['ProductionOrigination']['book_id'] = $this->Session->read('Book');

            // Avoid creating many ProductionOrigination for one book
            $count = $this->ProductionOrigination->find('count', array(
                'conditions'=>array('ProductionOrigination.book_id'=>$this->Session->read('Book'))
            ));
            if ($count == 0){
                if ($this->ProductionOrigination->save($this->request->data)) {
                    $this->redirect(array(
                        'controller' => 'printSpecifications',
                        'action' => 'add'
                    ));
                }
                else
                    $this->Session->setFlash('Unable to save!');
            }
            else
                $this->Session->setFlash('You already created ProductionOrigination, please edit on editing section !');
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
        $productionOrigination = $this->ProductionOrigination->find('first', array(
            'conditions'=>array('ProductionOrigination.book_id'=>$book_id)));

        if($this->request->is(array('post', 'put'))) {
            $this->request->data['ProductionOrigination']['book_id'] = $book_id;
            if($this->ProductionOrigination->save($this->request->data)) {
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
            $this->request->data = $productionOrigination;
        }
    }
}

?>