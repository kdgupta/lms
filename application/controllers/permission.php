<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class permission extends App_controller {
    
    function __construct() {
        parent::__construct();
    }

    public function admin_acl($action,$Admin) {
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
       
      
        
        
      $permission["Admin"]=array("admin_dashboard", "admin_books_editbooks",
          "admin_books_deletebooks",
      "admin_books_addbooks","admin_books_viewbooks","admin_books_assign_books",
          "admin_books_return_books",
              "admin_books_assigned_user_records","admin_users_edituser",
            "admin_users_deleteuser","admin_users_createuser","admin_users_viewuser");
    
    
    var_dump(multi_in_array($action, $Admin));  
      
      
function multi_in_array($action, $Admin)
{
    foreach ($Admin AS $item)
    {
        if (!is_array($item))
        {
            if ($item == $value)
            {
                return true;
            }
            continue;
        }

        if (in_array($value, $item))
        {
            return true;
        }
        else if (multi_in_array($value, $item))
        {
            return true;
        }
    }
    return false;
} 
    
    
       
//        $acl = array("Admin" =>
//     array("admin_books" =>
//     array("editbooks", "deletebooks", "addbooks", "viewbooks", "assign_books",
//    "return_books", "assigned_user_records"),
//    "admin_users" => array("edituser", "deleteuser", "createuser", "viewuser")),
//     "N-user" => array("user_books" =>
//     array("user_avail_books", "user_assigned_books")));
    
       }
       
       public function user_acl(){
         $permission["N-user"]=array("user_dashboard","user_books_user_avail_books",
               "user_booksuser_assigned_books"); 
       
       }
       
       

    public function user_info() {
        $this->load->model("users");
        $data["userdata"] = $this->users->users_data();
        
        
        $this->load->database();
        $email = $data['email'];
        $pwd = $data['password'];
        // echo $email;
        //die; 
        // $this->db->where('email', $this->input->post('email'));
        // $this->db->where('password', $data['password']);
        // $this->db->where('is_active', 1);
        // $query = $this->db->get("users");

        $query = $this->db->query("select  p.emp_id,p.firstname, p.lastname, 
            p.email,q.role_name,q.role_id from users as p
             join 
            user_roles as r on p.emp_id = r.emp_id  join roles as q on r.role_id
            =  q.role_id where email='$email' and is_active='1' and password='$pwd' ");
        //  $this->output->enable_profiler(TRUE);

        if ($query->num_rows == 1) {

//            echo 'ffjsdf';
//           die;
            // If
            $row = $query->row();
            $data = array(
                'emp_id' =>$row->emp_id,
                'email' => $row->email,
                'firstname' => $row->firstname,
                'lastname' => $row->lastname,
                'role_name' => $row->role_name,
                'role_id' => $row->role_id,
                'validated' => true
            );
            $this->session->set_userdata($data);
            // there is a user, then create session data
            return $data;

        //if($this->session->userdata('admin_signed_in')){
        //$this->load->model('dashboard_model');
        $this->session->set_userdata('emp_id', $data['emp_id']);
        $this->session->set_userdata('firstname', $data['firstname']);
        $this->session->set_userdata('lastname', $data['lastname']);
        $this->session->set_userdata('password', $data['password']);
        $this->session->set_userdata('email', $data['email']);
        $this->session->set_userdata('is_active', $data['is_active']);
        $this->session->set_userdata('role_name', $data['role_name']);
        $this->session->set_userdata('role_id', $data['role_id']);

        // $data['userdata'] = $this->session->userdata;
        //$data['main_content'] = 'dashboard/dashboard';  
        // $this->load->view('common/template', $data);
        //} else 
        // {
        //$this->layout->view('login_view');
        //}
    }

   

}
 


}
?>
