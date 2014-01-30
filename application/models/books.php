<?php

class books extends CI_Model {

    public function insert_books($data) {
        $this->load->database();
        $this->db->trans_start();
        //print_r($data);die;
        $this->db->insert("books", $data);
       
         //$rr = $this->input->post('book_id');
         
          //$this->output->enable_profiler(TRUE);
        // $this->db->query("INSERT into availability_of_books(book_id,availability) VALUES ($rr,'available')");
      
// $rr = $this->input->post('book_id');
        //$this->db->query("INSERT into user_roles(emp_id,role_id) VALUES ($rr,1)");
       $ret = $this->db->trans_complete();
                return $ret;
       
    }

    public function delete_books($bookid) {
        $this->load->database();
        //$this->db->delete($empid);
        $this->db->where('book_id', $bookid);
        $ret = $this->db->delete("books");
        return $ret;
    }

    public function get_bookdata_by_id($bookid) {
       // $q = array();
        if (!empty($bookid)) {
            $this->load->database();
            $Iid=$this->input->get('book_id');
             $sQry="select * from books where book_id = $Iid";
           $query = $this->db->query($sQry);
        }
        return array_shift($query->result_array());
    }

    public function update_books_data($data, $bookid) {
        // $s= array();
        if (!empty($bookid)) {
         
            $this->load->database();
            //$this->db->delete($empid);
            //$Iid = $this->input->post('book_id');
            
            //$sQry="UPDATE books SET book_title= ,available='2' where book_id= $Iid";
            $this->db->where('book_id', $this->input->post('book_id'));
           $tre = $this->db->update('books', $data);
           // echo("<pre>");
         // print_r($data);die;
                return $tre;

            //print_r($q);
            // $s= $this->db->get('users');
        }
        // return array_shift($s->result_array());
        //$this->db->update("users");
    }

    public function books_data($empid) {
        $this->load->database();
       
        //$query = $this->db->query("select  * from books");
       // $this->db->where('q.issue_date==q.lst_act');
        
      $query = $this->db->query("SELECT b.book_id,b.book_title,b.author,b.publications,
       b.edition,b.price,b.isbn,b.available,ubr.emp_id,MAX(ubr.date)as date,ubr.activity,
       u.firstname,u.lastname FROM `users_books_records` ubr
     INNER JOIN users u ON u.emp_id=ubr.emp_id
       RIGHT JOIN  books b ON b.`book_id`=ubr.`book_id`
       GROUP BY  b.book_id ");
         return $query->result_array();
        //echo "<pre>";print_r($query->result_array());die;
    }

}

?>
