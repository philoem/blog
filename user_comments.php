<?php
	// Démarrage de la session
	session_start();

	require_once('backend/model.php');
	$db = dbConnect();
	if (isset($_POST['name']) AND (isset($_POST['commentary']))) {
		$reponse = $db->query('SELECT name, commentary, DATE_FORMAT(date_commentary, \'%d/%m/%Y à %Hh%imin%Ss\') AS date_commentary FROM commentarys ORDER BY date_commentary DESC LIMIT 0, 5');
		while ($donnees = $reponse->fetch()) {
			echo'<p><strong>'.htmlspecialchars($donnees['name']). ' publié le ' .htmlspecialchars($donnees['date_commentary']).'</p></strong><p>'.htmlspecialchars($donnees['commentary']).'</p>';
		}

		$reponse->closeCursor();
	}
?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link href="style.css" rel="stylesheet" type="text/css" >
		<title>Blog</title>
	</head>
	<body>
		<div class="container-fluid">
			<header>
				<nav class="navbar fixed-top navbar-dark bg-info">
					<div class="navbar-brand" id="content_header">
						<h1>Laissez vos commentaires</h1>
						<a href="#" id="paragraph_header">Billet simple pour l'Alaska</a>
					</div>
				</nav>
			</header>

			<div class="container">	
				<div class="row">
					<div class="card w-50 col">
						<div class="card-body">
							<h5 class="card-title">
								<?php 
									$reponse = $db->query('SELECT title FROM book ORDER BY date_billet DESC LIMIT 0, 1');
									while ($donnees = $reponse->fetch()) {
										echo '<p><strong>'.htmlspecialchars($donnees['title']).'</strong></p>';
									}
									$reponse->closeCursor();
								?>
							</h5>
							<p class="card-text">
								<?php 
									$reponse = $db->query('SELECT billet FROM book ORDER BY date_billet DESC LIMIT 0, 1');
									while ($donnees = $reponse->fetch()) {
										echo '<p>'.htmlspecialchars($donnees['billet']).'</p>';
									}
									$reponse->closeCursor();
								?>
							</p>
						</div>
					</div>
				
					<div class="col-xs-6 col-lg-6">
						<h3>Création d'un nouveau commentaire:</h3>
						<form action="#" method="post">
							<div class="form-group">
								<label for="exampleFormControlTextarea1">Mon commentaire</label>
								<textarea class="form-control" name="comment_billet" id="exampleFormControlTextarea1" rows="20"></textarea>
							</div>
							<button type="reset" class="btn btn-danger">Tout effacer</button>
							<button type="submit" class="btn btn-primary">Validation du commentaire</button>
						</form>
					</div>
				</div>
			</div>

		</div>
	</body>
</html>