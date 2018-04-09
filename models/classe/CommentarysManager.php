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
     * Assesseur pour enregistrer un commentaire signalé
     * @return le champs "signaled" et "book_id" de la table
     */
    public function getPostSignaled($statement) {
    
        $db = $this->dbConnect();
        $req = $db->exec($statement);
                
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