<!-- File: /app/View/Posts/add.ctp -->

<h1>Add Book</h1>
<?php
    echo $this->Form->create('Book');
    echo $this->Form->input('title');
    echo $this->Form->input('subtitle');
    echo $this->Form->input('division', array(
        'type' => 'select',
        'options' => array('subsidised'=>'subsidised', 'non_subsidised'=>'non_subsidised'),
        'empty' => '(choose one)'
    ));
    echo $this->Form->input('imprint', array(
        'type' => 'select',
        'options' => array('Victory'=>'Victory', 'MUP'=>'MUP', 'Meigunyah'=>'Meigunyah', 'Meanjin'=>'Meanjin', 'Custom'=>'Custom', 'Academic Monographs'=>'Academic Monographs'),
        'empty' => '(choose one)'
    ));
    echo $this->Form->input('author1');
    echo $this->Form->input('author2');
    echo $this->Form->input('author3');
    echo $this->Form->input('author4');
    echo $this->Form->input('publisher');
    echo $this->Form->input('contractNumber');
    echo $this->Form->input('ISBN');
    echo $this->Form->input('publishcationDate', array(
        'type' => 'date',
        'dateFormat' => 'DMY',
        'minYear' => date('Y'),
        'maxYear' => date('Y') + 18
    ));
    echo $this->Form->end('Save Book');
?>