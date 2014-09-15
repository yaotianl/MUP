<?php

class EditorialOrigination extends AppModel {

    public $belongsTo = 'Book';

    public function beforeSave($options = array()) {
    }
}

?>