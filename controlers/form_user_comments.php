<?php
require '../models/classe/App/Manager/CommentarysManager.php';
use classe\App\Manager\CommentarysManager;
$commentarysManager = new CommentarysManager();
//require_once('model.php');
//require_once('AccesControl.php');
//$db = dbConnect();

// Redirection 
header('Location: ../views/user_comments.php');

if (isset($_POST['submit_commentary'])) {
	if (!empty($_POST['name_user']) AND !empty($_POST['commentary']) AND isset($_POST['name_user']) AND isset ($_POST['commentary'])) {
		$book_id = (int) htmlspecialchars($_GET['id']);
		$name_user = htmlspecialchars($_POST['name_user']);
		$commentary = htmlspecialchars($_POST['commentary']);
		
		$req = $commentarysManager->create();
		
		
		
	}
	
}
	
