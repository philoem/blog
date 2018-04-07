<?php
	session_start();
	
	// Appel du formulaire de création d'un nouveau billet - autoloading
	require '../vendor/autoload.php';
	use Forteroche\FormAdmin;
	use Forteroche\CommentarysManager;
	use Forteroche\BilletsManager;
	//use Forteroche\DbConnect;
	$formAdmin = new FormAdmin();
	//$db = new DbConnect('projet_4');
	$commentarys = new CommentarysManager();
	$billets = new BilletsManager();

	require '../controlers/model.php';
	$db = dbConnect();

	// Pour la gestion des commentaires avec les boutons "Conserver" et "Supprimer"
	require'../controlers/gestion_admin.php';


?>
<!DOCTYPE html>
<html lang="fr">
<!-- Ici le head  -->
	<?php include ('../views/inc/head_html.php'); ?>
	<body>
		<div class="container-fluid">
<!-- Ici le header 	 -->	
			<?php include '../views/inc/header_admin.php'; ?>	
			
			<div class="container-fluid">
				<div class="row">
					<div class="col-xs-4 col-lg-4">
						<h3>Liste des commentaires signalés:</h3>
						<?php
						/**
						 * Affichage des 5 derniers commentaires en utilisant uune jointure interne entre 2 tables signalés avec possibilité de les supprimer ou de les conserver
						 */
						
						foreach ($commentarys->getCommentSignaled('SELECT c.name_user name_user, c.approuved approuved, DATE_FORMAT(c.date_commentary, \'%d/%m/%Y à %Hh%imin%ss\') date_commentary, c.commentary  commentary, c.signaled signaled, b.title title, b.date_billet date_billet 
						FROM commentarys c INNER JOIN book b ON c.book_id = b.id 
						WHERE signaled = 1 ORDER BY date_commentary DESC') as $commentSignaled):?>
							
							<p><strong><?= htmlspecialchars($commentSignaled['name_user']) ?></strong>, a commenté(e) le <?= htmlspecialchars($commentSignaled['date_commentary']) ?> le billet:<strong> <?= htmlspecialchars($commentSignaled['title']) ?></strong></p><p><?= htmlspecialchars($commentSignaled['commentary']) ?></p><?php if($commentSignaled['approuved'] == 0) { ?> <a class="btn btn-outline-warning" role="button" href="admin.php?approuved=<?= $commentSignaled['approuved'] ?>"><strong>Conserver</strong></a> <a class="btn btn-outline-danger" role="button" href="admin.php?delete=<?= $commentSignaled['signaled'] ?>"><em>Supprimer</em></a><?php } 

						endforeach;
						?>
					</div>
					<div class="col-xs-4 col-lg-4">
						<h3>Liste des derniers commentaires:</h3>
						<?php
						/**
						 * Affichage des 5 derniers commentaires en utilisant uune jointure interne entre 2 tables
						*/
						foreach ($commentarys->getComments('SELECT c.name_user name_user, c.approuved approuved, DATE_FORMAT(c.date_commentary, \'%d/%m/%Y à %Hh%imin%ss\') date_commentary, c.commentary  commentary, c.signaled signaled, b.title title, b.date_billet date_billet 
						FROM commentarys c INNER JOIN book b ON c.book_id = b.id 
						ORDER BY date_commentary DESC LIMIT 0, 5 ') as $comment):
							echo'<p><strong>'.htmlspecialchars($comment['name_user']). '</strong>,<em> a publié le ' .htmlspecialchars($comment['date_commentary']).' pour le billet:<strong> '.htmlspecialchars($comment['title']).'</strong></em></p><p>'.htmlspecialchars($comment['commentary']).'</p>';
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