
<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<head>
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
            text-align: center;
        }
        .submenu li{
            display:block;
            text-align: left;
        }
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
 
    <table align="center" border="1">
     

    
                 
                      
                    <!-- <?php //if ($row['status'] == '2') { ?> 
                                approved
                     <?php //} ?>
                                
                        <?php// if ($row['status'] == '3') { ?> 
                                rejected     
                                <?php //} ?>  
                                </td> -->
                            
                            

        <th style="text-align: center;"><font size="2">  Name </font></th>
    <?php foreach ($userdata as $row) { ?>
        <tr>

            <td><?php
                echo $row['firstname'];
                echo " ";
                echo $row['lastname'];
                ?></td>
            <td>  <ul class ="menu">
                    <li><a herf="">Action</a>
                        <ul class ="submenu">
                            <li><a href='<?= WEBSITE ?>admin_books/approved_books_records?id=<?php echo $row['id']; ?>' >
                                    Approve</a></li>
                            <li>
                                <a href='<?= WEBSITE ?>admin_books/deletebooks?book_id=<?php echo $row['book_id']; ?>'>
                                    Reject</a>
                            </li> 
                        </ul></li>
                </ul>

            </td></tr>
    <?php } ?>

    </table>
