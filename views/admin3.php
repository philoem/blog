<?php
session_start();
// Sécurisation de la page pour empêcher l'accès via une réécriture de l'url
if (!isset($_SESSION['pseudo']) AND !isset($_SESSION['password'])) {

    header('Location: ../views/login.php');

}
// Chargement autoloading Composer
require '../vendor/autoload.php';

/**
 * 
 * Page de modification des billets
 * 
 */
// Chargement du formulaire de création des billets
require '../models/classe/App/Form/FormAdmin.php';
use classe\App\Form\FormAdminModified;
$formAdminModified = new FormAdminModified();

// Appel ici de BookManager.php le manager d'entité Book
require_once '../models/classe/App/Manager/BookManager.php';
use classe\App\Manager\BookManager;
$bookManager = new BookManager();

// Appel ici de l'entité Book
require_once '../models/classe/App/Entity/Book.php';
use classe\App\Entity\Book;
$book = new Book();

// Lecture du billet et de son titre sélectionné pour le mettre dans les champs du formulaire Tinymce
$postBilletId = $_GET['id'];
$billetAdd = $bookManager->read($postBilletId);
$title = $billetAdd['title'];
$content = $billetAdd['billet'];
//var_dump($postBilletId, $title, $content);

if (isset($_GET['id'])) {
	$_POST['id'] = $postBilletId;
	
	//var_dump($_POST['id']);

	if (isset($_POST['submit_admin_modified'])) {
				
		var_dump($_POST['submit_admin_modified']);	
		$title = $book->setTitle(htmlspecialchars($_POST['title']));
		$billet = $book->setBillet(htmlspecialchars($_POST['billet']));
		$id = htmlspecialchars((int) $_POST['id']);
	
	
		//$postId = (int) $postId;	
		$bookManager->updateTextModified($title, $billet, $id);
		
		header('Location: ../views/admin3.php?id='. $id );
			
         
    } else {
			
		echo "La requête demandée n'a pas aboutie! ";
		echo '<p><a href="../controlers/adminControl.php"><strong>Retour</strong></a></p>';
	}

} else {

	echo "Pas d'id passée dans l'url via le champs 'id'";
	echo '<p><a href="../controlers/adminControl.php"><strong>Retour</strong></a></p>';
}


// Traitement du formulaire pour modifier un billet 
//if (isset($_POST['textarea']) AND !empty($_POST['textarea']) ) {
//    $id = $_POST['id'];
//    $title = $book->setTitle(htmlspecialchars($_POST['title']));
//	$billet = $book->setBillet(htmlspecialchars($_POST['billet']));
//	
//	$bookManager->update('UPDATE book SET title ="'. $title.'", billet ="'.$billet.'" where id ="'.$id.'"');
//	
//	header('Location: ../controlers/adminControl.php');
//
//} else {
//	
//	$_error = '<p>ERROR 409, LA REQUETE NE PEUT ETRE TRAITEE EN L\'ETAT ACTUEL</p><p><a href="../controlers/AccesControl.php"><strong>Retour vers la page des billets et //commentaires</strong></a></p>';
//	
//}


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
<!-- Ici le header 	
			<?php include '../views/inc/header_admin3.php'; ?>	 -->	
			
			<div class="container-fluid">
				<div class="row justify-content-center">
					
<!-- Formulaire de création de nouveau billet  -->						
					<div class="col-xs-12 col-lg-8">
						<h3 class="row justify-content-center">Modification du billet</h3>
						<form action="../views/admin3.php" method="post">
							<div class="form-group">
								<?php
								echo $formAdminModified->label('Titre du billet :');
								echo $formAdminModified->inputTitle($billetAdd['title']);
								?>
							</div>
							<div class="form-group">
								<?php
								echo $formAdminModified->label('Tapez ici pour modifier votre billet :');
								echo $formAdminModified->inputBillet($billetAdd['billet']);
								echo $formAdminModified->inputHidden($billetAdd['id']);
								?>
							</div>
							<div class="row justify-content-center" id="btn_admin2">
                                <div id="btn_admin2">
                                    <?php
                                    echo $formAdminModified->erase();
                                    ?>
                                <?php
                                echo $formAdminModified->submit();
                                ?>
                                </div>
                            </div>
						</form>
					</div>
					<!-- Ici affichage des messages d'erreurs  -->
			<div class="container" id="error_register">
				<?php 
				if (isset($_error)) {
					
					echo $_error;
				}
				
				?>
			</div>
				</div>
			</div>
		</div>
	</body>
</html>