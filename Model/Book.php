<?php

class Book extends AppModel {

	public $name = 'Book';

    public $hasOne = array(
        'Royalty' => array(
            'ClassName' => 'Royalty'
        ),
        'EditorialOrigination' => array(
            'ClassName' => 'Origination'
        ),
        'ProductionOrigination' => array(
            'ClassName' => 'Origination'
        ),
        'PrintSpecification' => array(
            'ClassName' => 'Print'
        ),
        'SalesForecast' => array(
            'ClassName' => 'Sale'
        ),
        'BusinessCaseBudget' => array(
            'ClassName' => 'Budget'
        )
    );

	public $validate = array(
		'title'=>array(
			'rule'=>'notEmpty',
			'required'=>true),
		'author1'=>array(
			'rule'=>'notEmpty'));

}

?>