<?php
	session_start();

?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link href="../style.css" rel="stylesheet" type="text/css" >
		<title>Création compte</title>
	</head>
	<body>
		<div class="container-fluid">
<!-- Ici le header -->
			<?php include './inc/header_register.php'; ?> 
			
			<div class="col-xs-12">
				<div class="row justify-content-center">
					<form method="post" action="../views/register_post.php">
                    <div class="form-group">
							<label for="exampleInputPrenom">Votre Prénom</label>
							<input type="text" class="form-control" name="prenom" id="exampleInputPrenom" aria-describedby="prenomHelp"  >
						</div>
						<div class="form-group">
							<label for="exampleInputNom">Votre Nom</label>
							<input type="text" class="form-control" name="nom" id="exampleInputNom" >
						</div>
                        <div class="form-group">
							<label for="exampleInputPrenom">Votre pseudo :</label>
							<input type="text" class="form-control" name="pseudo" id="exampleInputPrenom" aria-describedby="prenomHelp"  >
						</div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Votre email :</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="mail">    
						</div>
                        <div class="form-group">
                            <label for="exampleInputEmail2">Confirmez votre email :</label>
                            <input type="email" class="form-control" id="exampleInputEmail2" aria-describedby="emailHelp" name="mail_confirm">    
						</div>
						<div class="form-group">
							<label for="exampleInputPassword">Votre mot de passe :</label>
							<input type="password" class="form-control" name="passwordRegister" id="exampleInputPassword" >
						</div>
                        <div class="form-group">
							<label for="exampleInputPasswordConfirm">Confirmez votre mot de passe :</label>
							<input type="password" class="form-control" name="confirmPasswordRegister" id="exampleInputPasswordConfirm" >
						</div>
						<button type="submit" class="btn btn-primary" name="submit_register">Validez votre inscription</button>
					</form>
				</div>
			</div>

			<div class="container" id="error_register">
				<?php 
					
					echo $error;

					if (isset($error)) {
						echo $error;
					}
				?>
			</div>

		</div>
	</body>
</html>