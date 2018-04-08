<?php
require '../vendor/autoload.php';
use Forteroche\CommentarySignaled;

require_once('../controlers/model.php');
require_once('../controlers/AccesControl.php');
$db = dbConnect();

// Commentaire signalé
$CommentarySignaled = new CommentarySignaled();

$postBilletId = htmlspecialchars($_GET['id']);

// Traitement ici des commentaires signalés avec le bouton
if (isset($_GET['id'] ) AND $_GET['id'] > 0 AND !empty($_GET['id']) AND $_GET['signaled'] == 0) {
  
    $CommentarySignaled->setPostSignaled("UPDATE commentarys SET signaled = 1 WHERE id = $postBilletId ");
    header('Location: ../views/user.php');
} else {
    echo 'Commentaire non signalé !';
} 
   
