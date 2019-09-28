<?php

    include("db_connection.php");

    if(!isset($_GET['viewby']) || $_GET['viewby'] == "client"){
       
        $sql = mysqli_query($con, "SELECT * from tbl_clients");

    }

    if(isset($_GET['viewby']) && $_GET['viewby'] == "visits"){

        $sql = mysqli_query($con, "SELECT * from tbl_service INNER JOIN tbl_pets ON tbl_service.patient_id=tbl_pets.pet_id INNER JOIN tbl_clients ON tbl_pets.pet_owner_id=tbl_clients.client_id WHERE tbl_service.service_del!=1");

    }
   
?>

<!DOCTYPE html>

<html>

<head>

	<title>View clientele</title>

	<meta charset="utf-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="icon" href="images/logo_img.png">

	<link rel="stylesheet" href="css/w3.css">

    <script type="text/javascript" src="js/jquery-3.3.1.js"></script>

    <link rel="stylesheet" href="css/tabulator/tabulator.css"/>

    <script type="text/javascript" src="js/tabulator/tabulator.js"></script>

    <link rel="stylesheet" href="css/sjiclinic.css">

	<style type="text/css">

        #div_content{

            position: absolute;

            margin: auto;

            top: 0;

            right: 0;

            bottom: 0;

            left: 0;

            width: 70%;

            height: 50%;

        }

        @media screen and (max-width: 480px){

            #div_content{

                width: 100%;

            }

        }

	</style>

</head>

<body>

	<?php

		require("nav_admin.php");

	?>



	<div id="div_content">

		<div class="w3-row">

			<div class="w3-col l8 m12 s12"><h4 style="font-weight: 900; color: #833438" id="list_title">Clients Master List</h4></div>

			<div class="w3-col l2 m6 s6">

				<a href="history.php?viewby=client" class="w3-button w3-border" style="width: 100%;" id="btn_client">CLIENT</a>

			</div>

			<div class="w3-col l2 m6 s6">

				<a href="history.php?viewby=visits" class="w3-button w3-border" style="width: 100%" id="btn_visits">VISITS</a>

			</div>

		</div>	

		<div id="tbl_history"></div>

	</div>



	<script type="text/javascript">

		 $(document).ready(function() {

			$("#history").addClass("button_active");

            var btn_view = function(cell, formatterParams){ //plain text value
                 return "<button class='demo-icon icon-view w3-btn w3-text-white' style='background: #729380'>View</button>";
            };

			var tabledata = [
                
                //table data for View By Clients
                <?php
                    if($_GET['viewby'] == "client"){
                        while($row=mysqli_fetch_array($sql)){
                ?>
             	{
                id: <?php echo $row['client_id'];?>, 
                fname: "<?php echo $row['client_firstname'];?>",     
                mname: "<?php echo $row['client_middlename'];?>", 
                lname: "<?php echo $row['client_lastname'];?>",
                add: "<?php echo $row['client_address'];?>", 
                conno: "<?php echo $row['client_contactnumber'];?>" }, 
                <?php
                        }
                    }
                ?>

                //table data for View By Visits
                <?php
                    if($_GET['viewby'] == "visits"){
                        while($row=mysqli_fetch_array($sql)){
                ?>
                {id: <?php echo $row['service_id'];?>,  
                patientid: "<?php echo $row['patient_id'];?>", 
                patientname: "<?php echo $row['pet_name'];?>", 
                ownername: "<?php echo $row['client_lastname'].', '.$row['client_firstname'].' '.$row['client_middlename'] ;?>",
                servicetype: "<?php echo ucwords($row['service_type']);?>",    
                aptdate: "<?php echo $row['service_apt_date'];?>" },   
                <?php      
                        }
                    }
                ?>
            ];

            var table = new Tabulator("#tbl_history", {
                height:"100%",
             	data:tabledata, //assign data to table
             	placeholder:"No Data Available",
             	pagination:"local",
                paginationSize:10,
                paginationSizeSelector:[3, 6, 8, 10],
                responsiveLayout:"hide",
             	columns:[ //Define Table Columns
                    //table data for View By Clients
                    <?php       
                        if($_GET['viewby'] == "client"){
                    ?>
                    {formatter:btn_view, width:100, align:"center", cellClick:function(e, cell){
                        window.open("viewclient.php?id=" + cell.getRow().getData().id, "_blank");
                    }},
             	    {title:"ID", field:"id", width:50, responsive:0, sorter:"number"},
            	 	{title:"First Name", field:"fname", width:200, responsive:0, sorter:"string"},
            	 	{title:"Middle Name", field:"mname", width:150, responsive:0, sorter:"string"},
            	 	{title:"Last Name", field:"lname", width:150, responsive:0, sorter:"string"},
            	 	{title:"Address", field:"add", align:"left", widthGrow:2, sorter:"string", responsive:1},
            	 	{title:"Contact Number", field:"conno", widthGrow:2, responsive:2, sorter:"string"},
                    <?php
                        }
                    ?>

                     //table data for View By Visits
                    <?php                      
                        if($_GET['viewby'] == "visits"){
                    ?>
                    {formatter:btn_view, width:100, align:"center", cellClick:function(e, cell){
                        window.open("viewpet.php?id=" + cell.getRow().getData().patientid + "&sid=" + cell.getRow().getData().id, "_blank");
                        document.getElementById("modal_visit").style.display = "block";
                    }},
                    {title:"ID", field:"id", width:50, responsive:0, sorter:"number"},
                    {title:"Patient ID", field:"patientid", width:50, responsive:0, sorter:"number"},
                    {title:"Patient Name", field:"patientname", width:200, responsive:0, sorter:"string"},
                    {title:"Owner Name", field:"ownername", width:300, responsive:0, sorter:"string"},
                    {title:"Service Type", field:"servicetype", width:150, responsive:0, sorter:"string"},
                    {title:"Appointment Date", field:"aptdate", width:150, responsive:0, sorter:"string"},
                    <?php
                        }    
                    ?>
             	],
            });

            <?php       
                if($_GET['viewby'] == "client"){
            ?>
                $("#btn_client").css('background', '#CCCCCC');
            <?php
                }

                if($_GET['viewby'] == "visits"){
            ?>
                $("#btn_visits").css('background', '#CCCCCC');
                document.getElementById("list_title").innerHTML = "Visits"
            <?php
                }
            ?>
		});

    </script>

</body>

</html>

<?php

    include("closedb_connection.php")
?>