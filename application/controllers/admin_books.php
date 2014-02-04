<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
require_once 'app_controller.php';

class admin_books extends App_controller {

    function __construct() {
        parent::__construct();
//$this->load->view('dashboard');
    }

    public function editbooks() {


//$this->output->enable_profiler(TRUE);
        $bookid = $this->input->get('book_id');
        $this->load->model("books");
        $this->load->helper("form");
        if (!empty($bookid)) {
            $data["userdata"] = $this->books->get_bookdata_by_id($bookid);

//                 
            $this->layout->view('admin_books_edit', $data);
// }
        } else {



            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//echo $this->session->userdata('validated');
//  $this->output->enable_profiler(TRUE);

                $data = array("book_id" => $this->input->post('book_id'),
                    "book_title" => $this->input->post('book_title'),
                    "author" => $this->input->post('author'),
                    "publications" => $this->input->post('publications'),
                    "edition" => $this->input->post('edition'),
                    "isbn" => $this->input->post('isbn'),
                    "price" => $this->input->post('price'));

                $tre = $this->books->update_books_data($data, $this->input->post('book_id'));
// echo $tre;die;
                if ($tre == true) {
// echo $this->session->userdata('validated');die;
                    header('location: viewbooks');
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
            header('location: viewbooks');
        }
//$this->load->view('admin_dashboard');
    }

    public function addbooks() {

        $this->load->helper("form");

        $this->load->library("form_validation");

// $this->form_validation->set_rules("book_id", "Book Id", "required");
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
                $this->layout->view("admin_books_add");
            } else {
                $bookid = $_POST["book_id"];
                $booktitle = $_POST["book_title"];
                $author = $_POST["author"];
                $publications = $_POST["publications"];
                $edition = $_POST["edition"];
                $isbn = $_POST["isbn"];
                $price = $_POST["price"];
                $data = array("book_id" => $bookid,
                    "book_title" => $booktitle,
                    "author" => $author,
                    "publications" => $publications,
                    "edition" => $edition,
                    "isbn" => $isbn,
                    "price" => $price);
                $this->load->model("books");
                $ret = $this->books->insert_books($data);
                if ($ret == true) {
                    header('location: viewbooks');
                }
//  $this->load->view("demo_success");
            }
        }
    }

    public function viewbooks() {

// $this->output->enable_profiler(TRUE);


        $this->load->model("books");

        $data["userdata"] = $this->books->books_data();
//     $this->load->library('auth');
// if ($this->auth->acl($value)) {

        $this->layout->view("view_books", $data);
    }

    public function assign_books() {

        if ($this->session->userdata('role_id') == 2) {
            $bookid = $this->input->get('book_id');
            $this->load->model(array("assignbook_model", "assignuser_model"));
//$this->load->helper("form");
            if (!empty($bookid)) {
                $data["bookdata"] = $this->assignbook_model->get_book_by_id($bookid);
//print_r($data);die;
//  $this->load->model("assignuser_model");
                $data["userdata"] = $this->assignuser_model->assignuser_data();


                $this->layout->view('assign_books', $data);
            } else {
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $bookid = $_POST["book_id"];
                    $empid = $_POST["emp_id"];
                    $data = array("book_id" => $bookid,
                        "emp_id" => $empid);
                    $this->load->model("assignbook_model");

                    $ret = $this->assignbook_model->assignedbook_records($data);

                    if ($ret == true) {
                        header('location: viewbooks');
                    }
                }
            }
        }
    }

    public function return_book() {


        $bookid = $this->input->get('book_id');
        $this->load->model("assignbook_model");

        if (!empty($bookid)) {


            $ret = $this->assignbook_model->return_book($bookid);
            if ($ret == true) {
                header('location: viewbooks');
            }
        }
    }

    public function assigned_user_records() {


        $empid = $this->input->get('emp_id');

        $this->load->model("user_records");
        if (!empty($empid)) {

            $data["record"] = $this->user_records->assignedbook($empid);


            $this->layout->view('view_user_records', $data);
        }
    }

    public function requested_user() {
        if ($this->session->userdata('validated') == true) {
            if ($this->session->userdata('role_id') == 2) {
                $emp_id = $this->input->get('emp_id');
                $this->load->model("assignuser_model");
                $data["requestdata"] = $this->assignuser_model->assignuser_data();
                $this->layout->view("view_books", $data);
            }
        } else {
            $this->load->helper("url");
            redirect('/login/login_form');
        }
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */