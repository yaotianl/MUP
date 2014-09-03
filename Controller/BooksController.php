<?php

class BooksController extends AppController {

	public $name = 'Books';

	public $helpers = array('Html', 'Form', 'Session');

    public $components = array('Session');

    //Set the layout for the whole controller
    function beforeFilter() {
        parent::beforeFilter();
        $this->layout = 'admin';
    }

	public function index() {
    }

	public function view($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }

        $book = $this->Book->findById($id);
        if (!$book) {
            throw new NotFoundException(__('Invalid post'));
        }
        $this->set('book', $book);
    }	

    public function test() {
        $this->set('books', $this->Book->find('first', array(
            'condition'=>array('Book.author1'=>'Yaotian Lin'))));
    }

    public function add() {
        $this->layout = 'addABook';
        if ($this->request->is('post')) {
            $this->Book->create();
            if ($this->Book->save($this->request->data)) {
                $this->Session->write('Book', $this->request->data('Book.id'));
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