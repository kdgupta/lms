

<head>

 <!--   <script>
  function preventBack(){window.history.forward();}
  setTimeout("preventBack()", 0);
  window.onunload=function(){null};
</script>-->



    <style type="text/css">
        .error {
            color: red;
        }
        .required:before {
            color: red;
            content: "*"}
        </style>
    </head>

    <div class="form-group"> 
    <div class="col-sm-1 pull-top">
        <button  onclick="location.href = '<?= WEBSITE ?>viewusers?ch=<?php echo '#' ?>'"
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

echo form_open(WEBSITE . "createuser");
?>


<form class="form-horizontal" role="form" method="post" >
    <div class="row">
        <div class="form-group"> 
            <div class="col-sm-2 "></div>
            <label for="emp_id" class="col-lg-3 control-label"><font size="3"><div  class="required"  align="left">Emp Id</div></font></label>
            <div class="col-lg-4">
                <input type="text" name="emp_id" class="form-control"  placeholder="emp_id">
            </div>
        </div>
    </div>  
    <div class="row">
        <div class="form-group"> 
            <div class="col-sm-2 pull-left"></div>
            <label for="firstname" class="col-lg-3 pull-left control-label"><font size="3"><div  class="required"  align="left">First Name</div></font></label>
            <div class="col-lg-4">
                <input type="text" name="firstname" class="form-control"  placeholder="firstname">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="form-group"> 
            <div class="col-sm-2"></div>
            <label for="lastname" class="col-lg-3 control-label"><font size="3"><div  class="required"  align="left">Last Name</div></font></label>
            <div class="col-lg-4">
                <input type="text" name="lastname" class="form-control"  placeholder="lastname">
            </div>
        </div>
    </div>
    <div class="row">  
        <div class="form-group">
            <div class="col-sm-2"></div>
            <label for="email" class="col-lg-3 control-label"><font size="3"><div  class="required"  align="left">Email</div></font></label>
            <div class="col-lg-4">
                <input type="text" name="email" class="form-control"  placeholder="email">
            </div>
        </div>
    </div> 
    <div class="row">  
        <div class="form-group">
            <div class="col-sm-2"></div>
            <label for="password" class="col-lg-3 control-label"><font size="3"><div  class="required"  align="left">Password</div></font></label>
            <div class="col-lg-4">
                <input type="password"  name="password" class="form-control"  placeholder="password">
            </div>
        </div>
    </div>
    <div class="row">  
        <div class="form-group">
            <div class="col-sm-2"></div>
            <label for="designation"  class="col-lg-3 control-label"><font size="3"><div  class="required"  align="left">Designation</div></font></label>
            <div class="col-lg-4">
                <input type="text" name="designation" class="form-control"  placeholder="designation">
            </div>
        </div>
    </div>  

    <div class="row">
        <div class="form-group">
            <div class="col-sm-4"></div>
            <div class="col-lg-4">
                <input type="radio" name="is_active" value='1' ><font size="3">Active</font>
                <div class="col-sm-2"></div>
                <input type="radio" name="is_active" value='0' ><font size="3">Inactive</font>
            </div>
        </div>





        <br>
        <div class="col-lg-5"></div>
        <div class="col-lg-4">
            <input type="submit" name="submit" value="Add User" class="btn btn-lg btn-primary btn-block" >


        </div>
        <label class="checkbox">

        </label>  

</form>



