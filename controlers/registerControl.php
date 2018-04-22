<?php
/**
 * 
 * CONTROLE DE LA PAGE REGISTER.PHP
 * 
 */

// Chargement autoloading Composer
require '../vendor/autoload.php';

// Chargement du formulaire de l'inscription
require_once '../models/classe/App/Form/FormRegister.php';
use classe\App\Form\FormRegister;
$formRegister = new FormRegister();

// Chargement de la Classe BookMLoginAdminManager, gestionnaire d'entité pour les connexions
require_once '../models/classe/App/Manager/LoginAdminManager.php';
use classe\App\Manager\LoginAdminManager;
$loginAdminManager = new LoginAdminManager();

// Chargement de la Classe LoginAdmin, entité pour les connexions
require_once '../models/classe/App/Entity/LoginAdmin.php';
use classe\App\Entity\LoginAdmin;
$loginAdmin = new LoginAdmin();

// Connexion à la base de données
require_once '../controlers/model.php';
$db = dbConnect();

include_once '../views/register.php';



