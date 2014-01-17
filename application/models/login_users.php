<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.

 * 
 */

class login_users extends CI_Model {

    public function authenticate($data) {
       
       $this->load->database();
        $this->db->where('email', $this->input->post('email'));
        $this->db->where('password', $data['password']);
        $this->db->where('is_active', 1);
        $query = $this->db->get("users");
        if ($query->num_rows == 1) {
            // If there is a user, then create session data
            return true;
        }
       else{
        return false;
       }
    }

}

?>
