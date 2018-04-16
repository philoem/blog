<?php
namespace classe\App\Manager;

use \PDO;
use classe\App\Entity\LoginAdmin;
use classe\App\Manager\DbConnect;


/**
 * classe LoginAdminManager héritée de la classe parent DbConnect
 * 
 */

class LoginAdminManager extends DbConnect {

    /**
     * Variable qui va servir à stocker les requêtes (query et prepare)
     */
    private $pdoStatement;
  

    /**
     * Méthode CRUD, ici la fonction création d'un admin via la page register.php pour s'inscrire
     * @param string $prenom Création du prenom dans la table login_admin
     * @param string $nom Création du nom dans la table login_admin
     * @param string $pseudo Création du pseudo dans la table login_admin
     * @param string $mail_admin Création du mail dans la table login_admin
     * @param string $password_admin Création du mot de passe crypté dans la table login_admin
     * @return bool true si le commentaire a bien été créé dans la table commentarys
     */
    public function create($prenom, $nom, $pseudo, $mail_admin, $password_admin) {



    }

    public function readLogin() {

        $this->pdoStatement = $this->getPDO()->prepare('SELECT * FROM login_admin WHERE pseudo = :pseudo AND password_admin = :password_admin');
        $this->pdoStatement->bindValue(':pseudo', $pseudo->getPseudo(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':password_admin', $password_admin->getPasswordAdmin(), PDO::PARAM_STR);
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