<?php
    require_once('../models/model.php');
	require_once('../AccesControl.php');
	$db = dbConnect();
    
	// Redirection 
	header('Location: ../user_comments.php');
	
	if (isset($_POST['submit_commentary'])) {
		if (!empty($_POST['name']) AND !empty($_POST['commentary'])) {
			$name = htmlspecialchars($_POST['name']);
			$commentary = htmlspecialchars($_POST['commentary']);
			
			$req = $db->prepare('INSERT INTO commentarys(name_user, commentary, approuved, date_commentary) VALUES(?, ?, 0, NOW())');
			
			$req->execute([$name, $commentary]);
			
		}
		$req->closeCursor();
	}
