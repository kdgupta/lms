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

<?php
echo validation_errors();



echo form_open(WEBSITE . "admin_books/editbooks");
?>
<form class="form-horizontal" role="form"  >
    <div class="row">
        <div class="form-group"> 
            <div class="col-sm-2 "></div>
            <label for="book_id" class="col-lg-3 control-label"></label>
            <div class="col-lg-4">
                <input type="hidden" name="book_id" class="form-control"  value="<?= $userdata['book_id'] ?>">
            </div>
        </div>
    </div>  
    <div class="row">
        <div class="form-group"> 
            <div class="col-sm-2 "></div>
            <label for="book_title" class="col-lg-3 control-label">Book Title</label>
            <div class="col-lg-4">
                <input type="text" name="book_title" class="form-control"  value="<?= $userdata['book_title'] ?>">
            </div>
        </div>
    </div>  
    <div class="row">
        <div class="form-group"> 
            <div class="col-sm-2 "></div>
            <label for="author" class="col-lg-3 control-label">Author</label>
            <div class="col-lg-4">
                <input type="text" name="author" class="form-control"  value="<?= $userdata['author'] ?>">
            </div>
        </div>
    </div>  
    <div class="row">
        <div class="form-group"> 
            <div class="col-sm-2 "></div>
            <label for="publications" class="col-lg-3 control-label">Publication</label>
            <div class="col-lg-4">
                <input type="text" name="publications" class="form-control"  value="<?= $userdata['publications'] ?>">
            </div>
        </div>
    </div> 
    <div class="row">
        <div class="form-group"> 
            <div class="col-sm-2 "></div>
            <label for="edition" class="col-lg-3 control-label">Edition</label>
            <div class="col-lg-4">
                <input type="text" name="edition" class="form-control"  value="<?= $userdata['edition'] ?>">
            </div>
        </div>
    </div> 
    <div class="row">
        <div class="form-group"> 
            <div class="col-sm-2 "></div>
            <label for="price" class="col-lg-3 control-label">Price</label>
            <div class="col-lg-4">
                <input type="text" name="price" class="form-control"  value="<?= $userdata['price'] ?>">
            </div>
        </div>
    </div> 
    <div class="row">
        <div class="form-group"> 
            <div class="col-sm-2 "></div>
            <label for="isbn" class="col-lg-3 control-label"></label>
            <div class="col-lg-4">
                <input type="hidden" name="isbn" class="form-control"  value="<?= $userdata['isbn'] ?>">
            </div>
        </div>
    </div> 
    <br>
    <div class="col-lg-5"></div>
    <div class="col-lg-4">

        <input type="text" name="price" class="form-control"  value="<?= $userdata['price'] ?>">
    </div>
    <div class="col-lg-10">
<?php if ($userdata['available'] == '1') { ?>
            <input type="radio" name="available" <?= ($userdata['available']) ? "checked" : "" ?> value="1"><font size="3">Available </font>
        <?php } else { ?>
            <div class="col-sm-2"></div>
            <input type="radio" name="available" <?= ($userdata['available']) ? "checked" : "" ?> value="2"><font size="3">Unavailable </font>
<?php } ?>

    </div>
</div>
</div>
</div> 
<br>
<div class="col-lg-5"></div>
<div class="col-lg-4">
    <input type="submit" name="submit" value="Edit Book" class="btn btn-lg btn-primary btn-block" >

</div>


</form>




