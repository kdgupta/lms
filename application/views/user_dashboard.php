<?php ?>

<div class="form-group"> 
    <div class="col-lg-4 "></div>
    <div class="col-lg-4 "></div>
    <div class="col-lg-2 "></div>
    <div class="col-sm-1 pull-top" >
        <label style=" position: absolute; top: 0; right: 0; " class="col-lg-4  control-label"><font size="2"> <?php echo $this->session->userdata('firstname') ?></font></label>
    </div>
    <div class="col-sm-1 pull-top" >

        <button  style="background-color:black; position: absolute; top: 0; right: 0; " onclick="location.href = '<?= WEBSITE ?>login/logout_form'" >
            <font color="white">logout</font></button></div>


</div>

<h2 class="form-signin-heading">WELCOME TO LMS </h2> 





<div class="row">
    <div class="col-lg-4"></div>
    <div class="col-lg-4">
        <button  onclick="location.href = '<?= WEBSITE ?>user_books/viewbooks'" class="btn btn-lg btn-primary btn-block">
            Available Books </button>
    </div>
</div>
<div class="row">
    <div class="col-lg-4"></div>
</div>
<div class="row">
    <div class="col-lg-4"></div>
    <div class="col-lg-4">
        <button  onclick="location.href = '<?= WEBSITE ?>user_books/Assigned_books'" class="btn btn-lg btn-primary btn-block">
            Assigned Books </button>
    </div>
</div>



</form>
