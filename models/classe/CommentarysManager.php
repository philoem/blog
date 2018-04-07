<?php
namespace Forteroche;
use \PDO;

/**
 * class CommentarysManager 
 * Gère l'affichage des commentaires dans la page admin.php 
 */

class CommentarysManager {

    /**
     * @param $statement string
     * @return $req string
     * Pour les pages admin.php et user_comments.php, l'affichages des commentaires 
     */    
    public function getComments($statement) {
    
        $db = $this->dbConnect();
        $req = $db->query($statement);

        return $req;
    }

    //public function getPost($postId) {
   //
    //    $db = $this->dbConnect();
    //    $req = $db->prepare('SELECT id, name_user, commentary, approuved, signaled, book_id, DATE_FORMAT(date_commentary, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentary FROM //commentarys WHERE id = ?');
    //    $req->execute(array($postId));
    //    $post = $req->fetch();
//
    //    return $post;
    //}

    /**
     * @return $req string
     * Pour la page admin.php, l'affichage des commentaires signalés
     */
    public function getCommentSignaled($statement) {
    
        $db = $this->dbConnect();
        $req = $db->query($statement);
        
        return $req;
    }

    /**
     * @return $db private
     * Connexion à la base de données "projet_4" , pas de modification possible
     */
    private function dbConnect() {
    
        $db = new PDO('mysql:host=localhost;dbname=projet_4;charset=utf8', 'root', '');
        return $db;
    }


}