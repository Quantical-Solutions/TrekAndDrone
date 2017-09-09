<?php
    if(isset($_GET['email'])) // On vérifie que la variable $_GET['email'] existe.
    {
 
        if( !empty($_POST['email']) AND $_GET['email']==1 AND isset($_POST['new'])) /* On vérifie que la variable $_POST['email'] contient bien quelque chose, que la variable $_GET['email'] est égale à 1 et que la variable $_POST['new'] existe. */
        {
        if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['email'])) // On vérifie qu'on a bien rentré une adresse e-mail valide.
        {
 
            if($_POST['new']==0) // Si la variable $_POST['new'] est égale à 0, cela signifie que l'on veut s'inscrire.
            {
 
            // On définit les paramètres de l'e-mail.
            $email = $_POST['email'];
            $message = 
'<html>
<head>
</head>
<body style="background: wheat;
    background: -webkit-linear-gradient(black, wheat, white);
    background: -o-linear-gradient(black, wheat, black);
    background: -moz-linear-gradient(black, wheat, white);
    background: linear-gradient(black, wheat, white); padding: 40px; border-radius: 15px;">

<img src="http://www.trekandrone.com/img/trek&drone.png" width="600" height="250" alt="Bienvenue" style="display:block; margin: auto;">

<font style="color:black; font-size:14px; font-family: raleway, arial; text-align: center;"><br>Pour valider votre inscription à la newsletter de Trekandrone.com, <a href="http://www.trekandrone.com/inscription.php?tru=1&amp;email='.$email.'">cliquez ici</a>.</font>
<p style="text-align: center;"><a href="http://www.trekandrone.com" style="font-size: 2em; font-style: italic; color: orange; text-decoration: none;">Trekandrone.com</a><p>

</body>
</html>';
 
            $destinataire = $email;
            $objet = "Inscription à la newsletter de Trekandrone.com" ;
 
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $headers .= "From: \"Trek & Drone Newsletter\"<newsletter@trekandrone.com>" . "\r\n";
                if ( mail($destinataire, $objet, $message, $headers) ) // On envoie l'e-mail.
                {
 
                echo "<div class='errornewsmess'><h2>Inscription à la Newsletter : </h2><span style='margin-bottom: 15px'> Pour valider votre inscription, veuillez cliquer sur le lien dans l'email que nous venons de vous envoyer.</span></div><img id='shadowerrors' class='shadow' src='img/shadow.png' alt='ombre'>";
                }
                else
                {
                echo "<div class='errornewsmess'><h2>Inscription à la Newsletter : </h2><span style='margin-bottom: 15px'> Il y a eu une erreur lors de l'envoi du mail pour votre inscription.</span></div><img id='shadowerrors' class='shadow' src='img/shadow.png' alt='ombre'>";
                }
            }
            elseif($_POST['new']==1) // Si la variable $_POST['new'] est égale à 1, cela signifie que l'on veut se désinscrire.
            {
 
            // On définit les paramètres de l'e-mail.
            $email = $_POST['email'];
            $message = /*'Pour valider votre désinscription de la newsletter de Trekandrone.com, <a href="http://www.trekandrone.com/desinscription.php?tru=1&amp;email='.$email.'">cliquez ici</a>.';*/
'<html>
<head>
</head>
<body style="background: wheat;
    background: -webkit-linear-gradient(black, wheat, white);
    background: -o-linear-gradient(black, wheat, black);
    background: -moz-linear-gradient(black, wheat, white);
    background: linear-gradient(black, wheat, white); padding: 40px; border-radius: 15px;">

<img src="http://www.trekandrone.com/img/trek&drone.png" width="600" height="250" alt="Bienvenue" style="display:block; margin: auto;">

<font style="color:black; font-size:14px; font-family: raleway, arial; text-align: center;"><br>Pour valider votre désinscription de la newsletter de Trekandrone.com, <a href="http://www.trekandrone.com/desinscription.php?tru=1&amp;email='.$email.'">cliquez ici</a>.</font>
<p style="text-align: center;"><a href="http://www.trekandrone.com" style="font-size: 2em; font-style: italic; color: orange; text-decoration: none;">Trekandrone.com</a><p>

</body>
</html>';
 
            $destinataire = $email;
            $objet = "Désinscription de la newsletter de Trekandrone.com" ;
 
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $headers .= "From: \"Trek & Drone Newsletter\"<newsletter@trekandrone.com>" . "\r\n";
                if ( mail($destinataire, $objet, $message, $headers) ) 
                {
            
                echo "<div class='errornewsmess'><h2>Désinscription à la Newsletter : </h2><span style='margin-bottom: 15px'> Pour valider votre désinscription, veuillez cliquer sur le lien dans l'email que nous venons de vous envoyer.</span></div><img id='shadowerrors' class='shadow' src='img/shadow.png' alt='ombre'>";
                }
                else
                {
                echo "<div class='errornewsmess'><h2>Désinscription à la Newsletter : </h2><span style='margin-bottom: 15px'> Il y a eu une erreur lors de l'envoi du mail pour votre désinscription.</span></div><img id='shadowerrors' class='shadow' src='img/shadow.png' alt='ombre'>";
                }
            }
            else
            {
            echo "<div class='errornewsmess'><h2>Inscription / Désinscription à la Newsletter : </h2><span style='margin-bottom: 15px'> Il y a eu une erreur !</span></div><img id='shadowerrors' class='shadow' src='img/shadow.png' alt='ombre'>";
            }
        }
        else
        {
        echo "<div class='errornewsmess'><h2>Inscription / Désinscription à la Newsletter : </h2><span style='margin-bottom: 15px'> Vous n\'avez pas entré une adresse e-mail valide ! Veuillez recommencer !</span></div><img id='shadowerrors' class='shadow' src='img/shadow.png' alt='ombre'>";
        }
        }
        else
        {
        echo "<div class='errornewsmess'><h2>Inscription / Désinscription à la Newsletter : </h2><span style='margin-bottom: 15px'> Il y a eu une erreur.</span></div><img id='shadowerrors' class='shadow' src='img/shadow.png' alt='ombre'>";
        }
    }
    else // Si les champs n'ont pas été remplis.
    {
?>

<form id="newsform" method="post" action="index.php?email=1">
    <div>
        <h1>LA NEWSLETTER <span>Trekandrone.com</span> !</h1>
    </div>
    <div id="newscontent">
        <label>Adresse e-mail : </label>
        <input id="newsmail" type="text" name="email" size="25" />
    </div>
    <div id="newsbas">
        <input id="newsin1" type="radio" name="new" value="0" />
        <p>S'inscrire</p>
        <input id="newsin2" type="radio" name="new" value="1" />
        <p>Se désinscrire</p>
        <button id="newsin3" type="submit" value="Envoyer" name="submit">ENVOYER</button>
        <button id="newsin4" type="reset" name="reset" value="Effacer">EFFACER</button>
    </div>
    <div id="newsBtns">
        <button id="newsin5" type="submit" value="Envoyer" name="submit">ENVOYER</button>
        <button id="newsin6" type="reset" name="reset" value="Effacer">EFFACER</button>
    </div>
</form>
<!-- <img id="shadownews" class="shadow" src="img/shadow.png" alt="ombre"> -->
<?php
    }
?>

