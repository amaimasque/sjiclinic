<?php
	include("db_connection.php");

	$service_id = $_GET['id'];

	$sql = "UPDATE tbl_service SET service_read=1 WHERE service_id=$service_id";

	mysqli_query($con, $sql);
	
	include("closedb_connection.php");
?>