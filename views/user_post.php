<!DOCTYPE html>
<html lang="fr">
	<head>
		<?php include ('../views/inc/head_html.php'); ?>
	</head>
	<body>
		<div class="container">
<!-- Ici le header --> 
			<?php include '../views/inc/header_user_post.php'; ?>
			<div class ="col-xs-12 col-lg-12" id="readingBillets">
				<?php 
				
				foreach($bookManager->readAll() as $donnees):
					if ($donnees['approuved'] == 1) {
						echo'<p>'.htmlspecialchars($donnees['billet']).'</p>';
						
					}
				endforeach;
					
				?>
			</div>
						
			
			
			
		</div>
	</body>
</html>


