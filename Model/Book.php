<?php

class Book extends AppModel {

	public $name = 'Book';

    public $hasOne = array(
        'Royalty' => array(
            'dependent'=> true,
            'ClassName' => 'Royalty'
        ),
        'EditorialOrigination' => array(
            'dependent'=> true,
            'ClassName' => 'Origination'
        ),
        'ProductionOrigination' => array(
            'dependent'=> true,
            'ClassName' => 'Origination'
        ),
        'PrintSpecification' => array(
            'dependent'=> true,
            'ClassName' => 'Print'
        ),
        'SalesForecast' => array(
            'dependent'=> true,
            'ClassName' => 'Sale'
        ),
        'Summary' => array(
            'dependent'=> true,
            'ClassName' => 'Summary'
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