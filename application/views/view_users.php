<?php ?>
<a href="<?= WEBSITE ?>admin_users/admin_users_add">Add New Book</a>
<table  border="5">
    <tr> <th> Emp_id</th>
        <th> First name </th>
        <th> Last name </th>
        <th> Email </th>
        <th> Designation </th>
        <th> Active </th>
        <th> Roles </th>

        <th> Actions</th>


    </tr>
    <?php foreach ($userdata as $row) {
        ?>
        <tr>
            <td>   <?php echo $row['emp_id']; ?> </td>
            <td><?php echo $row['firstname']; ?></td>
            <td><?php echo $row['lastname']; ?></td>
            <td><?php echo $row['email']; ?></td> 
            <td><?php echo $row['designation']; ?></td>
            <td><?php echo $row['is_active']; ?></td>
            <td><?php echo $row['role_name']; ?></td>

            <td><a href="<?= WEBSITE ?>admin_users/edituser?emp_id=<?php echo $row['emp_id']; ?>">
                    Edit</a>|<a href="<?= WEBSITE ?>admin_users/deleteuser?emp_id=<?php echo $row['emp_id']; ?> ">Delete</a></td>

        </tr>
    <?php } ?>
</table>
</form>
</html>