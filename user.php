<?php
	
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
						<a href="user_post.php"><p id="paragraph_header">"Billet simple pour l'Alaska"</p></a>
					</div>
				</nav>
			</header>
			
			<div class="container" id="card_user_vedette">
				<div class="card text-center">
					<div class="card-header" id="card_header_user_title_billet">
						<?php 
							$reponse = $db->query('SELECT title FROM book ORDER BY date_billet DESC LIMIT 0, 1');
							while ($donnees = $reponse->fetch()) {
								echo '<p><strong>'.htmlspecialchars($donnees['title']).'</strong></p>';
							}
							$reponse->closeCursor();
						?>
					</div>
					<div class="card-body">
						<h5 class="card-title">
							<?php 
								$reponse = $db->query('SELECT billet FROM book ORDER BY date_billet DESC LIMIT 0, 1');
								while ($donnees = $reponse->fetch()) {
									echo '<p>'.htmlspecialchars($donnees['billet']).'</p>';
								}
								$reponse->closeCursor();
							?>
						</h5>
						<a href="user_comments.php" class="btn btn-primary">Laissez votre commentaire</a>
						<a href="user_post.php" class="btn btn-info">Lire tous les billets</a>
					</div>
						<div class="card-footer text-muted">
						<?php 
							$reponse = $db->query('SELECT DATE_FORMAT(date_billet, \'%d/%m/%Y à %Hh%imin%Ss\') AS date_billet FROM book ORDER BY date_billet DESC LIMIT 0, 1');
							while ($donnees = $reponse->fetch()) {
								echo '<p><strong>Publié le '.htmlspecialchars($donnees['date_billet']).'</strong></p>';
							}
							$reponse->closeCursor();
						?>
					</div>
				</div>
			</div>

			
			<div class="row" id="card_user">
				<div class="col-sm-4" >
					<div class="card">
						<div class="card-body">
							<h5 class="card-title">
								<?php 
									$reponse = $db->query('SELECT title FROM book ORDER BY date_billet DESC LIMIT 1, 1');
									while ($donnees = $reponse->fetch()) {
										echo '<p><strong>'.htmlspecialchars($donnees['title']).'</strong></p>';
									}
									$reponse->closeCursor();
								?>
							</h5>
							<p class="card-text">
								<?php 
									$reponse = $db->query('SELECT billet FROM book ORDER BY date_billet DESC LIMIT 1, 1');
									while ($donnees = $reponse->fetch()) {
										echo '<p>'.htmlspecialchars($donnees['billet']).'</p>';
									}
									$reponse->closeCursor();
								?>
							</p>
							<a href="#" class="btn btn-info">Commentez</a>
						</div>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="card">
						<div class="card-body">
							<h5 class="card-title">
								<?php 
									$reponse = $db->query('SELECT title FROM book ORDER BY date_billet DESC LIMIT 2, 1');
									while ($donnees = $reponse->fetch()) {
										echo '<p><strong>'.htmlspecialchars($donnees['title']).'</strong></p>';
									}
									$reponse->closeCursor();
								?>
							</h5>
							<p class="card-text">
								<?php 
									$reponse = $db->query('SELECT billet FROM book ORDER BY date_billet DESC LIMIT 2, 1');
									while ($donnees = $reponse->fetch()) {
										echo '<p>'.htmlspecialchars($donnees['billet']).'</p>';
									}
									$reponse->closeCursor();
								?>
							</p>
							<a href="#" class="btn btn-info">Commentez</a>
						</div>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="card">
						<div class="card-body">
							<h5 class="card-title">
								<?php 
									$reponse = $db->query('SELECT title FROM book ORDER BY date_billet DESC LIMIT 3, 1');
									while ($donnees = $reponse->fetch()) {
										echo '<p><strong>'.htmlspecialchars($donnees['title']).'</strong></p>';
									}
									$reponse->closeCursor();
								?>
							</h5>
							<p class="card-text">
								<?php 
									$reponse = $db->query('SELECT billet FROM book ORDER BY date_billet DESC LIMIT 3, 1');
									while ($donnees = $reponse->fetch()) {
										echo '<p>'.htmlspecialchars($donnees['billet']).'</p>';
									}
									$reponse->closeCursor();
								?>
							</p>
							<a href="#" class="btn btn-info">Commentez</a>
						</div>
					</div>
				</div>
			</div>

		</div>
	</body>
</html>