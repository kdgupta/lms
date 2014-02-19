<?php ?>

<head>
    <script language="javascript" type="text/javascript">
  function preventBack(){window.history.forward();}
  setTimeout("preventBack()", 0);
  window.onunload=function(){null};
</script>
</head>

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

<h2 class="form-signin-heading">ADMIN DASHBOARD </h2> 





<div class="row">
    <div class="col-lg-4"></div>
    <div class="col-lg-4">
        <button  onclick="location.href = '<?= WEBSITE ?>admin_users/viewusers'" class="btn btn-lg btn-primary btn-block">
            Manage Users </button>
    </div>
</div>
<div class="row">
    <div class="col-lg-4"></div>
</div>
<div class="row">
    <div class="col-lg-4"></div>
    <div class="col-lg-4">
        <button  onclick="location.href = '<?= WEBSITE ?>admin_books/viewbooks?ch=<?php echo '#'; ?>'" class="btn btn-lg btn-primary btn-block">
            Manage Books </button>
    </div>
</div>


</form>
