<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
require_once 'app_controller.php';

class admin_books extends App_controller {

    function __construct() {
        parent::__construct();
    }

    public function editbooks() {


//$this->output->enable_profiler(TRUE);
        $bookid = $this->input->get('book_id');
        $this->load->model("books");
        $this->load->helper("form");
         $this->load->library("form_validation");
         $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->form_validation->set_rules("book_title", "Book Title", "required");
        $this->form_validation->set_rules("author", "Author Name", "required");
        $this->form_validation->set_rules("publications", "Publications", "required");
        $this->form_validation->set_rules("edition", "Edition", "required");
        $this->form_validation->set_rules("isbn", "Isbn Number", "required");
        $this->form_validation->set_rules("price", "Price", "required");
         if ($_SERVER['REQUEST_METHOD'] === 'GET') {

        if (!empty($bookid)) {

            $data["userdata"] = $this->books->get_bookdata_by_id($bookid);
            $this->layout->view('admin_books_edit', $data);
        }
        }else {
            if($this->form_validation->run() == false) {
                $bookid = $this->input->post('book_id');
                
            $data["userdata"] = $this->books->get_bookdata_by_id($bookid);


            $this->layout->view('admin_books_edit', $data);
            }
              else{

            $data = array("book_id" => $this->input->post('book_id'),
                "book_title" => $this->input->post('book_title'),
                "author" => $this->input->post('author'),
                "publications" => $this->input->post('publications'),
                "edition" => $this->input->post('edition'),
                "isbn" => $this->input->post('isbn'),
                "price" => $this->input->post('price'),
                "available" => $this->input->post('available'));


            $tre = $this->books->update_books_data($data, $this->input->post('book_id'));
            if ($tre == true) {
                header('location: viewbooks?ch=#');
            }
            }
        }
        
    }

    public function deletebooks() {
// $this->output->enable_profiler(TRUE);



        $bookid = $this->input->get('book_id');
        $this->load->model("books");

        $ret = $this->books->delete_books($bookid);
        if ($ret == true) {
            header('location: viewbooks?ch=#');
        }
//$this->load->view('admin_dashboard');
    }

    public function addbooks() {

        $this->load->helper("form");
        $this->load->library("form_validation");
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->form_validation->set_rules("book_title", "Book Title", "required");
        $this->form_validation->set_rules("author", "Author Name", "required");
        $this->form_validation->set_rules("publications", "Publications", "required");
        $this->form_validation->set_rules("edition", "Edition", "required");
        $this->form_validation->set_rules("isbn", "Isbn Number", "required");
        $this->form_validation->set_rules("price", "Price", "required");

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {


            $this->layout->view("admin_books_add");
        } else {

            if ($this->form_validation->run() == false) {
                 $bookid = $_POST["book_id"];
                $booktitle = $_POST["book_title"];
                $author = $_POST["author"];
                $publications = $_POST["publications"];
                $edition = $_POST["edition"];
                $isbn = $_POST["isbn"];
                $price = $_POST["price"];

// $available = $_POST["available"];

                $data = array("book_id" => $bookid,
                    "book_title" => $booktitle,
                    "author" => $author,
                    "publications" => $publications,
                    "edition" => $edition,
                    "isbn" => $isbn,
                    "price" => $price);

                $this->layout->view("admin_books_add");
            } else {
                $bookid = $_POST["book_id"];
                $booktitle = $_POST["book_title"];
                $author = $_POST["author"];
                $publications = $_POST["publications"];
                $edition = $_POST["edition"];
                $isbn = $_POST["isbn"];
                $price = $_POST["price"];

// $available = $_POST["available"];

                $data = array("book_id" => $bookid,
                    "book_title" => $booktitle,
                    "author" => $author,
                    "publications" => $publications,
                    "edition" => $edition,
                    "isbn" => $isbn,
                    "price" => $price);

// "available" => $available);

                $this->load->model("books");
                $ret = $this->books->insert_books($data);
                if ($ret == true) {
                    header('location: viewbooks?ch=#');
                }
            }
        }
    }

