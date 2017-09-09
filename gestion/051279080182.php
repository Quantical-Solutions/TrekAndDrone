<?php
newMailId();
deleteIp();
getArticle();
?>
<div id="gestion">
	<header>
		<div id="logobefore">
			<div class="spin">
    			<div class="one spin-one"></div>
    			<div class="two spin-two"></div>
    			<div class="three spin-one"></div>
  			</div>
			<p>GESTION DE CONTENU</p>
		</div>
		<div id="logo">	
			<img src="../img/trek&drone.png" alt="logo">
		</div>
		<div id="logoafter">
			<h2>Bonjour <span><?=ucwords($_SESSION['pseudo'])?></span></h2>
			<p>Dernière connexion : <span id="spandate"><?=$_SESSION['lastcon']?></span>.</p>
			<a href="http://www.trekandrone.com/deconnexion"><button name="discon">Déconnexion</button></a>
			<?php include('theme_form.php');?>
		</div>
	</header>
	<main>
		<aside>
			<div id="liste">
				<ul>
					<li class="liFocus" id="li1" onclick="li1()" onmouseover="hoverLi(this)" onmouseout="normalLi(this)">ACCUEIL</li>
					<li class="li" id="li2" onclick="li2()" onmouseover="hoverLi(this)" onmouseout="normalLi(this)">EDITION</li>
					<li class="li" id="li3" onclick="li3()" onmouseover="hoverLi(this)" onmouseout="normalLi(this)">MODIFIER</li>
					<li class="li" id="li4" onclick="li4()" onmouseover="hoverLi(this)" onmouseout="normalLi(this)">MESSAGES</li>
					<li class="li" id="li5" onclick="li5()" onmouseover="hoverLi(this)" onmouseout="normalLi(this)">NEWSLETTER</li>
					<li class="li" id="li6" onclick="li6()" onmouseover="hoverLi(this)" onmouseout="normalLi(this)">VIDEOS</li>
					<li class="li" id="li7" onclick="li7()" onmouseover="hoverLi(this)" onmouseout="normalLi(this)">ETAT BDD</li>
				</ul>
			</div>
			<div id="basliste">
				<img src="../img/C.jpg" alt="bas liste" title="bas liste">
			</div>
		</aside>
		<section>
			<?php getAllArt(); ?>
			<div id="accueil">
				<h1>Gestion de la l'administration du site <a href="http://www.trekandrone.com" title="site" target="_blank">Trek & Drone</a></h1>
				<p>C'est ici que la gestion de vos contenus sera traitée. Vous avez accès, en tant qu'administrateur, à la consultation des messages envoyés depuis la section "contact" du site <a href="http://www.trekandrone.com" title="site" target="_blank">Trek & Drone</a>, mais également à l'édition et la modification des articles postés dans les pages du site correspondant aux sous menus de la navigation principale.</p><br>
				<p>Pour plus de rensignements sur le fonctionnement de la partie "gestion" du site <a href="http://www.trekandrone.com" title="site" target="_blank">Trek & Drone</a>, veuillez nous <a href="mailto:fred.geffray@gmail.com" title="contact">contacter</a> par email.</p><br>
				<h2>Navigation</h2>
				<p>Pour accéder aux différentes parties permettant la gestion des différents contenu, vous devez naviguer dans la partie gauche de la page de gestion.</p><br>
				<p>Vous y trouverez l'onglet "Edition" qui vous permettra d'écrire vos nouveaux articles (faire attention à bien choisir la catégorie de l'article afin que celui-ci apparaisse sur la bonne page du site), l'onglet "Modifier" qui vous donnera accès à la modification de l'article de votre choix, listé par catégorie (attention, seule la date d'édition ne pourra çetre changée), l'onglet "Messages" donnant accès aux messages reçu depuis la partie "contact" du site <a href="http://www.trekandrone.com", title="site" target="_blank">Trek & Drone</a> auxquels vous pourrez répondre directement, dont la copie sera envoyé par mail au(x) gestionnaire(s) du site. Vous avez également accès à la partie "Newsletter" vous permettant d'éditer vos newsletter afin de les stocker dans la base de données. Et enfin la partie "Etat BDD" (non disponible sur mobile) qui vous rend compte de l'état de la base de données par table, vous permettant ainsi de vérifier les modifications ou éditions, ainsi que les adresses IP bannies.</p>
			</div>
			<div id="ecrire">
				<form method="post" id="formecrire" name="formecrire" action="article-valide" enctype="multipart/form-data">
				<div id="partieEdition">
					<div>
						<h1>Rédiger un article</h1>
						<p>Ici vous pouvez éditer les différentes parties constituant l'article. La date d'édition sera implémentée automatiquement à la validation de l'article édité.</p>
						<p>Tous les champs doivent <strong>obligatoirement</strong> être remplis.</p>
					</div>
					<div id="catart">
						<p>Choisissez la catégorie dans laquelle l'article sera posté.</p>
						<label>Sélectionnez une catégorie : </label>
						<select name="category" form="formecrire" required>
							<option style="color:lightgrey;"  value="null">Sélectionner...</option>
							<option style="color:red;" value="Véhicules">Véhicules</option>
							<option style="color:red;" value="Développement">Développement</option>
							<option style="color:red;" value="Organisation">Organisation</option>
							<option style="color:orange;" value="Trek">Trek</option>
							<option style="color:orange;" value="Enduro">Enduro</option>
							<option style="color:orange;" value="Autres">Autres</option>
						</select>
					</div>
					<div id="alignsliderchoix">
						<label>Image à la une</label>
						<p>FIchiers en <span>.jpg</span> ou <span>.png</span> seulement ( taille : <span>1280x450</span> ).</p>
						<div id="choixslider">
							<div class="alignsliderchoix">
								<input type="file" name="img3" required>
							</div>
						</div>
					</div>
					<div id="title">
						<label>Titre</label>
						<input id="titre" type="text" name="titre" value="" required>
					</div>
					<div id="img1">
						<label>Image 1</label>
						<p>FIchiers en <span>.jpg</span> ou <span>.png</span> seulement ( taille : <span>1280x940</span> ).</p>
						<input type="file" name="img1" required>
						
					</div>
					<div class="edition">
						<label>Texte 1</label>
						<textarea name="editor1" id="editor1" rows="10" cols="80" required></textarea>
					</div>
					<div id="divtextvid" class="edition">
						<label>Citation</label>
						<textarea name="citation" id="citation" rows="10" cols="80" required></textarea>
					</div>
					<div id="img2">
						<label>Image 2</label>
						<p>FIchiers en <span>.jpg</span> ou <span>.png</span> seulement ( taille : <span>1280x940</span> ).</p>
						<input type="file" name="img2" required>
						
					</div>
					<div class="edition">
						<label>Texte 2</label>
						<textarea name="editor2" id="editor2" rows="10" cols="80" required></textarea>
					</div>
					<div id="val">
						<p>Ne valider qu'une fois tous les champs remplis.</p>
						<label class="labelconf">Confirmer pour valider</label>
						<input id="checkbox" type="checkbox" name="confirm" required>
						<button type="submit">VALIDER</button>
					</div>
				</div>
			</form>
			</div>
			<div id="modifier">
				<div id="partieModif">
					<div>
						<h1>Modifier un article</h1>
						<p>Ici vous pouvez modifier les différentes parties constituant un article déjà édité. Seule la date d'édition ne pourra être modifiée.</p>
						<p>Tous les champs doivent <strong>obligatoirement</strong> être remplis.</p>
						<p>Les images ne peuvent être changées qu'en passant par le serveur <span>FTP</span> hébergeant le site <a href="http://www.trekandrone.com">Trek & Drone</a>, en faisant attention de renommer et placer les nouvelles images de la même façon que l'image à remplacer, dans le dossier correspondant.</p>
					</div>
					<div id="catart2">
						<p>Choisissez la catégorie dans laquelle l'article à modifier a été posté.</p>
						<label>Sélectionnez une catégorie : </label>
						<select id="selectCat" onchange="selectArtCat()">
							<option style="color:lightgrey;"  value="null">Sélectionner...</option>
							<option style="color:red;" value="Véhicules">Véhicules</option>
							<option style="color:red;" value="Développement">Développement</option>
							<option style="color:red;" value="Organisation">Organisation</option>
							<option style="color:orange;" value="Trek">Trek</option>
							<option style="color:orange;" value="Enduro">Enduro</option>
							<option style="color:orange;" value="Autres">Autres</option>
						</select>
					</div>
					<div id="choixart">
						<p>Choisissez l'article à modifier.</p>
						<label>Sélectionnez un article : </label>
						<?php showArtModif(); ?>
						<button style="margin-top: 30px; padding: 3px 10px;" onclick="resetartSel()">Effacer l'article affiché</button type="reset"
						disabled="disabled">
						<p>Veuillez cliquer avant de sélectionner un autre article à modifier. Dans le cas contraire, les contenus <span>Titre 1</span> et <span>Titre 2</span> s'afficheraient consécutivement dans les éditeurs de contenus.</p>
					</div>
					<form method="post" id="formmodif" name="formmodif" action="article-modif" enctype="multipart/form-data">
					<div id="title">
						<label>Titre</label>
						<input id="idModif" type="hidden" name="artId" value="">
						<input id="titreModif" type="text" name="titre" value="">
					</div>
					
					<div class="edition" id="edit1" style="width: 100%;">
						<label>Texte 1</label>
						<textarea name="editor3" id="editor3" rows="10" cols="80" value=""></textarea>
					</div>
					<div id="divtextvid" class="edition">
						<label>Citation</label>
						<textarea name="edicit" id="edicit" rows="10" cols="80" required></textarea>
					</div>
					<div class="edition" id="edit2" style="width: 100%;">
						<label>Texte 2</label>
						<textarea name="editor4" id="editor4" rows="10" cols="80" value=""></textarea>
					</div>
					<div id="val">
						<p>Ne valider qu'une fois tous les champs remplis.</p>
						<label class="labelconf">Confirmer pour valider</label>
						<input id="checkbox" type="checkbox" name="confirm" required>
						<button type="submit">VALIDER</button>
					</div>
					</form>
				</div>
			</div>
			<div id="messages">
				<div id="partieMessage">
					<div>
						<h1>Consulter les messages</h1>
						<p>Dans cette section vous pourrez consulter les messages reçus depuis la page "contact" du site <a href="http://www.trekandrone.com" target="_blank">Trek & Drone</a>, et y répondre en cliquant sur l'adresse mail du message sélectionné.</p>
					</div>
					<?php creaTableMail() ?>
					<div>
						<div id="mailhead">
							<div>
								<label>Nom</label>
								<input id="messNom" type="text" name="Nom" readonly="readonly" value=""></input>
							</div>
							<div>
								<label>Date</label>
								<input id="messDate" type="text" name="date" readonly="readonly" value=""></input>
							</div>
							<div>
								<label>Email</label>
								<input id="messMail" type="text" name="email" readonly="readonly" value=""></input>
							</div>
						</div>
						<div id="message">
							<label>Message</label>
							<textarea id="messMess" readonly="readonly" value=""></textarea>
						</div>
						<div id="btnsMail" style="display: none;">
							<a id="repondre" href=""><button type="button">Répondre</button></a>
							<a id="fermer" href="#messages"><button type="reset" onclick="resetMailShown()">Fermer</button></a>
						</div>
						<div id="lire"></div>
					</div>
				</div>
			</div>
			<div id="newsletter" style="display: none;">
				<form method="post" id="formNl" name="formNl" action="newsletter-valide" enctype="multipart/form-data">
				<div id="partieNl">				
					<div>
						<h1>Rédiger une Newsletter</h1>
						<p>Ici vous pouvez éditer les Newsletters. La date d'édition sera implémentée automatiquement à la validation de la <span>Newsletter</span> éditée.<br>Vous pouvez également modifier une <span>Newsletter</span> en cliquant sur le bouton <i>"Newsletter à modifier"</i> ci-dessous.</p>
						<p>Tous les champs doivent <strong>obligatoirement</strong> être remplis.</p>
					</div>
					<div id="nlmod">
						<button style="margin: 0;" id="nlmodbtn" type="button" onclick="showNlMod()">Newsletter à modifier</button>
					</div>
					<?php showNewsModif(); ?>
					<div id="titleNl">
						<input id="idnlmodifsend" type="hidden" name="idnlmodifsend" value="">
						<label>Titre</label>
						<input id="idnlmodif" type="hidden" name="idnlmodif" value="">
						<input id="titreNews" style="border: 1px solid black;" type="text" name="titreNews" value="" required>
					</div>					
					<div id="editNl" style="width: 100%;">
						<label>Newsletter</label>
						<textarea name="editor5" id="editor5" rows="10" cols="80" required></textarea>
					</div>
					<div id="valNl">
						<button id="btnResetNl" style="padding: 3px 5px!important;" type="reset" onclick="resetNl()">Effacer la Newsletter</button>
						<p>Ne valider qu'une fois tous les champs remplis.</p>
						<label class="labelconf">Confirmer pour enregistrer et envoyer la newsletter</label>
						<input id="checkbox" type="checkbox" name="confirm" required>
						<button type="submit">ENVOYER</button>
					</div>
				</div>
			</form>
			</div>
			<div id="videos">
				<form method="post" id="formvideo" name="formvideo" action="video-valide" enctype="multipart/form-data">
				<div id="partieVideo">
					<div>
						<h1>Poster une vidéo</h1>
						<p>Ici vous pouvez éditer ou modifier les vidéos qui seront diffusées dans la partie <span>Drones / Vidéos</span>.</p>
						<p>Tous les champs doivent <strong>obligatoirement</strong> être remplis.</p>
					</div>
					<div id="vidmod">
						<button style="margin: 0;" id="vidmodbtn" type="button" onclick="showVidMod()">Vidéo à modifier</button>
					</div>
					<?php showVideoModif(); ?>
					<div id="title" style="margin-bottom: 1%!important">
						<input id="idvidmodifsend" type="hidden" name="idvidmodifsend" value="">
						<p>Entrez le titre du post.</p>
						<input id="idvidmodif" type="hidden" name="idvidmodif" value="">
						<label>Titre</label>
						<input id="titredrone" type="text" name="titredrone" value="" required>
					</div>
					<div id="titledrone">
						<p>Entrez le modèle du Drone à l'origine de la capture vidéo.</p>
						<label>Drone</label>
						<input id="drone" type="text" name="drone" value="" required>
					</div>
					<div class="edition">
						<label>Contenu Drone</label>
						<textarea name="editor6" id="editor6" rows="10" cols="80" required></textarea>
					</div>
					<div id="imgd">
						<label>Image Drone</label>
						<p>FIchiers en <span>.jpg</span> ou <span>.png</span> seulement ( taille : <span>1280x940</span> ).</p>
						<input id="imgdid" type="file" name="imgd" required>
					</div>
					<div id="divtextvid" class="edition">
						<p>Ici vous devez insérer le code vidéo fourni par le site source pour l'intégration.</p>
						<label>Video Code</label>
						<textarea name="videocode" id="textvid" rows="10" cols="80" required></textarea>
					</div>
					<div class="edition">
						<label>Contenu vidéo</label>
						<textarea name="editor7" id="editor7" rows="10" cols="80" required></textarea>
					</div>
					<div id="val">
						<button id="btnResetVid" style="padding: 3px 5px!important;" type="reset" onclick="resetVid()">Effacer le Post</button>
						<p>Ne valider qu'une fois tous les champs remplis.</p>
						<label class="labelconf">Confirmer pour valider</label>
						<input id="checkbox" type="checkbox" name="confirm" required>
						<button type="submit">VALIDER</button>
					</div>
				</div>
			</form>
			</div>
			<?php backupExp();?>
		</section>
	</main>
</div>
<script type="text/javascript" src="gestion/gestion.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.debug.js"></script> -->

