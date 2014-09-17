<?php

class PrintSpecification extends AppModel {

    public $belongsTo = 'Book';

    public $validate = array(
        'RRP'=>array(
            'rule'=>array('range', -1, 10000001),
            'allowEmpty'=>false,
            'required'=>true,
            'message'=>'Please enter the price of the book.'),
        'initialPrintRun'=>array(
            'rule'=>array('range', -1, 10000001),
            'allowEmpty'=>false),
        'printQuote'=>array(
            'rule'=>'numeric',
            'allowEmpty'=>false)
        );

}

?>