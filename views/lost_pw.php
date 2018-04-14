<?php
session_start();

// Appel du formulaire de connexion - autoloading
require '../vendor/autoload.php';
require_once '../controlers/AccesControl.php';

use \Forteroche\FormLostPw;
$formLostPw = new FormLostPw();

	
?>
<!DOCTYPE html>
<html lang="fr">
<!-- Ici le head  -->
	<?php include ('../views/inc/head_html.php'); ?>
	<body>
		<div class="container-fluid">
<!-- Ici le header  -->
			<?php include '../views/inc/header_lost_pw.php'; ?>
			
<!-- Ici le formulaire pour récupérer le mot de passe  -->			
			<div class="col-xs-12" id="form_style">
				<div class="row justify-content-center" >
					<form method="post" action="../controlers/lostPwControl.php" >
						<fieldset class="fieldset_login">
							<div class="form-group">
								<div class="row justify-content-center"><?= $formLostPw->labelTitle('Tapez votre adresse mail :');?></div>
								<div class="row justify-content-center"><?= $formLostPw->inputMail('mailRecup');?></div>
							</div>
						</fieldset>
						<?php
                        echo $formLostPw->erase();
                        ?>
                        <?php
                        echo $formLostPw->submit();
						?>
					</form>
    			</div>
			</div>
			
		</div>
	</body>
</html>