<?php ?>

<table  border="5">
    <tr><th>Emp id</th>
        <th>User Name</th>
        <th> Book_id</th>
        <th> Book Title </th>
        <th> Author Name </th>
        <th> Publication </th>
        <th> Edition </th>
        <th> Isbn Number </th>
        <th> Price </th>
        <th>Issued Date</th>
        <th>Returned Date</th> 
       


    </tr>
    <?php foreach ($record as $row) {
         ?>
    <tr><td>   <?php echo $row['emp_id']; ?> </td>
        <td>   <?php echo $row['firstname']; ?><?php echo $row['lastname']; ?></td>
            <td>   <?php echo $row['book_id']; ?> </td>
            <td><?php echo $row['book_title']; ?></td>
            <td><?php echo $row['author']; ?></td>
            <td><?php echo $row['publications']; ?></td> 
            <td><?php echo $row['edition']; ?></td>
            <td><?php echo $row['isbn']; ?></td>
            <td><?php echo $row['price']; ?></td>
                <td><?php echo $row['issue_date'];?></td> 
                <td><?php echo $row['return_date'];?></td> 
            
<?php } ?>
</tr>
 
</table>
 <a href="<?= WEBSITE ?>admin_books/viewbooks">Back</a>
</form>
</html>