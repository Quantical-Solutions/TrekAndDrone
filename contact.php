<?php require('includes/header.php');


?>

<style>

	#l4 {
		color: orange!important;
	}

</style>

	<main id="contact">
		<div id="consignes">
			<h1>Contact</h1>
			<p>Pour tout renseignements ou informations sur le <span>développement, les vidéos, ainsi que les sorties</span>, n'hésitez pas à nous envoyer un message par le biais du formulaire de contact <span>ci-dessous</span>.<br><br>Nous vous répondrons dans les plus brefs délais dès réception de votre message.<br>Une copie de ce message sera envoyé sur la boîte de <span>l'adresse email renseignée</span> dans le formulaire.</p>
			<p><span>Tous les champs</span> doivent être renseignés.</p>
			<span id="errorpseudo" style="color: red; display: none;">Votre pseudo doit comporter au moins 2 caractères.</span>
			<span id="errormail" style="color: red; display: none;">Votre adresse mail ne semble pas être valide.</span>
		</div>

<?php if (!empty($_POST['action']) && $_POST['action'] == "confirm") {

		require ('recaptchalib.php');
			$siteKey = '6LeZviwUAAAAAN9tsNzdKK-8iU3tSCs-WtRQm8Qg'; // votre clé publique
			$secret = '6LeZviwUAAAAABTZoxLRK9G7mwRr88sPu7DssY0H'; // votre clé privée
			$reCaptcha = new ReCaptcha($secret);

			if(isset($_POST["g-recaptcha-response"])) {

			    $resp = $reCaptcha->verifyResponse(
			        $_SERVER["REMOTE_ADDR"],
			        $_POST["g-recaptcha-response"]
			        );

			    if ($resp != null && $resp->success) {

			    	sendMail();?>
			    	<div>
						<p><span style="color: red;">Votre message a bien été envoyé.</span></p>
					</div>
					<?php

			    } else {

			    	echo "<span style='color: red;'>CAPTCHA incorrect</span>";
			    	echo '<form id="messform" method="post" accept-charset="utf-8" onmouseover="verifForm()">
			<input type="hidden" name="action" value="confirm">
			<div id="entete">
				<label for="pseudo">Pseudo : </label>
				<input id="inpseudo" type="text" name="pseudo"  onblur="verifPseudo(this)" required>
				<label for="email">Email : </label>
				<input id="inmail" type="text" name="email" onblur="verifMail(this)" required>
			</div>
			<div id="corps">
				<label for="message">Message : </label>
				<textarea type="text" id="contenumess" name="message" cols="80" rows="10"" required></textarea>
				<input id="hidepseudo" type="hidden" value="">
				<input id="hidemail" type="hidden" value="">
			</div>
			<div id="captcha" class="g-recaptcha" data-sitekey="6LeZviwUAAAAAN9tsNzdKK-8iU3tSCs-WtRQm8Qg" required></div>
			<button id="sendmessbtn" type="submit" disabled>ENVOYER</button>
			<button id="sendmessbtn2" disabled>ENVOYER</button>
		</form>
		<img id="shadowmess" class="shadow" src="img/shadow.png" alt="ombre">';
			    }
			};?>

		

<?php } else {?>

		<form id="messform" method="post" accept-charset="utf-8" onmouseover="verifForm()">
			<input type="hidden" name="action" value="confirm">
			<div id="entete">
				<label for="pseudo">Pseudo : </label>
				<input id="inpseudo" type="text" name="pseudo"  onblur="verifPseudo(this)" required>
				<label for="email">Email : </label>
				<input id="inmail" type="text" name="email" onblur="verifMail(this)" required>
			</div>
			<div id="corps">
				<label for="message">Message : </label>
				<textarea type="text" id="contenumess" name="message" cols="80" rows="10"" required></textarea>
				<input id="hidepseudo" type="hidden" value="">
				<input id="hidemail" type="hidden" value="">
			</div>
			<div id="captcha" class="g-recaptcha" data-sitekey="6LeZviwUAAAAAN9tsNzdKK-8iU3tSCs-WtRQm8Qg" required></div>
			<button id="sendmessbtn" type="submit" disabled>ENVOYER</button>
			<button id="sendmessbtn2" disabled>ENVOYER</button>
		</form>
		<img id="shadowmess" class="shadow" src="img/shadow.png" alt="ombre">

<?php } ?>

	</main>
	<script>

	function verifForm() {

		var disbtn = document.getElementById('sendmessbtn');
		var disbtn2 = document.getElementById('sendmessbtn2');
		var hidepseudo = document.getElementById('hidepseudo').value;
		var hidemail = document.getElementById('hidemail').value;

		if (hidemail == "ok" && hidepseudo == "ok") {
			disbtn.style.display = "initial";
			disbtn2.style.display = "none";
			disbtn.disabled = false;
		} else {
			disbtn.style.display = "none";
			disbtn2.style.display = "initial";
			disbtn.disabled = true;
		}
	}

	var onloadCallback = function() {
    alert("grecaptcha is ready!");
  };

	</script>
<?php require('includes/footer.php');?>