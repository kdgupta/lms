<?php
class assignbook_model extends CI_Model {

    public function get_book_by_id($bookid) {
        if (!empty($bookid)) {
            $this->load->database();

            //$this->db->where('book_id', $this->input->get('book_id'));
            $iId = $this->input->get('book_id');
            $sQry = "select * from books where book_id= $iId";
           $query = $this->db->query($sQry);
        }
        return array_shift($query->result_array());
       
    }
    public function assignedbook_records($data){
         $this->load->database();
        
         $rr = $this->input->post('emp_id');
         $rt = $this->input->post('book_id');
          $this->db->trans_start();
         // $this->db->where('emp_id', $data['emp_id']);
           $this->db->query("INSERT INTO users_books_records(emp_id,book_id,issue_date)
               VALUES($rr,$rt,now())");
         $this->db->query("UPDATE books SET available='2' where book_id= $rt " );
        
               $ret = $this->db->trans_complete();
                return $ret;
           
           }
           public function return_book($bookid){
              $this->load->database();
               $rt = $this->input->get('book_id');
               $this->db->trans_start();
               $this->db->query("UPDATE users_books_records SET return_date= now() where book_id= $rt " );
           
                 $this->db->query("UPDATE books SET available='1' where book_id= $rt " );
        
               $ret = $this->db->trans_complete();
                return $ret;
           }
}
?>