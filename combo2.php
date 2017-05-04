

<!DOCTYPE html>

<html>
	<head>
	
		<meta charset="UTF-8"> 
		<meta name="description" content="HIV Regimen Generator possible combinations">
		<meta name="keywords" content="HIV, AIDS, gov, government, schedule, regimen, generator">
		<meta name="author" content="McMaster University Computer Science Capstone Team 14">
		<script type="text/javascript" src="comboscript.js"></script>

		
		<!-- auto scales on phones -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
		
		<!-- defining browser details and linking to css-->
		<title> HRV.org </title>
		<link type="text/css" rel="stylesheet" href="css/form.css"/>
		<link rel="icon" href="images/pill.png"> 
		
	</head>

	<body>		
			
		<div id="banner">
			<img id="banner-img" src="images/logo.png" height="120" width="400" alt="HRG.org header banner">
		</div>
		
		<div id="header">
			<ul>
				<!--listing all the options on the header-->
				<li class="headerli"> <a href="index.html"> Home </a> </li>
				<li class="headerli"> <a href="about.html"> About  </a> </li>
			
			</ul>
		</div>
		<p id="disclaimer"> *Disclaimer* None of the following information you provide will be stored. All details inputted will be removed immediately after you close the browser. </p>
		<form onsubmit="return check2()" action="results.php" method="post">
		<fieldset>
				<legend> ALL COMBINATIONS </legend>
				<div id="combo">
				
				<?php
					session_start();
					$i = -1;
					$l = -1;
					$n = array();
					$m = array();

					$dbServerName = "localhost";
					$dbUsername = "root";
					$dbPassword = "";
					$dbName = "medications";
					$conn = new mysqli($dbServerName, $dbUsername, $dbPassword, $dbName);
					$result = $conn->query('SELECT * FROM medication_table');


					// $user = 'root';
					// 	$pass = '';
					// 	$pdo = new PDO('mysql:host=localhost;dbname=medications', $user, $pass);//PDO access database
					// 	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					// 	try {
					// 		$result = $pdo->query('SELECT * FROM `medication_table`');
					// 	} catch (PDOException $e) {
					// 		echo $e->getMessage();
					// 	}
					
					foreach ($result as $arv){
						
						
						if (isset($_POST[$arv['SName']]) == true){
							if ($arv['Type'] == 'NRTI' or $arv['Type'] == 'NRTI (rare)'){
								$i = $i+1;
								array_push($n,$arv['SName']);
							}
							else{
								$l = $l+1;
								array_push($m,$arv['SName']);
							}
						}
					}
					$c = -1;
					for ($x = 0; $x <= $i; $x++){
						for ($j = $x+1; $j <= $i; $j++){
							echo '<font color="brown" size="3">';
							echo '<b>';
							echo $n[$x];
							echo '+';
							echo $n[$j];
							echo '</font></b>';
							echo '<br>';
							echo '<br>';
							for ($k = 0; $k <= $l; $k++){
								$c =$c +1;
									echo '<span><input type="checkbox" id="',$c,'" name="',$c,'"  value="',$n[$x],'_',$n[$j],'_',$m[$k],'" ><b>',$m[$k],'<b>';
									echo '<br>';
									echo '<br>';
								

							}
							echo '<br>';
							echo '<br>';
						}
					}
					
					
					$_SESSION['c'] = $c;
					
				
				?>
				
				<div id="submit-buttons">
					<input type="submit" value="Continue"> 
				</div>
			</fieldset>
			
		</form>
			
		
		<div id="return"> 
			<a href="index.html"> Return to Home </a>
		</div>
	</body>

</html>