<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.

 * 
 */

class login_users extends CI_Model {

    public function authenticate($data) {

        $this->load->database();
        $email = $data['email'];
        $pwd = $data['password'];
        // echo $email;
        //die; 
        // $this->db->where('email', $this->input->post('email'));
        // $this->db->where('password', $data['password']);
        // $this->db->where('is_active', 1);
        // $query = $this->db->get("users");

        $query = $this->db->query("select  p.emp_id,p.firstname, p.lastname, 
            p.email,q.role_name,q.role_id from users as p
             join 
            user_roles as r on p.emp_id = r.emp_id  join roles as q on r.role_id
            =  q.role_id where email='$email' and is_active='1' and password='$pwd' ");
        //  $this->output->enable_profiler(TRUE);

        if ($query->num_rows == 1) {

            return true;
        } else {
            return false;
        }
    }

//            echo 'ffjsdf';
//           die;
    // If
    public function set_session($data) {
        $this->load->database();
        $email = $data['email'];
        $pwd = $data['password'];
        // echo $email;
        //die; 
        // $this->db->where('email', $this->input->post('email'));
        // $this->db->where('password', $data['password']);
        // $this->db->where('is_active', 1);
        // $query = $this->db->get("users");

        $query = $this->db->query("select  p.emp_id,p.firstname, p.lastname, 
            p.email,q.role_name,q.role_id from users as p
             join 
            user_roles as r on p.emp_id = r.emp_id  join roles as q on r.role_id
            =  q.role_id where email='$email' and is_active='1' and password='$pwd' ");
        //  $this->output->enable_profiler(TRUE);

        if ($query->num_rows == 1) {


            $row = $query->row();
            $data = array(
                'emp_id' => $row->emp_id,
                'email' => $row->email,
                'firstname' => $row->firstname,
                'lastname' => $row->lastname,
                'role_name' => $row->role_name,
                'role_id' => $row->role_id,
                'validated' => true
            );
            $this->session->set_userdata($data);
            // there is a user, then create session data

            return $data;
        }
    }

    public function logout() {
        $lout = $this->session->sess_destroy();
        return $lout;
    }

}

?>
