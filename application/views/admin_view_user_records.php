<?php ?>

<div class="form-group"> 
    <div class="col-sm-1 pull-top">
        <button  onclick="location.href = '<?= WEBSITE ?>admin_books/viewbooks'"
                 class="btn btn-sm btn-primary">
            Back</button></div>
    <div class="col-lg-3 "></div>
    <div class="col-lg-4 "></div>
    <div class="col-lg-2 "></div>
    <div class="col-sm-1 pull-top" >
        <label style=" position: absolute; top: 0; right: 0;" > <font size="2"> <?php echo $this->session->userdata('firstname') ?></font></label>
    </div>

    <div class="col-sm-1 pull-top" >

        <button   onclick="location.href = '<?= WEBSITE ?>login/logout_form'"
                  class="btn btn-sm btn-primary">
            logout</button></div>

   

</div>

<br><br><table  border="5" align="center">
    <tr><th>Emp id</th>
        <th>User Name</th>
        <th> Book_id</th>
        <th> Book Title </th>
        <th> Author Name </th>
        <th> Publication </th>
        <th> Edition </th>
        <th> Isbn Number </th>
        <th> Price </th>
        <th> Date</th>
        <th>Activity</th> 




    </tr>
    <?php foreach ($record as $row) {
        ?>
        <tr><td>   <?php echo $row['emp_id']; ?> </td>
            <td>   <?php echo $row['firstname']; ?><?php echo" "; ?><?php echo $row['lastname']; ?></td>
            <td>   <?php echo $row['book_id']; ?> </td>
            <td><?php echo $row['book_title']; ?></td>
            <td><?php echo $row['author']; ?></td>
            <td><?php echo $row['publications']; ?></td> 
            <td><?php echo $row['edition']; ?></td>
            <td><?php echo $row['isbn']; ?></td>
            <td><?php echo $row['price']; ?></td>


            <td><?php echo $row['date']; ?></td> 
            <?php if ($row['activity'] == 1) { ?>
                <td> <?php echo "Assigned"; ?>
                <?php } ?></td> 
            <?php if ($row['activity'] == 2) { ?>
                <td><?php echo "Returned"; ?>
                <?php } ?></td> 

        <?php } ?>
    </tr>

</table>

</form>
</html>