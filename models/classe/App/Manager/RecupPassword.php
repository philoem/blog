<?php
namespace classe\App\Manager;

use classe\App\Manager\LoginAdminManager;
use \PDO;

/**
 * classe RecupMail enfante de la classe parente LoginAdminManager
 * Pour la récupration du mot de passe
 */

class RecupPassword extends LoginAdminManager {

    public function NewPassword(RecupPassword $RecupPassword) {

        $this->pdoStatement = $this->pdo->prepare('UPDATE login_admin SET password_admin =  ');
        //$this->pdoStatement->bindValue(':title', $RecupPassword->getTitle(), PDO::PARAM_STR);
        //$this->pdoStatement->bindValue(':billet', $RecupPassword->getBillet(), PDO::PARAM_STR);
        
        
        return $this->pdoStatement->execute();     

    }