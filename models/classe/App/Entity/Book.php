<?php
namespace classe\App\Entity;
use \PDO;

/**
 * classe Book 
 * Entitée correspondante à la table book
 */

class Book {

    /**
     * @var int $_id
     * Identifiant du billet 
     */
    private $_id;

    /**
     * @var string $_title
     * Titre du billet 
     */
    private $_title;

    /**
     * @var string $_billet
     * Contenu du billet 
     */
    private $_billet;

    /**
     * @var int $_approuved
     * Billet approuvé ou non par l'administrateur pour l'édition ou non du billet 
     */
    private $_approuved;

    /**
     * @var int $_delete_book
     * Champs servant à envoyer dans l'url un 0 ou un 1
     */
    private $_delete_book;

    /**
     * Uniquement le getter et pas de setter
     * @return int
     */
    public function getIdBook() {

        return $this->id;

    }

    /**
     * Setter du champs title
     * @param $title
     * @return Book
     */
    public function setTitle($title) {

        $this->title = $title;
        return $this;

    }
    /**
     * Getter du champs title
     * 
     */
    public function getTitle() {
        
        return $this->title;

    }

    /**
     * Setter du champs billet
     * @param $billet
     * @return Book
     */
    public function setBillet($billet) {

        $this->billet = $billet;
        return $this;

    }
    /**
     * Getter du champs billet
     * 
     */
    public function getBillet() {
        
        return $this->billet;

    }

    /**
     * Setter du champs approuved
     * @param int $approuved
     * @return Book
     */
    public function setApprouved($approuved) {

        $this->approuved = $approuved;
        return $this;

    }
    /**
     * Getter du champs approuved
     * @return 0 ou 1
     */
    public function getApprouved() {
        
        return $this->approuved;

    }

    /**
     * Setter du champs delete_book
     * @param int $delete_book
     * @return Book
     */
    public function setDeleteBook($delete_book) {

        $this->delete_book = $delete_book;
        return $this;

    }
    /**
     * Getter du champs delete_book
     * @return 0 ou 1
     */
    public function getDeleteBook() {
        
        return $this->delete_book;

    }


}