<! DOCTYPE html >
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
		<title> Demain le Printemps: Cours de theatre, Stage et Formation à l'étranger. Ecole de theatre avec systeme Stanislavski.</title>
		<meta name="keywords" content="cours de theatre, stanislavski, Stage Theatre, Formation de l'acteur, ecole de theatre, stanislavsky, cours étranger" />
		<meta name="description" content="Demain le Printemps propose des cours de theatre selon le systeme Stanislavski. Vous trouverez dans cette Ecole de theatre une formation de l'acteur ainsi que des stages de theatre."/>
		<meta name="author" content="Daria, Salima, Thomas DUDOUX et David COLLOT"/>
		
		<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
		<link rel="stylesheet" href="../lib/fancy-box/source/rollover-effect.css" type="text/css" media="screen"/>
		
		<link href="style/style-index.css" rel="stylesheet" media="all" type="text/css">
		<link href="style/style-l-ecole-theatrale-russe.css" rel="stylesheet" media="all" type="text/css">
		<link rel="icon" type="../image/png" href="../images-design/mafavicon-1.ico" />
	</head>
<body>
	
	<section class="conteneur-superieur">
		<div class="conteneur">
			<div id="caroussel">
			
				<img src="/images-design/caroussel.png" width="100%" style="border-radius: 9px;">
				<div class="ruban">
					<a href="contenu-pedagogique.php"><img src="/images-design/ruban1.png" width="40%"></a>
					<a href="certificat.php"><img src="/images-design/ruban2.png" width="40%"></a>
				</div>
			</div>
	
	<div style="width: 168px;margin-left: auto;margin-right: 20px;">
		<div class="image-reseaux-soc"><a href="https://www.facebook.com/pages/Demain-le-Printemps-Lecole-Theatrale-Russe/106112662782349?fref=ts" target="_blank"><img src="../images-design/icone-fbook.png" alt="Facebook" /></a></div>
		<div class="image-reseaux-soc"><a href="https://twitter.com/dlptheatre" target="_blank"><img src="../images-design/icone-twitter.png" alt="Twitter"/></a></div>
		<div class="image-reseaux-soc"><a href="https://plus.google.com/111219345700075602953/posts" target="_blank"><img src="../images-design/icone-google.png" alt="Google+"/></a></div>
		<div class="image-reseaux-soc"><a href="https://www.youtube.com/v/UTHgPqzAG40?feature=watch" target="_blank"><img src="../images-design/icone-youtube.png" alt="Youtube"/></a></div>
		<div class="image-reseaux-soc"><a href="http://demainleprintemps.wordpress.com/" target="_blank"><img src="../images-design/icone-blogger.png" alt="Blogger"/></a></div>
		
	</div>
	
	
	<!-- Section 1 qui contient la présentation de l'association + le panneau d'actualité-->
		<section id="bloc-gauche"> 

			<article id="presentation">
				<h1>École de théâtre russe « Demain le Printemps »</h1>
				<p id="text-presentation">« L’École Théâtrale Russe » est une approche de l’art de l’acteur qui a été initiée, à la fin du XIXème siècle, par un courant innovateur :
				« Être acteur, c’est développer en permanence sa fibre artistique, sa sensibilité, son humanisme avec un esprit citoyen ».</p>
			</article>
			
				<?php
				include(dirname(__FILE__)."/actualite.php");
				?>
			
		</section>
	
	<!-- Section 2 qui contient le Polamir, des informations concernants le stage et le coin presse-->
	 
				<div class="table-center">
					<div class="photo-bloc-milieu">
						<a href="portrait.php">
						<img class="image-mini-barre" src="../images-design/image-demain-le-printemps-portrait-small.jpg"/>
						<div class="titre-mini-barre"><p>Portraits</p></div>
						</a>
					</div>
					
					<div class="photo-bloc-milieu">
						<a href="contenu-pedagogique.php">
						<img class="image-mini-barre" src="../images-design/image-demain-le-printemps-formation-small.jpg"/>
						<div class="titre-mini-barre"><p>Masterclass</p></div>
						</a>
					</div>
					
					<div class="photo-bloc-milieu">
						<object>
							<param name="movie" value="//www.youtube.com/embed/P_wNFYQEKr0?rel=0</strong>"></param>
							<param name="allowScriptAccess" value="always"></param>
							<embed class="image-mini-barre" src="//www.youtube.com/v/1H2K_SXm1G4?version=3&autoplay=0<strong>&modestbranding=1&rel=0</strong>&controls=0&theme=light&title=Mon titre paramétrable&showinfo=0" type="application/x-shockwave-flash" allowscriptaccess="always"></embed>
							<div class="titre-mini-barre"><p>Vidéo</p></div>
						</object>
					</div>
				</div>
				
			<!-- Section 3 qui contient l'affichage facebook (peut etre revirement a twitter)-->
				<div id="affichage-facebook">
					<a width="95%" class="twitter-timeline" href="https://twitter.com/dlptheatre" data-widget-id="339306238724694016">Tweets de @dlptheatre</a>
					<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
				</div>
				<br><br>
			</div>
		</section>
		<script type="text/javascript">
			$(function() {
			<!--OPACITY OF BUTTON SET TO 0%-->
			$(".mini-roll").css("opacity","0");
			 
			// ON MOUSE OVER
			$(".mini-roll").hover(function () {
			 
			// SET OPACITY TO 70%
			$(this).stop().animate({
			opacity: .7
			}, "slow");
			},
			 
			// ON MOUSE OUT
			function () {
			 
			// SET OPACITY BACK TO 50%
			$(this).stop().animate({
			opacity: 0
			}, "slow");
			});
			});
		</script>
		<!-- 20 ans d'existence -->
		<div id="grand-bandeau">
			<img src="/images-design/bandeau-10ans.png">
		</div>
	
	<!--Bas de page-->
	<?php
	include(dirname(__FILE__)."/footer.php");
	?>
	<!--Fin bas de page-->
	</body>
</html>


