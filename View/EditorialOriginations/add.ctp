
<h1>Add Editorial Origination</h1>
<?php
echo $this->Form->create('EditorialOrigination');
echo $this->Form->input('copyEditing');
echo $this->Form->input('proofreading');
echo $this->Form->input('indexing');
echo $this->Form->input('readingFee');
echo $this->Form->input('writerFee');
echo $this->Form->input('externalEditorial');
echo $this->Form->input('maps');
echo $this->Form->input('factChecking');
echo $this->Form->input('other');
echo $this->Form->input('totalEditorial');
echo $this->Form->end('Save');
?>