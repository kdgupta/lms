

<?php
// Display any form validation error messages
echo validation_errors();

// Using the form helper to help create the start of the form code
echo form_open("admin_users/edituser");
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
    <label for="firstname" class="col-lg-3 control-label">First Name</label>
    <div class="col-lg-4">
     <input type="text" name="firstname" class="form-control"  value="<?= $userdata['firstname'] ?>">
    </div>
    </div>
     </div>  
     <div class="row">
   <div class="form-group"> 
   <div class="col-sm-2 "></div>
    <label for="lastname" class="col-lg-3 control-label">Last Name</label>
    <div class="col-lg-4">
     <input type="text" name="lastname" class="form-control"  value="<?= $userdata['lastname'] ?>">
    </div>
    </div>
     </div>  
     <div class="row">
   <div class="form-group"> 
   <div class="col-sm-2 "></div>
    <label for="email" class="col-lg-3 control-label">Email</label>
    <div class="col-lg-4">
     <input type="text" name="email" class="form-control"  value="<?= $userdata['email'] ?>">
    </div>
    </div>
     </div> 
    <div class="row">
   <div class="form-group"> 
   <div class="col-sm-2 "></div>
    <label for="desinagtion" class="col-lg-3 control-label">Desinagtion</label>
    <div class="col-lg-4">
     <input type="text" name="designation" class="form-control"  value="<?= $userdata['designation'] ?>">
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
  
    
    
