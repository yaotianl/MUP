<h1>Add Publishing Origination</h1>
<?php
echo $this->Form->create('PublishingOrigination');
echo $this->Form->input('development');
echo $this->Form->input('managementFee');
echo $this->Form->input('legalFee');
echo $this->Form->input('other');
echo $this->Form->input('titleSpecificSubsidy');
echo $this->Form->input('source');
echo $this->Form->input('totalPublishing');

echo $this->Form->end('Save');
?>