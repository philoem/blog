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
		<div class="navbar-brand" id="content_header_register">
			<h1 class="font-weight-normal">Inscription</h1>
			<a href="../index.php" id="paragraph_header" title="Cliquez ici pour retourner à la page accueil"><p id="link_register_index">Retour à la page accueil</p></a>
			<a href="../controlers/user_postControl.php" id="paragraph_header" title="Cliquez ici pour lire le roman en entier" class="font-weight-light"><p><em>"Billet simple pour l'Alaska"</em></p></a>
		</div>
	</nav>
</header>