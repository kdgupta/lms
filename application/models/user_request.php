<?php

class user_request extends CI_Model {
   public function user_req_data($bookid){
       
         $this->load->database();
         $empid = $this->session->userdata("emp_id");
          $this->db->trans_start();
        $this->db->query("INSERT INTO user_req (emp_id,status,book_id,lg_user_id) 
            VALUES($empid,'2',$bookid,$empid)");
               $query = $this->db->trans_complete();
        return $query;
   }
     public function fetch_req_data($bookid){
         $this->load->database();
         $empid = $this->session->userdata("emp_id");
        $query = $this->db->query("select *from user_req where book_id=$book_id");
         print_r($query->result_array()); die;
     }
}
?>
