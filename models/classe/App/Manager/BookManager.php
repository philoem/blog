<?php
namespace classe\App\Manager;

use \PDO;
use classe\App\Entity\Book;

/**
 * classe BookManager héritée de la classe DbConnect
 * Pour la page admin2.php
 */

class BookManager extends DbConnect {

    /**
     * Variable qui va servir à stocker les requêtes (query, prepare et exec)
     */
    private $pdoStatement;

  
    /**
     * Méthode CRUD, ici la fonction création de billet qui ne pourra se faire que sur la page admin2.php par l'administrateur
     * 
     * @return 
     */
    public function create(Book $book) {

        $this->pdoStatement = $this->getPDO()->prepare('INSERT INTO book(title, billet, approuved, delete_book, date_billet) VALUES(:title, :billet, 0, 0, NOW())');
        $this->pdoStatement->bindValue(':title', $book->getTitle(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':billet', $book->getBillet(), PDO::PARAM_STR);
        
        
        return $this->pdoStatement->execute();     

    }

    /**
     * Méthode CRUD, ici la fonction lit les 4 billets selectionnés de la page user.php 
     * @param int $statement Correspond à la requête SQL
     * @return bool | billet | false en cas d'erreur de lecture de la bdd ou un objet billet si ok et qui sera affiché 
     */
    public function readStatement($statement) {

        $this->pdoStatement = $this->getPDO()->query($statement);
        return $this->pdoStatement;

    }
    
    /**
     * Méthode CRUD, ici la fonction lit le billet selectionné dans la page user.php pour pouvoir l'afficher dans la page user_comments.php
     * @param int $postBilletId Identifiant d'un billet
     * @return bool | billet | false en cas d'erreur de lecture de la bdd ou un objet billet si ok et qui sera affiché 
     */
    public function read($postBilletId) {

        $this->pdoStatement = $this->getPDO()->prepare('SELECT id, title, billet, approuved, delete_book, DATE_FORMAT(date_billet, \'%d/%m/%Y à %Hh%imin%ss\') AS date_billet FROM book WHERE id = ?');
        
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

        $this->pdoStatement = $this->getPDO()->query('SELECT * FROM book ORDER BY date_billet DESC ');
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

        $this->pdoStatement = $this->getPDO()->prepare('SELECT * FROM book WHERE id = :id ');
        $this->pdoStatement->bindValue(':id', $id->getIdBook(), PDO::PARAM_INT);
        $executeOk = $this->pdoStatement->execute();

    }


    /**
     * Méthode CRUD, ici modification des billets
     * @param int $statement Requête SQL
     * @return 
     */
    public function update($statement) {

        $this->pdoStatement = $this->getPDO()->prepare($statement);
        

        return $this->pdoStatement;

    }

    /**
     * Méthode CRUD, ici suppression des billets
     * @param int $statement Requête SQL
     * @return 
     */
    public function delete($statement) {

        $this->pdoStatement = $this->getPDO()->prepare($statement);
        

        return $this->pdoStatement;


    }


}