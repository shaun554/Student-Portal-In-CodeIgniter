<?php

$dbhost = "localhost";
$dbname = "student_portal";
$dbuser = "root";
$dbpass = "";
$db = "";

try {

	$db = new PDO("mysql:host=$dbhost;dbname=$dbname;", $dbuser, $dbpass);

} catch (PDOException $e) {
	echo $e;
}

global $db;
$sql = "CREATE TABLE `books` (
	 `id` int(11) NOT NULL AUTO_INCREMENT,
	 `name` varchar(200) NOT NULL,
	 `url` varchar(500) NOT NULL,
	 `subject` varchar(100) NOT NULL,
	 `author` varchar(200) NOT NULL,
	 PRIMARY KEY (`id`)
	) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin";

$stmt = $db->prepare($sql);
if($stmt->execute())
{
	$sql = " 	CREATE TABLE `users` (
	 `id` int(11) NOT NULL AUTO_INCREMENT,
	 `name` varchar(200) NOT NULL,
	 `email` varchar(200) NOT NULL,
	 `password` varchar(500) NOT NULL,
	 `role` enum('admin','student','teacher') NOT NULL,
	 PRIMARY KEY (`id`)
	) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin";

	$stmt = $db->prepare($sql);
	if($stmt->execute())
	{
		$password = sha1('admin@123');
		$sql = "INSERT INTO users VALUES (:name, :email, :password, :role)";

		$stmt = $db->prepare($sql);

		$stmt = bindParam(':name','Jayashankar Jayan');
		$stmt = bindParam(':email','student_portal@gmail.com');
		$stmt = bindParam(':password',$password);
		$stmt = bindParam(':role','teacher');

		if($stmt->exeute())
		{
			echo "Your username is <strong>student_portal@gmail.com</strong> and password is <strong>admin@123</strong>";
		}
		else
		{
			echo "Error. Please try again";
		}
	}
	else
	{
		echo "Error. Please try again";
	}
}

?>