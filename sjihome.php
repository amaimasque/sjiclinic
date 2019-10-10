<!DOCTYPE html>

<html>

<head>

	<title>Welcome! | SJI Admin's Corner</title>

	<meta charset="utf-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">

  	<link rel="icon" href="images/logo_img.png">

	<link rel="stylesheet" href="css/w3.css">

	<link rel="stylesheet" href="css/sjiclinic.css">

	<link rel="stylesheet" href="css/chartist.min.css">

	<style type="text/css">

body{

	font-family: "Segoe UI", sans-serif;

}

#contbody{

	position: absolute;

    margin: auto;

    top: 0;

    right: 0;

    bottom: 0;

    left: 0;

    width: 70%;

    height: 75%;

}


.ct-chart{
	
	height: 250px;
	width: 100%;

}

.visits{

	margin: 10px;
	padding: 20px;
	text-align: center;
	background: #FDEEF1;

}

.novisits{

	font-size: 20pt;
	color: #802F33;
	font-weight: bold;

}

#cont_legends div{

	display: inline-block;
	text-align: center;

}

@media screen and (max-width: 500px){

	#contbody{
		margin-top: 70px;
	}

}

@media screen and (max-width: 1001px){

	#contchart{

		height: 350px!important;
	}

	.ct-chart{

		height: 250px;
	}

}

@media screen and (max-width: 615px){

	#contbody{

		width: 90%;

	}

	#cont_legends{
		background: red
	}

}

</style>



</head>

<body>

	<?php

		require("nav_admin.php");

	?>

	<div class="w3-container" id="contbody">

		<h1 class="w3-wide">WELCOME</h1>

		<div class="w3-topbar w3-border-black" style="width: 100%"></div>

		<div class="w3-row">
			<div class="w3-col l4 m6 s12">
				<div class="w3-card visits">
					<div id="noweekly" class="novisits">0</div>
					<div>WEEKLY VISITS</div>
				</div>
			</div>
			<div class="w3-col l4 m6 s12">
				<div class="w3-card visits">
					<div id="nomonthly" class="novisits">0</div>
					<div>MONTHLY VISITS</div>
				</div>
			</div>
			<div class="w3-col l4 m12 s12">
				<div class="w3-card visits">
					<div id="noyearly" class="novisits">0</div>
					<div>YEARLY VISITS</div>
				</div>
			</div>
		</div>

		<div class="w3-row">

			<div class="w3-col l6 m12 s12" id="contchart">

				<h3>TODAY'S APPOINTMENTS</h3>

				<div class="ct-chart ct-perfect-fourth" id="chart_daily"></div>

			</div>

			<div class="w3-col l6 m12 s12" id="contchart">

				<h3>WEEKLY REPORT</h3>

				<div class="ct-chart ct-perfect-fourth" id="chart_weekly"></div>

				<div id="cont_legends">
					<div class="w3-col l4 m4 s4" style="color: #D70206;">
						<span>&diams; Consultation</span>
					</div>
					<div class="w3-col l4 m4 s4" style="color: #F05B4F;">
						<span>&diams; Confinement</span>
					</div>
					<div class="w3-col l4 m4 s4" style="color: #F4C63D;">
						<span>&diams; Surgery</span>
					</div>
					<div class="w3-col l6 m6 s6" style="color: #D17905;">
						<span>&diams; Vaccine</span>
					</div>
					<div class="w3-col l6 m6 s6" style="color: #453D3F;">
						<span>&diams; Laboratory</span>
					</div>
				</div>
			
			</div>
	
		</div>				

	</div>



	<script src="js/chartist.min.js"></script>

	<script type="text/javascript">

		<?php require "query/homequeryjs.php" ?>

	</script>

</body>

</html>