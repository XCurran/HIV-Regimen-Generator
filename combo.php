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
		<!-- The combo page uses a check() Javascript function to see that the client has not accidentally chosen the same NRTI twice. This page then takes the user to the results page. -->
		
		<form onsubmit="return check()" action="combo2.php" method="post">
		
		<!--Session variables and used with a session so that the form variables and taken to the results page and can be displayed there. -->
		<?php
		session_start();
			$_SESSION['years'] = $_POST['years'];
			$_SESSION['months'] = $_POST['months'];
			$_SESSION['weight'] = $_POST['weight'];
			$_SESSION['height'] = $_POST['height'];
			$_SESSION['tanner-stage'] = $_POST['tanner-stage'];
			$_SESSION['HLA-status'] = $_POST['HLA-status'];
			
			if(isset($_POST['medtypes']) == true){
					$_SESSION['medtypes'] = $_POST['medtypes'];
				}
			else{
				$_SESSION['medtypes'] = $_POST['medtypet'];
			}
				
			if(isset($_POST['medtypet']) == true){
					$_SESSION['medtypet'] = $_POST['medtypet'];
				}
			else{
				$_SESSION['medtypet'] = $_POST['medtypes'];
			}
				
			for ($x =1; $x <=27; $x++){
				$y = "a$x";
				if(isset($_POST[$y]) == true){
					$_SESSION[$y] = null;
				}
			}
			for ($x = 1; $x <= 27; $x++){
				$y = "a$x";
				if(isset($_POST[$y]) == false){
					$_SESSION[$y] = $y;
				}
			}
