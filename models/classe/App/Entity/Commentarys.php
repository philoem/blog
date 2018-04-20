<?php
namespace classe\App\Entity;
use \PDO;

/**
 * classe Commentary 
 * Entitée correspondante à la table commentarys
 */

class Commentarys {

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
     * @var int $_delete_commentary
     * Champs pour gérer les boutons qui signalent les commentaires, et pour faire passer dans l'url un 0 ou un 1
     */
    private $_delete_commentary;

    /**
     * @var int $_book_id
     * Identifiant du billet de la table book 
     */
    private $_book_id;

    public function hydrate(array $datas) {

        foreach ($datas as $key =>$Value) {

            $method = 'set'.ucfirst($key);

            if(method_exist($this, $method)) {

                $this->$method($value);
            }

        }
    }

    
    /**
     * Get $_id
     *
     * @return  int
     */ 
    public function get_id()
    {
        return $this->_id;
    }

    
    /**
     * Get $_name_user
     *
     * @return  string
     */ 
    public function get_name_user()
    {
        return $this->_name_user;
    }

    /**
     * Set $_name_user
     *
     * @param  string  $_name_user  $_name_user
     *
     * @return  self
     */ 
    public function set_name_user(string $_name_user)
    {
        if(is_string($_name_user)) {

            $this->_name_user = $_name_user;
            return $this;
        }
    }

    /**
     * Get $_commentary
     *
     * @return  string
     */ 
    public function get_commentary()
    {
        return $this->_commentary;
    }

    /**
     * Set $_commentary
     *
     * @param  string  $_commentary  $_commentary
     *
     * @return  self
     */ 
    public function set_commentary(string $_commentary)
    {
        if(is_string($_commentary)) {

            $this->_commentary = $_commentary;
            return $this;
        }
    }

    /**
     * Get $_approuved
     *
     * @return  int
     */ 
    public function get_approuved()
    {
        return $this->_approuved;
    }

    /**
     * Set $_approuved
     *
     * @param  int  $_approuved  $_approuved
     *
     * @return  self
     */ 
    public function set_approuved(int $_approuved)
    {
        $_approuved = 0;
       
        if($_approuved = 0) {
       
            $this->_approuved = $_approuved;
            return $this;
        }
    }

    
    /**
     * Get $_signaled
     *
     * @return  int
     */ 
    public function get_signaled()
    {
        return $this->_signaled;
    }

    /**
     * Set $_signaled
     *
     * @param  int  $_signaled  $_signaled
     *
     * @return  self
     */ 
    public function set_signaled(int $_signaled)
    {
        $_signaled = 0;
        
        if($_signaled = 0) {
        
            $this->_signaled = $_signaled;
            return $this;
        }
    }

    
    /**
     * Get $_delete_commentary
     *
     * @return  int
     */ 
    public function get_delete_commentary()
    {
        return $this->_delete_commentary;
    }

    /**
     * Set $_delete_commentary
     *
     * @param  int  $_delete_commentary  $_delete_commentary
     *
     * @return  self
     */ 
    public function set_delete_commentary(int $_delete_commentary)
    {
        $_delete_commentary = 0;
        
        if($_delete_commentary = 0) {
           
            $this->_delete_commentary = $_delete_commentary;
            return $this;
        }
    }

    
    /**
     * Get $_book_id
     *
     * @return  int
     */ 
    public function get_book_id()
    {
        return $this->_book_id;
    }

    /**
     * Set $_book_id
     *
     * @param  int  $_book_id  $_book_id
     *
     * @return  self
     */ 
    public function set_book_id(int $_book_id)
    {
        $_book_id = (int) $_book_id;
        
        if($_book_id > 0) {
           
            $this->_book_id = $_book_id;
            return $this;
        }
    }
}