<?php

class books extends CI_Model {

    public function insert_books($data) {
        $this->load->database();
        $this->db->trans_start();
        //print_r($data);die;
        $this->db->insert("books", $data);
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

        //$q = array();
        if (!empty($bookid)) {
            $this->load->database();


           // $Iid = $this->input->get('book_id');
            $sQry = "select book_id,UPPER(book_title) as book_title,UPPER(author)as author,
           publications,edition,price,isbn,available  from books where book_id = $bookid";

            $query = $this->db->query($sQry);
        }
        return array_shift($query->result_array());
    }

    public function update_books_data($data, $bookid) {
        // $s= array();
        if (!empty($bookid)) {

            $this->load->database();


            //$sQry="UPDATE books SET book_title= ,available='2' where book_id= $Iid";
            $this->db->where('book_id', $this->input->post('book_id'));
            $tre = $this->db->update('books', $data);
            return $tre;
        }
    }

    public function books_data($empid) {
         if ($_SERVER['REQUEST_METHOD'] === 'POST'){
              $this->load->database();
             $query = $this->db->query(" SELECT ubr.*, b.book_id ,UPPER(book_title) as book_title,
          UPPER(author) as author,publications,edition, price ,
           isbn ,available,u.firstname,u.lastname,r.status FROM
          (SELECT MAX(date) AS date ,emp_id FROM users_books_records
        GROUP BY book_id) a  JOIN users_books_records ubr ON ubr.date=a.date
        JOIN users u ON u.emp_id=ubr.emp_id
        right JOIN books b ON b.book_id=ubr.book_id left JOIN user_req AS r 
        ON r.book_id=b.book_id  GROUP BY b.book_id ORDER BY book_title ASC" );
        setcookie("flg", "0");
        return $query->result_array();
        }
        if($_SERVER['REQUEST_METHOD'] === 'GET'){
        $this->load->database();
        $this->load->helper('cookie');  
        switch($_GET['ch']){
         case 'b':
                if($_COOKIE["flg"]=="0"){
                    $sort="ORDER BY book_title DESC";
                  setcookie("flg", "1");
                    break;
                }
                if($_COOKIE["flg"]=="1"){
                    $sort="ORDER BY book_title ASC";
                   setcookie("flg", "0");
                    break;
                }
          break;
         case 'a':
                 if($_COOKIE["flg"]=="0"){
               
                    $sort="ORDER BY author DESC";
                    setcookie("flg", "1");
                    break;
                   }
                if($_COOKIE["flg"]=="1"){ 
                     $sort="ORDER BY author ASC";
                     setcookie("flg", "0");
                    break;
                }
           break;
           default:
                $sort="ORDER BY book_title ASC";
              setcookie("flg", "0");
           break;
        }

        //$query = $this->db->query("select  * from books");
          $query = $this->db->query(" SELECT ubr.*, b.book_id ,UPPER(book_title) as book_title,
          UPPER(author) as author,UPPER(publications)as publications,edition, price ,
           isbn ,available,UPPER(u.firstname)AS firstname,UPPER(u.lastname)as lastname,r.status FROM
          (SELECT MAX(date) AS date ,emp_id FROM users_books_records
        GROUP BY book_id) a  JOIN users_books_records ubr ON ubr.date=a.date
        JOIN users u ON u.emp_id=ubr.emp_id
        right JOIN books b ON b.book_id=ubr.book_id left JOIN user_req AS r
        ON r.book_id=b.book_id  GROUP BY b.book_id " . $sort);

        return $query->result_array();
    }
    }


    public function user_books_data() {

        $this->load->database();
        $empid = $this->session->userdata('emp_id');
        $query = $this->db->query("SELECT DISTINCT b.book_id, UPPER(b.book_title) as book_title, 
            UPPER(b.author) as author, b.publications, b.edition, b.isbn, b.price, b.available, 
            r.emp_id, r.status, r.lg_user_id
         FROM (SELECT emp_id FROM user_req WHERE emp_id=$empid) AS a
         LEFT JOIN user_req AS r ON a.emp_id=r.emp_id RIGHT JOIN books as b on 
         b.book_id = r.book_id
         WHERE b.available='1' or r.status='3' or r.status='4' ORDER BY book_title ASC");
        return $query->result_array();
    }

    public function user_assigned_book() {

        $this->load->database();

        //$query = $this->db->query("select  * from books");
        $query = $this->db->query(" SELECT ubr.*, b.book_id,UPPER(b.book_title) as book_title ,
            UPPER(b.author) as author,b.publications,b.editon,b.isbn,b.price,b.available,
            UPPER(u.firstname) as firstname,
            UPPER(u.lastname) as lastname FROM
          (SELECT MAX(date) AS date ,emp_id FROM users_books_records
        GROUP BY book_id) a  JOIN users_books_records ubr ON ubr.date=a.date
        JOIN users u ON u.emp_id=ubr.emp_id
        right JOIN books b ON b.book_id=ubr.book_id ");
        return $query->result_array();
    }

    public function user_requested_book($book_id) {

        $this->load->database();
        // echo $book_id;die;
        $emp_id = $this->session->userdata('emp_id');
        //$lg_user_id=$this->session->userdata('emp_id');
        $this->db->trans_start();
        $query = $this->db->query("INSERT INTO user_req(emp_id,status,book_id,
           lg_user_id) VALUES($emp_id,'2',$book_id,$emp_id)");



        // $this->db->insert("user_req", $data);
        $ret = $this->db->trans_complete();
        return $ret;
    }

}

?>
