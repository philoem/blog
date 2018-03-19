<?php
	session_start();

	require_once('backend/model.php');

	$db = dbConnect();
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link href="style.css" rel="stylesheet" type="text/css" >
		<title>Espace Lecteurs</title>
	</head>
	<body>
		<div class="container-fluid">
			
			<header>
				<nav class="navbar fixed-top navbar-dark bg-info">
					<div class="navbar-brand" id="content_header">
						<h1>Bienvenu dans l'espace lecteur</h1>
						<p id="paragraph_header">"Billet simple pour l'Alaska"</p>
					</div>
				</nav>
			</header>
			
		<div class="container">
			<div class="jumbotron">
				<h1 class="display-4">
					<?php 
						$reponse = $db->query('SELECT title FROM book ORDER BY date_billet DESC LIMIT 0, 1');
						while ($donnees = $reponse->fetch()) {
							echo '<p><strong>'.htmlspecialchars($donnees['title']).'<strong></p>';
						}
						$reponse->closeCursor();
					?>
				</h1>
				<p class="lead">
					<?php 
						$reponse = $db->query('SELECT billet FROM book ORDER BY date_billet DESC LIMIT 0, 1');
						while ($donnees = $reponse->fetch()) {
							echo '<p>'.htmlspecialchars($donnees['billet']).'</p>';
						}
						$reponse->closeCursor();
					?>
				</p>
				<hr class="my-4">
				<p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
				<p class="lead">
					<a class="btn btn-info btn-lg" href="user_post.php" role="button">Lire en entier</a>
				</p>
			</div>
		</div>
			
			

		</div>
	</body>
</html>