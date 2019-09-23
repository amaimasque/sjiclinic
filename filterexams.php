<?php

include("db_connection.php");

$texttosearch = $_POST['texttosearch'];
$filter = $_POST['filter'];

if ($texttosearch == "" && $filter == "") {

	$sql = "SELECT * from tbl_service INNER JOIN tbl_pets ON tbl_service.patient_id=tbl_pets.pet_id INNER JOIN tbl_clients ON tbl_pets.pet_owner_id=tbl_clients.client_id WHERE tbl_service.service_amt IS NULL";

}else if ($texttosearch != "" && $filter == ""){
	
	$sql = "SELECT * from tbl_service INNER JOIN tbl_pets ON tbl_service.patient_id=tbl_pets.pet_id INNER JOIN tbl_clients ON tbl_pets.pet_owner_id=tbl_clients.client_id WHERE (tbl_clients.client_firstname LIKE '%".$texttosearch."%' OR tbl_clients.client_lastname LIKE '%".$texttosearch."%' OR tbl_pets.pet_name LIKE '%".$texttosearch."%')  AND tbl_service.service_amt IS NULL";

}else if ($filter != "") {
	
	if ($filter == "aptType") {
		$sql = "SELECT * from tbl_service INNER JOIN tbl_pets ON tbl_service.patient_id=tbl_pets.pet_id INNER JOIN tbl_clients ON tbl_pets.pet_owner_id=tbl_clients.client_id WHERE (tbl_service.service_type LIKE '%".$texttosearch."%')  AND tbl_service.service_amt IS NULL";
	}elseif ($filter == "breed") {
		$sql = "SELECT * from tbl_service INNER JOIN tbl_pets ON tbl_service.patient_id=tbl_pets.pet_id INNER JOIN tbl_clients ON tbl_pets.pet_owner_id=tbl_clients.client_id WHERE (tbl_pets.pet_breed LIKE '%".$texttosearch."%')  AND tbl_service.service_amt IS NULL";
	}elseif ($filter == "species") {
		$sql = "SELECT * from tbl_service INNER JOIN tbl_pets ON tbl_service.patient_id=tbl_pets.pet_id INNER JOIN tbl_clients ON tbl_pets.pet_owner_id=tbl_clients.client_id WHERE (tbl_pets.pet_species LIKE '%".$texttosearch."%')  AND tbl_service.service_amt IS NULL";
	}elseif ($filter == "date") {
		$sql = "SELECT * from tbl_service INNER JOIN tbl_pets ON tbl_service.patient_id=tbl_pets.pet_id INNER JOIN tbl_clients ON tbl_pets.pet_owner_id=tbl_clients.client_id WHERE (tbl_service.service_apt_date LIKE '%".$texttosearch."%')  AND tbl_service.service_amt IS NULL";
	}

}

$result = mysqli_query($con,$sql);

$exam_arr = array();

while( $row = mysqli_fetch_array($result) ){

	$service_id = $row['service_id'];

	$service_type = $row['service_type'];	
    
    $client_fullname = $row['client_lastname'].', '.$row['client_firstname'].' '.$row['client_middlename'];

    $pet_name = $row['pet_name'];

    $date_entered = $row['service_apt_date'];

    $state = $row['service_del'];

    $exam_arr[] = array("service_id" => $service_id, "service_type" => $service_type, "client_fullname" => $client_fullname, "pet_name" => $pet_name, "date_entered" => $date_entered, "state" => $state);
}

// encoding array to json format
echo json_encode($exam_arr);

include("closedb_connection.php");

?>