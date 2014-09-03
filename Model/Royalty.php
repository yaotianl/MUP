<?php 
class Royalty extends AppModel {

    public $belongsTo = 'Book';
	public $name = 'Royalty';

    public $validate = array(
        'advancedPayment'=>array(
            'rule'=>'notEmpty',
            'required'=>true),
        'startingRate'=>array(
            'rule'=>'notEmpty'),
        'rightsIncomeSplit'=>array(
            'rule'=>'notEmpty'
        ));
}
?>