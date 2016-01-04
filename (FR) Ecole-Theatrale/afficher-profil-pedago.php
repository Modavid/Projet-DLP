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
		<link rel="icon" type="image/png" href="/images-design/mafavicon-1.ico" />

		<link rel="image_src" href="<?php echo $photo; ?>">
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
<?php
	include('auth.php');
	include('db_config.php');

	mysql_set_charset('UTF8'); 
	$conn = mysql_connect($DB_host, $DB_login, $DB_pass);
	$db = mysql_select_db($DB_select, $conn);
	if (!$conn) { die('Erreur de connexion: ' . mysql_error()); }
	if(isset($_GET['cid']))
	{
		$cid=$_GET['cid'];
		
		$SQL="SELECT * FROM membre WHERE cid='$cid'";
		$result=mysql_query($SQL);
                $SQLa="SELECT * FROM profil WHERE cid='$cid'";
		$resulta=mysql_query($SQLa);
                
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
                        $rowa=mysql_fetch_array($resulta);
                        
			$row=mysql_fetch_array($result);
			$type=htmlspecialchars($row['type']);
			$nom=htmlspecialchars($row['nom']);
			$prenom=htmlspecialchars($row['prenom']);
			$photo=htmlspecialchars($row['photo']);
			$details=htmlspecialchars($rowa['descriptif']);
			$titre=htmlspecialchars($row["fonction"]);
			
			?>
			<table>
				<?php
					if(!$photo||!file_exists("uploaded/" . $photo))
						$photo = "Pas-de-photo.jpg";
				?>
				<tr>
					<td style="padding-left: 50px;padding-top: 50px">
						<img type="photo" src="uploaded/<?php echo $photo ;?>" alt="photo-demain-le-primtemps">
					</td>
					<!-- nom  prenom-->
					<td style="padding-left: 50px;padding-top: 50px;padding-right: 50px">
						<h1>
						<?php
							echo ucwords(strtolower(html_entity_decode($nom))).' '.html_entity_decode($prenom);
						?>
						</h1>
						<?php
							if($type!='')
							{
								?><h2><?php
								echo html_entity_decode(ucwords($type));
								if($titre != "")
									echo " : ", strtolower($titre);
								?></h2><?php
							}
							if($details!='')
							{
								?><p><?php
								echo html_entity_decode($details);
								?><br></p><?php
							}
						?>
						<p>
					</td>
				</tr>
			</table>
			<?php
				$SQL="SELECT * FROM profil WHERE cid='$cid'";
				$result=mysql_query($SQL);
				$row=mysql_num_rows($result);
				$tab=mysql_fetch_array($result);
				$pid=htmlspecialchars($tab['pid']);
				if($row!=0&&$pid>0)
				{
					?><br><table align="center"><?php
					$descriptif=htmlspecialchars($tab['descriptif']);
					$photo1=htmlspecialchars($tab['photo1']);
					$photo2=htmlspecialchars($tab['photo2']);
					$commentphoto1=htmlspecialchars($tab['commentphoto1']);
					$commentphoto2=htmlspecialchars($tab['commentphoto2']);
					$video1=htmlspecialchars($tab['video1']);
					$video2=htmlspecialchars($tab['video2']);
					$commentairev1=htmlspecialchars($tab['commentaire']);
					$commentairev2=htmlspecialchars($tab['comment2']);
					$site=htmlspecialchars($tab['site']);
					
					
							
							if($video1!=''||$video2!='')
							{
								?><div id="video-galerie"><ul><?php
								if($video1!='')
								{
									$video1=preg_replace("@(watch\?v=)@", "embed/", preg_replace("@(https://)@", "//", $video1));
									?>
										<div class="case-video">
											<a class="fancybox fancybox.iframe" href="<?php echo $video1;?>"">
												<span class="roll-video"><p>Video1</p></span>
												<img class="play" src="images-design/play.png" alt="play" /><img src="images-design/theatre-rideau.jpg" width="200px" height="130px" alt="video" />
											</a>
										</div>
									<?php
								}
								if($video2!='')
								{
									$video2=preg_replace("@(watch\?v=)@", "embed/", preg_replace("@(https://)@", "//", $video2));
									?>
										<div class="case-video">
											<a class="fancybox fancybox.iframe" href="<?php echo $video2;?>"">
												<span class="roll-video"><p>Video2</p></span>
												<img class="play" src="images-design/play.png" alt="play" /><img src="images-design/theatre-rideau.jpg" width="200px" height="130px" alt="video" />
											</a>
										</div>
									
									<?php
								}
								?></ul></div><br><br><?php
							}
							if($commentairev1!='')
								{
								?><tr><td><p><br><?php
								echo 'Commentaire sur la premiere video : '.$commentairev1;
								?><br></p></td></tr><?php
								}
								
								if($commentairev2!='')
								{
								?><tr><td><p><br><?php
								echo 'Commentaire sur la deuxieme video : '.$commentairev2;
								?><br></p></td></tr><?php
								}
								
							if(!$photo1!=''||$photo2!='')
							{
								?><tr><?php
								if($photo1!='')
								{
									?>
									<td>
										<img type="big" src="/uploaded/<?php echo $photo1 ;?>" alt="photo1">
									</td>
									<?php
								}
								if($photo2!='')
								{
									?>
									<td style="padding-left: 15px">
										<img type="big" src="/uploaded/<?php echo $photo2 ;?>" alt="photo2">
									</td>
									<?php
								}
								?></tr><?php
							}
								if($commentphoto1!='')
							{
								?><tr><td><p><br><?php
								echo 'Commentaire sur la premiere photo : '.$commentphoto1;
								?></p></td></tr><?php
							}
								if($commentphoto2!='')
							{
								?><tr><td><p><br><?php
								echo 'Commentaire sur la deuxieme photo : '.$commentphoto2;
								?></p></td></tr><?php
							}
							if($site!='')
							{
								?><tr><td><p><br><?php
								echo 'SITE : ';
								?><a href="<?php echo $site;?>" onclick="window.open(this.href);return false"><?php echo $site;?>
								</a></p></td></tr><?php
							}
					?></table><?php
				}
					?>
					<br>
				<?php
				if ($_SESSION['AUTH']==1)//ADMIN
				{
					?>
					<div class="bloc-admin">
					<h2 style="padding-left: 10px">
						Gestion profil
					</h2>
					<?php
					if ($_SESSION['AUTH']==1)//ADMIN
					{
						?>
						<a href="suppression-pedago?cid=<?php echo $cid;?>" onclick="return confirm('Voulez-vous vraiment suprimer cette personne ?');">
							<b type="profil">Supprimer pedago de la BDD</b>
						</a>
						
						<br>
						</br>
						<a href="ajouter_collectif?cid=<?php echo $cid;?>">
							<b type="profil">Ajouter a la liste des collectifs</b></a>
							<br>
						
						<?php
					
						
						
							if($row!=0&&$pid>0)
							{
								?>
									<br>
									<a href="form-profil-pedago?cid=<?php echo $cid;?>&test=<?php echo $photo;?>">
										<b type="profil">Modifier le profil pedago</b>
									</a>
									<br>
								<?php
								if($_SESSION['USERID'] == 100)
								{
									$SQL="SELECT * FROM utilisateurs WHERE cid='$cid'";
									$result=mysql_query($SQL);
									$tab=mysql_fetch_array($result);
									$admin=htmlspecialchars($tab['type']);
									?>
									<br>
									<a href="modifier-droits-admin?cid=<?php echo $cid;?>&admin=<?php echo $admin;?>">
										<?php
											if ($admin == '')
											{
												?><b type="profil">Ajouter les droits administratifs</b><?php
											}
											else if($admin == 'admin')
											{
												?><b type="profil">Supprimer les droits administratifs</b><?php
											}
										?>
									</a>
									<br><br>
									<?php
								}
							}
					
							$SQLt="SELECT * FROM collectif WHERE nom='$nom' and prenom='$prenom' and photo='$photo'";
						$resultt=mysql_query($SQLt);
						if(mysql_num_rows($resultt)==0)
						{ ?> <br>
							<a href="ajouter_collectif?cid=<?php echo $cid;?>">
							<b type="profil">Ajouter a la liste des collectifs</b></a>
							<br>
							<?php
						}else{ ?> 
						
						<a href="Supprim_collectif?cid=<?php echo $cid;?>">
							<b type="profil">supprimer de la liste des collectifs</b></a>
							<br>
						
						<?php
						}
						
					}
					?></div><?php
				}
			?>	
			</p>
			<?php
		}
	}
mysql_close($conn);
?>
<div class="fb-like" data-href="http://www.ecole-theatrale.fr/afficher-profil-pedago?cid=<?php echo $cid ?>" onclick="alert('chargement de la page');" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>
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
