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
		<link rel="icon" type="image/png" href="/images-design/mafavicon-1.ico" />
	</head>
	
<body>

	
	<section class="conteneur-superieur">
		<div class="conteneur" style="padding-bottom: 30px">
<?php
	include('db_config.php');

	mysql_set_charset('UTF8'); 
	$conn = mysql_connect($DB_host, $DB_login, $DB_pass);
	$db = mysql_select_db($DB_select, $conn);
	if (!$conn) { die('Erreur de connexion: ' . mysql_error()); }
	if(isset($_GET['cid']))
	{
		$cid=$_GET['cid'];
		
		$SQL="SELECT * FROM collectif WHERE cid='$cid'";
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
			$row=mysql_fetch_array($result);
			$type=htmlspecialchars($row['type']);
			$nom=htmlspecialchars($row['nom']);
			$prenom=htmlspecialchars($row['prenom']);
			$photo=htmlspecialchars($row['photo']);
			$details=htmlspecialchars($row['details']);
			$SQL1="SELECT * FROM membre WHERE nom='$nom' && prenom='$prenom'"; //WHERE type='actuel'
			$result1=mysql_query($SQL1);
			$row1=mysql_fetch_array($result1);
			if($row1)
				$titre=htmlspecialchars($row1["titre"]);
			else
				$titre="";
			
			?>
			<table style="max-width: 500px;margin: auto;">
				<?php
					if(!$photo||!file_exists("../uploaded/" . $photo))
						$photo = "Pas-de-photo.jpg";
				?>
				<tr>
					<td align="center" style="padding-top: 20px">
						<img type="photo" src="/uploaded/<?php echo $photo ;?>" alt="photo-demain-le-primtemps">
					</td>
				</tr>
				<tr>
					<!-- nom  prenom-->
					<td style="margin: auto;padding-right: 10px;padding-left: 10px;">
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
				$uid=htmlspecialchars($tab['uid']);
				if($row!=0&&$uid>0)
				{
					?><br><table align="center"><?php
					$photo1=htmlspecialchars($tab['photo1']);
					$photo2=htmlspecialchars($tab['photo2']);
					$descriptif=htmlspecialchars($tab['descriptif']);
					$video1=htmlspecialchars($tab['video1']);
					$video2=htmlspecialchars($tab['video2']);
					$commentaire=htmlspecialchars($tab['comentaire']);
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
												<img class="play" src="/images-design/play.png" alt="play" /><img src="/images-design/theatre-rideau.jpg" width="200px" height="130px" alt="video" />
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
												<img class="play" src="/images-design/play.png" alt="play" /><img src="/images-design/theatre-rideau.jpg" width="200px" height="130px" alt="video" />
											</a>
										</div>
									
									<?php
								}
								?></ul></div><br><br><?php
							}
							if($commentaire!='')
							{
								?><tr><td><p><br><?php
								echo 'DESCRIPTIF VIDEO : '.$commentaire;
								?><br></p></td></tr><?php
							}
							if($photo1!='')
							{
								?>
								<tr type="photo">
									<td>
										<img type="big" src="/uploaded/<?php echo $photo1 ;?>" alt="photo1">
									</td>
								</tr>
								<?php
							}
							if($photo2!='')
							{
								?>
								<tr type="photo">
									<td>
										<img type="big" src="/uploaded/<?php echo $photo2 ;?>" alt="photo2">
									</td>
								</tr>
								<?php
							}
							if($descriptif!='')
							{
								?><tr><td><p><br><?php
								echo 'DESCRIPTIF PHOTOS : '.$descriptif;
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
						<a href="suppression-pedago?cid=<?php echo $cid;?>">
							<b type="profil">Supprimer pedago de la BDD</b>
						</a>
						<br>
						<?php
							if($row!=0&&$uid>0)
							{
								?>
									<br>
									<a href="form-profil-pedago?cid=<?php echo $cid;?>">
										<b type="profil">Modifier le profil pedago</b>
									</a>
									<br>
								<?php
							}
						?>
						<br><?php
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
<!--Fin div conteneur-->
		</div>
	<!--Fin section conteneur-superieur-->
	</section>

	<?php
		include(dirname(__FILE__)."/footer.php");
	?>
</body>
</html>
