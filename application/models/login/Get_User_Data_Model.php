<?php

/**
* 
*/
class Get_User_Data_Model extends CI_Model
{
	
	public function __construct()
	{
		$this->load->database();
	}

	public function get($filter = FALSE)
	{
		if($filter === FALSE)
		{
			$query = $this->db->get('users');
			return $query->result_array();
		}
		$query = $this->db->get('users',array('email'=>$filter));
		return $query->result_array();
	}
}
?>