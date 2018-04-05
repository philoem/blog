<?php
namespace Forteroche;
use \PDO;
//require 'DbConnect.php';
/**
 * class CommentarysManager 
 * Gère l'affichage des commentaires dans la page admin.php 
 */

class CommentarysManager {

        
    public function getPosts($statement) {
    
        $db = $this->dbConnect();
        $req = $db->query($statement);

        return $req;
    }

    public function getPost($postId) {
   
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, name_user, commentary, approuved, signaled, book_id, DATE_FORMAT(date_commentary, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentary FROM commentarys WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
    }

    /**
     * @return $req string
     * Pour la page admin.php, l'affichage des commentaires signalés
     */
    public function getPostSignaled() {
    
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, name_user, commentary, approuved, signaled, book_id, DATE_FORMAT(date_commentary, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentary FROM commentarys WHERE signaled= 1 ORDER BY date_commentary DESC LIMIT 0, 5');
        
        return $req;
    }

  
    private function dbConnect() {
    
        $db = new PDO('mysql:host=localhost;dbname=projet_4;charset=utf8', 'root', '');
        return $db;
    }


}