<?php
	if(isset($_POST['logout'])){
		if (isset($_SESSION['user'])) {
	      session_unset($_SESSION['user']);
	      session_regenerate_id(true);
	      session_destroy();
	    }
	    die(header("login.php"));
	}

	if (empty($_SESSION['user'])) {
		die(header("Location: index.php"));
	}
?>