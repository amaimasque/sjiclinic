<?php

	include("../db_connection.php");

	$service_id = $_POST['service_id'];

	if ($_POST['type']=="save") {
		$dx = test_input($_POST['dx']);
		$trt = test_input($_POST['trt']);
		$rx = test_input($_POST['rx']);
		
		$sql = $con->prepare("UPDATE tbl_service, tbl_consultation SET tbl_consultation.prognosis=?, tbl_consultation.treatment=?, tbl_consultation.prescribed_med=? WHERE tbl_service.service_id=tbl_consultation.service_id AND tbl_service.service_id=?");

		$sql->bind_param("sssi", $dx, $trt, $rx, $service_id);

		if($sql->execute()==true){
			echo "SUCCESS";
		}else{
			echo "ERROR";
		}

	}elseif($_POST['type']=="view"){
	
		$sql = "SELECT tbl_consultation.prognosis, tbl_consultation.treatment, tbl_consultation.prescribed_med from tbl_service INNER JOIN tbl_consultation ON tbl_service.service_id=tbl_consultation.service_id  AND tbl_service.service_id=$service_id";

		$result = $con->query($sql);

		$prognosis_arr = array();

		if ($row = $result->fetch_array(MYSQLI_ASSOC)) {
			$prognosis = $row['prognosis'];
			$treatment = $row['treatment'];
			$prescribed_med = $row['prescribed_med'];

			$prognosis_arr[] = array("prognosis" => $prognosis, "treatment" => $treatment, "prescribed_med" => $prescribed_med);

		}else{
			$prognosis_arr[] = array("ERROR");
		}
		
		echo json_encode($prognosis_arr);

	}
	
	include("../closedb_connection.php");

?>