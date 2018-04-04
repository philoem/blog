<?php
namespace Forteroche;
use \PDO;
/**
 * class BilletsManager 
 * Gère l'affichage des billets dans la page admin.php 
 */

class BilletsManager {

    public function getPostsBillets()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, billet, approuved, DATE_FORMAT(date_billet, \'%d/%m/%Y à %Hh%imin%Ss\') AS date_billet FROM book ORDER BY date_billet DESC LIMIT 0, 2');

        return $req;
    }

    public function getPostBillets($postBilletId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, billet, approuved, DATE_FORMAT(date_billet, \'%d/%m/%Y à %Hh%imin%ss\') AS date_billet FROM book WHERE id = ?');
        $req->execute(array($postBilletId));
        $post = $req->fetch();

        return $post;
    }


    private function dbConnect()
    {
        $db = new PDO('mysql:host=localhost;dbname=projet_4;charset=utf8', 'root', '');
        return $db;
    }


}