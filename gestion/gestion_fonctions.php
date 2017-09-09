<?php

session_start();
setlocale(LC_TIME, "fr_FR.UTF-8", "fra");

try {
    $con = new PDO('mysql:host=sininveivntrek.mysql.db;dbname=sininveivntrek;', 'sininveivntrek', 'Orange15');
    $con->setAttribute(PDO::ATTR_CASE, PDO::CASE_LOWER);   
    $con->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
    $con->exec("SET NAMES 'utf8'");
} catch (PDOException $e) {
    die("Erreur MySQL: " . $e->getMessage());
}

checkDisconnect();
checkAuth();
 
function isAuthenticated() {
	return !empty($_SESSION['id']);
}

function authSubmitted() {
	return !empty($_POST['action']) && $_POST['action'] == 'auth';
}
 
function showFormAuth() {
	
	echo '<form method="post" id="formconn">';
	echo '<input type="hidden" name="action" value="auth">';
	echo '<label for="pseudo">Utilisateur : </label>';
	echo '<input type="text" id="pseudo" name="pseudo" required><br>';
	echo '<label for="password">Mot de passe : </label>';
	echo '<input type="password" id="password" name="passwd" required><br>';
	echo '<input type="hidden" name="ip" value="1">';

	if (authSubmitted() && !isAuthenticated()) {
		echo '<span id="spanerr" style="color: red;">Erreur, identifiant ou mot de passe incorrect !</span>';

		global $con;

		try {
			$stt = $con->query('SELECT * FROM ip');
			$_SESSION['ip'] = $stt->fetchAll(PDO::FETCH_ASSOC);

		} catch (PDOException $e) {

			die($e->getMessage());
		}

		for ($i = 0; $i < count($_SESSION['ip']); $i++) {
			
			if ($_SESSION['ip'][$i]['ip_adress'] == ip2long(banirIp())) {

				try {

				global $con;

				$newtentative = 1 + $_SESSION['ip'][$i]['tentative'];
				$newip = ip2long(banirIp());

				$stt = $con->prepare("UPDATE ip SET tentative = :tentative  WHERE ip_adress = :ip");

				$stt->bindValue('tentative', $newtentative, PDO::PARAM_INT);
				$stt->bindValue('ip', $newip, PDO::PARAM_INT);

				$stt->execute();

				} catch (PDOException $e) {

					die($e->getMessage());

				}
			}
		}
		
		for ($i = 0; $i < count($_SESSION['ip']); $i++) {
			
			if ($_SESSION['ip'][$i]['ip_adress'] != ip2long(banirIp())) {

				global $con;

				$newip = ip2long(banirIp());
				$tentative = 1;
				$pays = $_POST['iploc'];
			
				try {
					
					$stt = $con->prepare("INSERT IGNORE INTO ip (ip_adress, tentative, pays) VALUES (:ip, :tentative, :pays)");

					$stt->bindValue('ip', $newip, PDO::PARAM_INT);
					$stt->bindValue('tentative', $tentative, PDO::PARAM_INT);
					$stt->bindValue('pays', $pays, PDO::PARAM_STR);
					

					$stt->execute();

				} catch (PDOException $e) {

					die($e->getMessage());

				}
			}
		}
	}
	echo '<br><button type="reset">EFFACER</button>';
	echo '<button name="sbmitcon" type="submit">CONNEXION</button>';
	geoloc();
	echo '</form>';
}

function geoloc() {

	include("geoloc/geoipcity.inc");
	include("geoloc/geoipregionvars.php");

	$gi = geoip_open(realpath("geoloc/GeoLiteCity.dat"),GEOIP_STANDARD);

	$record = geoip_record_by_addr($gi,$_SERVER['REMOTE_ADDR']);

	$result = $record->country_name . " / GPS: " . $record->latitude . " | " . $record->longitude;

	geoip_close($gi);
	echo '<input type="hidden" name="iploc" value="' . $result . '">';
}
 
