<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
require_once 'app_controller.php';

class Admin extends App_controller {

    function __construct() {
        parent::__construct();
        //$this->load->view('dashboard');
    }

    public function dashboard() {

        $this->load->helper("form");
        $this->load->library('auth');
        // $email= $this->session->userdata('email');
      if ($this->session->userdata('validated') == true) 
        {     
//         echo "u r not allowed";
//                die;
        if ($this->session->userdata('role_id') == 2)
        {
           $value="Admin_dashboard";
      if( $this->auth->admin_acl($value))
      {
       //     {
         //  if ($this->session->userdata('role_id') == 2)     
      //     {
               $this->layout->view('admin_dashboard');
//         else {
//            $this->load->helper("url");
//            redirect('/admin/dashboard');
       }
       else {
//    if($this->session->userdata('role_id') != 2)  
           $this->layout->view('not_view');
    //    }
        
            }

        }
     //       }
       else {
//    if($this->session->userdata('role_id') != 2)  
           $this->layout->view('not_view');
    //    }
        
            }

    }
    else {
            $this->load->helper("url");
            redirect('/login/login_form');
        }
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */