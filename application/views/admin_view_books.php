<?php ?>

<head>
  <!--  <script>
  function preventBack(){window.history.forward();}
  setTimeout("preventBack()", 0);
  window.onunload=function(){null};
</script>-->

    <style type="text/css">
        .submenu{
            padding:0;
            position:absolute;
            background-color: #fff;
            width:80px;
            height:65px;
            border-style: solid;
            border-color: #ccc;
        }
        .menu{
            postion:relative;

        }

        .submenu{
            display:none;}

        ul li:hover .submenu{
            display:block;}
        a{
            text-decoration: none;}

        a:hover{
            color:#dd3333;

        }
        .submenu  li {
            border-top:1px solid #ccc;
            border-bottom:1px solid #ccc;
            text-align:left;

        }
        .menu li{
            display:block;
            cursor: pointer;

            text-align: center;
            cursor: pointer;
            cursor: hand; 
        }
        .submenu li{
            display:block;
            text-align: left;
        }


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
        <button  onclick="location.href = '<?= WEBSITE ?>admin'"
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




<div class="col-lg-2"> </div>
<div class="col-lg-2">
    <button  onclick="location.href = '<?= WEBSITE ?>addbooks'" class="btn btn-lg btn-primary btn-block">
        Add New Book</button> </div>

 <font size="4" color=#8866ff> Please! </font>
  <a target="_blank" href = 'https://drive.google.com/a/tradus.com/#folders/0B6y7nksbw4OOczZ6cG1JdU1LM0U'>
        <font size="5">click here</font></a>
    <font size="4" color=#8866ff> to add soft copy of book</font> 
   

<br><br><br><br>   




<table border="1"align="center" class="TFtable" >

    <tr><th style="text-align: center;"><font size="3">Book_id</font></th>
        <th style="text-align: center;"><font size="3">
            <a href = '<?= WEBSITE ?>viewbooks?ch=<?php echo 'b'; ?>'>
                Book Title </a></font></th>
        <th style="text-align: center;"><font size="3">
            <a href = '<?= WEBSITE ?>viewbooks?ch=<?php echo 'a'; ?>'>
                Author Name </a></font></th>
        <th style="text-align: center;"><font size="3"> Publication </font></th>
        <th style="text-align: center;"><font size="3"> Edition </font></th>
        <th style="text-align: center;"><font size="3"> Isbn </font></th>
        <th style="text-align: center;"> <font size="3">Price </font></th>
        <th style="text-align: center;"> <font size="3">Available </font></th>
        <th style="text-align: center;"> <font size="3">Assigned To </font></th>

      <!--  <th style="text-align: center;"> <font size="1"> Date </font></th>
        <th style="text-align: center;"> <font size="1"> Activity </font></th>-->
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
            <td><?php echo $row['isbn']; ?></td>
            <td><?php echo $row['price']; ?></td>
            <td><?php
                if ($row['available'] == '1') {
                    echo "YES";
                } else {
                    echo "NO";
                }
                ?></td>
            <td> <?php if ($row['available'] == '2') { ?> 
                    <div class="col-lg-3 ">  
                        <a href = '<?= WEBSITE ?>assigned_user_records?emp_id=<?php echo $row['emp_id']; ?>& ch= <?php echo '#' ?>'>

                            <font color="black"><?php echo $row['firstname'];
            echo " ";
            echo $row['lastname']; ?></font>
                        </a></div>
    <?php } ?>
                <?php if ($row['available'] == '1') { ?>
                    <div class="col-lg-3 ">  
                    <?php if ($row['status'] == '2') { ?>        
                            <button   onclick="location.href = '<?= WEBSITE ?>request_details?book_id=<?php echo $row['book_id']; ?>'"
                                      class="btn btn-primary">                 
            <?php echo "Request Queue" ?></button></div>
                            <?php } ?>
                        <?php } ?></td> 
                    <!--    <td> <?php if ($row['available'] == '2') { ?>
                            <?php // echo $row['date']; ?> 
            <?php } ?></td>-->

            <!--    <td> <?php if ($row['activity'] == '1') { ?>
        <?php // echo "Assigned";  ?> 
                <?php
            }
            if ($row['activity'] == '2') {
                ?>
                <?php // echo ""; ?>
            <?php } ?></td>-->
            <td>  <ul class ="menu">

                    <li><a herf=""><font color="black">actions</font></a>

                        <ul class ="submenu">

                            <li><a href='<?= WEBSITE ?>editbooks?book_id=<?php echo $row['book_id']; ?>' >
                                    Edit</a></li>
                            <li>
    <?php if ($row['available'] == '1') { ?>

                                    <?php if ($row['activity'] != '2') { ?> 
                                        <a href='<?= WEBSITE ?>deletebooks?book_id=<?php echo $row['book_id']; ?>'>
                                            Delete</a> <?php } else { ?> <?php } ?></li> 
    <?php } else { ?>
                                    <a href='<?= WEBSITE ?>return_book?book_id=<?php echo $row['book_id']; ?> & ch=<?php echo '#'; ?>' >
                                        Return</a>     
    <?php } ?> </li>
                        </ul></li>
                </ul>

            </td></tr>



<?php } ?>






</table>




