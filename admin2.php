<?php
	session_start();

	// Appel du formulaire de création d'un nouveau billet - autoloading
	require 'vendor/autoload.php';
	use Forteroche\FormAdmin;
	//use Forteroche\DbConnect;
	$formAdmin = new FormAdmin();

	require_once './models/model.php';
	$db = dbConnect();
	//$db = new DbConnect('projet_4');
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link href="./public/style.css" rel="stylesheet" type="text/css" >
		<title>Espace rédaction</title>
	</head>
	<body>
		<div class="container-fluid">
<!-- Ici le header -->	 	
			<?php include 'views/inc/header_admin2.php'; ?>	
			
			<div class="container-fluid">
				<div class="row justify-content-center">
					
<!-- Formulaire de création de nouveau billet  -->						
					<div class="col-xs-12 col-lg-8">
						<h3 class="row justify-content-center">Création d'un nouveau billet</h3>
						<form action="admin_post.php" method="post">
							<div class="form-group">
								<?php
								echo $formAdmin->label('Titre du billet :');
								echo $formAdmin->inputTitle('title');
								?>
							</div>
							<div class="form-group">
								<?php
								echo $formAdmin->label('Ecrivez ici votre billet :');
								echo $formAdmin->inputBillet('billet');
								?>
							</div>
							<div class="row justify-content-center" id="btn_admin2">
                                <div id="btn_admin2">
                                    <?php
                                    echo $formAdmin->erase();
                                    ?>
                                <?php
                                echo $formAdmin->submit();
                                ?>
                                </div>
                            </div>
						</form>
					</div>
					
				</div>
			</div>
		</div>
	</body>
</html>