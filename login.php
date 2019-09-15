<?php
	//	print_r($_SESSION);
?>
<!DOCTYPE html>
<html>
<head>
	<title>SJI Admin's Corner</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/logo_img.png">
	<link rel="stylesheet" href="css/w3.css">
	<link rel="stylesheet" href="css/sjiclinic.css">
	<style type="text/css">
		body{
			font-family: "Segoe UI", sans-serif;
			background-image: url("images/bg.jpg")!important;
		    background-size: cover;
		    background-attachment: center;
		}
		.contform{
			width: 100vw;
			padding: 0px 25%;
		}
		form{
			background-color: white;
		}
		.w3-section{
			padding: 5px 20%;
		}
		.w3-bar .w3-button{
			padding: 10px;
			width: 50%;
		}
		.w3-bar .w3-button:hover{
			background-color: #bbd3b3!important;
			font-weight: 500;
		}
		@media screen and (max-width: 676px){
			.contform{
				 padding: 0px 50px;
			}
		}
	</style>
</head>
<body class="w3-cell w3-center w3-cell-middle" style="height: 100vh">
	<div class="w3-container contform">
		<form method="POST" action="loginvalidation.php" class="w3-card" id="formLogin">
			<div class="w3-container" style="padding-top: 10px; background-color: #d3464e"> 
				<img src="images/logo_img.png" style="width: 50px;">
				<h4 style="font-weight: 500">SJI Pet Turf Animal Clinic Login</h4>
			</div>
			<div class="w3-row w3-section">
				<div class="w3-col" style="width: 50px">
					<i class="w3-xlarge demo-icon icon-user"></i>
				</div>
				<div class="w3-rest">
					<input class="w3-input" type="text" name="uname" placeholder="Username" id="input_username" required>	
				</div>
			</div>
			<div class="w3-row w3-section">
				<div class="w3-col" style="width: 50px">
					<i class="w3-xlarge demo-icon icon-password"></i>
				</div>
				<div class="w3-rest">
					<input class="w3-input" type="password" name="passw" placeholder="Password" id="input_password" required>	
				</div>
			</div>
			<div class="w3-bar w3-container" style="width: 100%; padding: 0px 5px">
				<input type="reset" class="w3-button w3-bar-item w3-border" value="CLEAR">
				<button type="submit" class="w3-button w3-bar-item w3-border" name="btnLogin">LOGIN</button>
			</div>
		</form>
	</div>
	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
	<?php
		include('checkusers.php');
		
		if(isset($_GET['invaliduser'])){
    ?>
        <script>
            $(document).ready(function(e){
               alert("User does not exists!"); 
            });
        </script>
    <?php
		}
	?>
</body>
</html>