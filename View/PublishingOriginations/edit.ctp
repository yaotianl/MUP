<h1> Publishing Origination</h1>
<?php

echo $this->Html->script('auto_sum');
echo $this->Form->create('PublishingOrigination');
echo $this->Form->input('id', array('type' => 'hidden'));

echo $this->Form->input('development', array('class'=>'input1', 'label'=>array('class'=>'label1')));
echo $this->Form->input('managementFee', array('class'=>'input1', 'label'=>array('class'=>'label1')));
echo $this->Form->input('legalFee', array('class'=>'input1', 'label'=>array('class'=>'label1')));
echo $this->Form->input('other', array('class'=>'input1', 'label'=>array('class'=>'label1')));
echo $this->Form->input('titleSpecificSubsidy', array('class'=>'input2', 'label'=>array('class'=>'label1')));
echo $this->Form->input('source', array('class'=>'input1', 'label'=>array('class'=>'label1')));
echo $this->Form->input('totalPublishing', array('class'=>'total', 'label'=>array('class'=>'label1'), 'readonly'=>'readonly'));

echo $this->Form->end('Update');
?>