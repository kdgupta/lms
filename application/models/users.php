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
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->load->database();
            $query = $this->db->query("select p.emp_id, UPPER(p.firstname) as firstname,
            UPPER(p.lastname) as lastname, 
            p.email, UPPER(p.designation) as designation, p.is_active, UPPER(q.role_name) as role_name,q.role_id from users as p
             join 
            user_roles as r on p.emp_id = r.emp_id  join roles as q on r.role_id
            = q.role_id ORDER BY firstname ASC");
            setcookie("flg", "0");
            return $query->result_array();
        }
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $this->load->database();
            $this->load->helper('cookie');
            switch ($_GET['ch']) {
                case 'f':
                    if ($_COOKIE["flg"] == "0") {
                        $sort = "ORDER BY firstname DESC";
                        setcookie("flg", "1");
                        break;
                    }
                    if ($_COOKIE["flg"] == "1") {
                        $sort = "ORDER BY firstname ASC";
                        setcookie("flg", "0");
                        break;
                    }
                    break;
                case 'l':
                    if ($_COOKIE["flg"] == "0") {

                        $sort = "ORDER BY lastname DESC";
                        setcookie("flg", "1");
                        break;
                    }
                    if ($_COOKIE["flg"] == "1") {
                        $sort = "ORDER BY lastname ASC";
                        setcookie("flg", "0");
                        break;
                    }
                    break;
                default:
                    $sort = "ORDER BY firstname ASC";
                    setcookie("flg", "0");
                    break;
            }

            $query = $this->db->query("select p.emp_id, UPPER(p.firstname) as firstname, 
             UPPER(p.lastname) as lastname, 
            p.email, UPPER(p.designation)as designation, p.is_active, UPPER(q.role_name) as role_name,q.role_id from users as p
             join 
            user_roles as r on p.emp_id = r.emp_id  join roles as q on r.role_id
            = q.role_id " . $sort);
            return $query->result_array();
        }
    }

    public function change_password($pass) {
        $empid = $this->session->userdata("emp_id");
        $this->load->database();
        $query = $this->db->query("UPDATE users SET password='$pass'  where emp_id=$empid");
        return $query;
    }

}

?>
