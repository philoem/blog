<?php
session_start();

// Appel du formulaire de création d'un nouveau billet - autoloading
require '../vendor/autoload.php';


// Pour la gestion des commentaires avec les boutons "Conserver" et "Supprimer"

require '../models/classe/App/Manager/BookManager.php';
use classe\App\Manager\BookManager;
$bookManager = new BookManager();
require '../models/classe/App/Manager/CommentarysManager.php';
use classe\App\Manager\CommentarysManager;
$commentarysManager = new CommentarysManager();


?>
<!DOCTYPE html>
<html lang="fr">
<!-- Ici le head  -->
	<?php include ('../views/inc/head_html.php'); ?>
	<body>
		<div class="container-fluid">
<!-- Ici le header 	-->
			<?php include '../views/inc/header_admin.php'; ?>	 	
			
			<div class="container-fluid">
				<div class="row">
					<div class="col-xs-4 col-lg-4">
						<h3>Liste des commentaires signalés:</h3>
						<?php
						/**
						 * Affichage des commentaires signalés en utilisant uune jointure interne entre 2 tables signalés avec possibilité de les supprimer ou de les conserver
						 */
						
						foreach ($commentarysManager->readSignaled() as $commentSignaled):?>
							
							<p><strong><?= htmlspecialchars($commentSignaled['name_user']) ?></strong>, a commenté(e) le <?= htmlspecialchars($commentSignaled['date_commentary']) ?> le billet "<strong><em> <?= htmlspecialchars($commentSignaled['title']) ?></em></strong> "</p><p><?= htmlspecialchars($commentSignaled['commentary']) ?></p><?php if($commentSignaled['approuved'] == 0) { ?> <a name="btn_conserver_commentary" class="btn btn-outline-warning" role="button" href="../controlers/gestion_admin.php?id_commentary=<?= $commentSignaled['id'] ?>&amp;approuved_commentary=<?= $commentSignaled['approuved'] ?>&amp;btn_conserver_commentary"><strong>Conserver</strong></a> <a name="btn_supprimer_commentary" class="btn btn-outline-danger" role="button" href="../controlers/gestion_admin.php?id_commentary=<?= $commentSignaled['id'] ?>&amp;delete_commentary=<?= $commentSignaled['delete_commentary'] ?>&amp;btn_supprimer_commentary"><em>Supprimer</em></a><?php } 

						endforeach;
						?>
					</div>
					<div class="col-xs-4 col-lg-4">
						<h3>Liste des derniers commentaires:</h3>
						<?php
						/**
						 * Affichage des 5 derniers commentaires en utilisant uune jointure interne entre 2 tables
						*/
						foreach ($commentarysManager->read() as $comment):
							echo'<p><strong>'.htmlspecialchars($comment['name_user']). '</strong>,<em> a publié le ' .htmlspecialchars($comment['date_commentary']).' pour le billet "<strong> '.htmlspecialchars($comment['title']).'</strong> "</em></p><p>'.htmlspecialchars($comment['commentary']).'</p>';
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
							foreach ($bookManager->readStatement('SELECT id, title, billet, approuved, delete_book, DATE_FORMAT(date_billet, \'%d/%m/%Y à %Hh%imin%Ss\') AS date_billet FROM book ORDER BY id DESC LIMIT 0, 2') as $billet):?>
								<p><strong><?= htmlspecialchars($billet['title']) ?></strong><em>, billet créé le <?= htmlspecialchars($billet['date_billet']) ?></em></p><p><?= htmlspecialchars($billet['billet']) ?></p><?php if($billet['approuved'] == 0) { ?> <a name="btn_conserver_billet" class="btn btn-outline-warning" role="button" href="../controlers/gestion_admin.php?id=<?= $billet['id'] ?>&amp;approuved_billet=<?= $billet['approuved'] ?>&amp;btn_conserver_billet"><strong>Editer</strong></a> <a name="btn_supprimer_billet" class="btn btn-outline-danger" role="button" href="../controlers/gestion_admin.php?id=<?= $billet['id'] ?>&amp;delete_book=<?= $billet['delete_book'] ?>&amp;btn_supprimer_billet"><em>Supprimer</em></a><?php } 
							endforeach;?>
					</div>
					
				</div>
			</div>
		</div>
	</body>
</html>