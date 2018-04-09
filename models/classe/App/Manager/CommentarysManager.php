<?php
namespace classe\App\Manager;

use \PDO;
use classe\App\Entity\Commentarys;

/**
 * classe CommentarysManager 
 * 
 */

class CommentarysManager {

    /**
     * @var $pdo Objet servant à toutes les classes dnas plusieurs méthodes pour accéder à la base de données "projet_4"
     * 
     */
    private $_pdo;

    /**
     * Variable qui va servir à stocker les requêtes (query et prepare)
     */
    private $pdoStatement;

    
    /**
     * Le constructeur de la classe CommentarysManager
     * Connexion à la base de données
     */
    public function __construct() {



    }

    /**
     * Méthode CRUD, ici la fonction création de commentaire
     * @param string $commentary
     * @return bool true si le commentaire a bien été créé dans la table commentarys
     */
    public function create(&$commentary) {



    }

    /**
     * Méthode CRUD, ici la fonction lit les commentaires
     * @param int $commentary Identifiant d'un commentaire
     * @return bool | commentary | false en cas d'erreur de lecture de la bdd ou un objet commentary si ok et qui sera affiché 
     */
    public function read($commentary) {



    }

    /**
     * Méthode CRUD, ici modification des commentaires
     * @param int $id Identifiant d'un commentaire
     * @return bool true ou false en cas d'erreur de modification du commentaire dans la bdd ou ok si le commentaire a bien été modifié 
     */
    public function update($id) {



    }

    /**
     * Méthode CRUD, ici suppression des commentaires
     * @param int $id Identifiant d'un commentaire
     * @return bool true ou false en cas d'erreur de suppression dans la bdd ou ok si le commentaire a bien été supprimé 
     */
    public function delete($id) {



    }


}