function checkAuth() {
	if (authSubmitted()) {
		global $con;
		try {
			$qry = 'SELECT id, theme, nom AS pseudo, password AS passwd, derniere_connex AS lastcon FROM users WHERE nom = :pseudo AND password = :passwd';

				$stt = $con->prepare($qry);
				$stt->bindValue('pseudo', $_POST['pseudo'], PDO::PARAM_STR);
				$stt->bindValue('passwd', sha1($_POST['passwd']), PDO::PARAM_STR);

				if ($stt->execute() && $stt->rowCount()  == 1) {
				    $_SESSION = $stt->fetch(PDO::FETCH_ASSOC);
				    
			}
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	} 
}

function checkDisconnect() {
	if (empty($_GET['deconnexion'])) {
		
		session_destroy();		
	}
}

$newdate = 'le' . date(" d-m-Y \à H:i:s");

try {

	global $con;

	$stt = $con->prepare("UPDATE users SET derniere_connex= :newdate WHERE id =  :id");

	$stt->bindValue('newdate', $newdate, PDO::PARAM_STR);
	$stt->bindValue('id', $_SESSION['id'], PDO::PARAM_INT);

	$stt->execute();

} catch (PDOException $e) {

			die($e->getMessage());

}
			
function themeChoix() {

	if ($_SESSION['theme'] == '5') {
		echo '<link rel="stylesheet" href="gestion/styleadmin5.css" type="text/css" />';
	} elseif ($_SESSION['theme'] == '4') {
		echo '<link rel="stylesheet" href="gestion/styleadmin4.css" type="text/css" />';
	} elseif ($_SESSION['theme'] == '3') {
		echo '<link rel="stylesheet" href="gestion/styleadmin3.css" type="text/css" />';
	} elseif ($_SESSION['theme'] == '2') {
		echo '<link rel="stylesheet" href="gestion/styleadmin2.css" type="text/css" />';
	} else {
		echo '<link rel="stylesheet" href="gestion/styleadmin1.css" type="text/css" />';
	}
}

function updateTheme() {

	global $con;

	$id = $_POST['hide2'];

	try {
		
		$stt = $con->prepare("UPDATE users SET theme = :theme WHERE id = :id");

		$stt->bindValue('theme', $_POST['theme'], PDO::PARAM_STR);
		$stt->bindValue('id', $id, PDO::PARAM_INT);

		$stt->execute();

	} catch (PDOException $e) {

		die($e->getMessage());

	}
}

function createArticle() {

	global $con;

	$titre = $_POST['titre'];
	$date = 'le' . date(" d-m-Y \à H:i:s");
	$para1 = $_POST['editor1'];
	$para2 = $_POST['editor2'];
	$category = $_POST['category'];
	$img1 = $_FILES['img1']['name'];
	$img2 = $_FILES['img2']['name'];
	$img3 = $_FILES['img3']['name'];
	$citation = $_POST['citation'];


	try {
		
		$stt = $con->prepare("INSERT INTO articles (titre, date, para1, para2, category, img1, img2, img3, citation) 
			VALUES (:titre, :date, :para1, :para2, :category, :img1, :img2, :img3, :citation)");

		$stt->bindValue('titre', $titre, PDO::PARAM_STR);
		$stt->bindValue('date', $date, PDO::PARAM_STR);
		$stt->bindValue('para1', $para1, PDO::PARAM_STR);
		$stt->bindValue('para2', $para2, PDO::PARAM_STR);
		$stt->bindValue('category', $category, PDO::PARAM_STR);
		$stt->bindValue('img1', $img1, PDO::PARAM_STR);
		$stt->bindValue('img2', $img2, PDO::PARAM_STR);
		$stt->bindValue('img3', $img3, PDO::PARAM_STR);
		$stt->bindValue('citation', $citation, PDO::PARAM_STR);

		$stt->execute();

	} catch (PDOException $e) {

		die($e->getMessage());

	}
}



function upLoad() {

	$newdate = date(" Y-m-d \à H:i:s");
	$newdir = $_POST['category'];

	switch ($newdir) {

		case 'Véhicules':
			for ($i = 1; $i <= count($_FILES); $i++) {

				$dirname = dirname(__FILE__).'/articles/Véhicules/';

			    $image_name = $_FILES['img'.$i]['name'];

			    $final_pathdir = $dirname . $image_name;
			    $suc = move_uploaded_file($_FILES['img'.$i]['tmp_name'], $final_pathdir);

			    /*if ($suc > 0) {
			        print_r("Image uploaded successfully");

			    } else {
			        print_r("Error : " . $_FILES['img'.$i]['error']);
			    }*/
		    }
			break;

		case 'Développement':
			for ($i = 1; $i <= count($_FILES); $i++) {

				$dirname = dirname(__FILE__).'/articles/Développement/';

			    $image_name = $_FILES['img'.$i]['name'];

			    $final_pathdir = $dirname . $image_name;
			    $suc = move_uploaded_file($_FILES['img'.$i]['tmp_name'], $final_pathdir);

			    /*if ($suc > 0) {
			        print_r("Image uploaded successfully");

			    } else {
			        print_r("Error : " . $_FILES['img'.$i]['error']);
			    }*/
		    }
			break;

		case 'Organisation':
			for ($i = 1; $i <= count($_FILES); $i++) {

				$dirname = dirname(__FILE__).'/articles/Organisation/';

			   $image_name = $_FILES['img'.$i]['name'];

			    $final_pathdir = $dirname . $image_name;
			    $suc = move_uploaded_file($_FILES['img'.$i]['tmp_name'], $final_pathdir);

			    /*if ($suc > 0) {
			        print_r("Image uploaded successfully");

			    } else {
			        print_r("Error : " . $_FILES['img'.$i]['error']);
			    }*/
		    }
			break;

		case 'Trek':
			for ($i = 1; $i <= count($_FILES); $i++) {

				$dirname = dirname(__FILE__).'/articles/Trek/';

			    $image_name = $_FILES['img'.$i]['name'];

			    $final_pathdir = $dirname . $image_name;
			    $suc = move_uploaded_file($_FILES['img'.$i]['tmp_name'], $final_pathdir);

			   /* if ($suc > 0) {
			        print_r("Image uploaded successfully");

			    } else {
			        print_r("Error : " . $_FILES['img'.$i]['error']);
			    }*/
		    }
			break;

		case 'Enduro':
			for ($i = 1; $i <= count($_FILES); $i++) {

				$dirname = dirname(__FILE__).'/articles/Enduro/';

			    $image_name = $_FILES['img'.$i]['name'];

			    $final_pathdir = $dirname . $image_name;
			    $suc = move_uploaded_file($_FILES['img'.$i]['tmp_name'], $final_pathdir);

			    /*if ($suc > 0) {
			        print_r("Image uploaded successfully");

			    } else {
			        print_r("Error : " . $_FILES['img'.$i]['error']);
			    }*/
		    }
			break;

		case 'Autres':
			for ($i = 1; $i <= count($_FILES); $i++) {

				$dirname = dirname(__FILE__).'/articles/Autres/';

			    $image_name = $_FILES['img'.$i]['name'];

			    $final_pathdir = $dirname . $image_name;
			    $suc = move_uploaded_file($_FILES['img'.$i]['tmp_name'], $final_pathdir);

			   /* if ($suc > 0) {
			        print_r("Image uploaded successfully");

			    } else {
			        print_r("Error : " . $_FILES['img'.$i]['error']);
			    }*/
		    }
			break;
		
		default:
			
			break;
	}
}

function getArticle() {

global $con;

	try {
		$stt = $con->query('SELECT * FROM articles ORDER BY id DESC');
		$_SESSION['articles'] = $stt->fetchAll(PDO::FETCH_ASSOC);    

	} catch (PDOException $e) {
		die($e->getMessage());
	}
}

function getAllArt() {

	for ($i = 0; $i < count($_SESSION['articles']) ; $i++) {
		
		echo '<div id="art-' . $_SESSION['articles'][$i]['id'] . '" style="display:flex;">';
		echo '<input type="hidden" value="' . $_SESSION['articles'][$i]['titre'] . '" id="h1art' . $_SESSION['articles'][$i]['id'] .'"/>';
		echo '<input type="hidden" value="' . $_SESSION['articles'][$i]['para1'] . '" id="p1art' . $_SESSION['articles'][$i]['id'] .'"/>';
		echo '<input type="hidden" value="' . $_SESSION['articles'][$i]['para2'] . '" id="p2art' . $_SESSION['articles'][$i]['id'] .'"/>';
		echo '<input type="hidden" value="' . $_SESSION['articles'][$i]['citation'] . '" id="citart' . $_SESSION['articles'][$i]['id'] .'"/>';
		echo '</div>';
	}
}

function showArtModif() {

		echo '<style>';
		echo '#artV p, #artD p,#artO p,#artT p,#artE p,#artA p {margin:5px auto 0 auto; font-style:italic;color:orange;width:50%;transition:color 0.35s;}';
		echo '#artV p:hover, #artD p:hover,#artO p:hover,#artT p:hover,#artE p:hover,#artA p:hover {color:red;}';
		echo '</style>';
		echo '<p id="noArtMess" style="display: none; color: orange!important; justify-content: center; font-style: italic; font-family: raleway, cursive;">Pas d\'article dans cette catégorie pour le moment.</p>';

	if (!empty($_SESSION['articles'])) {

		echo '<div class="artDiv" id="artV" style="display:none;">';

		for ($i = 0; $i < count($_SESSION['articles']) ; $i++) {	

			if ($_SESSION['articles'][$i]['category'] == "Véhicules") {
				echo '<p id="' . $_SESSION['articles'][$i]['id'] . '" class="artOpt" value="'. $_SESSION['articles'][$i]['id'] . ' - ' . $_SESSION['articles'][$i]['titre'] . ' - ' . $_SESSION['articles'][$i]['date'] .'">'. $_SESSION['articles'][$i]['id'] . ' - ' . $_SESSION['articles'][$i]['titre'] . ' - ' . $_SESSION['articles'][$i]['date'] .'</p>'.(PHP_EOL);
			}

		} echo '</div>'.(PHP_EOL);

		echo '<div class="artDiv" id="artD" style="display:none;">';

		for ($i = 0; $i < count($_SESSION['articles']) ; $i++) {

			if ($_SESSION['articles'][$i]['category'] == "Développement") {
				echo '<p id="' . $_SESSION['articles'][$i]['id'] . '" class="artOpt" value="'. $_SESSION['articles'][$i]['id'] . ' - ' . $_SESSION['articles'][$i]['titre'] . ' - ' . $_SESSION['articles'][$i]['date'] .'">'. $_SESSION['articles'][$i]['id'] . ' - ' . $_SESSION['articles'][$i]['titre'] . ' - ' . $_SESSION['articles'][$i]['date'] .'</p>'.(PHP_EOL);
			}

		} echo '</div>'.(PHP_EOL);

		echo '<div class="artDiv" id="artO" style="display:none;">';

		for ($i = 0; $i < count($_SESSION['articles']) ; $i++) {

			if ($_SESSION['articles'][$i]['category'] == "Organisation") {
				echo '<p id="' . $_SESSION['articles'][$i]['id'] . '" class="artOpt" value="'. $_SESSION['articles'][$i]['id'] . ' - ' . $_SESSION['articles'][$i]['titre'] . ' - ' . $_SESSION['articles'][$i]['date'] .'">'. $_SESSION['articles'][$i]['id'] . ' - ' . $_SESSION['articles'][$i]['titre'] . ' - ' . $_SESSION['articles'][$i]['date'] .'</p>'.(PHP_EOL);
			}

		} echo '</div>'.(PHP_EOL);

		echo '<div class="artDiv" id="artT" style="display:none;">';

		for ($i = 0; $i < count($_SESSION['articles']) ; $i++) {

			if ($_SESSION['articles'][$i]['category'] == "Trek") {
				echo '<p id="' . $_SESSION['articles'][$i]['id'] . '" class="artOpt" value="'. $_SESSION['articles'][$i]['id'] . ' - ' . $_SESSION['articles'][$i]['titre'] . ' - ' . $_SESSION['articles'][$i]['date'] .'">'. $_SESSION['articles'][$i]['id'] . ' - ' . $_SESSION['articles'][$i]['titre'] . ' - ' . $_SESSION['articles'][$i]['date'] .'</p>'.(PHP_EOL);
			}

		} echo '</div>'.(PHP_EOL);

		echo '<div class="artDiv" id="artE" style="display:none;">';

		for ($i = 0; $i < count($_SESSION['articles']) ; $i++) {
	
			if ($_SESSION['articles'][$i]['category'] == "Enduro") {
				echo '<p id="' . $_SESSION['articles'][$i]['id'] . '" class="artOpt" value="'. $_SESSION['articles'][$i]['id'] . ' - ' . $_SESSION['articles'][$i]['titre'] . ' - ' . $_SESSION['articles'][$i]['date'] .'">'. $_SESSION['articles'][$i]['id'] . ' - ' . $_SESSION['articles'][$i]['titre'] . ' - ' . $_SESSION['articles'][$i]['date'] .'</p>'.(PHP_EOL);
			}

		} echo '</div>'.(PHP_EOL);

		echo '<div class="artDiv" id="artA" style="display:none;">';

		for ($i = 0; $i < count($_SESSION['articles']) ; $i++) {

			if ($_SESSION['articles'][$i]['category'] == "Autres") {
				echo '<p id="' . $_SESSION['articles'][$i]['id'] . '" class="artOpt" value="'. $_SESSION['articles'][$i]['id'] . ' - ' . $_SESSION['articles'][$i]['titre'] . ' - ' . $_SESSION['articles'][$i]['date'] .'">'. $_SESSION['articles'][$i]['id'] . ' - ' . $_SESSION['articles'][$i]['titre'] . ' - ' . $_SESSION['articles'][$i]['date'] .'</p>'.(PHP_EOL);
			}

		} echo '</div>'.(PHP_EOL);

	} 

}

function modifArticle() {

	try {

		global $con;

		$stt = $con->prepare("UPDATE articles SET titre= :titre, para1= :para1, para2= :para2, citation = :citation WHERE id =  :id");

		$stt->bindValue('id', $_POST['artId'], PDO::PARAM_INT);
		$stt->bindValue('titre', $_POST['titre'], PDO::PARAM_STR);
		$stt->bindValue('para1', $_POST['editor3'], PDO::PARAM_STR);
		$stt->bindValue('para2', $_POST['editor4'], PDO::PARAM_STR);
		$stt->bindValue('citation', $_POST['edicit'], PDO::PARAM_STR);

		$stt->execute();

	} catch (PDOException $e) {

		die($e->getMessage());

	}
}

function creaTableMail() {

	global $con;

	try {
		$stt = $con->query('SELECT * FROM mails ORDER BY id DESC');
		$_SESSION['mails'] = $stt->fetchAll(PDO::FETCH_ASSOC);    

	} catch (PDOException $e) {
		die($e->getMessage());
	}

	echo '<table id="table">';
	echo '<tr>';
	echo '<th>Nom</th>';
	echo '<th>Date</th>';
	echo '<th id="mailad">Adresse mail</th>';
	echo '</tr>';

	for ($i = 0; $i < 6; $i++) {

		if (!empty($_SESSION['mails'][$i]['id'])) {
		
			echo '<tr style="display:table-row;" class="auteur section1" id="hideAuteur' . $_SESSION['mails'][$i]['id'] . '">';
			echo '<td class="nom" id="hideNom' . $_SESSION['mails'][$i]['id'] . '"><a href="#mailhead">' . $_SESSION['mails'][$i]['nom'] . '</a></td>';
			echo '<td class="date" id="hideDate' . $_SESSION['mails'][$i]['id'] . '"><a href="#mailhead">' . $_SESSION['mails'][$i]['date'] . '</a></td>'; 
			echo '<td class="mail" id="hideMail' . $_SESSION['mails'][$i]['id'] . '"><a href="#mailhead">' . $_SESSION['mails'][$i]['mail'] . '</a></td>';
			echo '<p style="display:none!important;" id="hideContent' . $_SESSION['mails'][$i]['id'] . '">' . $_SESSION['mails'][$i]['contenu'] .'</p>';
			echo '</tr>';
		}
	} 

	for ($i = 6; $i < 12; $i++) {
		
		if (!empty($_SESSION['mails'][$i]['id'])) {
		
			echo '<tr style="display:none;" class="auteur section2" id="hideAuteur' . $_SESSION['mails'][$i]['id'] . '">';
			echo '<td class="nom" id="hideNom' . $_SESSION['mails'][$i]['id'] . '"><a href="#mailhead">' . $_SESSION['mails'][$i]['nom'] . '</a></td>';
			echo '<td class="date" id="hideDate' . $_SESSION['mails'][$i]['id'] . '"><a href="#mailhead">' . $_SESSION['mails'][$i]['date'] . '</a></td>'; 
			echo '<td class="mail" id="hideMail' . $_SESSION['mails'][$i]['id'] . '"><a href="#mailhead">' . $_SESSION['mails'][$i]['mail'] . '</a></td>';
			echo '<p style="display:none!important;" id="hideContent' . $_SESSION['mails'][$i]['id'] . '">' . $_SESSION['mails'][$i]['contenu'] .'</p>';
			echo '</tr>';
		}
	} 

	for ($i = 12; $i < 18; $i++) {
		
		if (!empty($_SESSION['mails'][$i]['id'])) {
		
			echo '<tr style="display:none;" class="auteur section3" id="hideAuteur' . $_SESSION['mails'][$i]['id'] . '">';
			echo '<td class="nom" id="hideNom' . $_SESSION['mails'][$i]['id'] . '"><a href="#mailhead">' . $_SESSION['mails'][$i]['nom'] . '</a></td>';
			echo '<td class="date" id="hideDate' . $_SESSION['mails'][$i]['id'] . '"><a href="#mailhead">' . $_SESSION['mails'][$i]['date'] . '</a></td>'; 
			echo '<td class="mail" id="hideMail' . $_SESSION['mails'][$i]['id'] . '"><a href="#mailhead">' . $_SESSION['mails'][$i]['mail'] . '</a></td>';
			echo '<p style="display:none!important;" id="hideContent' . $_SESSION['mails'][$i]['id'] . '">' . $_SESSION['mails'][$i]['contenu'] .'</p>';
			echo '</tr>';
		}
	} 

	for ($i = 18; $i < 24; $i++) {
		
		if (!empty($_SESSION['mails'][$i]['id'])) {
		
			echo '<tr style="display:none;" class="auteur section4" id="hideAuteur' . $_SESSION['mails'][$i]['id'] . '">';
			echo '<td class="nom" id="hideNom' . $_SESSION['mails'][$i]['id'] . '"><a href="#mailhead">' . $_SESSION['mails'][$i]['nom'] . '</a></td>';
			echo '<td class="date" id="hideDate' . $_SESSION['mails'][$i]['id'] . '"><a href="#mailhead">' . $_SESSION['mails'][$i]['date'] . '</a></td>'; 
			echo '<td class="mail" id="hideMail' . $_SESSION['mails'][$i]['id'] . '"><a href="#mailhead">' . $_SESSION['mails'][$i]['mail'] . '</a></td>';
			echo '<p style="display:none!important;" id="hideContent' . $_SESSION['mails'][$i]['id'] . '">' . $_SESSION['mails'][$i]['contenu'] .'</p>';
			echo '</tr>';
		}
	} 

	for ($i = 24; $i < 30; $i++) {
		
		if (!empty($_SESSION['mails'][$i]['id'])) {
	 	
			echo '<tr style="display:none;" class="auteur section5" id="hideAuteur' . $_SESSION['mails'][$i]['id'] . '">';
			echo '<td class="nom" id="hideNom' . $_SESSION['mails'][$i]['id'] . '"><a href="#mailhead">' . $_SESSION['mails'][$i]['nom'] . '</a></td>';
			echo '<td class="date" id="hideDate' . $_SESSION['mails'][$i]['id'] . '"><a href="#mailhead">' . $_SESSION['mails'][$i]['date'] . '</a></td>'; 
			echo '<td class="mail" id="hideMail' . $_SESSION['mails'][$i]['id'] . '"><a href="#mailhead">' . $_SESSION['mails'][$i]['mail'] . '</a></td>';
			echo '<p style="display:none!important;" id="hideContent' . $_SESSION['mails'][$i]['id'] . '">' . $_SESSION['mails'][$i]['contenu'] .'</p>';
			echo '</tr>';
		}
	} 

	for ($i = 30; $i < 36; $i++) {
		
		if (!empty($_SESSION['mails'][$i]['id'])) {
		
			echo '<tr style="display:none;" class="auteur section6" id="hideAuteur' . $_SESSION['mails'][$i]['id'] . '">';
			echo '<td class="nom" id="hideNom' . $_SESSION['mails'][$i]['id'] . '"><a href="#mailhead">' . $_SESSION['mails'][$i]['nom'] . '</a></td>';
			echo '<td class="date" id="hideDate' . $_SESSION['mails'][$i]['id'] . '"><a href="#mailhead">' . $_SESSION['mails'][$i]['date'] . '</a></td>'; 
			echo '<td class="mail" id="hideMail' . $_SESSION['mails'][$i]['id'] . '"><a href="#mailhead">' . $_SESSION['mails'][$i]['mail'] . '</a></td>';
			echo '<p style="display:none!important;" id="hideContent' . $_SESSION['mails'][$i]['id'] . '">' . $_SESSION['mails'][$i]['contenu'] .'</p>';
			echo '</tr>';
		}
	} 

	for ($i = 36; $i < 42; $i++) {
		
		if (!empty($_SESSION['mails'][$i]['id'])) {
		
			echo '<tr style="display:none;" class="auteur section7" id="hideAuteur' . $_SESSION['mails'][$i]['id'] . '">';
			echo '<td class="nom" id="hideNom' . $_SESSION['mails'][$i]['id'] . '"><a href="#mailhead">' . $_SESSION['mails'][$i]['nom'] . '</a></td>';
			echo '<td class="date" id="hideDate' . $_SESSION['mails'][$i]['id'] . '"><a href="#mailhead">' . $_SESSION['mails'][$i]['date'] . '</a></td>'; 
			echo '<td class="mail" id="hideMail' . $_SESSION['mails'][$i]['id'] . '"><a href="#mailhead">' . $_SESSION['mails'][$i]['mail'] . '</a></td>';
			echo '<p style="display:none!important;" id="hideContent' . $_SESSION['mails'][$i]['id'] . '">' . $_SESSION['mails'][$i]['contenu'] .'</p>';
			echo '</tr>';
		}
	} 

	for ($i = 42; $i < count($_SESSION['mails']); $i++) {
		
		if (!empty($_SESSION['mails'][$i]['id'])) {
		
			echo '<tr style="display:none;" class="auteur section8" id="hideAuteur' . $_SESSION['mails'][$i]['id'] . '">';
			echo '<td class="nom" id="hideNom' . $_SESSION['mails'][$i]['id'] . '"><a href="#mailhead">' . $_SESSION['mails'][$i]['nom'] . '</a></td>';
			echo '<td class="date" id="hideDate' . $_SESSION['mails'][$i]['id'] . '"><a href="#mailhead">' . $_SESSION['mails'][$i]['date'] . '</a></td>'; 
			echo '<td class="mail" id="hideMail' . $_SESSION['mails'][$i]['id'] . '"><a href="#mailhead">' . $_SESSION['mails'][$i]['mail'] . '</a></td>';
			echo '<p style="display:none!important;" id="hideContent' . $_SESSION['mails'][$i]['id'] . '">' . $_SESSION['mails'][$i]['contenu'] .'</p>';
			echo '</tr>';
		}
	} 

		echo '</table>';

	if (count($_SESSION['mails']) > 38) {

		echo '<form method="post" action="confirmation">';
		echo '<h1 style="color:red!important">Attention !</h1>';
		echo '<label>Veuillez vidanger la table <span>mails</span> de la Base de données du site <a href="http://www.trekandrone.com" target="_blank">Trek & Drone</a> en cliquant sur <span>Vidanger</span></label>';
			echo '<button type="submit">Vidange</button>';
			echo '</form>';

	}

	echo '<div class="pagination">';
	$cpt = count($_SESSION['mails']);


		if ($cpt <= 6) {
			echo '<a id="a1" class="pagi active" href="#messages">1</a>';
		} elseif ($cpt <= 12) {
			echo '<a id="a1" class="pagi active" href="#messages">1</a>';
			echo '<a id="a2" class="pagi" href="#messages">2</a>';
		} elseif ($cpt <= 18) {
			echo '<a id="a1" class="pagi active" href="#messages">1</a>';
			echo '<a id="a2" class="pagi" href="#messages">2</a>';
			echo '<a id="a3" class="pagi" href="#messages">3</a>';
		} elseif ($cpt <= 24) {
			echo '<a id="a1" class="pagi active" href="#messages">1</a>';
			echo '<a id="a2" class="pagi" href="#messages">2</a>';
			echo '<a id="a3" class="pagi" href="#messages">3</a>';
			echo '<a id="a4" class="pagi" href="#messages">4</a>';
		} elseif ($cpt <= 30) {
			echo '<a id="a1" class="pagi active" href="#messages">1</a>';
			echo '<a id="a2" class="pagi" href="#messages">2</a>';
			echo '<a id="a3" class="pagi" href="#messages">3</a>';
			echo '<a id="a4" class="pagi" href="#messages">4</a>';
			echo '<a id="a5" class="pagi" href="#messages">5</a>';
		} elseif ($cpt <= 36) {
			echo '<a id="a1" class="pagi active" href="#messages">1</a>';
			echo '<a id="a2" class="pagi" href="#messages">2</a>';
			echo '<a id="a3" class="pagi" href="#messages">3</a>';
			echo '<a id="a4" class="pagi" href="#messages">4</a>';
			echo '<a id="a5" class="pagi" href="#messages">5</a>';
			echo '<a id="a6" class="pagi" href="#messages">6</a>';
		} elseif ($cpt <= 42) {
			echo '<a id="a1" class="pagi active" href="#messages">1</a>';
			echo '<a id="a2" class="pagi" href="#messages">2</a>';
			echo '<a id="a3" class="pagi" href="#messages">3</a>';
			echo '<a id="a4" class="pagi" href="#messages">4</a>';
			echo '<a id="a5" class="pagi" href="#messages">5</a>';
			echo '<a id="a6" class="pagi" href="#messages">6</a>';
			echo '<a id="a7" class="pagi" href="#messages">7</a>';
		} elseif ($cpt <= 48) {
			echo '<a id="a1" class="pagi active" href="#messages">1</a>';
			echo '<a id="a2" class="pagi" href="#messages">2</a>';
			echo '<a id="a3" class="pagi" href="#messages">3</a>';
			echo '<a id="a4" class="pagi" href="#messages">4</a>';
			echo '<a id="a5" class="pagi" href="#messages">5</a>';
			echo '<a id="a6" class="pagi" href="#messages">6</a>';
			echo '<a id="a7" class="pagi" href="#messages">7</a>';
			echo '<a id="a8" class="pagi" href="#messages">8</a>';
		} elseif ($cpt <= 4) {
			echo '<a id="a1" class="pagi active" href="#messages">1</a>';
			echo '<a id="a2" class="pagi" href="#messages">2</a>';
			echo '<a id="a3" class="pagi" href="#messages">3</a>';
			echo '<a id="a4" class="pagi" href="#messages">4</a>';
			echo '<a id="a5" class="pagi" href="#messages">5</a>';
			echo '<a id="a6" class="pagi" href="#messages">6</a>';
			echo '<a id="a7" class="pagi" href="#messages">7</a>';
			echo '<a id="a8" class="pagi" href="#messages">8</a>';
			echo '<a id="a9" class="pagi" href="#messages">9</a>';
		}

	echo '</div>';
} 

function vidange() {

	global $con;

	try {
		
		$stt = $con->exec('DELETE FROM mails');

	} catch (PDOException $e) {

		die($e->getMessage());

	}

}

function deleteId() {

	for ($i = 0; $i < count($_SESSION['mails']) ; $i++) {
		
		if (!empty($_SESSION['mails'][$i]['id'])) {
			global $con;

			try {
				
				$stt = $con->exec('ALTER TABLE mails DROP COLUMN id');

			} catch (PDOException $e) {

				die($e->getMessage());

			}
		}
	}

}


function newMailId() {

	global $con;

	try {
		$stt = $con->query('SELECT * FROM mails');
		$result['mails'] = $stt->fetchAll(PDO::FETCH_ASSOC);    

	} catch (PDOException $e) {
		die($e->getMessage());
	}
		
	if (empty($result['mails'][0]['id'])) {

		global $con;

		try {
				
			$stt = $con->exec('ALTER TABLE `mails` ADD `id` INT NOT NULL AUTO_INCREMENT primary key first');

		} catch (PDOException $e) {

			die($e->getMessage());

		}
	}	
}

//fonctions systeme

function backupExp() {

	global $con;

	try {
		$stt = $con->query('SELECT * FROM articles ORDER BY id DESC');
		$bdd['articles'] = $stt->fetchAll(PDO::FETCH_ASSOC);    

	} catch (PDOException $e) {
		die($e->getMessage());
	}

	try {
		$stt = $con->query('SELECT * FROM ip ORDER BY id DESC');
		$bdd['ip'] = $stt->fetchAll(PDO::FETCH_ASSOC);    

	} catch (PDOException $e) {
		die($e->getMessage());
	}

	try {
		$stt = $con->query('SELECT * FROM mails ORDER BY id DESC');
		$bdd['mails'] = $stt->fetchAll(PDO::FETCH_ASSOC);    

	} catch (PDOException $e) {
		die($e->getMessage());
	}

	try {
		$stt = $con->query('SELECT * FROM newsletter ORDER BY id DESC');
		$bdd['newsletter'] = $stt->fetchAll(PDO::FETCH_ASSOC);    

	} catch (PDOException $e) {
		die($e->getMessage());
	}

	try {
		$stt = $con->query('SELECT * FROM newslettercontent ORDER BY id DESC');
		$bdd['newslettercontent'] = $stt->fetchAll(PDO::FETCH_ASSOC);    

	} catch (PDOException $e) {
		die($e->getMessage());
	}

	try {
		$stt = $con->query('SELECT * FROM users ORDER BY id DESC');
		$bdd['users'] = $stt->fetchAll(PDO::FETCH_ASSOC);    

	} catch (PDOException $e) {
		die($e->getMessage());
	}

	try {
		$stt = $con->query('SELECT * FROM videos ORDER BY id DESC');
		$bdd['videos'] = $stt->fetchAll(PDO::FETCH_ASSOC);    

	} catch (PDOException $e) {
		die($e->getMessage());
	}

	echo '<style>';
	echo '	.tabBdd {
				display: flex;
				margin: 30px auto;
				width: 90%!important;
				justify-content: center;
				text-align: center;
				flex-direction: column;
			}

			.tabBdd td {
				padding: 8px!important;
			}

			#bdd {
				justify-content: center;
				flex-direction: column;
				align-items: center;
				margin: auto;
			}

			#bdd label {
				background-color: darkred!important;
				font-weight: bold;
			}

			.textareaTd {
				padding: 0 6px;
				background-color: transparent;
    			font-family: "Raleway", cursive;
    			border: none;
    			outline: none;
    			resize: none;
			}

			.imgBdd {
				font-size: 0.6em;

			}';
	echo '</style>';

	echo '<div id="bdd" style="display:none;">';

	echo '<h1>Etat de la Base De Données du site <a href="http://www.trekandrone.com" title="site" target="_blank">Trek & Drone</a></h1>';
	echo '<span style="color:red; font-size:1.3em; font-family: raleway;">Ce jour, le ' . date(" d-m-Y \à H:i:s") . '</span>';
	echo '<button style="margin-top: 10px;"><a style="color:white!important" href="https://phpmyadmin.cluster020.hosting.ovh.net/index.php?token=e8767b44f001b10d09172b715ad4bd2e&old_usr=sininveivntrek" target="_blank">PHPMyadmin</a></button>';


	if (!empty($bdd['articles'])) {

		echo '<div class="tabBdd">';
		echo '<label for="articlesTab">Articles <span>|</span> Nb de Colonnes : <span>' . count($bdd['articles']) . '</span></label>';
		echo '<table id="articlesTab">';
		echo '<tr>';
		echo '<th>id</th>';
		echo '<th>titre</th>';
		echo '<th>date</th>';
		echo '<th>para1</th>';
		echo '<th>para2</th>';
		echo '<th>category</th>';
		echo '<th>img1</th>';
		echo '<th>img2</th>';
		echo '<th>img3</th>';
		echo '<th>citation</th>';
		echo '</tr>';
		

		for ($i = 0; $i < count($bdd['articles']); $i++) {

			echo '<tr>';

			echo '<td>'. $bdd['articles'][$i]['id'] .'</td>';
			echo '<td style="font-size: 0.8em;">'. $bdd['articles'][$i]['titre'] .'</td>';
			echo '<td>'. $bdd['articles'][$i]['date'] .'</td>';
			echo '<td><textarea class="textareaTd" rows="5">'. $bdd['articles'][$i]['para1'] .'</textarea></td>';
			echo '<td><textarea class="textareaTd" rows="5">'. $bdd['articles'][$i]['para2'] .'</textarea></td>';
			echo '<td>'. $bdd['articles'][$i]['category'] .'</td>';
			echo '<td class="imgBdd">'. $bdd['articles'][$i]['img1'] .'</td>';
			echo '<td class="imgBdd">'. $bdd['articles'][$i]['img2'] .'</td>';
			echo '<td class="imgBdd">'. $bdd['articles'][$i]['img3'] .'</td>';
			echo '<td><textarea class="textareaTd" rows="5">'. $bdd['articles'][$i]['citation'] .'</textarea></td>';
			echo '</tr>';
		}

		
		echo '</table>';
		echo '</div>';
	}

	if (!empty($bdd['ip'])) {
		
		echo '<div id="tabBdd" class="tabBdd">';
		echo '<label for="ipTab">IP <span>|</span> Nb de Colonnes : <span>' . count($bdd['ip']) . '</span></label>';
		echo '<form method="post" id="debann" name="debann" action="debannir">';
		echo '<table id="ipTab">';
		echo '<tr>';
		echo '<th>sélectionner</th>';
		echo '<th>id</th>';
		echo '<th>ip_adress</th>';
		echo '<th>date</th>';
		echo '<th>tentative</th>';
		echo '<th>pays</th>';
		echo '</tr>';
		

		for ($i = 0; $i < count($bdd['ip']); $i++) {

			echo '<tr>';
			echo '<td><input class="ipsel" type="radio" name="checkbox" value="'. $bdd['ip'][$i]['id'] .'"></td>';
			echo '<td>'. $bdd['ip'][$i]['id'] .'</td>';
			echo '<td>'. $bdd['ip'][$i]['ip_adress'] .'</td>';
			echo '<td>'. $bdd['ip'][$i]['date'] .'</td>';
			echo '<td>'. $bdd['ip'][$i]['tentative'] .'</td>';
			echo '<td>'. $bdd['ip'][$i]['pays'] .'</td>';
			echo '</tr>';
		}

		
		echo '</table>';
		echo '<button style="width: 12%; margin: 10px auto 0 auto;" name="sbmitIp" type="submit">Débannir</button>';
		echo '</form>';
		echo '</div>';
	}

	if (!empty($bdd['mails'])) {
		
		echo '<div class="tabBdd">';
		echo '<label for="mailsTab">Mails <span>|</span> Nb de Colonnes : <span>' . count($bdd['mails']) . '</span></label>';;
		echo '<table id="mailsTab">';
		echo '<tr>';
		echo '<th>id</th>';
		echo '<th>nom</th>';
		echo '<th>date</th>';
		echo '<th>mail</th>';
		echo '<th>contenu</th>';
		echo '</tr>';
		

		for ($i = 0; $i < count($bdd['mails']); $i++) {

			echo '<tr>';
			echo '<td>'. $bdd['mails'][$i]['id'] .'</td>';
			echo '<td>'. $bdd['mails'][$i]['nom'] .'</td>';
			echo '<td>'. $bdd['mails'][$i]['date'] .'</td>';
			echo '<td>'. $bdd['mails'][$i]['mail'] .'</td>';
			echo '<td><textarea class="textareaTd" rows="3" cols="50">'. $bdd['mails'][$i]['contenu'] .'</textarea></td>';
			echo '</tr>';
		}

		
		echo '</table>';
		echo '</div>';
	}

	if (!empty($bdd['newsletter'])) {
		
		echo '<div class="tabBdd">';
		echo '<label for="newsletterTab">Newsletter <span>|</span> Nb de Colonnes : <span>' . count($bdd['newsletter']) . '</span></label>';
		echo '<table id="newsletterTab">';
		echo '<tr>';
		echo '<th>id</th>';
		echo '<th>email</th>';
		echo '<th>date</th>';
		echo '</tr>';
		

		for ($i = 0; $i < count($bdd['newsletter']); $i++) {

			echo '<tr>';
			echo '<td>'. $bdd['newsletter'][$i]['id'] .'</td>';
			echo '<td>'. $bdd['newsletter'][$i]['email'] .'</td>';
			echo '<td>'. $bdd['newsletter'][$i]['date'] .'</td>';
			echo '</tr>';
		}

		
		echo '</table>';
		echo '</div>';
	}

	if (!empty($bdd['newslettercontent'])) {
		
		echo '<div class="tabBdd">';
		echo '<label for="newslettercontentTab">NewsletterContent <span>|</span> Nb de Colonnes : <span>' . count($bdd['newslettercontent']) . '</span></label>';
		echo '<form method="post" id="sendNl" name="sendNl" action="envoi-newsletter">';
		echo '<table id="newslettercontentTab">';
		echo '<tr>';
		echo '<th>sélectionner</th>';
		echo '<th>id</th>';
		echo '<th>titre</th>';
		echo '<th>date</th>';
		echo '<th>contenu</th>';
		echo '</tr>';
		

		for ($i = 0; $i < count($bdd['newslettercontent']); $i++) {
			
			echo '<tr>';
			echo '<td><input class="mailsel" type="radio" name="checknl" value='. $bdd['newslettercontent'][$i]['id'] .'></td>';
			echo '<td>'. $bdd['newslettercontent'][$i]['id'] .'</td>';
			echo '<td>'. $bdd['newslettercontent'][$i]['titre'] .'</td>';
			echo '<td>'. $bdd['newslettercontent'][$i]['date'] .'</td>';
			echo '<td><textarea class="textareaTd" rows="4" cols="50">'. $bdd['newslettercontent'][$i]['contenu'] .'</textarea></td>';
			echo '</tr>';
		}

		
		echo '</table>';
		echo '<button style="width: 12%; margin: 10px auto 0 auto;" name="sbmitNl" type="submit">Envoyer</button>';
		echo '</form>';
		echo '</div>';
	}

	if (!empty($bdd['users'])) {
		
		echo '<div class="tabBdd">';
		echo '<label for="usersTab">Users <span>|</span> Nb de Colonnes : <span>' . count($bdd['users']) . '</span></label>';;
		echo '<table id="usersTab">';
		echo '<tr>';
		echo '<th>id</th>';
		echo '<th>nom</th>';
		echo '<th>password</th>';
		echo '<th>derniere_connex</th>';
		echo '<th>theme</th>';
		echo '<th>email</th>';
		echo '</tr>';
		

		for ($i = 0; $i < count($bdd['users']); $i++) {

			echo '<tr>';
			echo '<td>'. $bdd['users'][$i]['id'] .'</td>';
			echo '<td>'. $bdd['users'][$i]['nom'] .'</td>';
			echo '<td>'. $bdd['users'][$i]['password'] .'</td>';
			echo '<td>'. $bdd['users'][$i]['derniere_connex'] .'</td>';
			echo '<td>'. $bdd['users'][$i]['theme'] .'</td>';
			echo '<td>'. $bdd['users'][$i]['email'] .'</td>';
			echo '</tr>';
		}

		echo '</table>';
		echo '</div>';
	}

		if (!empty($bdd['videos'])) {
		
		echo '<div class="tabBdd">';
		echo '<label for="videosTab">Videos <span>|</span> Nb de Colonnes : <span>' . count($bdd['videos']) . '</span></label>';;
		echo '<table id="videosTab">';
		echo '<tr>';
		echo '<th>id</th>';
		echo '<th>titre</th>';
		echo '<th>date</th>';
		echo '<th>drone</th>';
		echo '<th>dronecontent</th>';
		echo '<th>imgd</th>';
		echo '<th>videocode</th>';
		echo '<th>videocontent</th>';
		echo '</tr>';
		

		for ($i = 0; $i < count($bdd['videos']); $i++) {

			echo '<tr>';
			echo '<td>'. $bdd['videos'][$i]['id'] .'</td>';
			echo '<td style="font-size: 0.8em;">'. $bdd['videos'][$i]['titre'] .'</td>';
			echo '<td>'. $bdd['videos'][$i]['date'] .'</td>';
			echo '<td>'. $bdd['videos'][$i]['drone'] .'</td>';
			echo '<td><textarea class="textareaTd" rows="4" cols="30">'. $bdd['videos'][$i]['dronecontent'] .'</textarea></td>';
			echo '<td class="imgBdd">'. $bdd['videos'][$i]['imgd'] .'</td>';
			echo '<td><textarea class="textareaTd" rows="4" cols="30">'. $bdd['videos'][$i]['videocode'] .'</textarea></td>';
			echo '<td><textarea class="textareaTd" rows="4" cols="30">'. $bdd['videos'][$i]['videocontent'] .'</textarea></td>';
			echo '</tr>';
		}

		
		echo '</table>';
		echo '</div>';
	}

	echo '</div>';
}	

