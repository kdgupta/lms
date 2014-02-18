
<head>
    <script>
  function preventBack(){window.history.forward();}
  setTimeout("preventBack()", 0);
  window.onunload=function(){null};
</script>
</head>

<div class="form-group"> 
      <div class="col-sm-1 pull-top">
        <button  onclick="location.href = '<?= WEBSITE ?>admin_users/viewusers'"
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

<?php
// Display any form validation error messages
echo validation_errors();

// Using the form helper to help create the start of the form code
echo form_open(WEBSITE ."admin_users/edituser");
?>


<form class="form-horizontal" role="form"  >
    <div class="row">
        <div class="form-group"> 
            <div class="col-sm-2 "></div>
            <label for="emp_id" class="col-lg-3 control-label"></label>
            <div class="col-lg-4">
                <input type="hidden" name="emp_id" class="form-control"  value="<?= $userdata['emp_id'] ?>">
            </div>
        </div>
    </div>  
    <div class="row">
        <div class="form-group"> 
            <div class="col-sm-2 "></div>
            <label for="firstname" class="col-lg-3 control-label"><font size="3"><div align="left">First Name</div></font></label>
            <div class="col-lg-4">
                <input type="text" name="firstname" class="form-control"  value="<?= $userdata['firstname'] ?>">
            </div>
        </div>
    </div>  
    <div class="row">
        <div class="form-group"> 
            <div class="col-sm-2 "></div>
            <label for="lastname" class="col-lg-3 control-label"><font size="3"><div align="left">Last Name</div></font></label>
            <div class="col-lg-4">
                <input type="text" name="lastname" class="form-control"  value="<?= $userdata['lastname'] ?>">
            </div>
        </div>
    </div>  
    <div class="row">
        <div class="form-group"> 
            <div class="col-sm-2 "></div>
            <label for="email" class="col-lg-3 control-label"><font size="3"><div align="left">Email</div></font></label>
            <div class="col-lg-4">
                <input type="text" name="email" class="form-control"  value="<?= $userdata['email'] ?>">
            </div>
        </div>
    </div> 
    <div class="row">
        <div class="form-group"> 
            <div class="col-sm-2 "></div>
            <label for="desinagtion" class="col-lg-3 control-label"><font size="3"><div align="left">Desinagtion</div></font></label>
            <div class="col-lg-4">
                <input type="text" name="designation" class="form-control"  value="<?= $userdata['designation'] ?>">
            </div>
        </div>
    </div> 

    <div class="row">
        <div class="form-group"> 
            <div class="col-sm-2 "></div>
            <label for="password" class="col-lg-3 control-label"></label>
            <div class="col-lg-4">
                <input type="hidden" name="password" class="form-control"  value="<?= $userdata['password'] ?>">
            </div>
        </div>
    </div> 

    <div class="row">
        <div class="form-group">
            <div class="col-sm-4"></div>
            <div class="col-lg-4">
                <input type="radio" name="is_active" <?= ($userdata['is_active']) ? "checked" : "" ?> value="1"><font size="3">Active
                <input type="radio" name="is_active" <?= (!$userdata['is_active']) ? "checked" : "" ?> value="0"><font size="3">Inactive
            </div>
        </div>






        <br>
        <div class="col-lg-5"></div>
        <div class="col-lg-4">
            <input type="submit" name="submit" value="Edit User" class="btn btn-lg btn-primary btn-block" >


        </div>


</form>



