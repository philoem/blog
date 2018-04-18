<?php
if (isset($_GET['action'])) {
	
	if ($_GET['action'] == 'register') {
		header('Location: controlers/registerControl.php');
		
	}
	if ($_GET['action'] == 'login') {
		header('Location: controlers/AccesControl.php');
		require './controlers/AccesControl.php';
		//login();

	}
	if ($_GET['action'] == 'reading') {
		header('Location: ./controlers/user_postControl.php');
	
	}
	if ($_GET['action'] == 'lastBillets') {
		header('Location: ./views/user.php');

	}

} 


?>
<!DOCTYPE html>
<html lang="fr">
<!-- Ici le head  -->
	<?php include ('./views/inc/head_html.php'); ?>

	<body>
<!-- Ici le header  -->
		<?php include ('./views/inc/header_index.php'); ?> 

<!-- Ici le body avec le formulaire d'accueil  -->
		<?php  require('./views/home.php'); ?>
		<?php echo $content;  ?>
		
	</body>

</html>
