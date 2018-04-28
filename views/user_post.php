<!doctype html>
<html lang="fr">
	<head>
		<?php include ('../views/inc/head_html.php'); ?>
	</head>
	<body>
		<div class="container">
<!-- Ici le header -->
			<?php include '../views/inc/header_user_post.php'; ?>  

			<div class ="col-xs-12 col-lg-12" id="readingBillets">
				<?php 
										
				foreach($page->readBillets() as $datas3):

					if ($datas3['approuved'] == 1) {

						echo'<p>'.htmlspecialchars($datas3['billet']).'</p>';
						
					}

				endforeach;
				?>
				<div id="pagination">
					<p><strong><?php $page->displayNumbersPages(); ?></strong></p>
				</div>
								
			</div>

			
		</div>
	</body>
</html>