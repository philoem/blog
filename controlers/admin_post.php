<?php
	session_start();

	require_once('../models/model.php');
	$db = dbConnect();
	
	// Redirection 
	header('Location: ../views/admin2.php');
	
	// Gestion du formulaire de créations de nouveaux billets
	if (!empty($_POST['title']) AND !empty($_POST['billet'])) {
		$req = $db->prepare('INSERT INTO book(title, billet, approuved, date_billet) VALUES(?, ?, 0, NOW())');
		$req->execute(array($_POST['title'], $_POST['billet']));
	}
