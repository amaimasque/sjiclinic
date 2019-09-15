<!DOCTYPE html>
<html>
<head>
	<title>Welcome! | SJI Admin's Corner</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="icon" href="images/logo_img.png">
	<link rel="stylesheet" href="css/w3.css">
	<link rel="stylesheet" href="css/sjiclinic.css">
	<link rel="stylesheet" href="css/chartist.min.css">
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

#contimg{
	position: absolute;
	float: right;
	right: 0;
	bottom: 0;
	margin-top: 55px;
	height: 90vh;
	z-index: -1;
}

#contimg img{
	height: 100%;
}

#contchart {
	height: 300px;
}
</style>

</head>
<body>
	<?php
		require("nav_admin.php");
	?>
	<div class="w3-container" id="contbody">
		<h1 class="w3-wide">WELCOME</h1>
		<div class="w3-topbar w3-border-black" style="width: 100%"></div>
		<div class="w3-row">
			<div class="w3-col l6 m12 s12" id="contchart">
				<div class="ct-chart ct-perfect-fourth"></div>
			</div>
			<div class="w3-col l6 m12 s12" id="contchart">
				<p>Description of Line Chart</p>
				<div class="ct-chart2 ct-perfect-fourth"></div>
				</div>
				
			</div>
					
		</div>
	</div>
	<!--<div id="contimg">
		<img src="images/clipart_dog.png" style="height: 100%">
	</div>-->

	<!--<?php print_r($_SESSION, true) ?>-->
	<script src="js/chartist.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(e){
			new Chartist.Bar('.ct-chart', {
			  labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
			  series: [1, 10, 5, 3, 7, 12]
			}, {
				axisX: {
					onlyInteger: true
				},	
				axisY: {
					onlyInteger: true
				},
				height: '300px',
				width: '100%',
				distributeSeries: true,
				referenceValue: null,

			});

			new Chartist.Line('.ct-chart2', {
			  labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'],
			  series: [
			    [12, 9, 7, 8, 5],
			    [2, 1, 3.5, 7, 3],
			    [1, 3, 4, 5, 6]
			  ]
			}, {
			  fullWidth: true,
			  height: '250px',
			  chartPadding: {
			    right: 40
			  }
			});
		});
	</script>
</body>
</html>