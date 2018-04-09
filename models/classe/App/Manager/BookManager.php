<?php
namespace classe\App\Manager;

use \PDO;
use classe\App\Entity\Book;

/**
 * classe BookManager 
 * Pour la page admin2.php
 */

class BookManager {

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
     * Le constructeur de la classe BookManger
     * Connexion à la base de données
     */
    public function __construct() {

        $this->pdo = new PDO('mysql:host=localhost;dbname=projet_4;charset=utf8', 'root', '');


    }

    /**
     * Méthode CRUD, ici la fonction création de billet
     * @param string $billet passé par référence pour avoir un id sur le billet
     * @return bool true si le billet a bien été créé dans la table book
     */
    public function create(&$billet) {

        



    }

    /**
     * Méthode CRUD, ici la fonction lit les billets
     * @param int $id Identifiant d'un billet
     * @return bool | billet | false en cas d'erreur de lecture de la bdd ou un objet billet si ok et qui sera affiché 
     */
    public function read($id) {

        $this->pdoStatement = $this->pdo->prepare('SELECT * FROM book WHERE id = :id');
        $this->pdoStatement->bindValue(':id', $id, PDO::PARAM_INT);
        $executeOk = $this->pdoStatement->execute();

        if ($executeOk) {
            $billet = $this->pdoStatement->fetchObject('classe\App\Entity\Book');


        } else {
            return false;
        }


    }
    /**
     * Méthode CRUD, ici la fonction lit tous les billets du roman
     * 
     * @return bool | billet | false en cas d'erreur de lecture de la bdd ou un objet billet si ok et qui sera affiché 
     */
    public function readAll() {

        $this->pdoStatement = $this->pdo->query('SELECT * FROM book ORDER BY date_billet DESC ');
        $billets = [];
        while($billet = $this->pdoStatement->fetch()) {
            $billets[] = $billet;
        }
        return $billets;

    }

    /**
     * Méthode CRUD, ici modification des billets
     * @param int $id Identifiant d'un billet
     * @return bool true ou false en cas d'erreur de modification du billet dans la bdd ou ok si le billet a bien été modifié 
     */
    public function update($id) {



    }

    /**
     * Méthode CRUD, ici suppression des billets
     * @param int $id Identifiant d'un billet
     * @return bool true ou false en cas d'erreur de suppression dans la bdd ou ok si le billet a bien été supprimé 
     */
    public function delete($id) {



    }


}