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

// Chargement de la Classe Pagination, pour la pagination des pages du roman et servant aussi à afficher les billets approuvés par l'auteur
require '../models/classe/App/Manager/Pagination.php';
use classe\App\Manager\Pagination;
$page = new Pagination();


include_once '../views/user_post.php';