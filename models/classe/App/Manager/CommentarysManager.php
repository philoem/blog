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
     * Méthode CRUD, ici la fonction création de commentaire
     * @param string $commentary
     * @return bool true si le commentaire a bien été créé dans la table commentarys
     */
    public function create(&$commentary) {



    }

    /**
     * Méthode CRUD, ici la fonction lit les commentaires signalés de la page user.php 
     * 
     * @return  
     */
    public function readSignaled() {

        $this->pdoStatement = $this->pdo->query('SELECT c.name_user name_user, c.approuved approuved, DATE_FORMAT(c.date_commentary, \'%d/%m/%Y à %Hh%imin%ss\') date_commentary, c.commentary  commentary, c.signaled signaled, b.title title, b.date_billet date_billet 
        FROM commentarys c INNER JOIN book b ON c.book_id = b.id 
        WHERE signaled = 1 ORDER BY date_commentary DESC');
       
       return $this->pdoStatement;

    }

    /**
     * Méthode CRUD, ici la fonction lit le ou les commentaire(s) selectionné(s) dans la page user_comments.php 
     * @param int $statement requête SQL
     * @return 
     */
    public function readId($statement) {

        $this->pdoStatement = $this->pdo->query($statement);
        

        return $this->pdoStatement;
        
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