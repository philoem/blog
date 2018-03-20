<?php
	session_start();
	if (isset($_POST['prenom']) AND !empty($_POST['prenom'])) {
		$_SESSION['prenom'] = $_POST['prenom'];
	} else if (isset($_POST['nom']) AND !empty($_POST['nom'])) {
		$_SESSION['nom'] = $_POST['nom'];
	}
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
	require_once('backend/model.php');
	$db = dbConnect();
	
	if (!empty($_POST['password']) AND $_POST['password'] === $_POST['confirmPassword']) {
		$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
		$req = $db->prepare('INSERT INTO login_admin(prenom, nom, password, date_login) VALUES(?, ?, ?, NOW())');
		$req->execute(array($_POST['prenom'], $_POST['nom'], $password));	
	} 
