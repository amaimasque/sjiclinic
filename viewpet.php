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

	<link rel="stylesheet" href="css/tabulator/tabulator.css"/>

    <script type="text/javascript" src="js/tabulator/tabulator.js"></script>

	<script type="text/javascript" src="js/jquery-3.3.1.js"></script>

	<style type="text/css">

		#cont_all{

			padding: 0px 20%;

			margin-top: 50px;

		}

		.w3-card{

			background: white;

		}

		#clientinfo span{
			font-weight: bold;
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

		    <div class="w3-container" w3-include-html="" id="cont_visit_info">

		    </div>

		    <div class="w3-container w3-center">

		    	<div class="w3-bar">

			    	<button class="w3-button w3-border" onclick="document.getElementById('modal_visit').style.display='none'">CLOSE</button>

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

							<h3><i class="demo-icon icon-pet"></i> Pet ID #<span id="pet_id"></span></h3>

						</div>

						<div class="w3-container" style="padding: 20px;">

							<div class="w3-row">

								<div class="w3-col l6 m6 s12">

									<div class="w3-row">

										<div class="w3-col l5 m5 s4">

											<label>Pet Name</label>	

										</div>
										<div class="w3-col l7 m7 s8">

											<span id="pet_name"></span>

										</div>

									</div>

								</div>

								<div class="w3-col l6 m6 s12">

									<div class="w3-row">

										<div class="w3-col l5 m5 s4">

											<label>Age</label>	

										</div>
										<div class="w3-col l7 m7 s8">

											<span id="pet_age"></span>

										</div>

									</div>

								</div>

							</div>

							<div class="w3-row">

								<div class="w3-col l6 m6 s12">

									<div class="w3-row">

										<div class="w3-col l5 m5 s4">

											<label>Birthdate</label>	

										</div>
										<div class="w3-col l7 m7 s8">

											<span id="pet_bdate"></span>

										</div>

									</div>	

								</div>

								<div class="w3-col l6 m6 s12">

									<div class="w3-row">

										<div class="w3-col l5 m5 s4">

											<label>Sex</label>	

										</div>
										<div class="w3-col l7 m7 s8">

											<span id="pet_sex"></span>

										</div>

									</div>

								</div>

							</div>

							<div class="w3-row">

								<div class="w3-col l6 m6 s12">

									<div class="w3-row">

										<div class="w3-col l5 m5 s4">

											<label>Species</label>	

										</div>
										<div class="w3-col l7 m7 s8">

											<span id="pet_species"></span>

										</div>

									</div>	

								</div>

								<div class="w3-col l6 m6 s12">

									<div class="w3-row">

										<div class="w3-col l5 m5 s4">

											<label>Breed</label>	

										</div>
										<div class="w3-col l7 m7 s8">

											<span id="pet_breed"></span>

										</div>

									</div>	

								</div>

							</div>

							<div class="w3-row">

								<div class="w3-col l12 m12 s12">

									<div class="w3-row">

										<div class="w3-col l5 m5 s4">

											<label>Color Markings</label>	

										</div>
										<div class="w3-col l7 m7 s8">

											<span id="pet_color_markings"></span>

										</div>

									</div>	

								</div>

								<div class="w3-col l12 m12 s12">

									<div class="w3-row">

										<div class="w3-col l5 m5 s4">

											<label>Previous Veterinarian</label>	

										</div>
										<div class="w3-col l7 m7 s8">

											<span id="pet_prev_vet"></span>

										</div>

									</div>	

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

						<div class="w3-container" style="padding: 20px; height: 150px" id="pet_services">

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

						<div id="tbl_visits"></div>

					</div>

				</div>

			</div>


		</div>



	</div>

	

	<script type="text/javascript">

		<?php
			include("db_connection.php");
			$pet_id = $_GET['id'];
			$services = "";
		?>

		$(document).ready(function(){

			$("#history").addClass("button_active");
			document.getElementById("pet_id").innerHTML = "<?php echo $pet_id?>";

			//GET PET INFO
			<?php

				$sql = "SELECT * FROM tbl_pets WHERE pet_id=".$pet_id;
				$result = mysqli_query($con, $sql);
				while($row = mysqli_fetch_array($result)){

			?>
				document.getElementById("pet_name").innerHTML = "<?php echo $row['pet_name']?>";
				document.getElementById("pet_bdate").innerHTML = "<?php echo $row['pet_birthdate']?>";
				var age = new Date("<?php echo $row['pet_birthdate']?>");
				var currdate = new Date();
				document.getElementById("pet_age").innerHTML = currdate.getFullYear() - age.getFullYear() + " y/o";
				document.getElementById("pet_sex").innerHTML = "<?php echo ucfirst($row['pet_sex'])?>";
				document.getElementById("pet_species").innerHTML = "<?php echo $row['pet_species']?>";
				document.getElementById("pet_color_markings").innerHTML = "<?php echo $row['pet_color_markings']?>";
				document.getElementById("pet_prev_vet").innerHTML = "<?php echo $row['pet_previous_vet']?>";
			<?php
				}

			?>

			var btn_view = function(cell, formatterParams){ //plain text value
                 return "<button class='demo-icon icon-view w3-btn w3-text-white' style='background: #729380'>View</button>";
            };

			var tabledata = [
                
                //GET VISITS LIST
                <?php

                	$sql = "SELECT * FROM tbl_service WHERE patient_id=".$pet_id." AND service_date IS NOT NULL";
                	$result = mysqli_query($con, $sql);
                	while($row = mysqli_fetch_array($result)){

                		$services = $services . ucfirst($row['service_type']) . "; "
                ?>

             	{
                id: "<?php echo $row['service_id']; ?>",
                apttype: "<?php echo ucfirst($row['service_type']); ?>", 
                aptdate: "<?php echo $row['service_apt_date']; ?>",      
                findate: "<?php echo $row['service_date']; ?>",  
                amt: "<?php echo $row['service_amt']; ?>"
            	}, 

                <?php
                	}
                ?>

            ];

            document.getElementById("pet_services").innerHTML = "<?php echo $services; ?>";

			var table = new Tabulator("#tbl_visits", {
                height:"100%",
             	data:tabledata, //assign data to table
             	placeholder:"No Data Available",
             	pagination:"local",
                paginationSize:10,
                paginationSizeSelector:[3, 6, 8, 10],
                responsiveLayout:"hide",
             	columns:[ //Define Table Columns
                    //table data for View By Clients 
             	    {title:"ID", field:"id", width:50, responsive:0, sorter:"number"},
            	 	{title:"Visit Type", field:"apttype", width:200, responsive:0, sorter:"string"},
            	 	{title:"Appointment Date", field:"aptdate", width:150, responsive:0, sorter:"string"},
            	 	{title:"Finished Date", field:"findate", width:150, responsive:0, sorter:"string"},
            	 	{title:"Amount Rendered", field:"amt", align:"left", width:100, widthGrow:2, sorter:"number", responsive:1},
                    {formatter:btn_view, width:100, align:"center", cellClick:function(e, cell){
                    	var visit_id = cell.getRow().getData().id;

                    	//populate modal_visit
                    	$.ajax({

                    	});

                        document.getElementById("modal_visit").style.display = "block";
                    }},
             	],
            });

            <?php
            	if(isset($_GET['sid'])){
            ?>
            	document.getElementById("modal_visit").style.display = "block";
            <?php
            	}
            ?>

		});	

	</script>

</body>

</html>