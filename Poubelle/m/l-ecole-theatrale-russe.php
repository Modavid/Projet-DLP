<!DOCTYPE html >
		<?php
		include(dirname(__FILE__)."/header.php");
	?>
<html>
	<head>
		<meta name="viewport" content="width=device-width"/>
		<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
		<!--[if lt IE 9]>
		    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="style/style-l-ecole-theatrale-russe.css" rel="stylesheet" media="all" type="text/css">
		
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
		<div class="text-bloc1"><h1>L'école de théâtre russe « Demain le Printemps »</h1>
		<!--<h3>a pour activité principale les échanges culturels internationaux</h3>-->
		
		<p>L’enseignement proposé est issu de la tradition théâtrale d’Europe de l’Est. Intensif et pluridisciplinaire, il répond à un besoin d’exigence et une soif d’apprendre exprimée par de nombreux aspirants comédiens, venant principalement d’Europe et du Québec et ne trouvant pas de formation équivalente dans leurs pays d’origine.
		</p>
		
		<p>Elle forme depuis 1998 de jeunes passionnés de théâtre en voie de professionnalisation à travers des stages intensifs de formation de l'acteur. Depuis 2004, l’école propose une formation complète de 9 mois se déroulant de septembre à juin, appelée « Masterclass ». 
		</p>
		</div>
		<!--fin div text-bloc1-->
		
			<center>
				<a class="fancybox" rel="group" href="../images-site/demain-le-printemps-masterclass-large-1.jpg"title="Constantin Stanislavski et Vladimir Nemirovitch-Dantchenko "> <img src="../images-site/demain-le-printemps-masterclass-1.jpg" title="" alt="demain-le-printemps-masterclass"/></a>
			</center>
			<div class="text-bloc1"><h2>Qu’est-ce que « l’École Théâtrale Russe ? »</h2>
				<p>« L’École Théâtrale Russe » est une approche de l’art de l’acteur qui a été initiée, à la fin du XIXème siècle, par un courant novateur : « Être acteur, c’est développer en permanence sa fibre artistique, sa sensibilité, son humanisme avec un esprit citoyen ». Vladimir Nemirovitch-Dantchenko et Constantin Stanislavski sont à l’origine de l’école Russe. 
				</p>
				<p>La formation du comédien est fondée sur l’enseignement d’une technique, mais aussi sur le développement, chez l’acteur, d’une attitude face à son travail. Une éthique de vie et de travail, basée sur le respect de son partenaire et de son public, un développement de l’imagination et de la curiosité pour faire de l’acteur avant tout un artiste dans l’âme.
				</p>
				<p>Le metteur en scène et pédagogue russe Constantin Stanislavski a, en effet, ajouté à l’apprentissage technique, une transformation de l’individu en tant que personne, connectée à un métier qui exige un travail permanent sur soi, « car l’acteur travaille avec son corps, son esprit, ses propres sentiments et émotions ».
				</p>
				<!--fin div text-bloc2-->
			</div>
		
			<br>
		<!--fin div paragraphe-image-->
		
		<div class="liens">
		<a href="../pdf/Plaquette-presentation-demain-le-printemps.pdf" target="_blank"><p>> Télécharger le dossier de présentation</p></a>
		<a href="contenu-pedagogique.php" target="_blank"><p>> Découvrir notre formation</p></a>
		</div>
		
		
		
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