function createNewsletter() {

	global $con;

	$titre = $_POST['titreNews'];
	$newsL = $_POST['editor5'];
	

	try {
		
		$stt = $con->prepare("INSERT INTO newslettercontent (titre, contenu) 
			VALUES (:titre, :newsL)");

		$stt->bindValue('titre', $titre, PDO::PARAM_STR);
		$stt->bindValue('newsL', $newsL, PDO::PARAM_STR);
		
		$stt->execute();

	} catch (PDOException $e) {

		die($e->getMessage());

	}
}

function sendNewsletter() {

	global $con;

		try {
			$stt = $con->query('SELECT * FROM newslettercontent');
			$nlct = $stt->fetchAll(PDO::FETCH_ASSOC);

		} catch (PDOException $e) {

			die($e->getMessage());
		}

		
		for ($j = 0; $j < count($nlct); $j++) {

			if ($nlct[$j]['id'] == $_POST['checknl']) {

				try {
					$stt = $con->query('SELECT * FROM newsletter');
					$nl = $stt->fetchAll(PDO::FETCH_ASSOC);

				} catch (PDOException $e) {

					die($e->getMessage());
				}

				for ($i = 0; $i < count($nl); $i++) {

					$mail = $nl[$i]['email']; 

					if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)) 
					{
						$passage_ligne = "\r\n";
					} else {
					
						$passage_ligne = "\n";
					}
					
					$message_txt = "NEWSLETTER du " . date('d-m-Y') . " : " . $nlct[$j]['titre'] . " . " . $nlct[$j]['contenu'] ;
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
NEWSLETTER du ' . date('d/m/Y') . ' : <span style="color: orange; font-style: italic">' . $nlct[$j]['titre'] . '</span>
</h1>

<font style="color:black; font-size:14px; font-family: raleway, arial; text-align: center;">' . $nlct[$j]['contenu'] . '</font>
<p style="text-align: center;"><a href="http://www.trekandrone.com" style="font-size: 2em; font-style: italic; color: orange; text-decoration: none;">Trekandrone.com</a><p>

</body>
</html>';

					$boundary = "-----=".md5(rand());
					$boundary_alt = "-----=".md5(rand());

					$sujet = "Trek and Drone | Newsletter";

					$header = "From: \"Trek & Drone\"<newsletter@trekandrone.com>".$passage_ligne;
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

					mail($mail,$sujet,$message,$header);
					
				}
			}
		}
}

