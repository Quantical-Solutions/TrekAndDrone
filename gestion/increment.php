<?php
require_once('gestion_fonctions.php');
deleteId();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Trek & Drone | Confirmation</title>
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
			<h1>Confirmation</h1>
			<p>Cliquez <a href="http://www.trekandrone.com/vidange">ICI</a><br> pour finaliser la procédure<br>de confirmation.</p>
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