<!-- File: /app/View/Posts/add.ctp -->

<h1>Add Book</h1>
<?php
echo $this->Form->create('Book');
echo $this->Form->input('title');
echo $this->Form->input('author1');
echo $this->Form->input('publisher');
echo $this->Form->end('Save Book');
?>