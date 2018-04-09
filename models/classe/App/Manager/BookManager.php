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
     * Variable qui va servir à stocker les requêtes (query, prepare et exec)
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
     * Méthode CRUD, ici la fonction création de billet qui ne pourra se faire que sur la page admin2.php par l'administrateur
     * 
     * @return 
     */
    public function create() {

        $this->pdoStatement = $this->pdo->prepare('INSERT INTO book(title, billet, approuved, date_billet) VALUES(?, ?, 0, NOW())');
        $this->pdoStatement->bindValue(':title', PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':billet', PDO::PARAM_STR);
        
       return $this->pdoStatement;     

    }

    /**
     * Méthode CRUD, ici la fonction lit les 4 billets selectionnés de la page user.php 
     * @param int $statement Correspond à la requête SQL
     * @return bool | billet | false en cas d'erreur de lecture de la bdd ou un objet billet si ok et qui sera affiché 
     */
    public function readStatement($statement) {

        $this->pdoStatement = $this->pdo->query($statement);
        return $this->pdoStatement;

    }
    
    /**
     * Méthode CRUD, ici la fonction lit le billet selectionné dans la page user.php pour pouvoir l'afficher dans la page user_comments.php
     * @param int $postBilletId Identifiant d'un billet
     * @return bool | billet | false en cas d'erreur de lecture de la bdd ou un objet billet si ok et qui sera affiché 
     */
    public function read($postBilletId) {

        $this->pdoStatement = $this->pdo->prepare('SELECT id, title, billet, approuved, DATE_FORMAT(date_billet, \'%d/%m/%Y à %Hh%imin%ss\') AS date_billet FROM book WHERE id = ?');
        $post = $this->pdoStatement->execute([$postBilletId]);
        $post = $this->pdoStatement->fetch();

        return $post;
        
    }
    /**
     * Méthode CRUD, ici la fonction lit tous les billets du roman dans la page user_post.php
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
     * Méthode CRUD, ici la fonction lit tous les billets du roman dans la page user_post.php
     * 
     * @return bool | billet | false en cas d'erreur de lecture de la bdd ou un objet billet si ok et qui sera affiché 
     */
    public function readId($id) {

        $this->pdoStatement = $this->pdo->prepare('SELECT * FROM book WHERE id = :id ');
        $this->pdoStatement->bindValue(':id', $id, PDO::PARAM_INT);
        $executeOk = $this->pdoStatement->execute();

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