<h1>Add Publishing Origination</h1>
<?php
/* input is divided into three types:
    input1 is for normal input, input2 is for income, total is for total amoung
*/
echo $this->Html->script('auto_sum');
echo $this->Form->create('PublishingOrigination');
echo $this->Form->input('development', array('class'=>'input1', 'label'=>array('class'=>'label1')));
echo $this->Form->input('managementFee', array('class'=>'input1', 'label'=>array('class'=>'label1')));
echo $this->Form->input('legalFee', array('class'=>'input1', 'label'=>array('class'=>'label1')));
echo $this->Form->input('other', array('class'=>'input1', 'label'=>array('class'=>'label1')));
echo $this->Form->input('titleSpecificSubsidy', array('class'=>'input2', 'label'=>array('class'=>'label1')));
echo $this->Form->input('source', array('class'=>'input1', 'label'=>array('class'=>'label1')));
echo $this->Form->input('totalPublishing', array('class'=>'total', 'label'=>array('class'=>'label1')));

echo $this->Form->end('Save');
?>