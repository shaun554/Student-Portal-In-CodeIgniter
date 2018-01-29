<?php

/**
* 
*/
class Teacher extends CI_Controller 
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
	}

	public function index()
	{
		if($this->session->userdata('role') == 'teacher')
		{
			$data['success'] = "Welcome home";
			$this->load->view('includes/header',$data);
			$this->load->view('teacher/index',$data);
			$this->load->view('includes/footer');			
		}
		else
		{
			echo "Please login to view this page";
		}
	}

	public function add()
    {
        if($this->session->userdata('role') == 'teacher')
        {
        	$this->load->model('books/books_model');
            $this->load->helper('form');
            $this->load->library('form_validation');
            $data['title'] = 'Add book';

            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('subject', 'Subject', 'required');
            $this->form_validation->set_rules('author', 'Author', 'required');
            $this->form_validation->set_rules('url', 'URL', 'required');

            if ($this->form_validation->run() === FALSE)
            {
                /*$this->load->view('includes/header', $data);
                $this->load->view('books/add');
                $this->load->view('includes/footer');*/
                // $this->load->view('books/failed');

            }
            else
            {

                $this->books_model->add_books();
                $data['message'] = $this->input->post('name').' added';
                $this->load->view('messages/success',$data);
            }

            $data['books'] = $this->books_model->get();

            $this->load->view('includes/header', $data);
            if($this->session->userdata('role') == 'teacher')
            {
                $this->load->view('teacher/navbar', $data);        
            }
            $this->load->view('/teacher/books/add', $data);
            $this->load->view('includes/footer');
        }
        else
        {
            echo "please login to continue";
        }
    }
}
?>