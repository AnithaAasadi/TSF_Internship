<?php
	define('DB_SERVER','127.0.0.1:3307');
	define('DB_USER', 'root');
	define('DB_PASS', '');
	define('DB_NAME', 'db');	
	$conn = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
?>