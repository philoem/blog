<?php
// Chargement autoloading Composer
require '../vendor/autoload.php';

// Chargement de la Classe BookManager, gestionnaire d'entité pour les billets
require '../models/classe/App/Manager/BookManager.php';
use classe\App\Manager\BookManager;
$bookManager = new BookManager();


?>

<!DOCTYPE html>
<html lang="fr">
<!-- Ici le head  -->
<?php include ('../views/inc/head_html.php'); ?>
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


