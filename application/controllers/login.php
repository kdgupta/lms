<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
require_once 'app_controller.php';

class login extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('layout');
        $this->layout->setLayout('layout_main');
        $this->layout->setTitle('LMS');
        $this->load->library('session');
        $this->load->helper('url');
    }

    public function login_form() {
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->config('config');

        $this->load->helper("form");
        $this->layout->view('login_view');


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //$this->output->enable_profiler(TRUE);

            $data = array(
                "email" => $this->input->post('email'),
                "password" => $this->input->post('password'));
            $this->load->model("login_users");
            $role_id = $this->login_users->authenticate($data);

            if ($role_id == true) {
                $session['user_info'] = $this->login_users->set_user_info($role_id);
                //     $lg = $this->login_users->set_log_tables();
                //print_r($session['data']['validated']);
                // $session['user_action'] = $this->login_users->set_user_action($this->session->userdata('role_name'));
                // $session['user_action'] = $this->login_users->set_user_action($this->session->userdata('role_name'));


                $this->load->model('auth');


                // echo  $this->session->userdata('role_name');die;
                if ($this->auth->isallowed("admin", "dashboard")) {




                    // $this->load->helper('url');
                    redirect(WEBSITE . 'admin');
                }





                if ($this->auth->isallowed("user", "dashboard")) {

                    //  $this->load->helper('url');
                    redirect(WEBSITE . 'user');
                }
            }

            if ($role_id == false) {
                ?>

                <div class="col-lg-4 "></div>

                <div class="col-lg-4 " >
                    Username or Password is wrong </div>
                <?php
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
            redirect('/login');
        }
    }

}
?>
