<?php
class BooksController extends AppController {
	public $name = 'Books';
	public $helpers = array('Html', 'Form', 'Session');
    public $components = array('Session');

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
        if ($this->request->is('post')) {
            $this->Book->create();
            if ($this->Book->save($this->request->data)) {
                $this->Session->setFlash(__('Your book has been saved.'));
                return $this->redirect('/index');
            }
            $this->Session->setFlash(__('Unable to save'));
        }
    }
}
?>