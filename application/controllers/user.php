<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
require_once 'app_controller.php';

class user extends App_controller {

    function __construct() {
        parent::__construct();
    }

    public function dashboard() {

        $this->load->helper("form");

        $this->layout->view('user_dashboard');
    }

    public function change_pass() {
        $this->load->helper("form");
        $this->load->library("form_validation");
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->form_validation->set_rules("password", "Password", "required");
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $this->layout->view("user_change_pass");
        } else {

            if ($this->form_validation->run() == false) {
                $this->layout->view("user_change_pass");
            } else {
                $pass = $_POST["password"];
                $this->load->model("users");
                $ret = $this->users->change_password($pass);
                if ($ret) {
                    $this->layout->view("view_after_change_pass");
                }
            }
        }
    }

}

