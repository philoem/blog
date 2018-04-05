<?php
    require_once('model.php');
	require_once('AccesControl.php');
	$db = dbConnect();
	// Redirection 
	header('Location: ../views/user_comments.php');
	
	if (isset($_POST['submit_commentary'])) {
		if (!empty($_POST['name_user']) AND !empty($_POST['commentary']) AND isset($_POST['name_user']) AND isset ($_POST['commentary'])) {
			$book_id = htmlspecialchars($_GET['id']);
			$name_user = htmlspecialchars($_POST['name_user']);
			$commentary = htmlspecialchars($_POST['commentary']);
			
			$req = $db->prepare('INSERT INTO commentarys(name_user, commentary, approuved, signaled, book_id, date_commentary) VALUES(?, ?, 0, 0, ?, NOW())');
			
			$req->execute(array($name_user, $commentary, $book_id));
			
		}
		$req->closeCursor();
	}
	
