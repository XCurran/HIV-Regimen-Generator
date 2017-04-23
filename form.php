<?php session_start();?>

<!-- The information gathering page; the form -->
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
				<li class="headerli"> <a href="main.html"> Home </a> </li>
				<li class="headerli"> <a href="about.html"> About  </a> </li>
			</ul>
		</div>
		
		<p id="disclaimer"> *Disclaimer* None of the following information you provide will be stored. All details inputted will be removed immediately after you close the browser. </p>
		
		<!--All necessary infromation is displayed here that is needed for the regimen. The client will give the inputs in here, which will then be taken to a Combination page. -->	
		
		<form action="combo.php" method="post">
			<fieldset>
				<legend> Patient Information </legend>
				<br>
				Age: <input type="number" name="years" placeholder="Years" min="0" max="100" required > <input type="number" name="months" placeholder="Months" min="0" max="11.5" step=0.5 required> </br></br>
				
				Height: <input type="number" id="height" name="height" placeholder="Centimetres (cm)" min="0" max="300" required> &nbsp;&nbsp; Weight: <input type="number" id="weight" name="weight" placeholder="Kilograms (kg)" min="0" max="500" required> &nbsp; <br> <br>
				
				<span class="block1">Tanner stage: 
				<select name="tanner-stage">
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
			    </select> </span>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				
				<span class="block1">HLA status: 
				<select name="HLA-status">
					<option value="positive">HLAB5701+</option>
					<option value="negative">HLAB5071-</option>
			    </select></span> <br><br>
				
				
				<div id="submit-buttons">
				
						<input type="submit" value="Submit"> 
						
				</div>
				
			</fieldset>
		</form>
		
		<div id="return"> 
			<a href="main.html"> Return to Home </a>
		</div>
		
		<!-- loading javascript -->
		<script src="javascript/form.js"> </script>
		<script src='https://www.google.com/recaptcha/api.js'></script>
	</body>
	
</html>