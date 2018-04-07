<?php
session_start();

?>
<!DOCTYPE html>
<html lang="fr">
	
<!-- Ici le head  -->
	<?php include ('./views/inc/head_html.php'); ?>

	<body>
		<div class="container-fluid">
<!-- Ici le header --> 
			<?php include ('./views/inc/header_index.php'); ?>

<!-- Ici le header  -->
			<?php include ('./controlers/index_dispatch.php'); ?>

		</div>

	</body>
</html>