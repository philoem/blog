<?php
if (isset($_GET['action'])) {
	
	if ($_GET['action'] === 'writing' ) {
			
			header('Location: ../views/admin2.php');
		
	}
	if ($_GET['action'] === 'login') {
		header('Location: ../controlers/AccesControl.php');
				

	}
	if ($_GET['action'] === 'reading') {
		header('Location: ../controlers/user_postControl.php');
	
	}
	if ($_GET['action'] === 'lastBillets') {
		header('Location: ../controlers/userControl.php');

	}
	
} 


?>
<!DOCTYPE html>
<html lang="fr">
<!-- Ici le head  -->
	<?php include ('./views/inc/head_html.php'); ?>

	<body>
<!-- Ici le header  -->
		<?php include './views/inc/header_index.php'; ?> 

<!-- Ici le body avec le formulaire d'accueil  -->
		<?php  require './views/home.php'; ?>
		<?= $content;  ?>
		
	</body>

</html>
