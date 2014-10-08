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
        if ($this->Session->read('Book') == null) {
            $this->Session->setFlash('Please create the book first!');
            $book['PrintSpecification']['RRP'] = 'NaN';
            $book['PrintSpecification']['totalPrintRuns'] = 'NaN';
            $book['PrintSpecification']['averageUnitCost'] = 'NaN';
            $this->set('book', $book);
            return;
        }
//        debug($this->SalesForecast->Book->find('all'));
//                'conditions'=>array('Book.id'=>'3')
//            ))
//        );
        $book = $this->SalesForecast->Book->find('first', array(
            'conditions'=>array('Book.id'=>$this->Session->read('Book'))
        ));
        if ($book==null) {
            $book['PrintSpecification']['RRP'] = 0;
            $book['PrintSpecification']['totalPrintRuns'] = 0;
            $book['PrintSpecification']['averageUnitCost'] = 0;
        }
        $this->set('book', $book);

        // Avoid creating many SalesForecast for one book
        $count = $this->SalesForecast->find('count', array(
            'conditions'=>array('SalesForecast.book_id'=>$this->Session->read('Book'))
        ));
        if($count != 0) {
            return $this->redirect(array(
                'controller'=>'salesForecasts',
                'action'=>'edit',
                1
            ));
        }
        // Otherwise, we just add the new record.
        if ($this->request->is('POST')) {
            $this->request->data['SalesForecast']['book_id'] = $this->Session->read('Book');

            if ($count == 0) {
                if ($this->SalesForecast->save($this->request->data)) {
                    return $this->redirect(array(
                        'controller'=>'summaries',
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

    public function edit($option = 0) {
        if ($option == 0) {
            $this->layout = 'editABook';
        }

        $book_id = $this->Session->read('Book');
        if(!$book_id) {
            throw new NotFoundException(__('Invalid book'));
        }
        $book = $this->SalesForecast->Book->find('first', array(
            'conditions'=>array('Book.id'=>$this->Session->read('Book'))
        ));
        if ($book==null) {
            $book['PrintSpecification']['RRP'] = 0;
            $book['PrintSpecification']['totalPrintRuns'] = 0;
            $book['PrintSpecification']['averageUnitCost'] = 0;
        }
        $this->set('book', $book);
        $salesForecast = $this->SalesForecast->find('first', array(
            'conditions'=>array('SalesForecast.book_id'=>$book_id)));


        if($this->request->is(array('post', 'put'))) {
            $this->request->data['SalesForecast']['book_id'] = $book_id;
            if($this->SalesForecast->save($this->request->data)) {
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
            $this->request->data = $salesForecast;
        }
    }
}

?>