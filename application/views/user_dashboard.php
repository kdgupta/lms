<?php ?>
<!--<head>
    <script>
  function preventBack(){window.history.forward();}
  setTimeout("preventBack()", 0);
  window.onunload=function(){null};
</script>
</head> -->



<div class="form-group"> 
    <div class="col-lg-4 "></div>
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

<h2 class="form-signin-heading">WELCOME TO LMS </h2> 





<div class="row">
    <div class="col-lg-4"></div>
    <div class="col-lg-4">
        <button  onclick="location.href = '<?= WEBSITE ?>view_user_books'" class="btn btn-lg btn-primary btn-block">
            Available Books </button>
    </div>
</div>
<div class="row">
    <div class="col-lg-4"></div>
</div>
<div class="row">
    <div class="col-lg-4"></div>
    <div class="col-lg-4">
        <button  onclick="location.href = '<?= WEBSITE ?>assigned_books?emp_id=<?php echo $this->session->userdata('emp_id'); ?>& ch=<?php echo '#'; ?>'" class="btn btn-lg btn-primary btn-block">

            Assigned Books </button>
    </div>
</div>
<div class="row">
    <div class="col-lg-4"></div>
    <div class="col-lg-4">
        <button  onclick="location.href = '<?= WEBSITE ?>change_pass?emp_id=<?php echo $this->session->userdata('emp_id'); ?>& ch=<?php echo '#'; ?>'" class=" btn-primary">

            Change Password </button>
    </div>
</div>


</form>
