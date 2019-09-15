<?php
	require("db_connection.php");
	ini_set('session.gc_maxlifetime', 3600);
	session_set_cookie_params(3600);
	session_start();

	if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['btnLogin'])) {
	  $user = test_input($_POST["uname"]);
	  $pass = test_input($_POST["passw"]);
	}

	if(isset($_POST['btnLogin'])) 
	{
		loginAdmin();
	}

	function loginAdmin(){
		global $user, $pass, $con, $sql;
		require_once('class.ncrypt.php');
		$ncrypt = new mukto90\Ncrypt;
		$pass = $ncrypt->encrypt($pass);
		$sql = "SELECT * FROM tbl_users WHERE username='$user' AND user_pwd='$pass' LIMIT 1";
		$result = mysqli_query($con, $sql);
		if (mysqli_num_rows($result) == 1) {
			$logged_in_user = mysqli_fetch_assoc($result);
			session_regenerate_id(true); 
			$_SESSION['user'] = $logged_in_user;
			$_SESSION['ID'] = session_id();
			header("Location: sjihome.php");
		}else{
			header("Location: login.php?invaliduser");
			session_destroy();
		}
	}

	require("closedb_connection.php");
?>