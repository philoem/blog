<?php
	require_once('./models/model.php');
	$db = dbConnect();
	// Appel du formulaire de création d'un nouveau billet
	require('./models/FormUserComments.php');
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
					<div class="card w-50 col">
						<div class="card-body">
							<h5 class="card-title">
								<?php 
									$reponse = $db->query('SELECT name_user, DATE_FORMAT(date_commentary, \'%d/%m/%Y à %Hh%imin%Ss\') AS date_commentary FROM commentarys ORDER BY date_commentary DESC LIMIT 0, 1');
									$donnees = $reponse->fetch(); 
									echo'<p><strong>'.htmlspecialchars($donnees['name_user']). ', a commenté le ' .htmlspecialchars($donnees['date_commentary']).'</p></strong><p>';
									
									$reponse->closeCursor();
								?>
							</h5>
							<p class="card-text">
								<?php 
									$reponse = $db->query('SELECT commentary FROM commentarys ORDER BY date_commentary DESC LIMIT 0, 1');
									$donnees = $reponse->fetch();
									echo'</p></strong><p>'.htmlspecialchars($donnees['commentary']).'</p>';
									
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
								echo $formUser->label('Titre du billet :');
								echo $formUser->inputName('name');
								?>
							</div>
							<div class="form-group">
								<?php
								echo $formUser->label('Ecrivez ici votre billet :');
								echo $formUser->inputCommentary('commentary');
								?>
							</div>
							<?php
							echo $formUser->erase();
							echo $formUser->submit();
							?>
						</form>
					</div>

				</div>
			</div>

		</div>
	</body>
</html>