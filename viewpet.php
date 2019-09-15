<!DOCTYPE html>
<html>
<head>
	<title>Patient Information</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/logo_img.png">
	<link rel="stylesheet" href="css/w3.css">
	<link rel="stylesheet" href="css/appointment.css">
	<link rel="stylesheet" href="css/sjiclinic.css">
	<link rel="stylesheet" href="css/jquery.dataTables.min.css"/>
	<script type="text/javascript" src="js/jquery-3.3.1.js"></script>
	<style type="text/css">
		#cont_all{
			padding: 0px 20%;
			margin-top: 50px;
		}
		.w3-card{
			background: white;
		}
		@media screen and (max-width: 993px){
			#clientinfo{
				margin-right: 0px;
			}
			#cont_all{
				padding: 10px 50px; 
			}
		}
	</style>
</head>
<body class="w3-cell w3-cell-middle" style="width: 100vw; height: 100vh">
	<?php
		require("nav_admin.php");
	?>

	<div class="w3-modal" id="modal_visit">
		<div class="w3-modal-content" style="width: 30%">
			<header class="w3-container" style="background-color: #729380"> 
		      <span onclick="document.getElementById('modal_visit').style.display='none'" class="w3-button w3-display-topright">&times;</span>
		      <h4>Visit Information</h4>
		    </header>
		    <div class="w3-container" style="padding: 20px">
		    	
		    </div>
		    <div class="w3-container w3-center">
		    	<div class="w3-bar">
			    	<button class="w3-button w3-border" onclick="document.getElementById('modal_visit').style.display='none'">CANCEL</button>
			    	<a class="w3-button w3-border">EDIT</a>
			    </div>
			</div>
		</div>
	</div>

	<div class="w3-modal" id="modal_delete">
		<div class="w3-modal-content" style="width: 30%">
			<header class="w3-container" style="background-color: #729380"> 
		      <span onclick="document.getElementById('modal_delete').style.display='none'" class="w3-button w3-display-topright">&times;</span>
		      <h4>Confirm</h4>
		    </header>
		    <div class="w3-container" style="padding: 20px">
		    	<p>You are about to delete pending examination. Are you sure?</p>
		    </div>
		    <div class="w3-container w3-center">
		    	<div class="w3-bar">
			    	<button class="w3-button w3-border" onclick="document.getElementById('modal_delete').style.display='none'">NO</button>
			    	<a class="w3-button w3-border">YES</a>
			    </div>
			</div>
		</div>
	</div>


	<div id="cont_all">
		<div class="w3-container" id="formExamination">
			
			<div class="w3-row" id="contnewinfo">
				<div class="w3-col l8 m12 s12" id="clientinfo">
					<div class="w3-card">
						<div class="w3-container w3-green">
							<h3><i class="demo-icon icon-pet"></i> Pet ID #</h3>
						</div>
						<div class="w3-container" style="padding: 20px;">
							<div class="w3-row">
								<div class="w3-col l6 m6 s12">
									<label>Pet Name</label>	
								</div>
								<div class="w3-col l6 m6 s12">
									<label>Age</label>	
								</div>
							</div>
							<div class="w3-row">
								<div class="w3-col l6 m6 s12">
									<label>Birthdate</label>	
								</div>
								<div class="w3-col l6 m6 s12">
									<label>Sex</label>	
								</div>
							</div>
							<div class="w3-row">
								<div class="w3-col l6 m6 s12">
									<label>Species</label>	
								</div>
								<div class="w3-col l6 m6 s12">
									<label>Breed</label>	
								</div>
							</div>
							<div class="w3-row">
								<div class="w3-col l12 m12 s12">
									<label>Color Markings</label>	
								</div>
								<div class="w3-col l12 m12 s12">
									<label>Previous Veterinarian</label>	
								</div>
							</div>
						</div>
					</div>		
				</div>
				<div class="w3-col l4 m12 s12" style="text-align: left">
					<div class="w3-card">
						<div class="w3-container w3-green">
							<h3><i class="demo-icon icon-service"></i> Services</h3>
						</div>
						<div class="w3-container" style="padding: 20px; height: 150px">
							
						</div>
					</div>	
				</div>
			</div>			
			<div id="cont_pets" style="background: white">
				<div class="w3-card">
					<div class="w3-container w3-green">
						<h3><i class="demo-icon icon-visit"></i> Visits</h3>
					</div>
					<div class="w3-container w3-padding-16">
						<table id="tbl_pets" class="display w3-table w3-border w3-striped" style="width: 100%">
							<thead>
								<tr>
									<th>ID</th>
									<th>Date</th>
									<th>Service</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<tr>
								<td>1</td>
									<td>March 3, 2019</td>
									<td>Grooming</td>
									<td><button class="w3-btn w3-text-white" onclick="document.getElementById('modal_visit').style.display='block'" style="background: #729380"><i class="fa fa-eye"></i> View</button></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			
		</div>

	</div>
	
	<script type="text/javascript">
		$(document).ready(function(){
			$("#history").addClass("button_active");
			$('#tbl_pets').DataTable();
		});	
	</script>
	<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
</body>
</html>