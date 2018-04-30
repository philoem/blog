<?php
// Chargement autoloading Composer
require '../vendor/autoload.php';

// Chargement du formulaire de création des billets
require '../models/classe/App/Form/FormAdmin.php';
use classe\App\Form\FormAdmin;
$formAdmin = new FormAdmin();


?>
<!DOCTYPE html>
<html lang="fr">
	<head>
<!-- Ici TinyMCE  -->
		<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
		<script>
			tinymce.init({ 
				selector:'textarea',
				entity_encoding: 'raw',
				encoding:'UTF-8',
				plugins: 'wordcount',
				branding: false
			});
		</script>
		<?php include ('../views/inc/head_html.php'); ?>
	</head>
	<body>
		<div class="container-fluid">
<!-- Ici le header 	 -->	
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
                                <div>
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