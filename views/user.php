<?php
// Chargement autoloading Composer
require '../vendor/autoload.php';

// Chargement de la Classe BookManager, gestionnaire d'entité pour les billets
require_once '../models/classe/App/Manager/BookManager.php';
use classe\App\Manager\BookManager;
$bookManager = new BookManager();


?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<?php include ('../views/inc/head_html.php'); ?>
	</head>
	<body>
		<div class="container-fluid">
<!-- Ici le header  -->
			<?php include '../views/inc/header_user.php'; ?>

<!-- Ici la vignette "vedette" pour afficher le dernier billet  -->			
			<div class="container" id="card_user_vedette">
				<div class="card text-center">
					<div class="card-header" id="card_header_user_title_billet">
						<?php 
						$billetUser1 = $bookManager->readStatement('SELECT id, title, billet, DATE_FORMAT(date_billet, \'%d/%m/%Y à %Hh%imin%Ss\') AS date_billet FROM book ORDER BY id DESC LIMIT 0, 1');

						$donneesUser = $billetUser1->fetch();
						echo '<p><strong>'.htmlspecialchars($donneesUser['title']).'</strong></p>';
						
						?>
					</div>
					<div class="card-body">
						<h5 class="card-title">
							<?='<p>'.htmlspecialchars($donneesUser['billet']).'</p>';	?>
						</h5>
						<a href="../controlers/user_comments_post.php?id=<?= $donneesUser['id']  ?>" class="btn btn-info">Laissez votre commentaire</a>
						<a href="../controlers/user_postControl.php" class="btn btn-primary"><em>Lecture du récit en entier</em></a>
					</div>
						<div class="card-footer text-muted">
							<?= '<p><strong>Publié le <em>'.htmlspecialchars($donneesUser['date_billet']).'</em></strong></p>';	?>
					</div>
				</div>
			</div>
							
			<div class="row" id="card_user">
<!-- Ici la 1ère des 3 vignettes pour afficher le 2ème billet  -->				
				<div class="col-sm-4" >
					<div class="card">
						<div class="card-body">
							<h5 class="card-title">
								<?php 
								$billetUser2 = $bookManager->readStatement('SELECT id, title, billet, DATE_FORMAT(date_billet, \'%d/%m/%Y à %Hh%imin%Ss\') AS date_billet FROM book ORDER BY id DESC LIMIT 1, 1');
								$donneesUser2 = $billetUser2->fetch();
								echo '<p><strong>'.htmlspecialchars($donneesUser2['title']).'</strong><em>, billet créé le '.htmlspecialchars($donneesUser2['date_billet']).'</em></p>';
								?>
							</h5>
							<p class="card-text">
								<?= '<p>'.htmlspecialchars($donneesUser2['billet']).'</p>';	?>
							</p>
							<a href="./user_comments_post.php?id=<?= $donneesUser2['id'] ?>" class="btn btn-info" >Commentez</a>
						</div>
					</div>
				</div>
<!-- Ici la 2ème des 3 vignettes pour afficher le 3ème billet  -->	
				<div class="col-sm-4">
					<div class="card">
						<div class="card-body">
							<h5 class="card-title">
								<?php 
								$billetUser3 = $bookManager->readStatement('SELECT id, title, billet, DATE_FORMAT(date_billet, \'%d/%m/%Y à %Hh%imin%Ss\') AS date_billet FROM book ORDER BY ID DESC LIMIT 2, 1');
								$donneesUser3 = $billetUser3->fetch();
								echo '<p><strong>'.htmlspecialchars($donneesUser3['title']).'</strong><em>, billet créé le '.htmlspecialchars($donneesUser3['date_billet']).'</em></p>';
								?>
							</h5>
							<p class="card-text">
								<?= '<p>'.htmlspecialchars($donneesUser3['billet']).'</p>'; ?>
							</p>
							<a href="./user_comments_post.php?id=<?= $donneesUser3['id']  ?>" class="btn btn-info">Commentez</a>
						</div>
					</div>
				</div>
<!-- Ici la 3ème des 3 vignettes pour afficher le 3ème billet  -->	
				<div class="col-sm-4">
					<div class="card">
						<div class="card-body">
							<h5 class="card-title">
								<?php 
								$billetUser4 = $bookManager->readStatement('SELECT id, title, billet, DATE_FORMAT(date_billet, \'%d/%m/%Y à %Hh%imin%Ss\') AS date_billet FROM book ORDER BY ID DESC LIMIT 3, 1');
								$donneesUser4 = $billetUser4->fetch();
								echo '<p><strong>'.htmlspecialchars($donneesUser4['title']).'</strong><em>, billet créé le '.htmlspecialchars($donneesUser4['date_billet']).'</em></p>';
								?>
							</h5>
							<p class="card-text">
							<?= '<p>'.htmlspecialchars($donneesUser4['billet']).'</p>'; ?>
							</p>
							<a href="./user_comments_post.php?id=<?= $donneesUser4['id']  ?>" class="btn btn-info">Commentez</a>
						</div>
					</div>
				</div>
			</div>

		</div>
	</body>
</html>