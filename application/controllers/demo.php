<?php
class demo extends CI_Controller
{
    public function index() {
        // Load the Form helper which provides methods to assist
        // working with forms.
        $this->load->helper("form");
        // Load the form validation classes
        $this->load->library("form_validation");
 
        // As you have loaded the validation classes, you can now
        // apply rules to the fields you want validated. The
        // functions below take three arguments:
        //     1. The name of form field
        //     2. The human name of the field to be displayed in
        //        the event of an error
        //     3. The names of the validation rules to apply
         $this->form_validation->set_rules("emp_id", "Employee Id",
            "required");
        $this->form_validation->set_rules("firstname", "First Name",
            "required");
        $this->form_validation->set_rules("lastname", "Last Name",
            "required");
        $this->form_validation->set_rules("email", "Email Address",
            "required|valid_email");
         $this->form_validation->set_rules("password", "Password",
            "required");
   $this->form_validation->set_rules("designation", "Designation",
            "required");
   $this->form_validation->set_rules("is_active", "Active",
            "required");
        // Check whether the form validates. If not, present the
        // form view otherwise present the success view.
        if ($this->form_validation->run() == false) {
            $this->load->view("demo_view");
        }
        else {
              $empid = $_POST["emp_id"];
              $first = $_POST["firstname"];
              $last = $_POST["lastname"];
              $email = $_POST["email"];
              $password = $_POST["password"];
              $designation = $_POST["designation"];
               $active = $_POST["is_active"];
              $data = array("emp_id"=>$empid,
                        "firstname" => $first,
                        "lastname" => $last,
                        "email" => $email,
                        "password"=>$password,
                        "designation"=>$designation,
                        "is_active"=>$active);
        $this->load->model("users");
        $this->users->insert_users($data);
            $this->load->view("demo_success");
        }
    }
}
