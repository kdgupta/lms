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


    <div class="form-group"> 
        <div class="col-sm-1 pull-top" >

            <button style="background-color:skyblue" onclick="location.href = '<?= WEBSITE ?>user/dashboard'">
                Back</button></div>
    </div>    


</div>





<br><br>

<table  border="5" align="center" >
    <tr>

        <th style="text-align: center;"><font size="3"> Book Title </font></th>
        <th style="text-align: center;"><font size="3"> Author Name </font></th>
        <th style="text-align: center;"><font size="3"> Publication </font></th>
        <th style="text-align: center;"><font size="3"> Edition </font></th>
        <th style="text-align: center;"><font size="3"> Isbn </font></th>
        <th style="text-align: center;"> <font size="3">Price </font></th>
        <th style="text-align: center;"> <font size="3">Actions</font></th>


    </tr>
    <?php foreach ($userdata as $row) {
        ?>
        <tr>

            <td><?php echo $row['book_title']; ?></td>
            <td><?php echo $row['author']; ?></td>
            <td><?php echo $row['publications']; ?></td> 
            <td><?php echo $row['edition']; ?></td>
            <td><?php echo $row['isbn']; ?></td>
            <td><?php echo $row['price']; ?></td>
   <!--         <td><input type="submit" name="submit" value="Request"  ></td>
       -->
      <td>  <?php if($row['status']=='') { ?>    
         <button style="background-color:skyblue" onclick="location.href = '<?= WEBSITE ?>user_books/requested_books?book_id=<?php echo $row['book_id']; ?>'">
                           Request</button>
                       <?php    }?>
            <?php if($row['status']==2) {?>
             
                           pending
                  <?php         }?></td>

        </tr>
    <?php } ?>
</table>



</form>
