<?php

class RoyaltiesController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
        $this->layout = 'addABook';
    }

    public function add() {
        if ($this->request->is('POST')) {
            $this->request->data['Royalty']['book_id'] = $this->Session->read('Book');
            debug($this->request->data);
            debug($this->Royalty->save($this->request->data));
            if ($this->Royalty->save($this->request->data)) {
                return $this->redirect(array(
                    'controller'=>'publishingOriginations',
                    'action'=>'add'
                ));
            }
            else
                $this->Session->setFlash('Unable to save! ');
        }
    }

    public function edit() {
        $book_id = $this->Session->read('book_id');
        $this->layout = 'editABook';

        if(!$book_id) {
            throw new NotFoundException(__('Invalid book'));
        }
        // $book = $this->Book->findByID($id);
        $royalty = $this->Royalty->find('first', array(
            'condition'=>array('Royalty.book_id'=>$book_id)));

        if(!$royalty) {
            throw new NotFoundException(__('Invalid book'));
        }

        if($this->request->is(array('post', 'put'))) {
            //$this->Royalty->id = $id;
            if($this->Royalty->save($this->request->data)) {
                $this->Session->setFlash('The book has been updated!');
            }
        }

        if(!$this->request->data) {
            $this->request->data = $royalty;
        }
    }
}

?>