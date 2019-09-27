<?php

	include("../db_connection.php");

	$service_id = $_POST['service_id'];
	$amount = $_POST['amount'];

	$sql = $con->prepare("UPDATE tbl_service SET service_amt=?, service_date=? WHERE service_id=?");

	$findate = new DateTime();
	$findate = $findate->format("Y-m-d H:i:s");

	$sql->bind_param("isi", $amount, $findate, $service_id);

	if($sql->execute()==true){
		echo "SUCCESS";
	}else{
		echo "ERROR";
	}

	include("../closedb_connection.php");

?>