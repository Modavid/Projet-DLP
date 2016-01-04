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
	</head>
	
<body>
	<?php
		require 'fonction-page.php';
		
	include(dirname(__FILE__)."/header.php");
		
		include("auth.php");
		if(!isset($_SESSION['AUTH']))
		{
		}
		else if($_SESSION['AUTH']==3)
		{
			$userid=$_SESSION['USERID'];
		}
		include("db_config.php");
			$conn = mysql_connect($DB_host, $DB_login, $DB_pass);
			$db = mysql_select_db($DB_select, $conn);
			if (!$conn) { die('Erreur de connexion: ' . mysql_error()); }
			mysql_set_charset ('UTF8');
			$nombre=5; // On affiche 5 fiches se cultiver par page.
		if(!isset($limite)) $limite=0;
		$path_parts = pathinfo($_SERVER['PHP_SELF']);
		$page = $path_parts["basename"];
		
		$SQL1="SELECT count(cuid) FROM culture";
		$result1=mysql_query($SQL1);
		$row1=mysql_fetch_array($result1);
		$total=$row1[0];
		
			$verifLimite= verifLimite($limite,$total,$nombre);

		// si la limite passée n'est pas valide on la remet à zéro

		if(!$verifLimite)  
		{
			$limite = 0;
		}
		
	?>
	<section class="conteneur-superieur">
		<div class="conteneur">
			<h1>Temoignages</h1>

			<?php
				$SQL="SELECT * FROM temoignages WHERE valider='1' limit $limite,$nombre";
				$result=mysql_query($SQL);	
				?>
				
				<?php
				while ($row = mysql_fetch_array ($result))
				{
					$eid=htmlspecialchars($row['eid']);
					$type = htmlspecialchars($row['type']);
					$titre=htmlspecialchars($row['titre']);
					$com = htmlspecialchars($row['com']);
					$tid = htmlspecialchars($row['tid']);
					?><table>
					
					<div id="conteneur-temoignage">
						<?php
						if($type==1)
						{
							$SQL1="SELECT * FROM etudiants WHERE eid='$eid'";
							$result1=mysql_query($SQL1);	
							$row1=mysql_fetch_array($result1);
							
							$url=htmlspecialchars($row1['photofacebook']);
							
							?>
								<!-- Image si on est connecté avec facebook -->
								<aside id="image-profil-complet">
									<div id="conteneur-image-profil">
										<img type="photo" src="<?php echo $url;?>" alt="photo-facebook"/>
									</div>
								</aside>
								
							<?php
						}
						else
						{
							$SQL2="SELECT * FROM profil WHERE eid='$eid'";
							$result2=mysql_query($SQL2);
							$row2=mysql_fetch_array($result2);
							
							$nomphoto=htmlspecialchars($row2['photo']);
							?>
								<!-- Image si on est connecté en tant qu'utilisateur du site -->
								<aside id="image-profil-complet">
									<div id="conteneur-image-profil">
										<img type="eleve" src="uploaded/<?php echo $nomphoto ;?>" alt="photo-demain-le-primtemps">
									</div>
								</aside>
							<?php
						}
						?>
						<article id="titre-temoignage">
						<!-- titre -->
						<p>
							<?php
								echo utf8_decode($titre);
							?>
						</p>
						</article>
						<br>
						<!-- Commentaire -->
						<article id="text-temoignage"> 
						<p>
							<?php
								echo  nl2br(utf8_decode($com));
								if ($_SESSION['AUTH']==1 || $eid == $userid)
								{
									?>
										<br><br>
										<a type="temoignage" href="form-modifier-temoignage.php?tid=<?php echo $tid;?>">
											<?php echo " - Modifier le témoignage";?>
										</a>
									<?php
								}
								if ($_SESSION['AUTH']==1)//ADMIN
								{
									?>
										<br>
										<a type="temoignage" href="suppression-temoignage.php?tid=<?php echo $tid;?>" onclick="return confirm('Voulez-vous vraiment suprimer ?');">
											<?php echo " - Supprimer le témoignage";?>
										</a>
									<?php
								}
							?>
						</p>
						</article>
						<h2>
						<a href="afficher-profil-eleve.php?eid=<?php echo $eid;?>">Voir profil</a>
					</h2>
					</div>
					</table>
					<?php
				}
					if($total > $nombre) 
				{

					// affichage des liens vers les pages
					affichePages($nombre,$page,$total);

//					 affichage des boutons (bouton ne marche pas)
//					displayNextPreviousButtons($limite,$total,$nombre,$page);

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






