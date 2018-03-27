<?php
class Admin_Model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function get($slug = FALSE)
	{
        if ($slug === FALSE)
        {
                $query = $this->db->get('books');
                return $query->result_array();
        }

        $query = $this->db->get('books', array('slug' => $slug));
        return $query->row_array();
	}


    public function addSchedule()
    {
        $timestamp = $this->input->post('date_of_appointment').' '.$this->input->post('time_of_appointment').':00';
        $data = array(
            'name' => $this->input->post('name'),
            'date_time' => $timestamp,
            'email' => $this->input->post('email'),
            'queries' => $this->input->post('queries')
        );

        return $this->db->insert('appointment_scheduler', $data);
    }
}
?>