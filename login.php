<?php
	session_start();
	

?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link href="style.css" rel="stylesheet" type="text/css" >
		<title>Accès administrateur</title>
	</head>
	<body>
		<div class="container-fluid">
			
			<header>
				<nav class="navbar fixed-top navbar-dark bg-primary">
					<div class="navbar-brand" id="content_header">
						<h1>Accès administrateur</h1>
						<p id="paragraph_header">"Billet simple pour l'Alaska"</p>
					</div>
				</nav>
			</header>
			
			<div class="col-xs-12">
				<div class="row justify-content-center">
					<form method="post" action="admin.php">
						<div class="form-group">
							<label for="exampleInputPrenom">Votre Prénom</label>
							<input type="text" class="form-control" name="prenom" id="exampleInputPrenom" aria-describedby="prenomHelp" autofocus required >
						</div>
						<div class="form-group">
							<label for="exampleInputNom">Votre Nom</label>
							<input type="text" class="form-control" name="nom" id="exampleInputNom" required>
						</div>
						<div class="form-group">
							<label for="exampleInputPassword">Votre mot de passe</label>
							<input type="password" class="form-control" name="password" id="exampleInputPassword" required>
						</div>
						<div class="form-group">
							<label for="exampleInputConfirmPassword">Confirmez votre mot de passe</label>
							<input type="password" class="form-control" name="confirmPassword" id="exampleInputConfirmPassword" required>
						</div>
						<div class="form-check">
							<input type="checkbox" class="form-check-input" name="remember" id="exampleCheck1">
							<label class="form-check-label" for="exampleCheck1">Se souvenir de moi</label>
						</div>
						<button type="submit" class="btn btn-primary">Validez votre session</button>
					</form>
				</div>
			</div>

		</div>
	</body>
</html>