<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class App_controller extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -  
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in 
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    function __construct() {
        parent::__construct();

        $this->load->library('layout');
        $this->layout->setLayout('layout_main');
        $this->layout->setTitle('LMS');
        $this->load->library('session');
        $this->load->helper('url');
        //$this->load->library('auth');
//       if($this->session->userdata('login_state')==FALSE);
//        {
//           redirect('/login/login_form');  
//        }
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */