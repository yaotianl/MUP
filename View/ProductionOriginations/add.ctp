<h1>Add Production Origination</h1>
<?php
echo $this->Html->script('auto_sum');
echo $this->Form->create('ProductionOrigination');
echo $this->Form->input('designText', array('class'=>'input1', 'label'=>array('class'=>'label1')));
echo $this->Form->input('designCover', array('class'=>'input1', 'label'=>array('class'=>'label1')));
echo $this->Form->input('typesetting', array('class'=>'input1', 'label'=>array('class'=>'label1')));
echo $this->Form->input('permissionsText', array('class'=>'input1', 'label'=>array('class'=>'label1')));
echo $this->Form->input('permissionsCover', array('class'=>'input1', 'label'=>array('class'=>'label1')));
echo $this->Form->input('permissionsInternalIllus', array('class'=>'input1', 'label'=>array('class'=>'label1')));
echo $this->Form->input('illustrationText', array('class'=>'input1', 'label'=>array('class'=>'label1')));
echo $this->Form->input('illustrationCover', array('class'=>'input1', 'label'=>array('class'=>'label1')));
echo $this->Form->input('PDFsAndProofs', array('class'=>'input1', 'label'=>array('class'=>'label1')));
echo $this->Form->input('colorCorrections', array('class'=>'input1', 'label'=>array('class'=>'label1')));
echo $this->Form->input('scanning', array('class'=>'input1', 'label'=>array('class'=>'label1')));
echo $this->Form->input('prepressText', array('class'=>'input1', 'label'=>array('class'=>'label1')));
echo $this->Form->input('prepressCover', array('class'=>'input1', 'label'=>array('class'=>'label1')));
echo $this->Form->input('other', array('class'=>'input1', 'label'=>array('class'=>'label1')));
echo $this->Form->input('totalProduction', array('class'=>'total', 'label'=>array('class'=>'label1')));
echo $this->Form->end('Save');
?>