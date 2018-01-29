<?php
/*if(!session_status() == PHP_SESSION_NONE)
{
	session_destroy();	
}*/
$this->session->sess_destroy();
header("Location: /");
?>