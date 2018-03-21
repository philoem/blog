<?php
    require_once('../backend/model.php');

	$db = dbConnect();
    
	// Redirection 
	header('Location: ../user_comments.php');
	
	if (!empty($_POST['name']) AND !empty($_POST['commentary'])) {
		$req = $db->prepare('INSERT INTO commentarys(name, commentary, date_commentary) VALUES(?, ?, NOW())');
		$req->execute(array($_POST['name'], $_POST['commentary']));
	}
