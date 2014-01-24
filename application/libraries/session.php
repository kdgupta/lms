<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class session{
    
    
    public function permission()
  {
       $acl=array("admin_id"=>array("admin_dashboard","view_user","admin_users_add","admin_users_edit",
           "view_books","admin_books_add","admin_books_edit"),"n-user_id"=>array("user_avail_books","user_assigned_books"));
  }   
  
    public function user_info()
     {
          $this->load->model("users");
        $data["userdata"] = $this->users->users_data();
       
    //if($this->session->userdata('admin_signed_in')){
    //$this->load->model('dashboard_model');
    $this->session->set_userdata('emp_id', $data['emp_id']);
     $this->session->set_userdata('firstname',$data['firstname'] );
     $this->session->set_userdata('lastname',$data['lastname'] );
    $this->session->set_userdata('password', $data['password'] );
     $this->session->set_userdata('email',$data['email'] );
      $this->session->set_userdata('is_active',$data['is_active'] );
      $this->session->set_userdata('role_name',$data['role_name'] );
      $this->session->set_userdata('role_id',$data['role_id'] );
      
   // $data['userdata'] = $this->session->userdata;
    //$data['main_content'] = 'dashboard/dashboard';  
   // $this->load->view('common/template', $data);
    //} else 
   // {
     //$this->layout->view('login_view');
    //}

     }

}
?>
