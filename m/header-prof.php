<link rel="stylesheet" href="style/style-header-admin.css"/>
<div id="logo-and-titre">
 		<a href="index.php"><aside id="logo"></aside></a>
		<div id="titre-principal">
			<p><a href="index.php">Demain </br> le Printemps<a></p>
		</div>
		<!-- Bouton FB-->
	   <div class="fb-like" data-href="http://ecole-theatrale.fr" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div>

</div>

<!--Body-->
<section class="header-admin">
		<!--Bouton Like-->
		<div id="fb-root"></div>
		<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.0";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
		<div id="langues">
				<p><a href="http://www.ecole-theatrale.fr/">FR</a> | 
					<a href="http://tomorrow-spring.org/">EN</a> | 
					<a href="http://www.morgenistfruehling.de/">DE</a> |
					<a href="http://www.escuelateatralrusa.es/">ES</a> |
					<a href="http://www.moo-teatro.org/rus">RU</a> | 
					<a href="http://www.ming-chun.org/">CN</a> | 
					<a href="http://www.morgaulaprintempo.eu/">EO</a>
				</p>
		</div>
		<nav id="nav">
		
			<ul >
				<li> 
					<a class="menu-trait" href="#">École</a>
					<ul id="ecole">
						<li> <a href="l-ecole-theatrale-russe.php">École théâtrale Russe</a> </li>
						<li> <a href="l-equipe-pedagogique.php">Équipe pédagogique</a> </li>
						<li> <a href="site-a-minsk.php">Site à Minsk</a> </li>
						<li> <a href="se-cultiver.php">Se cultiver</a> </li>
					</ul>
				</li>
				<li>
					<a class="menu-trait" href="#">Masterclass</a>
					<ul>
						<li> <a href="contenu-pedagogique.php">Contenu pédagogique</a> </li>
						<li> <a href="emploi-du-temps.php">Emploi du temps</a> </li>
						<li> <a href="certificat.php">Certificat</a> </li>
						<li> <a href="video.php">Vidéo</a> </li>
					</ul>
					
				</li>
				<li>
					<a class="menu-trait" href="#">Stages</a>
					<ul>
						<li> <a href="stage-minsk.php">Minsk</a> </li>
						<li> <a href="stage-chine.php">Chine</a> </li>
					</ul>
				</li>
				<li>
					<a class="menu-trait" href="#">Admission</a>
					<ul>
						<li> <a href="comment-sinscrire.php">S’inscrire à la Masterclass</a> </li>
						<li> <a href="sinscrire-au-stage.php">S’inscrire au Stage</a> </li>
						<li> <a href="seance-decouverte.php">Séance de découverte</a> </li>
						<li> <a href="form-pre-inscription-en-ligne.php">Pré-inscription en ligne</a> </li>
						<li> <a href="tarif-devis.php">Tarifs et Devis</a> </li>
					</ul>
					
				</li>
				<li>
					<a class="menu-trait" href="#">Paroles d’élèves</a>
					<ul>
						<li> <a href="temoignages-etudiant.php">Témoignages </a> </li>
						<li> <a href="portrait.php">Portraits</a> </li>
						<li> <a href="nos-eleves-masterien.php">Nos masteriens</a> </li>
						<li> <a href="nos-eleves-stagiaire.php">Nos stagiaires</a> </li>
					</ul>
					
				</li>
				<li>
					<a class="menu-trait" href="#">Asso</a>
					<ul>
						<li> <a href="asso.php">Présentation</a> </li>
						<li> <a href="collectif.php">Collectif</a> </li>
						<li> <a href="press.php">Presse</a> </li>
						<li> <a href="partenaires.php">Partenaires</a> </li>
					</ul>
				</li>
				
				<li>
					<a class="menu-trait" href="#">Ajouter</a>
					<ul>
						<li> <a href="form-profil-etudiant.php">Modifier email/MDP</a> </li>
						<li> <a href="form-ajouter-actu.php">Ajouter une actu</a> </li>
						<li> <a href="form-fiches-culture.php">Ajouter une fiche culture</a> </li>
					</ul>
				</li>
		
			</ul>

		</nav>

	<?php
			include('db_config.php');
			include('connexion.php');
			$conn = mysql_connect($DB_host, $DB_login, $DB_pass);
			$db = mysql_select_db($DB_select, $conn);
			if (!$conn) { die('Erreur de connexion: ' . mysql_error()); }
			
			$cid=$_SESSION['USERID'];
			$SQL="SELECT prenom FROM utilisateurs WHERE cid='$cid'";
			$result=mysql_query($SQL);
			$row=mysql_fetch_array($result);
			$prenom=htmlspecialchars($row['prenom']);
			$nom=htmlspecialchars($row['nom']);
			
			
		?>
	<section id="sous-header">
			 <p>Bonjour, <?php echo $prenom;?></p>
			 <a href="deconnexion.php">Deconnexion</a>
			 </section>
</section>
<!--Fin body-->