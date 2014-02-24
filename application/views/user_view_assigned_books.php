<?php ?>

<head>
  <!--  <script>
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
        <button  onclick="location.href = '<?= WEBSITE ?>user'"
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
<br>
<table  border="5" align="center" class="TFtable">

   <!-- <th>User Name</th> -->
    <th> Book Title </th>
    <th> Author Name </th>
    <th> Publication </th>
    <th> Edition </th>
   <!-- <th> Isbn Number </th>
    <th> Price </th>-->
    <th> <a href = '<?= WEBSITE ?>assigned_books?emp_id=<?php echo $this->session->userdata('emp_id') ?> & ch=<?php echo 'd'; ?>'>Date
        </a></th>

    <th>Activity</th> 




</tr>
<?php foreach ($record as $row) {
    ?>
    <tr>
       <!-- <td>   <? //php echo $row['firstname'];   ?><?php //echo" ";   ?><?php //echo $row['lastname'];   ?></td>-->

        <td><?php echo $row['book_title']; ?></td>
        <td><?php echo $row['author']; ?></td>
        <td><?php echo $row['publications']; ?></td> 
        <td><?php echo $row['edition']; ?></td>
     <!--   <td><? //php echo $row['isbn'];   ?></td>
        <td><?php // echo $row['price'];   ?></td>-->


        <td><?php echo $row['date']; ?></td> 
        <td> <?php if ($row['activity'] == 1) { ?>
                <div class="col-lg-1"> 

                    <font size="2">Assigned</font> </div>

            <?php } ?>
            <?php if ($row['activity'] == 2) { ?>
                <div class="col-lg-1"> 

                    <font size="2">Returned</font> </div>
            <?php } ?></td> 

    <?php } ?>
</tr>

</table>

</form>
</html>