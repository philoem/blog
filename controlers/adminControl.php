<?php
session_start();


// Chargement autoloading Composer
require_once '../vendor/autoload.php';

// Chargement de la Classe BookManager, gestionnaire d'entité pour les billets
require_once '../models/classe/App/Manager/BookManager.php';
use classe\App\Manager\BookManager;
$bookManager = new BookManager();

// Chargement de la Classe CommentarysManager, gestionnaire d'entité pour les commentaires
require_once '../models/classe/App/Manager/CommentarysManager.php';
use classe\App\Manager\CommentarysManager;
$commentarysManager = new CommentarysManager();

include '../views/admin.php';