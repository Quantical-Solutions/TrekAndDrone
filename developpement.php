<?php require('includes/header.php'); ?>

<style>

	#prepa0, #prepa2{
		color: orange!important;
	}

</style>

	<main id="developpement">
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
          <img class="picto" src="img/pictos/dev.png">
        </div>
        <h1>Développement</h1>
        <p>Le laboratoire ! Place aux expériences diverses et variées où nous menons des recherches sur les nouvelles technologies sensorielles pouvant être adaptées au concept <span>Trek and Drone</span>. Nous utilisons principalement des cartes <a href="http://the-raspberry.com/">Raspeberry</a> et <a href="https://www.arduino.cc/">Arduino</a> ainsi que divers éléments nécessaires à leur utilisations comme des puces GPS, Radio Fréquences, écrans tactiles... Quand au langage utilisé, nous sommes principalement sur du <a href="https://www.python.org/">Python.</a></p>
      </div>
      <img class="shadow" src="img/shadow.png" alt="ombre">
		<?php
getArticles();

for ($i = 0; $i < count($_SESSION['articles']); $i++) {
  
    if ($_SESSION['articles'][$i]['category'] == "Développement") {
        
        echo '
        <div class="contentart">
          <div class="article" id="' . $_SESSION['articles'][$i]['id'] . '">
            <input type="hidden" name="' . $_SESSION['articles'][$i]['titre'] . '" id="' . $_SESSION['articles'][$i]['titre'] . '">
            <h1>' . $_SESSION['articles'][$i]['titre'] . '</h1>
            <h4>écrit ' . $_SESSION['articles'][$i]['date'] . '</h4>
            
            <img class="zoom topimg" src="gestion/articles/Développement/' . $_SESSION['articles'][$i]['img3'] . '" alt="' . $_SESSION['articles'][$i]['img3'] . '" title="' . $_SESSION['articles'][$i]['img3'] . '">
            <div class="allsectionsart">
              ' . $_SESSION['articles'][$i]['para1'] . '
              <img class="img2article zoom" src="gestion/articles/Développement/' . $_SESSION['articles'][$i]['img1'] . '" alt="' . $_SESSION['articles'][$i]['img1'] . '">

              
            </div>
            <div class="spancit">
              <span><img src="img/quotes-left.png"></span>
              <span class="citation">' . $_SESSION['articles'][$i]['citation'] . '</span>
              <span><img src="img/quotes-right.png"></span>
            </div>
            <div class="allsectionsart">
              <img class="img3article zoom" src="gestion/articles/Développement/' . $_SESSION['articles'][$i]['img2'] . '" alt="' . $_SESSION['articles'][$i]['img2'] . '">
              
              ' . $_SESSION['articles'][$i]['para2'] . '
            </div>
            
          </div>
          <img class="shadow" src="img/shadow.png" alt="ombre">
          
        </div>';
    }

}

?>
    <ul class="social-nav model-3d-0 vidul">
                <li><img class="logoshare" src="img/logoshare.png" alt="partager"></li>
                <li><span>Partagez cette page sur vos réseaux sociaux : </span></li>
                  <li><a href="https://twitter.com/home?status=http://www.trekandrone.com/developpement" class="twitter" target="_blank">
                      <div class="front"><i class="fa fa-twitter"></i></div>
                      <div class="back"><i class="fa fa-twitter"></i></div></a>
                  </li>
                  <li><a href="https://www.facebook.com/sharer/sharer.php?u=http%3A//www.trekandrone.com/developpement" class="facebook" target="_blank">
                      <div class="front"><i class="fa fa-facebook"></i></div>
                      <div class="back"><i class="fa fa-facebook"></i></div></a>
                  </li>
                  <li><a href="https://plus.google.com/share?url=http%3A//www.trekandrone.com/developpement" class="google-plus" target="_blank">
                      <div class="front"><i class="fa fa-google-plus"></i></div>
                      <div class="back"><i class="fa fa-google-plus"></i></div></a>
                  </li>
                  <li><a href="https://www.linkedin.com/shareArticle?mini=true&url=http%3A//www.trekandrone.com/developpement&title=Trek & Drone-title&summary=&source=" class="linkedin" target="_blank">
                      <div class="front"><i class="fa fa-linkedin"></i></div>
                      <div class="back"><i class="fa fa-linkedin"></i></div></a>
                  </li>
                  <li><a href="https://pinterest.com/pin/create/button/?url=http%3A//www.trekandrone.com/developpement&media=&description=article" class="pinterest" target="_blank">
                      <div class="front"><i class="fa fa-pinterest"></i></div>
                      <div class="back"><i class="fa fa-pinterest"></i></div></a>
                  </li>
              </ul>
	</main>
<?php require('includes/footer.php');?>