<?php 
class Book extends AppModel {
	public $name = 'Book';
	public $validate = array(
		'title'=>array(
			'rule'=>'alphaNumeric',
			'required'=>true,
			'message'=>'The title should be alphaNumeric!'),
		'author1'=>array(
			'rule'=>'notEmpty'));
}
?>