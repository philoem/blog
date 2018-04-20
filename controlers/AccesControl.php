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

// Condition d'entrée dans l'espace administrateur si des cookies existent
if (isset($_COOKIE['pseudo']) AND isset($_COOKIE['password']) AND !empty($_COOKIE['pseudo']) AND !empty($_COOKIE['password'])) {
	header('Location: ../views/admin.php');
} else {
	header('Location: ../views/login.php');
}

// Utilisation du bouton "se souvenir de moi" et crypter les données (pseudo et mot de passe) dans les cookies d'une durée de 2 jours
if (isset($_POST['remember'])) {
	
	if (isset($_POST['pseudo']) AND isset($_POST['password'])) {
		$pseudo = password_hash($_POST['pseudo'], PASSWORD_BCRYPT);
		$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
		
		setcookie('pseudo', $pseudo, time() + 2*24*3600, '/', null, false, true);
		setcookie('password', $password, time() + 2*24*3600, '/', null, false, true);
		//header('Location: ../views/login.php');	
		
	} 
}

// Vérification du pseudo et du mot de passe pour se connecter de la page login.php
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
// Vérificationpour savoir si un administré s'est connecté et savoir si une session est déjà en cours. Dans ce cas-là, l'administrateur peut accéder à la page admin.php
if(isset($_SESSION['pseudo']) AND isset($_SESSION['password']) OR isset($_COOKIE['pseudo']) AND isset($_COOKIE['password']) ) {

	header('Location: ../views/admin.php');
}
	 

	
	
