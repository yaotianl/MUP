<h1>Print Specification</h1>
<br>
<?php
echo $this->Html->script('auto_unit');
echo $this->Html->script('auto_rrp');


echo $this->Form->create('PrintSpecification');
echo $this->Form->input('RRP', array('class'=>'input1', 'value'=>24.99, 'label'=>array('class'=>'label', 'text'=>'RRP including GST*')));
echo '<br><div id="block"><label> Print Specification </label></div><br>';

echo $this->Form->input('printerLocation', array('options'=>array(
    'Offshore'=>'Offshore', 'Local'=>'Local'),
    'default'=>'Local',
    'class'=>'input1', 'label'=>array('class'=>'label1')));
echo $this->Form->input('text', array('class'=>'input1', 'label'=>array('class'=>'label1')));
echo $this->Form->input('GSM', array('class'=>'input1', 'label'=>array('class'=>'label1')));
echo $this->Form->input('black&WhiteIllus', array('class'=>'input1', 'label'=>array('class'=>'label1')));
echo $this->Form->input('colorIllus', array('class'=>'input1', 'label'=>array('class'=>'label1')));
echo $this->Form->input('cover', array('class'=>'input1', 'label'=>array('class'=>'label1')));
echo $this->Form->input('extent', array('class'=>'input1', 'value'=>200, 'label'=>array('class'=>'label1')));
echo $this->Form->input('format', array(
    'options'=>array('Paper Back (PB)'=>'Paper Back (PB)','Hard Back (HB)'=>'Hard Back (HB)','Trade Paper Back'=>'Trade Paper Back', 'Electronic'=>'Electronic', 'POD'=>'POD'),
    'default'=>'Paper Back (PB)',
    'class'=>'input1', 'label'=>array('class'=>'label1')));
echo '<div class="printRun">';
echo '<br><div id="block"><label> Print Run Budget </label></div><br>';
echo $this->Form->input('initialPrintRun', array('class'=>'num', 'label'=>array('class'=>'label1', 'text'=>'Initial Print Run*')));
echo $this->Form->input('printQuote', array('class'=>'quo', 'label'=>array('class'=>'label1', 'text'=>'Print Quote*')));
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
echo '</div>';
echo $this->Form->end('Save');

?>