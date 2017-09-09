<?php require('includes/header.php'); ?>

<style>

	#l2{
		color: orange!important;
	}

</style>
	<main id="team">
		<div id="zoomIn">
	        <div id="closeBtn">
	          <span style="margin-right: 20px;">Fermer</span>
	          <span id="btnX" onclick="closeZoom()">&times;</span>
	        </div>
	        <div id="imgZoom">
	          <img id="zoomImg" src="" alt="zoom" title="Zoom sur l'image sélectionnée">
	        </div>
	    </div>
		<div id="prezteam">
			<h1>Présentation de l'équipe</h1>
			<p>L'équipe <span>Trek and Drone</span> se compose de trois membres que sont Duy, Julien et Fred. <span>Duy</span> est pilote de Drone certifié (Applicadrone CEO) et formateur en pilotage aussi bien pour les professionnels que le grand publique. <span>Julien</span> est développeur, graphiste/vidéaste et web designer. C'est lui qui est à l'origine de l'identité visuelle de Trek and Drone, mais également dans la production et l'édition de média audiovisuel. <span>Fred</span> est développeur fullstack et assembleur, c'est lui qui s'occupe en grande partie de l'implémentation du développement sur Raspberry et Arduino.</p>
		</div>
		
		<div id="membres">
			<div id="duy">
				<div id="duyimg" class="prezimg">
					<img class="zoom" src="img/team/perso_duy.png" alt="duyimg" title="duyimg">
				</div>
				<div id="duyprez" class="preztext">
					<h2>Duy | Télépilote</h2>
					<span><u>Compétences :</u></span>
					<p>Pilote de Drones agréé par la DGAC.<br>
					Réalisateur / Cadreur mobile.</p>
					<span><u>Activité :</u></span>
					<p>Ingénieur en Gestion de Production.<br>Fondateur d'<a href="applicadrone.fr">Applicadrone</a>.<br>Formateur en pilotage de drones, animateur ateliers<span>minidrones</span>.</p>
				</div>
			</div>
			<img id="shadowprezteam" class="shadowprez" src="img/shadow.png" alt="ombre">
			<div id="julien">
				<div  id="julienimg" class="prezimg">
					<img class="zoom" src="img/team/perso_julien.png" alt="julienimg" title="julienimg">
				</div>
				<div id="julienprez" class="preztext">
					<h2>Julien | Motion Designer</h2>
					<span><u>Compétences :</u></span>
					<p>Outils de création : Adobe CC (Photoshop, Illustrator, InDesign, Premiere, AfterEffect), 3D (Cinema 4D, AutoDesk, Fusion), Impression 3D (Repetir, Zbrush).</p>
					<span><u>Activité :</u></span>
					<p>Conception Graphique, Assemblage, Développement, Web Design, UX Design et Motion Design.<br>Modeler 3D : Coneption d'objets et de structures virtuel(le)s/physiques.<br>Réalisateur / COncepteur Audiovisuel</p>
				</div>
			</div>
			<img id="shadowprezteam" class="shadowprez" src="img/shadow.png" alt="ombre">
			<div id="fred">
				<div  id="fredimg" class="prezimg">
					<img class="zoom" src="img/team/perso_fred.png" alt="fredimg" title="fredimg">
				</div>
				<div id="fredprez" class="preztext">
					<h2>Fred | Développeur</h2>
					<span><u>Compétences :</u></span>
					<p>Langages développés : C, Python, PHP | MySQL, HTML | CSS, JavaScript.<br>Outils de développement : Raspberry Pi, Arduino.</p>
					<span><u>Activité :</u></span>
					<p>Développement de fonctionnalités et d'implémentation de matrices sur les drones.<br>Assemblage et équipement des véhicules destinés aux tests et aux sorties de l'équipe.<br>Développement et intégration web.</p>
				</div>
			</div>
			<img id="shadowprezteam" class="shadowprez" src="img/shadow.png" alt="ombre">
		</div>
	</main>
<?php require('includes/footer.php');?>