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
        $this->db->where('email', $this->input->post('email'));
        $this->db->where('password', $data['password']);
        $this->db->where('is_active', 1);
        $query = $this->db->get("users");

//        $query = $this->db->query("select  p.emp_id,p.firstname, p.lastname, 
//            p.email,q.role_name,q.role_id from users as p
//             join 
//            user_roles as r on p.emp_id = r.emp_id  join roles as q on r.role_id
//            =  q.role_id where email='$email' and is_active='1' and password='$pwd' ");
        //  $this->output->enable_profiler(TRUE);

        if ($query->num_rows == 1) {
            $row = $query->row();

            // echo "vdfvkdfv";die; 
            return $row->emp_id;
        } else {
            return false;
        }
    }

//            echo 'ffjsdf';
//           die;
    // If
    public function set_user_info($emp_id) {
        //echo $tre;die;
        $this->load->database();
        //    $emp_id = $tre;
        //   $pwd = $data['password'];
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
            =  q.role_id where p.emp_id='$emp_id' and is_active='1' ");
        //  $this->output->enable_profiler(TRUE);

        if ($query->num_rows == 1) {

            //echo $tre;
            //  die;
            $row = $query->row();
            $user_info = array(
                'emp_id' => $row->emp_id,
                'email' => $row->email,
                'firstname' => $row->firstname,
                'lastname' => $row->lastname,
                'role_name' => $row->role_name,
                'role_id' => $row->role_id,
                'validated' => true
            );
            $this->session->set_userdata($user_info);
            // there is a user, then create session data
            // echo "kasdkd";die;
            return $user_info;
        }
    }

    public function set_user_action($role_name) {
        $user_action = array();
        foreach ($this->config->config['permission'][$this->session->userdata('role_name')] as $value) {
            foreach ($value as $value1) {

                $user_action[] = $value1;
                //   $this->session->set_userdata($user_action);
                //   $this->session->set_userdata($value);
            }
        }
       $this->session->set_userdata($user_action); 
       return $user_action;
    }

    public function logout() {
        $lout = $this->session->sess_destroy();
        return $lout;
    }

}

?>
