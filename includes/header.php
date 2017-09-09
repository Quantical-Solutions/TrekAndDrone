<?php
require_once ('includes/fonctions.php');?>

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8">
<?php getUrl(); ?>
<link rel="icon" type="image/png" href="img/pictos/trek.png" />
<link rel="stylesheet" href="css/style.css" type="text/css" />
<link rel="stylesheet" href="css/slider.css" type="text/css" />
<link rel="stylesheet" href="owlcarousel/assets/owl.carousel.min.css">
<link rel="stylesheet" href="css/animate.css">
<link rel="stylesheet" href="owlcarousel/assets/owl.theme.default.min.css">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Passion+One" rel="stylesheet">
<link rel="stylesheet prefetch" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<script src="https://www.google.com/recaptcha/api.js"></script>
<?php getLink(); ?>
<body>
	<header id="top">
		<div id="navResp">
			<span id="burger-menu" class="burger-menu">
				<div class="burger-menu-titre">
					<p>MENU</p>
				</div>
  				<div class="burger"></div> 
			</span>
		</div>
			<div id="menuResp" class="menuResp">
  					<ul id="menuUlResp">
					<li id="firstli"><a class="liFontSize" id="l1" href="http://www.trekandrone.com" title="HOME">HOME</a></li>
					<li><a class="liFontSize" id="l2" href="team#team" title="LA TEAM">LA TEAM</a></li>
					<li id="sousmenu1">
						<a class="liFontSize" id="prepa0" href="prepa#preparation">PREPARATION<span></span></a>
	    				<ul>
						  	<li><a id="prepa1" class="sousmenu" href="vehicules#les-vehicules">VEHICULES</a></li>
						    <li><a id="prepa2" class="sousmenu" href="developpement#developpement">DEVELOPPEMENT</a></li>
						    <li><a id="prepa3" class="sousmenu" href="organisation#organisation">ORGANISATION</a></li>
						</ul>
					</li>
					<li><a class="liFontSize" id="l3" href="drones#drones" title="DRONES / VIDEOS">DRONES / VIDEOS</a></li>
					<li id="sousmenu2">
						<a class="liFontSize" id="sortie0" href="sorties#nos-sorties">SORTIES<span></span></a>
	    				<ul>
						    <li><a id="sortie1" class="sousmenu" href="trek#trek">TREK</a></li>
						    <li><a id="sortie2" class="sousmenu" href="enduro#enduro">ENDURO</a></li>
						    <li><a id="sortie3" class="sousmenu" href="autres#autres">AUTRES</a></li>
						</ul>
					</li>
					<li><a class="liFontSize" id="l4" href="contact#contact" title="CONTACT">CONTACT</a>
					</li>
					</ul>
  			</div>
  			<div id="logosMain">
  				<img class="classHeaders" id="fond1900" src="img/fond.png" alt="logohead">
  				<img class="classHeaders" id="moto1900" src="img/moto.png" alt="logohead">
  				<img class="classHeaders" id="drone1900" src="img/drone.png" alt="logohead">
  				<img class="classHeaders" id="logo1900" src="img/logofond.png" alt="logohead">
  				<img id="shadowMenu1" class="shadow4" src="img/shadow3.png" alt="ombre">
  			</div>
  			<div id="logosResp">
  				<img class="classHeaders" id="logo900" src="img/fondResp.png" alt="logoheadresp">
  				<img class="classHeaders" id="logo1400" src="img/fondResp.png" alt="logoheadresp">
 			</div>
			<nav id="block">
				<ul id="menu">
					<li><a id="l1" href="http://www.trekandrone.com" title="HOME">HOME</a></li>
					<li><a id="l2" href="team#team" title="LA TEAM">LA TEAM</a></li>
					<li id="side1" class="dropdown">
						<a id="prepa0" href="prepa#preparation">PREPARATION<span></span></a>
	    				<div id="prepa" class="dropdown-content">
						  	<a id="prepa1" href="vehicules#les-vehicules">VEHICULES</a>
						    <a id="prepa2" href="developpement#developpement">DEVELOPPEMENT</a>
						    <a id="prepa3" href="organisation#organisation">ORGANISATION</a>
						</div>
					</li>
					<li><a id="l3" href="drones#drones" title="DRONES / VIDEOS">DRONES & VIDEOS</a></li>
					<li id="side2" class="dropdown">
						<a id="sortie0" href="sorties#nos-sorties">SORTIES<span></span></a>
	    				<div id="sorties" class="dropdown-content">
						    <a id="sortie1" href="trek#trek">TREK</a>
						    <a id="sortie2" href="enduro#enduro">ENDURO</a>
						    <a id="sortie3" href="autres#autres">AUTRES</a>
						</div>
					</li>
					<li><a id="l4" href="contact#contact" title="CONTACT">CONTACT</a>
					</li>
				</ul>
			</nav>
	</header>
	<a id="cRetour" class="cInvisible" href="#top"><img src="img/retourhaut.png"/></a>
