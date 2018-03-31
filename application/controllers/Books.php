<?php
class Books extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('books/books_model');
        $this->load->library('session');
        $this->load->helper('url_helper');
    }

    public function index($book_reference = '')
    {
        if($book_reference != null || $book_reference != '')
        {
            echo $book_reference;
        }

        $data['books'] = $this->books_model->get();

        $data['title'] = 'Books';
        $this->load->view('includes/header', $data);
        if($this->session->userdata('role') == 'teacher')
        {
            $this->load->view('teacher/navbar', $data);        
        }
        $this->load->view('books/index', $data);
        $this->load->view('includes/footer');
    }

    public function book($id)
    {
        $getTitle = $this->books_model->getWhere('id', $id);
        $data['title'] = $getTitle['name'];
        $data['book'] = $this->books_model->getWhere('id', $id);

        $this->load->view('includes/header', $data);
        if($this->session->userdata('role') == 'teacher')
        {
            $this->load->view('teacher/navbar', $data);        
        }
        $this->load->view('books/book', $data);
        $this->load->view('includes/footer'); 
    }
}