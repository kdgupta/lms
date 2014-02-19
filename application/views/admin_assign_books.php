<?php
//print_r($userdata);
//echo validation_errors();
// Using the form helper to help create the start of the form code
//echo form_open("admin_books/assign_books");
?>
<div class="form-group"> 
    <div class="col-sm-1 pull-top">
        <button  onclick="location.href = '<?= WEBSITE ?>admin_books/viewbooks?ch=<?php echo ''?>'"
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


<form action ="assign_books" method ="post" >

    <table align="center"><br>

        <tr> <td> <label for="book_id"></label>
                <input type="hidden" name="book_id" value="<?= $bookdata['book_id'] ?>">  
        <tr> <td> <label for="book_id" >Book Name</label>
                <input type="text"  name="book_title" size="25" value="<?= $bookdata['book_title'] ?> " readonly>  
            <td><td><td><lable for ="emp_id"><b>Users</b> </lable> 
        <td> <select name="emp_id"><?php foreach ($userdata as $row) {
    ?>
                    <?php if ($row['is_active'] == 1) {
                        ?>
                        <option value="<?php echo $row['emp_id']; ?>" ><?php echo $row['firstname']; ?><?php echo" " ?><?php echo $row['lastname']; ?></option>
                        <?php
                    } else {
                        ;
                    }
                }
                ?>
        </td> </tr>


        </select>
    </table>
    <br><br>
    <div class="form-group"> 

        <div class="col-lg-3 "></div>
        <div class="col-lg-3">
            <input type="submit" name="submit" value="Assign Book" class="btn btn-lg btn-primary btn-block" >
        </div>
    </div>


</form>
</html>