<?php

/**
* 
*/
class Register_Model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function add_user()
    {
        $this->load->helper('url');

        $slug = url_title($this->input->post('title'), 'dash', TRUE);

        $data = array(
            'name' => stripslashes(trim($this->input->post('name'))),
            'email' => stripslashes(trim($this->input->post('email'))),
            'password' => stripslashes(trim(sha1($this->input->post('password')))),
            'role' => 'teacher'
        );

        return $this->db->insert('users', $data);
    }
}
?>