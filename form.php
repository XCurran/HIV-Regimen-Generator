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
					<option value="negative">HLAB5701-</option>
					<option value="positive">HLAB5071+</option>
			    </select></span> <br><br>
				
				What kind of medications can the patient take: <br>
				<input type="radio" name="medtype" value="suspension" checked> Suspension only <br>
				<input type="radio" name="medtype" value="pills"> Swallow Pills <br>
				<input type="radio" name="medtype" value="crushed"> Crush pills and mix with food <br><br>
				
				Allergies: <br>
				<span class= "allergies">
					<input type="checkbox" name="a1" value="Abacavir"> Abacavir (ABC, Ziagen) <br>
					<input type="checkbox" name="a2" value="Didanosine"> Didanosine (ddl, Videx) <br>
					<input type="checkbox" name="a3" value="Emtricitabine"> Emtricitabine (FTC, Emtriva) <br>
					<input type="checkbox" name="a4" value="Lamivudine"> Lamivudine (3TC, Epivir) <br>
					<input type="checkbox" name="a5" value="Stavudine"> Stavudine (d4T, Zerit) <br>
					<input type="checkbox" name="a6" value="Alafenamide"> Tenofovir Alafenamide (TAF) <br>
					<input type="checkbox" name="a7" value="Disoproxil"> Tenofovir Disoproxil Fumarate (TDF, Viread) <br>
					<input type="checkbox" name="a8" value="Zidovudine"> Zidovudine (ZDV, AZT, Retrovir)<br>
					<input type="checkbox" name="a9" value="Efavirenz"> Efavirenz (EFV, Sustiva) <br>
					<input type="checkbox" name="a10" value="Etravirine"> Etravirine (ETR, Intelence, TMC 125) <br>
					<input type="checkbox" name="a11" value="Nevirapine"> Nevirapine (NVP, Viramune) <br>
					<input type="checkbox" name="a12" value="Rilpivirine"> Rilpivirine (RPV, Edurant) <br>
					<input type="checkbox" name="a13" value="Atazanavir"> Atazanavir (ATV, Reyataz) <br>
					<input type="checkbox" name="a14" value="Darunavir"> Darunavir (DRV, Prezista) <br>
				</span>
				<span class= "allergies">
					<input type="checkbox" name="a15" value="Fosamprenavir"> Fosamprenavir (FPV, Lexiva) <br>
					<input type="checkbox" name="a16" value="Indinavir"> Indinavir (IDV, Crixivan) <br>
					<input type="checkbox" name="a17" value="Lopinavir"> Lopinavir/Ritonavir (LPV/r, Kaletra) <br>
					<input type="checkbox" name="a18" value="Nelfinavir"> Nelfinavir (NFV, Viracept) <br>
					<input type="checkbox" name="a19" value="Saquinavir"> Saquinavir (SQV, Invirase) <br>
					<input type="checkbox" name="a20" value="Tipranavir"> Tipranavir (TPV, APTIVUS) <br>
					<input type="checkbox" name="a21" value="Enfuvirtide"> Enfuvirtide (T-20, Fuzeon) <br>
					<input type="checkbox" name="a22" value="Maraviroc"> Maraviroc (MVC, Selzentry) <br>
					<input type="checkbox" name="a23" value="Dolutegravir"> Dolutegravir (DTG, Tivicay) <br>
					<input type="checkbox" name="a24" value="Elvitegravir"> Elvitegravir (EVG, VITEKTA) <br>
					<input type="checkbox" name="a25" value="Raltegravir"> Raltegravir (RAL, Isentress) <br>
					<input type="checkbox" name="a26" value="Cobicistat"> Cobicistat (COBI, TYBOST)<br>
					<input type="checkbox" name="a27" value="Ritonavir"> Ritonavir (RTV, Norvir) <br>
				</span><br><br>

				
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