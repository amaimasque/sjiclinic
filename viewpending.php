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

							<button class="w3-bar-item w3-btn" id="btn_edit" onclick="enableForm(this)">Edit</button>

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

						<button class="w3-bar-item w3-btn" id="btn_edit" onclick="enableForm(this)">Edit</button>

						<button class="w3-bar-item w3-btn" onclick="document.getElementById('modal_delete').style.display='block'">Delete</button>

					</div>	

				</div>

			</div>

			

			<div class="cont_buttons" id="cont_consultation_buttons">	

				<div class="w3-center">

					<div class="w3-bar w3-round-xlarge bar_appointment" id="bar_consultation">

						<a href="examinations.php" class="w3-bar-item w3-btn">Cancel</a>

						<button class="w3-bar-item w3-btn" onclick="consultDiagnosis()">Diagnosis</button>

						<button class="w3-bar-item w3-btn" onclick="document.getElementById('modal_consultation_prognosis').style.display='block'">Prognosis</button>

						<button class="w3-bar-item w3-btn" onclick="document.getElementById('modal_amount').style.display='block'">Amount</button>

						<button class="w3-bar-item w3-btn" id="btn_edit" onclick="enableForm(this)">Edit</button>

						<button class="w3-bar-item w3-btn" onclick="document.getElementById('modal_delete').style.display='block'">Delete</button>

					</div>	

				</div>

			</div>


			<div class="cont_buttons" id="cont_surgery_buttons">

				<div class="w3-center">

					<div class="w3-bar w3-round-xlarge bar_appointment" id="bar_surgery">

						<a href="examinations.php" class="w3-bar-item w3-btn">Cancel</a>

						<button class="w3-bar-item w3-btn" onclick="document.getElementById('modal_amount').style.display='block'">Amount</button>

						<button class="w3-bar-item w3-btn" id="btn_edit" onclick="enableForm(this)">Edit</button>

						<button class="w3-bar-item w3-btn" onclick="document.getElementById('modal_delete').style.display='block'">Delete</button>

					</div>	

				</div>

			</div>
			
		</div>

	</div>

	<script type="text/javascript">

		var edit_flag=0;
		var service_id = <?php echo $_GET['id']; ?>;
		var service_type = "<?php echo $_GET['at']; ?>";

		function enableForm(btn){
			if(btn.innerHTML=="Edit"){
				$("#cont_details input").attr("disabled", false);
				document.getElementsByTagName("select").disabled = false;
				$("#cont_details select").attr("disabled", false);
				$("#cont_grooming input").attr("disabled", false);
				btn.innerHTML="Save";
			}else{
				btn.innerHTML="Edit";
				$("#cont_details input").attr("disabled", true);
				document.getElementsByTagName("select").disabled = true;
				$("#cont_details select").attr("disabled", true);
				$("#cont_grooming input").attr("disabled", true);

				var appointment;
				if(service_type=="consultation"){
					var consultation_attitude = $("#consultation_attitude").val();
					var consultation_drinking = $("#consultation_drinking").val();
					var consultation_bowels = $("#consultation_bowels").val();
					var consultation_coughing = $("#consultation_coughing").val();
					var consultation_urination = $("#consultation_urination").val();
					var consultation_appetite = $("#consultation_appetite").val();
					var consultation_vomiting = $("#consultation_vomiting").val();
					var consultation_sneezing = $("#consultation_sneezing").val();
					var consultation_notes = $("#consultation_notes").val();

					appointment = {service_id:service_id, service_type:service_type, consultation_attitude:consultation_attitude, consultation_drinking:consultation_drinking, consultation_bowels:consultation_bowels, consultation_coughing:consultation_coughing, consultation_urination:consultation_urination, consultation_appetite:consultation_appetite, consultation_vomiting:consultation_vomiting, consultation_sneezing:consultation_sneezing, consultation_notes:consultation_notes};
				}else if(service_type=="vaccine"){
					var vaccine_complain = $("#vaccine_complain").val();
					var vaccine_freq = $("#vaccine_freq").val();
					var vaccine_prevtreat = $("#vaccine_prevtreat").val();
					var vaccine_response = $("#vaccine_response").val();

					appointment = {service_id:service_id, service_type:service_type, vaccine_complain:vaccine_complain, vaccine_freq:vaccine_freq, vaccine_prevtreat:vaccine_prevtreat, vaccine_response:vaccine_response};
				}else if(service_type=="surgery"){
					var check_deworming = document.getElementById("check_deworming").checked ? $("#check_deworming").val() : "";
					var check_vaccination = document.getElementById("check_vaccination").checked ? $("#check_vaccination").val() : "";
					var check_dhlp = document.getElementById("check_dhlp").checked ? $("#check_dhlp").val() : "";
					var check_rabies = document.getElementById("check_rabies").checked ? $("#check_rabies").val() : "";
					var check_cough = document.getElementById("check_cough").checked ? $("#check_cough").val() : "";
					var check_micro = document.getElementById("check_micro").checked ? $("#check_micro").val() : "";
					var check_labtest = document.getElementById("check_labtest").checked ? $("#check_labtest").val() : "";
					var check_treat = document.getElementById("check_treat").checked ? $("#check_treat").val() : "";
					var check_confine = document.getElementById("check_confine").checked ? $("#check_confine").val() : "";
					var check_anesurg = document.getElementById("check_anesurg").checked ? $("#check_anesurg").val() : "";
					var check_groom = document.getElementById("check_groom").checked ? $("#check_groom").val() : "";
					var check_bath = document.getElementById("check_bath").checked ? $("#check_bath").val() : "";
					var check_boarding = document.getElementById("check_boarding").checked ? $("#check_boarding").val() : "";
					var check_dentistry = document.getElementById("check_dentistry").checked ? $("#check_dentistry").val() : "";
					var consent_boarding_days = $("#consent_boarding_days").val();
					var consent_others = $("#consent_others").val();
					var consent_agree = document.getElementById("consent_agree").checked ? $("#consent_agree").val() : "";
					
					appointment = {service_id:service_id, service_type:service_type, check_deworming:check_deworming, check_vaccination:check_vaccination, check_dhlp:check_dhlp, check_rabies:check_rabies, check_cough:check_cough, check_micro:check_micro, check_labtest:check_labtest, check_treat:check_treat, check_confine:check_confine, check_anesurg:check_anesurg, check_groom:check_groom, check_bath:check_bath, check_boarding:check_boarding, check_dentistry:check_dentistry, consent_boarding_days:consent_boarding_days, consent_others:consent_others, consent_agree:consent_agree};
				}else if(service_type=="grooming"){
					var grooming_cut = $("#grooming_cut").val();

					appointment = {service_id:service_id, service_type:service_type, grooming_cut:grooming_cut};
				}

				//alert(JSON.stringify(appointment));

				$.ajax({
					url: 'query/savependingdetails.php',
					type: 'post',
					data: appointment,
					dataType: 'json',
					success:function(response){

						var dataResult = JSON.parse(response);
						if(dataResult.statusCode==200){
							alert("Saved successfully!")					
						}
						else if(dataResult.statusCode==201){
						   alert("Error occured!");
						}

					},
					error:function(jqXHR, textStatus, errorThrown){
						alert(errorThrown);
					}
				});				
			}
		}

		$(document).ready(function(){

			$("#examinations").addClass("button_active");

			document.getElementById("cont_info").setAttribute("w3-include-html","forms/clientinfo.html");
			
			if(service_type!="grooming"){
				document.getElementById("cont_"+service_type+"_buttons").style.display="block";
				var formToLoad = "forms/"+service_type+".html";
				document.getElementById("cont_details").setAttribute("w3-include-html",formToLoad);
			}else{
				document.getElementById("cont_grooming").style.display="block";
				document.getElementById("cont_grooming_buttons").style.display="block";
			}

			w3.includeHTML(function(){

				document.getElementById("contoldinfo").style.display="none";
				$("#cont_info input, #cont_details input").attr("disabled", true);
				$("#cont_info select").attr("disabled", true);
				document.getElementsByTagName("select").disabled = true;
				$(".cont_buttons input").attr("disabled", false);

				$("#cont_details select").attr("disabled", true);

				$.ajax({
					url: 'query/viewpendingdetails.php',
					type: 'post',
					data: {service_id:service_id, service_type:service_type},
					dataType: 'json',
					success:function(response){
						var len = response.length;
						
						document.getElementById("client_fname").value = response[0]['client_firstname'];
						document.getElementById("client_mname").value = response[0]['client_middlename'];
						document.getElementById("client_lname").value= response[0]['client_lastname'];
						document.getElementById("client_address").value= response[0]['client_address'];
						document.getElementById("client_contact").value= response[0]['client_contactnumber'];
						document.getElementById("pet_name").value = response[0]['pet_name'];
						document.getElementById("pet_bdate").value= response[0]['pet_birthdate'];
						document.getElementById("pet_sex").value= response[0]['pet_sex'];
						document.getElementById("pet_species").value= response[0]['pet_species'];
						document.getElementById("pet_breed").value= response[0]['pet_breed'];
						document.getElementById("pet_color_markings").value= response[0]['pet_color_markings'];
						document.getElementById("pet_vet").value= response[0]['pet_previous_vet'];

						var strJson = JSON.stringify(response, null, 2);
						//alert(strJson);

						if(service_type=="consultation"){
							document.getElementById("consultation_attitude").selectedIndex = select1(response[0].appointment[0].consultation_attitude);
							document.getElementById("consultation_drinking").selectedIndex = select1(response[0].appointment[0].consultation_drinking);
							document.getElementById("consultation_bowels").selectedIndex = select1(response[0].appointment[0].consultation_bowels);
							document.getElementById("consultation_coughing").selectedIndex = select1(response[0].appointment[0].consultation_coughing);
							document.getElementById("consultation_urination").selectedIndex = select1(response[0].appointment[0].consultation_urination);
							document.getElementById("consultation_appetite").selectedIndex = select1(response[0].appointment[0].consultation_appetite);
							document.getElementById("consultation_vomiting").selectedIndex = select2(response[0].appointment[0].consultation_vomiting);
							document.getElementById("consultation_sneezing").selectedIndex = select2(response[0].appointment[0].consultation_sneezing);
							document.getElementById("consultation_notes").value = response[0].appointment[0].consultation_notes;
							
						}else if (service_type == "vaccine"){
							document.getElementById("vaccine_complain").value = response[0].appointment[0].vaccine_complaint;
							document.getElementById("vaccine_freq").value = response[0].appointment[0].vaccine_freq;
							document.getElementById("vaccine_prevtreat").value = response[0].appointment[0].vaccine_prev_treat;
							document.getElementById("vaccine_response").value = response[0].appointment[0].vaccine_response_treat;

							document.getElementById("vaccine_addinfo_temp").value = response[0].appointment[0].vaccine_temp;
							document.getElementById("vaccine_addinfo_ht").value = response[0].appointment[0].vaccine_ht;
							document.getElementById("vaccine_addinfo_vcc").value = response[0].appointment[0].vaccine_given;

						}else if (service_type == "surgery"){
							document.getElementById("check_deworming").checked = response[0].appointment[0].consent_deworming == "Y" ? true : false; 							
							document.getElementById("check_vaccination").checked = response[0].appointment[0].consent_vaccination == "Y" ? true : false;							
							document.getElementById("check_dhlp").checked = response[0].appointment[0].consent_dhlp_cpv == "Y" ? true : false;
							document.getElementById("check_rabies").checked = response[0].appointment[0].consent_rabies == "Y" ? true : false;
							document.getElementById("check_cough").checked = response[0].appointment[0].consent_kennel_cough == "Y" ? true : false;
							document.getElementById("check_micro").checked = response[0].appointment[0].consent_microsporum == "Y" ? true : false;
							document.getElementById("check_labtest").checked = response[0].appointment[0].consent_labtest == "Y" ? true : false;
							document.getElementById("check_treat").checked = response[0].appointment[0].consent_treatment == "Y" ? true : false;
							document.getElementById("check_confine").checked = response[0].appointment[0].consent_confinement == "Y" ? true : false;
							document.getElementById("check_anesurg").checked = response[0].appointment[0].consent_anesthesia == "Y" ? true : false;
							document.getElementById("check_groom").checked = response[0].appointment[0].consent_grooming == "Y" ? true : false;
							document.getElementById("check_bath").checked = response[0].appointment[0].consent_bath == "Y" ? true : false;
							document.getElementById("check_boarding").checked = response[0].appointment[0].consent_boarding == "Y" ? true : false;
							document.getElementById("check_dentistry").checked = response[0].appointment[0].consent_dentistry == "Y" ? true : false;
							document.getElementById("consent_boarding_days").value = response[0].appointment[0].consent_boarding_days;
							document.getElementById("consent_others").value = response[0].appointment[0].consent_others;
							document.getElementById("consent_agree").checked = response[0].appointment[0].consent_agreement == "Y" ? true : false;
							document.getElementById("div_selectall").style.display = "none";
						}else if(service_type=="grooming"){
							document.getElementById("grooming_cut").value = response[0].appointment[0].grooming_cut;
						}

					},
					error:function(jqXHR, textStatus, errorThrown){
						alert(errorThrown);
					}
				});

				function select1(value1) {
					if(value1 == "nrm" ){
						return "0";
					}else if(value1 == "abn" ){
						return "1";
					}else{
						return "2";
					}
				}

				function select2(value2){
					if(value2 == "yes" ){
						return "0";
					}else if(value2 == "no" ){
						return "1";
					}else if(value2 == "occ" ){
						return "2";
					}
				}
				
			});
		});

		function consultDiagnosis(){

			$.ajax({
				url: 'query/viewdiagnosis.php',
				type: 'post',
				data: {service_id},
				dataType: 'json',
				success:function(response){
					var len = response.length;

					alert(JSON.stringify(response));

					document.getElementById("consultation_diagnosis_blood").value = response[0]['diagnosis_blood_exam'];
					document.getElementById("consultation_diagnosis_urine").value = response[0]['diagnosis_urine_exam'];
					document.getElementById("consultation_diagnosis_distemper").value = response[0]['diagnosis_distemper_test'];
					document.getElementById("consultation_diagnosis_pvtest").value = response[0]['diagnosis_parvo_test'];
					document.getElementById("consultation_diagnosis_fecalysis").value = response[0]['diagnosis_fecalysis'];
					document.getElementById("consultation_diagnosis_scraping").value = response[0]['diagnosis_skin_scraping'];
					document.getElementById("consultation_diagnosis_ehtest").value = response[0]['diagnosis_ehrlichia_test'];
					document.getElementById("consultation_diagnosis_hwtest").value = response[0]['diagnosis_hw_test'];
					document.getElementById("consultation_diagnosis_earswab").value = response[0]['diagnosis_ear_swabbing'];
					document.getElementById("consultation_diagnosis_vagsmear").value = response[0]['diagnosis_vaginal_smear'];
					document.getElementById("consultation_diagnosis_ultras").value = response[0]['diagnosis_ultrasound'];
					document.getElementById("consultation_diagnosis_xray").value = response[0]['diagnosis_xray'];
					document.getElementById("consultation_diagnosis_otest").value = response[0]['diagnosis_others'];

				},
				error:function(jqXHR, textStatus, errorThrown){
					alert(textStatus + errorThrown);
				}
			});

			document.getElementById('modal_consultation_diagnosis').style.display='block';
		}

	</script>

</body>

</html>