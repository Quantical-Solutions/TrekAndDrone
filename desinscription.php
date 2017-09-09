<?php

require_once ('includes/fonctions.php');

    if($_GET['tru']==1)
    {
 
    setcookie("email", $_GET['email'], time()+25); // On crée un cookie qui expirera 25 secondes plus tard pour des raisons de sécurité.
 
    }
?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta http-equiv=Content-Type content="text/html; charset=iso-8859-1">
<?php
    if($_GET['tru']==2)
    {
?>
 
    <meta http-equiv="refresh" content="1; url=http://www.trekandrone.com/" /> <!-- Redirection vers la page d'accueil du site si on a entré son e-mail. -->
 
<?php
    }
    else
    {
?>
 
    <meta http-equiv="refresh" content="25; url=http://www.trekandrone.com/" /> <!-- Redirection vers la page d'accueil du site si on tarde trop à entrer son e-mail. -->
 
<?php
    }
?>
    <title>Trek & Drone | Désinscription</title>
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
</head>
<body>
<header>
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
                <img class="classHeaders" id="logo1900" src="img/desert.jpg" alt="logohead">
                <img id="shadowMenu1" class="shadow4" src="img/shadow3.png" alt="ombre">
            </div>
            <div id="logosResp">
                <img class="classHeaders" id="logo900" src="img/C.jpg" alt="logoheadresp">
                <img class="classHeaders" id="logo1400" src="img/desert.jpg" alt="logoheadresp">
                <img id="shadowMenu2" class="shadow4" src="img/shadow3.png" alt="ombre">
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
                    <li><a id="l3" href="drones#drones" title="DRONES / VIDEOS">DRONES / VIDEOS</a></li>
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
    <img id="shadowhead" class="shadowhead" src="img/shadow.png" alt="ombre">
<main>

 
<?php
    if($_GET['tru']==1) //si la variable $_GET['tru'] est égale à 1
    // On affiche le formulaire.
    {
?>

    <form id="newsform" method="post" action="desinscription.php?tru=2">
        <div style="margin: 10px auto">
            <h1 style="text-align: center;">Validation de votre désinscription à la Newsletter : </h1>
        </div>
        <div style="margin: 10px auto">
            <span style='margin-bottom: 15px; text-align: center;'>Attention, vous avez 25 secondes pour remplir le formulaire. Passé ce délai, celui-ci ne sera plus valide.</span>
        </div>
        <div id="newscontent" style="margin: 10px auto">
            <label for="email">Adresse e-mail : </label>
            <input id="newsmail" type="text" name="email" size="25" />
        </div>
        <div id="newsbas" style="margin: 10px auto">
            <button id="newsin3" type="submit" value="Envoyer" name="submit" />ENVOYER</button>
            <button id="newsin4" type="reset" name="reset" value="Effacer" />EFFACER</button>
        </div>
    </form>

<img id='shadowerrors' class='shadow' src='img/shadow.png' alt='ombre'>
<?php
    }
    elseif($_GET['tru']==2) // Sinon, si la variable $_GET['tru'] est égale à 2.
    {
    global $con;
    
        if(!empty($_POST['email'])) // Si les deux adresses e-mail sont identiques.
        {

        try {

            $mail = $_POST['email'];
                    
            $stt = $con->exec("DELETE FROM newsletter WHERE email ='" . $mail . "'");

        } catch (PDOException $e) {

            die($e->getMessage());

        } //On supprime l'adresse de la BDD.
 
        echo "<div class='errornewsmess'><h2>Désinscription à la Newsletter : </h2><span style='margin-bottom: 15px'>Vous avez bien été désinscrit de la newsletter de Trekandrone.com ! Vous allez être redirigé dans 1 seconde.</span></div><img id='shadowerrors' class='shadow' src='img/shadow.png' alt='ombre'>";
 
        }
        else
        {
        echo "<div class='errornewsmess'><h2>Désinscription à la Newsletter : </h2><span style='margin-bottom: 15px'>Vous n'avez pas entré la bonne adresse e-mail !!</span></div><img id='shadowerrors' class='shadow' src='img/shadow.png' alt='ombre'>";
        }
    }
    else
    {
    echo "<div class='errornewsmess'><h2>Désinscription à la Newsletter : </h2><span style='margin-bottom: 15px'>Il y a eu une erreur.</span></div><img id='shadowerrors' class='shadow' src='img/shadow.png' alt='ombre'>";
    }

echo '</main><footer>
        <div id="footer">
            <div class="shadowdiv">
                <img class="shadow3" src="img/shadow3.png" alt="ombre">
            </div>
            <div id="widget">
                <div id="apropos">
                    <h2>A propos</h2>
                    <p>Depuis quelques années maintenant les drones légers ont faits leur apparition dans le civil. Le pilotage de drones étant bien entendu régis par des règles bien précises. Aujourd\'hui, beaucoup de développeurs s\'intéressent de près aux nouvelles fonctionnalités que l\'ont pourrait implémenter comme de nouveaux organes sensoriels, de nouveaux types de captures d\'images, et bien d\'autres possibilités qu\'il serait long de citer ici.</p>
                        <p><span style="color: white;">Trek and Drone</span> se concentre sur de nouvelles façons de capturer les images d\'objets en mouvement dans des conditions dites <span style="color: white;">extrêmes</span>. En condition Off-Road ou Hors Piste, nous développons de nouvelles fonctionnalités qui permettent d\'avoir un contrôle optimal du drone et de sa caméra, que ce soit avec pilote de drone ou sans pilote (commandes vocales).</p>
                </div>
                <div id="logos">
                    <img src="img/trek&drone.png">
                    <div class="share">
                        <ul class="social-nav model-3d-0">
                            <li><a href="https://www.facebook.com/trekandrone/" class="facebook" target="_blank">
                                <div class="front"><i class="fa fa-facebook"></i></div>
                                <div class="back"><i class="fa fa-facebook"></i></div></a>
                            </li>
                            <li><a href="https://www.youtube.com/playlist?list=PL89zdZKUH07ufT0BcEFcQkWt1sIKdBMl9" class="youtube" target="_blank">
                                <div class="front"><i class="fa fa-youtube"></i></div>
                                <div class="back"><i class="fa fa-youtube"></i></div></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <ul>
            <li><a href="cgu#cgu" title="CGU">CGU</a></li>
            <li><a href="ml#ml" title="MENTIONS LEGALES">MENTIONS LEGALES</a></li>
            <li><a href="cookies#cookies" title="COOKIES">COOKIES</a></li>
            <li><a href="http://www.applicadrone.fr" target="_blank" title="APPLICADRONE">APPLICADRONE</a></li>
            <li><a href="plan-du-site#le-plan" title="PLAN DU SITE">PLAN DU SITE</a></li>
            <li><a href="contact#contact" title="CONTACT">CONTACT</a></li>
            <li><a href="http://www.trekandrone.com" title="TREK & DRONE">&copy TREK & DRONE</a></li>
        </ul>
    </footer>';

include ('includes/bandeau-cookies.php');

echo '<script src="http://code.jquery.com/jquery-1.8.2.js"></script>
<script src="owlcarousel/owl.carousel.min.js"></script>
<script src="js/custom.js"></script>
<script src="owlcarousel/owl.carousel.js"></script>
</body>
</html>';?>
