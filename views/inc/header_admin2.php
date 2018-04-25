<?php
session_start();
// Sécurisation de la page pour empêcher l'accès via une réécriture de l'url
if (!isset($_SESSION['pseudo']) AND !isset($_SESSION['password'])) {

    header('Location: ../views/login.php');

} elseif (isset($_COOKIES['pseudo']) AND isset($_COOKIES['password'])) {
	
	header('Location: ../controlers/adminControl.php');
}

?>
<header>
	<nav class="navbar fixed-top navbar-dark bg-primary">
		<div class="navbar-brand" id="content_header">
			<h1 class="font-weight-normal">Espace rédaction</h1>
			<a href="../index.php" id="paragraph_header"><em>Page accueil</em></a>
            <a href="../controlers/adminControl.php" id="paragraph_header"><em>Retour dans votre espace lecture des billets et commentaires</em></a>
            <a href="../controlers/logout.php" id="paragraph_header" class="font-weight-light">Se déconnecter</a>
		</div>
	</nav>
</header>
	

