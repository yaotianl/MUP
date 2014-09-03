<h1>Add Production Origination</h1>
<?php
echo $this->Form->create('ProductionOrigination');
echo $this->Form->input('designText');
echo $this->Form->input('designCover');
echo $this->Form->input('typesetting');
echo $this->Form->input('permissionsText');
echo $this->Form->input('permissionsCover');
echo $this->Form->input('permissionsInternalIllus');
echo $this->Form->input('illustrationText');
echo $this->Form->input('illustrationCover');
echo $this->Form->input('PDFsAndProofs');
echo $this->Form->input('colorCorrections');
echo $this->Form->input('scanning');
echo $this->Form->input('prepressText');
echo $this->Form->input('prepressCover');
echo $this->Form->input('other');
echo $this->Form->input('totalProduction');
echo $this->Form->end('Save');
?>