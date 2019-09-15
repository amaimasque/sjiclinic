<!DOCTYPE html>
<html>
<head>
	<title>View pending examinations</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/logo_img.png">
	<link rel="stylesheet" href="css/w3.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
	<style type="text/css">
		body{
  			background: #BBD3B3;
  		}
  		body,h1,h2,h3,h4,h5,h6 {font-family: "Segoe UI", sans-serif}
  		#myTopBar, .w3-top{
		  background-color: #4f4f4f;
		}
		#myTopBar a{
		  color: #dcd8d2;
		  text-decoration: none;
		}
		#myTopBar a:hover, #myTopBar a.active{
		  background-color: #3b3a3a;
		}
		#myTopBar a.active{
		  pointer-events: none;
  		  cursor: default;
		}
		#content{
			padding: 100px 20%;
		}
		#content .w3-card{
			background: white;
		}
		#formExamination_new .w3-cell.multiplecol{
			padding-right: 10px;
		}
		#formExamination_new .w3-card{
			margin-bottom: 10px;
		}
		.contstatus{
			margin-bottom: 20px;
		}
		.w3-container.w3-green{
			background-color: #833439!important;
		}
		.bar_appointment .w3-btn:not(:last-child){
			border-right: 1px solid #D54B52;
		}
		@media screen and (max-width: 600px){
			#bar_vaccine .w3-btn:not(:last-child){
				width: 50%;
				border-bottom: 1px solid #D54B52;
			}
			#bar_vaccine .w3-btn:nth-child(2), #bar_vaccine .w3-btn:nth-child(4){
				border-right: none;
			}
			#bar_vaccine_delete{
				width: 100%;
			}
		}
		@media screen and (max-width: 644px){
			#bar_consultation .w3-btn{
				width: 33.33%;
			}
			#bar_consultation .w3-btn:nth-child(3){
				border-right: none;
			}
			#bar_consultation .w3-btn:nth-child(1), #bar_consultation .w3-btn:nth-child(2), #bar_consultation .w3-btn:nth-child(3){
				border-bottom: 1px solid #D54B52;
			}
		}
		@media screen and (min-width: 1104px){
			form{
				text-align: center;
			}
			.contstatus{
				width: 75%;
				display: inline-block;
			}
			.contstatus .w3-mobile{
				width: 90%;
			}
		}
		@media screen and (max-width: 983px){
			#clientinfo{
				padding-right: 0px!important;
			}
		}
		@media screen and (max-width: 1166px){
			#content{
				padding: 50px 50px!important;
			}
		}
	</style>
