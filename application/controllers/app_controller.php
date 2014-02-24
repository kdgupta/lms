<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class app_controller extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->library('layout');
        $this->layout->setLayout('layout_main');
        $this->layout->setTitle('LMS');
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('auth');
        $controller = $this->router->fetch_class();
        $action = $this->router->fetch_method();


        if ($this->session->userdata('validated') == false)
            redirect('/login/login_form');


        if (!$this->auth->isallowed($controller, $action)) {
            echo "access denied";
            die;
        }
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */