<?php

/**
* 
*/
class Login extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
        $this->load->model('login/get_user_data_model');
		$this->load->library('session');
        $this->load->helper('url_helper');
        $this->load->helper('form');
	    $this->load->library('form_validation');
	}
	
	public function index($page = '')
	{
		if($this->session->userdata('role') == null)
		{
			if(empty($page) || $page == 'index')
			{
				$page = 'index';
				$title = 'Login';
			}
	        if ( ! file_exists(APPPATH.'views/login/'.$page.'.php'))
	        {
	                // Whoops, we don't have a page for that!
	                show_404();
	        }

	        $data['title'] = ucwords($title);

		    $this->form_validation->set_rules('username', 'Username', 'required');
		    $this->form_validation->set_rules('password', 'Password', 'required');

			$data['verified'] = TRUE;
		    if ($this->form_validation->run() == FALSE)
		    {
		        $this->load->view('includes/header', $data);
		        $this->load->view('login/'.$page, $data);
		        $this->load->view('includes/footer', $data);

		    }
		    else
		    {
		        $data['users'] = $this->get_user_data_model->get();
		        $this->load->view('login/process_login', $data);
		    }			
		}
		else
		{
			$role = $this->session->userdata('role');
			switch ($role) {
				case 'teacher':
					header("Location: /index.php/teacher/");
					break;				
				default:
					header("Location: /");
					break;
			}
		}
	}

	public function logout()
	{
		$this->load->view('logout/logout');
	}
}
?>