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
     * Setter du champs prenom
     * @param  string $prenom
     * @return LoginAdmin
     */
    public function setPrenom($prenom) {

        $this->prenom = $prenom;
        return $this;

    }
    /**
     * Getter du champs prenom
     * @return string  
     */
    public function getPrenom() {
        
        return $this->prenom;

    }

    /**
     * Setter du champs nom
     * @param  string $nom
     * @return LoginAdmin
     */
    public function setNom($nom) {

        $this->nom = $nom;
        return $this;

    }
    /**
     * Getter du champs nom
     * @return string  
     */
    public function getNom() {
        
        return $this->nom;

    }

    /**
     * Setter du champs pseudo
     * @param  string $pseudo
     * @return LoginAdmin
     */
    public function setPseudo($pseudo) {

        $this->pseudo = $pseudo;
        return $this;

    }
    /**
     * Getter du champs pseudo
     * @return string  
     */
    public function getPseudo() {
        
        return $this->pseudo;

    }

    /**
     * Setter du champs mail_admin
     * @param  string $mail_admin
     * @return LoginAdmin
     */
    public function setMailAdmin($mail_admin) {

        $this->mail_admin = $mail_admin;
        return $this;

    }
    /**
     * Getter du champs mail_admin
     * @return string  
     */
    public function getMailAdmin() {
        
        return $this->mail_admin;

    }

    /**
     * Setter du champs password_admin
     * @param  string $password_admin
     * @return LoginAdmin
     */
    public function setPasswordAdmin($password_admin) {

        $this->password_admin = $password_admin;
        return $this;

    }
    /**
     * Getter du champs password_admin
     * @return string  
     */
    public function getPasswordAdmin() {
        
        return $this->password_admin;

    }


}