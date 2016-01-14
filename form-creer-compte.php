<!DOCTYPE html >
<html>
	<head>
		<meta charset="utf-8" http-equiv="content-type" content="text/html" />
		<!--[if lt IE 9]>
		    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="style/style-l-ecole-theatrale-russe.css" rel="stylesheet" media="all" type="text/css">
		<link href="style/style-form.css" rel="stylesheet" media="all" type="text/css">
		
		<script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.10.2.js"></script>
		<link rel="icon" type="image/png" href="/Image/images-design/mafavicon-1.ico" />
	</head>
	
<body>
	<?php
	include(dirname(__FILE__)."/header.php");
	?>
	
	<section class="conteneur-superieur">	
		<div class="conteneur">
		
		    <br/>
			<h1>Bienvenue sur la page de création de login</h1>
              <h2 style="margin-left:60px; margin-right:60px">Merci de choisir comment vous souhaitez vous identifier en cliquant sur l'icone de votre choix.</h2>
			
			<br/>
			<section class="conteneur-superieur">	
			<nav>
             <ul>
			 <li><a href="form-creer-compte-etud.php"><img src="/Image/images-design/ruban-actuel-etudiant.png"></a>  
             <li><a href="form-creer-compte-etud.php"><img src="/Image/images-design/ruban-ancien-etudiant.png"></a>    
             <li><a href="creer-compte-candidat.php"><img src="/Image/images-design/ruban-Candidat.png"></a>    
             <li><a href="creer-compte-fan.php"><img src="/Image/images-design/ruban-fan-du-projet.png"></a>    
             <li><a href="form-creer-compte-membre.php"><img src="/Image/images-design/ruban-membre-de-lequipe.png"></a> 
			 <li><a href="form-creer-compte-stagiaire.php"><img src="/Image/images-design/ruban-stagiaire-bureau-dlp.png"></a>
            </ul>
			</nav>
			</section>
			
			<div class="text-bloc1">
         <p style="margin-bottom:20px">La connexion est optimisée sur le site pour les actuels et anciens élèves de DLP ainsi que l'équipe pédagogique.</p>
         <p style="border: 1px dashed #ffffff; margin-left:60px; margin-right:60px; text-align:justify; margin-bottom:20px">Pour les candidats et les fans et amis du projet il faudra attendre la publication prochaine de l'application Android de DLP pour avoir le plaisir d'interagir avec la communauté.
         En attendant, vous pourrez juste modifier votre profil en vous connectant au site.</p>
		 <h3>À titre informatif : </h3>
		<p style="text-align:justify;margin-bottom:20px"><B>Candidat :</B> pour l’instant votre profil n’apparaît pas mais vous pourrez, très prochainement, interagir avec les anciens élèves des stages et des Masterclass par le biais de l'application Android.</p>
        <p style="text-align:justify;margin-bottom:20px"><B>Amis du projet en Biélorussie :</B> pour l’instant votre profil n’apparaît pas mais vous pourrez, très prochainement, interagir avec les anciens élèves des stages et des Masterclass par le biais de l'application Android.</p>
		<p style="text-align:justify;"><B>Amis du projet en France : </B> pour l’instant votre profil n’apparaît pas. Vous n'êtes pas anciens élèves de nos formations mais vous êtes amis, membres de l’association et nous avons envie d'être en contact avec vous. Par le biais de l'application Android nous pourrons mieux vous informer de nos activités Parisiennes afin de vous y convier.</p>
		
            </div>
			</section> 
			
			<!--
				<form method="post" action="creer-compte.php" class="formulaire">
					<section class="ligne">
						<span class="titre-ligne">Nom</span>
						<input type="text" name="nom"required>
					</section>
	
					<section class="ligne">
						<span class="titre-ligne">Prenom</span>
						<input type="text" name="prenom" required>
					</section>
					-->
					 <!-- <section>
						
						
							<span class="titre-ligne" >Vous êtes ? </span>
								<SELECT name="type" >
									<OPTION>Actuel étudiant
									<OPTION>Ancien étudiant
									<OPTION>Candidat
									<OPTION>Membre de l'equipe
									<OPTION>Fan du projet
									
									</SELECT>
					</section><br>
						
				
					
					<br>
					<br>
				
					<br>
					<input type="submit" value="Envoyer">
				</form>
				
			</div>	
		</div>
		                                                                         -->
	<!-- Fin div conteneur -->
		<?php
			include(dirname(__FILE__)."/barre-laterale.php");
		?>
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
