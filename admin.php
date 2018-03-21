<?php
	require_once('backend/model.php');
	require('AccesControl.php');
	$db = dbConnect();
	
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link href="style.css" rel="stylesheet" type="text/css" >
		<title>Espace administrateur</title>
	</head>
	<body>
		<div class="container-fluid">
			
			<?php include 'views/header_admin.php'; ?>
			
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-4 col-lg-4">
					<h3>Liste des commentaires signalés:</h3>
					<?php
						/**
						 * Affichage des 5 derniers commentaires
						*/

						$db = dbConnect();
										 
						$reponse = $db->query('SELECT name, commentary, DATE_FORMAT(date_commentary, \'%d/%m/%Y à %Hh%imin%Ss\') AS date_commentary FROM commentarys ORDER BY date_commentary DESC LIMIT 0, 5');
						while ($donnees = $reponse->fetch()) {
							echo'<p><strong>'.htmlspecialchars($donnees['name']). ', publié le ' .htmlspecialchars($donnees['date_commentary']).'</p></strong><p>'.htmlspecialchars($donnees['commentary']).'</p>';
						}

						$reponse->closeCursor();
					?>
				</div>
				<div class="col-xs-4 col-lg-4">
					<h3>Liste des derniers billets:</h3>
					<?php
						/**
						 * Affichage des 3 derniers billets
						*/

						$db = dbConnect();
										 
						$reponse = $db->query('SELECT title, billet, DATE_FORMAT(date_billet, \'%d/%m/%Y à %Hh%imin%Ss\') AS date_billet FROM book ORDER BY date_billet DESC LIMIT 0, 3');
						while ($donnees = $reponse->fetch()) {
							echo'<p><strong>'.htmlspecialchars($donnees['title']). ', publié le ' .htmlspecialchars($donnees['date_billet']).'</p></strong><p>'.htmlspecialchars($donnees['billet']).'</p>';
						}

						$reponse->closeCursor();
					?>
				</div>
				<div class="col-xs-4 col-lg-4">
					<h3>Création d'un nouveau billet:</h3>
					<form action="admin_post.php" method="post">
						<div class="form-group">
							<label for="exampleInputTitle">Titre de mon billet</label>
							<input type="text" name="title" class="form-control" id="exampleInputTitle" aria-describedby="titlelHelp">
						</div>
						<div class="form-group">
							<label for="exampleFormControlTextarea1">Mon billet</label>
							<textarea class="form-control" name="billet" id="exampleFormControlTextarea1" rows="20"></textarea>
						</div>
						<button type="reset" class="btn btn-danger">Tout effacer</button>
						<input class="btn btn-primary" type="submit" value="Validation du billet">
					</form>
				</div>
			</div>
		</div>
			
			

		</div>
	</body>
</html>