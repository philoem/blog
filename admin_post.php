<?php
	session_start();
	
	require_once('backend/model.php');
	$db = dbConnect();
	//setcookie('pseudo', $_POST['name'], time() + 3600, null, null, false, true);
	// Redirection 
	header('Location: admin.php');
	
	if (!empty($_POST['title']) AND !empty($_POST['billet'])) {
		$req = $db->prepare('INSERT INTO book(title, billet, date_billet) VALUES(?, ?, NOW())');
		$req->execute(array($_POST['title'], $_POST['billet']));
	}
