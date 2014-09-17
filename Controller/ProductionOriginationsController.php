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
}

?>