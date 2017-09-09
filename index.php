<?php
session_start();

require('includes/header.php'); ?>

	<main>
		</div>
		<div id="newsletterform">
			<?php include('newsletter-form.php') ?>
		</div>
		<div id="textprezintro">
			<h1>Trek &amp; Drone</h1>
			<h2>Nous vous souhaitons la bienvenue sur le site <span>Trek & Drone</span> !</h2>
			<p>Ici nous allons vous présenter les différentes expériences alliant la capture vidéo dynamique par des drones légers, à la pratiques des sports mécaniques <span>Off Road</span>, mais aussi d'autres partiques nous permettant de rendre utile ce type de capture.</p>
			<p>En effet, même si l'objectif est de pouvoir proposer une expérience utilisateur inédite, nous développons de <span>nouvelles fonctionnalités</span> par la conception de Hardware et Software, soit le développement de programmes, la réalisation d'objets comme des coques ou pièces (impression 3D), et l'assemblage de matériel électronique.</p>
			<p>L'intérêt de développer ce type de fonctionnalité est de proposer <span>une interface de contôle homme/machine</span> optimisée dans des conditions nécessitant ces dites fonctionnalités.</p>
			<p>Vous trouverez donc des articles sur les différentes activités de <span>Trek and Drone</span>, mais également des vidéos sur les "Sorties" de l'équipe pour les divers tests nécessaires au développement.</p>
			
		</div>
		<?php include('includes/slider.php');?>
		<div id="shadowslider">
			<img class="shadowslider" src="img/shadow.png" alt="ombre">
		</div>
		<div id="jumpers">
			<div id="jump1" class="alljump">
				<a href="/developpement#developpement"><img class="picto" src="img/pictos/devlab.png" alt="picto"></a>
				<h2>Dev Lab</h2>
				<p>Le laboratoire ! Place aux expériences diverses et variées où nous menons des recherches sur les nouvelles technologies sensorielles pouvant être adaptées au concept <span>Trek and Drone</span>. Nous utilisons principalement des cartes <a href="http://the-raspberry.com/" target="_blank">Raspeberry</a> et <a href="https://www.arduino.cc/" target="_blank">Arduino</a> ainsi que divers éléments nécessaires à leur utilisations comme des puces GPS, Radio Fréquences, écrans tactiles... Quand au langage utilisé, nous sommes principalement sur du <a href="https://www.python.org/" target="_blank">Python</a>.</p>
				<img class="shadowjump" src="img/shadow.png" alt="shadow">
			</div>
			<div id="jump2" class="alljump">
				<a href="/drones#drones"><img class="picto" src="img/pictos/drone.png" alt="picto"></a>
				<h2>Drones</h2>
				<p>Quand ici nous parlons de capture vidéo, il s'agit implicitement des drones qui permettent ces captures avec des caméras embarquées, elles aussi dirigeables par télécommande. <span>Que sont ces drones ?</span> Quel est le rendu d'une telle caméra ? Et surtout qu'est ce qui différencie ces captures de ce que nous connaissons déjà ? Ces questions trouveront leurs réponses dans la partie <span>développement</span> où seront présentés les drones ainsi que les vidéos correspondantes.</p>
				<img class="shadowjump" src="img/shadow.png" alt="shadow">
			</div>
			<div id="jump3" class="alljump">
				<a href="/sorties#nos-sorties"><img class="picto" src="img/pictos/test.png" alt="picto"></a>
				<h2>Tests</h2>
				<p>C'est ici que notre travail prend tout son sens. Avant de partir en sortie avec une équipe de pilotes <span>Off Road</span>, il faut vérifier ce qui fonctionne et surtout ce qui ne fonctionne pas. Pour ce faire, selon les besoins des tests, nous cherchons régulièrement des lieux peu communs en termes de typographie ou d'accessibilité réseau. Cette étape fait office d'ascenceur émotionnel dans l'équipe car les echecs et les victoires s'enchâinent à <span>la façon des montagnes russes</span> !</p>
				<img class="shadowjump" src="img/shadow.png" alt="shadow">
			</div>
		</div>
	</main>
	<!-- <script>
	setTimeout(montrer, 500);
	function montrer(){
		document.getElementById("owl-slider").style.display= "block";
	}
	</script> -->
	
<?php require('includes/footer.php');?>

