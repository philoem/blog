<?php
    require_once('../models/model.php');
	require_once('../AccesControl.php');
	$db = dbConnect();
    
	// Redirection 
	header('Location: ../user_comments.php');
	
	if (isset($_POST['submit_commentary'])) {
		if (!empty($_POST['name_user']) AND !empty($_POST['commentary'])) {
			$name_user = htmlspecialchars($_POST['name_user']);
			$commentary = htmlspecialchars($_POST['commentary']);
			
			$req = $db->prepare('INSERT INTO commentarys(name_user, commentary, approuved, signaled, date_commentary) VALUES(?, ?, 0, 0, NOW())');
			
			$req->execute([$name_user, $commentary]);
			
		}
		$req->closeCursor();
	}
