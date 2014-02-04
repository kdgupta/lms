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

    <div class="col-lg-4"> </div>
   
    <div class="col-lg-3">
<button  onclick="location.href='<?=WEBSITE?>admin_books/addbooks'" class="btn btn-lg btn-primary btn-block">
     Add New Book</button> </div> <br>    


<table  border="5" align="center" >
    <tr> <th style="text-align: center;"><font size="1"> Book_id</font></th>
        <th style="text-align: center;"><font size="1"> Book Title </font></th>
        <th style="text-align: center;"><font size="1"> Author Name </font></th>
        <th style="text-align: center;"><font size="1"> Publication </font></th>
        <th style="text-align: center;"><font size="1"> Edition </font></th>
        <th style="text-align: center;"><font size="1"> Isbn </font></th>
        <th style="text-align: center;"> <font size="1">Price </font></th>
        <th style="text-align: center;"> <font size="1">Available </font></th>
        <th style="text-align: center;"> <font size="1">Assigned To </font></th>
        <th style="text-align: center;"> <font size="1"> Date </font></th>
        <th style="text-align: center;"> <font size="1"> Activity </font></th>
        <th style="text-align: center;"> <font size="1">Actions</font></th>


    </tr>
    <?php foreach ($userdata as $row) {
        ?>
        <tr>
            <td>   <?php echo $row['book_id']; ?> </td>
            <td><?php echo $row['book_title']; ?></td>
            <td><?php echo $row['author']; ?></td>
            <td><?php echo $row['publications']; ?></td> 
            <td><?php echo $row['edition']; ?></td>
            <td><?php echo $row['isbn']; ?></td>
            <td><?php echo $row['price']; ?></td>
            <td><?php
        

             if($row['available']=='1'){
                echo "YES";
            } else {
                echo "NO";
            } ?></td>
            <td> <?php if($row['available']=='2'){ ?>
           <a href='<?=WEBSITE?>admin_books/assigned_user_records?emp_id=<?php echo $row['emp_id']; ?>'" >
    <?php echo $row['firstname'] ; ?>
    <? echo $row['lastname'] ; ?></a>
            <?php }?></td>
             <td> <?php if($row['available']=='2'){ ?>
                <?php echo $row['date']; ?> 
                  <?php }?></td>
             
             <td> <?php if($row['activity']=='1'){ ?>
             <?php echo "Assigned"; ?> 
                   <?php }
                   if($row['activity']=='2'){ ?>
                   <?php echo "";?>
             <?php } ?></td>
             
           <td><button  style="background-color:skyblue"  onclick="location.href='<?=WEBSITE?>admin_books/editbooks?book_id=<?php echo $row['book_id']; ?>'" >
    Edit</button>
               <?php if ($row['available'] == '1') {  ?>
               
               <button style="background-color:skyblue" onclick="location.href='<?=WEBSITE?>admin_books/deletebooks?book_id=<?php echo $row['book_id']; ?>'">
    Delete</button>
                 <button  style="background-color:skyblue"  onclick="location.href='<?= WEBSITE ?>admin_books/assign_books?book_id=<?php echo $row['book_id']; ?>' ">
                Assign </button>
                     <?php }  else { echo "  Delete " ; ?> 
               <button style="background-color:skyblue" onclick="location.href='<?= WEBSITE ?>admin_books/return_book?book_id=<?php echo $row['book_id']; ?>' ">
                   Return</button>     
                       <?php } ?>
          
               </td></tr>
               

    
    <?php } ?>

            </td>
            <td><?php
                if ($row['available'] == '1') {
                    echo "firstname";
                } else {
                    echo "Already Requested";
                }
                ?></td>

    </tr>
</table>
</form>
