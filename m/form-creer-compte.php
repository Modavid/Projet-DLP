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
		
		<script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.10.2.js"></script>
		<script type="text/javascript">
			$(document).ready(function() {
			
// fade-effet pour les images			
//				$('.fancybox').animate({
//					opacity:.5
//				
//				
//				});
//				$('.fancybox').hover(function(){
//					$(this).stop().animate({opacity:1});
//				}, function(){
//					$(this).stop().animate({opacity:.5});
//				
//				});
			});
		</script>
		
	</head>
	
<body>

	
	<section class="conteneur-superieur">	
		<div class="conteneur">
			<h1>Créer un compte</h1>
		
			<div class="conteneur-formulaire">
				<form method="post" action="creer-compte.php" class="formulaire">
					<section class="ligne">
						<span class="titre-ligne">Nom</span>
						<input type="text" name="nom"required>
					</section>
	
					<section class="ligne">
						<span class="titre-ligne">Prenom</span>
						<input type="text" name="prenom" required>
					</section>
					
					<section>
						<span class="titre-ligne">Vous êtes ou êtiez ? </span>
						<br>
						<div class="ligne-radio">
							<label for="type">Etudiant</label>
							<input type="radio" name="type" value="Etudiant" id="etudiant" required>
						</div>
						<div class="ligne-radio">
							<label for="type">Professeur ou Membre</label>
							<input type="radio" name="type" value="Professeur ou Membre" id="professeur ou membre" required>
						</div>
					</section>
					<br>
					
					<section class="ligne">
						<span class="titre-ligne">Email</span>
						<input type="text" name="email" required>
					</section>
					
					<section class="ligne">
						<span class="titre-ligne">Login</span>
						<input type="text" name="log" required>
					</section>
					
					<section class="ligne">
						<span class="titre-ligne">Mot de passe</span>
						<input type="password" name="password" required>
					</section>
					
					<section class="ligne">
						<span class="titre-ligne">Confirmer mot de passe</span>
						<input type="password" name="mdp" required>
					</section>
				
					<br>
					<input type="submit" value="Envoyer">
				</form>
			</div>
			<br>
		</div> 
	<!-- Fin div conteneur -->
	<!--Fin section conteneur-superieur-->
	</section>
	<!-- Add jQuery library -->
	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
	<!-- Add fancyBox -->
	<link rel="stylesheet" href="/source/jquery.fancybox.css" type="text/css" media="screen" />
	<script type="text/javascript" src="/source/jquery.fancybox.pack.js"></script>
	
	<script type="text/javascript">
		$(document).ready(function() {
			$(".fancybox").fancybox({
			    	helpers: {
			    	              title : {
			    	                  type : 'float'
			    	              }
			    	          }
			    });
		});
	</script>
	
	<?php
		include(dirname(__FILE__)."/footer.php");
	?>
	</body>
</html>
