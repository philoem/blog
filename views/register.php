<?php
	// Connexion à la base de données
	require_once('../models/model.php');
	$db = dbConnect();
	// Appel de la classe FormRegister pour le formulaire
	require('../models/FormRegister.php');
	$form = new FormRegister([]);
	
	if (isset($_POST['submit_register'])) {
		$prenom = htmlspecialchars($_POST['prenom']);
		$nom = htmlspecialchars($_POST['nom']);
		$pseudo = htmlspecialchars($_POST['pseudo']);
		$mail = htmlspecialchars($_POST['mail']);
		$mail_confirm = htmlspecialchars($_POST['mail_confirm']);
		$passwordRegister = sha1($_POST['passwordRegister']);
		$confirmPasswordRegister = sha1($_POST['confirmPasswordRegister']);
		
		if (!empty($_POST['prenom']) AND !empty($_POST['nom']) AND !empty($_POST['pseudo']) AND !empty($_POST['mail']) AND !empty($_POST['mail_confirm']) AND !empty($_POST['passwordRegister']) AND !empty($_POST['confirmPasswordRegister'])) {
			$pseudolength = strlen($pseudo);
			
			if ($pseudolength <= 60) {
				$reqpseudo = $db->prepare('SELECT * FROM login_admin WHERE pseudo = ?'); // Ici vérification que le pseudo n'existe pas déjà
				$reqpseudo->execute([$pseudo]);
				$pseudoexist = $reqpseudo->rowCount();
				
				if ($pseudoexist == 0) {
					
					if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
						$reqmail = $db->prepare('SELECT * FROM login_admin WHERE mail_admin = ?'); // Ici vérification que le mail n'existe pas déjà
						$reqmail->execute([$mail]);
						$mailexist = $reqmail->rowCount();
						
						if ($mailexist == 0) {
							
							if ($mail == $mail_confirm) {
								
								if ($passwordRegister == $confirmPasswordRegister) {
									$req = $db->prepare('INSERT INTO login_admin(prenom, nom, pseudo, mail_admin, password_admin, date_login) VALUES(?, ?, ?, ?, ?, NOW())');
									$req->execute([$prenom, $nom, $pseudo, $mail, $passwordRegister]);
									$error = "VOTRE COMPTE A BIEN ETE CREE !";
									header('Location: ../login.php');
								} else {
									$error = "Vos mots de passes ne sont pas identiques !";
								}
							} else {
								$error = "Vos adresses mail ne sont pas identiques !";
							}
						} else {
							$error = "Ce mail est déjà utlisé !";
						}
					} else {
						$error = "Votre adresse mail n'est pas bonne !";
					}
				} else {
					$error = "Ce pseudo est déjà utilisé !";
				}
			} else {
				$error = "Votre pseudo ne doit pas dépasser 60 caractères !";
			}
		} else {
			$error = "Veuillez remplir les champs ci-dessus pour valider votre inscription";
		}
	}
	?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link href="../style.css" rel="stylesheet" type="text/css" >
		<title>Création compte</title>
	</head>
	<body>
		<div class="container-fluid">
<!-- Ici le header -->
			<?php include './inc/header_register.php'; ?> 

<!-- Ici le formulaire pour s'inscrire  -->			
			<div class="col-xs-12">
				<div class="row justify-content-center">
					<form method="post" action="#">
						<div class="form-group">
							<?php
							echo $form->label('Votre prenom :');
							echo $form->inputPrenom('prenom');
							echo $form->label('Votre nom :');
							echo $form->inputNom('nom');
							echo $form->label('Votre pseudo :');
							echo $form->inputPseudo('pseudo');
							echo $form->label('Votre mail :');
							echo $form->inputMail('mail');
							echo $form->label('Confirmez votre mail :');
							echo $form->inputConfirmMail('mail_confirm');
							echo $form->label('Votre mot de passe :');
							echo $form->inputPassword('passwordRegister');
							echo $form->label('Confirmez votre mot de passe :');
							echo $form->inputConfirmPassword('confirmPasswordRegister');
							?>
						</div>
						<?php
						echo $form->submit();
						?>
					</form>
				</div>
     		</div>

<!-- Ici affichage des messages d'erreurs  -->
			<div class="container" id="error_register">
				<?php 
					if (isset($error)) {
						echo $error;
					}
				?>
			</div>

		</div>
	</body>
</html>