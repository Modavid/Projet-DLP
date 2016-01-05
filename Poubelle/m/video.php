<! DOCTYPE html >
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
		
		<link href="style/style-video.css" rel="stylesheet" media="all" type="text/css">
		<link href="style/style-l-ecole-theatrale-russe.css" rel="stylesheet" media="all" type="text/css">
		<link href="style/style-nos-eleves.css" rel="stylesheet" media="all" type="text/css">
		<!--script loading fancybox-->
		<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
		
		<link rel="stylesheet" href="/lib/fancy-box/source/jquery.fancybox.css" type="text/css" media="screen" />
		<script src="/lib/fancy-box/source/jquery.fancybox.pack.js" type="text/javascript">
		</script>
		<link rel="stylesheet" href="/lib/fancy-box/source/rollover-effect.css" type="text/css" media="screen"/> 
		
	</head>
	
<body>
	
<section class="conteneur-superieur">
		<div class="conteneur">
		<h1>Galerie video</h1>
		<!--<section id="video-galerie">-->
		<div id="video-galerie">
			<div class="table-center">

				<div type="eleve" class="case-video"><a class="fancybox fancybox.iframe" href="//www.youtube.com/v/UTHgPqzAG40?version=3&autoplay=1<strong>&modestbranding=1&rel=0"/>
					<span class="roll-video"></span>
					<img class="play"src="/images-design/play.png" alt="play" />
					<img src="/images-design/galerie-video/demain-le-printemps-masterclass.jpg" width="200" height="130" alt="video"/>
					Masterclass</a>
				</div>
				
				<div type="eleve" class="case-video"><a class="fancybox fancybox.iframe" href="//www.youtube.com/watch?v=vU_1xUPb7KM"/>
					<span class="roll-video"></span>
					<img class="play"src="/images-design/play.png" alt="play" />
					<img src="/images-design/galerie-video/demain-le-printemps-vie-de-l-ecole.jpg" width="200" height="130" alt="video" />
					Vie de l'ecole</a>
				</div>
		
			</div>
		<br><br>
				
			<div class="table-center">
				
				<div type="eleve" class="case-video"><a class="fancybox fancybox.iframe" href="//www.youtube.com/embed/6gXbDD9TXE8?rel=0"/>
					<span class="roll-video"></span>
					<img class="play"src="/images-design/play.png" alt="play" />
					<img src="/images-design/galerie-video/demain-le-printemps-ecole.jpg"  alt="video" />
					Presentation de la formation</a>
				</div>
				
				<div type="eleve" class="case-video"><a class="fancybox fancybox.iframe" href="//www.youtube.com/embed/uyFZc2udi9M?rel=0"/>
					<span class="roll-video"></span>
					<img class="play"src="/images-design/play.png" alt="play" />
					<img src="/images-design/galerie-video/demain-le-printemps-claquette.jpg" alt="video" />
					Cours de claquettes</a>
				</div>
				
				<div type="eleve" class="case-video"><a class="fancybox fancybox.iframe" href="//www.youtube.com/embed/3csuBGHEAvs?rel=0"/>
					<span class="roll-video"></span>
					<img class="play"src="/images-design/play.png" alt="play" />
					<img src="/images-design/galerie-video/demain-le-printemps-biomecanique.jpg" alt="video" />
					Cours de Biomécanique</a>
				</div>
		
				<div type="eleve" class="case-video"><a class="fancybox fancybox.iframe" href="//www.youtube.com/embed/lAEvWrBQWpo?rel=0"/>
					<span class="roll-video"></span>
					<img class="play"src="/images-design/play.png" alt="play" />
					<img src="/images-design/galerie-video/demain-le-printemps-escrime.jpg"  alt="video" />
					Cours d'escrime</a>
				</div>
				
				<div type="eleve" class="case-video"><a class="fancybox fancybox.iframe" href="//www.youtube.com/embed/c5W4LTGE4R8?rel=0"/>
					<span class="roll-video"></span>
					<img class="play"src="/images-design/play.png" alt="play" />
					<img src="/images-design/galerie-video/demain-le-printemps-combat.jpg"  alt="video" />
					Cours de combat</a>
				</div>
				
				<div type="eleve" class="case-video"><a class="fancybox fancybox.iframe" href="//www.youtube.com/embed/1H2K_SXm1G4?rel=0"/>
					<span class="roll-video"></span>
					<img class="play"src="/images-design/play.png" alt="play" />
					<img src="/images-design/galerie-video/demain-le-printemps-video-Retour-Masterclass-Espace-Daniel-Sorano.jpg"  alt="video" />
					Retour de la Ma10 a Sorano</a>
				</div>
				
				<div type="eleve" class="case-video"><a class="fancybox fancybox.iframe" href="//www.youtube.com/embed/va6Hp7oFh_4?rel=0"/>
					<span class="roll-video"></span>
					<img class="play"src="/images-design/play.png" alt="play" />
					<img src="/images-design/galerie-video/demain-le-printemps-lipdub.jpg" alt="video"/>
					Lipdub avec les eleves</a>
				</div>
				
			</div>
		</div>
		<br><br><br>
		<div class="liens">
			<a href="form-pre-inscription-en-ligne.php" TARGET="_blank"><p>> Pré-inscription</p></a>
			<a href="comment-sinscrire.php" TARGET="_blank"><p>> Comment s'incrire à la Masterclass</p></a>
		</div>
</div> 
<!--Fin div conteneur-->
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

