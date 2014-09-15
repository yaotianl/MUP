<?php

class Book extends AppModel {

	public $name = 'Book';

    public $hasOne = array(
        'Royalty' => array(
            'ClassName' => 'Royalty'
        ),
        'PublishingOrigination' => array(
            'ClassName' => 'Origination'
        ),
        'EditorialOrigination' => array(
            'ClassName' => 'Origination'
        ),
        'ProductionOrigination' => array(
            'ClassName' => 'Origination'
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