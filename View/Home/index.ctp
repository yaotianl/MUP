<div class="info">
    <h1>MUP Book Forecast Management System</h1>
    <p>1.Create a new business case</p>
    <p>2.Modify the existing forecast</p>
    <p>3.Glance over the program detail</p>
</div>
<section id="ex_middle">

    <aside id="ex_sidebar">
        <h3>Admin Links</h3>
        <ul>
            <li><?php echo $this->Html->link('Create a new business case', array('controller'=>'books', 'action'=>'add'), array('class'=>'myButton')); ?></li>
            <li><?php echo $this->Html->link('Modify an existing forcast', array('controller'=>'books', 'action'=>'viewAll'), array('class'=>'myButton')); ?></li>
        </ul>
    </aside>

    <article id="ex_main">
        <h1>Admin</h1>

    </article>

    <!-- make the middle region's background color expand -->
    <div class="clear"></div>

</section>