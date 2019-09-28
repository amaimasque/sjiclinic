<!DOCTYPE html>

<html>

<head>

	<title>Client Information</title>

	<meta charset="utf-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="icon" href="images/logo_img.png">

	<link rel="stylesheet" href="css/w3.css">

	<link rel="stylesheet" href="css/tabulator/tabulator.css"/>

    <script type="text/javascript" src="js/tabulator/tabulator.js"></script>

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

		#contnewinfo span{
			font-weight: bold;
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
		include("db_connection.php");
		$client_id = test_input($_GET['id']);
		//$sql = "SELECT * FROM tbl_clients INNER JOIN tbl_pets ON tbl_pets.pet_owner_id=tbl_clients.client_id WHERE tbl_clients.client_id=".$client_id;
		$sql = "SELECT * FROM tbl_clients WHERE client_id=".$client_id;
		$result = mysqli_query($con,$sql);
		$row = mysqli_fetch_array($result);

	?>

	<div id="cont_all" style="margin-top: 50px;">

		<div class="w3-container">

			<div class="w3-cell-row" id="contnewinfo">

				<div class="w3-cell w3-col l6 m12" id="clientinfo">

					<div class="w3-card">

						<div class="w3-container w3-green">

							<h3><i class="demo-icon icon-client"></i> Client Information</h3>

						</div>

						<div class="w3-container" style="padding: 20px;">

							<div class="w3-row">

								<div class="w3-col l5 m5 s4">

									<label>Full Name</label>	

								</div>
								<div class="w3-col l7 m7 s8">

									<span><?php echo $row['client_firstname']." ".$row['client_middlename']." ".$row['client_lastname'] ?></span>

								</div>

							</div>

							<div class="w3-row">

								<div class="w3-col l5 m5 s4">

									<label>Address</label>	

								</div>
								<div class="w3-col l7 m7 s8">

									<span><?php echo $row['client_address'] ?></span>

								</div>

							</div>

							<div class="w3-row">

								<div class="w3-col l5 m5 s4">

									<label>Contact Number</label>	

								</div>
								<div class="w3-col l7 m7 s8">

									<span><?php echo $row['client_contactnumber'] ?></span>

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

							<div class="w3-row">

								<div class="w3-col l5 m5 s4">

									<label>No. of Pets</label>	

								</div>
								<div class="w3-col l7 m7 s8">

									<span id="no_of_pets"></span>

								</div>
							
							</div>

							<div class="w3-row">
								
								<div class="w3-col l5 m5 s4">

									<label>Times Visited</label>	

								</div>
								<div class="w3-col l7 m7 s8">

									<span id="times_visited"></span>

								</div>

							</div>

							<div class="w3-row">

								<div class="w3-col l5 m5 s4">

									<label>Services Used</label>	

								</div>
								<div class="w3-col l7 m7 s8">

									<span id="services_used"></span>

								</div>

							</div>

						</div>

					</div>	

				</div>

			</div>			

			<div class="w3-card">

				<div class="w3-container w3-green">

					<h3><i class="demo-icon icon-pet"></i> Pets</h3>

				</div>

				<div class="w3-container" style="padding: 20px;">

					<div id="tbl_pets"></div>

				</div>

			</div>

			

		</div>



	</div>

	

	<script type="text/javascript">

		$(document).ready(function(){

			<?php
				$sql = "SELECT * FROM tbl_clients INNER JOIN tbl_pets ON tbl_pets.pet_owner_id=tbl_clients.client_id WHERE tbl_clients.client_id=$client_id";

				$result = mysqli_query($con,$sql);
			?>
				document.getElementById("no_of_pets").innerHTML = <?php echo mysqli_num_rows($result) ?>;
			
			<?php

				$sql = "SELECT * FROM tbl_clients INNER JOIN tbl_pets ON tbl_pets.pet_owner_id=tbl_clients.client_id INNER JOIN tbl_service ON tbl_service.patient_id=tbl_pets.pet_id WHERE tbl_clients.client_id=$client_id AND tbl_service.service_del!=1 AND tbl_service.service_date IS NOT NULL";
				$result = mysqli_query($con,$sql);
			?>
				document.getElementById("times_visited").innerHTML = <?php echo mysqli_num_rows($result) ?>;
				var services = "";
			
			<?php
				while ($row = mysqli_fetch_array($result)) {
					
			?>
					if (services.search("<?php echo ucfirst($row['service_type']) ?>")==-1) {
						services += "<?php echo ucfirst($row['service_type']) ?>"+"; ";
					}
			<?php
				}
			?>
				document.getElementById("services_used").innerHTML = services;

			$("#history").addClass("button_active");

			var btn_view = function(cell, formatterParams){ //plain text value
                 return "<button class='demo-icon icon-view w3-btn w3-text-white' style='background: #729380'>View</button>";
            };

            var tabledata = [
                
                //table data for View By Clients
                <?php
                	$sql = "SELECT * FROM tbl_pets WHERE pet_owner_id=".$client_id;
                	$result = mysqli_query($con, $sql);
                	$novisits = 0;
                	while($row = mysqli_fetch_array($result)){
                		$sql2 = "SELECT * FROM tbl_service WHERE patient_id=".$row['pet_id']." AND service_del!=1";
                		$result2 = mysqli_query($con, $sql2);
                ?>

             	{
                id: "<?php echo $row['pet_id']; ?>", 
                petname: "<?php echo $row['pet_name']; ?>",      
                petspec: "<?php echo $row['pet_species']; ?>",  
                petbreed: "<?php echo $row['pet_breed']; ?>", 
                novisits: <?php echo mysqli_num_rows($result2) ?>
            	}, 

                <?php
                	}
                ?>
            ];

			var table = new Tabulator("#tbl_pets", {
                height:"100%",
             	data:tabledata, //assign data to table
             	placeholder:"No Data Available",
             	pagination:"local",
                paginationSize:10,
                paginationSizeSelector:[3, 6, 8, 10],
                responsiveLayout:"hide",
             	columns:[ //Define Table Columns
                    //table data for View By Clients

                    {formatter:btn_view, width:100, align:"center", cellClick:function(e, cell){
                        window.open("viewpet.php?id=" + cell.getRow().getData().id, "_blank");
                    }},
             	    {title:"ID", field:"id", width:50, responsive:0, sorter:"number"},
            	 	{title:"Pet Name", field:"petname", width:200, responsive:0, sorter:"string"},
            	 	{title:"Species", field:"petspec", width:150, responsive:0, sorter:"string"},
            	 	{title:"Breed", field:"petbreed", width:150, responsive:0, sorter:"string"},
            	 	{title:"Visits", field:"novisits", align:"left", width:100, widthGrow:2, sorter:"number", responsive:1},
                    
             	],
            });

		});	

	</script>

	<?php include("closedb_connection.php"); ?>

</body>

</html>