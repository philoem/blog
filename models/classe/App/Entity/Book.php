<?php
namespace classe\App\Entity;
use \PDO;

/**
 * classe Book 
 * Entitée correspondante à la table book
 */

class Book {

    /**
     * @var int $id
     * Identifiant du billet 
     */
    private $id;

    /**
     * @var string $title
     * Titre du billet 
     */
    private $title;

    /**
     * @var string $billet
     * Contenu du billet 
     */
    private $billet;

    /**
     * @var int $approuved
     * Billet approuvé ou non par l'administrateur pour l'édition ou non du billet 
     */
    private $approuved;

    /**
     * @var int $delete_book
     * Champs servant à envoyer dans l'url un 0 ou un 1
     */
    private $delete_book;

    
    /**
     * Get $id
     *
     * @return  int
     */ 
    public function get_id()
    {
        return $this->id;
    }

    ///**
    // * Uniquement le getter et pas de setter
    // * @return int
    // */
    //public function getIdBook() {
//
    //    return $this->id;
//
    //}

    /**
     * Setter du champs title
     * @param $title
     * @return Book
     */
    public function setTitle(string $title)
    {
        $this->title = $title;
        return $this;
       

    }
    /**
     * Getter du champs title
     * 
     */
    public function getTitle()
    {
        
        return $this->title;

    }

    /**
     * Setter du champs billet
     * @param $billet
     * @return Book
     */
    public function setBillet(string $billet)
    {

        $this->billet = $billet;
        return $this;
    
    }
    /**
     * Getter du champs billet
     * 
     */
    public function getBillet()
    {
        
        return $this->billet;

    }

    /**
     * Setter du champs approuved
     * @param int $approuved
     * @return Book
     */
    public function setApprouved(int $approuved)
    {
    
        $this->approuved = $approuved;
        return $this;
      
    }
    /**
     * Getter du champs approuved
     * @return 0 ou 1
     */
    public function getApprouved()
    {
        
        return $this->approuved;

    }

    /**
     * Setter du champs delete_book
     * @param int $delete_book
     * @return Book
     */
    public function setDeleteBook(int $delete_book)
    {
     
        $this->delete_book = $delete_book;
        return $this;
       
    }
    /**
     * Getter du champs delete_book
     * @return 0 ou 1
     */
    public function getDeleteBook()
    {
        
        return $this->delete_book;

    }
  
}