    public function viewbooks() {
        $this->load->model("books");
        $empid = $this->input->post('emp_id');
        $data["userdata"] = $this->books->books_data($empid);
        $this->layout->view("admin_view_books", $data);
    }

    public function assigned_user_records() {


        $empid = $this->input->get('emp_id');

        $this->load->model("user_records");
        if (!empty($empid)) {

            $data["record"] = $this->user_records->assignedbook($empid);
            $this->layout->view('admin_view_user_records', $data);
        }
    }

    public function requested_user() {
        if ($this->session->userdata('validated') == true) {
            if ($this->session->userdata('role_id') == 2) {
                $emp_id = $this->input->get('emp_id');
                $this->load->model("assignuser_model");
                $data["requestdata"] = $this->assignuser_model->assignuser_data();
                $this->layout->view("admin_view_books", $data);
            }
        } else {
            $this->load->helper("url");
            redirect('/login/login_form');
        }
    }

    public function assign_books() {

        $bookid = $_GET['book_id'];

        $this->load->model(array("assignbook_model", "assignuser_model"));

        if (!empty($bookid)) {
            $data["bookdata"] = $this->assignbook_model->get_book_by_id($bookid);

            $data["userdata"] = $this->assignuser_model->assignuser_data();
            $this->layout->view('admin_assign_books', $data);
        } else {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $bookid = $_POST["book_id"];
                $empid = $_POST["emp_id"];
                $data = array("book_id" => $bookid,
                    "emp_id" => $empid);
                $this->load->model("assignbook_model");

                $ret = $this->assignbook_model->assignedbook_records($data);

                if ($ret == true) {
                    header('location: viewbooks?ch=#');
                }
            }
        }
    }

    public function return_book() {

        $bookid = $_GET['book_id'];

        $this->load->model(array("assignbook_model", "assignuser_model","user_request"));

        if (!empty($bookid)) {
             
            $data["bookdata"] = $this->assignbook_model->get_book_by_id($bookid);
            

           // $data['req_data'] =$this->user_request->fetch_user($bookid);
           // print_r($data['req_data']);die;
            $data['userdata'] = $this->assignuser_model->returnuser_data($bookid);
           //$re= $this->assignbook_model->return_req_book($data['req_data']);


            $empid = $data['userdata'][0]['emp_id'];

            $ret = $this->assignbook_model->return_book($empid);
           
            if($ret==true){
               
         
                     
           
                header('location: viewbooks?ch=#');
            
         //   }
        }
    }
    }

    public function request_details() {

        $bookid = $_GET['book_id'];
        $this->load->model("user_request");
        if (!empty($bookid)) {
            $data["userdata"] = $this->user_request->fetch_req_data($bookid);
            $this->layout->view("admin_requested_users", $data);
        }
    }

    public function approved_books_records() {
        $reqid=$_GET['id'];
          $this->load->model(array("assignbook_model", "assignuser_model","user_request"));
         $data["req_data"]=$this->user_request->fetch_req($reqid);
         
          $bookid=$data['req_data'][0]['book_id'];
          $empid=$data['req_data'][0]['emp_id'];
          $data["bookdata"] = $this->assignbook_model->get_book_by_id($bookid);
          $data["userdata"] = $this->assignuser_model->requser_data($empid);
          
          $ret = $this->assignbook_model->assignedbook_records($data);
          if ($ret == true) {
           $data["log_data"]=$this->user_request->data_for_req_log();
           $re= $this->assignbook_model->insert_req_records($data["log_data"]);
                if($re== true){
                    header('location: viewbooks?ch=#');
                }
          }
    }
//     public function admin_approve_books() {
//         $bookid = $_GET['book_id'];
//       //  $empid = $_GET['emp_id'];
//         echo $bookid;
//    //     echo $empid;
//         die;
//         $this->load->model("user_request");
//         
//         if (!empty($bookid)) {
//          $this->user_request->user_req_id($bookid);   
//          $ret =    $this->user_request->admin_approve_req($bookid);
//             if ($ret == true) {
//        header('location: viewbooks');
//             }
//         }
//         
//     }
     
//      public function admin_reject_books() {
//          
//      }


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */