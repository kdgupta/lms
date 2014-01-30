
<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
require_once 'app_controller.php';


class Admin_users extends App_controller  {
    function __construct() {
        parent::__construct();
        //$this->load->view('dashboard');
    }

    public function edituser() {
        // $this->output->enable_profiler(TRUE);
        $empid = $this->input->get('emp_id');
        $this->load->model("users");
        $this->load->helper("form");
        if (!empty($empid)) {
            $data["userdata"] = $this->users->get_userdata_by_id($empid);
            $this->layout->view('admin_users_edit', $data);
        } else {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                //  $this->output->enable_profiler(TRUE);
               // echo "<pre>";
                //print_r($this->input->post());
                //update code
                // $this->load->view('admin_user_edit');
                //$updateData=array("status"=>"Paid");
                // $this->db->where("emp_id",$empid);
                //$this->db->update("users");    
                // $this->load->helper("form");
                $data = array("emp_id" => $this->input->post('emp_id'),
                    "firstname" => $this->input->post('firstname'),
                    "lastname" => $this->input->post('lastname'),
                    "email" => $this->input->post('email'),
                    "password" => $this->input->post('password'),
                    "designation" => $this->input->post('designation'),
                    "is_active" => $this->input->post('is_active'));
                $tre = $this->users->update_users_data($data, $this->input->post('emp_id'));
                if ($tre == true) {
                    header('location: viewusers');
                }
            }
        }


        // $this->load->view("update_view");
        // echo $data;
        //  die;
        //$this->load->library("form_validation");
    }

    public function deleteuser() {
        // $this->output->enable_profiler(TRUE);
        $empid = $this->input->get('emp_id');
        $this->load->model("users");
        $ret = $this->users->delete_users($empid);
        if ($ret == true) {
            header('location: viewusers');
        }
        //$this->load->view('admin_dashboard');
    }

    public function createuser() {

        $this->load->helper("form");
        $this->load->library("form_validation");
        $this->form_validation->set_rules("emp_id", "Employee Id", "required");
        $this->form_validation->set_rules("firstname", "First Name", "required");
        $this->form_validation->set_rules("lastname", "Last Name", "required");
        $this->form_validation->set_rules("email", "Email Address", "required|valid_email");
        $this->form_validation->set_rules("password", "Password", "required");
        $this->form_validation->set_rules("designation", "Designation", "required");
        $this->form_validation->set_rules("is_active", "Active", "required");

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $this->layout->view("admin_users_add");
        }

       else{
           if ($this->form_validation->run() == false) {
       
            $this->layout->view("admin_users_add");

        } 
          else {
                $empid = $_POST["emp_id"];
                $first = $_POST["firstname"];
                $last = $_POST["lastname"];
                $email = $_POST["email"];
                $password = $_POST["password"];
                $designation = $_POST["designation"];
                $active = $_POST["is_active"];
                $data = array("emp_id" => $empid,
                    "firstname" => $first,
                    "lastname" => $last,
                    "email" => $email,
                    "password" => $password,
                    "designation" => $designation,
                    "is_active" => $active);

                $this->load->model("users");
                $ret = $this->users->insert_users($data);
                if ($ret == true) {
                    header('location: viewusers');
                }
                //  $this->load->view("demo_success");
            }
        }
    }
    

    public function viewusers() {
        // $this->output->enable_profiler(TRUE);

        $this->load->model("users");
        $data["userdata"] = $this->users->users_data();


      
       
        $this->layout->view("view_users", $data);


        //$this->load->view('admin_dashboard');
    }

//         public function index()
//	{
//             
//		$this->load->view('index.html');
//	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */