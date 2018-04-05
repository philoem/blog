<?php
	// Connexion à la base de données
	//require 'vendor/autoload.php';
	//use \Forteroche\DbConnect;
	//$db = new DbConnect('projet_4');
	
	require_once('model.php');
	$db = dbConnect();
	
	
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
	if (isset($_POST['submit_login'])) {
		$pseudo2 = htmlspecialchars($_POST['pseudo']);
		$password2 = sha1($_POST['password']);
			
		if (isset($_POST['pseudo']) AND !empty($_POST['pseudo']) AND isset($_POST['password']) AND !empty($_POST['password'])) {
			$reqadmin = $db->prepare('SELECT * FROM login_admin WHERE pseudo = ? AND password_admin = ?'); 
			$reqadmin->execute([$pseudo2, $password2]);
			$adminexist = $reqadmin->rowCount(); 
			if ($adminexist == 1) {
				$_SESSION['pseudo'] = $_POST['pseudo'];
				$_SESSION['password'] = $_POST['password'];
				header('Location: admin.php');
			} 
		} 
	}
				

	 

	
	
