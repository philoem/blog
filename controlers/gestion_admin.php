<?php
session_start();

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

// Traitement ici des boutons "Conserver" et "Supprimer" des commentaires signalés
$id_commentary = htmlspecialchars($_GET['id_commentary']);
$id = htmlspecialchars($_GET['id']);
$approuved_commentary = htmlspecialchars($_GET['approuved_commentary']);
$approuved_billet= htmlspecialchars($_GET['approuved_billet']);
$delete_commentary =  htmlspecialchars($_GET['delete_commentary']);
$delete_book =  htmlspecialchars($_GET['delete_book']);

if (isset($id)) {
    
    
    if (isset($_GET['btn_conserver_commentary'])) {
        
        $req1 = $commentarysManager->update("UPDATE commentarys SET approuved = 1 WHERE id = $id_commentary");
        $req1->execute([$approuved]);
        header('Location: ../views/admin.php');  
        
    } else if (isset($_GET['btn_supprimer_commentary'])) {
        
        $req2 = $commentarysManager->delete("DELETE FROM commentarys WHERE id = $id_commentary ");
        $req2->execute([$delete]);
        header('Location: ../views/admin.php');      
    }
    
    if (isset($_GET['btn_conserver_billet'])) {
        
        $req3 = $bookManager->update("UPDATE book SET approuved = 1 WHERE id = $id");
        $req3->execute([$approuved_billet]);
        header('Location: ../views/admin.php');  
        
    } 
    elseif (isset($_GET['btn_supprimer_billet'])) {
        
        $req4 = $bookManager->delete("DELETE FROM book WHERE id = $id ");
        $req4->execute([$delete_book]);
        header('Location: ../views/admin.php');      
    }

    
} else {
    
    echo "La requête demandée n'a pas aboutie! ";
    echo '<p><a href="../views/admin.php"><strong>Retour</strong></a></p>';
}
