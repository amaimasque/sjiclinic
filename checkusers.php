<?php
	require("db_connection.php");
	$sql="SELECT * FROM tbl_users"; 
    $retval = mysqli_query($con, $sql);

    if (mysqli_num_rows($retval)==0) {
        $sql = $con->prepare("INSERT INTO tbl_users (user_id, username, user_pwd) VALUES(?, ?, ?)");
        $id=1;
        $admin="admin";
        $sql->bind_param("iss", $id, $admin, $password);

        require_once('class.ncrypt.php');
		$ncrypt = new mukto90\Ncrypt;
        $password = $ncrypt->encrypt('admin123');

        $sql->execute();
        //$sql->close();
        
        echo "<script>
        	alert('Default admin account created!');
        </script>";
    }

	require("closedb_connection.php");
?>