<?php
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
<!-- Ici le header  -->
			<?php include './views/inc/header_user_comments.php'; ?>

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
						<form action="../controlers/form_user_comments.php" method="post">
							<div class="form-group">
								<label for="exampleFormControlText">Votre nom :</label>
								<input class="form-control" name="name" id="exampleFormControlText">
							</div>
							<div class="form-group">
								<label for="exampleFormControlTextarea1">Votre commentaire</label>
								<textarea class="form-control" name="commentary" id="exampleFormControlTextarea1" rows="20"></textarea>
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