<!DOCTYPE html >
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
		<!--[if lt IE 9]>
		    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="style/style-l-ecole-theatrale-russe.css" rel="stylesheet" media="all" type="text/css">
		<link href="style/style-actualite.css" rel="stylesheet" media="all" type="text/css">
		<link href="style/style-témoignage.css" rel="stylesheet" media="all" type="text/css">
		<link href="style/style-nos-eleves.css" rel="stylesheet" media="all" type="text/css">
		<link rel="icon" type="image/png" href="/images-design/mafavicon-1.ico" />
	</head>
	
<body>
	<?php
		include(dirname(__FILE__)."/header.php");
	?>
	<section class="conteneur-superieur">
		<div class="conteneur">
		
		<h1>Toute l'actualité</h1>
		
		<?php
		require 'fonction-page.php';
		
		include('db_config.php');
		
			mysql_set_charset ('UTF8');
			$conn = mysql_connect($DB_host, $DB_login, $DB_pass);
			$db = mysql_select_db($DB_select, $conn);
			if (!$conn) { die('Erreur de connexion: ' . mysql_error()); }
			
			$nombre=5;
			if(!isset($limite)) $limite=0;
			$path_parts = pathinfo($_SERVER['PHP_SELF']);
		
			$page = $path_parts["basename"];
			
			$SQL1="SELECT count(aid) FROM actualite";
			$result1=mysql_query($SQL1);
			$row1=mysql_fetch_array($result1);
			$total=$row1[0];
		
			
			$verifLimite= verifLimite($limite,$total,$nombre);
		
			// si la limite passée n'est pas valide on la remet à zéro
		
			if(!$verifLimite)  {
		
				$limite = 0;
		
			}
			
			$SQL="SELECT * FROM actualite ORDER BY aid DESC limit $limite,$nombre";
			$result=mysql_query($SQL);
			if(!$result||mysql_num_rows($result)==0)
			{
				echo "no result";
			}
			else
			{
				
				while($row=mysql_fetch_array($result))
				{
					$photo=htmlspecialchars($row['photo']);
					$titre=htmlspecialchars($row['titre']);
					$texte=htmlspecialchars($row['texte']);
					$lien=htmlspecialchars($row['lien']);
					$aid=htmlspecialchars($row['aid']);
					// 5 actu par pages.
					?>
					
					<div id="conteneur-actu-complet2">
						<!-- photo -->
						<aside id="image-profil-complet">
							<div id="conteneur-profil-complet">
								<a href=" <?php echo $lien ;?>" onclick="window.open(this.href);return false">
									<img type="photo" src="uploaded/<?php echo $photo ;?>" alt="photo-demain-le-primtemps">
								</a>
							</div>
						</aside>
						
						<!-- titre -->
						<article id="titre-actu-complet2">
							<p>
							<?php
								echo nl2br($titre);
							?>
							</p>
						</article>
						
						<!-- texte -->
						<article id="text-commentaire-complet"> 
							<p>
							<?php
								echo nl2br($texte);
							?>
							</p>
							<?php
							if ($_SESSION['AUTH']==1)
							{
								?>
								<br>
								<a type="temoignage" href="form-modifier-actu.php?aid=<?php echo"$aid";?>">
									<?php echo"- Modifier l'actualité";?>
								</a>
								<br>
								<a type="temoignage" href="suppression-actu.php?aid=<?php echo"$aid" ?> onclick="return confirm('Voulez-vous vraiment suprimer cette Actualité ?');">
									<?php echo"- Supprimer l'actualité";?>
								</a>
								<?php
							}
							?>
						</article>
					</div>
					
					<?php
				}
				
				
				if($total > $nombre) 
				{
		
					// affichage des liens vers les pages
		
					affichePages($nombre,$page,$total);
		
					// affichage des boutons
		
					displayNextPreviousButtons($limite,$total,$nombre,$page);
		
				}
				
			}
			
			
		?>
		

		<!--Fin div conteneur-->
		</div> 
		
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