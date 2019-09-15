<?php

	include("db_connection.php");

	$service_id = $_GET['id'];

	$service_type = $_GET['at'];

	$sql = "SELECT * from tbl_service INNER JOIN tbl_".$service_type." ON tbl_service.service_id=tbl_".$service_type.".service_id INNER JOIN tbl_pets ON tbl_service.patient_id=tbl_pets.pet_id INNER JOIN tbl_clients ON tbl_pets.pet_owner_id=tbl_clients.client_id AND tbl_service.service_id=".$service_id;

	$sql = mysqli_query($con, $sql);

	while($row = mysqli_fetch_array($sql)){

?>

	<!-- SET CLIENT INFO -->
	document.getElementById("client_fname").value= "<?php echo $row['client_firstname']; ?>";
	document.getElementById("client_mname").value= "<?php echo $row['client_middlename']; ?>";
	document.getElementById("client_lname").value= "<?php echo $row['client_lastname']; ?>";
	document.getElementById("client_address").value= "<?php echo $row['client_address']; ?>";
	document.getElementById("client_contact").value= "<?php echo $row['client_contactnumber']; ?>";

	<!-- SET PATIENT INFO -->
	document.getElementById("pet_name").value = "<?php echo $row['pet_name']; ?>";

	<!-- CHANGE BDATE TO TEXT INPUT TYPE -->
	document.getElementById("pet_bdate").type = "text";
	document.getElementById("pet_bdate").value= "<?php echo $row['pet_birthdate']; ?>";

	<!-- REMOVE SELECT SEX AND ADD INPUT TEXT -->
	<!--remove-->
	var parent = document.getElementById("div_pet_sex");
	var child = document.getElementById("pet_sex");
	parent.removeChild(child);
	<!--add-->
	var newInput = document.createElement("input");
	newInput.type="text";
	newInput.className="w3-input";
	newInput.value = "<?php echo ucfirst($row['pet_sex']); ?>";
	newInput.id = "pet_sex";
	newInput.disabled = true;
	parent.appendChild(newInput);

	document.getElementById("pet_species").value= "<?php echo $row['pet_species']; ?>";
	document.getElementById("pet_breed").value= "<?php echo $row['pet_breed']; ?>";
	document.getElementById("pet_color_markings").value= "<?php echo $row['pet_color_markings']; ?>";
	document.getElementById("pet_vet").value= "<?php echo $row['pet_previous_vet']; ?>";

<?php

	}

	include("closedb_connection.php");

?>