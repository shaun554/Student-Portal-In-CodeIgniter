<?php
/**
* 
*/
class Register extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url_helper');
        $this->load->helper('form');
       	$this->load->library('form_validation');
    }

    public function index()
    {
    	$data['title'] = 'Register';
        $this->load->view('includes/header', $data);
        $this->load->view('register/index', $data);
        $this->load->view('includes/footer');
    }

    public function register()
    {
    	$this->load->model('register/register_model');
    	$this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() === FALSE)
        {
        	/*$data['title'] = 'Register';
            $this->load->view('includes/header', $data);
            $this->load->view('register/index');
            $this->load->view('includes/footer');*/
            $data['message'] = 'Registration not successful. Please try again.';
            $this->load->view('messages/failed',$data);

        }
        else
        {
            $this->register_model->add_user();
            $data['message'] = 'Registration successful';
            $this->load->view('messages/success',$data);
        }
    }
}
?>