<?php
// Appel de la classe FormRegister pour le formulaire - autoloading
require '../vendor/autoload.php';
require_once '../models/classe/App/Form/FormRegister.php';
use classe\App\Form\FormRegister;
$formRegister = new FormRegister();

require_once '../models/classe/App/Manager/LoginAdminManager.php';
use classe\App\Manager\LoginAdminManager;
$loginAdminManager = new LoginAdminManager();

require_once '../models/classe/App/Entity/LoginAdmin.php';
use classe\App\Entity\LoginAdmin;
$loginAdmin = new LoginAdmin();

// Connexion à la base de données
require_once '../controlers/model.php';
$db = dbConnect();


//if (isset($_POST['submit_register'])) {
//	$prenom = $loginAdmin->set_prenom(htmlspecialchars($_POST['prenom']));
//	$nom = $loginAdmin->set_nom(htmlspecialchars($_POST['nom']));
//	$pseudo = $loginAdmin->set_pseudo(htmlspecialchars($_POST['pseudo']));
//	$mail = $loginAdmin->set_mail_admin(htmlspecialchars($_POST['mail']));
//	$mail_confirm = $loginAdmin->set_mail_admin(htmlspecialchars($_POST['mail_confirm']));
//	$passwordRegister = $loginAdmin->set_password_admin(sha1($_POST['passwordRegister']));
//	$confirmPasswordRegister = $loginAdmin->set_password_admin(sha1($_POST['confirmPasswordRegister']));
//	
//	if (!empty($prenom) AND !empty($nom) AND !empty($pseudo) AND !empty($mail) AND !empty($mail_confirm) AND !empty($passwordRegister) AND !empty($confirmPasswordRegister))// {
//		$pseudolength = strlen($_POST['pseudo']);
//		
//		if ($pseudolength <= 60) {
//			$reqpseudo = $db->prepare('SELECT * FROM login_admin WHERE pseudo = ?'); // Ici vérification que le pseudo n'existe pas déjà
//			$reqpseudo->execute([$_POST['pseudo']]);
//			$pseudoexist = $reqpseudo->rowCount();
//			
//			if ($pseudoexist == 0) {
//				
//				if (filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
//					$reqmail = $db->prepare('SELECT * FROM login_admin WHERE mail_admin = ?'); // Ici vérification que le mail n'existe pas déjà
//					$reqmail->execute([$_POST['mail']]);
//					$mailexist = $reqmail->rowCount();
//					
//					if ($mailexist == 0) {
//						
//						if ($_POST['mail'] == $_POST['mail_confirm']) {
//							
//							if ($passwordRegister == $confirmPasswordRegister) {
//								$loginAdminManager->create($loginAdmin);
//								//$req = $db->prepare('INSERT INTO login_admin(prenom, nom, pseudo, mail_admin, password_admin, key_recup_mail, date_login) VALUES(?, ?, ?, //?,// ?, null, NOW())');
//								//$req->execute([$prenom, $nom, $pseudo, $mail, $passwordRegister]);
//								$_error = $loginAdmin->set_error("VOTRE COMPTE A BIEN ETE CREE !");
//								header('Location: ../views/login.php');
//							} else {
//								$_error = $loginAdmin->set_error("Vos mots de passes ne sont pas identiques !");
//							}
//						} else {
//							$_error = $loginAdmin->set_error("Vos adresses mail ne sont pas identiques !");
//						}
//					} else {
//						$_error = $loginAdmin->set_error("Ce mail est déjà utlisé !");
//					}
//				} else {
//					$_error = $loginAdmin->set_error("Votre adresse mail n'est pas bonne !");
//				}
//			} else {
//				$_error = $loginAdmin->set_error("Ce pseudo est déjà utilisé !");
//			}
//		} else {
//			$_error = $loginAdmin->set_error("Votre pseudo ne doit pas dépasser 60 caractères !");
//		}
//	} else {
//		$_error = $loginAdmin->set_error("Veuillez remplir les champs ci-dessus pour valider votre inscription");
//		
//	}
//}
?>
<!DOCTYPE html>
<html lang="fr">
<!-- Ici le head  -->
<?php include ('../views/inc/head_html.php'); ?>
	<body>
		<div class="container-fluid">
<!-- Ici le header -->
			<?php include './inc/header_register.php'; ?> 

<!-- Ici le formulaire pour s'inscrire  -->			
			<div class="col-xs-12">
				<div class="row justify-content-center">
					<form method="post" action="../controlers/registerControl.php">
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
						echo $_error = $loginAdmin->get_error();
					}
				?>
			</div>

		</div>
	</body>
</html>