<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
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

<table align="center" border="1">
    <tr> <th style="text-align: center;"><font size="2"> Emp_id</font></th>
        <th style="text-align: center;"><font size="2">  Name </font></th>
     </tr>
     <?php foreach ($userdata as $row) { ?>
     <tr>
            <td>   <?php echo $row['emp_id']; ?> </td>
            <td><?php echo $row['firstname']; echo " ";echo $row['lastname'];  ?></td>
        </tr>   
      
     <?php } ?>
  </table>


