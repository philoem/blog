<?php
	session_start();

	// Appel du formulaire de création d'un nouveau billet - autoloading
	require '../vendor/autoload.php';
	use Forteroche\FormAdmin;
	
	
	
	$formAdmin = new FormAdmin();

	require_once '../controlers/model.php';
	$db = dbConnect();
	//$db = new DbConnect('projet_4');
?>
<!DOCTYPE html>
<html lang="fr">
<!-- Ici le head  -->
	<?php include ('../views/inc/head_html.php'); ?>
	<body>
		<div class="container-fluid">
<!-- Ici le header -->	 	
			<?php include '../views/inc/header_admin2.php'; ?>	
			
			<div class="container-fluid">
				<div class="row justify-content-center">
					
<!-- Formulaire de création de nouveau billet  -->						
					<div class="col-xs-12 col-lg-8">
						<h3 class="row justify-content-center">Création d'un nouveau billet</h3>
						<form action="../controlers/admin_post.php" method="post">
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