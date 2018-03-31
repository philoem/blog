<?php
	// Connexion à la base de données
	//require 'vendor/autoload.php';
	//use \Forteroche\DbConnect;
	//$db = new DbConnect('projet_4');
	
	
	
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
	require_once('./models/model.php');
	$db = dbConnect();

	// Vérification du pseudo et du mot de passe pour se connecter
	if (isset($_POST['submit_login'])) {
		$pseudo = htmlspecialchars($_POST['pseudo']);
		$password = htmlspecialchars($_POST['password']);
		if (isset($_POST['pseudo']) AND !empty($_POST['pseudo'])) {
			$reqpseudo = $db->prepare('SELECT * FROM login_admin WHERE pseudo = ?'); 
			$reqpseudo->execute([$pseudo]);
			$pseudoexist = $reqpseudo->rowCount(); 
			if ($pseudoexist == 1) {
				
				if (isset($_POST['password']) AND !empty($_POST['password'])) {
					$reqpassword = $db->prepare('SELECT * FROM login_admin WHERE password_admin = ?'); 
					$reqpassword->execute([$password]);
					$passwordexist = $reqpassword->rowCount(); 
					if ($pseudoexist == 1) {
						$_SESSION['pseudo'] = $_POST['pseudo'];
						$_SESSION['mail'] = $_POST['mail'];
						header('Location: admin.php');
					}
				}
			} 
		} 
	}

	 

	
	
