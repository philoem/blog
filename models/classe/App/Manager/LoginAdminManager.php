<?php
namespace classe\App\Manager;

use \PDO;
use classe\App\Entity\LoginAdmin;

/**
 * classe LoginAdminManager 
 * 
 */

class LoginAdminManager {

    /**
     * @var $pdo Objet servant à toutes les classes dnas plusieurs méthodes pour accéder à la base de données "projet_4"
     * 
     */
    private $_pdo;

    /**
     * Variable qui va servir à stocker les requêtes (query et prepare)
     */
    private $pdoStatement;

    
    /**
     * Le constructeur de la classe LoginAdminManager
     * Connexion à la base de données
     */
    public function __construct() {



    }

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

    /**
     * Méthode CRUD, ici la fonction lecture d'un admin pour notamment la page login.php, se connecter
     * @param string $prenom Lecture du prenom dans la table login_admin
     * @param string $nom Lecture du nom dans la table login_admin
     * @param string $pseudo Lecture du pseudo dans la table login_admin
     * @param string $mail_admin Lecture du mail dans la table login_admin
     * @param string $password_admin Lecture du mot de passe crypté dans la table login_admin
     * @return bool true si le commentaire a bien été créé dans la table commentarys
     */
    public function read($prenom, $nom, $pseudo, $mail_admin, $password_admin) {



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