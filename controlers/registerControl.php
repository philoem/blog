<?php
session_start();
/**
 * 
 * CONTROLE DE LA PAGE REGISTER.PHP
 * 
 */
// Sécurisation de la page pour empêcher l'accès via une réécriture de l'url
if (!isset($_SESSION['pseudo']) AND !isset($_SESSION['password'])) {

    header('Location: ../views/login.php');

} elseif (isset($_COOKIES['pseudo']) AND isset($_COOKIES['password'])) {
	
	header('Location: ../views/register.php');
}

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


include_once '../views/register.php';