?>
			<fieldset>
			
				<legend> Possible Regimen Selections </legend>
				<br> <input type="radio" onclick="return select1()"> SELECT ALL <br>
				<div id="combo">
				<!--The following code uses an SQL table and grabs the necessary information related to the medication that users can combine. The NRTIs are selected by type,
				while the other medications are checked by name since they are not used for only one combination. Alternative regiments follow different guidelines so they
				may appear in more than one possible selection.-->
					<h3> Compatible Regimen: </h3>
					<!-- result1 is for nrti1
						 result2 is for nrti2
						 result3 is for the extra arv
						 result4, result5 and result6 is for the extra arv in an alternative regimen -->
					<p> <?php
						$dbServerName = "localhost";
						$dbUsername = "root";
						$dbPassword = "";
						$dbName = "medications";
						$conn = new mysqli($dbServerName, $dbUsername, $dbPassword, $dbName);
						// $user = 'root';
						// $pass = '';
						// $pdo = new PDO('mysql:host=localhost;dbname=medications', $user, $pass);//PDO access database
						// $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						// try {
							$result = $conn->query('SELECT * FROM medication_table');
							$result2 = $conn->query('SELECT * FROM medication_table');
							$result3 = $conn->query('SELECT * FROM medication_table');
							$result4 = $conn->query('SELECT * FROM medication_table');
							$result5 = $conn->query('SELECT * FROM medication_table');
							$result6 = $conn->query('SELECT * FROM medication_table');
						// } catch (PDOException $e) {
						// 	echo $e->getMessage();
						// }
						$agey= $_POST['years'];
						$agem= $_POST['months'];
						$tanner= $_POST['tanner-stage'];
						$weight= $_POST['weight'];
						echo'<b>CHOOSE AT LEAST TWO NRTIs</b>';
						echo'<br>';
						echo'<br>';
						foreach ($result as $arv) {
							if ($arv['Type'] == ('NRTI' || 'NRTI (rare)') ){
								if ($arv['CName'] === $_SESSION['a1'] or $arv['CName'] === $_SESSION['a2'] or $arv['CName'] === $_SESSION['a3'] or $arv['CName'] === $_SESSION['a4'] or $arv['CName'] === $_SESSION['a5'] or $arv['CName'] === $_SESSION['a7'] or $arv['CName'] === $_SESSION['a8']){
									if ($arv['CName'] === $_SESSION['a1'] and $_SESSION['HLA-status'] === 'positive'){
										echo ' ';
									}
									else{
										if ($arv[$_SESSION['medtypes']] != Null or $arv[$_SESSION['medtypet']] != Null){
											echo '<span><input type="checkbox" id="',$arv['CName'],'" name="',$arv['SName'],'" value="',$arv['SName'],'" >',$arv['Name'],'';
											echo'<br>';
											echo'<br>';
										}
									}
								}
							}		
						}
						if (($agey == 0 && $agem >= 0.5) || ($agey<2 && $agey>0)){
							foreach ($result3 as $arv) {
								if ($arv['CName'] === $_SESSION['a17']){
									if ($arv[$_SESSION['medtypes']] != Null or $arv[$_SESSION['medtypet']] != Null){
										echo'<b>CHOOSE AT LEAST ONE</b>';
										echo'<br>';
										echo'<br>';
											if ($arv['SName'] == ('Lopinavir')){
													echo '<span><input type="checkbox" id="',$arv['CName'],'" name="',$arv['SName'],'" value="',$arv['SName'],'" >',$arv['Name'],'';
													echo'<br>';
													echo'<br>';
												}
										}
									}
							}
						}	
						if (($agey == 0 && $agem > 0.5) || ($agey<2 && $agey>0)){
								foreach ($result4 as $arv) {
										if ($arv['CName'] === $_SESSION['a11']){
											if ($arv[$_SESSION['medtypes']] != Null or $arv[$_SESSION['medtypet']] != Null){
												echo'<b>ALTERNATIVE REGIMEN</b>';
												echo'<br>';
												echo'<br>';
												echo '<span><input type="checkbox" id="',$arv['CName'],'" name="',$arv['SName'],'"  value="',$arv['SName'],'" >',$arv['Name'],'';
												echo'<br>';
												echo'<br>';
											}
										}
								}
							}
						if (($agey == 0 && $agem >= 1 && $weight >=3) || ($agey<2 && $agey>0 && $weight >=3)){
								foreach ($result5 as $arv) {
									if ($arv['CName'] === $_SESSION['a25']){
										if ($arv[$_SESSION['medtypes']] != Null or $arv[$_SESSION['medtypet']] != Null){
											echo'<b>ALTERNATIVE REGIMEN</b>';
											echo'<br>';
											echo'<br>';
											echo '<span><input type="checkbox" id="',$arv['CName'],'" name="',$arv['SName'],'" value="',$arv['SName'],'" >',$arv['Name'],'';
											echo'<br>';
											echo'<br>';
										}
									}
							}
						}
						if (($agey == 0 && $agem >= 3 && $weight >=10) || ($agey<3 && $agey>0 && $weight >=10)){
								foreach ($result6 as $arv) {
									if ($arv['CName'] === $_SESSION['a13']){
										if ($arv[$_SESSION['medtypes']] != Null or $arv[$_SESSION['medtypet']] != Null){
											echo'<b>ALTERNATIVE REGIMEN</b>';
											echo'<br>';
											echo'<br>';
											echo '<span><input type="checkbox" id="',$arv['CName'],'" name="',$arv['SName'],'" value="',$arv['SName'],'" >',$arv['Name'],'';
											echo'<br>';
											echo'<br>';
										}
									}
								}
							}
						
						else if (($agey == 2 && $agem >= 0) || ($agey<3 && $agey>2)){
								echo '<b>CHOOSE AT LEAST ONE</b>';
								echo '<br>';
								echo '<br>';
								foreach ($result3 as $arv) {
									if ($arv['CName'] == $_SESSION['a17']){
										if ($arv[$_SESSION['medtypes']] != Null or $arv[$_SESSION['medtypet']] != Null){
										echo '<span><input type="checkbox" id="',$arv['CName'],'" name="',$arv['SName'],'" value="',$arv['SName'],'" >',$arv['Name'],'';
										echo'<br>';
										echo'<br>';
										}
									}
									else if ($arv['CName'] == $_SESSION['a25']){
										if ($arv[$_SESSION['medtypes']] != Null or $arv[$_SESSION['medtypet']] != Null){
											echo '<span><input type="checkbox" id="',$arv['CName'],'" name="',$arv['SName'],'" value="',$arv['SName'],'" >',$arv['Name'],'';
											echo'<br>';
											echo'<br>';
										}
									}		
								
							}
							if (($agey == 2 && $agem >= 0) || ($agey<3 && $agey>2)){
									foreach ($result4 as $arv) {
										if ($arv['CName'] == $_SESSION['a11']){
											if ($arv[$_SESSION['medtypes']] != Null or $arv[$_SESSION['medtypet']] != Null){
												echo'<b>ALTERNATIVE REGIMEN</b>';
												echo'<br>';
												echo'<br>';
												echo '<span><input type="checkbox" id="',$arv['CName'],'" name="',$arv['SName'],'" value="',$arv['SName'],'" >',$arv['Name'],'';
												echo'<br>';
												echo'<br>';
											}
									}
								}
							}
							if (($agey == 0 && $agem >= 3 && $weight >=10) || ($agey<3 && $agey>0 && $weight >=10)){
									foreach ($result6 as $arv) {
										if ($arv['CName'] === $_SESSION['a13']){
											if ($arv[$_SESSION['medtypes']] != Null or $arv[$_SESSION['medtypet']] != Null){
												echo'<b>ALTERNATIVE REGIMEN</b>';
												echo'<br>';
												echo'<br>';
												echo '<span><input type="checkbox" id="',$arv['CName'],'" name="',$arv['SName'],'" value="',$arv['SName'],'" >',$arv['Name'],'';
												echo'<br>';
												echo'<br>';
											}
										}
									}
								}
							}
						else if (($agey == 3 && $agem >= 0) || ($agey<12 && $agey>3)) {
								echo '<b>CHOOSE AT LEAST ONE</b>';
								echo '<br>';
								echo '<br>';
								foreach ($result3 as $arv) {
									if ($arv['CName'] == $_SESSION['a17']){
										if ($arv[$_SESSION['medtypes']] != Null or $arv[$_SESSION['medtypet']] != Null){
											echo '<span><input type="checkbox" id="',$arv['CName'],'" name="',$arv['SName'],'" value="',$arv['SName'],'" >',$arv['Name'],'';
											echo'<br>';
											echo'<br>';
										}
									}
									else if ($arv['CName'] == $_SESSION['a25']){
										if ($arv[$_SESSION['medtypes']] != Null or $arv[$_SESSION['medtypet']] != Null){
											echo '<span><input type="checkbox" id="',$arv['CName'],'" name="',$arv['SName'],'" value="',$arv['SName'],'" >',$arv['Name'],'';
											echo'<br>';
											echo'<br>';
										}
									}
									else if ($arv['CName'] == $_SESSION['a24']){
										if ($arv[$_SESSION['medtypes']] != Null or $arv[$_SESSION['medtypet']] != Null){
											echo '<span><input type="checkbox" id="',$arv['CName'],'" name="',$arv['SName'],'" value="',$arv['SName'],'" >',$arv['Name'],'';
											echo'<br>';
											echo'<br>';
										}
									}
									else if ($arv['CName'] == $_SESSION['a13']){
										if ($arv[$_SESSION['medtypes']] != Null or $arv[$_SESSION['medtypet']] != Null){
											echo '<span><input type="checkbox" id="',$arv['CName'],'" name="',$arv['SName'],'" value="',$arv['SName'],'" >',$arv['Name'],'';
											echo'<br>';
											echo'<br>';
										}
									}
									else if ($arv['CName'] == $_SESSION['a14']){
										if ($arv[$_SESSION['medtypes']] != Null or $arv[$_SESSION['medtypet']] != Null){
											echo '<span><input type="checkbox" id="',$arv['CName'],'" name="',$arv['SName'],'" value="',$arv['SName'],'" >',$arv['Name'],'(twice daily)';
											echo'<br>';
											echo'<br>';
										}
									}
								}
							
						}
						else if (($agey >= 12) && (($tanner == 1) || ($tanner == 2) || ($tanner == 3))) {
								echo '<b>CHOOSE AT LEAST ONE</b>';
								echo '<br>';
								echo '<br>';
								foreach ($result3 as $arv) {
									if ($arv['CName'] == $_SESSION['a13']){
										if ($arv[$_SESSION['medtypes']] != Null or $arv[$_SESSION['medtypet']] != Null){
											echo '<span><input type="checkbox" id="',$arv['CName'],'" name="',$arv['SName'],'" value="',$arv['SName'],'" >',$arv['Name'],'';
											echo'<br>';
											echo'<br>';
										}
									}
									else if ($arv['CName'] == $_SESSION['a9']){
										if ($arv[$_SESSION['medtypes']] != Null or $arv[$_SESSION['medtypet']] != Null){
											echo '<span><input type="checkbox" id="',$arv['CName'],'" name="',$arv['SName'],'" value="',$arv['SName'],'" >',$arv['Name'],'';
											echo'<br>';
											echo'<br>';
										}
									}
									else if ($arv['CName'] == $_SESSION['a14']){
										if ($arv[$_SESSION['medtypes']] != Null or $arv[$_SESSION['medtypet']] != Null){
											echo '<span><input type="checkbox" id="',$arv['CName'],'" name="',$arv['SName'],'" value="',$arv['SName'],'" >',$arv['Name'],'(once daily)';
											echo'<br>';
											echo'<br>';
										}
									}
									else if ($arv['CName'] == $_SESSION['a23']){
										if ($arv[$_SESSION['medtypes']] != Null or $arv[$_SESSION['medtypet']] != Null){
											echo '<span><input type="checkbox" id="',$arv['CName'],'" name="',$arv['SName'],'" value="',$arv['SName'],'" >',$arv['Name'],'';
											echo'<br>';
											echo'<br>';
										}
									}
									else if ($arv['CName'] == $_SESSION['a24']){
										if ($arv[$_SESSION['medtypes']] != Null or $arv[$_SESSION['medtypet']] != Null){
											echo '<b>ALTERNATIVE REGIMEN</b>';
											echo '<br>';
											echo '<br>';
											echo '<span><input type="checkbox" id="',$arv['CName'],'" name="',$arv['SName'],'" value="',$arv['SName'],'" >',$arv['Name'],'';
											echo'<br>';
											echo'<br>';
										}
									}
									else if ($arv['CName'] == $_SESSION['a25']){
										if ($arv[$_SESSION['medtypes']] != Null or $arv[$_SESSION['medtypet']] != Null){
											echo '<b>ALTERNATIVE REGIMEN</b>';
											echo '<br>';
											echo '<br>';
											echo '<span><input type="checkbox" id="',$arv['CName'],'" name="',$arv['SName'],'" value="',$arv['SName'],'" >',$arv['Name'],'';
											echo'<br>';
											echo'<br>';
										}
									}
									else if ($arv['Name'] == $_SESSION['a12']){
										if ($arv[$_SESSION['medtypes']] != Null or $arv[$_SESSION['medtypet']] != Null){
											echo '<b>ALTERNATIVE REGIMEN</b>';
											echo '<br>';
											echo '<br>';
											echo '<span><input type="checkbox" id="',$arv['CName'],'" name="',$arv['SName'],'" value="',$arv['SName'],'" >',$arv['Name'],'';
											echo'<br>';
											echo'<br>';
										}
									}
								}
							
						}
					?>  
				</p>
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