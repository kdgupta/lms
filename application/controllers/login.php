<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
require_once 'app_controller.php';

class Login extends App_controller {

    function __construct() {
        parent::__construct();
    }

    public function login_form() {
        $this->load->helper('url');
        $this->load->library('session');
        //session_start(); 
        //$this->session->set_userdata('login_state',FALSE);
        $this->load->helper("form");
        $this->layout->view('login_view');

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
            //$this->load->library('session');
            $data = array(
                "email" => $this->input->post('email'),
                "password" => $this->input->post('password'));
            $this->load->model("login_users");
            $tre = $this->login_users->authenticate($data);
            if ($tre == true) {
                $session['data'] = $this->login_users->set_session($data);
                //print_r($session['data']['validated']);
                // die;
                $role = $this->session->userdata('role_id');
                //$this->output->enable_profiler(TRUE);
                // echo $fn;
                //   $this->output->enable_profiler(TRUE);
                //   die;
                if ($session['data']['validated'] == 1) {
//                      echo 'ffjsdf';
//                   die;

                    if ($role == 2) {

                        // $this->load->library('session');
                        //  $this->session->set_userdata('login_state', TRUE);
                        //Try retriving data:
                        // $session_id = $this->session->userdata('session_id');
                        // echo $session_id;
                      //  $this->config->load(config);
                            
                          $this->load->config('config');
//                              echo "gffdgd";
//                                 die;
                        $p= $this->config->permission('Admin_dashboard','Admin');
                        echo $p;
                        die;
                        $this->load->helper('url');
                        redirect('/admin/dashboard');
                    }
//           else if( $fn==1){
//               $this->load->helper('url');
//                redirect('/user/dashboard');
//               }
                    if ($role == 1) {
                        $this->load->helper('url');
                        redirect('/user/dashboard');
                        // print_r("sorry user dashboard is not available till now");
                    }
                }
            } else {

                //echo "<pre>";
                // $this->layout->view('error_view');



                print_r("Username or Password is wrong ");
                header('location :' . WEBSITE . 'login_form');
            }
        }
    }

    public function logout_form() {
        $this->load->model("login_users");
        $lout = $this->login_users->logout();
        // echo $this->session->userdata('validated');

        if ($lout != 1) {

            $this->load->helper('url');
            redirect('/login/login_form');
        }
    }

}

?>