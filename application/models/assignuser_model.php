<?php

class assignuser_model extends CI_Model {

    public function assignuser_data() {
        $this->load->database();
        //$this->db->where('is_active', );
        $query = $this->db->query("select emp_id,firstname,lastname, is_active from users");
        // print_r($query);die;

        return $query->result_array();
    }

}

?>
