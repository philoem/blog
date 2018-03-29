<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link href="./public/style.css" rel="stylesheet" type="text/css" >
		<title>Espace lecteur</title>
	</head>
	<body>
		<div class="container">
<!-- Ici le header  -->
			<?php include '../views/inc/header_user_post.php'; ?>

			<?php
				require_once('model.php');
				
				$db = dbConnect();
													
				$reponse = $db->query('SELECT billet FROM book ORDER BY date_billet DESC');
				while ($donnees = $reponse->fetch()) {
					echo'<p>'.htmlspecialchars($donnees['billet']).'</p>';
				}

				$reponse->closeCursor();
			?>
			
		</div>
	</body>
</html>


