<?php
namespace classe\App\Entity;
use \PDO;

/**
 * classe LoginAdmin 
 * Entitée correspondante à la table login_admin
 */

class LoginAdmin {

    /**
     * @var string $prenom
     * Prénom de l'administrateur
     */
    private $prenom;

    /**
     * @var string $nom
     * Nom de l'administrateur
     */
    private $nom;

    /**
     * @var string $pseudo
     * Pseudo de l'administrateur
     */
    private $pseudo;

    /**
     * @var string $mail_admin
     * Mail de l'administrateur
     */
    private $mail_admin;

    /**
     * @var string $password_admin
     * Mot de passe crypté de l'administrateur
     */
    private $password_admin;

    /**
     * Pour récupérer un mot de passe
     *
     * @var [string]
     */
    private $key_recup_mail;

    /**
     * Stockage des messages d'erreurs
     *
     * @var [string] $error
     */
    private $error;

    

    /**
     * Get $prenom
     *
     * @return  string
     */ 
    public function get_prenom()
    {
        return $this->prenom;
    }

    /**
     * Set $prenom
     *
     * @param  string  $prenom  
     *
     * @return  self
     */ 
    public function set_prenom(string $prenom)
    {
        if (strlen($prenom) <= 60) {
        
            $this->prenom = $prenom;
            return $this;
        }
    }

    /**
     * Get $nom
     *
     * @return  string
     */ 
    public function get_nom()
    {
        return $this->nom;
    }

    /**
     * Set $nom
     *
     * @param  string  $nom  
     *
     * @return  self
     */ 
    public function set_nom(string $nom)
    {
        if (strlen($nom) <= 60) {
           
            $this->nom = $nom;
            return $this;
        }
    }
    
    /**
     * Get $pseudo
     *
     * @return  string
     */ 
    public function get_pseudo()
    {
        return $this->pseudo;
    }

    /**
     * Set $pseudo
     *
     * @param  string  $pseudo  
     *
     * @return  self
     */ 
    public function set_pseudo(string $pseudo)
    {
        if (strlen($pseudo) <= 60) {
           
            $this->pseudo = $pseudo;
            return $this;
        }
    }
         
    /**
     * Set $mail_admin
     *
     * @param  string  $mail_admin  
     *
     * @return  self
     */ 
    public function set_mail_admin(string $mail_admin)
    {
        if (strlen($mail_admin) <= 255) {
           
            $this->mail_admin = $mail_admin;
            return $this;
        }
    }
    /**
     * Get $mail_admin
     *
     * @return  string
     */ 
    public function get_mail_admin()
    {
        return $this->mail_admin;
    }

        

    /**
     * Get $password_admin
     *
     * @return  string
     */ 
    public function get_password_admin()
    {
        return $this->password_admin;
    }

    /**
     * Set $password_admin
     *
     * @param  string  $password_admin  
     *
     * @return  self
     */ 
    public function set_password_admin(string $password_admin)
    {
        if (strlen($password_admin) <= 255) {
           
            $this->password_admin = $password_admin;
            return $this;
        }
    }
      

    /**
     * Get the value of $key_recup_mail
     */ 
    public function get_key_recup_mail()
    {
        return $this->key_recup_mail;
    }

    /**
     * Set the value of $key_recup_mail
     *
     * @return  self
     */ 
    public function set_key_recup_mail(string $key_recup_mail)
    {
        if (strlen($key_recup_mail) <= 60) {
            
            $this->key_recup_mail = $key_recup_mail;
            return $this;
        }
    }

    /**
     * Get the value of $error
     */ 
    public function get_error()
    {
        return $this->error;
    }

    /**
     * Set the value of $error
     *
     * @return  self
     */ 
    public function set_error(string $error)
    {
        $this->error = $error;

        return $this;
    }
}