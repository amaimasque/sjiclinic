<?php

	include("../db_connection.php");

	require_once('../class.ncrypt.php');
	$ncrypt = new mukto90\Ncrypt;
	
	if ($_POST['type']=="save") {

		$vet_fname = $_POST['vet_fname'];
		$vet_lname = $_POST['vet_lname'];
		$n_uname = $_POST['n_uname'];
		$n_pass = $_POST['n_pass'];
		
		$n_pass = $ncrypt->encrypt($n_pass);

		$sql = $con->prepare("UPDATE tbl_users SET username=?, user_pwd=?, user_firstname=?, user_lastname=?");

		$sql->bind_param("ssss", $n_uname, $n_pass, $vet_fname, $vet_fname);

		if($sql->execute()==true){
			echo "SUCCESS";
		}else{
			echo "ERROR";
		}
	}elseif($_POST['type']=="view"){

		$sql = "SELECT * FROM tbl_users LIMIT 1";

		$result = mysqli_query($con, $sql);

		$row = mysqli_fetch_array($result);

		$prof_arr[] = array('fname' => $row['user_firstname'], 'lname' => $row['user_lastname'], 'uname' => $row['username'], 'upass' =>  $ncrypt->decrypt($row['user_pwd']));

		echo json_encode($prof_arr);

	}

	include("../closedb_connection.php");

?>