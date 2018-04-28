<?php ob_start();  ?>	

<div class="row justify-content-center">
	<div class="card" style="width: 55rem;">
		<img class="card-img-top" src="../public/img/alaska.png" alt="Paysage de l'Alaska pour le blog de Jean Forteroche : 'Billet simple pour l'Alaska'">
			<div class="card-body">
				<div class="row justify-content-center">
					<h5 class="card-title">
						<strong>Roman de Jean Forteroche : "Billet simple pour l'Alaska"</strong>
					</h5>
				</div>
				<div class="row justify-content-center">
					<p class="card-text"><em>L'auteur innove en publiant par épisodes ses billets en ligne directement sur son propre site.</em></p>
				</div>			
			</div>
			<ul class="list-group list-group-flush">
				<li class="list-group-item">Que souhaitez-vous faire ?</li>
				<li class="list-group-item"><a href="index.php?action=login" class="card-link"><em>Vous connecter ou accéder directement ?</em></a></li>
				<li class="list-group-item"><a href="index.php?action=writing" class="card-link"><em>Ecrire un nouveau billet ?</em></a></li>
				<li class="list-group-item"><a href="index.php?action=lastBillets" class="card-link"><em>Lire les derniers billets ?</em></a></li>
				<li class="list-group-item"><a href="index.php?action=reading" class="card-link"><em>Lire le roman ?</em></a></li>
			</ul>
			<div class="card-body">
				<div class="row justify-content-center">
					<p class="card-text"><em>Découvrez les terres sauvages de l'Alaska</em></p>
				</div>	
			</div>
	</div>
	
</div>
<?php $content = ob_get_clean();  ?>
  
