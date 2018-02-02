<!DOCTYPE html>
<html>
<head>
	<?php
		if(empty($title))
		{
			$title = 'Site Name';
		}
		else
		{
			$title = 'Site Name | '.$title; 
		}
	?>

	<title><?php echo $title; ?></title>

	<link rel="stylesheet" type="text/css" href="/assets/css/bootstrap/dist/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.16/r-2.2.1/datatables.min.css"/>
	<link rel="stylesheet" type="text/css" href="/assets/css/style.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 
</head>
<header>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<!-- <a class="navbar-brand" href="#">Navbar</a> -->
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
				<a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
				<a class="nav-link" href="/index.php/books/">Books</a>
				</li>
				<?php if($this->session->userdata('role') == null): ?>
					<li class="nav-item">
					<a class="nav-link" href="/index.php/login/">Login</a>
					</li>
				<?php elseif ($this->session->userdata('role') == 'admin'): ?>
					<li class="nav-item">
					<a class="nav-link" href="/index.php/admin/schedule">Schedule an appointment</a>
					</li>
				<?php endif; ?>
			</ul>
			
			<?php if ($this->session->userdata('role') == 'teacher'): ?>
				<?php $home_url = '/index.php/teacher/'; ?>
			<?php elseif ($this->session->userdata('role') == 'admin'): ?>
				<?php $home_url = '/index.php/admin/'; ?>
			<?php endif; ?>
			<?php if(isset($home_url)): ?>
				<a class="user-logged-in-text mr-2" href="<?php echo $home_url; ?>">My account</a>
				<i class="fa fa-ellipsis-v user-logged-in-text"></i>
				<a class="user-logged-in-text ml-2" href="/index.php/logout/logout/">Logout</a>
			<?php endif; ?>

		</div>
	</nav>
</header>