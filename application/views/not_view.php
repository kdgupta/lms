<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="row">
    <div class="form-group"> 
        <div class="col-lg-4 "></div>
        <div class="col-lg-4 ">
            <h1>Access Denied</h1></div>
    </div>
</div>


<!--<div class="form-group"> 
    <div class="col-lg-4 "></div>
    <div class="col-lg-2 "></div>
    <div class="col-sm-1 pull-top" >-->

<div> <div>  <?php if ($this->session->userdata('role_id') == '2') { ?>
            <div class="form-group"> 
                <div class="col-lg-4 "></div>

                <div class="col-lg-4 " >
                    <button style="background-color:skyblue" onclick="location.href = '<?= WEBSITE ?>admin/dashboard'">
                        Go To Dashboard
                    </button></div>
            </div>
        <?php } ?> 

        <?php if ($this->session->userdata('role_id') == '1') { ?>
            <div class="form-group"> 
                <div class="col-lg-4 "></div>

                <div class="col-lg-4" >
                    <button style="background-color:skyblue" onclick="location.href = '<?= WEBSITE ?>user/dashboard'">
                        Go To Home Page
                    </button></div>
            </div>
        <?php }
        ?>

    </div>
</div>