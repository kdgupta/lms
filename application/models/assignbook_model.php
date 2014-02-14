<?php

class assignbook_model extends CI_Model {

    public function get_book_by_id($bookid) {
        if (!empty($bookid)) {
            $this->load->database();

//$this->db->where('book_id', $this->input->get('book_id'));

            $sQry = "select * from books where book_id= $bookid";
            $query = $this->db->query($sQry);
        }
        return array_shift($query->result_array());
    }

    public function assignedbook_records($data) {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->load->database();

            $rr = $this->input->post('emp_id');
            $rt = $this->input->post('book_id');
            $this->db->trans_start();
// $this->db->where('emp_id', $data['emp_id']);
            $this->db->query("INSERT INTO users_books_records(emp_id,book_id,date,activity)
               VALUES($rr,$rt,now(),'1')");
            $this->db->query("UPDATE books SET available='2' where book_id= $rt ");
            $this->db->query("UPDATE user_req SET status='3' where book_id= $rt and emp_id=$rr ");

            $this->db->query("UPDATE user_req SET status='4' where book_id = $rt and emp_id !=$rr ");
            $ret = $this->db->trans_complete();
            return $ret;
        } else {
            $this->load->database();
            $bookid = $data['bookdata']['book_id'];
            $empid = $data['userdata'][0]['emp_id'];
              $this->db->trans_start();
            $this->db->query("INSERT INTO users_books_records(emp_id,book_id,date,activity)
               VALUES($empid,$bookid,now(),'1')");
            $this->db->query("UPDATE books SET available='2' where book_id= $bookid ");
            $this->db->query("UPDATE user_req SET status='3' where book_id= $bookid and emp_id=$empid ");
            $this->db->query("UPDATE user_req SET status='4' where book_id = $bookid and emp_id !=$empid ");
             $ret = $this->db->trans_complete();
            return $ret;
            }
    }

    public function return_book($empid) {
        $this->load->database();

//$rr = $data['emp_id'];
        $rt = $this->input->get('book_id');
        $this->db->trans_start();
// $this->db->where('emp_id', $data['emp_id']);
        $this->db->query("INSERT INTO users_books_records(emp_id,book_id,date,activity)
               VALUES($empid,$rt,now(),'2')");

        $this->db->query("UPDATE books SET available='1' where book_id= $rt ");
        // $this->db->query("UPDATE user_req SET status='1' where book_id= $rt ");
        //$this->db->query("DELETE  FROM user_req where book_id= $rt ");

        $ret = $this->db->trans_complete();
        return $ret;
    }

}

?>
