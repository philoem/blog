<?php
	session_start();
	
	// Appel du formulaire de création d'un nouveau billet - autoloading
	require 'vendor/autoload.php';
	use Forteroche\FormAdmin;
	use Forteroche\CommentarysManager;
	use Forteroche\BilletsManager;
	//use Forteroche\DbConnect;
	$formAdmin = new FormAdmin();
	//$db = new DbConnect('projet_4');
	$commentarys = new CommentarysManager();
	$billets = new BilletsManager();

	require './models/model.php';
	$db = dbConnect();

	// Pour la gestion des commentaires avec les boutons "Conserver" et "Supprimer"
	require'models/gestion_admin.php';

	//require './models/classe/CommentarysManager.php';

?>
<!DOCTYPE html>
<html lang="fr">
<!-- Ici le head  -->
	<?php include ('./views/inc/head_html.php'); ?>
	<body>
		<div class="container-fluid">
<!-- Ici le header 	 -->	
			<?php include 'views/inc/header_admin.php'; ?>	
			
			<div class="container-fluid">
				<div class="row">
					<div class="col-xs-4 col-lg-4">
						<h3>Liste des commentaires signalés:</h3>
						<?php
							/**
							 * Affichage des 5 derniers commentaires signalés avec possibilité de les supprimer ou de les conserver
							*/
							foreach ($commentarys->getPostSignaled() as $commentSignaled):
								if ($commentSignaled['signaled'] == 1) {?>
									<p><strong><?= htmlspecialchars($commentSignaled['name_user']) ?>, commentaire signalé le <?= htmlspecialchars($commentSignaled['date_commentary']) ?></p></strong><p><?= htmlspecialchars($commentSignaled['commentary']) ?></p><?php if($commentSignaled['approuved'] == 0) { ?> <a class="btn btn-outline-warning" role="button" href="admin.php?approuved=<?= $commentSignaled['id'] ?>"><strong>Conserver</strong></a> <a class="btn btn-outline-danger" role="button" href="admin.php?delete=<?= $commentSignaled['id'] ?>"><em>Supprimer</em></a><?php } ?>
								<?php } else {
									echo '<h3>Il n\'y a pas de commentaires qui ont été signalés !</h3>';
								} 
							endforeach; ?>
					</div>
					<div class="col-xs-4 col-lg-4">
						<h3>Liste des derniers commentaires:</h3>
						<?php
						/**
						 * Affichage des 5 derniers commentaires
						*/
						foreach ($commentarys->getPosts() as $comment):
							echo'<p><strong>'.htmlspecialchars($comment['name_user']). '</strong>,<em> a publié le ' .htmlspecialchars($comment['date_commentary']).'</em></p><p>'.htmlspecialchars($comment['commentary']).'</p>';
						endforeach;
						?>
					</div>
<!-- Formulaire de création de nouveau billet  -->						
					<div class="col-xs-4 col-lg-4">
						<h3>Liste des derniers billets:</h3>
						<?php
							/**
							 * Affichage des 2 derniers billets
							*/
							foreach ($billets->getPostsBillets() as $billet):?>
							<p><strong><?= htmlspecialchars($billet['title']) ?></strong><em>, billet créé le <?= htmlspecialchars($billet['date_billet']) ?></em></p><p><?= htmlspecialchars($billet['billet']) ?></p><?php if($billet['approuved'] == 0) { ?> <a class="btn btn-outline-warning" role="button" href="admin.php?approuved=<?= $billet['id'] ?>"><strong>Editer</strong></a> <a class="btn btn-outline-danger" role="button" href="admin.php?delete=<?= $billet['id'] ?>"><em>Supprimer</em></a><?php } 
							endforeach;?>
					</div>
					
				</div>
			</div>
		</div>
	</body>
</html>