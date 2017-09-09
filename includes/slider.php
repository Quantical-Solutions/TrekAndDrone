<?php 

getArticles();

?>

	<div id="logoslider">
		<img src="img/trek&dronewheel.png" alt="logo slider">
	</div>
	<div id="owl-slider" class="slide owl-carousel">

<?php 	for ($i = 0; $i < count($_SESSION['articles']); $i++) {

		$resume =  substr($_SESSION['articles'][$i]['para1'],0,300)."...";

		if ($_SESSION['articles'][$i]['category'] == "Véhicules") {
	
			echo '<div class="item">
					<img class="img1" src="gestion/articles/Véhicules/' . $_SESSION['articles'][$i]['img3'] . '" alt="img article">
					<div class="slidercontent">
						<h1>' . $_SESSION['articles'][$i]['titre'] . '</h1>
						<h2>Catégorie : ' . $_SESSION['articles'][$i]['category'] . '<span>, écrit ' . $_SESSION['articles'][$i]['date'] . '.</span></h2>
						' . $resume . '
						<a class="readmore" href="/vehicules#' . $_SESSION['articles'][$i]['id'] . '" title="Lire la suite">Lire la suite</a>
					</div>
					<div class="sideimg">
						<img class="img2" src="gestion/articles/Véhicules/' . $_SESSION['articles'][$i]['img1'] . '" alt="img 2 article">
					</div>
				</div>';
			}

			if ($_SESSION['articles'][$i]['category'] == "Développement") {
	
			echo '<div class="item">
					<img class="img1" src="gestion/articles/Développement/' . $_SESSION['articles'][$i]['img3'] . '" alt="img article">
					<div class="slidercontent">
						<h1>' . $_SESSION['articles'][$i]['titre'] . '</h1>
						<h2>Catégorie : ' . $_SESSION['articles'][$i]['category'] . '<span>, écrit ' . $_SESSION['articles'][$i]['date'] . '.</span></h2>
						' . $resume . '
						<a class="readmore" href="/developpement#' . $_SESSION['articles'][$i]['id'] . '" title="Lire la suite">Lire la suite</a>
					</div>
					<div class="sideimg">
						<img class="img2" src="gestion/articles/Développement/' . $_SESSION['articles'][$i]['img1'] . '" alt="img 2 article">
					</div>
				</div>';
			}

			if ($_SESSION['articles'][$i]['category'] == "Organisation") {
	
			echo '<div class="item">
					<img class="img1" src="gestion/articles/Organisation/' . $_SESSION['articles'][$i]['img3'] . '" alt="img article">
					<div class="slidercontent">
						<h1>' . $_SESSION['articles'][$i]['titre'] . '</h1>
						<h2>Catégorie : ' . $_SESSION['articles'][$i]['category'] . '<span>, écrit ' . $_SESSION['articles'][$i]['date'] . '.</span></h2>
						' . $resume . '
						<a class="readmore" href="/organisation#' . $_SESSION['articles'][$i]['id'] . '" title="Lire la suite">Lire la suite</a>
					</div>
					<div class="sideimg">
						<img class="img2" src="gestion/articles/Organisation/' . $_SESSION['articles'][$i]['img1'] . '" alt="img 2 article">
					</div>
				</div>';
			}

			if ($_SESSION['articles'][$i]['category'] == "Trek") {
	
			echo '<div class="item">
					<img class="img1" src="gestion/articles/Trek/' . $_SESSION['articles'][$i]['img3'] . '" alt="img article">
					<div class="slidercontent">
						<h1>' . $_SESSION['articles'][$i]['titre'] . '</h1>
						<h2>Catégorie : ' . $_SESSION['articles'][$i]['category'] . '<span>, écrit ' . $_SESSION['articles'][$i]['date'] . '.</span></h2>
						' . $resume . '
						<a class="readmore" href="/trek#' . $_SESSION['articles'][$i]['id'] . '" title="Lire la suite">Lire la suite</a>
					</div>
					<div class="sideimg">
						<img class="img2" src="gestion/articles/Trek/' . $_SESSION['articles'][$i]['img1'] . '" alt="img 2 article">
					</div>
				</div>';
			}

			if ($_SESSION['articles'][$i]['category'] == "Enduro") {
	
			echo '<div class="item">
					<img class="img1" src="gestion/articles/Enduro/' . $_SESSION['articles'][$i]['img3'] . '" alt="img article">
					<div class="slidercontent">
						<h1>' . $_SESSION['articles'][$i]['titre'] . '</h1>
						<h2>Catégorie : ' . $_SESSION['articles'][$i]['category'] . '<span>, écrit ' . $_SESSION['articles'][$i]['date'] . '.</span></h2>
						' . $resume . '
						<a class="readmore" href="/enduro#' . $_SESSION['articles'][$i]['id'] . '" title="Lire la suite">Lire la suite</a>
					</div>
					<div class="sideimg">
						<img class="img2" src="gestion/articles/Enduro/' . $_SESSION['articles'][$i]['img1'] . '" alt="img 2 article">
					</div>
				</div>';
			}

			if ($_SESSION['articles'][$i]['category'] == "Autres") {
	
			echo '<div class="item">
					<img class="img1" src="gestion/articles/Autres/' . $_SESSION['articles'][$i]['img3'] . '" alt="img article">
					<div class="slidercontent">
						<h1>' . $_SESSION['articles'][$i]['titre'] . '</h1>
						<h2>Catégorie : ' . $_SESSION['articles'][$i]['category'] . '<span>, écrit ' . $_SESSION['articles'][$i]['date'] . '.</span></h2>
						' . $resume . '
						<a class="readmore" href="/autres#' . $_SESSION['articles'][$i]['id'] . '" title="Lire la suite">Lire la suite</a>
					</div>
					<div class="sideimg">
						<img class="img2" src="gestion/articles/Autres/' . $_SESSION['articles'][$i]['img1'] . '" alt="img 2 article">
					</div>
				</div>';
			}
		}

?>	</div>

		
	