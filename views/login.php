<?php
session_start();

// Appel du formulaire de connexion - autoloading
require '../vendor/autoload.php';
//require './controlers/AccesControl.php';
//require '../models/classe/App/Form/Form';
use classe\App\Form\Form;
$formLogin = new Form();

	
?>
<!DOCTYPE html>
<html lang="fr">
<!-- Ici le head  -->
	<?php include ('../views/inc/head_html.php'); ?>
	<body>
		<div class="container-fluid">
<!-- Ici le header -->
			<?php include '../views/inc/header_login.php'; ?> 
			
<!-- Ici le formulaire pour se connecter  -->			
			<div class="col-xs-12" id="form_style">
				<div class="row justify-content-center" >
					<form method="post" action="../controlers/AccesControl.php" >
						<fieldset class="fieldset_login">
							<div class="form-group">
								<div class="row justify-content-center"><?= $formLogin->label('Votre pseudo :');?></div>
								<div class="row justify-content-center"><?= $formLogin->inputText('pseudo');?></div>
								<div class="row justify-content-center"><?= $formLogin->label('Votre mot de passe :');?></div>
								<div class="row justify-content-center"><?= $formLogin->inputPassword('password');?></div>
							</div>
							<div class="form-check">
								<?php
								echo $formLogin->checkbox('remember');
								echo $formLogin->label('Se souvenir de moi');
								?>
							</div>
						</fieldset>
						<?php
						echo $formLogin->redirect();
						?>
						<?php
						echo $formLogin->submit();
						?>
					</form>
				</div>
			</div>
			
		</div>
	</body>
</html>