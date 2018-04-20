<?php
namespace classe\App\Entity;
use \PDO;

/**
 * classe LoginAdmin 
 * Entitée correspondante à la table login_admin
 */

class LoginAdmin {

    /**
     * @var string $_prenom
     * Prénom de l'administrateur
     */
    private $_prenom;

    /**
     * @var string $_nom
     * Nom de l'administrateur
     */
    private $_nom;

    /**
     * @var int $_pseudo
     * Pseudo de l'administrateur
     */
    private $_pseudo;

    /**
     * @var int $_mail_admin
     * Mail de l'administrateur
     */
    private $_mail_admin;

    /**
     * @var int $_password_admin
     * Mot de passe crypté de l'administrateur
     */
    private $_password_admin;

    /**
     * Pour récupérer un mot de passe
     *
     * @var [string]
     */
    private $_key_recup_mail;

    /**
     * Stockage des messages d'erreurs
     *
     * @var [string] $_error
     */
    private $_error;

    public function hydrate(array $datas) {

        foreach ($datas as $key =>$Value) {

            $method = 'set'.ucfirst($key);

            if(method_exist($this, $method)) {

                $this->$method($value);
            }

        }
    }


    /**
     * Get $_prenom
     *
     * @return  string
     */ 
    public function get_prenom()
    {
        return $this->_prenom;
    }

    /**
     * Set $_prenom
     *
     * @param  string  $_prenom  $_prenom
     *
     * @return  self
     */ 
    public function set_prenom(string $_prenom)
    {
        if (is_string($_prenom) AND strlen($_prenom) <= 60) {
        
            $this->_prenom = $_prenom;
            return $this;
        }
    }

        /**
     * Get $_nom
     *
     * @return  string
     */ 
    public function get_nom()
    {
        return $this->_nom;
    }

    /**
     * Set $_nom
     *
     * @param  string  $_nom  $_nom
     *
     * @return  self
     */ 
    public function set_nom(string $_nom)
    {
        if (is_string($_nom) AND strlen($_nom) <= 60) {
           
            $this->_nom = $_nom;
            return $this;
        }
    }
    
    /**
     * Get $_pseudo
     *
     * @return  string
     */ 
    public function get_pseudo()
    {
        return $this->_pseudo;
    }

    /**
     * Set $_pseudo
     *
     * @param  string  $_pseudo  $_pseudo
     *
     * @return  self
     */ 
    public function set_pseudo(string $_pseudo)
    {
        if (is_string($_pseudo) AND strlen($_pseudo) <= 60) {
           
            $this->_pseudo = $_pseudo;
            return $this;
        }
    }
    
        

    /**
     * Set $_mail_admin
     *
     * @param  string  $_mail_admin  $_mail_admin
     *
     * @return  self
     */ 
    public function set_mail_admin(string $_mail_admin)
    {
        if (is_string($_mail_admin) AND strlen($_mail_admin) <= 255) {
           
            $this->_mail_admin = $_mail_admin;
            return $this;
        }
    }
    /**
     * Get $_mail_admin
     *
     * @return  string
     */ 
    public function get_mail_admin()
    {
        return $this->_mail_admin;
    }

        

    /**
     * Get $_password_admin
     *
     * @return  string
     */ 
    public function get_password_admin()
    {
        return $this->_password_admin;
    }

    /**
     * Set $_password_admin
     *
     * @param  string  $_password_admin  $_password_admin
     *
     * @return  self
     */ 
    public function set_password_admin(string $_password_admin)
    {
        if (is_string($_password_admin) AND strlen($_password_admin) <= 255) {
           
            $this->_password_admin = $_password_admin;
            return $this;
        }
    }
      

    /**
     * Get the value of _key_recup_mail
     */ 
    public function get_key_recup_mail()
    {
        return $this->_key_recup_mail;
    }

    /**
     * Set the value of _key_recup_mail
     *
     * @return  self
     */ 
    public function set_key_recup_mail($_key_recup_mail)
    {
        if (is_string($_key_recup_mail) AND strlen($_key_recup_mail) <= 60) {
            
            $this->_key_recup_mail = $_key_recup_mail;
            return $this;
        }
    }

    /**
     * Get the value of _error
     */ 
    public function get_error()
    {
        return $this->_error;
    }

    /**
     * Set the value of _error
     *
     * @return  self
     */ 
    public function set_error($_error)
    {
        $this->_error = $_error;

        return $this;
    }
}