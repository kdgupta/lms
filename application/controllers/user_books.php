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

    public function viewbooks() {

        $this->load->model("books");
        $data["userdata"] = $this->books->user_books_data();


        $this->layout->view("user_view_books", $data);
    }

    public function assigned_books() {

  $empid = $this->input->get('emp_id');

        $this->load->model("user_records");
        if (!empty($empid)) {

            $data["record"] = $this->user_records->assignedbook($empid);


            $this->layout->view('view_user_assigned_books', $data);
        }

}
}
?>
