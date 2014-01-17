<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {
function __construct() {
        parent::__construct();
        //$this->load->view('dashboard');
    }
    public function login_form() {
        $this->load->helper("form");
        $this->load->view('login_view');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //$this->output->enable_profiler(TRUE);
            // echo "<pre>";
            //print_r($this->input->post());
            //update code
            // $this->load->view('admin_user_edit');
            //$updateData=array("status"=>"Paid");
            // $this->db->where("emp_id",$empid);
            //$this->db->update("users");    
            // $this->load->helper("form");
          //  echo "<pre>";
          //  print_r($this->input->post('email'));
          //  die;
            $data = array(
                "email" => $this->input->post('email'),
                "password" => $this->input->post('password'));
            $this->load->model("login_users");

            $tre = $this->login_users->authenticate($data);
            if ($tre == 1) {
                $this->load->helper('url');
                redirect('/admin/dashboard');
            } else {
          echo "<pre>";
           print_r("Username or Password is wrong ");
                header('location :' . WEBSITE . 'login_form');
            }
        }
    }

}

