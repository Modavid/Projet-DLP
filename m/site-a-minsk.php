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
	</head>
	
<body>
	

<section class="conteneur-superieur">
	
		<div class="conteneur">
				<div class="text-bloc1">
					<h1>L’hébergement</h1>
					<p>
						À Minsk, les stagiaires sont logés dans des appartements typiquement Biélorusse. Les logements peuvent accueillir, généralement, entre quatre et six personnes.
						Ils partagent des chambres à plusieurs, simples mais confortables, avec deux, trois ou quatre lits. Sur demande, il est possible de réserver une chambre individuelle (cf. tarif chambre individuelle).
						Les logements sont entièrement équipés. Les participants vivent en communauté et sont tous autonomes et responsables du bon fonctionnement interne. Toutes les tâches du quotidien sont, également, équitablement partagées.
					</p>
					<p>
						Les appartements se situent dans le centre urbain de Minsk. Ils sont donc bien desservis par les transports en commun, notamment par le métro et le tramway.
						Ainsi, les participants peuvent rejoindre, facilement et rapidement, les différents lieux de la formation ainsi que les lieux emblématiques de la ville. 
					</p>

					<p>
						Cette vie au cœur de la Biélorussie permet aux stagiaires de découvrir plus entièrement l'activité culturelle du pays et offre la possibilité d’échanges autour de la création artistique.
						Ainsi, ce cadre singulier d'immersion créatrice offre aussi aux participants un engagement plus profond au sein de la vie et de la communauté Biélorusse contribuant fortement à vivre une expérience théâtrale intense et unique.
					</p>
				</div>
					
				<div class="bloc-images">
				
				<ul type="center">
					<li><a class="fancybox" rel="group" href="/images-site/site-minsk/large/IMG_0175.jpg"><img src="/images-site/site-minsk/small/IMG_0175.jpg" width="200" height="200" alt="cottage"/></a></li>
					<li><a class="fancybox" rel="group" href="/images-site/site-minsk/large/IMG_0207.jpg"><img src="/images-site/site-minsk/small/IMG_0207.jpg" width="200" height="200" alt="cottage"/></a></li>
				</ul>
				
				</div>
				
			<!-- Add jQuery library -->
			<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
			
			<!-- Add fancyBox -->
			<link rel="stylesheet" href="/source/jquery.fancybox.css" type="text/css" media="screen" />
			<script type="text/javascript" src="/source/jquery.fancybox.pack.js"></script>
			
			<script type="text/javascript">
				$(document).ready(function() {
					$(".fancybox").fancybox();
				});
			</script>
			<!--Fin div conteneur-->
		
		</div>
		
		<?php
	//	include(dirname(__FILE__)."/barre-laterale.php");
		?>
<!--Fin section conteneur-superieur-->
</section>

<!--</section>-->

<?php
	include(dirname(__FILE__)."/footer.php");
?>

</body>
</html>