<?php
class Books_Model extends CI_Model
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


    public function add_books()
    {
        $this->load->helper('url');

        $slug = url_title($this->input->post('title'), 'dash', TRUE);

        $data = array(
            'name' => $this->input->post('name'),
            'url' => $this->input->post('url'),
            'subject' => $this->input->post('subject'),
            'author' => $this->input->post('author')
        );

        return $this->db->insert('books', $data);
    }
}
?>