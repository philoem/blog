<?php
namespace classe\App\Entity;
use \PDO;

/**
 * classe Commentary 
 * Entitée correspondante à la table commentarys
 */

class Commentary {

    /**
     * @var int $_id
     * Identifiant du commentaire 
     */
    private $_id;

    /**
     * @var string $_name_user
     * Nom du commentateur
     */
    private $_name_user;

    /**
     * @var string $_commentary
     * Contenu du billet 
     */
    private $_commentary;

    /**
     * @var int $_approuved
     * Commentaire approuvé ou non
     */
    private $_approuved;
    
       
    /**
     * @var int $_signaled
     * Commentaire signalé ou non
     */
    private $_signaled;

    /**
     * @var int $_book_id
     * Identifiant du billet de la table book 
     */
    private $_book_id;

    /**
     * Uniquement le getter et pas de setter
     * @return int
     */
    public function getCommentaryId() {

        return $this->id;

    }

    /**
     * Setter du champs name_user
     * @param $name_user
     * @return Book
     */
    public function setNameUser($name_user) {

        $this->name_user = $name_user;
        return $this;

    }
    /**
     * Getter du champs name_user
     * @return string  
     */
    public function getNameUser() {
        
        return $this->name_user;

    }

    /**
     * Setter du champs commentary
     * @param $commentary
     * @return Commentarys
     */
    public function setCommentary($commentary) {

        $this->commentary = $commentary;
        return $this;

    }
    /**
     * Getter du champs commentary
     * @return string  
     */
    public function getCommentary() {
        
        return $this->commentary;

    }


    /**
     * Setter du champs approuved
     * @param  int $approuved
     * @return Commentarys
     */
    public function setApprouved($approuved) {

        $this->approuved = $approuved;
        return $this;

    }
    /**
     * Getter du champs approuved
     * @return int  
     */
    public function getApprouved() {
        
        return $this->approuved;

    }

    /**
     * Setter du champs signaled
     * @param  int $signaled
     * @return Commentarys
     */
    public function setSignaled($signaled) {

        $this->signaled = $signaled;
        return $this;

    }
    /**
     * Getter du champs signaled
     * @return int  
     */
    public function getSignaled() {
        
        return $this->signaled;

    }

    /**
     * Setter du champs book_id
     * @param  int $book_id
     * @return Commentarys
     */
    public function setBookId($book_id) {

        $this->book_id = $book_id;
        return $this;

    }
    /**
     * Getter du champs book_id
     * @return int  
     */
    public function getBookId() {
        
        return $this->book_id;

    }


}