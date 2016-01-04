
<!DOCTYPE html >
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
		<!--[if lt IE 9]>
		    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="style/style-l-ecole-theatrale-russe.css" rel="stylesheet" media="all" type="text/css">
		<link href="style/style-affiche-fiche.css" rel="stylesheet" media="all" type="text/css">
		<link href="style/style-nos-eleves.css" rel="stylesheet" media="all" type="text/css">
	</head>
	
<body>
	<?php
		include(dirname(__FILE__)."/header.php");
	?>
	
	<section class="conteneur-superieur">
		<div class="conteneur">
		
			<h1>Se cultiver</h1>
			<div class="conteneur-fiches">
				<?php
				require 'fonction-page.php';
				include("auth.php");
				include("db_config.php");
				mysql_set_charset('UTF8');
					$conn = mysql_connect($DB_host, $DB_login, $DB_pass);
					$db = mysql_select_db($DB_select, $conn);
					if (!$conn) { die('Erreur de connexion: ' . mysql_error()); }
					if(!isset($_SESSION['AUTH']))
					{
					}
					else if($_SESSION['AUTH']==2)
					{
						$cid=$_SESSION['USERID'];
						$SQL2="SELECT * FROM collectif WHERE cid='$cid'";
						$result2=mysql_query($SQL2);
						if(!$result2||mysql_num_rows($result2)==0)
						{	
							?>
								<script>
									alert('PROBLEME BASE DE DONNEES.');
								</script>
								<a href="index.php">Retour a l'index</a>
							<?php
						}
						else
						{
							$row2=mysql_fetch_array($result2);
							$dcult=htmlspecialchars($row2['dcult']);
							if($dcult==1) // Ajout d'une fiche culture si on a le droit.
							{
							?>
								<a href="form-fiches-cultures.php">Ajouter fiches cultures</a>
							<?php
							}
						}
					}
					
					$nombre=5; // On affiche 5 fiches se cultiver par page.
					if(!isset($limite)) $limite=0;
					$path_parts = pathinfo($_SERVER['PHP_SELF']);
					$page = $path_parts["basename"];
					
					$SQL1="SELECT count(cuid) FROM cultiver";
					$result1=mysql_query($SQL1);
					$row1=mysql_fetch_array($result1);
					$total=$row1[0];
					
					$verifLimite= verifLimite($limite,$total,$nombre);
				
					// si la limite passée n'est pas valide on la remet à zéro
				
					if(!$verifLimite)  
					{
						$limite = 0;
					}
					
					$SQL="SELECT * FROM cultiver limit $limite,$nombre";
					$result = mysql_query($SQL);
					if(!$result||mysql_num_rows($result)==0)
					{
						
					}
					else
					{
							$i = 0;
							?><table align="center"><?php
							while($row=mysql_fetch_array($result))
							{
								if ($i == 0)
								{
									?><tr type="eleve"><?php
								}
								$photo=htmlspecialchars($row['photo']);
								$titre=htmlspecialchars($row['titre']);
								$cuid=htmlspecialchars($row['cuid']);
						
								?>
									<td type="eleve">
										<?php
											if(!$photo||!file_exists("uploaded/" . $photo))
												$photo = "Pas-de-photo.jpg";
										?>
									
										<a href="afficher-fiche-culture.php?cuid=<?php echo $cuid;?>">
											<img type="eleve" src="uploaded/<?php echo $photo ;?>" alt="photo-demain-le-primtemps">
										</a>
										<br>
									
										<!-- Nom et Prenom -->
										<a href="afficher-fiche-culture.php?cuid=<?php echo $cuid;?>">
											<?php echo html_entity_decode($titre)?>
										</a>
									</td>
							
									</div>
										<?php
											$i = $i + 1;
											if ($i == 4) // $i == nombre de photos par ligne
											{
												?></tr><tr><td><br></td></tr><?php
												$i = 0;
											}
								}
								
								if($total > $nombre) 
								{
				
									// affichage des liens vers les pages
									affichePages($nombre,$page,$total);
				
									// affichage des boutons
									displayNextPreviousButtons($limite,$total,$nombre,$page);
				
								}
						?></table><?php
					}
					
				mysql_close($conn);
				
				?>
				<!--</div>-->
		</div>
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