function get_ip() {
    if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
        return $ip;
    }
}


function is_ban($ip) {

     global $con;
		try {
			$qry = 'SELECT * FROM ip WHERE ip_adress = :ip AND tentative = :tentative';

				$stt = $con->prepare($qry);
				$stt->bindValue('ip', $_POST['ip'], PDO::PARAM_INT);
				$stt->bindValue('tentative', sha1($_POST['tentative']), PDO::PARAM_INT);

				if ($stt->execute() && $stt->rowCount()  == 1) {
				    $_SESSION['ip'] = $stt->fetch(PDO::FETCH_ASSOC);
				    
			}
		} catch (PDOException $e) {
			die($e->getMessage());
		}
}

function deleteIp() {

	if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }    
    $intIp = ip2long($ip);

	global $con;

	try {
				
		$stt = $con->exec('DELETE FROM ip WHERE ip_adress =' . $intIp);

	} catch (PDOException $e) {

		die($e->getMessage());

	}
}

function banirIp() {

	if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }    
    return $ip;
}

function nbConnexIp() {

	global $con;

		try {
			$stt = $con->query('SELECT tentative FROM ip');
			$result = $stt->fetchAll(PDO::FETCH_ASSOC);

		} catch (PDOException $e) {

			die($e->getMessage());
		}

	for ($i = 0; $i < count($result); $i++) {
		
		if ($result[$i]['tentative'] > 9) {
			
			header('Location: http://www.trekandrone.com/perdu');

			global $con;

			try {

			$stt = $con->query('SELECT * FROM users');
			$email = $stt->fetchAll(PDO::FETCH_ASSOC);

			} catch (PDOException $e) {

				die($e->getMessage());
			}


			for ($i = 0; $i < count($email); $i++) {

				$mail = $email[$i]['email']; // Déclaration de l'adresse de destination.

				if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)) // On filtre les serveurs qui présentent des bogues.
				{
					$passage_ligne = "\r\n";
				} else {
				
					$passage_ligne = "\n";
				}
				//=====Déclaration des messages au format texte et au format HTML.


				$message_txt = "ATTENTION ! Vous recevez ce message car l'adresse IP : <span style='color: red;'>" . $_SERVER['REMOTE_ADDR']. " (Origine : " . $_POST['iploc'] . ")</span>, a été bannie de la partie Gestion du site Trekandrone.com pour avoir dépassé le nombre de connexions infructueuses autorisé.";
				$message_html = "
				<html>
				<head>
				</head>
				<body>
				<p style='font-weight: bold; font-size: 1.2em; font-style: italic; color: red; margin: 0;'>ATTENTION !</p><br>
				<p style='margin: 0;'>Vous recevez ce message car l'adresse IP : <span style='color: red;'>" . $_SERVER['REMOTE_ADDR']. " (Origine : " . $_POST['iploc'] . ")</span> a été bannie de la partie Gestion du site <a style='text-decoration: none; color: orange; font-style: italic' href='http://www.trekandrone.com'>Trekandrone.com</a> pour avoir dépassé le nombre de connexions infructueuses autorisé.</p><br>
				<p style='font-style: italic; color: grey; margin: 0;'>Trek and Drone Sécurité.</p>
				</body>
				</html>";
				//==========
				 
				//=====Lecture et mise en forme de la pièce jointe.
				/*$fichier   = fopen("../img/interdit.png", "r");
				$attachement = fread($fichier, filesize("../img/interdit.png"));
				$attachement = chunk_split(base64_encode($attachement));
				fclose($fichier);*/
				//==========
				 
				//=====Création de la boundary.
				$boundary = "-----=".md5(rand());
				$boundary_alt = "-----=".md5(rand());
				//==========
				 
				//=====Définition du sujet.
				$sujet = "Sécurité Treck & Drone";
				//=========
				 
				//=====Création du header de l'e-mail.
				$header = "From: \"Trek & Drone\"<securite@trekandrone.com>".$passage_ligne;
				$header.= "Reply-to: \" <noreply@trekandrone.com>".$passage_ligne;
				$header.= "MIME-Version: 1.0".$passage_ligne;
				$header .= "X-Priority: 3".$passage_ligne;
				$header.= "Content-Type: multipart/mixed;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
				//==========
				 
				//=====Création du message.
				$message = $passage_ligne."--".$boundary.$passage_ligne;
				$message.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary_alt\"".$passage_ligne;
				$message.= $passage_ligne."--".$boundary_alt.$passage_ligne;
				//=====Ajout du message au format texte.
				$message.= "Content-Type: text/plain; charset=\"ISO-8859-1\"".$passage_ligne;
				$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
				$message.= $passage_ligne.$message_txt.$passage_ligne;
				//==========
				 
				$message.= $passage_ligne."--".$boundary_alt.$passage_ligne;
				 
				//=====Ajout du message au format HTML.
				$message.= "Content-Type: text/html; charset=\"ISO-8859-1\"".$passage_ligne;
				$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
				$message.= $passage_ligne.$message_html.$passage_ligne;
				//==========
				 
				//=====On ferme la boundary alternative.
				$message.= $passage_ligne."--".$boundary_alt."--".$passage_ligne;
				//==========
				  
				$message.= $passage_ligne."--".$boundary.$passage_ligne;
				 
				//=====Ajout de la pièce jointe.
				/*$message.= "Content-Type: image/png; name=\"interdit.png\"".$passage_ligne;
				$message.= "Content-Transfer-Encoding: base64".$passage_ligne;
				$message.= "Content-Disposition: attachment; filename=\"interdit.png\"".$passage_ligne;
				$message.= $passage_ligne.$attachement.$passage_ligne.$passage_ligne;
				$message.= $passage_ligne."--".$boundary."--".$passage_ligne; */
				//========== 

				//=====Envoi de l'e-mail.
				mail($mail,$sujet,$message,$header);
				//==========
			}
		}
	}

}

