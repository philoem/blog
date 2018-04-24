<?php
session_start();

// Chargement autoloading Composer
require '../vendor/autoload.php';

require '../models/classe/App/Manager/BookManager.php';
use classe\App\Manager\BookManager;
$bookManager = new BookManager();

require '../models/classe/App/Manager/CommentarysManager.php';
use classe\App\Manager\CommentarysManager;
$commentarysManager = new CommentarysManager();

/**
 * Gestion des boutons "Editer" et "Supprimer" pour les billets
 * & gestion des boutons "Conserver" et "supprimer" pour les commentaires signalés
 * De la page admin.php
 */



if (isset($_GET['btn_conserver_commentary']) OR isset($_GET['btn_supprimer_commentary']) OR isset($_GET['btn_conserver_billet']) OR isset($_GET['btn_supprimer_billet']) ) {
    
    $id_commentary = htmlspecialchars($_GET['id_commentary']);
    $id = htmlspecialchars($_GET['id']);
    $approuved_commentary = htmlspecialchars($_GET['approuved_commentary']);
    $approuved_billet= htmlspecialchars($_GET['approuved_billet']);
    $delete_commentary =  htmlspecialchars($_GET['delete_commentary']);
    $delete_book =  htmlspecialchars($_GET['delete_book']);
    
    if (isset($_GET['btn_conserver_commentary']) ) {
        
        $req1 = $commentarysManager->update("UPDATE commentarys SET approuved = 1 WHERE id = $id_commentary");
        header('Location: ../controlers/adminControl.php');  
        
    } else if (isset($_GET['btn_supprimer_commentary'])) {
        
        $req2 = $commentarysManager->delete("DELETE FROM commentarys WHERE id = $id_commentary ");
        header('Location: ../controlers/adminControl.php');      
    }
    
    if (isset($_GET['btn_conserver_billet'])) {
        
        $req3 = $bookManager->update("UPDATE book SET approuved = 1 WHERE id = $id");
        $req3->execute([$approuved_billet]);
        header('Location: ../controlers/adminControl.php');  
        
    } 
    elseif (isset($_GET['btn_supprimer_billet'])) {
        
        $req4 = $bookManager->delete("DELETE book, commentarys FROM book INNER JOIN commentarys ON book.id = commentarys.book_id WHERE book.id = $id  ");
        $req4->execute([$delete_book]);
        header('Location: ../controlers/adminControl.php');      
    }

    
} else {
    
    echo "La requête demandée n'a pas aboutie! ";
    echo '<p><a href="../views/admin.php"><strong>Retour</strong></a></p>';
}
