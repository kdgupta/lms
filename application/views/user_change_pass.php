
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
       <button  onclick="location.href = '<?= WEBSITE ?>user'"
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
            logout</button></div></div>






<?php
echo validation_errors();

// Using the form helper to help create the start of the form code

echo form_open(WEBSITE . "change_pass");
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="row">  
      <div class="col-lg-4"></div>
       <div class="col-lg-4">
    <font color =" GRAY" size="3">Please enter New Password</font>
    </div>
      <div class="col-lg-4"></div>
      </div>
       
        <div class="form-group">
            <div class="col-lg-4"></div>
            <div class="col-lg-5">
            <label for="password" class="col-lg-3 control-label"><font size="3">
                <div  class="required"  align="left">Password</div></font></label>
               
            <div class="col-lg-5">
                <input type="password"  name="password" class="form-control"  placeholder="password">
            </div>
        </div>
            </div>
  
    <br>
    <br>
  
        <div class="col-lg-4"></div>
        <div class="col-lg-4">
            <input type="submit" name="submit" value="Submit" class="btn btn-primary" >


        </div>
        

</form>
