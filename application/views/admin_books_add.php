<?php
// Display any form validation error messages
echo validation_errors();

// Using the form helper to help create the start of the form code
echo form_open("admin_books/addbooks");
?>






      
    <form class="form-horizontal" role="form" method="post" >
   <div class="row">
   <div class="form-group"> 
   <div class="col-sm-2 "></div>
    <label for="book_id" class="col-lg-3  control-label"><font size="3">Book Id</font></label>
    <div class="col-lg-4">
     <input type="text" name="book_id" class="form-control"  placeholder="book_id">
    </div>
    </div>
     </div>  
        <div class="row">
   <div class="form-group"> 
   <div class="col-sm-2 "></div>
    <label for="book_title" class="col-lg-3  control-label"><font size="3">Book Title</label>
    <div class="col-lg-4">
     <input type="text" name="book_title" class="form-control"  placeholder="book_title">
    </div>
    </div>
     </div>
        <div class="row">
   <div class="form-group"> 
   <div class="col-sm-2 pull-left"></div>
    <label for="author_name" class="col-lg-3 pull-left control-label"><font size="3">Author Name</label>
    <div class="col-lg-4">
     <input type="text" name="author" class="form-control"  placeholder="author_name">
    </div>
    </div>
     </div>
  <div class="row">  
  <div class="form-group">
      <div class="col-sm-2"></div>
    <label for="publication" class="col-lg-3 control-label"><font size="3">Publication</label>
    <div class="col-lg-4">
      <input type="text" name="publications" class="form-control"  placeholder="publication">
    </div>
  </div>
    </div> 
        <div class="row">  
  <div class="form-group">
      <div class="col-sm-2"></div>
    <label for="edition" class="col-lg-3 control-label"><font size="3">Edition</label>
    <div class="col-lg-4">
      <input type="text"  name="edition" class="form-control"  placeholder="edition">
    </div>
  </div>
    </div>
        <div class="row">  
  <div class="form-group">
      <div class="col-sm-2"></div>
    <label for="price"  class="col-lg-3 control-label">Price</label>
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
      <label class="checkbox">

                </label>  

    </form>

   
        
   