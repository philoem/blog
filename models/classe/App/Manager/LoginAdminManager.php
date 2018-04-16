<?php
namespace classe\App\Manager;

use \PDO;
use classe\App\Entity\LoginAdmin;
use classe\App\Manager\DbConnect;
require 'DbConnect.php';

/**
 * classe LoginAdminManager héritée de la classe parent DbConnect
 * 
 */

class LoginAdminManager extends DbConnect {

    /**
     * Variable qui va servir à stocker les requêtes (query et prepare)
     */
    private $_pdoStatement;

      

    /**
     * Méthode CRUD, ici la fonction création d'un admin via la page register.php pour s'inscrire
     *
     * @return bool true si le commentaire a bien été créé dans la table commentarys
     */
    public function create(LoginAdmin $loginAdmin) {

        $this->pdoStatement = $this->getPDO()->prepare('INSERT INTO login_admin(prenom, nom, pseudo, mail_admin, password_admin, key_recup_mail, date_login) VALUES(:prenom, :nom, :pseudo, :mail_admin, :password_admin, null, NOW())');
        $this->pdoStatement->bindValue(':prenom', $loginAdmin->get_prenom(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':nom', $loginAdmin->get_nom(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':pseudo', $loginAdmin->get_pseudo(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':mail_admin', $loginAdmin->get_mail_admin(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':password_admin', $loginAdmin->get_password_admin(), PDO::PARAM_STR);
        
        
        return $this->pdoStatement->execute(); 

    }

    public function readLogin() {

        $this->pdoStatement = $this->getPDO()->prepare('SELECT pseudo, password_admin FROM login_admin WHERE pseudo = :pseudo AND password_admin = :password_admin');
        $this->pdoStatement->bindValue(':pseudo', $pseudo->get_pseudo(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':password_admin', $password_admin->get_password_admin(), PDO::PARAM_STR);
        return $this->pdoStatement->execute();


    }

    /**
     * Méthode CRUD, ici la fonction modification d'un admin pour notamment quand on a perdu son mot de passe
     * @param string $prenom Modification du prenom dans la table login_admin
     * @param string $nom Modification du nom dans la table login_admin
     * @param string $pseudo Modification du pseudo dans la table login_admin
     * @param string $mail_admin Modification du mail dans la table login_admin
     * @param string $password_admin Modification du mot de passe crypté dans la table login_admin
     * @return bool true si le commentaire a bien été créé dans la table commentarys
     */
    public function update($prenom, $nom, $pseudo, $mail_admin, $password_admin) {



    }

    

}