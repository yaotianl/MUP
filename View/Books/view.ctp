<!-- File: /app/View/Books/view.ctp -->

<h1><?php echo h($book['Book']['title']); ?></h1>

<p><small>Created: <?php echo $book['Book']['publicationsDate']; ?></small></p>

<p><?php echo h($book['Book']['author1']); ?></p>

<p><?php echo h($book['Book']['imprint']); ?></p>

<p><?php echo $book['Book']['contractNumber']; ?></p>