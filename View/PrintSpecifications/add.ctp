<h1>Add Print Specification</h1>
<br>
<?php
echo $this->Html->script('auto_unit');


echo $this->Form->create('PrintSpecification');
echo $this->Form->input('RRP', array('class'=>'input1', 'label'=>array('class'=>'label', 'text'=>'RRP including GST')));
echo '<br><div id="block"><label> Print Specification </label></div><br>';

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
echo '<br><div id="block"><label> Print Run Budget </label></div><br>';
echo $this->Form->input('initialPrintRun', array('class'=>'num', 'label'=>array('class'=>'label1')));
echo $this->Form->input('printQuote', array('class'=>'quo', 'label'=>array('class'=>'label1')));
echo $this->Form->input('unitCost', array('class'=>'unit', 'label'=>array('class'=>'label1'), 'readonly'=>'readonly'));

echo $this->Form->input('1stReprint', array('class'=>'num', 'label'=>array('class'=>'label1')));
echo $this->Form->input('printQuote1', array('class'=>'quo', 'label'=>array('class'=>'label1')));
echo $this->Form->input('unitCost1', array('class'=>'unit', 'label'=>array('class'=>'label1'), 'readonly'=>'readonly'));

echo $this->Form->input('2ndReprint', array('class'=>'num', 'label'=>array('class'=>'label1')));
echo $this->Form->input('printQuote2', array('class'=>'quo', 'label'=>array('class'=>'label1')));
echo $this->Form->input('unitCost2', array('class'=>'unit', 'label'=>array('class'=>'label1'), 'readonly'=>'readonly'));

echo $this->Form->input('totalPrintRuns', array('class'=>'input_t', 'label'=>array('class'=>'label1'), 'readonly'=>'readonly'));
echo $this->Form->input('totalPrintQuotations', array('class'=>'input_t', 'label'=>array('class'=>'label1'), 'readonly'=>'readonly'));
echo $this->Form->input('averageUnitCost', array('class'=>'input1', 'label'=>array('class'=>'label1'), 'readonly'=>'readonly'));

echo $this->Form->end('Save');

?>