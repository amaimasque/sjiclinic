<?php

	require('db_connection.php');



	$clientID;

	$petID;



	if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET['new'])) {

		$cfname = test_input($_POST["client_fname"]);

		$cmname = test_input($_POST["client_mname"]);

		$clname = test_input($_POST["client_lname"]);

		$caddress = test_input($_POST["client_address"]);

		$ccontact = test_input($_POST["client_contact"]);



		$pname = test_input($_POST["pet_name"]);

		$pbdate = test_input($_POST["pet_bdate"]);

		$psex = test_input($_POST["pet_sex"]);

		$pspecies = test_input($_POST["pet_species"]);

		$pbreed = test_input($_POST["pet_breed"]);

		$pcolor = test_input($_POST["pet_color_markings"]);

		$pvet = test_input($_POST["pet_vet"]);

		$newpetid;

	}



	if(isset($_GET['new'])){

		$ownerid = insertClient($cfname, $cmname, $clname, $caddress, $ccontact);

		$last_petid = insertPatient($ownerid, $pname, $pbdate, $psex, $pspecies, $pbreed, $pcolor, $pvet);

	}

	function insertPatient($ownerid, $pname, $pbdate, $psex, $pspecies, $pbreed, $pcolor, $pvet){

		global $con, $sql;

		$sql = $con->prepare("INSERT INTO tbl_pets (pet_name, pet_birthdate, pet_sex, pet_species, pet_breed, pet_color_markings, pet_previous_vet, pet_owner_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

		$sql->bind_param("sssssssi", $pname, $pbdate, $psex, $pspecies, $pbreed, $pcolor, $pvet, $ownerid);

		if ($sql->execute() === TRUE) {

		    $last_id = $con->insert_id;

		    return $last_id;

		} else {

		    echo "Error: " . $sql->error . "<br>" . $con->error;

		}

	}



	function insertClient($cfname, $cmname, $clname, $caddress, $ccontact){

		global $con, $sql;

		$sql = $con->prepare("INSERT INTO tbl_clients (client_firstname, client_middlename, client_lastname, client_address, client_contactnumber) VALUES (?, ?, ?, ?, ?)");

		$sql->bind_param("sssss", $cfname, $cmname, $clname, $caddress, $ccontact);

		if ($sql->execute() === TRUE) {

		    $last_id = $con->insert_id;

		    return $last_id;

		} else {

		    echo "Error: " . $sql->error . "<br>" . $con->error;

		}

	}



	if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET['old'])){

		getClient();

	}



	function getClient(){

		global $clientID, $petID;

		$clientID = test_input($_POST["oclientname"]);

		$petID = test_input($_POST["opetname"]);

		if ($petID == "add") {
			
			$ownerid = test_input($_POST["owner_id"]);

			$pname = test_input($_POST["pet_name"]);

			$pbdate = test_input($_POST["pet_bdate"]);

			$psex = test_input($_POST["pet_sex"]);

			$pspecies = test_input($_POST["pet_species"]);

			$pbreed = test_input($_POST["pet_breed"]);

			$pcolor = test_input($_POST["pet_color_markings"]);

			$pvet = test_input($_POST["pet_vet"]);

			$petID = insertPatient($ownerid, $pname, $pbdate, $psex, $pspecies, $pbreed, $pcolor, $pvet);

		}

	}



	if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET['apt'])){

		insertService($_GET['apt']);

	}



	function insertService($aptType){

		//get id of pet

		global $last_petid, $con, $sql, $petID;

		$sql = $con->prepare("INSERT INTO tbl_service (patient_id , service_type, service_apt_date) VALUES (?, ?, ?)");

		$date = new DateTime();

		$date = $date->format("Y-m-d H:i:s");

		if(isset($_GET['new'])){
			
			$sql->bind_param("iss", $last_petid, $aptType, $date);

		}else{

			$sql->bind_param("iss", $petID, $aptType, $date);

		}

		

		//get service id

		if ($sql->execute() === TRUE) {

		    $last_serviceid = $con->insert_id;

		} else {

		    echo "Error: " . $sql->error . "<br>" . $con->error;

		}

		

		if ($aptType == 'consultation') {

			$cattitude = test_input($_POST["attitude"]);

			$cdrinking = test_input($_POST["drinking"]);

			$cbowels = test_input($_POST["bowels"]);

			$ccoughing = test_input($_POST["coughing"]);

			$curination = test_input($_POST["urination"]);

			$cappetite = test_input($_POST["appetite"]);

			$cvomiting = test_input($_POST["vomiting"]);

			$csneezing = test_input($_POST["sneezing"]);

			$ccnotes = test_input($_POST["cnotes"]);

			

			$sql = $con->prepare("INSERT INTO tbl_consultation (service_id, consultation_attitude, consultation_drinking, consultation_bowels, consultation_coughing, consultation_urination, consultation_appetite, consultation_vomiting, consultation_sneezing, consultation_notes) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

			$sql->bind_param("isssssssss", $last_serviceid, $cattitude, $cdrinking, $cbowels, $ccoughing, $curination, $cappetite, $cvomiting, $csneezing, $ccnotes);

		} elseif ($aptType == 'surgery') {

			$deworming = $_POST["deworming"];

			$vaccination = $_POST["vaccination"];

			$dhlp = $_POST["dhlp"];

			$rabies = $_POST["rabies"];

			$cough = $_POST["cough"];

			$micro = $_POST["micro"];

			$confine = $_POST["confine"];

			$treat = $_POST["treat"];

			$labtest = $_POST["labtest"];

			$anesurg = $_POST["anesurg"];

			$groom = $_POST["groom"];

			$bath = $_POST["bath"];

		    $dentistry = $_POST["dentistry"];

			$boarding = $_POST["boarding"];

			$bnumdays = test_input($_POST["boarding_numdays"]);

            $conothers = test_input($_POST["consent_others"]);

            $conagree = $_POST["consent_agree"];

            

            $sql = $con->prepare("INSERT INTO tbl_surgery (service_id, consent_deworming, consent_vaccination, consent_dhlp_cpv, consent_rabies, consent_kennel_cough	, consent_microsporum, consent_confinement, consent_treatment, consent_labtest, consent_anesthesia, consent_grooming, consent_bath, consent_dentistry, consent_boarding, consent_boarding_days, consent_others, consent_agreement) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

			$sql->bind_param("issssssssssssssiss", $last_serviceid, $deworming, $vaccination, $dhlp, $rabies, $cough, $micro, $confine, $treat, $labtest, $anesurg, $groom, $bath, $dentistry, $boarding, $bnumdays, $conothers, $conagree);

    		

		} elseif ($aptType == 'vaccine') {

			$vcomplain = test_input($_POST["vaccine_complain"]);

			$vfreq = test_input($_POST["vaccine_freq"]);

			$vprevtreat = test_input($_POST["vaccine_prevtreat"]);

			$vresponse = test_input($_POST["vaccine_response"]);

			

			$sql = $con->prepare("INSERT INTO tbl_vaccine (service_id, vaccine_complaint, vaccine_freq, vaccine_prev_treat, vaccine_response_treat) VALUES (?, ?, ?, ?, ?)");

			$sql->bind_param("issss", $last_serviceid, $vcomplain, $vfreq, $vprevtreat, $vresponse);

		} elseif ($aptType == 'grooming') {

			$sql = $con->prepare("INSERT INTO tbl_grooming (service_id) VALUES (?)");

			$sql->bind_param("i", $last_serviceid);

		}

		

		//execute insertion on diff tables

		if ($sql->execute() === TRUE) {

            header("Location: appointment.php");

    	} else {

    	    header( "refresh:5; Location: appointment.php" );

    		echo "Error: " . $sql->error . "<br>" . $con->error;

		}

	}



	require('closedb_connection.php');

?>