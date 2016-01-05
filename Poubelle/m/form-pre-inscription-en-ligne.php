<!DOCTYPE html >
		<?php
		include(dirname(__FILE__)."/header.php");
	?>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
		<meta name="viewport" content="width=device-width"/>
		<!--[if lt IE 9]>
		    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="style/style-l-ecole-theatrale-russe.css" rel="stylesheet" media="all" type="text/css">
		<link href="style/style-form.css" rel="stylesheet" media="all" type="text/css">
	</head>
	
<body>
	<section class="conteneur-superieur">
		<div class="conteneur">
			<h1>Pré-inscription en ligne</h1>
		<div class="text-bloc1">
			<p>Si notre formation vous intéresse, remplissez ce formulaire et </br>notre équipe vous contactera dans les plus brefs délais.<p>
			</div>
			
			
				<div class="conteneur-formulaire">
				
				<form method="post" action="pre-inscription-en-ligne.php" class="formulaire">
					<section class="ligne">
					   <div class="titre-ligne">Nom</div>
					   <input type="text" name="nom" required>
					</section>
					
					<section class="ligne">
					   <div class="titre-ligne">Prénom</div>
					   <input type="text" name="prenom" required>
					</section>
					
					<section class="ligne">
						<div class="titre-ligne">Email</div>
					   <input type="text" name="email" required>
					</section>
					
					<section class="ligne">
					   <div class="titre-ligne">Numero</div>
					   <input type="text" name="numero" required>
					</section>
					
					<section class="ligne">
						<div class="titre-ligne">Type de formation</div>
						<div class="ligne-radio">
							<label for="formation">Masterclass</label>
							<input type="radio" name="type" value="Formation" id="formation" required>
						</div>
						<div class="ligne-radio">
							<label for="stage">Stage</label>
							<input type="radio" name="type" value="Stage" id="stage" required>
						</div>
					</section>
						
					<section class="ligne">
						<div class="titre-ligne">Ville de destination</div>
						<div class="ligne-radio">
							<label for="minsk">Minsk</label>
							<input type="radio" name="ville" value="Minsk" id="minsk" required>
						</div>
						<div class="ligne-radio"> 
							<label for="pekin">Pékin</label>
							<input type="radio" name="ville" value="Pekin" id="pekin" required>
						</div>
					</section>
					

				   <input type="submit" value="Envoyer">
				</form>
			<br>
			</div>
			
			<div class="liens">
			<a href="contenu-pedagogique.php" TARGET="_blank"><p>> Masterclass</p></a>
			<a href="stage-minsk.php" TARGET="_blank"><p>> Stage à Minsk</p></a>
			<a href="stage-chine.php" TARGET="_blank"><p>> Stage à Pékin</p></a>
			</div>

				</div>
		<!--Fin div conteneur-->
		</div> 
	<!--Fin section conteneur-superieur-->
	</section>

	<?php
		include(dirname(__FILE__)."/footer.php");
	?>
</body>
</html>