</head>
<body>
	<?php
		require("nav_admin.php");
	?>

	<!--MODALS!-->
	<div class="w3-modal" id="modal_success">
		<div class="w3-modal-content" style="width: 30%">
			<header class="w3-container" style="background-color: #729380"> 
		      <span onclick="document.getElementById('modal_success').style.display='none'" 
		      class="w3-button w3-display-topright">&times;</span>
		      <h4>Please Confirm</h4>
		    </header>
		    <div class="w3-container">
		    	<p>Are you sure you want to submit the form?</p>
		    </div>
		    <div class="w3-container">
		    	<div class="w3-cell-row">
			    	<div class="w3-cell">
			    		<a href="index.html"><button class="w3-button w3-border" style="width: 100%">Yes</button></a>
			    	</div>
			    	<div class="w3-cell">
			    		<button class="w3-button w3-border" style="width: 100%" onclick="document.getElementById('modal_success').style.display='none'">No</button>
			    	</div>
			    </div>
			</div>
		</div>
	</div>
	<div class="w3-modal" id="modal_cancel">
		<div class="w3-modal-content" style="width: 30%">
			<header class="w3-container" style="background-color: #729380"> 
		      <span onclick="document.getElementById('modal_cancel').style.display='none'" 
		      class="w3-button w3-display-topright">&times;</span>
		      <h4>Confirm</h4>
		    </header>
		    <div class="w3-container">
		    	<p>Appointment is not successfully submitted. Are you sure you want to cancel? All details will be disregared.</p>
		    </div>
		    <div class="w3-container">
		    	<div class="w3-cell-row">
			    	<div class="w3-cell">
			    		<a href="index.html"><button class="w3-button w3-border" style="width: 100%">Yes</button></a>
			    	</div>
			    	<div class="w3-cell">
			    		<button class="w3-button w3-border" style="width: 100%" onclick="document.getElementById('modal_cancel').style.display='none'">No</button>
			    	</div>
			    </div>
			</div>
		</div>
	</div>

	<div id="content">
		<div class="w3-container" id="formExamination_new">
			<div class="w3-row" id="contnewinfo">
				<div class="w3-col l5 m12 s12 w3-card">
					<div class="w3-container w3-green">
						 <h3>Client ID <span></span></h3>
					</div>
					<div class="w3-container" style="padding: 20px;">
						<div class="w3-row">
							<div class="w3-col l4 s4 m4">
								<label>First Name</label>
							</div>
							<div class="w3-col l8 s8 m8">
								<span></span>
							</div>
						</div>
						<div class="w3-row">
							<div class="w3-col l4 s4 m4">
								<label>Address</label>
							</div>
							<div class="w3-col l8 s8 m8">
								<span></span>
							</div>
						</div>
						<div class="w3-row">
							<div class="w3-col l4 s4 m4">
								<label>Contact No.</label>
							</div>
							<div class="w3-col l8 s8 m8">
								<span></span>
							</div>
						</div>
					</div>		
				</div>
				<div class="w3-col l7 m12 s12 w3-card">
					<div class="w3-container w3-green">
						 <h3>Patient ID<span></span></h3>
					</div>
					<div class="w3-container" style="padding: 20px;">
						<div class="w3-row">
							<div class="w3-col l5 s12">
								<label>Pet Name</label>
								<span></span>	
							</div>
							<div class="w3-col l4 s6">
								<label>Birthdate</label>
								<span></span>
							</div>
							<div class="w3-col l3 s6">
								<label>Sex</label>
								<span></span>
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
							<div class="w3-col l6 m12 s12">
								<label>Color Markings</label>
							</div>
							<div class="w3-col l6 m12 s12">
								<label>Previous Veterinarian</label>
							</div>
						</div>
					</div>	
				</div>
			</div>

			<div id="cont_vaccine_buttons">
				<div class="w3-card w3-left-align" id="contvaccine">
					<div class="w3-container w3-green">
						<h3>For Vaccine</h3>
					</div>
					<div class="w3-container" style="padding: 20px">
						<div class="w3-cell-row">
							<div class="w3-cell">
								<label>Complaint/Request</label>
							</div>
							<div class="w3-cell">
								<span></span>
							</div>
						</div>
						<div class="w3-row">
							<div class="w3-col l6 m6 s12">
								<label>Frequency & duration</label>
							</div>
							<div class="w3-col l6 m6 s12">
								<label>Previous treatment for problem</label>
							</div>
						</div>
						<div class="w3-row">
							<div class="w3-col l6 m6 s12">
								<span></span>
							</div>
							<div class="w3-col l6 m6 s12">
								<span></span>
							</div>
						</div>
						<div class="w3-cell-row">
							<div class="w3-cell">
								<label>Response for Treatment</label>
							</div>
							<div class="w3-cell">
								<span></span>
							</div>
						</div>
					</div>		
				</div>

				<div class="w3-center">
					<div class="w3-bar w3-round-xlarge bar_appointment" id="bar_vaccine">
						<button class="w3-bar-item w3-btn" style="background: #FDEEF1">Cancel</button>
						<button class="w3-bar-item w3-btn" style="background: #FDEEF1">Info</button>
						<button class="w3-bar-item w3-btn" style="background: #FDEEF1">Amount</button>
						<button class="w3-bar-item w3-btn" style="background: #FDEEF1">Edit</button>
						<button class="w3-bar-item w3-btn" id="bar_vaccine_delete" style="background: #FDEEF1">Delete</button>
					</div>	
				</div>
			</div>
			
			<div id="cont_consult_buttons">
				<div class="w3-card w3-left-align" id="contconsult">
					<div class="w3-container w3-green">
						<h3>For Consultation</h3>
					</div>
					<div class="w3-container" style="padding: 20px">
						<div class="w3-cell-row">
							<div class="w3-cell w3-col l3 m6 s12 multiplecol">
								<label>Attitude</label>
								<span></span>
							</div>
							<div class="w3-cell w3-col l3 m6 s12 multiplecol">
								<label>Drinking</label>
								<span></span>
							</div>
							<div class="w3-cell w3-col l3 m6 s12 multiplecol">
								<label>Bowels</label>
								<span></span>
							</div>
							<div class="w3-cell w3-col l3 m6 s12">
								<label>Coughing</label>
								<span></span>
							</div>
						</div>
						<div class="w3-cell-row">
							<div class="w3-cell w3-col l3 m6 s12 multiplecol">
								<label>Urination</label>
								<span></span>
							</div>
							<div class="w3-cell w3-col l3 m6 s12 multiplecol">
								<label>Appetite</label>
								<span></span>
							</div>
							<div class="w3-cell w3-col l3 m6 s12 multiplecol">
								<label>Vomiting</label>
								<span></span>
							</div>
							<div class="w3-cell w3-col l3 m6 s12">
								<label>Sneezing</label>
								<span></span>
							</div>
						</div>
						<div class="w3-cell-row">
							<div class="w3-cell">
								<label>Notes</label>
								<span></span>
							</div>
						</div>
					</div>		
				</div>

				<div class="w3-center">
					<div class="w3-bar w3-round-xlarge bar_appointment" id="bar_consultation">
						<button class="w3-bar-item w3-btn" style="background: #FDEEF1">Cancel</button>
						<button class="w3-bar-item w3-btn" style="background: #FDEEF1">Diagnosis</button>
						<button class="w3-bar-item w3-btn" style="background: #FDEEF1">Prognosis</button>
						<button class="w3-bar-item w3-btn" style="background: #FDEEF1">Amount</button>
						<button class="w3-bar-item w3-btn" style="background: #FDEEF1">Edit</button>
						<button class="w3-bar-item w3-btn" style="background: #FDEEF1">Delete</button>
					</div>	
				</div>
			</div>
			
			<div id="cont_surgery_buttons">
				<div class="w3-card w3-left-align" id="contconsent">
					<div class="w3-container w3-green">
						<h3>For Surgery</h3>
					</div>
					<div class="w3-container" style="padding: 20px;">
						<div class="w3-cell-row">
							<div class="w3-cell">
								<span>Agreed with:</span>
							</div>
							<div class="w3-cell">
								<span></span>
							</div>
						</div>
					</div>
				</div>

				<div class="w3-center">
					<div class="w3-bar w3-round-xlarge bar_appointment" id="bar_surgery">
						<button class="w3-bar-item w3-btn" style="background: #FDEEF1">Cancel</button>
						<button class="w3-bar-item w3-btn" style="background: #FDEEF1">Amount</button>
						<button class="w3-bar-item w3-btn" style="background: #FDEEF1">Edit</button>
						<button class="w3-bar-item w3-btn" style="background: #FDEEF1">Delete</button>
					</div>	
				</div>
			</div>
			
		</div>

	</div>
	
	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#examinations").addClass("button_active");
		});
	</script>
</body>
</html>