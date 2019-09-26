<?php

	include("../db_connection.php");

	$service_id = $_POST['service_id'];
	$service_type = $_POST['service_type'];

	if ($service_type == "consultation") {

		$consultation_attitude = $_POST['consultation_attitude'];
		$consultation_drinking = $_POST['consultation_drinking'];
		$consultation_bowels = $_POST['consultation_bowels'];
		$consultation_coughing = $_POST['consultation_coughing'];
		$consultation_urination = $_POST['consultation_urination'];
		$consultation_appetite = $_POST['consultation_appetite'];
		$consultation_vomiting = $_POST['consultation_vomiting'];
		$consultation_sneezing = $_POST['consultation_sneezing'];
		$consultation_notes = $_POST['consultation_notes'];

		$sql = "UPDATE tbl_service, tbl_consultation SET tbl_consultation.consultation_attitude='$consultation_attitude', tbl_consultation.consultation_drinking='$consultation_drinking', tbl_consultation.consultation_bowels='$consultation_bowels', tbl_consultation.consultation_coughing='$consultation_coughing', tbl_consultation.consultation_urination='$consultation_urination', tbl_consultation.consultation_appetite='$consultation_appetite', tbl_consultation.consultation_vomiting='$consultation_vomiting', tbl_consultation.consultation_sneezing='$consultation_sneezing', tbl_consultation.consultation_notes='$consultation_notes' WHERE tbl_service.service_id=tbl_consultation.service_id AND tbl_service.service_id=".$service_id;

	}elseif ($service_type == "vaccine") {
		$vaccine_complain = $_POST['vaccine_complain'];
		$vaccine_freq = $_POST['vaccine_freq'];
		$vaccine_prevtreat = $_POST['vaccine_prevtreat'];
		$vaccine_response = $_POST['vaccine_response'];

		$sql = "UPDATE tbl_service, tbl_vaccine SET tbl_vaccine.vaccine_complaint='$vaccine_complain', tbl_vaccine.vaccine_freq='$vaccine_freq', tbl_vaccine.vaccine_prev_treat='$vaccine_prevtreat', tbl_vaccine.vaccine_response_treat='$vaccine_response' WHERE tbl_service.service_id=tbl_vaccine.service_id AND tbl_service.service_id=".$service_id;

	}elseif ($service_type == "surgery") {

		$check_deworming = $_POST['check_deworming'];
		$check_vaccination = $_POST['check_vaccination'];
		$check_dhlp = $_POST['check_dhlp'];
		$check_rabies = $_POST['check_rabies'];
		$check_cough = $_POST['check_cough'];
		$check_micro = $_POST['check_micro'];
		$check_labtest = $_POST['check_labtest'];
		$check_treat = $_POST['check_treat'];
		$check_confine = $_POST['check_confine'];
		$check_anesurg = $_POST['check_anesurg'];
		$check_groom = $_POST['check_groom'];
		$check_bath = $_POST['check_bath'];
		$check_boarding = $_POST['check_boarding'];
		$check_dentistry = $_POST['check_dentistry'];
		$consent_boarding_days = $_POST['consent_boarding_days'];
		$consent_others = $_POST['consent_others'];
		$consent_agree = $_POST['consent_agree'];

		$sql = "UPDATE tbl_service, tbl_surgery SET tbl_surgery.consent_deworming='$check_deworming', tbl_surgery.consent_vaccination='$check_vaccination', tbl_surgery.consent_dhlp_cpv='$check_dhlp', tbl_surgery.consent_rabies='$check_rabies', tbl_surgery.consent_kennel_cough='$check_cough', tbl_surgery.consent_microsporum='$check_micro', tbl_surgery.consent_confinement='$check_confine', tbl_surgery.consent_treatment='$check_treat', tbl_surgery.consent_labtest='$check_labtest', tbl_surgery.consent_anesthesia='$check_anesurg', tbl_surgery.consent_grooming='$check_groom', tbl_surgery.consent_bath='$check_bath', tbl_surgery.consent_dentistry='$check_dentistry', tbl_surgery.consent_boarding='$check_boarding', tbl_surgery.consent_boarding_days=$consent_boarding_days, tbl_surgery.consent_others='$consent_others', tbl_surgery.consent_agreement='$consent_agree' WHERE tbl_service.service_id=tbl_surgery.service_id AND tbl_service.service_id=".$service_id;

	}elseif ($service_type == "grooming"){

		$grooming_cut = $_POST['grooming_cut'];

		$sql = "UPDATE tbl_service, tbl_grooming SET tbl_grooming.grooming_cut='$grooming_cut' WHERE tbl_service.service_id=tbl_grooming.service_id AND tbl_service.service_id=".$service_id;

	}

	if (mysqli_query($con, $sql)) {
		echo json_encode(array("statusCode"=>200));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
	}

	include("../closedb_connection.php");

?>