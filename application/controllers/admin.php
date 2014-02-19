<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
require_once 'app_controller.php';

class admin extends App_controller {

    function __construct() {
        parent::__construct();

    }

    public function dashboard() {

        $this->load->helper("form");
        


        $this->layout->view('admin_dashboard');
    }

}

