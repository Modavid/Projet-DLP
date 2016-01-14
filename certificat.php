<! DOCTYPE html >
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
		<!--[if lt IE 9]>
		    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="style/style-l-ecole-theatrale-russe.css" rel="stylesheet" media="all" type="text/css">
		<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
		
		<link rel="stylesheet" href="lib/fancy-box/source/jquery.fancybox.css" type="text/css" media="screen" />
		<script src="/lib/fancy-box/source/jquery.fancybox.pack.js" type="text/javascript">
		</script>
		
		<!-- <link rel="image_src" href="www.ecole-theatrale.fr/images-site/demain-le-printemps-attestation-small-3.jpg"> -->
       	<title>Certificat</title>
        <meta property="og:title" content="certificat"/>
        <meta property="og:type" content="website"/>
        <meta property="og:url" content="http://www.ecole-theatrale.fr/certificat.php"/>
       	<meta property="og:image" content="http://www.ecole-theatrale.fr/images-site/demain-le-printemps-attestation-2.jpg"/>
		<link rel="icon" type="image/png" href="/Image/images-design/mafavicon-1.ico" />
	</head>
	
<body>
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
		<div class="conteneur">
			<div class="text-bloc1">
				<h1>Attestation fin de la formation</h1>
				<p>A la fin du cursus MOO TEATRO et DEMAIN LE PRINTEMPS ont le plaisir de délivrer aux élèves une attestation de fin de formation incluant la période de stage, les matières enseignées, le nombres d’heures effectuées. 
                 Pour la Masterclass, il s’agit d’un livret bilingue (Français-Biélorusse) qui contient, en plus, le nom des professeurs et le détail du nombre d’heures réalisés pour chaque discipline.</p>
				<p>La formation complète de 9 mois (appelée Masterclass) commence par une cérémonie d'ouverture puis à la fin de l'année, une cérémonie de clôture est organisée pour y mettre un point final.</p>
					
				
			</div>
			<div class="bloc-images">
				<ul type="center">
					<li><a class="fancybox" rel="group" href="/images-site/demain-le-printemps-attestation-1.jpg" title=""><img src="/images-site/demain-le-printemps-attestation-small-1.jpg"  alt="cottage"/></a></li>
					<li><a class="fancybox" rel="group" href="/images-site/demain-le-printemps-attestation-2.jpg" title=""><img src="/images-site/demain-le-printemps-attestation-small-2.jpg"  alt="cottage"/></a></li>
					<li><a class="fancybox" rel="group" href="/images-site/demain-le-printemps-attestation-3.jpg" title=""><img src="/images-site/demain-le-printemps-attestation-small-3.jpg"  alt="cottage"/></a></li>
				</ul>
			</div>
			<br>
			<div class="liens">
				<div class="fb-like" data-href="http://www.ecole-theatrale.fr/certificat.php" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>
			<!--	<a href="/pdf/Plaquette-presentation-demain-le-printemps.pdf" target="_blank"><p>> Télécharger le dossier de présentation</p></a>
				<a href="comment-sinscrire.php" target="_blank"><p>> Comment s'inscrire à la Masterclass</p></a>
				<a href="form-pre-inscription-en-ligne.php" target="_blank"><p>> Demande d'information en ligne</p></a> -->
			</div>
		<script type="text/javascript">
			$(document).ready(function() {
				$(".fancybox").fancybox();
			});
		</script>
		
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
</body>
</html>