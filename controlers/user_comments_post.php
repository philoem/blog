<?php
/**
 * 
 * Gestion du formulaire de la page user_comments.php pour le formulaire de création des commentaires et des boutons de signalements des commentaires
 * 
 */

//require '../vendor/autoload.php';
//use Forteroche\CommentarysManager;

require '../models/classe/App/Manager/BookManager.php';
use classe\App\Manager\BookManager;
// Instanciation
$bookManager = new BookManager();
require '../models/classe/App/Entity/Book.php';
use classe\App\Entity\Book;
// Instanciation
$book = new Book();

require '../models/classe/App/Manager/CommentarysManager.php';
use classe\App\Manager\CommentarysManager;
// Instanciation
$commentarysManager = new CommentarysManager();
require '../models/classe/App/Entity/Commentarys.php';
use classe\App\Entity\Commentarys;
// Instanciation
$commentarys = new Commentarys();

// Ici traitement du formulaire
if (isset($_POST['submit_commentary'])) {
    if(isset($_POST['book_id']) AND !empty($_POST['book_id'])) {
        $_POST['book_id'] = (int) $_POST['book_id'];
        
        $name_user = $commentarys->setNameUser(htmlspecialchars($_POST['name_user']));
        $commentary = $commentarys->setCommentary(htmlspecialchars($_POST['commentary']));
        $book_id = $commentarys->setBookId(htmlspecialchars($_POST['book_id']));
        var_dump($book_id);
        
        //if(isset($_POST['book_id'])) {
        //    $postId = $commentarys->setBookId(htmlspecialchars($_POST['book_id']));
        //} else {
        //    
        //    echo "Pas d'id passée dans l'url via le champs 'book_id'";
        //    echo '<p><a href="../views/user_comments.php"><strong>Retour</strong></a></p>';
        //}

        
        if (isset($name_user) AND isset($commentary)) {
                    
            $commentarysManager->create($commentarys);
            
            header('Location: ../views/user_comments.php'. $_GET['id'] );
            
        
        } else {
        
            echo "La requête demandée n'a pas aboutie! ";
            echo '<p><a href="../views/user_comments.php"><strong>Retour</strong></a></p>';
        }
    }
} else {
    echo "Pas de billet sélectionné !";
    echo '<p><a href="../views/user_comments.php"><strong>Retour</strong></a></p>';
}

// Traitement ici des commentaires signalés avec le bouton
//$postBilletId = htmlspecialchars($_GET['id']);
//$signaled = htmlspecialchars($_GET['signaled']);
//$îd_commentary = htmlspecialchars($_GET['id_commentary']);
//
//if (isset($_GET['id'] ) AND $_GET['id'] > 0 AND !empty($_GET['id']) AND $_GET['signaled'] == 0) {
//      
//    $CommentarysManager->getPostSignaled("UPDATE commentarys SET signaled = 1 WHERE id = $îd_commentary ");
//   
//    header('Location: ../views/user_comments.php?id=' .$postBilletId );
//
//} else {
//    echo 'Commentaire non signalé !';
//} 