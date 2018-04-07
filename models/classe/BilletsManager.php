<?php
namespace Forteroche;
use \PDO;
/**
 * class BilletsManager 
 * Gère l'affichage des billets dans la page admin.php et user.php
 */

class BilletsManager {

    /**
     * @param $postBilletId string ici la requête SQL
     * @return string
     * Récupère les billets, ici les 2derniers pour la page admin.php
     */
    public function getPostsBillets()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, billet, approuved, DATE_FORMAT(date_billet, \'%d/%m/%Y à %Hh%imin%Ss\') AS date_billet FROM book ORDER BY date_billet DESC LIMIT 0, 2');

        return $req;
    }

    /**
     * @param $statement string ici la requête SQL
     * @return string
     * Affiche le titre du dernier billet en vedette dans la carte de Bootstrap
     */
    public function getPostsBilletsUserTitle($statement)
    {
        $db = $this->dbConnect();
        $req = $db->query($statement);

        return $req;
    }

    /**
     * @param $postBilletId int / Ici l'id du billet récupéré via l'url
     * @return string
     * Affiche le billet seléctionné, de la page user.php, pour l'afficher sur la page user_comments.php 
     */
    public function getPostBillets($postBilletId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, billet, approuved, DATE_FORMAT(date_billet, \'%d/%m/%Y à %Hh%imin%ss\') AS date_billet FROM book WHERE id = ?');
        $req->execute(array($postBilletId));
        $post = $req->fetch();

        return $post;
    }

    /**
     * @return $db private
     * Connexion à la base de données "projet_4" , pas de modification possible
     */
    private function dbConnect()
    {
        $db = new PDO('mysql:host=localhost;dbname=projet_4;charset=utf8', 'root', '');
        return $db;
    }


}