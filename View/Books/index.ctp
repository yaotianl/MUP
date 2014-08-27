<!-- File: /app/View/Books/index.ctp -->
<h1>MUP Press Books</h1>
<p>1.Create a new business case</p>
<p>2.Modify existing forecast</p>
<p>3.Glance over current state</p>

<section id="ex_middle">

    <aside id="ex_sidebar">
        <h3>Admin Links</h3>
        <ul>
            <li><?php echo $this->Html->link('Create a new business case', array('controller'=>'books', 'action'=>'add')); ?></li>
            <li><?php echo $this->Html->link('Modify an existing forcast', array('controller'=>'books', 'action'=>'modify')); ?></li>
    </aside>

    <article id="ex_main">
        <h1>Admin</h1>
        <p>Nunc auctor bibendum eros. Maecenas porta accumsan mauris. Etiam enim enim, elementum sed, bibendum quis, rhoncus non, metus. Fusce neque dolor, adipiscing sed, consectetuer et, lacinia sit amet, quam. Suspendisse wisi quam, consectetuer in, blandit sed, suscipit eu, eros. Etiam ligula enim, tempor ut, blandit nec, mollis eu, lectus. Nam cursus. Vivamus iaculis. Aenean risus purus, pharetra in, blandit quis, gravida a, turpis. Donec nisl. Aenean eget mi. Fusce mattis est id diam. Phasellus faucibus interdum sapien. Duis quis nunc. Sed enim.</p>

    </article>

    <!-- make the middle region's background color expand -->
    <div class="clear"></div>

</section>