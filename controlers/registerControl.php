<?php
header('Location: ../views/register.php');
// Appel de la classe FormRegister pour le formulaire - autoloading
//require '../vendor/autoload.php';
//require '../views/register.php';
//
//// Connexion à la base de données
//require_once '../controlers/model.php';
//$db = dbConnect();
//require_once '../models/classe/App/Manager/LoginAdminManager.php';
//use classe\App\Manager\LoginAdminManager;
//$loginAdminManager = new LoginAdminManager();
//
//require_once '../models/classe/App/Entity/LoginAdmin.php';
//use classe\App\Entity\LoginAdmin;
//$loginAdmin = new LoginAdmin();
//
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
//								
//								$_error = "VOTRE COMPTE A BIEN ETE CREE !";
//								header('Location: ../views/login.php');
//							} else {
//								$_error = "Vos mots de passes ne sont pas identiques !";
//								
//							}
//						} else {
//							$_error = "Vos adresses mail ne sont pas identiques !";
//							
//						}
//					} else {
//						$_error = "Ce mail est déjà utlisé !";
//						
//					}
//				} else {
//					$_error = "Votre adresse mail n'est pas bonne !";
//					
//				}
//			} else {
//				$_error = "Ce pseudo est déjà utilisé !";
//				
//			}
//		} else {
//			$_error = "Votre pseudo ne doit pas dépasser 60 caractères !";
//			
//		}
//	} else {
//		
//		$_error = "Veuillez remplir les champs ci-dessus pour valider votre inscription";
//			
//	}
//}
//