<?php

	include("../db_connection.php");

	$service_id = $_POST['service_id'];

	if ($_POST['type']=="save") {
		$dblood = test_input($_POST['dblood']);
		$durine = test_input($_POST['durine']);
		$ddtemper = test_input($_POST['ddtemper']);
		$dpvtest = test_input($_POST['dpvtest']);
		$dfec = test_input($_POST['dfec']);
		$dscr = test_input($_POST['dscr']);
		$dehtest = test_input($_POST['dehtest']);
		$dhwtest = test_input($_POST['dhwtest']);
		$dears = test_input($_POST['dears']);
		$dvags = test_input($_POST['dvags']);
		$dult = test_input($_POST['dult']);
		$dxray = test_input($_POST['dxray']);
		$dotest = test_input($_POST['dotest']);

		$sql = $con->prepare("UPDATE tbl_service, tbl_consultation SET tbl_consultation.diagnosis_blood_exam=?, tbl_consultation.diagnosis_urine_exam=?, tbl_consultation.diagnosis_distemper_test=?, tbl_consultation.diagnosis_parvo_test=?, tbl_consultation.diagnosis_fecalysis=?, tbl_consultation.diagnosis_skin_scraping=?, tbl_consultation.diagnosis_ehrlichia_test=?, tbl_consultation.diagnosis_hw_test=?, tbl_consultation.diagnosis_ear_swabbing=?, tbl_consultation.diagnosis_vaginal_smear=?, tbl_consultation.diagnosis_ultrasound=?, tbl_consultation.diagnosis_xray=?, tbl_consultation.diagnosis_others=? WHERE tbl_service.service_id=tbl_consultation.service_id AND tbl_service.service_id=?");

		$sql->bind_param("sssssssssssssi", $dblood, $durine, $ddtemper, $dpvtest, $dfec, $dscr, $dehtest, $dhwtest, $dears, $dvags, $dult, $dxray, $dotest, $service_id);

		if($sql->execute()==true){
			echo "SUCCESS";
		}else{
			echo "ERROR";
		}

	}elseif($_POST['type']=="view"){
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

			$diagnosis_arr[] = array("diagnosis_blood_exam" => $diagnosis_blood_exam, "diagnosis_urine_exam" => $diagnosis_urine_exam, "diagnosis_distemper_test" => $diagnosis_distemper_test, "diagnosis_parvo_test" => $diagnosis_parvo_test, "diagnosis_fecalysis" => $diagnosis_fecalysis, "diagnosis_skin_scraping" => $diagnosis_skin_scraping, "diagnosis_ehrlichia_test" => $diagnosis_ehrlichia_test, "diagnosis_hw_test" => $diagnosis_hw_test, "diagnosis_ear_swabbing" => $diagnosis_ear_swabbing, "diagnosis_vagsmear" => $diagnosis_vaginal_smear, "diagnosis_ultrasound" => $diagnosis_ultrasound, "diagnosis_xray" => $diagnosis_xray, "diagnosis_others" => $diagnosis_others);
		}else{
			$diagnosis_arr[] = array("ERROR");
		}
		
		echo json_encode($diagnosis_arr);

	}
	
	include("../closedb_connection.php");

?>