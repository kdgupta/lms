

<head>
  <!--  <script>
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
        <button  onclick="location.href = '<?= WEBSITE ?>admin_books/viewbooks?ch=<?php echo'#'?>'"
                 class="btn btn-sm btn-primary">
            Back</button></div>
    <div class="col-lg-3 "></div>
    <div class="col-lg-4 "></div>
    <div class="col-lg-0 "></div>
    <div class="col-lg-1 "></div>
    <div class="col-lg-1 "></div>
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
echo form_open(WEBSITE . "admin_books/addbooks");

?>

<form class="form-horizontal" role="form" method="post" >


    <div class="row">
        <div class="form-group"> 
            
            <div class="col-sm-2 "></div>
             <div class="col-lg-3">
            <label for="book_id" class="col-lg-3  control-label"><font size="3"></font></label>
            <div class="col-lg-4">
                <input type="hidden" name="book_id" class="form-control"  placeholder="book_id">
            </div>
        </div>
    </div>
        </div>
    <div class="row">
        <div class="form-group"> 
            <div class="col-sm-2 "></div>
            <label for="book_title"  class="col-lg-3  control-label"><font size="3"><div class="required" align="left">
                    Book Title</div></font></label>
            <div class="col-lg-4">
                <input type="text" name="book_title" class="form-control"  placeholder="book_title">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="form-group"> 
            <div class="col-sm-2"></div>
            <label for="author_name"  class="col-lg-3 control-label"><font size="3"><div class="required"  align="left">Author Name</div></font></label>
            <div class="col-lg-4">
                <input type="text" name="author" class="form-control"  placeholder="author_name">
            </div>
        </div>
    </div>
    <div class="row">  
        <div class="form-group">
            <div class="col-sm-2"></div>
            <label for="publication"  class="col-lg-3 control-label"><font size="3"><div class="required" align="left">Publication</div></font></label>
            <div class="col-lg-4">
                <input type="text" name="publications" class="form-control"  placeholder="publication">
            </div>
        </div>      
    </div>  

    <div class="row">  
        <div class="form-group">
            <div class="col-sm-2"></div>
            <label for="edition" class="col-lg-3 control-label"><font size="3"><div class="required"  align="left">Edition</div></font></label>
            <div class="col-lg-4">
                <input type="text"  name="edition" class="form-control"  placeholder="edition">
            </div>
        </div>
    </div>

    <div class="row">  
        <div class="form-group">
            <div class="col-sm-2"></div>
            <label for="isbn" class="col-lg-3 control-label"><font size="3"><div class="required"  align="left">Isbn</div></font></label>
            <div class="col-lg-4">
                <input type="text"  name="isbn" class="form-control"  placeholder="isbn">
            </div>
        </div>
    </div>
    <div class="row">  
        <div class="form-group">
            <div class="col-sm-2"></div>
            <label for="price"  class="col-lg-3 control-label"><font size="3"><div class="required"  align="left">Price</div></font></label>
                        <div class="col-lg-4">
                            <input type="text" name="price" class="form-control"  placeholder="price">
                        </div>
                    </div>
               
        </div>
              




                <br>
                <div class="col-lg-5"></div>
                <div class="col-lg-4">
                    <input type="submit" name="submit" value="Add Book" class="btn btn-lg btn-primary btn-block" >






                </div>

                </form>






