<?php

require_once('gestion_fonctions.php');
nbConnexIp();

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Trek & Drone | Gestion</title>
	<link rel="icon" type="image/png" href="../img/builtlogo.png" />
	<link rel="stylesheet" href="../css/animate.css" type="text/css" />
	<?php themeChoix();?>
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Passion+One" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Noto+Sans:400,700" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../css/spin.css">
	<script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
	
</head>
<body>

<?php
if (!isAuthenticated()) {
	
	?>
	<main id="maincon">
		<div id="formcon">
			<h1>Bienvenue</h1>
			<p>Veuillez vous connecter pour pouvoir accéder à la partie <i>Gestion</i> du site <br><a href="http://www.trekandrone.com">Trek & Drone</a>.</p>
			<?php
			showFormAuth(); ?>
			<p><a href="http://www.trekandrone.com">&copyTrekandrone.com</a></p>
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
<?php
} else { 
	include('051279080182.php');
}; ?>

</body>
</html>