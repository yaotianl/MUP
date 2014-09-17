
<h1>Add Editorial Origination</h1>
<?php
echo $this->Html->script('auto_sum');
echo $this->Form->create('EditorialOrigination');
echo $this->Form->input('copyEditing', array('class'=>'input1', 'label'=>array('class'=>'label1')));
echo $this->Form->input('proofreading', array('class'=>'input1', 'label'=>array('class'=>'label1')));
echo $this->Form->input('indexing', array('class'=>'input1', 'label'=>array('class'=>'label1')));
echo $this->Form->input('readingFee', array('class'=>'input1', 'label'=>array('class'=>'label1')));
echo $this->Form->input('writerFee', array('class'=>'input1', 'label'=>array('class'=>'label1')));
echo $this->Form->input('externalEditorial', array('class'=>'input1', 'label'=>array('class'=>'label1')));
echo $this->Form->input('maps', array('class'=>'input1', 'label'=>array('class'=>'label1')));
echo $this->Form->input('factChecking', array('class'=>'input1', 'label'=>array('class'=>'label1')));
echo $this->Form->input('other', array('class'=>'input1', 'label'=>array('class'=>'label1')));
echo $this->Form->input('totalEditorial', array('class'=>'total', 'label'=>array('class'=>'label1'), 'readonly'=>'readonly'));
echo $this->Form->end('Save');
?>