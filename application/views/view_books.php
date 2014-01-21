<?php ?>






    <div class="col-lg-4"> </div>
   
    <div class="col-lg-3">
<button  onclick="location.href='<?=WEBSITE?>admin_books/addbooks'" class="btn btn-lg btn-primary btn-block">
     Add New Book</button> </div> <br><br> <br>    


<table  border="5" align="center" >
    <tr> <th style="text-align: center;"><font size="3"> Book_id</font></th>
        <th style="text-align: center;"><font size="3"> Book Title </font></th>
        <th style="text-align: center;"><font size="3"> Author Name </font></th>
        <th style="text-align: center;"><font size="3"> Publication </font></th>
        <th style="text-align: center;"><font size="3"> Edition </font></th>
        <th style="text-align: center;"> <font size="3">Price </font></th>

        <th style="text-align: center;"> <font size="3">Actions</font></th>


    </tr>
    <?php foreach ($userdata as $row) {
        ?>
        <tr>
            <td>   <?php echo $row['book_id']; ?> </td>
            <td><?php echo $row['book_title']; ?></td>
            <td><?php echo $row['author']; ?></td>
            <td><?php echo $row['publications']; ?></td> 
            <td><?php echo $row['edition']; ?></td>
            <td><?php echo $row['price']; ?></td>
           <td> <button  style="background-color:skyblue"  onclick="location.href='<?=WEBSITE?>admin_books/editbooks?book_id=<?php echo $row['book_id']; ?>'" >
    Edit</button>
               <button style="background-color:skyblue" onclick="location.href='<?=WEBSITE?>admin_books/deletebooks?book_id=<?php echo $row['book_id']; ?>'">
    Delete</button>
               </td></tr>
               

         

        </tr>
    <?php } ?>
</table>
</form>
