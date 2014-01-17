<?php

class books extends CI_Model {

    public function insert_books($data) {
        $this->load->database();
        $this->db->trans_start();
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
        $q = array();
        if (!empty($bookid)) {
            $this->load->database();

            $this->db->where('book_id', $bookid);
            $q = $this->db->get('books');
        }
        return array_shift($q->result_array());
    }

    public function update_books_data($data, $bookid) {
        // $s= array();
        if (!empty($bookid)) {

            $this->load->database();
            //$this->db->delete($empid);
            $this->db->where('book_id', $this->input->post('book_id'));
           $tre = $this->db->update('books', $data);
                return $tre;

            //print_r($q);
            // $s= $this->db->get('users');
        }
        // return array_shift($s->result_array());
        //$this->db->update("users");
    }

    public function books_data() {
        $this->load->database();
        $query = $this->db->query("select  * from books");
        
        return $query->result_array();
    }

}

?>
