<?php
	include("../db_connection.php");

	$service_id = $_POST['service_id'];

	$sql = "UPDATE tbl_service SET service_del=1 WHERE service_id=$service_id";

	if(mysqli_query($con, $sql)==true){
		$response="SUCCESS";
	}else{
		$response="ERROR";
	}

	echo $response;
	
	include("../closedb_connection.php");
?>