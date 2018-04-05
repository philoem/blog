<?php
require '../vendor/autoload.php';
use Forteroche\CommentarySignaled;

require_once('../controlers/model.php');
require_once('../controlers/AccesControl.php');
$db = dbConnect();

// Redirection 
//header('Location: ../views/user_comments.php');

// Appel du formulaire de création d'un nouveau billet
//$CommentarySignaled = new CommentarySignaled();

$postBilletId = htmlspecialchars($_GET['id']);

if (isset($_POST['btnSignaled'])) {
    if (isset($_GET['id'] ) AND $_GET['id'] > 0) {
        $req = $db->exec("UPDATE commentarys SET signaled = 1 WHERE signaled = 0 ");
        //$CommentarySignaled->setPostSignaled($_GET['id']);
                
        header('Location: ../views/user_comments.php');
    }  
   
} else {
}