		$(document).ready(function(e){
		
			<?php
				include("db_connection.php");
				$date = date("Y-m-d");
				$sql = 'SELECT * FROM tbl_service WHERE service_apt_date BETWEEN "'.$date.' 00:00:00" AND "'.$date.' 23:59:59" AND service_type="consultation"';
				$result = mysqli_query($con, $sql);
				$consultation = strval(mysqli_num_rows($result));

				$sql = 'SELECT * FROM tbl_service WHERE service_apt_date BETWEEN "'.$date.' 00:00:00" AND "'.$date.' 23:59:59" AND service_type="confinement"';
				$result = mysqli_query($con, $sql);
				$confinement = strval(mysqli_num_rows($result));

				$sql = 'SELECT * FROM tbl_service WHERE service_apt_date BETWEEN "'.$date.' 00:00:00" AND "'.$date.' 23:59:59" AND service_type="surgery"';
				$result = mysqli_query($con, $sql);
				$surgery = strval(mysqli_num_rows($result));

				$sql = 'SELECT * FROM tbl_service WHERE service_apt_date BETWEEN "'.$date.' 00:00:00" AND "'.$date.' 23:59:59" AND service_type="vaccine"';
				$result = mysqli_query($con, $sql);
				$vaccine = strval(mysqli_num_rows($result));

				$sql = 'SELECT * FROM tbl_service WHERE service_apt_date BETWEEN "'.$date.' 00:00:00" AND "'.$date.' 23:59:59" AND service_type="laboratory"';
				$result = mysqli_query($con, $sql);
				$laboratory = strval(mysqli_num_rows($result));

				$currMonth = date("m");
				$currYr = date("Y");
				$sql = 'SELECT * FROM tbl_service WHERE service_apt_date BETWEEN "'.$currYr.'-'.$currMonth.'-01 00:00:00" AND "'.$currYr.'-'.$currMonth.'-31 23:59:59"';
				$result = mysqli_query($con, $sql);
				$movisits = strval(mysqli_num_rows($result));

				$sql = 'SELECT * FROM tbl_service WHERE service_apt_date BETWEEN "'.$currYr.'-01-01 00:00:00" AND "'.$currYr.'-12-31 23:59:59"';
				$result = mysqli_query($con, $sql);
				$yrvisits = strval(mysqli_num_rows($result));

				$currDay = date("d");
				$lineData = array();

				if (date("N")==1) {
					$start = $currDay;
					$end = $currDay + 5;
				}elseif (date("N")==2) {
					$start = $currDay-1;
					$end = $currDay + 4;
				}elseif (date("N")==3) {
					$start = $currDay-2;
					$end = $currDay + 3;
				}elseif (date("N")==4) {
					$start = $currDay-3;
					$end = $currDay + 2;
				}elseif (date("N")==5) {
					$start = $currDay-4;
					$end = $currDay + 1;
				}elseif (date("N")==6) {
					$start = $currDay-5;
					$end = $currDay;
				}

				$sql = 'SELECT * FROM tbl_service WHERE service_apt_date BETWEEN "'.$currYr.'-'.$currMonth.'-'.$start.' 00:00:00" AND "'.$currYr.'-'.$currMonth.'-'.$end.' 23:59:59"';
				$result = mysqli_query($con, $sql);
				$wkvisits = strval(mysqli_num_rows($result));


				$sql = 'SELECT * FROM tbl_service WHERE service_apt_date BETWEEN "'.$currYr.'-'.$currMonth.'-'.$start.' 00:00:00" AND "'.$currYr.'-'.$currMonth.'-'.$end.' 23:59:59"';
				$result = mysqli_query($con, $sql);
				$wkvisits = strval(mysqli_num_rows($result));	

			//MONDAY
				$sql = 'SELECT * FROM tbl_service WHERE service_apt_date BETWEEN "'.$currYr.'-'.$currMonth.'-'.$start.' 00:00:00" AND "'.$currYr.'-'.$currMonth.'-'.$start.' 23:59:59" AND service_type="consultation"';
				$result = mysqli_query($con, $sql);
				$lineData['consultation_mon'] = mysqli_num_rows($result);
				$sql = 'SELECT * FROM tbl_service WHERE service_apt_date BETWEEN "'.$currYr.'-'.$currMonth.'-'.$start.' 00:00:00" AND "'.$currYr.'-'.$currMonth.'-'.$start.' 23:59:59" AND service_type="confinement"';
				$result = mysqli_query($con, $sql);
				$lineData['confinement_mon'] = mysqli_num_rows($result);
				$sql = 'SELECT * FROM tbl_service WHERE service_apt_date BETWEEN "'.$currYr.'-'.$currMonth.'-'.$start.' 00:00:00" AND "'.$currYr.'-'.$currMonth.'-'.$start.' 23:59:59" AND service_type="surgery"';
				$result = mysqli_query($con, $sql);
				$lineData['surgery_mon'] = mysqli_num_rows($result);
				$sql = 'SELECT * FROM tbl_service WHERE service_apt_date BETWEEN "'.$currYr.'-'.$currMonth.'-'.$start.' 00:00:00" AND "'.$currYr.'-'.$currMonth.'-'.$start.' 23:59:59" AND service_type="vaccine"';
				$result = mysqli_query($con, $sql);
				$lineData['vaccine_mon'] = mysqli_num_rows($result);
				$sql = 'SELECT * FROM tbl_service WHERE service_apt_date BETWEEN "'.$currYr.'-'.$currMonth.'-'.$start.' 00:00:00" AND "'.$currYr.'-'.$currMonth.'-'.$start.' 23:59:59" AND service_type="laboratory"';
				$result = mysqli_query($con, $sql);
				$lineData['lab_mon'] = mysqli_num_rows($result);

			$start++;
			//TUESDAY
				$sql = 'SELECT * FROM tbl_service WHERE service_apt_date BETWEEN "'.$currYr.'-'.$currMonth.'-'.$start.' 00:00:00" AND "'.$currYr.'-'.$currMonth.'-'.$start.' 23:59:59" AND service_type="consultation"';
				$result = mysqli_query($con, $sql);
				$lineData['consultation_tue'] = mysqli_num_rows($result);
				$sql = 'SELECT * FROM tbl_service WHERE service_apt_date BETWEEN "'.$currYr.'-'.$currMonth.'-'.$start.' 00:00:00" AND "'.$currYr.'-'.$currMonth.'-'.$start.' 23:59:59" AND service_type="confinement"';
				$result = mysqli_query($con, $sql);
				$lineData['confinement_tue'] = (mysqli_num_rows($result));
				$sql = 'SELECT * FROM tbl_service WHERE service_apt_date BETWEEN "'.$currYr.'-'.$currMonth.'-'.$start.' 00:00:00" AND "'.$currYr.'-'.$currMonth.'-'.$start.' 23:59:59" AND service_type="surgery"';
				$result = mysqli_query($con, $sql);
				$lineData['surgery_tue'] = (mysqli_num_rows($result));
				$sql = 'SELECT * FROM tbl_service WHERE service_apt_date BETWEEN "'.$currYr.'-'.$currMonth.'-'.$start.' 00:00:00" AND "'.$currYr.'-'.$currMonth.'-'.$start.' 23:59:59" AND service_type="vaccine"';
				$result = mysqli_query($con, $sql);
				$lineData['vaccine_tue'] = (mysqli_num_rows($result));
				$sql = 'SELECT * FROM tbl_service WHERE service_apt_date BETWEEN "'.$currYr.'-'.$currMonth.'-'.$start.' 00:00:00" AND "'.$currYr.'-'.$currMonth.'-'.$start.' 23:59:59" AND service_type="laboratory"';
				$result = mysqli_query($con, $sql);
				$lineData['lab_tue'] = (mysqli_num_rows($result));

			$start++;
			//WEDNESDAY
				$sql = 'SELECT * FROM tbl_service WHERE service_apt_date BETWEEN "'.$currYr.'-'.$currMonth.'-'.$start.' 00:00:00" AND "'.$currYr.'-'.$currMonth.'-'.$start.' 23:59:59" AND service_type="consultation"';
				$result = mysqli_query($con, $sql);
				$lineData['consultation_wed'] = (mysqli_num_rows($result));
				$sql = 'SELECT * FROM tbl_service WHERE service_apt_date BETWEEN "'.$currYr.'-'.$currMonth.'-'.$start.' 00:00:00" AND "'.$currYr.'-'.$currMonth.'-'.$start.' 23:59:59" AND service_type="confinement"';
				$result = mysqli_query($con, $sql);
				$lineData['confinement_wed'] = (mysqli_num_rows($result));
				$sql = 'SELECT * FROM tbl_service WHERE service_apt_date BETWEEN "'.$currYr.'-'.$currMonth.'-'.$start.' 00:00:00" AND "'.$currYr.'-'.$currMonth.'-'.$start.' 23:59:59" AND service_type="surgery"';
				$result = mysqli_query($con, $sql);
				$lineData['surgery_wed'] = (mysqli_num_rows($result));
				$sql = 'SELECT * FROM tbl_service WHERE service_apt_date BETWEEN "'.$currYr.'-'.$currMonth.'-'.$start.' 00:00:00" AND "'.$currYr.'-'.$currMonth.'-'.$start.' 23:59:59" AND service_type="vaccine"';
				$result = mysqli_query($con, $sql);
				$lineData['vaccine_wed'] = (mysqli_num_rows($result));
				$sql = 'SELECT * FROM tbl_service WHERE service_apt_date BETWEEN "'.$currYr.'-'.$currMonth.'-'.$start.' 00:00:00" AND "'.$currYr.'-'.$currMonth.'-'.$start.' 23:59:59" AND service_type="laboratory"';
				$result = mysqli_query($con, $sql);
				$lineData['lab_wed'] = (mysqli_num_rows($result));

			$start++;
			//THURSDAY
				$sql = 'SELECT * FROM tbl_service WHERE service_apt_date BETWEEN "'.$currYr.'-'.$currMonth.'-'.$start.' 00:00:00" AND "'.$currYr.'-'.$currMonth.'-'.$start.' 23:59:59" AND service_type="consultation"';
				$result = mysqli_query($con, $sql);
				$lineData['consultation_thu'] = (mysqli_num_rows($result));
				$sql = 'SELECT * FROM tbl_service WHERE service_apt_date BETWEEN "'.$currYr.'-'.$currMonth.'-'.$start.' 00:00:00" AND "'.$currYr.'-'.$currMonth.'-'.$start.' 23:59:59" AND service_type="confinement"';
				$result = mysqli_query($con, $sql);
				$lineData['confinement_thu'] = (mysqli_num_rows($result));
				$sql = 'SELECT * FROM tbl_service WHERE service_apt_date BETWEEN "'.$currYr.'-'.$currMonth.'-'.$start.' 00:00:00" AND "'.$currYr.'-'.$currMonth.'-'.$start.' 23:59:59" AND service_type="surgery"';
				$result = mysqli_query($con, $sql);
				$lineData['surgery_thu'] = (mysqli_num_rows($result));
				$sql = 'SELECT * FROM tbl_service WHERE service_apt_date BETWEEN "'.$currYr.'-'.$currMonth.'-'.$start.' 00:00:00" AND "'.$currYr.'-'.$currMonth.'-'.$start.' 23:59:59" AND service_type="vaccine"';
				$result = mysqli_query($con, $sql);
				$lineData['vaccine_thu'] = (mysqli_num_rows($result));
				$sql = 'SELECT * FROM tbl_service WHERE service_apt_date BETWEEN "'.$currYr.'-'.$currMonth.'-'.$start.' 00:00:00" AND "'.$currYr.'-'.$currMonth.'-'.$start.' 23:59:59" AND service_type="laboratory"';
				$result = mysqli_query($con, $sql);
				$lineData['lab_thu'] = (mysqli_num_rows($result));

			$start++;
			//FRIDAY
				$sql = 'SELECT * FROM tbl_service WHERE service_apt_date BETWEEN "'.$currYr.'-'.$currMonth.'-'.$start.' 00:00:00" AND "'.$currYr.'-'.$currMonth.'-'.$start.' 23:59:59" AND service_type="consultation"';
				$result = mysqli_query($con, $sql);
				$lineData['consultation_fri'] = (mysqli_num_rows($result));
				$sql = 'SELECT * FROM tbl_service WHERE service_apt_date BETWEEN "'.$currYr.'-'.$currMonth.'-'.$start.' 00:00:00" AND "'.$currYr.'-'.$currMonth.'-'.$start.' 23:59:59" AND service_type="confinement"';
				$result = mysqli_query($con, $sql);
				$lineData['confinement_fri'] = (mysqli_num_rows($result));
				$sql = 'SELECT * FROM tbl_service WHERE service_apt_date BETWEEN "'.$currYr.'-'.$currMonth.'-'.$start.' 00:00:00" AND "'.$currYr.'-'.$currMonth.'-'.$start.' 23:59:59" AND service_type="surgery"';
				$result = mysqli_query($con, $sql);
				$lineData['surgery_fri'] = (mysqli_num_rows($result));
				$sql = 'SELECT * FROM tbl_service WHERE service_apt_date BETWEEN "'.$currYr.'-'.$currMonth.'-'.$start.' 00:00:00" AND "'.$currYr.'-'.$currMonth.'-'.$start.' 23:59:59" AND service_type="vaccine"';
				$result = mysqli_query($con, $sql);
				$lineData['vaccine_fri'] = (mysqli_num_rows($result));
				$sql = 'SELECT * FROM tbl_service WHERE service_apt_date BETWEEN "'.$currYr.'-'.$currMonth.'-'.$start.' 00:00:00" AND "'.$currYr.'-'.$currMonth.'-'.$start.' 23:59:59" AND service_type="laboratory"';
				$result = mysqli_query($con, $sql);
				$lineData['lab_fri'] = (mysqli_num_rows($result));

			$start++;
			//SATURDAY
				$sql = 'SELECT * FROM tbl_service WHERE service_apt_date BETWEEN "'.$currYr.'-'.$currMonth.'-'.$start.' 00:00:00" AND "'.$currYr.'-'.$currMonth.'-'.$start.' 23:59:59" AND service_type="consultation"';
				$result = mysqli_query($con, $sql);
				$lineData['consultation_sat'] = (mysqli_num_rows($result));
				$sql = 'SELECT * FROM tbl_service WHERE service_apt_date BETWEEN "'.$currYr.'-'.$currMonth.'-'.$start.' 00:00:00" AND "'.$currYr.'-'.$currMonth.'-'.$start.' 23:59:59" AND service_type="confinement"';
				$result = mysqli_query($con, $sql);
				$lineData['confinement_sat'] = (mysqli_num_rows($result));
				$sql = 'SELECT * FROM tbl_service WHERE service_apt_date BETWEEN "'.$currYr.'-'.$currMonth.'-'.$start.' 00:00:00" AND "'.$currYr.'-'.$currMonth.'-'.$start.' 23:59:59" AND service_type="surgery"';
				$result = mysqli_query($con, $sql);
				$lineData['surgery_sat'] = (mysqli_num_rows($result));
				$sql = 'SELECT * FROM tbl_service WHERE service_apt_date BETWEEN "'.$currYr.'-'.$currMonth.'-'.$start.' 00:00:00" AND "'.$currYr.'-'.$currMonth.'-'.$start.' 23:59:59" AND service_type="vaccine"';
				$result = mysqli_query($con, $sql);
				$lineData['vaccine_sat'] = (mysqli_num_rows($result));
				$sql = 'SELECT * FROM tbl_service WHERE service_apt_date BETWEEN "'.$currYr.'-'.$currMonth.'-'.$start.' 00:00:00" AND "'.$currYr.'-'.$currMonth.'-'.$start.' 23:59:59" AND service_type="laboratory"';
				$result = mysqli_query($con, $sql);
				$lineData['lab_sat'] = (mysqli_num_rows($result));
			?>

			document.getElementById("noweekly").innerHTML = "<?php echo $wkvisits ?>";
			document.getElementById("nomonthly").innerHTML = "<?php echo $movisits?>";
			document.getElementById("noyearly").innerHTML = "<?php echo $yrvisits?>";

			new Chartist.Bar('#chart_daily', {

			  labels: ['Consultation', 'Confinement', 'Surgery',  'Vaccine', 'Laboratory'],

			  series: ["<?php echo $consultation; ?>", "<?php echo $confinement; ?>", "<?php echo $surgery; ?>", "<?php echo $vaccine; ?>", "<?php echo $laboratory; ?>"]

			}, {	

				axisY: {

					onlyInteger: true

				},

				height: '300px',

				distributeSeries: true,

				referenceValue: null,



			});



			new Chartist.Line('#chart_weekly', {

			  labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],

			  series: [

			    [<?php echo $lineData['consultation_mon']; ?>, <?php echo $lineData['consultation_tue']; ?>, <?php echo $lineData['consultation_wed']; ?>, <?php echo $lineData['consultation_thu']; ?>, <?php echo $lineData['consultation_fri']; ?>, <?php echo $lineData['consultation_sat']; ?>],

			    [<?php echo $lineData['confinement_mon']; ?>, <?php echo $lineData['confinement_tue']; ?>, <?php echo $lineData['confinement_wed']; ?>, <?php echo $lineData['confinement_thu']; ?>, <?php echo $lineData['confinement_fri']; ?>, <?php echo $lineData['confinement_sat']; ?>],

			    [<?php echo $lineData['surgery_mon']; ?>, <?php echo $lineData['surgery_tue']; ?>, <?php echo $lineData['surgery_wed']; ?>, <?php echo $lineData['surgery_thu']; ?>, <?php echo $lineData['surgery_fri']; ?>, <?php echo $lineData['surgery_sat']; ?>],


			    [<?php echo $lineData['vaccine_mon']; ?>, <?php echo $lineData['vaccine_tue']; ?>, <?php echo $lineData['vaccine_wed']; ?>, <?php echo $lineData['vaccine_thu']; ?>, <?php echo $lineData['vaccine_fri']; ?>, <?php echo $lineData['vaccine_sat']; ?>],


			    [<?php echo $lineData['lab_mon']; ?>, <?php echo $lineData['lab_tue']; ?>, <?php echo $lineData['lab_wed']; ?>, <?php echo $lineData['lab_thu']; ?>, <?php echo $lineData['lab_fri']; ?>, <?php echo $lineData['lab_sat']; ?>],


			  ]

			}, 


			{


			  fullWidth: true,

			  chartPadding: {

			    right: 40

			  },

			  axisY: {

			  	onlyInteger: true
			  	
			  }

			});

			<?php

				include("closedb_connection.php");

			?>

		});