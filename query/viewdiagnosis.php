<?php

	include("../db_connection.php");

	$service_id = $_POST['service_id'];

	$sql = "SELECT * from tbl_service INNER JOIN tbl_consultation ON tbl_service.service_id=tbl_consultation.service_id  AND tbl_service.service_id=$service_id";

	$result = $con->query($sql);

	$diagnosis_arr = array();

	if ($row = $result->fetch_array(MYSQLI_ASSOC)) {
		$diagnosis_blood_exam = $row['diagnosis_blood_exam'];
		$diagnosis_urine_exam = $row['diagnosis_urine_exam'];
		$diagnosis_distemper_test = $row['diagnosis_distemper_test'];
		$diagnosis_parvo_test = $row['diagnosis_parvo_test'];
		$diagnosis_fecalysis = $row['diagnosis_fecalysis'];
		$diagnosis_skin_scraping = $row['diagnosis_skin_scraping'];
		$diagnosis_ehrlichia_test = $row['diagnosis_ehrlichia_test'];
		$diagnosis_hw_test = $row['diagnosis_hw_test'];
		$diagnosis_ear_swabbing = $row['diagnosis_ear_swabbing'];
		$diagnosis_vaginal_smear = $row['diagnosis_vaginal_smear'];
		$diagnosis_ultrasound = $row['diagnosis_ultrasound'];
		$diagnosis_xray = $row['diagnosis_xray'];
		$diagnosis_others = $row['diagnosis_others'];

		$diagnosis_arr[] = array("diagnosis_blood_exam" => $diagnosis_blood_exam, "diagnosis_urine_exam" => $diagnosis_urine_exam, "diagnosis_distemper_test" => $diagnosis_distemper_test, "diagnosis_parvo_test" => $diagnosis_parvo_test, "diagnosis_fecalysis" => $diagnosis_fecalysis, "diagnosis_skin_scraping" => $diagnosis_skin_scraping, "diagnosis_ehrlichia_test" => $diagnosis_ehrlichia_test, "diagnosis_hw_test" => $diagnosis_hw_test, "diagnosis_ear_swabbing" => $diagnosis_ear_swabbing, "diagnosis_vaginal_smear'" => $diagnosis_vaginal_smear, "diagnosis_ultrasound" => $diagnosis_ultrasound, "diagnosis_xray" => $diagnosis_xray, "diagnosis_others" => $diagnosis_others);
	}else{
		$diagnosis_arr[] = array("ERROR");
	}
	
	echo json_encode($diagnosis_arr);

	include("../closedb_connection.php");

?>