<h2>add user</h2>
<?php
    echo $this->Form->create();
    echo $this->Form->input('firstname', array('class'=>'input1', 'label'=>array('class'=>'label1')));
    echo $this->Form->input('lastname', array('class'=>'input1', 'label'=>array('class'=>'label1')));
    echo $this->Form->input('email', array('class'=>'input1', 'label'=>array('class'=>'label1')));
    echo $this->Form->input('password', array('class'=>'input1', 'label'=>array('class'=>'label1')));

    echo $this->Form->end('save');
?>