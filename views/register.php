<?php
// Appel de la classe FormRegister pour le formulaire - autoloading
require '../vendor/autoload.php';
use Forteroche\FormRegister;

// Connexion à la base de données
require_once '../models/model.php';
$db = dbConnect();

$formRegister = new FormRegister();

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
		<link href="./public/style.css" rel="stylesheet" type="text/css" >
		<title>Inscription</title>
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
							echo $formRegister->label('Votre prenom :');
							echo $formRegister->inputPrenom('prenom');
							echo $formRegister->label('Votre nom :');
							echo $formRegister->inputNom('nom');
							echo $formRegister->label('Votre pseudo :');
							echo $formRegister->inputPseudo('pseudo');
							?>
						<div class="form-group">
							<?php
							echo $formRegister->label('Votre mail :');
							echo $formRegister->inputMail('mail');
							echo $formRegister->label('Confirmez votre mail :');
							echo $formRegister->inputConfirmMail('mail_confirm');
							?>
						</div>
						<div class="form-group">
							<?php
							echo $formRegister->label('Votre mot de passe :');
							echo $formRegister->inputPassword('passwordRegister');
							echo $formRegister->label('Confirmez votre mot de passe :');
							echo $formRegister->inputConfirmPassword('confirmPasswordRegister');
							?>
						</div>
						<?php
						echo $formRegister->submit();
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