function debannIp() {

	global $con;

	$ip = $_POST['checkbox'];
	
	try {
				
		$stt = $con->exec('DELETE FROM ip WHERE id =' . $ip);

	} catch (PDOException $e) {

		die($e->getMessage());

	}
}

function modifNewsletter() {

	try {

		global $con;

		$stt = $con->prepare("UPDATE newslettercontent SET titre= :titre, contenu= :contenu WHERE id =  :id");

		$stt->bindValue('id', $_POST['idnlmodif'], PDO::PARAM_INT);
		$stt->bindValue('titre', $_POST['titreNews'], PDO::PARAM_STR);
		$stt->bindValue('contenu', $_POST['editor5'], PDO::PARAM_STR);

		$stt->execute();

	} catch (PDOException $e) {

		die($e->getMessage());

	}
}


function showNewsModif() {

		global $con;

		try {

		$stt = $con->query('SELECT * FROM newslettercontent ORDER BY id DESC');
		$nlct = $stt->fetchAll(PDO::FETCH_ASSOC);

		} catch (PDOException $e) {

			die($e->getMessage());
		}

		echo '<style>';
		echo '#modifnl p {margin:5px auto 0 auto; font-style:italic;color:orange;width:50%;transition:color 0.35s;}';
		echo '#modifnl p:hover {color:red;}';
		echo '</style>';


		if (!empty($nlct)) {

			echo '<div class="nlDiv" id="modifnl" style="display:none; flex-direction: column; margin-bottom: 50px;">';
			echo "<p style='font-style: normal; font-size: 1em; color: darkred; margin-bottom: 20px;'>Pensez à <span>effacer</span> la Newsletter précédente <span>avant</span> d'en charger une nouvelle, sinon le contenu de la nouvelle Newsletter s'affichera à la suite du contenu de la Newsletter précédente.</p>";

			for ($i = 0; $i < count($nlct) ; $i++) {	

					echo '<p id="titre' . $nlct[$i]['id'] . '" class="nlOpt" value="' . $nlct[$i]['titre'] .'">' . "- " . $nlct[$i]['titre'] . " (édité le : " . $nlct[$i]['date'] . ")" . " -" . '</p>';
					echo '<input type="hidden"  id="contenu' . $nlct[$i]['id'] . '" class="nlOpt" value="' . $nlct[$i]['contenu'] .'"></input>';

			} echo '</div>';

		}
}

