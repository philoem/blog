<?php
	session_start();
	require_once('AccesControl.php');
	require('./models/FormLogin.php');
	$form = new FormLogin([]);
	
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
			
<!-- Ici le formulaire pour se connecter  -->			
			<div class="col-xs-12">
				<div class="row justify-content-center">
					<form method="post" action="#">
						<div class="form-group">
							<?php
							echo $form->label('Votre pseudo :');
							echo $form->inputText('pseudo');
							echo $form->label('Votre mot de passe :');
							echo $form->inputPassword('password');
							?>
						</div>
						<div class="form-check">
							<?php
							echo $form->checkbox('remember');
							echo $form->label('Se souvenir de moi');
							?>
						</div>
						<?php
						echo $form->submit();
						?>
					</form>
				</div>
			</div>
			
		</div>
	</body>
</html>