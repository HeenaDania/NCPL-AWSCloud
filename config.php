<?php
	$host = getenv('DB_HOST'); // RDS endpoint from AWS
	$user = getenv('DB_USER'); // RDS master username
	$pass = getenv('DB_PASSWORD'); // RDS master password
	$db = getenv('DB_NAME'); // Initial database name
	$port = getenv('DB_PORT') ?: '3306'; // Default MySQL port

	$con = mysqli_connect($host, $user, $pass, $db, $port) 
	    or die(mysqli_connect_error());
?>
