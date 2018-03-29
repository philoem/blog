<?php
	session_start();

	require_once('./models/model.php');
	$db = dbConnect();
	
	// Redirection 
	header('Location: admin.php');
	
	// Gestion du formulaire de créations de nouveaux billets
	if (!empty($_POST['title']) AND !empty($_POST['billet'])) {
		$req = $db->prepare('INSERT INTO book(title, billet, date_billet) VALUES(?, ?, NOW())');
		$req->execute(array($_POST['title'], $_POST['billet']));
	}
