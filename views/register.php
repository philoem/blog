<?php

// Chargement autoloading Composer
require '../vendor/autoload.php';
// Chargement du formulaire de l'inscription
require_once '../models/classe/App/Form/FormRegister.php';
use classe\App\Form\FormRegister;
$formRegister = new FormRegister();

// Vérification des données du formulaire d'inscription
if (isset($_POST['submit_register'])) {
	$prenom = $loginAdmin->set_prenom(htmlspecialchars($_POST['prenom']));
	$nom = $loginAdmin->set_nom(htmlspecialchars($_POST['nom']));
	$pseudo = $loginAdmin->set_pseudo(htmlspecialchars($_POST['pseudo']));
	$mail = $loginAdmin->set_mail_admin(htmlspecialchars($_POST['mail']));
	$mail_confirm = $loginAdmin->set_mail_admin(htmlspecialchars($_POST['mail_confirm']));
	$passwordRegister = $loginAdmin->set_password_admin(sha1($_POST['passwordRegister']));
	$confirmPasswordRegister = $loginAdmin->set_password_admin(sha1($_POST['confirmPasswordRegister']));
		
	if (!empty($_POST['prenom']) AND !empty($_POST['nom']) AND !empty($_POST['pseudo']) AND !empty($_POST['mail']) AND !empty($_POST['mail_confirm']) AND !empty($_POST['passwordRegister']) AND !empty($_POST['confirmPasswordRegister'])) {
		$pseudolength = strlen($_POST['pseudo']);
		
		if ($pseudolength <= 60) {
			$reqpseudo = $db->prepare('SELECT * FROM login_admin WHERE pseudo = ?'); // Ici vérification que le pseudo n'existe pas déjà
			$reqpseudo->execute([$_POST['pseudo']]);
			$pseudoexist = $reqpseudo->rowCount();
			
			if ($pseudoexist == 0) {
				
				if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
					$reqmail = $db->prepare('SELECT * FROM login_admin WHERE mail_admin = ?'); // Ici vérification que le mail n'existe pas déjà
					$reqmail->execute([$_POST['mail']]);
					$mailexist = $reqmail->rowCount();
					
					if ($mailexist == 0) {
						
						if ($_POST['mail'] == $_POST['mail_confirm']) {
							
							if ($passwordRegister == $confirmPasswordRegister) {
								$loginAdminManager->create($loginAdmin);
								
								$_error = "VOTRE COMPTE A BIEN ETE CREE !";
								header('Location: ../views/login.php');
							} else {
								$_error = "Vos mots de passes ne sont pas identiques !";
								
							}
						} else {
							$_error = "Vos adresses mail ne sont pas identiques !";
							
						}
					} else {
						$_error = "Ce mail est déjà utlisé !";
						
					}
				} else {
					$_error = "Votre adresse mail n'est pas bonne !";
					
				}
			} else {
				$_error = "Ce pseudo est déjà utilisé !";
				
			}
		} else {
			$_error = "Votre pseudo ne doit pas dépasser 60 caractères !";
			
		}
	} else {
		
		$_error = "Veuillez remplir les champs ci-dessus pour valider votre inscription";
			
	}
}
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<?php include ('../views/inc/head_html.php'); ?>
	</head>
	<body>
	
		<div class="container-fluid">
<!-- Ici le header -->
			<?php include '../views/inc/header_register.php'; ?> 

<!-- Ici le formulaire pour s'inscrire  -->			
			<div class="col-xs-12">
				<div class="row justify-content-center">
					<form method="post" action="#">
						<div class="text-wrap">
							<h3 id="title_form_register">Veuillez remplir tous les champs</h3>
						</div>
						<div class="form-group">
							<fieldset class="fieldset_register">
								<div class="row justify-content-center"><?= $formRegister->label('Votre prénom :');?></div>
								<div class="row justify-content-center"><?= $formRegister->inputPrenom('prenom');?></div>
								<div class="row justify-content-center"><?= $formRegister->label('Votre nom :');?></div>
								<div class="row justify-content-center"><?= $formRegister->inputNom('nom');?></div>
								<div class="row justify-content-center"><?= $formRegister->label('Votre pseudo :');?></div>
								<div class="row justify-content-center"><?= $formRegister->inputPseudo('pseudo');?></div>
							</fieldset>
						</div>
						<div class="form-group">
							<fieldset class="fieldset_register">
								<div class="row justify-content-center"><?= $formRegister->label('Votre mail :');?></div>
								<div class="row justify-content-center"><?= $formRegister->inputMail('mail');?></div>
								<div class="row justify-content-center"><?= $formRegister->label('Confirmez votre mail :');?></div>
								<div class="row justify-content-center"><?= $formRegister->inputConfirmMail('mail_confirm');?></div>
							</fieldset>
						</div>
						<div class="form-group">
							<fieldset class="fieldset_register">
								<div class="row justify-content-center"><?= $formRegister->label('Votre mot de passe :');?></div>
								<div class="row justify-content-center"><?= $formRegister->inputPassword('passwordRegister');?></div>
								<div class="row justify-content-center"><?= $formRegister->label('Confirmez votre mot de passe :');?></div>
								<div class="row justify-content-center"><?= $formRegister->inputConfirmPassword('confirmPasswordRegister');?></div>
							</fieldset>
						</div>
						<div class="row justify-content-center">
							<?php
							echo $formRegister->submit();
							?>
						</div>
					</form>
				</div>
     		</div>

<!-- Ici affichage des messages d'erreurs  -->
			<div class="container" id="error_register">
				<?php 
					if (isset($_error)) {
						
						echo $_error;
					}
					
				?>
			</div>

		</div>
	</body>
</html>