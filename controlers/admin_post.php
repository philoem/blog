<?php
session_start();

/**
 * Gestion du formulaire de la page admin2.php pour la création d'un nouveau billet
 * 
 */

// Appel ici de BookManager.php le manager d'entité Book
require_once '../models/classe/App/Manager/BookManager.php';
use classe\App\Manager\BookManager;
$bookManager = new BookManager();

// Appel ici de l'entité Book
require_once '../models/classe/App/Entity/Book.php';
use classe\App\Entity\Book;
$book = new Book();

$title = $book->setTitle(htmlspecialchars($_POST['title']));
$billet = $book->setBillet(htmlspecialchars($_POST['billet']));

// Traitement du formulaire pour créer un nouveau billet
if (!empty($title) AND !empty($billet)) {
	
	$bookManager->create($book);
	
	header('Location: ../views/admin2.php');

} else {
	
	echo 'Error 404';
	echo '<p><a href="../views/admin2.php"><strong>Retour</strong></a></p>';
}
