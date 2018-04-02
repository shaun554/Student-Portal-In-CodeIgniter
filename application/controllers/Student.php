<?php
class Student extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('student/students_model');
        $this->load->library('session');
        $this->load->helper('url_helper');
	}

	public function index()
	{
		
	}
}
?>