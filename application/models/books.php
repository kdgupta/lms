<?php

class books extends CI_Model {

    public function insert_books($data) {
        $this->load->database();
        $this->db->trans_start();
        //print_r($data);die;
        $this->db->insert("books", $data);
        // $rr = $this->input->post('book_id');
        //$this->db->query("INSERT into user_roles(emp_id,role_id) VALUES ($rr,1)");
        $ret = $this->db->trans_complete();
        return $ret;
    }

    public function delete_books($bookid) {
        $this->load->database();
        //$this->db->delete($empid);
        $this->db->where('book_id', $bookid);
        $ret = $this->db->delete("books");
        return $ret;
    }

    public function get_bookdata_by_id($bookid) {

        //$q = array();
        if (!empty($bookid)) {
            $this->load->database();
            $Iid = $this->input->get('book_id');
            $sQry = "select * from books where book_id = $Iid";
            $query = $this->db->query($sQry);
        }
        return array_shift($query->result_array());
    }

    public function update_books_data($data, $bookid) {
        // $s= array();
        if (!empty($bookid)) {

            $this->load->database();


            //$sQry="UPDATE books SET book_title= ,available='2' where book_id= $Iid";
            $this->db->where('book_id', $this->input->post('book_id'));
            $tre = $this->db->update('books', $data);
            return $tre;
        }
    }

    public function books_data($empid) {
        $this->load->database();

        //$query = $this->db->query("select  * from books");
        $query = $this->db->query(" SELECT ubr.*, b.* , u.firstname,u.lastname FROM
          (SELECT MAX(date) AS date ,emp_id FROM users_books_records
        GROUP BY book_id) a  JOIN users_books_records ubr ON ubr.date=a.date
        JOIN users u ON u.emp_id=ubr.emp_id
        right JOIN books b ON b.book_id=ubr.book_id ");
        return $query->result_array();
    }

    public function user_books_data() {
        $this->load->database();
        //$query = $this->db->query("select  * from books");
        $query = $this->db->query("select * from books where available= '1'");
        return $query->result_array();
    }

    public function user_assigned_book() {
     
      $this->load->database();

        //$query = $this->db->query("select  * from books");
        $query = $this->db->query(" SELECT ubr.*, b.* , u.firstname,u.lastname FROM
          (SELECT MAX(date) AS date ,emp_id FROM users_books_records
        GROUP BY book_id) a  JOIN users_books_records ubr ON ubr.date=a.date
        JOIN users u ON u.emp_id=ubr.emp_id
        right JOIN books b ON b.book_id=ubr.book_id ");
        return $query->result_array();   
        
    }

}

?>
