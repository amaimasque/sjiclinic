<?php

	$host_name = "localhost";

	$username = "root";

	$password = "";

	$db_name = "db_sji";

	/*$username = "id10765695_root";

	$password = "12345";

	$db_name = "id10765695_db_sji";*/



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