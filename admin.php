<?php
	session_start();
	
	// Appel du formulaire de création d'un nouveau billet - autoloading
	require 'vendor/autoload.php';
	use Forteroche\FormAdmin;
	//use Forteroche\DbConnect;
	$formAdmin = new FormAdmin();
	
	require_once './models/model.php';
	$db = dbConnect();
	//$db = new DbConnect('projet_4');

	// Pour la gestion des commentaires avec les boutons "Conserver" et "Supprimer"
	include'models/gestion_admin.php';
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link href="./public/style.css" rel="stylesheet" type="text/css" >
		<title>Espace administrateur</title>
	</head>
	<body>
		<div class="container-fluid">
<!-- Ici le header -->	 	
			<?php include 'views/inc/header_admin.php'; ?>	
			
			<div class="container-fluid">
				<div class="row">
					<div class="col-xs-4 col-lg-4">
						<h3>Liste des commentaires signalés:</h3>
						<?php
							/**
							 * Affichage des 5 derniers commentaires signalés avec possibilité de les supprimer ou de les conserver
							*/
							$reponse = $db->query('SELECT id, name_user, commentary, approuved, signaled, DATE_FORMAT(date_commentary, \'%d/%m/%Y à %Hh%imin%Ss\') AS date_commentary FROM commentarys ORDER BY date_commentary DESC LIMIT 0, 5');
							while ($donnees = $reponse->fetch()) { 
								if ($donnees['signaled'] == 1) {?>
									<p><strong><?= htmlspecialchars($donnees['name_user']) ?>, commentaire signalé le <?= htmlspecialchars($donnees['date_commentary']) ?></p></strong><p><?= htmlspecialchars($donnees['commentary']) ?></p><?php if($donnees['approuved'] == 0) { ?> <a class="btn btn-outline-warning" role="button" href="admin.php?approuved=<?= $donnees['id'] ?>"><strong>Conserver</strong></a> <a class="btn btn-outline-danger" role="button" href="admin.php?delete=<?= $donnees['id'] ?>"><em>Supprimer</em></a><?php } ?>
								<?php } ?>
								<?php } 
							$reponse->closeCursor();
						?>
					</div>
					<div class="col-xs-4 col-lg-4">
						<h3>Liste des derniers commentaires:</h3>
						<?php
							/**
							 * Affichage des 3 derniers commentaires
							*/
							$reponse = $db->query('SELECT name_user, commentary, DATE_FORMAT(date_commentary, \'%d/%m/%Y à %Hh%imin%Ss\') AS date_commentary FROM commentarys ORDER BY date_commentary DESC LIMIT 0, 5');
							while ($donnees = $reponse->fetch()) {
								echo'<p><strong>'.htmlspecialchars($donnees['name_user']). ', publié le ' .htmlspecialchars($donnees['date_commentary']).'</p></strong><p>'.htmlspecialchars($donnees['commentary']).'</p>';
							}

							$reponse->closeCursor();
						?>
					</div>
<!-- Formulaire de création de nouveau billet  -->						
					<div class="col-xs-4 col-lg-4">
						<h3>Liste des derniers billets:</h3>
						<?php
							/**
							 * Affichage des 3 derniers billets
							*/
							$reponse = $db->query('SELECT id, title, billet, approuved, DATE_FORMAT(date_billet, \'%d/%m/%Y à %Hh%imin%Ss\') AS date_billet FROM book ORDER BY date_billet DESC LIMIT 0, 3');
							while ($donnees = $reponse->fetch()) { ?>
								<p><strong><?= htmlspecialchars($donnees['title']) ?></strong>, billet créé le <?= htmlspecialchars($donnees['date_billet']) ?></p><p><?= htmlspecialchars($donnees['billet']) ?></p><?php if($donnees['approuved'] == 0) { ?> <a class="btn btn-outline-warning" role="button" href="admin.php?approuved=<?= $donnees['id'] ?>"><strong>Conserver</strong></a> <a class="btn btn-outline-danger" role="button" href="admin.php?delete=<?= $donnees['id'] ?>"><em>Supprimer</em></a><?php } ?>
							<?php } 
							$reponse->closeCursor();
						?>
					</div>
					
				</div>
			</div>
		</div>
	</body>
</html>