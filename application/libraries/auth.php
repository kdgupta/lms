<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class auth  {

    public function admin_acl($action) {

     //   $r = $this->session->userdata('role_name');
        //   echo $action;
        //  echo $r;
        //    die;
//    $permission["Admin"]=array("admin"=>array("dashboard"), "admin_books"=>
//        array("editbooks","deletebooks",
//                "addbooks","viewbooks","assign_books","return_books",
//                "assigned_user_records"),"admin_users"=>array("edituser",
//                    "deleteuser","createuser","viewuser"));
//    
//    
//    
//    $permission["N-user"]=array("user"=>array("dashboard"),"user_books"=>
//        array("user_avail_books",
//               "user_assigned_books")); 




        $Admin = array("Admin_dashboard", "Admin_books_editbooks",
            "Admin_books_deletebooks",
            "Admin_books_addbooks", "Admin_books_viewbooks", "Admin_books_assign_books",
            "Admin_books_return_book",
            "Admin_books_assigned_user_records", "Admin_users_edituser",
            "Admin_users_deleteuser", "Admin_users_createuser", "Admin_users_viewusers");


        if (in_array($action, $Admin)) {

//       echo $action;
//     //  echo $r;
//       die;
            return true;
        } else {
            return false;
        }
    }

//        $acl = array("Admin" =>
//     array("admin_books" =>
//     array("editbooks", "deletebooks", "addbooks", "viewbooks", "assign_books",
//    "return_books", "assigned_user_records"),
//    "admin_users" => array("edituser", "deleteuser", "createuser", "viewuser")),
//     "N-user" => array("user_books" =>
//     array("user_avail_books", "user_assigned_books")));



    public function user_acl($action) {
        $Nuser = array("User_dashboard", "User_books_viewbooks",
            "User_assigned_books");


        if (in_array($action, $Nuser)) {
            return true;
        } else {
            return false;
        }
    }

   

}

?>
