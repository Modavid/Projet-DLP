<! DOCTYPE html >
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
		<!--[if lt IE 9]>
		    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="style/style-stage-chine.css" rel="stylesheet" media="all" type="text/css">
		<link rel="icon" type="image/png" href="/images-design/mafavicon-1.ico" />
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
	<div class="conteneur">
		<div class="text-bloc1">
			<h1>Stage d'été en Chine</h1>
			<h2> Découvrir un pays, une culture, une autre approche du théâtre... 
			« Du kung-Fu à l’Opéra de Pékin- De Stanislavski à Méi Lanfang »</h2>
			<p>L’Association Demain le Printemps vous offre l’opportunité de participer à un stage d’été en Chine. Ce stage de quatre semaines durant le mois d’Août, vous fera découvrir la culture et les arts de la scène chinois. Durant ce stage vous aurez la possibilité de participer à une formation pluridisciplinaire, de 50h par semaine, de 7h à 20h du lundi au samedi.</p>
			<h2>Contenu des cours :</h2>
			<p>- Taï-Chi</br>
			- Kung-Fu</br>
			- Calligraphie</br>
			- Histoire de l’Art</br>
			- Cuisine Chinoise</br>
			- Visites culturelles</br>
			- Cours de Mandarin</br>
			- Acrobatie/cirque de Pékin</br>
			- Techniques de chant de l’Opéra de Pékin
			</p>
			
			<p>PAF 770€* Avant le 31 Décembre 2013 
			PAF 870€* Après le 1e Janvier 2014 
			
			Envoyez dès à présent CV + photo à : ming.chun.org@gmail.com 
			Nous vous transmettrons plus d’informations concernant les modalités d’inscription. 
			
			* PAF : La participation aux frais inclut le prix de la formation, hors billet d’avion, frais d’hébergement, et repas.
			</p>
			<br>
		</div>
		<div class="liens">
			<div class="fb-like" data-href="http://www.ecole-theatrale.fr/stage-chine.php" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>
			<a href="/pdf/Plaquette-presentation-demain-le-printemps.pdf" target="_blank"><p>> Télécharger le dossier de présentation</p></a>
			<a href="comment-sinscrire.php" target="_blank"><p>> Comment s'inscrire à la Masterclass</p></a>
			<a href="form-pre-inscription-en-ligne.php" target="_blank"><p>> Demande d'information en ligne</p></a>
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
</body>
</html>
