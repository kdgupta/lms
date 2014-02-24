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
    }

    public function view_user_books() {
        $empid = $this->session->userdata('emp_id');
        $this->load->model("books");
        $data["userdata"] = $this->books->user_books_data($empid);
        $this->layout->view("user_view_books", $data);

//        $bookid = $this->input->get('book_id');
//          $data1 = array( "emp_id"=>$this->session->userdata('emp_id'),
//                           "status"=>1,            
//                         "book_id" => $bookid,
//                          "lg_user_id"=>$this->session->userdata('emp_id'),
//                      );
//           $this->load->model("books");
//        $this->books->user_requested_book($data1);
    }

    public function assigned_books() {

        $empid = $this->input->get('emp_id');

        $this->load->model("user_records");
        if (!empty($empid)) {

            $data["record"] = $this->user_records->assignedbook($empid);


            $this->layout->view('user_view_assigned_books', $data);
        }
    }

    public function request() {

        $bookid = $_GET['book_id'];

        if (!empty($bookid)) {

            // $this->load->model("books");
            // $bookid = $this->input->get('book_id');
            // $r=$this->session->userdata('emp_id');
            // echo "hjg";die;
//          $data = array( "emp_id"=>$this->session->userdata('emp_id'),
//                           "status"=>1,            
//                         "book_id" => $bookid,
//                          "lg_user_id"=>$this->session->userdata('emp_id'),
//                      );
            $this->load->model("user_request");
            $ret = $this->user_request->user_req_data($bookid);
            $data = $this->user_request->fetch_req_data($bookid);

            $this->user_request->req_log($data);
            if ($ret == true) {

                header('location: view_user_books');
            }
        }
    }

    public function cancel_request() {

        $bookid = $_GET['book_id'];

        if (!empty($bookid)) {
            $this->load->model("user_request");

            $ret = $this->user_request->delete_req_data($bookid);
            if ($ret == true) {
                header('location: view_user_books');
            }
        }
    }

}

?>
