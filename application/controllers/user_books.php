<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */



if (!defined('BASEPATH'))
    exit('No direct script access allowed');
require_once 'app_controller.php';

class user_books extends App_controller {

    function __construct() {
        parent::__construct();
        //$this->load->view('dashboard');
    }

    public function Viewbooks() {
        if ($this->session->userdata('validated') == true) {
            if ($this->session->userdata('role_id') == 1) {
                $this->load->model("books");
                $data["userdata"] = $this->books->user_books_data();
                $this->load->library('auth');
                $value = "User_books_viewbooks";
                if ($this->auth->user_acl($value)) {

                    $this->layout->view("user_view_books", $data);

//$this->load->view('admin_dashboard');
                } else {
                    $this->layout->view('not_view');
                }
            } else {
                $this->layout->view('not_view');
            }
        } else {
            $this->load->helper("url");
            redirect('/login/login_form');
        }
    }

    public function Assigned_books() {
        if ($this->session->userdata('validated') == true) {
            if ($this->session->userdata('role_id') == 1) {
                // $empid = $this->input->get('emp_id');
//$bookid = $this->input->get('book_id');
                $this->load->model("user_assigned_books");

//$data["userdata"] = $this->user_records->get_user_record_by_id($empid);
                $data["record"] = $this->user_assigned_books->assignedbook();
                $this->load->library('auth');
                $value = "User_books_viewbooks";
                if ($this->auth->user_acl($value)) {
// $bookid = $data['book_id'];
// $data["userdata"] = $this->assignuser_model->assignuser_data();
//$data["bookdata"] = $this->user_records->get_book_record_by_id($bookid,$empid); 
                    $this->layout->view('view_assigned_books', $data);
                } else {
                    $this->layout->view('not_view');
                }
            } else {
                $this->layout->view('not_view');
            }
        } else {
            $this->load->helper("url");
            redirect('/login/login_form');
        }
    }

}

?>
