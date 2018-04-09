<!DOCTYPE html>
<html lang="fr">
<!-- Ici le head  -->
<?php include ('../views/inc/head_html.php'); ?>
	<body>
		<div class="container">
<!-- Ici le header  -->
			<?php include '../views/inc/header_user_post.php'; ?>

			<?php
			
			require '../models/classe/App/Manager/BookManager.php';
			require '../models/classe/App/Entity/Book.php';
			use classe\App\Entity\Book;
			use classe\App\Manager\BookManager;
			$book = new Book();
			$bookManager = new BookManager();

			foreach($bookManager->readAll() as $donnees):
				echo'<p>'.htmlspecialchars($donnees['billet']).'</p>';
			endforeach;


			//require_once('../controlers/model.php');
			//$db = dbConnect();
			//									
			//$reponse = $db->query('SELECT billet FROM book ORDER BY date_billet DESC');
			//while ($donnees = $reponse->fetch()) {
			//	echo'<p>'.htmlspecialchars($donnees['billet']).'</p>';
			//}
//
			//$reponse->closeCursor();
			?>
			
		</div>
	</body>
</html>

