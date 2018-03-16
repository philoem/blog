<?php
	// Démarrage de la session
	session_start();

	require_once('backend/model.php');
	$db = dbConnect();
	if (isset($_POST['name']) AND (isset($_POST['commentary']))) {
		$reponse = $db->query('SELECT name, commentary, DATE_FORMAT(date_commentary, \'%d/%m/%Y à %Hh%imin%Ss\') AS date_commentary FROM commentarys ORDER BY date_commentary DESC LIMIT 0, 5');
		while ($donnees = $reponse->fetch()) {
			echo'<p><strong>'.htmlspecialchars($donnees['name']). ' publié le ' .htmlspecialchars($donnees['date_commentary']).'</p></strong><p>'.htmlspecialchars($donnees['commentary']).'</p>';
		}

		$reponse->closeCursor();
	}
?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link href="style.css" rel="stylesheet" type="text/css" >
		<title>Blog</title>
	</head>
	<body>
		<div class="container-fluid">
			
			<?php
				$cookiePseudo = $_COOKIE['pseudo'];

			
			?>

			<fieldset>
				<legend>Blog</legend>
				<form method="post" action="index.php">
					<label for="name">Votre pseudo :</label>
					<p><input type="text" name="name" id="name" value="<?php echo $cookiePseudo; ?>" autofocus required /></p>
					<label for="commentary">Votre commentaire (max 1500 caractères) :</label>
					<p><textarea name="commentary" id="commentary" rows="10" cols="50"></textarea></p>
					<input type="submit" value="Envoyer commentaire" />
				</form>
			</fieldset>

			<?php
								 
			?>
		</div>
	</body>
</html>