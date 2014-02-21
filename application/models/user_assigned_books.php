<?php

class user_assigned_books extends CI_Model {
   
    public function assignedbook() {
        $this->load->database();
        //$query = $this->db->query("select  * from books");
        $email = $this->session->userdata('email');
         $query = $this->db->query(" SELECT UPPER(ubr.*),UPPER( b.*) ,UPPER( u.firstname),UPPER(u.lastname) FROM
          (SELECT MAX(date) AS date ,emp_id FROM users_books_records
        GROUP BY book_id) a  JOIN users_books_records ubr ON ubr.date=a.date
        JOIN users u ON u.emp_id=ubr.emp_id
        right JOIN books b ON b.book_id=ubr.book_id ");
        return $query->result_array();   
    }

}

?>
