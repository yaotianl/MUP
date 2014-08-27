<?php

class Book extends AppModel {

	public $name = 'Book';

    public $hasMany = array(
        'Royalty'
    );

	public $validate = array(
		'title'=>array(
			'rule'=>'notEmpty',
			'required'=>true),
		'author1'=>array(
			'rule'=>'notEmpty'));
}

?>