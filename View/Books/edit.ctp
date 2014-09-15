<!-- File: /app/View/Posts/add.ctp -->

<h1>Add Book</h1>
<?php
echo $this->Form->create('Book');

echo $this->Form->input('title', array('class'=>'input1', 'label'=>array('class'=>'label1')));
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->input('subtitle', array('class'=>'input1', 'label'=>array('class'=>'label1')));
echo $this->Form->input('division', array(
    'type' => 'select',
    'options' => array('subsidised'=>'subsidised', 'non_subsidised'=>'non_subsidised'),
    'empty' => '(choose one)',
    'class' => 'input1',
    'label' => array('class'=>'label1')
));
echo $this->Form->input('imprint', array(
    'type' => 'select',
    'options' => array('Victory'=>'Victory', 'MUP'=>'MUP', 'Meigunyah'=>'Meigunyah', 'Meanjin'=>'Meanjin', 'Custom'=>'Custom', 'Academic Monographs'=>'Academic Monographs'),
    'empty' => '(choose one)',
    'class' => 'input1',
    'label' => 'label1'
));
echo $this->Form->input('author1', array('class'=>'input1', 'label'=>array('class'=>'label1')));
echo $this->Form->input('author2', array('class'=>'input1', 'label'=>array('class'=>'label1')));
echo $this->Form->input('author3', array('class'=>'input1', 'label'=>array('class'=>'label1')));
echo $this->Form->input('author4', array('class'=>'input1', 'label'=>array('class'=>'label1')));
echo $this->Form->input('publisher', array('class'=>'input1', 'label'=>array('class'=>'label1')));
echo $this->Form->input('contractNumber', array('class'=>'input1', 'label'=>array('class'=>'label1')));
echo $this->Form->input('ISBN', array('class'=>'input1', 'label'=>array('class'=>'label1')));
echo $this->Form->input('publishcationsDate', array(
    'type' => 'date',
    'dateFormat' => 'DMY',
    'minYear' => date('Y'),
    'maxYear' => date('Y') + 18,
    'label' => array('class'=>'label1'),
    'class' => 'input1'
));
echo $this->Form->end('Update Book');
?>