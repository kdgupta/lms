<?php

class user_request extends CI_Model {
   public function user_req_data($bookid){
       
         $this->load->database();
         $empid = $this->session->userdata("emp_id");
        $query = $this->db->query("INSERT INTO user_req (emp_id,status,book_id,lg_user_id) VALUES
            ($empid,'2',$bookid,$empid)");
        return $query;
   }
     public function fetch_req_data($book_id){
         $this->load->database();
         $empid = $this->session->userdata("emp_id");
         //echo $empid; die;
        $query = $this->db->query("SELECT DISTINCT r.*,u.firstname,u.lastname FROM
            user_req as r LEFT JOIN users as u on r.emp_id=u.emp_id WHERE 
            r.book_id= $book_id ORDER by r.timestamp");
            if ($query->num_rows == 0){
               echo "No Any Request"; die;
           }
      else{
      
         return $query->result_array();
     }
     }
     
      public function delete_req_data($bookid){
          $this->load->database();
        //  
          $empid = $this->session->userdata("emp_id");
          $query = $this->db->query("DELETE FROM user_req where book_id= $bookid
                  and emp_id=$empid");
            //echo $bookid; die;
          return $query;
                  
      }
       public function user_req_id($bookid){
           
           
       }
       public function admin_approve_req($empid){
            $this->load->database();
        // $empid = $this->session->userdata("emp_id");
          $this->db->trans_start();
        $this->db->query("UPDATE user_req SET status='3' where book_id= $bookid AND 
                emp_id=$empid");
        $this->db->query("UPDATE books SET available='2' where book_id= $bookid ");
        $ret = $this->db->trans_complete();
        return $ret;
           
       }
       public function admin_reject_req($bookid){
           
       }
}
?>
