<?php
require_once('gestion/gestion_fonctions.php');

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Trek & Drone | Banni</title>
	<link rel="icon" type="image/png" href="img/interdit.png" />
	<link rel="stylesheet" href="css/animate.css" type="text/css" />
	<link rel="stylesheet" href="gestion/styleadmin1.css" type="text/css" />
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Passion+One" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Noto+Sans:400,700" rel="stylesheet">
</head>
<body id="bodyIP">

	<main id="mainconIp" class="maindecon">
		<div id="logoInt">
			<img src="../img/interdit.png" alt="logo">
		</div>
		<div id="formdecon" class="formdecon">
			<h1 style="margin: 30px 0 0 0!important">IP : <?php echo banirIp(); ?></h1>
			<p>Votre adresse IP a été bannie du site<br><span style="color: red;">Trekandrone.com</span><br>pour des raisons de sécurité.</p><p>Si cette action est une erreur de notre part, veuillez <a style="color: black;" href="mailto:contact@trekandrone.com?Subject=Adresse IP Bannie" >contacter</a> l'administration du site.</p>
		</div>
		
	</main>

<script>

	window.onload = montrer();

	function montrer(){
		document.getElementById("mainconIp").style.display= "flex";
	};
		
	var spanerr = document.getElementById('spanerr');
	var formcon = document.getElementById('formdecon');
	var logoInt = document.getElementById('logoInt');


	formcon.style.display="none";
	logoInt.style.display="none";
	setTimeout(formconClass, 1000);
	setTimeout(logoIntClass, 1800);
	

	function formconClass() {
		formcon.style.display="flex";
		formcon.className = 'formIdstart';
	}

	function logoIntClass() {
		logoInt.style.display="flex";
		logoInt.className = "logoIntstart";
	}

</script>
</body>
</html>