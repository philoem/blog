<?php
namespace Forteroche;
use \PDO;
require 'DbConnect.php';
/**
 * class CommentarysManager 
 * Gère l'affichage des commentaires dans la page admin.php 
 */

class CommentarysManager {

    public function getPosts() {
    
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, name_user, commentary, approuved, signaled, book_id, DATE_FORMAT(date_commentary, \'%d/%m/%Y à %Hh%imin%Ss\') AS date_commentary FROM commentarys ORDER BY date_commentary DESC LIMIT 0, 5');

        return $req;
    }

    public function getPost($postId) {
   
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, name_user, commentary, approuved, signaled, book_id, DATE_FORMAT(date_commentary, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentary FROM commentarys WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
    }

    public function getPostSignaled() {
    
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, name_user, commentary, approuved, signaled, book_id, DATE_FORMAT(date_commentary, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentary FROM commentarys ORDER BY date_commentary DESC LIMIT 0, 5 WHERE signaled = ?');
        
        return $req;
    }

    /**
     * Assesseur pour enregistrer un commentaire signalé
     * @return le champs "signaled" et "book_id" de la table
     */
    public function setPostSignaled() {
    
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO commentarys(signaled, book_id) VALUES(?, ?)');
        $req->execute(array($_POST['signaled'], $_POST['book_id']));

        return $req;
    }



    private function dbConnect() {
    
        $db = new PDO('mysql:host=localhost;dbname=projet_4;charset=utf8', 'root', '');
        return $db;
    }


}