<?php

class RoyaltiesController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
        $this->layout = 'addABook';
    }

    /**
     * Add a Royalty table and link to the existing book, make sure we can only create one.
     */
    public function add() {
        if ($this->Session->read('Book') == null) {
            $this->Session->setFlash('Please create the book first!');
            return;
        }
        $count = $this->Royalty->find('count', array(
            'conditions'=>array('Royalty.book_id'=>$this->Session->read('Book'))
        ));
        if($count != 0) {
            return $this->redirect(array(
                'controller'=>'royalties',
                'action'=>'edit',
                1
            ));
        }
        if ($this->request->is('POST')) {
            $this->request->data['Royalty']['book_id'] = $this->Session->read('Book');
//            debug($this->request->data);
//            debug($this->Royalty->save($this->request->data));

            // Avoid creating many Royalty for one book

            if ($count == 0) {
                if ($this->Royalty->save($this->request->data)) {
                    return $this->redirect(array(
                        'controller'=>'editorialOriginations',
                        'action'=>'add'
                    ));
                }
                else
                    $this->Session->setFlash('Unable to save! ');
            }
            else
                $this->Session->setFlash('You already created Royalty, please edit on editing section !');

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
        $royalty = $this->Royalty->find('first', array(
            'conditions'=>array('Royalty.book_id'=>$book_id)));


        if($this->request->is(array('post', 'put'))) {
            //$this->Royalty->id = $id;
            $this->request->data['Royalty']['book_id'] = $book_id;
            if($this->Royalty->save($this->request->data)) {
                $this->Session->setFlash('Successfully update!');
            }
            else
                $this->Session->setFlash('Update failed!');
        }

        if(!$this->request->data) {
            $this->request->data = $royalty;
        }
    }
}

?>