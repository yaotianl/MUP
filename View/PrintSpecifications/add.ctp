<h1>Add Print Specification</h1>
<?php
echo $this->Html->script('auto_sum');
echo $this->Form->create('PrintSpecification');
echo $this->Form->input('printerLocation', array('options'=>array(
    'Offshore'=>'Offshore', 'Local'=>'Local'),
    'class'=>'input1', 'label'=>array('class'=>'label1')));
echo $this->Form->input('text', array('class'=>'input1', 'label'=>array('class'=>'label1')));
echo $this->Form->input('GSM', array('class'=>'input1', 'label'=>array('class'=>'label1')));
echo $this->Form->input('black&WhiteIllus', array('class'=>'input1', 'label'=>array('class'=>'label1')));
echo $this->Form->input('colorIllus', array('class'=>'input1', 'label'=>array('class'=>'label1')));
echo $this->Form->input('cover', array('options'=>array(
    'Paper Back (PB)'=>'Paper Back (PB)','Hard Back (HB)'=>'Hard Back (HB)', 'Electronic'=>'Electronic', 'POD'=>'POD'),
    'class'=>'input1', 'label'=>array('class'=>'label1')));
echo $this->Form->input('extent', array('class'=>'input1', 'label'=>array('class'=>'label1')));
echo $this->Form->input('format', array('class'=>'input1', 'label'=>array('class'=>'label1')));
echo $this->Form->input('initialPrintRun', array('class'=>'input1', 'label'=>array('class'=>'label1')));
echo $this->Form->input('printQuote', array('class'=>'input1', 'label'=>array('class'=>'label1')));
echo $this->Form->input('1stReprint', array('class'=>'input1', 'label'=>array('class'=>'label1')));
echo $this->Form->input('printQuote1', array('class'=>'input1', 'label'=>array('class'=>'label1')));
echo $this->Form->end('Save');
?>