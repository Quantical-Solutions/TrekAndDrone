<?php require('includes/header.php'); ?>

<style>

	#l3 {
		color: orange!important;
	}

</style>

	<main id="drones">
	<div id="zoomIn">
        <div id="closeBtn">
          <span style="margin-right: 20px;">Fermer</span>
          <span id="btnX" onclick="closeZoom()">&times;</span>
        </div>
        <div id="imgZoom">
          <img id="zoomImg" src="" alt="zoom" title="Zoom sur l'image sélectionnée">
        </div>
    </div>
	<div class="pictopart">
		<div>
			<img class="picto" src="img/pictos/drone.png">
		</div>
		<p style="font-size: 2.4em; font-family: 'Passion One'; margin-bottom: 0;">Drones / Vidéos</p>
		<p>Dans cette partie du site <a href="http://www.trekandrone.com">Trek & Drone </a> sont diffusées les vidéos de nos sorties sur le terrain lors des différents tests de drones, ainsi que les sorties de groupe des différentes catégories, machines, ou bien sports, durant lesquels nous recherchons de nouveaux type de capture d'images dans des conditions de <span>dynamiques de mouvements</span> extrêmes.</p>
	</div>
	<img class="shadow" src="img/shadow.png" alt="ombre">
	<?php getVideos(); 

	for ($i = 0; $i < count($_SESSION['videos']); $i++) {
		
		echo '
		<div class="videocontent" id="' . $_SESSION['videos'][$i]['titre'] . '">
			<div class="logovideo">
				<img src="img/trek&dronewheel.png">
			</div>
			<div class="videotitre">
				<h1>' . $_SESSION['videos'][$i]['titre'] . '</h1>
				<h4>Posté ' . $_SESSION['videos'][$i]['date'] . '</h4>
			</div>
			<section>
				<div class="dronepart">
					<h2>' . $_SESSION['videos'][$i]['drone'] . '</h2>
					<img class="zoom" src="gestion/videos/' . $_SESSION['videos'][$i]['imgd'] . '" alt="drone" titre="' . $_SESSION['videos'][$i]['drone'] . '">
					' . $_SESSION['videos'][$i]['dronecontent'] . '
				</div>
				<div class="videopart">
					' . $_SESSION['videos'][$i]['videocode'] . $_SESSION['videos'][$i]['videocontent'] . '
				</div>
			</section>
		</div>
		<img class="shadow" src="img/shadow.png" alt="ombre">';
	}?>
				
	            <ul class="social-nav model-3d-0 vidul">
	            	<li><img class="logoshare" src="img/logoshare.png" alt="partager"></li>
	            	<li><span>Partagez cette page sur vos réseaux sociaux : </span></li>
	                <li><a href="https://twitter.com/home?status=http://www.trekandrone.com/drones" class="twitter" target="_blank">
	                    <div class="front"><i class="fa fa-twitter"></i></div>
	                    <div class="back"><i class="fa fa-twitter"></i></div></a>
	                </li>
	                <li><a href="https://www.facebook.com/sharer/sharer.php?u=http%3A//www.trekandrone.com/drones" class="facebook" target="_blank">
	                    <div class="front"><i class="fa fa-facebook"></i></div>
	                    <div class="back"><i class="fa fa-facebook"></i></div></a>
	                </li>
	                <li><a href="https://plus.google.com/share?url=http%3A//www.trekandrone.com/drones" class="google-plus" target="_blank">
	                    <div class="front"><i class="fa fa-google-plus"></i></div>
	                    <div class="back"><i class="fa fa-google-plus"></i></div></a>
	                </li>
	                <li><a href="https://www.linkedin.com/shareArticle?mini=true&url=http%3A//www.trekandrone.com/drones&title=Trek & Drone-title&summary=&source=" class="linkedin" target="_blank">
	                    <div class="front"><i class="fa fa-linkedin"></i></div>
	                    <div class="back"><i class="fa fa-linkedin"></i></div></a>
	                </li>
	                <li><a href="https://pinterest.com/pin/create/button/?url=http%3A//www.trekandrone.com/drones&media=&description=article" class="pinterest" target="_blank">
	                    <div class="front"><i class="fa fa-pinterest"></i></div>
	                    <div class="back"><i class="fa fa-pinterest"></i></div></a>
	                </li>
	            </ul>
	</main>
<?php require('includes/footer.php');?>