<?php ?>
<a href="<?=WEBSITE?>admin_books/addbooks">Add New Book</a>
<table  border="5">
    <tr> <th> Book_id</th>
        <th> Book Title </th>
        <th> Author Name </th>
        <th> Publication </th>
        <th> Edition </th>
        <th> Isbn Number </th>
        <th> Price </th>

        <th> Actions</th>


    </tr>
    <?php foreach ($userdata as $row) {
        ?>
        <tr>
            <td>   <?php echo $row['book_id']; ?> </td>
            <td><?php echo $row['book_title']; ?></td>
            <td><?php echo $row['author']; ?></td>
            <td><?php echo $row['publications']; ?></td> 
            <td><?php echo $row['edition']; ?></td>
            <td><?php echo $row['isbn'];?></td>
            <td><?php echo $row['price']; ?></td>
            

            <td><a href="<?=WEBSITE?>admin_books/editbooks?book_id=<?php echo $row['book_id']; ?>">
                    Edit</a>|<a href="<?=WEBSITE?>admin_books/deletebooks?book_id=<?php echo $row['book_id']; ?> ">Delete</a></td>

        </tr>
    <?php } ?>
</table>
</form>
</html>