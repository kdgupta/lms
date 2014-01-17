<?php
// Display any form validation error messages
echo validation_errors();

// Using the form helper to help create the start of the form code
echo form_open("admin_users/edituser");
?>
<table>
    <tr> <td> <label for="emp_id"></label>
        <td> <input type="hidden" name="emp_id" size="11" value="<?= $userdata['emp_id'] ?>"><br>

    <tr> <td>  <label for="firstname" >First Name</label>
        <td>   <input type="text" name="firstname" size="8" value="<?= $userdata['firstname'] ?>"><br>

    <tr> <td> <label for="last">Last Name</label>
        <td> <input type="text" name="lastname" size="8" value="<?= $userdata['lastname'] ?>"><br>


    <tr> <td> <label for="email">Email Address</label>
        <td> <input type="text" name="email" size="23" value="<?= $userdata['email'] ?>"><br>


    <tr> <td> <label for="designation">Designation</label>
        <td>  <input type="text" name="designation" size="8" value="<?= $userdata['designation'] ?>"><br></tr>

    <tr> <td> <label for="password"></label>
        <td> <input type="hidden" name="password" size="11" value="<?= $userdata['password'] ?>"><br>

    <tr> <td> <input type="radio" name="is_active" <?= ($userdata['is_active']) ? "checked" : "" ?> value="1">Active<br>
        <td align="right"> <input type="radio" name="is_active" <?= (!$userdata['is_active']) ? "checked" : "" ?> value="0">Inactive<br>

    <tr> <td> <input type="submit" name="submit" value="Submit">
</table>
</form>
</html>