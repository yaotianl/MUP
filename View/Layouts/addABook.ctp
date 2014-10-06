<!DOCTYPE html>
<html>
<head>
    <meta charset=utf-8 />
    <title>Admin</title>
    <?php
    echo $this->Html->css('style');
    echo $this->Html->script('jquery');
    //
    ?>

</head>
<body>

<header id="ex_header">
    <?php
    echo $this->Html->image('logo.png');
    ?>
    <br>
    <div>
        <ul id="tabmenu">
            <li><?php echo $this->Html->link('Home', array('controller'=>'home', 'action'=>'index')); ?></li>
            <li><?php echo $this->Html->link('Royalty & Advance Rate', array('controller'=>'royalties', 'action'=>'add')); ?></li>
            <li><?php echo $this->Html->link('Origination Budget', array('controller'=>'editorialOriginations', 'action'=>'add')); ?>
                <ul>
                    <li>
                        <?php echo $this->Html->link('Editorial', array('controller'=>'editorialOriginations', 'action'=>'add'), array('class' =>'nav_ori')); ?>
                    </li>
                    <li>
                        <?php echo $this->Html->link('Production', array('controller'=>'productionOriginations', 'action'=>'add'), array('class' =>'nav_ori')); ?>
                    </li>
                </ul>
            </li>
            <li><?php echo $this->Html->link('Print, Price and Publication', array('controller'=>'printSpecifications', 'action'=>'add')); ?></li>
            <li><?php echo $this->Html->link('Sales Forecast', array('controller'=>'salesForecasts', 'action'=>'add')); ?></li>
            <li><?php echo $this->Html->link('Summary', array('controller'=>'summaries', 'action'=>'index')); ?></li>
            <li><?php echo $this->Html->link('Log out', array('controller'=>'users', 'action'=>'logout')); ?></li>
        </ul>
    </div>
</header>


<div id="content">
    <?php
    echo $this->Session->flash();
    echo $this->fetch('content');
    ?>
</div>




</body>
</html>