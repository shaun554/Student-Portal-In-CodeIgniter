<?php

class Students_Model extends CI_Model
{
	
	public function __construct()
    {
        $this->load->database();
    }

    public function get()
	{
        $query = $this->db->get('users');
        return $query->result_array();
	}

	public function getWhere($key,$value)
    {
        $this->db->where($key, $value, TRUE);
        $query = $this->db->get('users');
        return $query->result_array();
    }
}
?>