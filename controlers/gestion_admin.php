<?php
require '../models/classe/App/Manager/BookManager.php';
use classe\App\Manager\BookManager;
$bookManager = new BookManager();

require '../models/classe/App/Manager/CommentarysManager.php';
use classe\App\Manager\CommentarysManager;
$commentarysManager = new CommentarysManager();

/**
 * Gestion des boutons "Editer" et "Supprimer" pour les billets
 * & gestion des boutons "Conserver" et "supprimer" pour les commentaires signalés
 */

// Traitement ici du bouton "Conserver" des commentaires signalés
$id_commentary = htmlspecialchars($_GET['id_commentary']);
$approuved = htmlspecialchars($_GET['approuved']);
$delete =  htmlspecialchars($_GET['delete']);

if (isset($id_commentary) AND !empty($id_commentary) AND $approuved == 0 AND $delete == 0) {
    
    if ($_POST['btn_conserver_commentary'] == 0) {
        
        $req = $commentarysManager->update("UPDATE commentarys SET approuved = 1 WHERE id = $id_commentary");
        $req->execute([$approuved]);
        header('Location: ../views/admin.php');  

    } 
    if ($_POST['btn_supprimer_commentary'] == 0) {

        $req = $commentarysManager->delete("DELETE FROM commentarys WHERE id = $id_commentary");
        $req->execute([$delete]);
        header('Location: ../views/admin.php');      
    }

} else {
    
    echo 'Erreur 404';
    echo '<p><a href="../views/admin.php"><strong>Retour</strong></a></p>';
}
//Pour la gestion des billets avec les boutons "Editer" et "Supprimer"          
$id = htmlspecialchars($_GET['id']);
$approuved = htmlspecialchars($_GET['approuved']);
$delete =  htmlspecialchars($_GET['delete']);

if (isset($id) AND !empty($id) AND $approuved == 0 AND $delete == 0) {
    
    if ($_POST['btn_conserver_billet'] == 0) {
        
        $req = $bookManager->update("UPDATE book SET approuved = 1 WHERE id = $id");
        $req->execute([$approuved]);
        header('Location: ../views/admin.php');  

    } 
    if ($_POST['btn_supprimer_billet'] == 0) {

        $req = $bookManager->delete("DELETE FROM book WHERE id = $id");
        $req->execute([$delete]);
        header('Location: ../views/admin.php');      
    }

} else {
    
    echo 'Erreur 404';
    echo '<p><a href="../views/admin.php"><strong>Retour</strong></a></p>';
}