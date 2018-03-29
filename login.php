<?php
	session_start();
	require_once('AccesControl.php');
	
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link href="./style.css" rel="stylesheet" type="text/css" >
		<title>Accès administrateur</title>
	</head>
	<body>
		<div class="container-fluid">
<!-- Ici le header  -->
			<?php include 'views/inc/header_login.php'; ?>
			
			<div class="col-xs-12">
				<div class="row justify-content-center">
					<form method="post" action="#">
					<div class="form-group">
							<label for="exampleInputPrenom">Votre pseudo :</label>
							<input type="text" class="form-control" name="pseudo" id="exampleInputPrenom" aria-describedby="prenomHelp"  >
						</div>
						<div class="form-group">
							<label for="exampleInputPassword">Votre mot de passe</label>
							<input type="password" class="form-control" name="password" id="exampleInputPassword" >
						</div>
						<div class="form-check">
							<input type="checkbox" class="form-check-input" name="remember" id="exampleCheck1">
							<label class="form-check-label" for="exampleCheck1">Se souvenir de moi</label>
						</div>
						<button type="submit" class="btn btn-primary" name="submit_login">Se connecter</button>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>