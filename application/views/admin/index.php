<?php

if(!$_SERVER['REQUEST_URI'] === '/index.php/admin/index/')
{
	header("Location: /index.php/admin/index/");
}

if(isset($teacher))
{
	$data = $admin[0];
}
?>
<?php $this->load->view('admin/navbar'); ?>
<div class="white-container m-5">
</div>