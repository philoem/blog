<?php
	session_start();
	if (isset($_POST['prenom']) AND !empty($_POST['prenom'])) {
		$_SESSION['prenom'] = $_POST['prenom'];
	} else if (isset($_POST['nom']) AND !empty($_POST['nom'])) {
		$_SESSION['nom'] = $_POST['nom'];
	}
	//	Utilisation du bouton "se souvenir de moi" et crypter les données (prénom, nom et mot de passe) dans les cookies d'une durée de 3 jours
	if (isset($_POST['remember'])) {
		$prenom = password_hash($_POST['prenom'], PASSWORD_BCRYPT);
		setcookie('prenom', $prenom, time() + 3*24*3600, null, null, false, true);
		$nom = password_hash($_POST['nom'], PASSWORD_BCRYPT);
		setcookie('nom', $nom, time() + 3*24*3600, null, null, false, true);
		$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
		setcookie('password', $password, time() + 3*24*3600, null, null, false, true);	
	}

	// Vérifie ici le prénom, le nom et le mot de passe
	if ($_SESSION['prenom'] != 'jean' AND $_SESSION['nom'] != 'forteroche') {
		header('location: login.php');
	} 
	// Connexion à la base de données
	require_once('backend/model.php');
	$db = dbConnect();
	
	// Cryptage du mot de passe dans la table gestion_admin
	if (!empty($_POST['password']) AND $_POST['password'] === $_POST['confirmPassword']) {
		$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
		$req = $db->prepare('INSERT INTO login_admin(prenom, nom, password, date_login) VALUES(?, ?, ?, NOW())');
		$req->execute(array($_POST['prenom'], $_POST['nom'], $password));	
	} 
