<?php
require_once('./models/model.php');

$db = dbConnect();


?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link href="./public/style.css" rel="stylesheet" type="text/css" >
		<title>Espace Lecteurs</title>
	</head>
	<body>
		<div class="container-fluid">
<!-- Ici le header  -->
			<?php include 'views/inc/header_user.php'; ?>
			
			<div class="container" id="card_user_vedette">
				<div class="card text-center">
					<div class="card-header" id="card_header_user_title_billet">
						<?php 
							$reponse = $db->query('SELECT id, title FROM book ORDER BY date_billet DESC LIMIT 0, 1');
							$donnees = $reponse->fetch();
							echo '<p><strong>'.htmlspecialchars($donnees['title']).'</strong></p>';
							$reponse->closeCursor();						
						?>
					</div>
					<div class="card-body">
						<h5 class="card-title">
							<?php 
								$reponse = $db->query('SELECT id, billet FROM book ORDER BY date_billet DESC LIMIT 0, 1');
								$donnees = $reponse->fetch();
								echo '<p>'.htmlspecialchars($donnees['billet']).'</p>';
								$reponse->closeCursor();
							?>
						</h5>
						<a href="user_comments.php?id=<?= $donnees['id']  ?>" class="btn btn-primary">Laissez votre commentaire</a>
						<a href="../models/user_post.php" class="btn btn-info">Lire tous les billets</a>
					</div>
						<div class="card-footer text-muted">
						<?php 
							$reponse = $db->query('SELECT DATE_FORMAT(date_billet, \'%d/%m/%Y à %Hh%imin%Ss\') AS date_billet FROM book ORDER BY date_billet LIMIT 0, 1');
							$donnees = $reponse->fetch();
							echo '<p><strong>Publié le <em>'.htmlspecialchars($donnees['date_billet']).'</em></strong></p>';
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
									$reponse = $db->query('SELECT id, title, DATE_FORMAT(date_billet, \'%d/%m/%Y à %Hh%imin%Ss\') AS date_billet FROM book ORDER BY date_billet DESC LIMIT 0, 1');
									$donnees = $reponse->fetch();
									echo '<p><strong>'.htmlspecialchars($donnees['title']).'</strong><em>, billet créé le '.htmlspecialchars($donnees['date_billet']).'</em></p>';
									$reponse->closeCursor();
								?>
							</h5>
							<p class="card-text">
								<?php 
									$reponse = $db->query('SELECT id, billet FROM book ORDER BY date_billet DESC LIMIT 1, 1');
									$donnees = $reponse->fetch();
									echo '<p>'.htmlspecialchars($donnees['billet']).'</p>';
									$reponse->closeCursor();
								?>
							</p>
							<a href="user_comments.php?id=<?= $donnees['id'] ?>" class="btn btn-info" >Commentez</a>
						</div>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="card">
						<div class="card-body">
							<h5 class="card-title">
								<?php 
									$reponse = $db->query('SELECT id, title, DATE_FORMAT(date_billet, \'%d/%m/%Y à %Hh%imin%Ss\') AS date_billet FROM book ORDER BY date_billet DESC LIMIT 1, 2');
									$donnees = $reponse->fetch();
									echo '<p><strong>'.htmlspecialchars($donnees['title']).'</strong><em>, billet créé le '.htmlspecialchars($donnees['date_billet']).'</em></p>';
									$reponse->closeCursor();
								?>
							</h5>
							<p class="card-text">
								<?php 
									$reponse = $db->query('SELECT id, billet FROM book ORDER BY date_billet DESC LIMIT 2, 1');
									$donnees = $reponse->fetch();
									echo '<p>'.htmlspecialchars($donnees['billet']).'</p>';
									$reponse->closeCursor();
								?>
							</p>
							<a href="user_comments.php?id=<?= $donnees['id']  ?>" class="btn btn-info">Commentez</a>
						</div>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="card">
						<div class="card-body">
							<h5 class="card-title">
								<?php 
									$reponse = $db->query('SELECT id, title, DATE_FORMAT(date_billet, \'%d/%m/%Y à %Hh%imin%Ss\') AS date_billet FROM book ORDER BY date_billet DESC LIMIT 2, 2');
									$donnees = $reponse->fetch();
									echo '<p><strong>'.htmlspecialchars($donnees['title']).'</strong><em>, billet créé le '.htmlspecialchars($donnees['date_billet']).'</em></p>';
									$reponse->closeCursor();
								?>
							</h5>
							<p class="card-text">
								<?php 
									$reponse = $db->query('SELECT id, billet FROM book ORDER BY date_billet DESC LIMIT 3, 1');
									$donnees = $reponse->fetch();
									echo '<p>'.htmlspecialchars($donnees['billet']).'</p>';
									$reponse->closeCursor();
								?>
							</p>
							<a href="user_comments.php?id=<?= $donnees['id']  ?>" class="btn btn-info">Commentez</a>
						</div>
					</div>
				</div>
			</div>

		</div>
	</body>
</html>