<?php
namespace classe\App\Entity;
use \PDO;

/**
 * classe Commentarys 
 * Entitée correspondante à la table commentarys
 */

class Commentarys {

    /**
     * @var int $id
     * Identifiant du commentaire 
     */
    private $id;

    /**
     * @var string $name_user
     * Nom du commentateur
     */
    private $name_user;

    /**
     * @var string $_commentary
     * Contenu du billet 
     */
    private $commentary;

    /**
     * @var int $approuved
     * Commentaire approuvé ou non
     */
    private $approuved;
    
       
    /**
     * @var int $signaled
     * Commentaire signalé ou non
     */
    private $signaled;

    /**
     * @var int $delete_commentary
     * Champs pour gérer les boutons qui signalent les commentaires, et pour faire passer dans l'url un 0 ou un 1
     */
    private $delete_commentary;

    /**
     * @var int $book_id
     * Identifiant du billet de la table book 
     */
    private $book_id;

        
    /**
     * Get $id
     *
     * @return  int
     */ 
    public function get_id()
    {
        return $this->id;
    }

    
    /**
     * Get $name_user
     *
     * @return  string
     */ 
    public function get_name_user()
    {
        return $this->name_user;
    }

    /**
     * Set $name_user
     *
     * @param  string  $name_user  
     *
     * @return  self
     */ 
    public function set_name_user(string $name_user)
    {
        $this->name_user = $name_user;
        return $this;
      
    }

    /**
     * Get $commentary
     *
     * @return  string
     */ 
    public function get_commentary()
    {
        return $this->commentary;
    }

    /**
     * Set $commentary
     *
     * @param  string  $commentary  
     * @return  self
     */ 
    public function set_commentary(string $commentary)
    {
        $this->commentary = $commentary;
        return $this;
       
    }

    /**
     * Get $approuved
     *
     * @return  int
     */ 
    public function getapprouved()
    {
        return $this->approuved;
    }

    /**
     * Set $approuved
     *
     * @param  int  $approuved  
     *
     * @return  self
     */ 
    public function set_approuved(int $approuved)
    {
              
        $this->approuved = $approuved;
        return $this;
        
    }

    
    /**
     * Get $signaled
     *
     * @return  int
     */ 
    public function get_signaled()
    {
        return $this->signaled;
    }

    /**
     * Set $signaled
     *
     * @param  int  $signaled  
     *
     * @return  self
     */ 
    public function set_signaled(int $signaled)
    {
             
        $this->signaled = $signaled;
            return $this;
       
    }

    
    /**
     * Get $delete_commentary
     *
     * @return  int
     */ 
    public function get_delete_commentary()
    {
        return $this->delete_commentary;
    }

    /**
     * Set $delete_commentary
     *
     * @param  int  $delete_commentary  
     *
     * @return  self
     */ 
    public function set_delete_commentary(int $delete_commentary)
    {
                  
        $this->delete_commentary = $delete_commentary;
        return $this;
       
    }
    
    /**
     * Get $book_id
     *
     * @return  int
     */ 
    public function get_book_id()
    {
        return $this->book_id;
    }

    /**
     * Set $book_id
     *
     * @param  int  $book_id  
     *
     * @return  self
     */ 
    public function set_book_id(int $book_id)
    {
               
        if($book_id > 0) {
           
            $this->book_id = $book_id;
            return $this;
        }
    }
}