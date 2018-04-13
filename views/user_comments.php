<?php
// Appel du formulaire de création d'un nouveau billet
require '../vendor/autoload.php';
use Forteroche\FormUserComments;
//use Forteroche\BilletsManager;
//use Forteroche\CommentarysManager;

// Connexion à la base de données
//require_once '../controlers/model.php';
//$db = dbConnect();

$formUser = new FormUserComments();
//$billetsUserComments = new BilletsManager();
//$commentarysUserComments = new CommentarysManager();

require '../models/classe/App/Manager/BookManager.php';
use classe\App\Manager\BookManager;
$bookManager = new BookManager();
require '../models/classe/App/Manager/CommentarysManager.php';
use classe\App\Manager\CommentarysManager;
$commentarysManager = new CommentarysManager();


?>				
<!DOCTYPE html>
<html lang="fr">
<!-- Ici le head  -->
	<?php include ('../views/inc/head_html.php'); ?>
	
	<body>
		<div class="container-fluid">
<!-- Ici le header --> 
			<?php include '../views/inc/header_user_comments.php'; ?>

			<div class="container">	
				<div class="row">
					<div class="col-xs-7 col-lg-7">
						<div class="card ">
							<div class="card-header">
								<h5 class="card-title">
									<?php
									/**
									 * Affichage du billet
									*/
									$postBilletId = htmlspecialchars($_GET['id']);
									
									$billetUserComments = $bookManager->read($postBilletId);
									echo '<p><strong>'.htmlspecialchars($billetUserComments['title']).'</strong><em>, billet créé le '.htmlspecialchars($billetUserComments['date_billet']).'</em></p><p>'.htmlspecialchars($billetUserComments['billet']).'</p>'; 
									?>
								</h5>
							</div>
							<div class="card-body">
								<?php
								/**
								 * Affichage des commentaires 
								 */
								$postId = htmlspecialchars($_GET['id']);
								if ($postId) {
									$_POST['book_id'] = $postId;
									
								}
								var_dump($_POST['book_id']);
								
								$commentarysUserComment[] = $commentarysManager->readId($postId);
								
								foreach($commentarysUserComment as $comment):
									if ($postId == $comment['book_id']) {?>
										<p><strong><?= htmlspecialchars($comment['name_user']) ?>,</strong><em> a commenté(e) le <?= htmlspecialchars($comment['date_commentary']) ?> :</em></p><p><?= htmlspecialchars($comment['commentary']) ?></p><?php if($comment['signaled'] == 0){?><a class="btn btn-outline-danger" name ="btnSignaled" role="button" href="../controlers/user_comments_post.php?id=<?= $postId ?>&amp;id_commentary=<?= $comment['id'] ?>&amp;signaled=<?= $comment['signaled'] ?>"><em>Signaler ce commentaire</em></a> <?php } ?>
										<?php }
								endforeach;
								?>
							</div>
						</div>
	<!-- Formulaire de création de nouveau billet  -->						
					</div>
					<div class="col-xs-5 col-lg-5">
						<h3>Création d'un nouveau commentaire:</h3>
						<form action="../controlers/user_comments_post.php" method="post">
							<div class="form-group">
								<?php
								echo $formUser->labelUser('Tapez ici votre nom :');
								echo $formUser->inputName('name_user');
								?>
							</div>
							<div class="form-group">
								<?php
								echo $formUser->labelUser('Ecrivez ici votre commentaire :');
								echo $formUser->inputCommentary('commentary');
								echo $formUser->inputBookId('book_id');
								?>
							</div>
							<div>
								<div>
									<?php
									echo $formUser->erase();
									?>
									<?php
									echo $formUser->submit();
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