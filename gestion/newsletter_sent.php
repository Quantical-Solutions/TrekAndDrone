<?php
require_once('gestion_fonctions.php');

if ($_POST['idnlmodifsend'] == "modif") {
	modifNewsletter();
} else {
	createNewsletter();
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Trek & Drone | Newsletter</title>
	<link rel="icon" type="image/png" href="../img/builtlogo.png" />
	<link rel="stylesheet" href="../css/animate.css" type="text/css" />
	<link rel="stylesheet" href="gestion/styleadmin1.css" type="text/css" />
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Passion+One" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Noto+Sans:400,700" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../css/spin.css">
	<script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
</head>
<body>

	<main id="maincon" class="maindecon">
		<div id="formcon" class="formdecon">
			<h1>Newsletter enregistrée<br> ou modifiée</h1>
			<p>Vous venez d'enregistrer une nouvelle<br><span style="color: black;">Newsletter</span>, ou d'en modifier une.<br><a href="http://www.trekandrone.com/gestion-administrateur">Reconnectez vous</a><br>pour poursuivre la gestion.</p>
		</div>
		<div id="logorot">
			<img src="../img/trek&drone.png" alt="logo">
		</div>
	</main>

<script>

	window.onload = montrer();

	function montrer(){
		document.getElementById("maincon").style.display= "flex";
	};
		
	var spanerr = document.getElementById('spanerr');
	var formcon = document.getElementById('formcon');
	var logorot = document.getElementById('logorot');

	if (!spanerr) {
		formcon.style.display="none";
		logorot.style.display="none";
		setTimeout(formconClass, 1000);
		setTimeout(logorotClass, 1800);
	} else {
		formcon.className = 'formcon';
	}

	function formconClass() {
		formcon.style.display="flex";
		formcon.className = 'formconstart';
	}

	function logorotClass() {
		logorot.style.display="flex";
		logorot.className = "logorotstart";
	}

</script>
</body>
</html>