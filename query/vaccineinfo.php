<?php
	include("../db_connection.php");

	$service_id = $_POST['service_id'];

	if ($_POST['type']=="save") {
		$temp = $_POST['temp'];
		$ht = $_POST['ht'];
		$vcc = $_POST['vcc'];

		$sql = $con->prepare("UPDATE tbl_service, tbl_vaccine SET tbl_vaccine.vaccine_temp=?,tbl_vaccine.vaccine_ht=?,tbl_vaccine.vaccine_given=? WHERE tbl_service.service_id=tbl_vaccine.service_id AND tbl_service.service_id=?");
		$sql->bind_param("sssi",$temp,$ht,$vcc,$service_id);
		$result = $sql->execute();

	}elseif ($_POST['type']=="view") {

		$sql = "SELECT * FROM tbl_service INNER JOIN tbl_vaccine ON tbl_service.service_id=tbl_vaccine.service_id WHERE tbl_service.service_id=".$service_id;
		$result = mysqli_query($con, $sql);

	}

	if($result==false){

		$response="ERROR";
		echo $response;

	}else{

		if ($_POST['type']=="view") {

			$vaccine_arr = array();

			while ($row = mysqli_fetch_array($result)) {
				$vaccine_temp = $row['vaccine_temp'];
				$vaccine_ht = $row['vaccine_ht'];
				$vaccine_given = $row['vaccine_given'];

				$vaccine_arr[] = array("vaccine_temp" => $vaccine_temp, "vaccine_ht" => $vaccine_ht, "vaccine_given" => $vaccine_given);
			}

			echo json_encode($vaccine_arr);
			
		}else{

			$response="SUCCESS";
			echo $response;
		
		}

	}
	
	include("../closedb_connection.php");
?>