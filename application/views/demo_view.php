<?php
// Display any form validation error messages
echo validation_errors();
 
// Using the form helper to help create the start of the form code
echo form_open("demo");
?>
<table>
 <tr> <td> <label for="emp_id">Employee Id</label>
  <td> <input type="text" name="emp_id" size="8"><br>
   
  <tr> <td>  <label for="firstname">First Name</label>
 <td>   <input type="text" name="firstname" size="8"><br>
 
   <tr> <td> <label for="last">Last Name</label>
   <td> <input type="text" name="lastname" size="8"><br>
 
   <tr> <td> <label for="email">Email Address</label>
   <td> <input type="text" name="email" size="12"><br>
   
   <tr> <td> <label for="password">Password</label>
    <td> <input type="password" name="password" size="8"><br>
   
   <tr> <td> <label for="designation">Designation</label>
   <td>  <input type="text" name="designation" size="8"><br></tr>
   
  <tr> <td> <input type="radio" name="is_active" value='1'>Active<br>
 <td align="right"> <input type="radio" name="is_active" value='0'>Inactive<br>
 
   <tr> <td> <input type="submit" name="submit" value="Submit">
           </table>
 </form>
</html>