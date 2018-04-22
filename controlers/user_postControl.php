<?php
/**
 * 
 * CONTROLE DE LA PAGE USER_POST.PHP
 * 
 */

// Chargement autoloading Composer
require '../vendor/autoload.php';

// Chargement de la Classe BookManager, gestionnaire d'entité pour les billets
require '../models/classe/App/Manager/BookManager.php';
use classe\App\Manager\BookManager;
$bookManager = new BookManager();


include_once '../views/user_post.php';