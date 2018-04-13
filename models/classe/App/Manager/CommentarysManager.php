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

        $this->pdo = new PDO('mysql:host=localhost;dbname=projet_4;charset=utf8', 'root', '');

    }

    /**
     * Méthode CRUD, ici la fonction création de commentaire de la page user_comments.php
     *
     * @return 
     */
    public function create(Commentarys $commentarys) {

        $this->pdoStatement = $this->pdo->prepare('INSERT INTO commentarys(name_user, commentary, approuved, signaled, delete_commentary, book_id, date_commentary) VALUES(:name_user, :commentary, 0, 0, 0, :book_id, NOW)');
        $this->pdoStatement->bindValue(':name_user', $commentarys->getNameUser(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':commentary', $commentarys->getCommentary(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':book_id', $commentarys->getBookId(), PDO::PARAM_INT);
        
        return $this->pdoStatement->execute();     


    }

    /**
     * Méthode CRUD, ici la fonction lit les commentaires signalés de la page user.php 
     * 
     * @return  
     */
    public function readSignaled() {

        $this->pdoStatement = $this->pdo->query('SELECT c.id id, c.name_user name_user, c.approuved approuved, c.delete_commentary delete_commentary, DATE_FORMAT(c.date_commentary, \'%d/%m/%Y à %Hh%imin%ss\') date_commentary, c.commentary  commentary, c.signaled signaled, b.title title, b.date_billet date_billet 
        FROM commentarys c INNER JOIN book b ON c.book_id = b.id 
        WHERE signaled = 1 ORDER BY date_commentary DESC');
       
       return $this->pdoStatement;

    }

    /**
     * Méthode CRUD, ici la fonction lit le ou les commentaire(s) selectionné(s) dans la page user_comments.php 
     * @param int $statement requête SQL
     * @return 
     */
    public function readId($postId) {

        $this->pdoStatement = $this->pdo->prepare('SELECT id, name_user, commentary, approuved, signaled, delete_commentary, book_id, DATE_FORMAT(date_commentary, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentary FROM commentarys WHERE id = ? ORDER BY date_commentary DESC');
        $post = $this->pdoStatement->execute([$postId]);
        $post = $this->pdoStatement->fetch();

        return $post;
        
    }
    
    /**
     * Méthode CRUD, ici la fonction lit les 5 derniers commentaires
     * 
     * @return  
     */
    public function read() {

        $this->pdoStatement = $this->pdo->query('SELECT c.name_user name_user, c.approuved approuved, DATE_FORMAT(c.date_commentary, \'%d/%m/%Y à %Hh%imin%ss\') date_commentary, c.commentary  commentary, c.signaled signaled, b.title title, b.date_billet date_billet 
        FROM commentarys c INNER JOIN book b ON c.book_id = b.id 
        ORDER BY date_commentary DESC LIMIT 0, 5 ');
       
       return $this->pdoStatement;

    }

    public function updateTest(Commentarys $commentarys) {

        $this->pdoStatement = $this->pdo->prepare('UPDATE commentarys SET approuved = :1 WHERE id =:id LIMIT 1');
        $this->pdoStatement->bindValue(':1', $commentarys->getApprouved(), PDO::PARAM_INT);
        $this->pdoStatement->bindValue(':id', $commentarys->getId(), PDO::PARAM_INT);
                
        return $this->pdoStatement->execute();

    }

    /**
     * Méthode CRUD, ici modification des commentaires
     * @param int $statement Requête SQL
     * @return 
     */
    public function update($statement) {

        $this->pdoStatement = $this->pdo->prepare($statement);
        

        return $this->pdoStatement;


    }

    public function deleteTest(Commentarys $commentarys) {

        $this->pdoStatement = $this->pdo->prepare('DELETE FROM commentarys WHERE id = :id LIMIT 1');
        $this->pdoStatement->bindValue(':id', $commentarys->getId(), PDO::PARAM_INT);
                
        return $this->pdoStatement->execute();

    }

    /**
     * Méthode CRUD, ici suppression des commentaires
     * @param int $statement Requête SQL
     * @return 
     */
    public function delete($statement) {

        $this->pdoStatement = $this->pdo->prepare($statement);
        

        return $this->pdoStatement;

    }


}