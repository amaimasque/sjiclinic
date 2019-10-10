<?php
	
	date_default_timezone_set("Asia/Manila");

	$host_name = "localhost";

	$username = "root";

	$password = "";

	$db_name = "db_sji";


	$con = mysqli_connect($host_name, $username, $password, $db_name);



	if (!$con) {

	    die("Connection failed: " . mysqli_connect_error());

	}



	function test_input($data) {

	  $data = trim($data);

	  $data = stripslashes($data);

	  $data = htmlspecialchars($data);

	  return $data;

	}

?>