<?php

class user_records extends CI_Model {
    /*  public function get_user_record_by_id($empid) {
      if (!empty($empid)) {
      $this->load->database();

      //$this->db->where('book_id', $this->input->get('book_id'));
      // $iId = $this->input->get('emp_id');
      $sQry = "select * from users where emp_id= $empid";
      $query = $this->db->query($sQry);
      }
      return array_shift($query->result_array());
      } */

    public function assignedbook($empid) {
         
        $this->load->database();
        switch($_GET['ch']){
            case 'd':
                if($_COOKIE["flg2"]=="0"){
                    $sort="ORDER BY date DESC";
                  setcookie("flg2", "1");
                    break;
                }
                 if($_COOKIE["flg2"]=="1"){
                    $sort="ORDER BY date ASC";
                  setcookie("flg2", "0");
                    break;
                 }
                 break;
            default:
                    $sort="ORDER BY date ASC";
                  setcookie("flg2", "0");
                    break;
        }
        //$query = $this->db->query("select  * from books");
        $query = $this->db->query("select p.emp_id, UPPER(p.firstname) as firstname,
            UPPER(p.lastname) as lastname,
             r.book_id,UPPER(r.book_title) as book_title,UPPER(r.author) as author,
             r.publications,r.edition,r.isbn,
             r.price,r.available,q.date,q.activity
             from users as p
             join 
            users_books_records as q on p.emp_id = q.emp_id join books as r on q.book_id
            =  r.book_id where q.emp_id= $empid " .$sort);
        setcookie("flg", "0");

        return $query->result_array();
    }
     

    /* public function get_book_record_by_id($bookid,$empid) {

      $this->load->database();
      if (!empty($empid)) {
      $iId = $this->input->get('book_id');
      //$this->db->where('book_id', $this->input->get('book_id'));
      //$iId = $this->input->get('book_id');
      $sQry = "select * from books where book_id= $iId";
      $query1 = $this->db->query($sQry);
      print_r("kkkkkk");
      }
      die;
      return array_shift($query1->result_array());
      } */
}


?>
