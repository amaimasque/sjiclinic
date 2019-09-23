<!DOCTYPE html>

<html>

<head>

	<title>View pending examinations</title>

	<meta charset="utf-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="icon" href="images/logo_img.png">

	<link rel="stylesheet" href="css/w3.css">

	<link rel="stylesheet" href="css/appointment.css">

	<link rel="stylesheet" href="css/sjiclinic.css">

	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>

	<script type="text/javascript" src="js/w3.js"></script>

	<style type="text/css">

		#contcontent{

			padding: 0px 10%;

		}

		.w3-card{

			background: white

		}

		#cont_details{

			margin-top: 10px;

		}

		.bar_appointment .w3-btn:not(:last-child){

			border-right: 1px solid #D54B52;

		}

		.bar_appointment{

			margin-top: 10px

		}

		.cont_buttons{

			display: none;

		}

		.cont_buttons .w3-btn:hover{

			background: #823336;

			color: white;

		}

		.cont_buttons .w3-btn{

			background: #FDEEF1;

		}

		h4{

			color: white;

		}

		@media screen and (max-width: 600px){

			#bar_vaccine .w3-btn:not(:last-child){

				width: 50%;

				border-bottom: 1px solid #D54B52;

			}

			#bar_vaccine .w3-btn:nth-child(2), #bar_vaccine .w3-btn:nth-child(4){

				border-right: none;

			}

			#bar_vaccine .w3-btn:nth-child(5){

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

	<!-- MODAL FOR VACCINE ADDITIONAL INFO -->

	<div class="w3-modal" id="modal_vaccine_info">

		<div class="w3-modal-content" style="width: 30%">

			<header class="w3-container" style="background-color: #729380"> 

		      <span onclick="document.getElementById('modal_vaccine_info').style.display='none'" 

		      class="w3-button w3-display-topright">&times;</span>

		      <h4><i class="demo-icon icon-addinfo"></i>Additional Information</h4>

		    </header>

		    <div class="w3-container" style="padding: 20px">

		    	<form action="" method="POST" id="vaccine_form_additional_info">

		    		

		    		<div class="w3-row">

		    			<div class="w3-col l6 m6 s6 w3-left-align">

		    				<label>Temperature</label>

		    				<input class="w3-input" type="text" name="vaccine_addinfo_temp" id="vaccine_addinfo_temp">

		    			</div>

		    			<div class="w3-col l6 m6 s6 w3-left-align">

		    				<label>Height</label>

		    				<input class="w3-input" type="text" name="vaccine_addinfo_ht" id="vaccine_addinfo_ht">

		    			</div>

		    		</div>

		    		<div class="w3-row">

		    			<div class="w3-col l12 m12 s12 w3-left-align">

		    				<label>Vaccine Given</label>

		    				<input class="w3-input" type="text" name="vaccine_addinfo_vcc" id="vaccine_addinfo_vcc">

		    			</div>

		    		</div>

		    	</form>

		    </div>

		    <div class="w3-container w3-center">

		    	<div class="w3-bar">

			    	<button class="w3-button w3-border" onclick="document.getElementById('modal_vaccine_info').style.display='none'">CANCEL</button>

			    	<a class="w3-button w3-border">SAVE</a>

			    </div>

			</div>

		</div>

	</div>

	<!-- MODAL FOR CONSULTATION DIAGNOSIS -->

	<div class="w3-modal" id="modal_consultation_diagnosis">

		<div class="w3-modal-content">

			<header class="w3-container" style="background-color: #729380"> 

		      <span onclick="document.getElementById('modal_consultation_diagnosis').style.display='none'" 

		      class="w3-button w3-display-topright">&times;</span>

		      <h4>Diagnostic Test</h4>

		    </header>

		    <div class="w3-container" style="padding: 20px">

		    	<form action="" method="POST" id="form_diagnosis">

		    		<div class="w3-row">

		    			<div class="w3-col l3 m6 s6 w3-left-align">

		    				<label>Blood Exam</label>

		    				<input class="w3-input" type="text" name="consultation_diagnosis_blood" id="consultation_diagnosis_blood">

		    			</div>

		    			<div class="w3-col l3 m6 s6 w3-left-align">

		    				<label>Urine Exam</label>

		    				<input class="w3-input" type="text" name="consultation_diagnosis_urine" id="consultation_diagnosis_urine">

		    			</div>

		    			<div class="w3-col l3 m6 s6 w3-left-align">

		    				<label>Distemper Test</label>

		    				<input class="w3-input" type="text" name="consultation_diagnosis_distemper" id="consultation_diagnosis_distemper">

		    			</div>

		    			<div class="w3-col l3 m6 s6 w3-left-align">

		    				<label>Parvo Test</label>

		    				<input class="w3-input" type="text" name="consultation_diagnosis_pvtest" id="consultation_diagnosis_pvtest">

		    			</div>

		    		</div>

		    		<div class="w3-row">

		    			<div class="w3-col l3 m6 s6 w3-left-align">

		    				<label>Fecalysis</label>

		    				<input class="w3-input" type="text" name="consultation_diagnosis_fecalysis" id="consultation_diagnosis_fecalysis">

		    			</div>

		    			<div class="w3-col l3 m6 s6 w3-left-align">

		    				<label>Skin Scraping</label>

		    				<input class="w3-input" type="text" name="consultation_diagnosis_scraping" id="consultation_diagnosis_scraping">

		    			</div>

		    			<div class="w3-col l3 m6 s6 w3-left-align">

		    				<label>Ehrlichia Test</label>

		    				<input class="w3-input" type="text" name="consultation_diagnosis_ehtest" id="consultation_diagnosis_ehtest">

		    			</div>

		    			<div class="w3-col l3 m6 s6 w3-left-align">

		    				<label>HW Test</label>

		    				<input class="w3-input" type="text" name="consultation_diagnosis_hwtest" id="consultation_diagnosis_hwtest">

		    			</div>

		    		</div>

		    		<div class="w3-row">

		    			<div class="w3-col l3 m6 s6 w3-left-align">

		    				<label>Ear Swabbing</label>

		    				<input class="w3-input" type="text" name="consultation_diagnosis_earswab" id="consultation_diagnosis_earswab">

		    			</div>

		    			<div class="w3-col l3 m6 s6 w3-left-align">

		    				<label>Vaginal Smear</label>

		    				<input class="w3-input" type="text" name="consultation_diagnosis_vagsmear" id="consultation_diagnosis_vagsmear">

		    			</div>

		    			<div class="w3-col l3 m6 s6 w3-left-align">

		    				<label>Ultrasound</label>

		    				<input class="w3-input" type="text" name="consultation_diagnosis_ultras" id="consultation_diagnosis_ultras">

		    			</div>

		    			<div class="w3-col l3 m6 s6 w3-left-align">

		    				<label>X-ray</label>

		    				<input class="w3-input" type="text" name="consultation_diagnosis_xray" id="consultation_diagnosis_xray">

		    			</div>

		    		</div>

		    		<div class="w3-row">

		    			<div class="w3-col l12 m12 s12 w3-left-align">

		    				<label>Other Test/s</label>

		    				<input class="w3-input" type="text" name="consultation_diagnosis_otest" id="consultation_diagnosis_otest">

		    			</div>

		    		</div>

		    	</form>

		    </div>

		    <div class="w3-container w3-center">

		    	<div class="w3-bar">

			    	<button class="w3-button w3-border" onclick="document.getElementById('modal_consultation_diagnosis').style.display='none'">CANCEL</button>

			    	<a class="w3-button w3-border">SAVE</a>

			    </div>

			</div>

		</div>

	</div>

	<!-- MODAL FOR CONSULTATION PROGNOSIS -->

	<div class="w3-modal" id="modal_consultation_prognosis">

		<div class="w3-modal-content">

			<header class="w3-container" style="background-color: #729380"> 

		      <span onclick="document.getElementById('modal_consultation_prognosis').style.display='none'" 

		      class="w3-button w3-display-topright">&times;</span>

		      <h4>Prognosis</h4>

		    </header>

		    <div class="w3-container" style="padding: 20px">

		    	<form action="" method="POST" id="form_diagnosis">

		    		<div class="w3-row">

		    			<div class="w3-col l12 m12 s12 w3-left-align">

		    				<label>Assessment/DX/Prognosis</label>

		    				<input class="w3-input" type="text" name="consultation_prog_dx" id="consultation_prog_dx">

		    			</div>

		    		</div>

		    		<div class="w3-row">

		    			<div class="w3-col l6 m6 s12 w3-left-align">

		    				<label>Treatment</label>

		    				<input class="w3-input" type="text" name="consultation_prog_treat" id="consultation_prog_treat">

		    			</div>

		    			<div class="w3-col l6 m6 s12 w3-left-align">

		    				<label>Prescribed Medication</label>

		    				<input class="w3-input" type="text" name="consultation_prog_rx" id="consultation_prog_rx">

		    			</div>

		    		</div>

		    	</form>

		    </div>

		    <div class="w3-container w3-center">

		    	<div class="w3-bar">

			    	<button class="w3-button w3-border" onclick="document.getElementById('modal_consultation_prognosis').style.display='none'">CANCEL</button>

			    	<a class="w3-button w3-border">SAVE</a>

			    </div>

			</div>

		</div>

	</div>

	<div class="w3-modal" id="modal_amount">

		<div class="w3-modal-content" style="width: 30%">

			<header class="w3-container" style="background-color: #729380"> 

		      <span onclick="document.getElementById('modal_amount').style.display='none'" class="w3-button w3-display-topright">&times;</span>

		      <h4><i class="demo-icon icon-amount"></i> Enter Amount</h4>

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

		      <h4><i class="demo-icon icon-del"></i> Confirm</h4>

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


	
	<div class="w3-cell w3-cell-middle" style="height: 100vh; width: 100vw; padding-top: 50px">

		<div class="w3-container" id="contcontent">


			<div id="cont_info" w3-include-html="" style="margin-top: 10px"></div>

			<div id="cont_details" w3-include-html=""></div>

			<div id="cont_grooming" style="display: none; margin-top: 10px">

				<div class="w3-card w3-left-align">

					<div class="w3-container w3-green">

						<h3><i class="demo-icon icon-service"></i> Grooming</h3>

					</div>

					<div class="w3-container" style="padding: 20px">

						<div class="w3-cell-row">

							<div class="w3-cell">

								<label>Cut</label>

								<input class="w3-input" type="text" disabled name="grooming_cut" id="grooming_cut" disabled="false">

							</div>

						</div>	

					</div>	

				</div>


				<div class="cont_buttons" id="cont_grooming_buttons">

					<div class="w3-center">

						<div class="w3-bar w3-round-xlarge bar_appointment" id="bar_grooming">

							<a href="examinations.php" class="w3-bar-item w3-btn">Cancel</a>

							<button class="w3-bar-item w3-btn" onclick="document.getElementById('modal_amount').style.display='block'">Amount</button>

							<button class="w3-bar-item w3-btn" id="btn_edit" onclick="enableForm()">Edit</button>

							<button class="w3-bar-item w3-btn" onclick="document.getElementById('modal_delete').style.display='block'">Delete</button>

						</div>	

					</div>

				</div>

			</div>


			<div class="cont_buttons" id="cont_vaccine_buttons">

				<div class="w3-center">

					<div class="w3-bar w3-round-xlarge bar_appointment" id="bar_vaccine">

						<a href="examinations.php" class="w3-bar-item w3-btn">Cancel</a>

						<button class="w3-bar-item w3-btn" onclick="document.getElementById('modal_vaccine_info').style.display='block'">Info</button>

						<button class="w3-bar-item w3-btn" onclick="document.getElementById('modal_amount').style.display='block'">Amount</button>

						<button class="w3-bar-item w3-btn" id="btn_edit" onclick="enableForm()">Edit</button>

						<button class="w3-bar-item w3-btn" onclick="document.getElementById('modal_delete').style.display='block'">Delete</button>

					</div>	

				</div>

			</div>

			

			<div class="cont_buttons" id="cont_consultation_buttons">	

				<div class="w3-center">

					<div class="w3-bar w3-round-xlarge bar_appointment" id="bar_consultation">

						<a href="examinations.php" class="w3-bar-item w3-btn">Cancel</a>

						<button class="w3-bar-item w3-btn" onclick="document.getElementById('modal_consultation_diagnosis').style.display='block'">Diagnosis</button>

						<button class="w3-bar-item w3-btn" onclick="document.getElementById('modal_consultation_prognosis').style.display='block'">Prognosis</button>

						<button class="w3-bar-item w3-btn" onclick="document.getElementById('modal_amount').style.display='block'">Amount</button>

						<button class="w3-bar-item w3-btn" id="btn_edit" onclick="enableForm()">Edit</button>

						<button class="w3-bar-item w3-btn" onclick="document.getElementById('modal_delete').style.display='block'">Delete</button>

					</div>	

				</div>

			</div>


			<div class="cont_buttons" id="cont_surgery_buttons">

				<div class="w3-center">

					<div class="w3-bar w3-round-xlarge bar_appointment" id="bar_surgery">

						<a href="examinations.php" class="w3-bar-item w3-btn">Cancel</a>

						<button class="w3-bar-item w3-btn" onclick="document.getElementById('modal_amount').style.display='block'">Amount</button>

						<button class="w3-bar-item w3-btn" id="btn_edit" onclick="enableForm()">Edit</button>

						<button class="w3-bar-item w3-btn" onclick="document.getElementById('modal_delete').style.display='block'">Delete</button>

					</div>	

				</div>

			</div>
			
		</div>

	</div>

	<script type="text/javascript">

		function enableForm(){
			if(edit_flag==0){
				document.getElementById("btn_edit").innerHTML="Save";
				edit_flag = 1;
			}else{
				document.getElementById("btn_edit").innerHTML="Edit";					
				edit_flag = 0;
			}
		}

		$(document).ready(function(){

			$("#examinations").addClass("button_active");

			document.getElementById("cont_info").setAttribute("w3-include-html","forms/clientinfo.html");
			var form = "<?php echo $_GET['at'];?>";
			
			<?php
				$type_of_form = $_GET['at'];
				if($type_of_form!="grooming"){
			?>
				var edit_flag = 0;
				document.getElementById("cont_"+form+"_buttons").style.display="block";
				//enableForm(); //ERROR
			<?php
				}else{
			?>
				document.getElementById("cont_grooming").style.display="block";
				document.getElementById("cont_grooming_buttons").style.display="block";
				$("#grooming_cut").removeAttr("disabled");
			<?php
				}
			?>

			
			var formToLoad = "forms/"+form+".html";
			document.getElementById("cont_details").setAttribute("w3-include-html",formToLoad);

			w3.includeHTML(function(){

				document.getElementById("contoldinfo").style.display="none";

				$("#cont_info input, #cont_details input").attr("disabled", true);
				$("#cont_info select").attr("disabled", true);
				document.getElementsByTagName("select").disabled = true;
				$(".cont_buttons input").attr("disabled", false);
				<?php require("viewpendingdetails.php"); ?>
			});

			

		});

		

	</script>

</body>

</html>