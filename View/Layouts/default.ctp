<!DOCTYPE html>
<html>
<head>
    <meta charset=utf-8 />
    <title>MUP forecast management system</title>
    <?php echo $this->Html->css('style'); ?>

</head>
<body>

<header id="ex_header">
    <div class="header">
        <?php echo $this->Html->image('logo.png'); ?>
        <h1>MUP Forecast System</h1>
    </div>
</header>

<nav id="ex_navbar">
    <ul id="tabmenu">
        <li><?php echo $this->Html->link('Log in', array('controller'=>'users', 'action'=>'login')); ?></li>
    </ul>
</nav>

<section id="ex_middle">

    <article id="ex_main">
        <?php echo $this->fetch('content'); ?>
    </article>

    <!-- make the middle region's background color expand -->
    <div class="clear"></div>

</section>

<footer id="ex_footer">
    <h6>Copyright © 2014 MUP.</h6>
</footer>

</body>
</html>