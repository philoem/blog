<?php
if (isset($_GET['action'])) {
	
	if ($_GET['action'] === 'writing' ) {
		header('Location: ../controlers/admin_post.php');
		
	}
	if ($_GET['action'] === 'login') {
		header('Location: ../controlers/AccesControl.php');
				

	}
	if ($_GET['action'] === 'reading') {
		header('Location: ../controlers/user_postControl.php?page=1');
	
	}
	if ($_GET['action'] === 'lastBillets') {
		header('Location: ../controlers/userControl.php');

	}
	
} 


?>
<!DOCTYPE html>
<html lang="fr">
<!-- Ici le head  -->
	<head>
		<?php include ('./views/inc/head_html.php'); ?>
	</head>

	<body>
<!-- Ici le header  -->
		<?php include './views/inc/header_index.php'; ?> 
		<div class="container">
<!-- Ici le body avec le formulaire d'accueil  -->
			<?php  require './views/home.php'; ?>
			<?= $content;  ?>
		</div>
		
	</body>

</html>
