<?php
// Autoloading Composer
//require './vendor/autoload.php';

// Connexion à la table login_admin
require '../models/classe/App/Manager/LoginAdminManager.php';
use classe\App\Manager\LoginAdminManager;
$loginManager = new LoginAdminManager();

require '../models/classe/App/Entity/LoginAdmin.php';
use classe\App\Entity\LoginAdmin;
$login = new LoginAdmin();

//	Utilisation du bouton "se souvenir de moi" et crypter les données (prénom, nom et mot de passe) dans les cookies d'une durée de 3 jours
if (isset($_POST['remember'])) {
	if (isset($_POST['pseudo'])) {
		$pseudo = password_hash($_POST['pseudo'], PASSWORD_BCRYPT);
		setcookie('pseudo', $pseudo, time() + 2*24*3600, null, null, false, true);
	} else {
		echo 'pas de pseudo';
	}
	if (isset($_POST['password'])) {
		$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
		setcookie('password', $password, time() + 2*24*3600, null, null, false, true);	
	} else {
		echo 'pas de mot de passe';
	}
}

// Vérification du pseudo et du mot de passe pour se connecter de la page login.php
$pseudo = $login->setPseudo(htmlspecialchars($_POST['pseudo']));
$password = $login->setPasswordAdmin(sha1($_POST['password']));
if (isset($_POST['submit_login'])) {
	//$pseudo2 = htmlspecialchars($_POST['pseudo']);
	//$password2 = sha1($_POST['password']);
		
	if (isset($pseudo) AND !empty($pseudo) AND isset($password) AND !empty($password)) {
		
		$reqadmin = $loginManager->readLogin(); 
		$adminexist = $reqadmin->rowCount(); 

		if ($adminexist == 1) {
			$_SESSION['pseudo'] = $_POST['pseudo'];
			$_SESSION['password'] = $_POST['password'];
			header('Location: admin.php');
		} 
	} 
}
			

	 

	
	
