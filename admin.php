<?php
	session_start();

	require_once('backend/model.php');
	$db = dbConnect();
	/**
	 * Vérifie ici si le prénom et le nom sopnt présents et correspondent à "jean forteroche"
	 */
	if (!isset($_POST['prenom']) OR $_POST['prenom'] != 'jean' AND (!isset($_POST['nom'])) OR $_POST['nom'] != 'forteroche') {
		header('location: login.php');
	}
	else if (!empty($_POST['password']) AND $_POST['password'] === $_POST['confirmPassword']) {
		$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
		$req = $db->prepare('INSERT INTO login_admin(prenom, nom, password, date_login) VALUES(?, ?, ?, NOW())');
		$req->execute(array($_POST['prenom'], $_POST['nom'], $password));	
	}
	if (isset($_POST['remember'])) {
		setcookie('auth',$_POST['prenom'], time() + 3600 * 24 * 3, '/', 'localhost', false, true);
		setcookie('auth',$_POST['nom'], time() + 3600 * 24 * 3, '/', 'localhost', false, true);
	}
	
	
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
			
			<header>
				<nav class="navbar fixed-top navbar-dark bg-primary">
					<div class="navbar-brand" id="content_header">
						<h1>Bienvenu dans votre espace administrateur</h1>
						<a href="logout.php" id="paragraph_header">Se déconnecter</a>
					</div>
				</nav>
			</header>
			
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
							echo'<p><strong>'.htmlspecialchars($donnees['name']). ' publié le ' .htmlspecialchars($donnees['date_commentary']).'</p></strong><p>'.htmlspecialchars($donnees['commentary']).'</p>';
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
							echo'<p><strong>'.htmlspecialchars($donnees['title']). ' publié le ' .htmlspecialchars($donnees['date_billet']).'</p></strong><p>'.htmlspecialchars($donnees['billet']).'</p>';
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
						<button type="submit" class="btn btn-primary">Validation du billet</button>
					</form>
				</div>
			</div>
		</div>
			
			

		</div>
	</body>
</html>