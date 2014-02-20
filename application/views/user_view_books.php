<?php ?>

<head>

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
        <button  onclick="location.href = '<?= WEBSITE ?>user/dashboard'"
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
<table  border="1" align="center" class="TFtable">
    <tr>

        <th style="text-align: center;"><font size="3"> Book Title </font></th>
        <th style="text-align: center;"><font size="3"> Author Name </font></th>
        <th style="text-align: center;"><font size="3"> Publication </font></th>
        <th style="text-align: center;"><font size="3"> Edition </font></th>

    <!--   <th style="text-align: center;"><font size="3"> Isbn </font></th>
        <th style="text-align: center;"> <font size="3">Price </font></th>-->
        <th style="text-align: center;"> <font size="3">Status</font></th>
         <th style="text-align: center;"> <font size="3">Actions</font></th>

</tr>

    <?php foreach ($userdata as $row) { ?>

        <tr>

            <td><?php echo $row['book_title']; ?></td>
            <td><?php echo $row['author']; ?></td>
            <td><?php echo $row['publications']; ?></td> 
            <td><?php echo $row['edition']; ?></td>

         <!--   <td><?php //echo $row['isbn']; ?></td>
           <td><?php //echo $row['price']; ?></td>-->
            



            <?php if ($row['lg_user_id'] == $this->session->userdata('emp_id')) { ?>
                <?php if ($row['status'] == 2) { ?>
                    <td> <div >
                            <font size="2"> pending</font> </div>
                    </td>
                    <td> <div class="col-lg-1"> <button  onclick=  "location.href = '<?= WEBSITE ?>user_books/cancel_request?book_id=<?php echo $row['book_id']; ?>'"
                                                         class="btn btn-sm btn-primary">
                                <font size="2"> Cancel Request</font> </button></div>
                    </td>
                <?php }
                ?>
                <?php if ($row['status'] == 3) { ?>
                    <td> <div >
                            <font size="2"> Approved</font> </div>
                    </td>

                    <td> <div class="col-lg-1"> 
                            <button  class="btn btn-sm btn-primary">
                                <font size="2">Request Accepted</font> </button></div>
                    </td>
                <?php }
                ?>
                <?php if ($row['status'] == 4) { ?>
                    <td> <div >
                            <font size="2"> Rejected</font> </div>
                    </td>

                    <td> <div class="col-lg-1"> 
                            <button  class="btn btn-sm btn-primary">
                                <font size="2">Request Rejected</font> </button></div>
                    </td>
                <?php }
                ?>
            <?php } else { ?>
                <td> <div >
                        <font size="2"> </font> </div>
                </td>
                <td>
                    <div class="col-lg-1"> <button  onclick=  "location.href = '<?= WEBSITE ?>user_books/request?book_id=<?php echo $row['book_id']; ?>'"
                                                    class="btn btn-sm btn-primary">
                            <font size="2"> Request</font> </button></div> </td>

            <?php } ?>
        </tr>
    <?php } ?>
</table>
</form>
