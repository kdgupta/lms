<?php

class assignuser_model extends CI_Model {

    public function assignuser_data() {
        $this->load->database();
        //$this->db->where('is_active', );

        $query = $this->db->query("select emp_id,firstname,lastname, is_active from users");


// print_r($query);die;

        return $query->result_array();
    }

    public function returnuser_data($book_id) {
        $this->load->database();
        //$this->db->where('is_active', );

        $query = $this->db->query("SELECT  u.emp_id,u.firstname,u.lastname,u.is_active FROM(SELECT MAX(rec_id) AS id ,emp_id FROM users_books_records
        group by book_id) a  JOIN users_books_records ubr ON ubr.rec_id=a.id
           JOIN users u ON u.emp_id=ubr.emp_id
          right JOIN books b ON b.book_id=ubr.book_id where ubr.book_id= $book_id");

//echo"<pre>";
 //print_r($query);die;

        return $query->result_array();
    }

}
?>
