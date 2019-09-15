<?php

include("db_connection.php");

$clientid = $_POST['clientid'];   // department id

$sql = "SELECT * FROM tbl_pets WHERE pet_owner_id=".$clientid;

$result = mysqli_query($con,$sql);

$pets_arr = array();

while( $row = mysqli_fetch_array($result) ){
    
    $pet_id = $row['pet_id'];

    $pet_name = $row['pet_name'];

    $pets_arr[] = array("pet_id" => $pet_id, "pet_name" => $pet_name);
}

// encoding array to json format
echo json_encode($pets_arr);

include("closedb_connection.php");

?>