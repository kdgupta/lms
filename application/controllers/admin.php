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
        $this->layout->view('admin_dashboard');
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */