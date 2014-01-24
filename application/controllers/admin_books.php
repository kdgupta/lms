    <?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
require_once 'app_controller.php';


class admin_books extends App_controller {
     function __construct() {
        parent::__construct();
        //$this->load->view('dashboard');
    }

    public function editbooks() {
        //$this->output->enable_profiler(TRUE);
        $bookid = $this->input->get('book_id');
        $this->load->model("books");
        $this->load->helper("form");
        if (!empty($bookid)) {
            $data["userdata"] = $this->books->get_bookdata_by_id($bookid);
            $this->layout->view('admin_books_edit', $data);
        } else {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                //  $this->output->enable_profiler(TRUE);
                //echo "<pre>";
               // print_r($this->input->post());
                //update code
                // $this->load->view('admin_user_edit');
                //$updateData=array("status"=>"Paid");
                // $this->db->where("emp_id",$empid);
                //$this->db->update("users");    
                // $this->load->helper("form");
                $data = array("book_id" => $this->input->post('book_id'),
                    "book_title" => $this->input->post('book_title'),
                    "author" => $this->input->post('author'),
                    "publications" => $this->input->post('publications'),
                    "edition" => $this->input->post('edition'),
                    "isbn" => $this->input->post('isbn'),
                    "price" => $this->input->post('price'));
                    
               $tre = $this->books->update_books_data($data, $this->input->post('book_id'));
                if($tre== true){
                     header('location: viewbooks');
                }
               
            }
        }


        // $this->load->view("update_view");
        // echo $data;
        //  die;
        //$this->load->library("form_validation");
    }

    public function deletebooks() {
        // $this->output->enable_profiler(TRUE);
        $bookid = $this->input->get('book_id');
        $this->load->model("books");
       $ret = $this->books->delete_books($bookid);
        if($ret== true){
            header('location: viewbooks');
        }
        //$this->load->view('admin_dashboard');
    }

    public function addbooks() {

        $this->load->helper("form");
        $this->load->library("form_validation");
       // $this->form_validation->set_rules("book_id", "Book Id", "required");
        $this->form_validation->set_rules("book_title", "Book Title", "required");
        $this->form_validation->set_rules("author", "Author Name", "required");
        $this->form_validation->set_rules("publications", "Publications", "required");
        $this->form_validation->set_rules("edition", "Edition", "required");
        $this->form_validation->set_rules("isbn", "Isbn Number", "required");
        $this->form_validation->set_rules("price", "Price", "required");

        if ($this->form_validation->run() == false) {
            $this->layout->view("admin_books_add");
        } else {
            $bookid = $_POST["book_id"];
            $booktitle= $_POST["book_title"];
            $author = $_POST["author"];
            $publications = $_POST["publications"];
            $edition = $_POST["edition"];
            $isbn = $_POST["isbn"];
            $price = $_POST["price"];
            $data = array("book_id" => $bookid,
                "book_title" => $booktitle,
                "author" => $author,
                "publications" => $publications,
                "edition" => $edition,
                "isbn" => $isbn,
                "price" => $price);
            $this->load->model("books");
         $ret =  $this->books->insert_books($data);
              if($ret== true){
                 header('location: viewbooks');
              }
            //  $this->load->view("demo_success");
        }
    }

    public function viewbooks() {
        // $this->output->enable_profiler(TRUE);

        $this->load->model("books");
        $data["userdata"] = $this->books->books_data();
       
        $this->layout->view("view_books", $data);

        //$this->load->view('admin_dashboard');
    }

//         public function index()
//	{
//             
//		$this->load->view('index.html');
//	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */