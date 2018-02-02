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

    public function schedule()
    {
            $this->load->helper('form');
            $this->load->library('form_validation');
            $data['title'] = 'Schedule an appointment';

            $this->load->view('includes/header', $data);
            if($this->session->userdata('role') == 'teacher')
            {
                $this->load->view('teacher/navbar', $data);        
            }
            $this->load->view('/admin/scheduler/add', $data);
            $this->load->view('includes/footer');
    }

    public function scheduleAppointment()
    {
        $this->load->helper('form');
        $this->load->model('admin/admin_model');

        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('date_of_appointment', 'Date', 'required');
        $this->form_validation->set_rules('time_of_appointment', 'Time', 'required');


        if ($this->form_validation->run() === FALSE)
        {
            /*$this->load->view('includes/header', $data);
            $this->load->view('books/add');
            $this->load->view('includes/footer');*/
            // $this->load->view('books/failed');
            $data['message'] = 'Error. Please try again.';
            $this->load->view('messages/failed',$data);

        }
        else
        {

            $this->admin_model->addSchedule();
            $data['message'] = 'Your response has been recorded. We will back to you soon';
            $this->load->view('messages/success',$data);
        }
    }
}
?>