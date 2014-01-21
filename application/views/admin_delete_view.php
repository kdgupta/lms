<?php 

// Display any form validation error messages
echo validation_errors();
 
// Using the form helper to help create the start of the form code
echo form_open("admin_users/");
?>
<table align="center">
 <tr> <td> <label for="emp_id"><font size="3">Employee Id</font></label>
  <td> <input type="text" name="emp_id" size="15"><br>
   
  <tr> <td>  <label for="firstname"><font size="3">First Name</font></label>
 <td>   <input type="text" name="firstname" size="15"><br>
 
   <tr> <td> <label for="last"><font size="3">Last Name</font></label>
   <td> <input type="text" name="lastname" size="15"><br>
 
   <tr> <td> <label for="email"><font size="3">Email Address</font></label>
   <td> <input type="text" name="email" size="15"><br>
   
   <tr> <td> <label for="password"><font size="3">Password</font></label>
    <td> <input type="password" name="password" size="15"><br>
   
   <tr> <td> <label for="designation"><font size="3">Designation</font></label>
   <td>  <input type="text" name="designation" size="15"><br></tr>
   
  <tr> <td> <input type="radio" name="is_active" value='1'><font size="3">Active</font><br>
 <td align="right"> <input type="radio" name="is_active" value='0'>Inactive<br>
 
   <tr> <td> <font size="3"><input type="submit" name="submit" value="Submit">
          </font> </table>
 </form>
</html>
            
