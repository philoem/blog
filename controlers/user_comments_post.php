<?php
require '../vendor/autoload.php';
use Forteroche\CommentarySignaled;

require_once('../controlers/model.php');
require_once('../controlers/AccesControl.php');
$db = dbConnect();

// Redirection 
//header('Location: ../views/user_comments.php');

// Appel du formulaire de création d'un nouveau billet
$CommentarySignaled = new CommentarySignaled();

$postBilletId = htmlspecialchars($_GET['id']);

if (isset($_POST['btnSignaled'])) {
    if (!empty($_GET['id'] )) {
        $req = $db->exec("UPDATE commentarys SET signaled = 1 WHERE signaled = 0 ");
        $CommentarySignaled->setPostSignaled();
        
    }  
   
} else {
    header('Location: ../views/user_comments.php');
}