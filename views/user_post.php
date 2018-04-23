<!DOCTYPE html>
<html lang="fr">
	<head>
		<?php include ('../views/inc/head_html.php'); ?>
	</head>
	<body>
		<div class="container">
<!-- Ici le header --> 
			<?php include '../views/inc/header_user_post.php'; ?>

			<?php 
			
			foreach($bookManager->readAll() as $donnees):
				if ($donnees['approuved'] == 1) {
					echo'<p>'.htmlspecialchars($donnees['billet']).'</p>';
					
				}
			endforeach;
				
			?>
						
			
			
			
		</div>
	</body>
</html>


