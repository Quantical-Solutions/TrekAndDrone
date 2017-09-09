<?php
session_start();

try {
    $con = new PDO('mysql:host=sininveivntrek.mysql.db;dbname=sininveivntrek;', 'sininveivntrek', 'Orange15');
    $con->setAttribute(PDO::ATTR_CASE, PDO::CASE_LOWER);   
    $con->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
    $con->exec("SET NAMES 'utf8'");
} catch (PDOException $e) {
    die("Erreur MySQL: " . $e->getMessage());
}


function getArticles() {

	global $con;

	try {
		$stt = $con->query('SELECT * FROM articles ORDER BY id DESC');
		$_SESSION['articles'] = $stt->fetchAll(PDO::FETCH_ASSOC);    

	} catch (PDOException $e) {
		die($e->getMessage());
	}
}

function getVideos() {

	global $con;

	try {
		$stt = $con->query('SELECT * FROM videos ORDER BY id DESC');
		$_SESSION['videos'] = $stt->fetchAll(PDO::FETCH_ASSOC);    

	} catch (PDOException $e) {
		die($e->getMessage());
	}

}


function getUrl() {

	$adresse = $_SERVER['REQUEST_URI'];

	if (strlen($adresse) > 1) {
		$cutSlash = str_replace('/', ' | ', $adresse);
		$finalUrl = ucwords($cutSlash);
		echo '<title>Trek &amp; Drone'. $finalUrl .'</title>';
	} else {
		echo '<title>Trek &amp; Drone</title>';
	}
}

function getLink() {
	$adresse = $_SERVER['REQUEST_URI'];

	if ($adresse == "/") {
		echo '<style>
				#logo1900, #drone1900, #moto1900, #block {
					display: none;
				}
				#l1 {
					color: orange!important;
				}
			</style>';
		echo '<script>setTimeout(function(){
  document.getElementById("moto1900").style.display = "initial";
  document.getElementById("moto1900").style.animation = "slideInRight ease-in-out 1.2s";

  setTimeout(function(){
    document.getElementById("drone1900").style.display = "initial";
    document.getElementById("drone1900").style.animation = "slideInLeft ease-in-out .7s";
    }, 200);

  setTimeout(function(){
    document.getElementById("block").style.display = "initial";
    document.getElementById("block").style.animation = "slideInDown ease-in-out .5s";
    
  }, 1300);

  setTimeout(function(){
    document.getElementById("logo1900").style.display = "initial";
    document.getElementById("logo1900").style.animation = "bounceInUp ease-in-out .5s";
    
  }, 1400);
}, 1000);</script>';
	}
}

function sendMail() {

	if (!empty($_POST['action'])) {

		global $con;

		$nom = $_POST['pseudo'];
		$mail = $_POST['email'];
		$contenu = $_POST['message'];
				
		try {
						
			$stt = $con->prepare("INSERT INTO mails (nom, mail, contenu) VALUES (:nom, :mail, :contenu)");

			$stt->bindValue('nom', $nom, PDO::PARAM_STR);
			$stt->bindValue('mail', $mail, PDO::PARAM_STR);
			$stt->bindValue('contenu', $contenu, PDO::PARAM_STR);
						

			$stt->execute();

		} catch (PDOException $e) {

			die($e->getMessage());

		}

		$mail1 = $_POST['email'];
		$mail2 = "contact@trekandrone.com";

		if (!preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $mail1) && !preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $mail2)) 
		{
			$passage_ligne = "\r\n";
		} else {
					
			$passage_ligne = "\n";
		}
					
		$message_txt = "Confimation de réception du " . date('d/m/Y') . " : " . $_POST['message'];
					$message_html = '

<html>
<head>
</head>
<body style="background: wheat;
  	background: -webkit-linear-gradient(black, wheat, white);
  	background: -o-linear-gradient(black, wheat, black);
  	background: -moz-linear-gradient(black, wheat, white);
  	background: linear-gradient(black, wheat, white); padding: 40px; border-radius: 15px;">

<img src="http://www.trekandrone.com/img/trek&drone.png" width="600" height="250" alt="Bienvenue" style="display:block; margin: auto;">

<h1 style="font-size: 2.2em; font-family: raleway, arial; color: darkred; font-style: italic; text-align: center;">
Confimation de réception du ' . date('d/m/Y') . ' : </h1>

<font style="color:black; font-size:14px; font-family: raleway, arial; text-align: center;"><br>Votre Pseudo : ' . $_POST['pseudo'] . '<br><br>Votre adresse Email : <a href="mailto:' . $_POST['email'] . '">' . $_POST['email'] . '</a><br><br>Votre message envoyé à Trek and Drone :<br><br>' . $_POST['message'] . '</font>
<p style="text-align: center;"><a href="http://www.trekandrone.com" style="font-size: 2em; font-style: italic; color: orange; text-decoration: none;">Trekandrone.com</a><p>

</body>
</html>';

		$boundary = "-----=".md5(rand());
		$boundary_alt = "-----=".md5(rand());

		$sujet = "Trek and Drone | Message Reçu";

		$header = "From: \"Trek & Drone\"<contact@trekandrone.com>".$passage_ligne;
		$header.= "Reply-to: \" <noreply@trekandrone.com>".$passage_ligne;
		$header.= "MIME-Version: 1.0".$passage_ligne;
		$header .= "X-Priority: 3".$passage_ligne;
		$header.= "Content-Type: multipart/mixed;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;

		$message = $passage_ligne."--".$boundary.$passage_ligne;
		$message.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary_alt\"".$passage_ligne;
		$message.= $passage_ligne."--".$boundary_alt.$passage_ligne;
					
		$message.= "Content-Type: text/plain; charset=\"ISO-8859-1\"".$passage_ligne;
		$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
		$message.= $passage_ligne.$message_txt.$passage_ligne;
					 
		$message.= $passage_ligne."--".$boundary_alt.$passage_ligne;

		$message.= "Content-Type: text/html; charset=\"ISO-8859-1\"".$passage_ligne;
			$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
			$message.= $passage_ligne.$message_html.$passage_ligne;

		$message.= $passage_ligne."--".$boundary_alt."--".$passage_ligne;
					  
		$message.= $passage_ligne."--".$boundary.$passage_ligne;

		mail($mail1,$sujet,$message,$header);
		mail($mail2,$sujet,$message,$header);
					
	}
}