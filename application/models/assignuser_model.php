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

        $query = $this->db->query("select p.emp_id,p.firstname,p.lastname, p.is_active,max(q.date) from users as p
                   inner join users_books_records as q on q.emp_id=p.emp_id ");


// print_r($query);die;

        return $query->result_array();
    }

}
?>
