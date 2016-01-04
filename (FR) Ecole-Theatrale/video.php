<! DOCTYPE html >
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
		<!--[if lt IE 9]>
		    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		
		<link href="style/style-video.css" rel="stylesheet" media="all" type="text/css">
		<link href="style/style-emploi-du-temps.css" rel="stylesheet" media="all" type="text/css">
		<!--script loading fancybox-->
		<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
		
		<link rel="stylesheet" href="lib/fancy-box/source/jquery.fancybox.css" type="text/css" media="screen" />
		<script src="/lib/fancy-box/source/jquery.fancybox.pack.js" type="text/javascript">
		</script>
		<link rel="stylesheet" href="lib/fancy-box/source/rollover-effect.css" type="text/css" media="screen"/> 
		
	</head>
	
<body>
	<!--Bouton Facebook-->
	<div id="fb-root"></div>	
	<script>(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
		js.src = "//connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.0";
		fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
	</script>
	
	<?php
	include(dirname(__FILE__)."/header.php");
	?>
	
<section class="conteneur-superieur">
		<div class="conteneur"style="overflow:auto">
		<h1>Galerie vidéo</h1>
		<!--<section id="video-galerie">-->
		<div id="video-galerie">
			

				<div class="case-video"><a class="fancybox fancybox.iframe" href="//www.youtube.com/v/UTHgPqzAG40?version=3&autoplay=1<strong>&modestbranding=1&rel=0"/>
					<span class="roll-video"></span>
					<img class="play"src="images-design/play.png" alt="play" />
					<img src="images-design/galerie-video/demain-le-printemps-masterclass.jpg" width="200" height="130" alt="video"/><br>
					Masterclass</a>
				</div>
				
				<div class="case-video"><a class="fancybox fancybox.iframe" href="//www.youtube.com/embed/vU_1xUPb7KM?rel=0"/>
					<span class="roll-video"></span>
					<img class="play"src="images-design/play.png" alt="play" />
					<img src="images-design/galerie-video/demain-le-printemps-vie-de-l-ecole.jpg" width="200" height="130" alt="video" /><br>
					Vie de l'ecole</a>
				</div>
		
			
			<ul>
				
				<div class="case-video"><a class="fancybox fancybox.iframe" href="//www.youtube.com/embed/6gXbDD9TXE8?rel=0"/>
					<span class="roll-video"></span>
					<img class="play"src="images-design/play.png" alt="play" />
					<img src="images-design/galerie-video/demain-le-printemps-ecole.jpg"  alt="video" /><br>
					Presentation de la formation</a>
				</div>
				
				<div class="case-video"><a class="fancybox fancybox.iframe" href="//www.youtube.com/embed/uyFZc2udi9M?rel=0"/>
					<span class="roll-video"></span>
					<img class="play"src="images-design/play.png" alt="play" />
					<img src="images-design/galerie-video/demain-le-printemps-claquette.jpg" alt="video" /><br>
					Cours de claquettes</a>
				</div>
				
				<div class="case-video"><a class="fancybox fancybox.iframe" href="//www.youtube.com/embed/3csuBGHEAvs?rel=0"/>
					<span class="roll-video"></span>
					<img class="play"src="images-design/play.png" alt="play" />
					<img src="images-design/galerie-video/demain-le-printemps-biomecanique.jpg" alt="video" /><br>
					Cours de Biomécanique</a>
				</div>
				
			</ul>
			<ul>
		
				<div class="case-video"><a class="fancybox fancybox.iframe" href="//www.youtube.com/embed/lAEvWrBQWpo?rel=0"/>
					<span class="roll-video"></span>
					<img class="play"src="images-design/play.png" alt="play" />
					<img src="images-design/galerie-video/demain-le-printemps-escrime.jpg"  alt="video" /><br>
					Cours d'escrime</a>
				</div>
				
				<div class="case-video"><a class="fancybox fancybox.iframe" href="//www.youtube.com/embed/c5W4LTGE4R8?rel=0"/>
					<span class="roll-video"></span>
					<img class="play"src="images-design/play.png" alt="play" />
					<img src="images-design/galerie-video/demain-le-printemps-combat.jpg"  alt="video" /><br>
					Cours de combat</a>
				</div>
				
				<div class="case-video"><a class="fancybox fancybox.iframe" href="//www.youtube.com/embed/1H2K_SXm1G4?rel=0"/>
					<span class="roll-video"></span>
					<img class="play"src="images-design/play.png" alt="play" />
					<img src="images-design/galerie-video/demain-le-printemps-video-Retour-Masterclass-Espace-Daniel-Sorano.jpg"  alt="video" /><br>
					Retour de la Ma10 a Sorano</a>
				</div>
				
			</ul>
			<ul>
				
				<div class="case-video"><a class="fancybox fancybox.iframe" href="//www.youtube.com/embed/va6Hp7oFh_4?rel=0"/>
					<span class="roll-video"></span>
					<img class="play"src="images-design/play.png" alt="play" />
					<img src="images-design/galerie-video/demain-le-printemps-lipdub.jpg" alt="video"/><br>
					Lipdub avec les eleves</a>
				</div>
				
			</ul>

		
		
		<div class="liens">
			<div class="fb-like" data-href="http://www.ecole-theatrale.fr/video.php" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>
		
		</div>
				</div>
</div> 
<!--Fin div conteneur-->
<?php
			include(dirname(__FILE__)."/barre-laterale.php");
			?>
	<!--Fin section conteneur-superieur-->
</section>

<?php
	include(dirname(__FILE__)."/footer.php");
?>

	<script type="text/javascript">
		$(document).ready(function() {
			$(".fancybox").fancybox({
				width	:	'70%',
				height 	:	'70%',
			});
	});
			
	</script>
	<script type="text/javascript">
		$(function() {
		<!--OPACITY OF BUTTON SET TO 0%-->
		$(".roll-video").css("opacity","0");
		 
		// ON MOUSE OVER
		$(".roll-video").hover(function () {
		 
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
</body>
</html>

