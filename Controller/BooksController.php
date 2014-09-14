<?php

class BooksController extends AppController {

	public $name = 'Books';

	public $helpers = array('Html', 'Form', 'Session');

    public $components = array('Session');

    //Set the layout for the whole controller
    function beforeFilter() {
        $this->layout = 'admin';
        parent::beforeFilter();

    }

	public function index() {
    }

    public function edit($id = null) {

        $this->layout = 'editABook';


        if(!$id) {
            throw new NotFoundException(__('Invalid book'));
        }
        // $book = $this->Book->findByID($id);
        $book = $this->Book->find('first', array(
            'condition'=>array('Book.id'=>$id)));

        if(!$book) {
            throw new NotFoundException(__('Invalid book'));
        }

        $this->Session->write('book_id', $id);

        if($this->request->is(array('post', 'put'))) {
            $this->Book->id = $id;
            if($this->Book->save($this->request->data)) {
                $this->Session->setFlash('The book has been updated!');
            }
        }

        if(!$this->request->data) {
            $this->request->data = $book;
        }
    }

	public function viewAll() {
        $book = $this->Book->find('all');
        if (!$book) {
            throw new NotFoundException(__('There is no book currently!'));
        }
        //debug($book);
        $this->set('books', $book);
    }	

    public function test() {
        $this->set('books', $this->Book->find('first', array(
            'condition'=>array('Book.author1'=>'lin'))));
    }

    public function add() {
        $this->layout = 'addABook';
        if ($this->request->is('post')) {
            debug($this->request->data);
            $this->Book->create();
            if ($this->Book->save($this->request->data)) {
                $this->Session->write('Book', $this->Book->getLastInsertId());
                debug($this->Book->getLastInsertId());
                return $this->redirect(array(
                    'controller'=>'royalties',
                    'action'=>'add'
                ));
            }
            $this->Session->setFlash('Unable to save !');
        }
    }
}

?>