function createVideo() {

	global $con;

	$titre = $_POST['titredrone'];
	$date = 'le' . date(" d-m-Y \à H:i:s");
	$drone = $_POST['drone'];
	$dronecontent = $_POST['editor6'];
	$imgd = $_FILES['imgd']['name'];
	$videocode = $_POST['videocode'];
	$videocontent = $_POST['editor7'];

	try {
		
		$stt = $con->prepare("INSERT INTO videos (titre, date, drone, dronecontent, imgd, videocode, videocontent) 
			VALUES (:titredrone, :date, :drone, :dronecontent, :imgd, :videocode, :videocontent)");

		$stt->bindValue('titredrone', $titre, PDO::PARAM_STR);
		$stt->bindValue('date', $date, PDO::PARAM_STR);
		$stt->bindValue('drone', $drone, PDO::PARAM_STR);
		$stt->bindValue('dronecontent', $dronecontent, PDO::PARAM_STR);
		$stt->bindValue('imgd', $imgd, PDO::PARAM_STR);
		$stt->bindValue('videocode', $videocode, PDO::PARAM_STR);
		$stt->bindValue('videocontent', $videocontent, PDO::PARAM_STR);

		$stt->execute();

	} catch (PDOException $e) {

		die($e->getMessage());

	}
}

function modifVideo() {

	$titre = $_POST['titredrone'];
	$drone = $_POST['drone'];
	$dronecontent = $_POST['editor6'];
	$videocode = $_POST['videocode'];
	$videocontent = $_POST['editor7'];

	try {

		global $con;

		$stt = $con->prepare("UPDATE videos SET titre= :titredrone,  drone= :drone, dronecontent= :dronecontent, videocode= :videocode, videocontent= :videocontent WHERE id =  :id");

		$stt->bindValue('id', $_POST['idvidmodif'], PDO::PARAM_INT);
		$stt->bindValue('titredrone', $titre, PDO::PARAM_STR);
		$stt->bindValue('drone', $drone, PDO::PARAM_STR);
		$stt->bindValue('dronecontent', $dronecontent, PDO::PARAM_STR);
		$stt->bindValue('videocode', $videocode, PDO::PARAM_STR);
		$stt->bindValue('videocontent', $videocontent, PDO::PARAM_STR);

		$stt->execute();

	} catch (PDOException $e) {

		die($e->getMessage());

	}
}


function showVideoModif() {

		global $con;

		try {

		$stt = $con->query('SELECT * FROM videos ORDER BY id DESC');
		$video = $stt->fetchAll(PDO::FETCH_ASSOC);

		} catch (PDOException $e) {

			die($e->getMessage());
		}

		echo '<style>';
		echo '#modifvid p {margin:5px auto 0 auto; font-style:italic;color:orange;width:50%;transition:color 0.35s;}';
		echo '#modifvid p:hover {color:red;}';
		echo '</style>';


		if (!empty($video)) {

			echo '<div class="vidDiv" id="modifvid" style="display:none; flex-direction: column; margin-bottom: 50px;">';
			echo "<p style='font-style: normal; font-size: 1em; color: darkred; margin-bottom: 20px;'>Pensez à <span>effacer</span> le contenu précédent <span>avant</span> d'en charger un nouveau, sinon le nouveau contenu s'affichera à la suite du contenu précédent.</p>";

			for ($i = 0; $i < count($video) ; $i++) {	

					echo '<p id="titre' . $video[$i]['id'] . '" class="nlOpt" value="' . $video[$i]['titre'] .'">- ' . $video[$i]['titre'] . ' (édité le : ' . $video[$i]['date'] . ')' . ' -' . '</p>';
					echo '<input type="hidden"  id="idrone' . $video[$i]['id'] . '" class="nlOpt" value="' . $video[$i]['id'] .'"></input>';
					echo '<input type="hidden"  id="titredrone' . $video[$i]['id'] . '" class="nlOpt" value="' . $video[$i]['titre'] .'"></input>';
					echo '<input type="hidden"  id="drone' . $video[$i]['id'] . '" class="nlOpt" value="' . $video[$i]['drone'] .'"></input>';
					echo '<input type="hidden"  id="dronecontent' . $video[$i]['id'] . '" class="nlOpt" value="' . $video[$i]['dronecontent'] .'"></input>';
					echo "<input type='hidden'  id='videocode" . $video[$i]['id'] . "' class='nlOpt' value='" . $video[$i]['videocode'] ."'></input>";
					echo '<input type="hidden"  id="videocontent' . $video[$i]['id'] . '" class="nlOpt" value="' . $video[$i]['videocontent'] .'"></input>';

			} echo '</div>';

		}
}

function upLoadVideo() {

	$dirname = dirname(__FILE__).'/videos/';

	$image_name = $_FILES['imgd']['name'];

	$final_pathdir = $dirname . $image_name;
    $suc = move_uploaded_file($_FILES['imgd']['tmp_name'], $final_pathdir);

    /*if ($suc > 0) {
        print_r("Image uploaded successfully");

	} else {
	    print_r("Error : " . $_FILES['img'.$i]['error']);
    }*/


}

