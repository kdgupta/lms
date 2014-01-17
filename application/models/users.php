<?php

class users extends CI_Model {

    public function insert_users($data) {
        $this->load->database();
        $this->db->trans_start();
        $this->db->insert("users", $data);
        $rr = $this->input->post('emp_id');
        $this->db->query("INSERT into user_roles(emp_id,role_id) VALUES ($rr,1)");
       $ret = $this->db->trans_complete();
                return $ret;
       
    }

    public function delete_users($empid) {
        $this->load->database();
        //$this->db->delete($empid);
        $this->db->where('emp_id', $empid);
        $ret = $this->db->delete("users");
        return $ret;
    }

    public function get_userdata_by_id($empid) {
        $q = array();
        if (!empty($empid)) {
            $this->load->database();

            $this->db->where('emp_id', $empid);
            $q = $this->db->get('users');
        }
        return array_shift($q->result_array());
    }

    public function update_users_data($data, $empid) {
        // $s= array();
        if (!empty($empid)) {

            $this->load->database();
            //$this->db->delete($empid);
            $this->db->where('emp_id', $this->input->post('emp_id'));
           $tre = $this->db->update('users', $data);
                return $tre;

            //print_r($q);
            // $s= $this->db->get('users');
        }
        // return array_shift($s->result_array());
        //$this->db->update("users");
    }

    public function users_data() {
        $this->load->database();
        $query = $this->db->query("select p.emp_id, p.firstname, p.lastname, 
            p.email, p.designation, p.is_active, q.role_name from users as p
             join 
            user_roles as r on p.emp_id = r.emp_id  join roles as q on r.role_id
            =  q.role_id");
        
        return $query->result_array();
    }

}

?>
