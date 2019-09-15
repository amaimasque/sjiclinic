<!DOCTYPE html>
<html>
<head>
	<title>View pending examinations</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/logo_img.png">
	<link rel="stylesheet" href="css/w3.css">
	<link rel="stylesheet" href="css/jquery.dataTables.min.css"/>
	<script type="text/javascript" src="js/jquery-3.3.1.js"></script>
	<link rel="stylesheet" href="css/sjiclinic.css" />
	<link rel="stylesheet" href="css/appointment.css">
	<style type="text/css">
		#cont_all{
			padding: 0px 20%;
		}
		.w3-card{
			background: white;
			margin-top: 10px;
		}
		@media screen and (max-width: 676px){
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

	<div class="w3-modal" id="modal_amount">
		<div class="w3-modal-content" style="width: 30%">
			<header class="w3-container" style="background-color: #729380"> 
		      <span onclick="document.getElementById('modal_amount').style.display='none'" class="w3-button w3-display-topright">&times;</span>
		      <h4>Enter Amount</h4>
		    </header>
		    <div class="w3-container" style="padding: 20px">
		    	<form action="" method="POST" id="form_diagnosis">
		    		<div class="w3-row">
		    			<div class="w3-col l12 m12 s12 w3-left-align">
		    				<label>Amount Due</label>
		    				<input class="w3-input" type="text" name="consultation_diagnosis_urine" id="consultation_diagnosis_urine">
		    			</div>
		    		</div>
		    		<div class="w3-row">
		    			<div class="w3-col l6 m6 s6 w3-left-align">
		    				<label>Amount Given</label>
		    				<input class="w3-input" type="text" name="consultation_diagnosis_urine" id="consultation_diagnosis_urine">
		    			</div>
		    			<div class="w3-col l6 m6 s6 w3-left-align">
		    				<label>Change</label>
		    				<input class="w3-input" type="text" name="consultation_diagnosis_urine" id="consultation_diagnosis_urine">
		    			</div>
		    		</div>
		    	</form>
		    </div>
		    <div class="w3-container w3-center">
		    	<div class="w3-bar">
			    	<button class="w3-button w3-border" onclick="document.getElementById('modal_amount').style.display='none'">CANCEL</button>
			    	<a class="w3-button w3-border">SAVE</a>
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


	<div id="cont_all" style="margin-top: 50px;">
		<div class="w3-container">
			
			<div class="w3-cell-row" id="contnewinfo">
				<div class="w3-cell w3-col l6 m12" id="clientinfo">
					<div class="w3-card">
						<div class="w3-container w3-green">
							<h3><i class="demo-icon icon-client"></i> Client Information</h3>
						</div>
						<div class="w3-container" style="padding: 20px;">
							<div class="w3-cell-row">
								<div class="w3-cell ">
									<label>Full Name</label>	
								</div>
							</div>
							<div class="w3-cell-row">
								<div class="w3-cell">
									<label>Address</label>	
								</div>
							</div>
							<div class="w3-cell-row">
								<div class="w3-cell">
									<label>Contact Number</label>	
								</div>
							</div>
						</div>
					</div>		
				</div>
				<div class="w3-cell w3-col l6 m12" style="text-align: left">
					<div class="w3-card">
						<div class="w3-container w3-green">
							<h3><i class="demo-icon icon-stat"></i> Statistics</h3>
						</div>
						<div class="w3-container" style="padding: 20px;">
							<div class="w3-cell-row">
								<div class="w3-cell">
									<label>No. of Pets</label>	
								</div>
							</div>
							<div class="w3-cell-row">
								<div class="w3-cell">
									<label>Times Visited</label>	
								</div>
							</div>
							<div class="w3-cell-row">
								<div class="w3-cell multiplecol">
									<label>Services Used</label>
								</div>
							</div>
						</div>
					</div>	
				</div>
			</div>			
			<div id="cont_pets" style="background: white; margin-top: 10px">
				<div class="w3-card">
					<div class="w3-container w3-green">
						<h3><i class="demo-icon icon-pet"></i> Pets Owned</h3>
					</div>
					<div class="w3-container w3-padding-16">
						<table id="example" class="display w3-table w3-border w3-striped w3-container" style="width:100%">
							<thead>
								<tr>
									<th>ID</th>
									<th>Pet Name</th>
									<th>Times Visited</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>1</td>
									<td>Lorem</td>
									<td>1</td>
									<td><a href="viewpet.php" class="w3-btn w3-text-white" style="background: #729380" style="width: 200px"><i class="fa fa-eye"></i> View</a></td>
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
			$('#example').DataTable();
		});	
	</script>
	<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
</body>
</html>