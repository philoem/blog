<?php
	session_start();
	require_once('backend/model.php');

	setcookie('pseudo', $_POST['name'], time() + 3600, null, null, false, true);
	// Redirection 
	header('Location: admin.php');


	$db = dbConnect();
	
	if (isset($_POST['title']) AND isset($_POST['billet'])) {
		$req = $db->prepare('INSERT INTO book(title, billet, date_billet) VALUES(?, ?, NOW())');
		$req->execute(array($_POST['title'], $_POST['billet']));
	}



		

				
		
