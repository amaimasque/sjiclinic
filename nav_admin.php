

<!DOCTYPE html>

<html>

<head>

	<link rel="stylesheet" type="text/css" href="css/global.css">

</head>

<body>

	<!-- MODALS !-->

	<div class="w3-modal" id="modal_logout">

		<div class="w3-modal-content" style="width: 30%">

			<header class="w3-container" style="background-color: #729380"> 

			    <span onclick="document.getElementById('modal_logout').style.display='none'" 

			      class="w3-button w3-display-topright">&times;</span>

			    <h4>Confirm</h4>

			</header>

			<div class="w3-container">

			    <p>Are you sure you want to logout?</p>

			</div>

			<div class="w3-container">

			    <div class="w3-cell-row">

				    <div class="w3-cell">

				    	<a href="login.php?logout"><button class="w3-button w3-border" style="width: 100%">Yes</button></a>

				    </div>

				    <div class="w3-cell">

				    	<button class="w3-button w3-border" style="width: 100%" onclick="document.getElementById('modal_logout').style.display='none'">No</button>

				    </div>

				</div>

			</div>

		</div>

	</div>



	<div class="w3-modal" id="modal_profilesetting">

		<div class="w3-modal-content w3-card w3-animate-zoom" style="width: 30%">

			<header class="w3-container" style="background-color: #729380"> 

			    <h4 style="font-weight: bold; color: white"><i class="demo-icon icon-user"></i> Profile Setting</h4>

			</header>

			<div class="w3-container" style="padding: 20px">

			    <div class="w3-row">

			    	<div class="w3-col l12 m12 s12">

			    		<label>Veterinarian Name</label>

			    		<input type="text" class="w3-input" name="vet_fname" id="vet_fname" placeholder="First Name">
			    		<input type="text" class="w3-input" name="vet_lname" id="vet_lname" placeholder="Last Name">

			    	</div>

			    	<div class="w3-col l6 m6 s6">

			    		<label>Username</label>

			    		<input type="text" class="w3-input" name="new_username" id="new_username">

			    	</div>

			    	<div class="w3-col l6 m6 s6">

			    		<label>Password</label>

			    		<input type="password" class="w3-input" name="new_password" id="new_password">

			    	</div>

			    </div>

			</div>

			<div class="w3-container">

			    <div class="w3-cell-row">

				    <div class="w3-cell">

				    	<button class="w3-button w3-border" style="width: 100%" onclick="document.getElementById('modal_profilesetting').style.display='none'">Cancel</button>

				    </div>

				    <div class="w3-cell">

				    	<button class="w3-button w3-border" style="width: 100%" onclick="saveProfile()">Save</button>

				    </div>

				</div>

			</div>

		</div>

	</div>



	<div class="w3-top">

		<div class="w3-bar" style="background-color: #4f4f4f;">

			<div class="w3-bar-item"><img src="images/logo_img.png" style="height: 30px"></div>

			<a href="sjihome.php" class="w3-bar-item" id="contlogo_text" style="text-decoration: none;">

				<span class="logo_text" style="color: #d3464d">SJI PET TURF </span>

				<span class="logo_text" style="color: black">ANIMAL CLINIC</span>

			</a>

			<div class="w3-right w3-bar-item w3-hide-medium w3-hide-small">

				<a href="appointment.php" class="w3-button w3-text-white w3-bar-item" id="appointment"><i class="demo-icon icon-appointment"></i> Enter Appointment</a>

				<a href="examinations.php" class="w3-button w3-text-white w3-bar-item" id="examinations"><i class="demo-icon icon-pending"></i> Pending Examinations</a>

				<a href="history.php?viewby=client" class="w3-button w3-text-white w3-bar-item" id="history"><i class="demo-icon icon-history"></i> Patients  History</a>

				<a href="#" class="w3-button w3-text-white w3-bar-item" id="report"><i class="demo-icon icon-stat"></i> Report</a>

				<div class="w3-dropdown-hover w3-right">

					<button class="w3-button w3-text-white"><i class="demo-icon icon-settings"></i></button>

					<div class="w3-dropdown-content w3-bar-block w3-card-4 w3-border" style="right: 15px;" id="dropdown_menu">

						<button class="w3-button w3-bar-item" onclick="viewProfile()">Profile Settings</button>

						<button onclick="document.getElementById('modal_logout').style.display='block'" class="w3-button w3-bar-item">Logout</a>

					</div>

				</div>

							

			</div>

			<a href="javascript:void(0)" class="w3-right w3-bar-item w3-hide-large" onclick="w3_open()" style="line-height: 30px">

				<i class="demo-icon icon-menu"></i>

			</a>

		</div>

		<div class="w3-container w3-block w3-hide-large w3-center" style="display: none" id="mySidebar">

		    <a class="w3-button w3-animate-top w3-block" href="appointment.php">Enter Appointment</a>

			<a class="w3-button w3-animate-top w3-block" href="examinations.php">Pending Examinations</a>

			<a class="w3-button w3-animate-top w3-block" href="history.php?viewby=client">Patients History</a>

			<a class="w3-button w3-animate-top w3-block" href="#">Reports</a>

			<button class="w3-button w3-animate-top w3-block" onclick="viewProfile()">Profile Settings</button>

			<button class="w3-button w3-animate-top w3-block" onclick="document.getElementById('modal_logout').style.display='block'">Logout</button>

		</div>

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


		function showDropdown(){

			var dropcontent = document.getElementById("dropdown_menu");

			if (dropcontent.className.indexOf("w3-show")== -1) {

				dropcontent.className += "w3-show";

			}else{

				dropcontent.className = dropcontent.className.replace("w3-show","");

			}

		}

		function saveProfile(){

			var vet_fname = document.getElementById("vet_fname").value;
			var vet_lname = document.getElementById("vet_lname").value;
			var n_uname = document.getElementById("new_username").value;
			var n_pass = document.getElementById("new_password").value;

			$.ajax({
				url: 'query/saveprofile.php',
				type: 'post',
				data: {vet_fname:vet_fname, vet_lname:vet_lname, n_uname:n_uname, n_pass:n_pass, type:"save"},
				dataType: 'text',
				success:function(response){
					alert(response);
				},
				error:function(jqXHR, textStatus, errorThrown){
					alert(errorThrown);
				}
			});

			document.getElementById('modal_profilesetting').style.display='none';
		}

		function viewProfile(){

			$.ajax({
				url: 'query/saveprofile.php',
				type: 'post',
				data: {type:"view"},
				dataType: 'json',
				success:function(response){
					document.getElementById("vet_fname").value = response[0]['fname'];
					document.getElementById("vet_lname").value = response[0]['lname'];
					document.getElementById("new_username").value = response[0]['uname'];
					document.getElementById("new_password").value = response[0]['upass'];
				},
				error:function(jqXHR, textStatus, errorThrown){
					alert(errorThrown);
				}
			});

			document.getElementById('modal_profilesetting').style.display='block';
		}

	</script>

</body>

</html>