<?php
/**
* 
*/
class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url_helper');
    }

    public function index()
    {
    	$data['title'] = 'Administrator';

    	$this->load->view('includes/header',$data);
    	$this->load->view('admin/index',$data);
    	$this->load->view('includes/footer');
    }

    public function addMenu()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $data['title'] = 'Add Menu';

        $this->load->view('includes/header',$data);
        $this->load->view('admin/menu/add',$data);
        $this->load->view('includes/footer');
    }

}
?>