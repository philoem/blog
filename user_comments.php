<?php
// Appel du formulaire de création d'un nouveau billet
use Forteroche\FormUserComments;
require 'vendor/autoload.php';

// Connexion à la base de données
require_once './models/model.php';
$db = dbConnect();

$formUser = new FormUserComments();

// Ici traitement du formulaire
if (isset($_POST['submit_commentary'])) {
	if (!empty($_POST['name_user']) AND !empty($_POST['commentary']) AND isset($_POST['name_user']) AND isset ($_POST['commentary'])) {
		$_POST['book_id'] = htmlspecialchars($_GET['id']);
		$id = $_POST['book_id'];
		$name_user = htmlspecialchars($_POST['name_user']);
		$commentary = htmlspecialchars($_POST['commentary']);
		
		$req = $db->prepare('INSERT INTO commentarys(name_user, commentary, approuved, signaled, book_id, date_commentary) VALUES(?, ?, 0, 0, ?, NOW())');
		
		$req->execute(array($name_user, $commentary, $id));
		
	} 
	$req->closeCursor();
}

?>				
<!DOCTYPE html>
<html lang="fr">
<!-- Ici le head  -->
	<?php include ('./views/inc/head_html.php'); ?>
	
	<body>
		<div class="container-fluid">
<!-- Ici le header --> 
			<?php include './views/inc/header_user_comments.php'; ?>

			<div class="container">	
				<div class="row">
					<div class="col-xs-7 col-lg-7">
						<div class="card ">
							<div class="card-header">
								<h5 class="card-title">
									<?php
									/**
									 * Affichage du billet
									*/
									$id = htmlspecialchars($_GET['id']);
									//var_dump($id);
									
									$reponse = $db->query("SELECT id, title, billet, DATE_FORMAT(date_billet, '%d/%m/%Y à %Hh%imin%ss') AS date_billet FROM book WHERE id='$id' ");
									$donnees = $reponse->fetch(); ?>
									<p><strong><?= ($donnees['title']) ?></strong><em>, billet créé le <?= htmlspecialchars($donnees['date_billet']) ?></em></p><p><?= htmlspecialchars($donnees['billet']) ?></p>
									<?php  
									$reponse->closeCursor();
									?>
								</h5>
							</div>
							<div class="card-body">
								<?php
								/**
								 * Affichage des 3 derniers commentaires 
								*/
								$reponse = $db->query('SELECT id, name_user, commentary, approuved, signaled, book_id, DATE_FORMAT(date_commentary, \'%d/%m/%Y à %Hh%imin%Ss\') AS date_commentary FROM commentarys ORDER BY date_commentary LIMIT 0, 3');
								while ($donnees = $reponse->fetch()) { ?>
									<p><strong><?= htmlspecialchars($donnees['name_user']) ?>,</strong><em> a commenté(e) le <?= htmlspecialchars($donnees['date_commentary']) ?> :</em></p><p><?= htmlspecialchars($donnees['commentary']) ?></p><?php if($donnees['signaled'] == 0) { ?> <a class="btn btn-outline-danger" role="button" href="user_comments.php?signaled=<?= $donnees['id'] ?>"><em>Signaler ce commentaire</em></a> <?php } ?>
								<?php } 
								$reponse->closeCursor();
								?>
								</p>
							</div>
						</div>
	<!-- Formulaire de création de nouveau billet  -->						
					</div>
					<div class="col-xs-5 col-lg-5">
						<h3>Création d'un nouveau commentaire:</h3>
						<form action="#" method="post">
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
								echo $formUser->inputHidden('$book_id');
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