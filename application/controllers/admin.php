<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin extends CI_Controller {

   public function dashboard() {
        $this->load->helper("form");
        $this->load->view('admin_dashboard');
    }
    
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */