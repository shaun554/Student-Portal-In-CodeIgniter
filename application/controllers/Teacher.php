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
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $data['title'] = 'Add book';

            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('subject', 'Subject', 'required');
            $this->form_validation->set_rules('author', 'Author', 'required');
            $this->form_validation->set_rules('url', 'URL', 'required');

            $data['verified'] = TRUE;
            if($this->input->post('submit') != null)
            {
                $data['information'] = $this->books_model->getWhere('name',$this->input->post('name'));
                if(sizeof($data['information']) == 0)
                {
                    if ($this->form_validation->run() == FALSE)
                    {
                        $data['verified'] = FALSE;
                    }   
                    else
                    {
                        $data['verified'] = TRUE;
                        $this->books_model->add_books();
                    }
                }
                else
                {
                    $data['verified'] = FALSE;
                }
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

    function editBook($id)
    {
        if(!empty($id))
        {
            $this->load->model('books/books_model');
            $this->load->library('form_validation');

            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('subject', 'Subject', 'required');
            $this->form_validation->set_rules('author', 'Author', 'required');
            $this->form_validation->set_rules('url', 'URL', 'required');
            
            if($this->input->post('submit') != null)
            {
                if ($this->form_validation->run() == FALSE)
                {
                    $data['verified'] = FALSE;
                }   
                else
                {
                    $data['verified'] = TRUE;
                    $this->books_model->updateBooks();
                }
            }

            $data['title'] = 'Edit book';
            $data['information'] = $this->books_model->getWhere('id',$id);

            $this->load->view('includes/header');
            $this->load->view('/teacher/books/edit', $data);
            $this->load->view('includes/footer');
        }
        else
        {
            $this->load->view('includes/header');
            $data['message'] = "<div class='text-center'>Looks like you landed here by mistake.<br/>Lets go <a href='/'>home&nbsp;<i class='fa fa-home'></i></a></div>";
            $this->load->view('messages/warning',$data);   
            $this->load->view('includes/footer');
        }
    }
}
?>