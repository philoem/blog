<?php
	session_start();
	
	// Appel du formulaire de connexion - autoloading
	require 'vendor/autoload.php';
	use \Forteroche\Form;

	require_once 'AccesControl.php';
	
	$formLogin = new Form();
	
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link href="./public/style.css" rel="stylesheet" type="text/css" >
		<title>Accès administrateur</title>
	</head>
	<body>
		<div class="container-fluid">
<!-- Ici le header  -->
			<?php include 'views/inc/header_login.php'; ?>
			
<!-- Ici le formulaire pour se connecter  -->			
			<div class="col-xs-12">
				<div class="row justify-content-center">
					<form method="post" action="#">
						<div class="form-group">
							<?php
							echo $formLogin->label('Votre pseudo :');
							echo $formLogin->inputText('pseudo');
							echo $formLogin->label('Votre mot de passe :');
							echo $formLogin->inputPassword('password');
							?>
						</div>
						<div class="form-check">
							<?php
							echo $formLogin->checkbox('remember');
							echo $formLogin->label('Se souvenir de moi');
							?>
						</div>
						<?php
						echo $formLogin->submit();
						?>
					</form>
				</div>
			</div>
			
		</div>
	</body>
</html>