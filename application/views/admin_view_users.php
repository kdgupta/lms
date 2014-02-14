<?php ?>



<div class="form-group"> 
    
    <div class="col-sm-1 pull-top">
        <button  onclick="location.href = '<?= WEBSITE ?>admin/dashboard'"
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
    
    





<div class="col-lg-4"> </div>
<div class="col-lg-1"> </div>

<div class="col-lg-2">
    <button  onclick="location.href = '<?= WEBSITE ?>admin_users/createuser'" class="btn btn-lg btn-primary btn-block">
     Add New User </button> </div> <br><br> <br><br>    

<table align="center" border="5" >



    <tr> <th style="text-align: center;"> <font size="3">Emp_id</font></th>
        <th style="text-align: center;"> <font size="3">First name </font></th>
        <th style="text-align: center;"> <font size="3">Last name</font> </th>
        <th style="text-align: center;"> <font size="3">Email</font></th>
        <th style="text-align: center;"><font size="3"> Designation </font></th>
        <th style="text-align: center;"><font size="3"> Active </font></th>
        <th style="text-align: center;"><font size="3"> Roles </font></th>

        <th style="text-align: center;"> <font size="3">Actions</font></th>


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
           
            <td> <div class="col-lg-1"> <button  onclick=  "location.href = '<?= WEBSITE ?>admin_users/edituser?emp_id=<?php echo $row['emp_id']; ?>'"
                                                     class="btn btn-sm btn-primary">
                            <font size="2"> Edit</font> </button></div>
                <div class="col-sm-1"></div>
       <div class="col-lg-1"> <button  onclick=  "location.href = '<?= WEBSITE ?>admin_users/deleteuser?emp_id=<?php echo $row['emp_id']; ?>'"
                               class="btn btn-sm btn-primary">
                            <font size="2"> Delete</font> </button></div>
 



                </td></tr>


    <?php } ?>
</table>

</form>
</body>
