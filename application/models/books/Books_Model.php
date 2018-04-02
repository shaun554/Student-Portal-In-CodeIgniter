<?php
class Books_Model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
        $this->load->model('login/get_user_data_model');
    }

    public function get()
	{
        $query = $this->db->get('books');
        return $query->result_array();
	}


    public function add_books()
    {
        $this->load->helper('url');

        $slug = url_title($this->input->post('title'), 'dash', TRUE);

        $username = $this->session->userdata('username');
        
        $getId = $this->get_user_data_model->getWhere('email', $username);

        $data = array(
            'name' => $this->input->post('name'),
            'url' => $this->input->post('url'),
            'subject' => $this->input->post('subject'),
            'author' => $this->input->post('author'),
            'added_by' => $getId['id'],
            'tag' => $this->input->post('tag')
        );

        return $this->db->insert('books', $data);
    }

    public function getWhere($key,$value)
    {
        $query = $this->db->get('users', array($key => $value));
        return $query->row_array();
    }

    public function updateBooks()
    {

        $username = $this->session->userdata('username');
        
        $getId = $this->get_user_data_model->getWhere('email', $username);

        $getBookId = $this->books_model->getWhere('name', $this->input->post('name'));

        $this->db->set('name', $this->input->post('name'));
        $this->db->set('url', $this->input->post('url'));
        $this->db->set('subject', $this->input->post('subject'));
        $this->db->set('author', $this->input->post('author'));
        $this->db->set('added_by', $getId['id']);
        $this->db->set('tag', $this->input->post('tag'));
        $this->db->where('id', $getBookId['id'], FALSE);
        
        return $this->db->update('books');
    }

    public function getSimiliarBooks($key,$value)
    {
        $this->db->like($key, $value);
        $query = $this->db->get('books');
        return $query->result_array();
    }
}
?>