<!DOCTYPE html>
<html>
<head>
    <meta charset=utf-8 />
    <title>Admin</title>
    <?php echo $this->Html->css('style') ?>

</head>
<body>

<header id="ex_header">
    <?php echo $this->Html->image('logo.png'); ?>
</header>

<nav id="ex_navbar">
    <ul>
        <li><?php echo $this->Html->link('Home', array('controller'=>'books', 'action'=>'index')); ?></li>
        <li><?php echo $this->Html->link('Royalty & Advance Rate', array('controller'=>'royalties', 'action'=>'add')); ?></li>
        <li><?php echo $this->Html->link('Origination Budget', array('controller'=>'originations', 'action'=>'add')); ?></li>
        <li><?php echo $this->Html->link('Print, Price and Publication', array('controller'=>'', 'action'=>'')); ?></li>
        <li><?php echo $this->Html->link('Sales Forecast', array('controller'=>'', 'action'=>'')); ?></li>

        <li><?php echo $this->Html->link('Title Business Case Budget', array('controller'=>'', 'action'=>'')); ?></li>
        <li><?php echo $this->Html->link('Log out', array('controller'=>'users', 'action'=>'logout')); ?></li>
    </ul>

</nav>


<?php echo $this->fetch('content'); ?>
<footer id="ex_footer">
    <h6>Copyright © 2014 MUP.</h6>
</footer>

</body>
</html>