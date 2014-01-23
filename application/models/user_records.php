<?php

class user_records extends CI_Model {

  /*  public function get_user_record_by_id($empid) {
        if (!empty($empid)) {
            $this->load->database();

            //$this->db->where('book_id', $this->input->get('book_id'));
           // $iId = $this->input->get('emp_id');
            $sQry = "select * from users where emp_id= $empid";
            $query = $this->db->query($sQry);
        }
        return array_shift($query->result_array());
    }*/

    public function assignedbook($empid) {
         $this->load->database();
        //$query = $this->db->query("select  * from books");
         $query = $this->db->query("select p.emp_id, p.firstname, p.lastname,
             r.book_id,r.book_title,r.author,r.publications,r.edition,r.isbn,
             r.price,q.issue_date,q.return_date
             from users as p
             join 
            users_books_records as q on p.emp_id = q.emp_id join books as r on q.book_id
            =  r.book_id where q.emp_id= $empid ");
        return $query->result_array();
    }

   /* public function get_book_record_by_id($bookid,$empid) {
       
            $this->load->database();
             if (!empty($empid)) {
          $iId = $this->input->get('book_id');
            //$this->db->where('book_id', $this->input->get('book_id'));
            //$iId = $this->input->get('book_id');
            $sQry = "select * from books where book_id= $iId";
            $query1 = $this->db->query($sQry);
             print_r("kkkkkk");
        }
       die;
        return array_shift($query1->result_array());
    }*/

}

?>
