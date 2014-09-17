<!DOCTYPE html>
<html>
<head>
    <meta charset=utf-8 />
    <title>Admin</title>
    <?php
    echo $this->Html->css('style');
    echo $this->Html->script('jquery');
    ?>
</head>
<body>

<header id="ex_header">
    <?php echo $this->Html->image('logo.png'); ?>
    <br>
    <div>
        <ul id="tabmenu">
            <li><?php echo $this->Html->link('Home', array('controller'=>'home', 'action'=>'index')); ?></li>
            <li><?php echo $this->Html->link('Royalty & Advance Rate', array('controller'=>'royalties', 'action'=>'edit')); ?></li>
            <li><?php echo $this->Html->link('Origination Budget', array('controller'=>'publishingOriginations', 'action'=>'edit')); ?>
                <ul>
                    <li>
                        <?php echo $this->Html->link('Publishing', array('controller'=>'publishingOriginations', 'action'=>'edit')); ?>
                    </li>
                    <li>
                        <?php echo $this->Html->link('Editorial', array('controller'=>'editorialOriginations', 'action'=>'edit')); ?>
                    </li>
                    <li>
                        <?php echo $this->Html->link('Production', array('controller'=>'productionOriginations', 'action'=>'edit')); ?>
                    </li>
                </ul>
            </li>
            <li><?php echo $this->Html->link('Print, Price and Publication', array('controller'=>'printSpecifications', 'action'=>'edit')); ?></li>
            <li><?php echo $this->Html->link('Sales Forecast', array('controller'=>'salesForecasts', 'action'=>'edit')); ?></li>
            <li><?php echo $this->Html->link('Title Business Case Budget', array('controller'=>'', 'action'=>'')); ?></li>
            <li><?php echo $this->Html->link('Log out', array('controller'=>'users', 'action'=>'logout')); ?></li>
        </ul>
    </div>
</header>

<?php echo $this->fetch('content'); ?>
<footer id="ex_footer">
    <h6>Copyright © 2014 MUP.</h6>
</footer>

</body>
</html>