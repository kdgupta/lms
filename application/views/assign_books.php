<?php
//print_r($userdata);
//echo validation_errors();
// Using the form helper to help create the start of the form code
//echo form_open("admin_books/assign_books");
?>
<form action ="assign_books" method ="post">
     <table>
    <tr> <td> <label for="book_id"></label>
         <input type="hidden" name="book_id" value="<?= $bookdata['book_id'] ?>">  
         <tr> <td> <label for="book_id">Book Name</label>
         <input type="text" name="book_title" size="5" value="<?= $bookdata['book_title'] ?>">  
        <td><td><td><lable for ="emp_id">Users </lable> 
    <td> <select name="emp_id"><?php foreach($userdata as $row){
         
?>
         <?php if($row['is_active']==1){
             ?>
  <option value="<?php echo  $row['emp_id']; ?>" ><?php echo  $row['firstname']; ?><?php echo  $row['lastname']; ?></option>
         <?php } else { ;} 
     }?>
    </td> </tr>
  
</select>
    <tr> <td> <input type="submit" name="submit" value=" Assign Book">
</table>
</form>
</html>