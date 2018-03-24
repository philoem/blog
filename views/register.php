<?php
	//session_start();
	require_once('../models/model.php');
	$db = dbConnect();

	if (isset($_POST['submit_register'])) {
		$prenom = htmlspecialchars($_POST['prenom']);
		$nom = htmlspecialchars($_POST['nom']);
		$pseudo = htmlspecialchars($_POST['pseudo']);
		$mail = htmlspecialchars($_POST['mail']);
		$mail_confirm = htmlspecialchars($_POST['mail_confirm']);
		$passwordRegister = sha1($_POST['passwordRegister']);
		$confirmPasswordRegister = sha1($_POST['confirmPasswordRegister']);
		
		if (!empty($_POST['prenom']) AND !empty($_POST['nom']) AND !empty($_POST['pseudo']) AND !empty($_POST['mail']) AND !empty($_POST['mail_confirm']) AND !empty($_POST['passwordRegister']) AND !empty($_POST['confirmPasswordRegister'])) {
			$pseudolength = strlen($pseudo);
			
			if ($pseudolength <= 60) {
				$reqpseudo = $db->prepare('SELECT * FROM login_admin WHERE pseudo = ?'); // Ici vérification que le pseudo n'existe pas déjà
				$reqpseudo->execute([$pseudo]);
				$pseudoexist = $reqpseudo->rowCount();
				
				if ($pseudoexist == 0) {
					
					if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
						$reqmail = $db->prepare('SELECT * FROM login_admin WHERE mail_admin = ?'); // Ici vérification que le mail n'existe pas déjà
						$reqmail->execute([$mail]);
						$mailexist = $reqmail->rowCount();
						
						if ($mailexist == 0) {
							
							if ($mail == $mail_confirm) {
								
								if ($passwordRegister == $confirmPasswordRegister) {
									$req = $db->prepare('INSERT INTO login_admin(prenom, nom, pseudo, mail_admin, password_admin, date_login) VALUES(?, ?, ?, ?, ?, NOW())');
									$req->execute([$prenom, $nom, $pseudo, $mail, $passwordRegister]);
									$error = "VOTRE COMPTE A BIEN ETE CREE !";
									header('Location: ../login.php');
								} else {
									$error = "Vos mots de passes ne sont pas identiques !";
								}
							} else {
								$error = "Vos adresses mail ne sont pas identiques !";
							}
						} else {
							$error = "Ce mail est déjà utlisé !";
						}
					} else {
						$error = "Votre adresse mail n'est pas bonne !";
					}
				} else {
					$error = "Ce pseudo est déjà utilisé !";
				}
			} else {
				$error = "Votre pseudo ne doit pas dépasser 60 caractères !";
			}
		} else {
			$error = "Veuillez remplir les champs ci-dessus pour valider votre inscription";
		}
	}
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
					<form method="post" action="#">
                    <div class="form-group">
							<label for="exampleInputPrenom1">Votre Prénom</label>
							<input type="text" class="form-control" name="prenom" id="exampleInputPrenom1" aria-describedby="prenomHelp"  >
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
<!-- Ici affichage des messages d'erreurs  -->
			<div class="container" id="error_register">
				<?php 
					if (isset($error)) {
						echo $error;
					}
				?>
			</div>

		</div>
	</body>
</html>