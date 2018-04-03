<?php
session_start();


?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link href="../public/style.css" rel="stylesheet" type="text/css" >
		<title>Blog J.Forteroche</title>
	</head>
	<body>
		<div class="container-fluid">
<!-- Ici le header  -->
			<?php include ('../views/inc/header_index.php'); ?>

<!-- Ici le header  -->
			<?php include ('../controlers/index_dispatch.php'); ?>

		</div>
	</body>
</html>