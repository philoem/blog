<?php
session_start();

//require_once('model.php');
//$db = dbConnect();

require '../models/classe/App/Manager/BookManager.php';
use classe\App\Manager\BookManager;
$bookManager = new BookManager();

// Redirection 
header('Location: ../views/admin2.php');

// Gestion du formulaire de créations de nouveaux billets
$title = htmlspecialchars($_POST['title']);
$billet = htmlspecialchars($_POST['billet']);
if (!empty($title) AND !empty($billet)) {
	$req = $bookManager->create('INSERT INTO book(title, billet, approuved, date_billet) VALUES(?, ?, 0, NOW())');
	$req->execute(array($title, $billet));
}
