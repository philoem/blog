<?php
require '../vendor/autoload.php';
use Forteroche\CommentarySignaled;

require_once('../controlers/model.php');
require_once('../controlers/AccesControl.php');
$db = dbConnect();

// Instanciation
$CommentarySignaled = new CommentarySignaled();

$postBilletId = htmlspecialchars($_GET['id']);
$signaled = htmlspecialchars($_GET['signaled']);
$îd_commentary = htmlspecialchars($_GET['id_commentary']);

// Traitement ici des commentaires signalés avec le bouton
if (isset($_GET['id'] ) AND $_GET['id'] > 0 AND !empty($_GET['id']) AND $_GET['signaled'] == 0) {
    
  
    $CommentarySignaled->setPostSignaled("UPDATE commentarys SET signaled = 1 WHERE id = $îd_commentary ");
   
    var_dump($postBilletId);
    
    header('Location: ../views/user_comments.php?id=' .$postBilletId );

} else {
    echo 'Commentaire non signalé !';
} 
