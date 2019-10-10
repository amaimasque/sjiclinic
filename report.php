<!DOCTYPE html>

<html>

<head>

	<title>View pending examinations</title>

	<meta charset="utf-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="icon" href="images/logo_img.png">

	<link rel="stylesheet" href="css/w3.css">

	<link rel="stylesheet" href="css/sjiclinic.css">

	<link rel="stylesheet" href="css/tabulator/tabulator.css"/>

    <script type="text/javascript" src="js/tabulator/tabulator.js"></script>
<style type="text/css">
#contbody{

	position: absolute;

    margin: auto;

    top: 0;

    right: 0;

    bottom: 0;

    left: 0;

    width: 70%;

    height: 50%;

}
</style>
</head>

<body>

	<?php

		require("nav_admin.php");

	?>

	<div class="w3-container" id="contbody">

		<input class="w3-input w3-round-xxlarge w3-border" type="text" name="texttosearch" placeholder="Search pending..." id="texttosearch">

		<div id="tbl_report"></div>

	</div>

	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>

<script type="text/javascript">
$(document).ready(function(){

	$("#report").addClass("button_active");

	var table = new Tabulator("#tbl_report", {
        height:"100%",
        placeholder:"No Data Available",
        pagination:"local",
        paginationSize:10,
        paginationSizeSelector:[3, 6, 8, 10],
        responsiveLayout:"hide",
        columns:[ //Define Table Columns
            {title:"ID", field:"id", width:50, responsive:0, sorter:"number"},
            {title:"Patient ID", field:"patientid", width:50, responsive:0, sorter:"number"},
            {title:"Patient Name", field:"patientname", width:200, responsive:0, sorter:"string"},
            {title:"Owner Name", field:"ownername", width:300, responsive:0, sorter:"string"},
            {title:"Service Type", field:"servicetype", width:150, responsive:0, sorter:"string"},
            {title:"Appointment Date", field:"aptdate", width:150, responsive:0, sorter:"string"}
        ],
    });
	
});
</script>
</body>

</html>