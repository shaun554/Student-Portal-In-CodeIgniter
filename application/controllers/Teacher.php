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

            $data['verified'] = TRUE;
            if ($this->form_validation->run())
            {

                $this->books_model->add_books();
                $data['message'] = $this->input->post('name').' added';
                $this->load->view('messages/success',$data);
            }   
            else
            {
                $data['verified'] = FALSE;
                /*$data['message'] = $this->input->post('name').' not added. Please try again later.';
                $this->load->view('includes/header', $data);
                $this->load->view('messages/failed');
                $this->load->view('includes/footer');*/
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