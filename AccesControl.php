<?php
	session_start();
	if (isset($_POST['pseudo']) AND !empty($_POST['pseudo'])) {
		$_SESSION['pseudo'] = $_POST['pseudo'];
	} else if (isset($_POST['mail']) AND !empty($_POST['mail'])) {
		$_SESSION['mail'] = $_POST['mail'];
	}
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

	 
	// Connexion à la base de données
	require_once('./models/model.php');
	$db = dbConnect();
	
	
