<?php
session_start();
// Autoloading Composer
require '../vendor/autoload.php';

//Redirection sur la page login.php
header('Location: ../views/login.php');	

// Chargement de la Classe BookMLoginAdminManager, gestionnaire d'entité pour les connexions
require '../models/classe/App/Manager/LoginAdminManager.php';
use classe\App\Manager\LoginAdminManager;
$loginManager = new LoginAdminManager();

// Chargement de la Classe LoginAdmin, entité pour les connexions
require '../models/classe/App/Entity/LoginAdmin.php';
use classe\App\Entity\LoginAdmin;
$login = new LoginAdmin();

// Utilisation du bouton "se souvenir de moi" et crypter les données (prénom, nom et mot de passe) dans les cookies d'une durée de 2 jours
if (isset($_POST['remember'])) {
	if (isset($_POST['pseudo'])) {
		$pseudo = password_hash($_POST['pseudo'], PASSWORD_BCRYPT);
		setcookie('pseudo', $pseudo, time() + 2*24*3600, null, null, false, true);
	} else {
		echo 'Pas de pseudo';
	}
	if (isset($_POST['password'])) {
		$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
		setcookie('password', $password, time() + 2*24*3600, null, null, false, true);	
	} else {
		echo 'Pas de mot de passe';
	}
}

// Vérification du pseudo et du mot de passe pour se connecter de la page login.php
//function login() {
if (isset($_POST['submit_login'])) {
	$pseudo = $login->set_pseudo(htmlspecialchars($_POST['pseudo']));
	$password = $login->set_password_admin(sha1($_POST['password']));
	
	if(isset($_POST['pseudo']) AND isset($_POST['password'])) {
		
		$reqadmin = $loginManager->readLogin($pseudo, $password); 
		$adminexist = $reqadmin->rowCount(); 
		
		if ($adminexist == 1) {
			$_SESSION['pseudo'] = $_POST['pseudo'];
			$_SESSION['password'] = $_POST['password'];
			header('Location: ../views/admin.php');
		} 
		
	} 
} 
//}
	 

	
	
