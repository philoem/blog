<?php
// Appel du formulaire de création d'un nouveau billet
use Forteroche\FormUserComments;
require 'vendor/autoload.php';

// Connexion à la base de données
require_once './models/model.php';
$db = dbConnect();

$formUser = new FormUserComments();
	
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link href="./public/style.css" rel="stylesheet" type="text/css" >
		<title>Blog</title>
	</head>
	<body>
		<div class="container-fluid">
<!-- Ici le header --> 
			<?php include './views/inc/header_user_comments.php'; ?>

			<div class="container">	
				<div class="row">
					<div class="card ">
						<div class="card-header">
							<h5 class="card-title">
								<?php
								/**
								 * Affichage du billet
								*/
								$reponse = $db->query('SELECT id, title, billet, approuved, DATE_FORMAT(date_billet, \'%d/%m/%Y à %Hh%imin%Ss\') AS date_billet FROM book ORDER BY date_billet DESC LIMIT 0, 1');
								while ($donnees = $reponse->fetch()) { ?>
									<p><strong><?= htmlspecialchars($donnees['title']) ?>, billet créé le <?= htmlspecialchars($donnees['date_billet']) ?></p></strong><p><?= htmlspecialchars($donnees['billet']) ?></p>
								<?php } 
								$reponse->closeCursor();
								?>
							</h5>
						</div>
						<div class="card-body">
							<?php
							/**
							 * Affichage des 3 derniers commentaires 
							*/
							$reponse = $db->query('SELECT id, name_user, commentary, approuved, signaled, DATE_FORMAT(date_commentary, \'%d/%m/%Y à %Hh%imin%Ss\') AS date_commentary FROM commentarys ORDER BY date_commentary DESC LIMIT 0, 3');
							while ($donnees = $reponse->fetch()) { ?>
								<p><strong><?= htmlspecialchars($donnees['name_user']) ?>,</strong><em> a commenté(e) le <?= htmlspecialchars($donnees['date_commentary']) ?> :</em></p><p><?= htmlspecialchars($donnees['commentary']) ?></p><?php if($donnees['signaled'] == 0) { ?> <a class="btn btn-outline-danger" role="button" href="user_comments.php?signaled=<?= $donnees['id'] ?>"><em>Signaler ce commentaire</em></a> <?php } ?>
							<?php } 
							$reponse->closeCursor();
							?>
							</p>
						</div>
					</div>
<!-- Formulaire de création de nouveau billet  -->						
					<div class="col-xs-6 col-lg-6">
						<h3>Création d'un nouveau commentaire:</h3>
						<form action="./controlers/form_user_comments.php" method="post">
							<div class="form-group">
								<?php
								echo $formUser->labelUser('Tapez ici votre nom :');
								echo $formUser->inputName('name_user');
								?>
							</div>
							<div class="form-group">
								<?php
								echo $formUser->labelUser('Ecrivez ici votre commentaire :');
								echo $formUser->inputCommentary('commentary');
								?>
							</div>
							<div>
                                <div>
                                    <?php
                                    echo $formUser->erase();
									?>
									<?php
									echo $formUser->submit();
									?>
                                </div>
                            </div>
						</form>
					</div>

				</div>
			</div>

		</div>
	</body>
</html>