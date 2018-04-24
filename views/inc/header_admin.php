<?php
session_start();


?>
<header>
	<nav class="navbar fixed-top navbar-dark bg-primary">
		<div class="navbar-brand" id="content_header">
			<h1 class="font-weight-normal">Bienvenu à vous "<?php if(isset($_SESSION['pseudo'])){?><span class="text-capitalize font-italic font-weight-bold"><?= $_SESSION['pseudo'];} ?>"</span></h1>
			<a href="../views/admin2.php" id="paragraph_header"><em>Allez directement dans votre espace rédaction</em></a>
			<a href="../controlers/logout.php" id="paragraph_header" class="font-weight-light">Se déconnecter</a>
		</div>
	</nav>
</header>
	

