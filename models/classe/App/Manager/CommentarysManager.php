<?php
namespace classe\App\Manager;

use \PDO;
use classe\App\Entity\Commentarys;

/**
 * classe CommentarysManager héritée de la classe parente DbConnect
 * 
 */

class CommentarysManager extends DbConnect  {

    /**
     * Variable qui va servir à stocker les requêtes (query et prepare)
     */
    private $pdoStatement;

    
    /**
     * Méthode CRUD, ici la fonction création de commentaire de la page user_comments.php
     *
     * @return 
     */
    public function create(Commentarys $commentarys)
    {
        
        $this->pdoStatement = $this->getPDO()->prepare('INSERT INTO commentarys(name_user, commentary, approuved, signaled, delete_commentary, book_id, date_commentary) VALUES(:name_user, :commentary, 0, 0, 0, :book_id, NOW())');
        
        $this->pdoStatement->bindValue(':name_user', $commentarys->get_name_user(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':commentary', $commentarys->get_commentary(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':book_id', $commentarys->get_book_id(), PDO::PARAM_INT);
        
        return $this->pdoStatement->execute();     

    }

    /**
     * Méthode CRUD, ici la fonction lit les commentaires signalés de la page user.php 
     * 
     * @return  
     */
    public function readSignaled()
    {

        $this->pdoStatement = $this->getPDO()->query('SELECT c.id id, c.name_user name_user, c.approuved approuved, c.delete_commentary delete_commentary, DATE_FORMAT(c.date_commentary, \'%d/%m/%Y à %Hh%imin%ss\') date_commentary, c.commentary  commentary, c.signaled signaled, b.title title, b.date_billet date_billet 
        FROM commentarys c INNER JOIN book b ON c.book_id = b.id 
        WHERE signaled = 1 ORDER BY date_commentary DESC');
       
       return $this->pdoStatement;

    }

    /**
     * Méthode CRUD, ici la fonction lit le ou les commentaire(s) selectionné(s) dans la page user_comments.php 
     * @param int $statement requête SQL
     * @return 
     */
    public function readId($postId)
    {

        $this->pdoStatement = $this->getPDO()->prepare('SELECT id, name_user, commentary, approuved, signaled, delete_commentary, book_id, DATE_FORMAT(date_commentary, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentary FROM commentarys WHERE id = :id ORDER BY date_commentary DESC');
        
        $post = $this->pdoStatement->execute(['id' => $postId]);
        $post = $this->pdoStatement->fetch(PDO::FETCH_ASSOC);
        
        return $post;
        
    }
    
    /**
     * Méthode CRUD, ici la fonction lit les 5 derniers commentaires
     * 
     * @return  
     */
    public function read()
    {

        $this->pdoStatement = $this->getPDO()->query('SELECT c.name_user name_user, c.approuved approuved, DATE_FORMAT(c.date_commentary, \'%d/%m/%Y à %Hh%imin%ss\') date_commentary, c.commentary  commentary, c.signaled signaled, b.title title, b.date_billet date_billet 
        FROM commentarys c INNER JOIN book b ON c.book_id = b.id 
        ORDER BY date_commentary DESC LIMIT 0, 5 ');
       
       return $this->pdoStatement;

    }
    /**
     * Méthode CRUD, ici la fonction lit tous les commentaires liés au billets dans la page user_comments.php
     * 
     * @return bool | billet | false en cas d'erreur de lecture de la bdd ou un objet billet si ok et qui sera affiché 
     */
    public function readAll()
    {

        $this->pdoStatement = $this->getPDO()->query('SELECT * FROM commentarys ORDER BY date_commentary DESC ');
        
        $commentarys = [];
        while($comment = $this->pdoStatement->fetch(PDO::FETCH_ASSOC)) {
            $commentarys[] = $comment;
        }
        return $commentarys;

    }

    /**
     * Méthode CRUD, ici modification des commentaires
     * @param string $statement Requête SQL
     * @return 
     */
    public function update($statement)
    {

        $this->pdoStatement = $this->getPDO()->exec($statement);
               
        return $this->pdoStatement;


    }

    public function deleteTest(Commentarys $commentarys)
    {

        $this->pdoStatement = $this->getPDO()->prepare('DELETE FROM commentarys WHERE id = :id LIMIT 1');
        
        $this->pdoStatement->bindValue(':id', $commentarys->get_id(), PDO::PARAM_INT);
                
        return $this->pdoStatement->execute();

    }

    /**
     * Méthode CRUD, ici suppression des commentaires
     * @param int $statement Requête SQL
     * @return 
     */
    public function delete($statement)
    {

        $this->pdoStatement = $this->getPDO()->exec($statement);
        
        return $this->pdoStatement;

    }

}