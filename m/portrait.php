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
	</head>
	
<body>

	<section class="conteneur-superieur">
		<div class="conteneur">
		
			<h1 style="margin-top: 0px; padding-top: 20px;">Portraits</h1>
			
			
			<?php
			
			include('db_config.php');
			
				$conn = mysql_connect($DB_host, $DB_login, $DB_pass);
				$db = mysql_select_db($DB_select, $conn);
				if (!$conn) { die('Erreur de connexion: ' . mysql_error()); }
				mysql_set_charset('UTF8'); 
				$SQL="SELECT * FROM portrait ORDER BY poid DESC";
				$result=mysql_query($SQL);
				
				if(!$result||mysql_num_rows($result)==0)
				{
					?>
						<p>
							Aucun portrait - 
							<a href="index.php">Retour à l'accueil</a>
						</p>
					<?php
				}
				else if(mysql_num_rows($result)==1)
				{
					$row=mysql_fetch_array($result);
					$titre=htmlspecialchars($row['titre']);
					$nom=htmlspecialchars($row['nom']);
					$prenom=htmlspecialchars($row['prenom']);
					$photo=htmlspecialchars($row['photo']);
					$poid=htmlspecialchars($row['poid']);
					
					?>
					<div class="mini-fiche-eleve">
						<!-- Photo -->
						
						<aside class="conteneur-image">
							<img src="uploaded/<?php echo $photo ;?>" alt="photo-demain-le-primtemps" width="150px" height="180px">
							
						</aside>
						
						<!-- Titre --> 
						<!--c'est un titre de l'article sur un étudiant célèbre-->
						<p>
							<a href="afficher-portrait.php?poid=<?php echo $poid;?>"><?php echo nl2br($titre);?></a>
						</p>
						
						<!-- Nom et Prenom -->
						<span class="nom-prenom">
							<a href="afficher-portrait.php?poid=<?php echo $poid;?>"><?php echo nl2br($nom,$prenom);?></a>
						</span>
						
					</div>
					<?php
					
				}
				else
				{
					?><div class="table-center"><?php
					while($row=mysql_fetch_array($result))
					{
						$titre=htmlspecialchars($row['titre']);
						$nom=htmlspecialchars($row['nom']);
						$prenom=htmlspecialchars($row['prenom']);
						$photo=htmlspecialchars($row['photo']);
						$poid=htmlspecialchars($row['poid']);
						$article=htmlspecialchars($row['article']);
						$eid=htmlspecialchars($row['eid']);
						
						?>
							<div type="eleve">
							<a href="afficher-profil-eleve.php?eid=<?php echo $eid;?>">Profil etudiant</a><br><br>
								<?php
									if(!$photo||!file_exists("../uploaded/" . $photo))
										$photo = "Pas-de-photo.jpg";
								?>
							
							<a href="<?php echo $article;?>" onclick="window.open(this.href);return false">
								<img type="eleve" src="/uploaded/<?php echo $photo ;?>" alt="photo-demain-le-primtemps">
							</a>
							<br>
							
							<!-- Nom et Prenom -->
								<a href="<?php echo $article;?>" onclick="window.open(this.href);return false">
									<?php echo html_entity_decode($prenom)?><br><?php echo html_entity_decode($nom);?>
								</a>
							</div>
						<?php
					}
				?></div><?php
				}
		mysql_close($conn);
		?>
		<!--Fin div conteneur-->
		</div> 
	<!--Fin section conteneur-superieur-->
	</section>

	<?php
		include(dirname(__FILE__)."/footer.php");
	?>
</body>
</html>











