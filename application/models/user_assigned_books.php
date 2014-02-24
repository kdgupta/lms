<?php

class user_assigned_books extends CI_Model {
   
    public function assignedbook() {
        $this->load->database();
        //$query = $this->db->query("select  * from books");
        $email = $this->session->userdata('email');
         $query = $this->db->query(" SELECT ubr.*, b.book_id ,UPPER(b.book_title)as book_title,
             UPPER(b.author) as author,b.publications,b.edition,b.isbn,b.price,b.available,u.firstname,u.lastname FROM
          (SELECT MAX(date) AS date ,emp_id FROM users_books_records
        GROUP BY book_id) a  JOIN users_books_records ubr ON ubr.date=a.date
        JOIN users u ON u.emp_id=ubr.emp_id
        right JOIN books b ON b.book_id=ubr.book_id ");
        return $query->result_array();   
    }
    
    public function notification(){
        $this->load->database();
        $query=$this->db->query("SELECT DISTINCT u.email,b.book_title,b.author,b.publications,b.edition,b.isbn,
            DATEDIFF('2014-02-28 00:00:00',r.timestamp)as day FROM  books AS b 
JOIN users_books_records AS ubr ON ubr.book_id=b.book_id
JOIN user_req AS ur ON ur.book_id=ubr.book_id
JOIN req_log AS r ON r.req_id=ur.id
JOIN users AS u ON u.emp_id=ur.emp_id
WHERE ubr.activity ='1' AND b.available='2' AND r.status='3' ");
       return $query->result_array();
        
    }

}

?>
