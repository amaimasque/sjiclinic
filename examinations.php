<!DOCTYPE html>

<html>

<head>

	<title>View pending examinations</title>

	<meta charset="utf-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="icon" href="images/logo_img.png">

	<link rel="stylesheet" href="css/w3.css">

	<link rel="stylesheet" href="css/sjiclinic.css">

	<link rel="stylesheet" href="css/examinations.css">

</head>

<body>

	<?php

		require("nav_admin.php");

	?>

	<div class="w3-container" id="cont_all">

		<div class="w3-row" style="padding: 20px 20%; margin: auto">

			<div class="w3-col l3 m4 s12">

				<select class="w3-select w3-round-xxlarge sji-dark-green-bg" id="sel_filter">
					<option value="" disabled selected>Filter By</option>
					<option value="aptType">Appointment Type</option>
					<option value="breed">Breed</option>
					<option value="species">Species</option>
					<option value="date">Date</option>
				</select>

			</div>

			<div class="w3-col l9 m8 s12">

				<input class="w3-input w3-round-xxlarge w3-border" type="text" name="texttosearch" placeholder="Search pending..." id="texttosearch">

			</div>

		</div>

		<div class="w3-center" style="font-weight: 900">

			<div id="divnumexams"></div>

			<div class="sji-dark-red-text">PENDING EXAMINATION(S)</div>

		</div>

		<div id="cont_examinations"></div>

	</div>

	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>

	<script type="text/javascript" src="js/examinations.js"></script>

</body>

</html>