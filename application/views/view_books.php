<?php ?>
<a href="<?= WEBSITE ?>admin_books/addbooks">Add New Book</a>
<table  border="5">
    <tr> <th> Book_id</th>
        <th> Book Title </th>
        <th> Author Name </th>
        <th> Publication </th>
        <th> Edition </th>
        <th> Isbn Number </th>
        <th> Price </th>
        <th> Available </th>
        <th>Assigned To</th>
        <th>Issued Date</th>
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
            <td><?php echo $row['isbn']; ?></td>
            <td><?php echo $row['price']; ?></td>
            <td><?php
                if ($row['available'] == '1') {
                    echo " YES";
                } else {
                    echo " NO";
                }
                ?></td>
            <td><a href="<?= WEBSITE ?>admin_books/assigned_user_records?emp_id=<?php echo $row['emp_id']; ?>">
                <?php echo $row['firstname'];?>
                <?php echo $row['lastname'];?></a>
                </td>
                <td><?php echo $row['issue_date'];?></td>

            <td><a href="<?= WEBSITE ?>admin_books/editbooks?book_id=<?php echo $row['book_id']; ?>">
                    Edit</a> 
           <?php if ($row['available'] == '1') {  ?>
           | <a href="<?= WEBSITE ?>admin_books/deletebooks?book_id=<?php echo $row['book_id']; ?> ">Delete</a>
             | <a href="<?= WEBSITE ?>admin_books/assign_books?book_id=<?php echo $row['book_id']; ?>">Assign </a>
                 <?php } 
                 else { echo " | Delete" ; ?> 
             | <a href="<?= WEBSITE ?>admin_books/return_book?book_id=<?php echo $row['book_id']; ?>">Return</a> 
                 <?php } ?>
          
       </td>


        </tr>
<?php } ?>
</table>
</form>
</html>