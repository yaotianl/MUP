<?php

class SalesForecastsController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
        $this->layout = 'addABook';
    }

    /**
     * Add a SaleForecast table and link to the existing book, make sure we can only create one.
     */
    public function add() {
//        debug($this->SalesForecast->Book->find('all'));
//                'conditions'=>array('Book.id'=>'3')
//            ))
//        );
        $book = $this->SalesForecast->Book->find('first', array(
            'conditions'=>array('Book.id'=>$this->Session->read('Book'))
        ));
        if ($book==null) {
            $book['PrintSpecification']['RRP'] = 'NaN';
            $book['PrintSpecification']['totalPrintRuns'] = 'NaN';

        }
        $this->set('book', $book);
        if ($this->request->is('POST')) {
            $this->request->data['SaleForecast']['book_id'] = $this->Session->read('Book');

            debug($this->request->data);

            // Avoid creating many SalesForecast for one book
            $count = $this->SalesForecast->find('count', array(
                'conditions'=>array('SalesForecast.book_id'=>$this->Session->read('Book'))
            ));
            if ($count == 0) {
                if ($this->SalesForecast->save($this->request->data)) {
                    return $this->redirect(array(
                        'controller'=>'home',
                        'action'=>'index'
                    ));
                }
                else
                    $this->Session->setFlash('Unable to save! ');
            }
            else
                $this->Session->setFlash('You already created SalesForecast, please edit on editing section !');

        }
    }

    public function edit() {
        $book_id = $this->Session->read('book_id');
        $this->layout = 'editABook';
    }
}

?>