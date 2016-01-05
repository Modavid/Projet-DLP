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
		<link href="style/style-affiche-fiche.css" rel="stylesheet" media="all" type="text/css">
		<link href="style/style-nos-eleves.css" rel="stylesheet" media="all" type="text/css">
		<link href="style/style-form.css" rel="stylesheet" media="all" type="text/css">
	</head>
	
<body>
	
<?php
	
	include("db_config.php");
	$conn = mysql_connect($DB_host, $DB_login, $DB_pass);
	$db = mysql_select_db($DB_select, $conn);
	if (!$conn) { die('Erreur de connexion: ' . mysql_error()); }
	$comparedate=0;
	?>
	<section class="conteneur-superieur">
		<div class="conteneur">
		<h1>Nos mastériens</h1>
				<form method="post" action="rechercher-etudiant.php" class="formulaire" style="margin-bottom: 20px;">
					
					<section>
						<span class="titre-ligne">Nom</span>
						<input  style="width:140px;" type="text" name="nom">
					</section>
					<section>
						<span class="titre-ligne">Prenom</span>
						<input  style="width:140px;" type="text" name="prenom">
					</section>
					<input type="submit" value="Rechercher">
					
				</form>
					<div id="block-ou">
						<article id="titre2">ou</article>
					</div>
				<form method="post" action="rechercher-etudiant-par-date.php" class="formulaire" style="margin-bottom: 20px;">
					
					<input type="hidden" name="cursus" value="Masterclass">
					<section>
						<span class="titre-ligne">Année</span>
						<input style="width:140px;" type="number" name="date" min="1995" max="2020" value="2014">
						<input type="submit" value="Rechercher">
					</section>

				</form>
	<div id="conteneur-eleves">
	<?php

	
	$SQL="SELECT * FROM etudiants WHERE type='Masterclass' ORDER BY date DESC";
	$result=mysql_query($SQL);
	if(!$result||mysql_num_rows($result)==0)
	{
		?>
		
		<script>
		alert('PROBLEME BASE DE DONNEES.');
		</script>
		
		<?php
	}
	else
	{
		
		?><div class="table-center"><?php
		while($row = mysql_fetch_array($result))
		{
			$date = htmlspecialchars($row['date']); 
			if(strcmp($date,$comparedate)!=0) 
			{
				?>
				<div class="promo">
					<h2>
						Promo <?php echo $date.'-'.($date + 1);?>
					</h2>
				</div>
				<?php
				$comparedate=$date;
			}
			?><div type="eleve"><?php
			$photo = htmlspecialchars($row['photo']); 
			$nom = htmlspecialchars($row['nom']); 
			$prenom = htmlspecialchars($row['prenom']); 
			$eid= htmlspecialchars($row['eid']);
			
			?> 
				<!-- photo -->
					<?php
						if(!$photo||!file_exists("../uploaded/".$photo))
							$photo = "Pas-de-photo.jpg";
					?>
					<a href="afficher-profil-eleve.php?eid=<?php echo $eid;?>">
						<img type="eleve" src="/uploaded/<?php echo $photo;?>" alt="photo-demain-le-primtemps">
					</a>
					<br>
				
				
				<!-- nom et prenom -->
					<a href="afficher-profil-eleve.php?eid=<?php echo $eid;?>">
						<?php echo ucwords(strtolower(html_entity_decode($nom)))?><br><? echo html_entity_decode($prenom);?>
					</a>
				</div>
				
			<?php
		}
		?></div><?php
	}
	
mysql_close($conn);

?>
</div>
		<!--Fin div conteneur-->
		</div> 
	<!--Fin section conteneur-superieur-->
	</section>

	<?php
		include(dirname(__FILE__)."/footer.php");
	?>
</body>
</html>