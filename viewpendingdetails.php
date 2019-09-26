<?php

	include("db_connection.php");

	$service_id = $_POST['service_id'];
	$service_type = $_POST['service_type'];

	$sql = "SELECT * from tbl_service INNER JOIN tbl_".$service_type." ON tbl_service.service_id=tbl_".$service_type.".service_id INNER JOIN tbl_pets ON tbl_service.patient_id=tbl_pets.pet_id INNER JOIN tbl_clients ON tbl_pets.pet_owner_id=tbl_clients.client_id AND tbl_service.service_id=".$service_id;

	$result = mysqli_query($con, $sql);

	$details_arr= array();

	while($row = mysqli_fetch_array($result)){

		$client_firstname = $row['client_firstname'];
		$client_middlename = $row['client_middlename'];
		$client_lastname = $row['client_lastname'];
		$client_address = $row['client_address'];
		$client_contactnumber = $row['client_contactnumber'];
		$pet_name = $row['pet_name'];
		$pet_birthdate = $row['pet_birthdate'];
		$pet_sex = $row['pet_sex'];
		$pet_species = $row['pet_species'];
		$pet_breed = $row['pet_breed'];
		$pet_color_markings = $row['pet_color_markings'];
		$pet_previous_vet = $row['pet_previous_vet'];

		$appointment_arr = array();
		if ($service_type == "consultation") {
			$consultation_attitude = $row['consultation_attitude'];
			$consultation_drinking = $row['consultation_drinking'];
			$consultation_bowels = $row['consultation_bowels'];
			$consultation_coughing = $row['consultation_coughing'];
			$consultation_urination = $row['consultation_urination'];
			$consultation_appetite = $row['consultation_appetite'];
			$consultation_vomiting = $row['consultation_vomiting'];
			$consultation_sneezing = $row['consultation_sneezing'];
			$consultation_notes = $row['consultation_notes'];

			$appointment_arr[] = array("consultation_attitude" => $consultation_attitude, "consultation_drinking" => $consultation_drinking, "consultation_bowels" => $consultation_bowels, "consultation_coughing" => $consultation_coughing, "consultation_urination" => $consultation_urination, "consultation_appetite" => $consultation_appetite, 'consultation_vomiting' => $consultation_vomiting, "consultation_sneezing" => $consultation_sneezing, "consultation_notes" => $consultation_notes);
		}elseif ($service_type == "vaccine") {
			$vaccine_complaint = $row['vaccine_complaint'];
			$vaccine_freq = $row['vaccine_freq'];
			$vaccine_prev_treat = $row['vaccine_prev_treat'];
			$vaccine_response_treat = $row['vaccine_response_treat'];
			$vaccine_temp = $row['vaccine_temp'];
			$vaccine_ht = $row['vaccine_ht'];
			$vaccine_given = $row['vaccine_given'];

			$appointment_arr[] = array("vaccine_complaint" => $vaccine_complaint, "vaccine_freq" => $vaccine_freq, "vaccine_prev_treat" => $vaccine_prev_treat, "vaccine_response_treat" => $vaccine_response_treat, "vaccine_temp" => $vaccine_temp, "vaccine_ht" => $vaccine_ht, "vaccine_given" => $vaccine_given);
		}elseif ($service_type == "surgery") {
			$consent_deworming = $row['consent_deworming'];
			$consent_vaccination = $row['consent_vaccination'];
			$consent_dhlp_cpv = $row['consent_dhlp_cpv'];
			$consent_rabies = $row['consent_rabies'];
			$consent_kennel_cough = $row['consent_kennel_cough'];
			$consent_microsporum = $row['consent_microsporum'];
			$consent_confinement = $row['consent_confinement'];
			$consent_treatment = $row['consent_treatment'];
			$consent_labtest = $row['consent_labtest'];
			$consent_anesthesia = $row['consent_anesthesia'];
			$consent_grooming = $row['consent_grooming'];
			$consent_bath = $row['consent_bath'];
			$consent_dentistry = $row['consent_dentistry'];
			$consent_boarding = $row['consent_boarding'];
			$consent_boarding_days = $row['consent_boarding_days'];
			$consent_others = $row['consent_others'];
			$consent_agreement = $row['consent_agreement'];

			$appointment_arr[] = array("consent_deworming" => $consent_deworming, "consent_vaccination" => $consent_vaccination, "consent_dhlp_cpv" => $consent_dhlp_cpv, "consent_rabies" => $consent_rabies, "consent_kennel_cough" => $consent_kennel_cough, "consent_microsporum" => $consent_microsporum, 'consent_confinement' => $consent_confinement, "consent_treatment" => $consent_treatment, "consent_labtest" => $consent_labtest, "consent_anesthesia" => $consent_anesthesia, "consent_grooming" => $consent_grooming, "consent_bath" => $consent_bath, "consent_dentistry" => $consent_dentistry, "consent_boarding" => $consent_boarding, 'consent_boarding_days' => $consent_boarding_days, "consent_others" => $consent_others, "consent_agreement" => $consent_agreement);
		}

		$details_arr[] = array("client_firstname" => $client_firstname, "client_middlename" => $client_middlename, "client_lastname" => $client_lastname, "client_address" => $client_address, "client_contactnumber" => $client_contactnumber, "pet_name" => $pet_name, "pet_birthdate" => $pet_birthdate, "pet_sex" => $pet_sex, "pet_species" => $pet_species, "pet_breed" => $pet_breed, "pet_color_markings" => $pet_color_markings, "pet_previous_vet" => $pet_previous_vet, "appointment" => $appointment_arr);

		$details_arr = array_merge($details_arr, $appointment_arr);
	}

	echo json_encode($details_arr);

	include("closedb_connection.php");

?>