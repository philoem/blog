<?php
//header('Location: ./views/register.php');
// Appel de la classe FormRegister pour le formulaire - autoloading
require '../vendor/autoload.php';
//require '../views/register.php';

// Connexion à la base de données
//require_once './model.php';
//$db = dbConnect();
require_once '../models/classe/App/Manager/LoginAdminManager.php';
use classe\App\Manager\LoginAdminManager;
$loginAdminManager = new LoginAdminManager();

require_once '../models/classe/App/Entity/LoginAdmin.php';
use classe\App\Entity\LoginAdmin;
$LoginAdmin = new LoginAdmin();

$prenom = $LoginAdmin->setPrenom(htmlspecialchars($_POST['prenom']));
$nom = $LoginAdmin->setNom(htmlspecialchars($_POST['nom']));
$pseudo = $LoginAdmin->setPseudo(htmlspecialchars($_POST['pseudo']));
$mail = $LoginAdmin->setMailAdmin(htmlspecialchars($_POST['mail']));
$mail_confirm = htmlspecialchars($_POST['mail_confirm']);
$passwordRegister = $LoginAdmin->setPasswordAdmin(sha1($_POST['passwordRegister']));
$confirmPasswordRegister = sha1($_POST['confirmPasswordRegister']);
if (isset($_POST['submit_register'])) {
	
	
	if (!empty($prenom) AND !empty($nom) AND !empty($pseudo) AND !empty($mail) AND !empty($mail_confirm) AND !empty($passwordRegister) AND !empty($confirmPasswordRegister)) {
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
								$loginAdminManager->create($loginAdmin);
								//$req = $db->prepare('INSERT INTO login_admin(prenom, nom, pseudo, mail_admin, password_admin, key_recup_mail, date_login) VALUES(?, ?, ?, ?,// ?, null, NOW())');
								//$req->execute([$prenom, $nom, $pseudo, $mail, $passwordRegister]);
								$error = "VOTRE COMPTE A BIEN ETE CREE !";
								header('Location: ../views/login.php');
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
		$_error = $loginAdminManager->set_error("Veuillez remplir les champs ci-dessus pour valider votre inscription");
		
	}
}