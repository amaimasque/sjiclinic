<!DOCTYPE html>

<html>

<head>

	<title>Enter Examination | SJI Pet Turf Animal Clinic</title>

	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="icon" href="images/logo_img.png">

  	<link rel="stylesheet" href="css/w3.css">

  	<link rel="stylesheet" href="css/appointment.css">

  	<link rel="stylesheet" href="css/sjiclinic.css">

  	<script type="text/javascript" src="js/w3.js"></script>
  	
  	<script type="text/javascript" src="js/jquerytrial.js"></script>

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

			    		<button class="w3-button w3-border" style="width: 100%" type="submit" form="formExamination">Yes</button>

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

			    		<button class="w3-button w3-border" style="width: 100%" onclick="clearForms()">Yes</button>

			    	</div>

			    	<div class="w3-cell">

			    		<button class="w3-button w3-border" style="width: 100%" onclick="document.getElementById('modal_cancel').style.display='none'">No</button>

			    	</div>

			    </div>

			</div>

		</div>

	</div>



	<div id="content">

		<div class="w3-container w3-center">

			<img src="images/logo_img.png" style="width: 100px">

		</div>

		<form onsubmit="submitForm(this)" method="POST" class="w3-container" id="formExamination" name="formExamination">

			<p>Are you a new or an old client?</p>

			<div class="w3-cell-row contstatus">

				<div class="w3-cell w3-mobile w3-left-align">

					<input id="newRec" class="w3-radio" type="radio" name="status" value="new" onclick="showInfoForm()">

					<label>New</label>	

				</div>

				<div class="w3-cell w3-mobile w3-left-align">

					<input input="oldRec" class="w3-radio" type="radio" name="status" value="old" onclick="showInfoForm()">

					<label>Old</label>

				</div>

			</div>



			<div id="cont_all_forms">

				<div id="cont_clientinfo" w3-include-html=""></div>

			

				<div class="w3-card w3-left-align" style="padding: 20px" id="contappointment">

					<span>Enter Patient for</span>

					<select class="w3-select" name="option" onchange="showAppointment(this)" id="selApt">

						<option value="" disabled selected>Choose option</option>

						<option value="consultation">Consultation</option>

						<option value="vaccine">Vaccine</option>

						<option value="grooming">Grooming</option>

						<option value="surgery">Surgery</option>

					</select>

				</div>



				<div id="cont_form" w3-include-html=""></div>



				<div class="w3-bar w3-center" id="contsubmission" style="width: 100%">

					<button type="button" class="w3-button w3-border" onclick="document.getElementById('modal_cancel').style.display='block'">Cancel</button>

					<button type="button" class="w3-button w3-border" onclick="document.getElementById('modal_success').style.display='block'">Submit</button>

				</div>

			</div>
			

		</form>

		

	</div>



	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>

	<script type="text/javascript">

		var mySidebar = document.getElementById("mySidebar");



		function w3_open() {

		  if (mySidebar.style.display === 'block') {

		    mySidebar.style.display = 'none';

		  } else {

		    mySidebar.style.display = 'block';

		  }

		}



		function w3_close() {

		    mySidebar.style.display = "none";

		}



		function showInfoForm(){

			document.getElementById("cont_clientinfo").setAttribute("w3-include-html","forms/clientinfo.html");

			

			if(document.getElementById("newRec").checked){

				w3.includeHTML(function(){

					document.getElementById("contnewinfo").style.display="block";

					document.getElementById("contoldinfo").style.display="none";

				});

			}

			else{

				w3.includeHTML(function(){

					document.getElementById("contoldinfo").style.display="block";

					document.getElementById("contnewinfo").style.display="none";

					//get client names

					var options;
					
					var selClientName = document.getElementById("oclientname");
					
					<?php
						include("db_connection.php");

						$sql = mysqli_query($con, "SELECT * from tbl_clients");

						while($row=mysqli_fetch_array($sql)){

					?>
					
						var el = document.createElement("option");
					
						el.textContent = "<?php echo $row['client_lastname'].', '.$row['client_firstname'].' '.$row['client_middlename'] ;?>";
    				
    					el.value = "<?php echo $row['client_id'];?>";
    				
    					selClientName.appendChild(el);
						
					<?php
						
						}

						include("closedb_connection.php");

					?>


					$(document).ready(function(){

						//get pets list

					    $("#oclientname").change(function(){
					        var clientid = $(this).val();

					        $.ajax({
					            url: 'getpatients.php',
					            type: 'post',
					            data: {clientid:clientid},
					            dataType: 'json',
					            success:function(response){

					                var len = response.length;

					                $("#opetname").empty();
					                
					                $("#opetname").append("<option value='0' selected disabled>Choose pet...</option>");

					                $("#opetname").append("<option value='add'>Add New</option>");

					                for( var i = 0; i<len; i++){

					                    var id = response[i]['pet_id'];
					                    
					                    var name = response[i]['pet_name'];
					                    
					                    $("#opetname").append("<option value='"+id+"'>"+name+"</option>");

					                }
					            }
					        });
					    });

					    $("#opetname").change(function(){
					    	var opetname = $(this).val();

					    	if(opetname == 'add'){
					    		document.getElementById('cardAddNewPet').style.display='block';
					    	}else{
					    		document.getElementById('cardAddNewPet').style.display='none';
					    		
					    	}
					    	document.getElementById('owner_id').value = $("#oclientname").val();
					    });

					});

				});

			}

			document.getElementById("contappointment").style.display="block";

		}



		function showAppointment(appointment){

			var apt = appointment.value;

			var form = "forms/"+apt+".html";

			if(apt!="grooming"){

				document.getElementById("cont_form").setAttribute("w3-include-html",form);

				w3.includeHTML();

			}else{

				document.getElementById("cont_form").setAttribute("w3-include-html","forms/something.html");

				w3.includeHTML();

			}

			document.getElementById("contsubmission").style.display="block";

		}



		function clearForms(){

			document.getElementById("modal_cancel").style.display="none";

			document.location.reload(true);

		}



		function checkAll(){

			if(document.getElementById("selectall").checked == true){

				document.getElementById("check_deworming").checked = true;

				document.getElementById("check_vaccination").checked = true;

				document.getElementById("check_dhlp").checked = true;

				document.getElementById("check_rabies").checked = true;

				document.getElementById("check_cough").checked = true;

				document.getElementById("check_micro").checked = true;

				document.getElementById("check_labtest").checked = true;

				document.getElementById("check_treat").checked = true;

				document.getElementById("check_confine").checked = true;

				document.getElementById("check_anesurg").checked = true;

				document.getElementById("check_groom").checked = true;

				document.getElementById("check_bath").checked = true;

				document.getElementById("check_boarding").checked = true;

				document.getElementById("check_dentistry").checked = true;

				document.getElementById("lbl_select").innerText = "Deselect All";

			}else{

				document.getElementById("check_deworming").checked = false;

				document.getElementById("check_vaccination").checked = false;

				document.getElementById("check_dhlp").checked = false;

				document.getElementById("check_rabies").checked = false;

				document.getElementById("check_cough").checked = false;

				document.getElementById("check_micro").checked = false;

				document.getElementById("check_labtest").checked = false;

				document.getElementById("check_treat").checked = false;

				document.getElementById("check_confine").checked = false;

				document.getElementById("check_anesurg").checked = false;

				document.getElementById("check_groom").checked = false;

				document.getElementById("check_bath").checked = false;

				document.getElementById("check_boarding").checked = false;

				document.getElementById("check_dentistry").checked = false;

				document.getElementById("lbl_select").innerText = "Select All";

			}

		}

		

		function submitForm(form){

			var action = "processappointment.php?";

			var clientStatus;



			//check if client is old/new

			if (document.getElementById("newRec").checked == true) {

				action = action + "new";

			} else {

				action = action + "old";

			}



			//check which appointment is chosen

			var apt = document.getElementById("selApt").value;

			switch(apt){

				case "consultation": 

					action = action + "&apt=" + "consultation";

					break;

				case "vaccine":

					action = action + "&apt=" + "vaccine";

					break;

				case "grooming":

					action = action + "&apt=" + "grooming";

					break;

				case "surgery":

					action = action + "&apt=" + "surgery";

					break;

			}

			form.action = action;

		}



		$(document).ready(function(){

			$("#appointment").addClass("button_active");

		});

	</script>

	</script>

</body>

</html>