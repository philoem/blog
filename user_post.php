<?php
	require_once('backend/model.php');
	
	$db = dbConnect();
										 
	$reponse = $db->query('SELECT billet FROM book ORDER BY date_billet DESC');
	while ($donnees = $reponse->fetch()) {
		echo'<p>'.htmlspecialchars($donnees['billet']).'</p>';
	}

	$reponse->closeCursor();


