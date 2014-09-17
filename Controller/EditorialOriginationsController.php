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
            return;
        }
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
}

?>