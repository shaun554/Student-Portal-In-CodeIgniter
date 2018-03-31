<?php 

foreach ($users as $user)
{
	$username = trim($this->input->post('username'));
	$password = sha1(trim($this->input->post('password')));
	if($username == trim($user['email']))
	{
		if($password == trim($user['password']))
		{

			$this->session->set_userdata('role',$user['role']);
			$this->session->set_userdata('username',$username);
			switch($user['role'])
			{
				case 'admin':
					$data ['admin'] = $users;
					header("Location: /index.php/admin/");
					break;
				case 'teacher':
					$data['teacher'] = $users;
					header("Location: /index.php/teacher/");
					break;
				case 'student':
					$data['student'] = $users;
					break;
			}
		}
		else
		{
			$data['verified'] = FALSE;
			$data['title'] = 'Login';
			$this->load->view('includes/header', $data);
			$this->load->view('login/index',$data);
			$this->load->view('includes/footer');
		}
	}
	else
	{
		$data['verified'] = FALSE;
		$data['title'] = 'Login';
		$this->load->view('includes/header', $data);
		$this->load->view('login/index',$data);
		$this->load->view('includes/footer');
	}
}
?>