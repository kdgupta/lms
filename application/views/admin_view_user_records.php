<?php ?>
<head>
<!--    <script>
  function preventBack(){window.history.forward();}
  setTimeout("preventBack()", 0);
  window.onunload=function(){null};
</script>-->

    <style type="text/css">
        th { padding: 4px;
vertical-align: top; border-style: solid; border-color: green; 
border-width:5px;background-color:beige; }
         .TFtable tr:nth-child(odd){ 
		background: skyblue;}
     .TFtable tr:nth-child(even){
		background: white;}
         </style>
</head>

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

<br><br><table  border="1" align="center" class="TFtable">
    <tr><th><font size="3">Emp id</font></th>
        <th><font size="3">User Name</font></th>
        <th><font size="3"> Book_id</font></th>
        <th> <font size="3">Book Title </font></th>
        <th> <font size="3">Author Name</font> </th>
        <th><font size="3"> Publication </font></th>
        <th> <font size="3">Edition</font> </th>
        <th><font size="3"> Isbn Number</font> </th>
        <th><font size="3"> Price </font></th>
        <th><font size="3"> Date</font></th>
        <th><font size="3">Activity</font></th> 




    </tr>
    <?php foreach ($record as $row) {
        ?>
        <tr><td>   <?php echo $row['emp_id']; ?> </td>
            <td>   <?php echo $row['firstname']; ?><?php echo" "; ?><?php echo $row['lastname']; ?></td>
            <td>   <?php echo $row['book_id']; ?> </td>
            <td><?php echo $row['book_title']; ?></td>
            <td><?php echo $row['author']; ?></td>
            <td><?php echo $row['publications']; ?></td> 
            <td><?php echo $row['edition']; ?></td>
            <td><?php echo $row['isbn']; ?></td>
            <td><?php echo $row['price']; ?></td>


            <td><?php echo $row['date']; ?></td> 
            <?php if ($row['activity'] == 1) { ?>
                <td> <?php echo "Assigned"; ?>
                <?php } ?></td> 
            <?php if ($row['activity'] == 2) { ?>
                <td><?php echo "Returned"; ?>
                <?php } ?></td> 

        <?php } ?>
    </tr>

</table>

</form>
</html>