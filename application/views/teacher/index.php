<?php

if(!$_SERVER['REQUEST_URI'] === '/index.php/teacher/index/')
{
	header("Location: /index.php/teacher/index/");
}

if(isset($teacher))
{
	$data = $teacher[0];
}
?>
<?php $this->load->view('teacher/navbar'); ?>
<div class="teacher-body m-5 white-container">
</div>