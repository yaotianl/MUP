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

<nav>
    <ul id="tabmenu">
        <li><?php echo $this->Html->link('Home', array('controller'=>'home', 'action'=>'index')); ?></li>
        <li><?php echo $this->Html->link('Program', array('controller'=>'programs', 'action'=>'index')); ?></li>
        <li><?php echo $this->Html->link('Log out', array('controller'=>'users', 'action'=>'logout')); ?></li>
    </ul>

</nav>

<?php echo $this->Session->flash();
    echo $this->fetch('content'); ?>
<footer id="ex_footer">
    <h6>Copyright © 2014 MUP.</h6>
</footer>

</body>
</html>