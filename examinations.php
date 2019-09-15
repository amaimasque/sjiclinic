<!DOCTYPE html>

<html>

<head>

	<title>View pending examinations</title>

	<meta charset="utf-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="icon" href="images/logo_img.png">

	<link rel="stylesheet" href="css/w3.css">

	<link rel="stylesheet" href="css/sjiclinic.css">

	<style type="text/css">

a{

	text-decoration: none;

}

#cont_all{

	width: 100vw;

	height: 100vh;

	padding-top: 10%

}

#cont_examinations{

	padding: 0px 15%;

	padding-bottom: 20px;	

}

.div_examination{

	margin: 20px 0px;	

}

.div-examination:last-child{

	margin-bottom: 20px;

}

.div_examination > a{

	padding: 20px 5%;

	display: block;

}

.div_examination_new{

	background: #BBD2B3;

}

.div_examination_read{

	

	background: #FEF9F5;

}

#cont_pending_id{

	width: 33%;

	font-size: 20pt;

	font-weight: bold;

}

.cont_pending_details .w3-col{

	width: 30%

}

@media screen and (max-width: 600px){

	#cont_all{

		padding-top: 70px

	}

	#cont_examinations{

		padding: 0px;

	}

	#cont_pending_id{

		width: 25%;

	}



}

@media screen and (min-width: 601px) and (max-width: 993px){

	.cont_pending_details .w3-col{

		width: 40%

	}

}

@media screen and (min-width: 601px) and (max-width: 1024px){



}

/* customize for larger screens */

@media screen and (min-width: 1025px){



}



	</style>

</head>
<?php
	include("db_connection.php");

	$sql = mysqli_query($con, "SELECT * from tbl_service INNER JOIN tbl_pets ON tbl_service.patient_id=tbl_pets.pet_id INNER JOIN tbl_clients ON tbl_pets.pet_owner_id=tbl_clients.client_id AND tbl_service.service_amt IS NULL");

	$numExams = mysqli_num_rows($sql);

?>
<body>

	<?php

		require("nav_admin.php");

	?>

	<div class="w3-container" id="cont_all">

		<div class="w3-row" style="padding: 20px 20%">

			<div class="w3-col w3-right" style="width: 50px">

				<a class="w3-button w3-circle"><i class="fa fa-search"></i></a>

			</div>

			<div class="w3-rest">

				<input class="w3-input w3-round-xxlarge w3-border" type="text" name="texttosearch" placeholder="Search pending...">

			</div>

		</div>

		<div class="w3-center" style="font-weight: 900">

			<div style="font-size: 20pt; color: #D3464D"><?php echo $numExams; ?> NEW</div>

			<div style="color: #833438">PENDING EXAMINATION(S)</div>

		</div>

		<div id="cont_examinations">

			<?php

				while($row = mysqli_fetch_array($sql)){

			?>
			<div class="div_examination div_examination_new w3-card">

				<a href="viewpending.php?at=<?php echo $row['service_type']?>&id=<?php echo $row['service_id']?>" class="w3-container">

					<div class="w3-row" style="font-weight: 700">

						<div class="w3-col l8 m8 s12">

							<div>Client Name: <span><?php echo $row['client_lastname'].', '.$row['client_firstname'].' '.$row['client_middlename'] ;?></span></div>

							<div>Pet Name: <span> <?php echo $row['pet_name'] ;?> </span></div>

						</div>

						<div class="w3-col l4 m4 s12">

							<div>Date Entered:</div>

							<div> <?php echo $row['service_apt_date'];?> </div>

						</div>

					</div>

				</a>

			</div>

			<?php

				}

			?>

		</div>

	</div>

	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>

	<script type="text/javascript">

		$(document).ready(function(){

			$("#examinations").addClass("button_active");

		});

	</script>

</body>
<?php
	include("closedb_connection.php");
?>

</html>