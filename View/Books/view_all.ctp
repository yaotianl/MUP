<h1>All Books</h1>
<table>
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Author one</th>
        <th>Created</th>
        <th>Publishcation Date</th>
    </tr>

    <!-- Here is where we loop through our $posts array, printing out post info -->

    <?php foreach ($books as $book): ?>
        <tr>
            <td><?php echo $book['Book']['id']; ?></td>
            <td>
                <?php echo $this->Html->link($book['Book']['title'],
                    array('controller' => 'book', 'action' => 'edit', $book['Book']['id'])); ?>
            </td>
            <td><?php echo $book['Book']['author1']; ?></td>
            <td><?php echo $book['Book']['created']; ?></td>
            <td><?php echo $book['Book']['publicationsDate']; ?></td>

        </tr>
    <?php endforeach; ?>
    <?php unset($post); ?>
</table>