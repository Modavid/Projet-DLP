<! DOCTYPE html >
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
		<!--[if lt IE 9]>
		    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<title> Demain le Printemps: Cours de theatre, Stage et Formation à l'étranger. Ecole de theatre avec systeme Stanislavski.</title>
		<meta name="keywords" content="cours de theatre, stanislavski, Stage Theatre, Formation de l'acteur, ecole de theatre, stanislavsky, cours étranger" />
		<meta name="description" content="Demain le Printemps propose des cours de theatre selon le systeme Stanislavski. Vous trouverez dans cette Ecole de theatre une formation de l'acteur ainsi que des stages de theatre."/>
		<meta name="author" content="Daria, Salima, Thomas DUDOUX et David COLLOT"/>
		
		<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
		<link rel="stylesheet" href="lib/fancy-box/source/rollover-effect.css" type="text/css" media="screen"/>
		
		<link href="style/style-index.css" rel="stylesheet" media="all" type="text/css">
		<link rel="icon" type="image/png" href="/images-design/mafavicon-1.ico" />
	</head>
<body>
	<div id="fb-root"></div>
	<!--Bouton Facebook-->
	<script>(function(d, s, id) {
 		var js, fjs = d.getElementsByTagName(s)[0];
  		if (d.getElementById(id)) return;
  		js = d.createElement(s); js.id = id;
  		js.src = "//connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.0";
  		fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
	</script>
		<!--Menu-->
	<?php
	include(dirname(__FILE__)."/header.php");
	?>
	<!--Fin menu-->
	
	<section id="bloc-principal">
	<section id="caroussel">
	
	   <!-- Les deux asside suivantes sont pour les bandeaux rouges : Pas besoin de parler russe, diplome en fin de stage .-->
	   <a href="traduction.php"><aside id="petit-bandeau1"></aside></a>
	   <a href="certificat.php"><aside id="petit-bandeau2"></aside></a>
	    
	</section>
	
	<!-- Section Réseaux sociaux-->
	<section id="reseaux-soc">
		<aside class="image-reseaux-soc"><a href="https://www.facebook.com/pages/Demain-le-Printemps-Lecole-Theatrale-Russe/106112662782349?fref=ts" target="_blank"><img src="/images-design/icone-fbook.png" alt="Facebook" title="facebook"/></a></aside>
		<aside class="image-reseaux-soc"><a href="https://twitter.com/dlptheatre" target="_blank"><img src="/images-design/icone-twitter.png" alt="Twitter" title="twitter"/></a></aside>
		<aside class="image-reseaux-soc"><a href="https://plus.google.com/111219345700075602953/posts" target="_blank"><img src="/images-design/icone-google.png" alt="Google+"title="Google+"/></a></aside>
		<aside class="image-reseaux-soc"><a href="https://www.youtube.com/v/UTHgPqzAG40?feature=watch" target="_blank"><img src="/images-design/icone-youtube.png" alt="Youtube"title="Youtube"/></a></aside>
		<aside class="image-reseaux-soc"><a href="http://demainleprintemps.wordpress.com/" target="_blank"><img src="/images-design/icone-blogger.png" alt="Blogger"title="Blogger"/></a></aside>
		
	</section>
	
	
	<!-- Section 1 qui contient la présentation de l'association + le panneau d'actualité-->
		<section id="bloc-gauche"> 
			<div class="fb-like" data-href="http://www.ecole-theatrale.fr/index.php" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>
			<article id="presentation">
				<h1>L’école théâtrale russe :  Demain le Printemps </h1>
				<p id="text-presentation">Une école de théâtre à Minsk, en Biélorussie, pour découvrir une autre approche de l’art de l’acteur, initiée à la fin du XIXème siècle, selon les principes et les méthodes de Stanislavsky, Michael Chekhov, Meyerhold et Tovstonogov.</p>
			</article>
			
			<section class="conteneur-actualite">
				<?php
				include(dirname(__FILE__)."/actualite.php");
				?>
				
			</section> <!--fin section conteneur-actualite-->
			
		</section>
	
	<!-- Section 2 qui contient le Polamir, des informations concernants le stage et le coin presse-->
	 
				<section id="bloc-milieu">
					<aside class="photo-bloc-milieu">
						<a href="portrait.php">
						<span class="mini-roll"><div class="text-content-mini">Paroles de nos anciens élèves</div></span>
						<img class="image-mini-barre" src="/images-design/image-demain-le-printemps-portrait-small.jpg"/>
						<aside class="titre-mini-barre"><p>Portraits</p></aside>
						</a>
					</aside>
					
					<aside class="photo-bloc-milieu">
						<a href="/pdf/Plaquette-d'adhésion-DLP.pdf" target="_blank">
						<span class="mini-roll"><div class="text-content-mini">Comment </br> nous soutenir ?</div></span>
						<img class="image-mini-barre" src="/images-design/image-demain-le-printemps-formation-small.jpg"/>
						<aside class="titre-mini-barre"><p>Nous soutenir</p></aside>
						</a>
					</aside>
					
					<aside class="photo-bloc-milieu">
						<object width="170" height="120">
						<param name="movie" value="//www.youtube.com/embed/P_wNFYQEKr0?rel=0</strong>"></param>
						<param name="allowScriptAccess" value="always"></param>
						<embed src="//www.youtube.com/v/1H2K_SXm1G4?version=3&autoplay=0<strong>&modestbranding=1&rel=0</strong>&controls=0&theme=light&title=Mon titre paramétrable&showinfo=0" type="application/x-shockwave-flash" allowscriptaccess="always" width="170" height="120"></embed>
						</object>
					</aside>
				</section>
				
			<!-- Section 3 qui contient l'affichage facebook (peut etre revirement a twitter)-->
				<section id="affichage-facebook">
					<a class="twitter-timeline" href="https://twitter.com/dlptheatre" data-widget-id="339306238724694016" width="170" height="400px">Tweets de @dlptheatre</a>
					<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
				</section>
				
			
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
		<aside id="grand-bandeau"> </aside>
	
	<!--Bas de page-->
	<?php
	include(dirname(__FILE__)."/footer.php");
	?>
	<!--Fin bas de page-->
	</body>
</html>


