
<!-- The results page -->
<!DOCTYPE html>
<html>
	<head>
	
		<meta charset="UTF-8"> 
		<meta name="description" content="HIV Regimen Generator form">
		<meta name="keywords" content="HIV, AIDS, gov, government, schedule, regimen, generator">
		<meta name="author" content="McMaster University Computer Science Capstone Team 14">
		
		<!-- auto scales on phones -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
		
		<!-- defining browser details and linking to css-->
		<title> HRV.org </title>
		<link type="text/css" rel="stylesheet" href="css/results.css"/>
		<link rel="icon" href="images/pill.png"> 
		
	</head>
		
	<body>
		<div id="banner">
			<img id="banner-img" src="images/logo.png" height="120" width="400" alt="HRG.org header banner">
		</div>
		
		<div id="header">
			<ul id="headerul">
				<!--listing all the options on the header-->
				<li class="headerli"> <a href="index.html"> Home </a> </li>
				<li class="headerli"> <a href="about.html"> About  </a> </li>
			</ul>
		</div>
		
		 <!-- Session variables are displayed here. -->
		
		<br>
		<fieldset id="patinfo">
			<legend> Patient Information </legend>
			<?php
			session_start();

			if ($_SESSION["years"] != Null && $_SESSION["months"] != Null) {
				echo '<b> Age: </b> ',$_SESSION["years"],'  Years and ',$_SESSION["months"],' Months. <br><br>';
			}
			
			if ($_SESSION['weight'] !=Null) {
				echo '<b> Weight: </b> ',$_SESSION["weight"],'  kilograms (kg) <br><br>';
			}
			
			if ($_SESSION['height'] !=Null) {
				echo '<b> Height: </b> ',$_SESSION["height"],' centimetres (cm) <br><br>';
			}
			
			if ($_SESSION['tanner-stage'] != 'Null') {
				echo '<b> Tanner stage: </b> ',$_SESSION["tanner-stage"],' <br><br>';
			}
			
			if ($_SESSION['HLA-status'] != 'Null') {
				echo '<b> HLA status: </b> ',$_SESSION["HLA-status"],' <br><br>';
			}
		?>
		</fieldset>
		<br>
		
		
		
		<h1> Patient's Selected Regimen: </h1>
		<?php 
		$dbServerName = "localhost";
		$dbUsername = "root";
		$dbPassword = "";
		$dbName = "medications";
		$conn = new mysqli($dbServerName, $dbUsername, $dbPassword, $dbName);
		$result = $conn->query('SELECT * FROM medication_table');

			?>		
		
		<!--SQL file is used here to grab information related to the regimen. If statements are used since some ARVs have Null boxes.-->
	
		<?php
			$_SESSION['BSA'] = $_SESSION['height'] * $_SESSION['weight'] / 3600;

			for ($c1 = 0; $c1 <= $_SESSION['c']; $c1++){
				if (isset($_POST[$c1]) == true){
					$combo = explode("_", $_POST[$c1]);
					echo '<br>';
					echo '<br>';
					echo '<b><font color="red" size="6">',$combo[0],'   ',$combo[1],'    ',$combo[2],'</font></b>';
	
				
					foreach ($result as $Regimen) {
						
						if ($Regimen['SName'] == $combo[0] || $Regimen['SName'] == $combo[1] || $Regimen['SName'] == $combo[2]) {
							
							echo ('<h2>');
							echo $Regimen['Type'];
							echo ('</h2>');
							echo ('<fieldset id="pillone">');
							echo ('<legend>');
							echo $Regimen['Name'];
							echo ('</legend>');
							
							if ($_SESSION['medtypes'] == 'Formulations (Suspension)'){
								if ($Regimen['Formulations (Suspension)']!= Null){
									echo ('<br />');
									echo '<b>Formulations (Suspension)</b>';
									echo '<br >'; 
									echo '<br >'; 
									echo $Regimen['Formulations (Suspension)'];
									echo '<br >'; 
									echo '<br >'; 
									}
							}
							
							if ($_SESSION['medtypet'] == 'Formulations (Tablet)' ){
								if ($Regimen['Formulations (Tablet)']!= Null){
									echo ('<br />');
									echo '<b>Formulations (Tablet)</b>';
									echo '<br >'; 
									echo '<br >'; 
									echo $Regimen['Formulations (Tablet)'];
									}
							}
								
							if ($Regimen['Fixed Dose Combination Tablets']!= Null){
								echo '<br >'; 
								echo '<br >';
								echo '<br >'; 
								echo '<br >';
								echo '<b>Fixed Dose Combination Tablets</b>';
								echo '<br >'; 
								echo '<br >'; 
								echo $Regimen['Fixed Dose Combination Tablets'];
								}
								
							if ($Regimen['Treatment of HIV Infection']!= Null){
								echo '<br >'; 
								echo '<br >';
								echo '<br >'; 
								echo '<br >';
								echo '<b>Treatment of HIV Infection</b>';
								echo '<br >'; 
								echo '<br >'; 
								echo $Regimen['Treatment of HIV Infection'];
								}
								
							if ($_SESSION['years'] >= 0.5 and $_SESSION['months'] < 3 and $_SESSION['years'] == 0){
								echo '<br >'; 
								echo '<br >';
								echo '<br >'; 
								echo '<br >';
								echo '<b>Neonate (birth to <3 months)</b>';
								echo '<br >'; 
								echo '<br >'; 
								echo $Regimen['Neonate (birth to <3 months)'];
								}
								
							if ($_SESSION['months'] >= 3 and $_SESSION['months'] < 8 and $_SESSION['years'] == 0){
								echo '<br >'; 
								echo '<br >';
								echo '<br >'; 
								echo '<br >';
								echo '<b>Infant (3 months to 8 months)</b>';
								echo '<br >'; 
								echo '<br >'; 
								$e1=explode("mg/kg", $Regimen['Infant (3 months to 8 months)']);
								$s1=sizeof($e1);
								$res="";
								$res2="";
								 for ($n = 0; $n < $s1; $n++) {
									if (is_numeric(substr($e1[$n],0,strlen($e1[$n])-1))){
										$res = $res . ($e1[$n] * $_SESSION["weight"]);
										$res = $res . " mg ";
									}
									else{
										$res = $res . $e1[$n];
									}
								}
								$e2=explode("mg/m^2", $res);
								$s2=sizeof($e2);
								 for ($n = 0; $n < $s2; $n++) {
									if (is_numeric(substr($e2[$n],0,strlen($e2[$n])-1))){
										$res2 = $res2 . ($e2[$n] * $_SESSION["BSA"]);
										$res2 = $res2 . " mg ";
									}
									else{
										$res2 = $res2 . $e2[$n];
									}
								}
								echo $res2;
								
							}
								
							if ( ($_SESSION['years'] == 0 and $_SESSION['months'] >= 8)	or ($_SESSION['years'] < 6 and $_SESSION['years'] > 0)){
								echo '<br >'; 
								echo '<br >';
								echo '<br >'; 
								echo '<br >';
								echo '<b>Pediatric (8 months to 6 years old)</b>';
								echo '<br >'; 
								echo '<br >'; 
								echo $Regimen['Pediatric (8 months to 6 years old)'];
								echo '<br >'; 
								echo '<br >'; 
								$e1=explode("mg/kg", $Regimen['Pediatric (8 months to 6 years old)']);
								$s1=sizeof($e1);
								
								for ($n = 1; $n < $s1; $n++) {
									if (isset($e1[$n]) == true){
										echo $e1[$n-1] * $_SESSION["weight"];
										echo " mg ";
										echo $e1[$n];
									}
									else {
										echo $e1[$n];
									}
								}
							}
								
							if ($_SESSION['years'] >= 6 and $_SESSION['years'] < 18){
								echo '<br >'; 
								echo '<br >';
								echo '<br >'; 
								echo '<br >';
								echo '<b>Adolescent (6 years old - 17 years old)</b>';
								echo '<br >'; 
								echo '<br >'; 
								echo $Regimen['Adolescent (6 years old - 17 years old)'];
								}
							
							if ($_SESSION['years'] >= 18){
								echo '<br >'; 
								echo '<br >';
								echo '<br >'; 
								echo '<br >';
								echo '<b>Adult (18 years old+)</b>';
								echo '<br >'; 
								echo '<br >'; 
								echo $Regimen['Adult (18 years old+)'];
								}
								
							if ($Regimen['Special Instructions']!= Null){
								echo '<br >'; 
								echo '<br >';
								echo '<br >'; 
								echo '<br >';
								echo '<b>Special Instructions</b>';
								echo '<br >'; 
								echo '<br >'; 
								echo $Regimen['Special Instructions'];
								}
							
							echo ('</legend>');
							echo ('<br />');
							echo ('</fieldset>');
							}
					}
				}
			}				
			?>
		
		
		
		<a href="javascript:window.print()">
			<div id="print">
				 Print 
			</div>
		</a>
		
		<div id="return"> 
			<a href="index.html"> Return to Home </a>
		</div>
	</body>

</html>