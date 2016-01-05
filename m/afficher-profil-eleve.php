<! DOCTYPE html >
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
		<link href="style/style-video.css" rel="stylesheet" media="all" type="text/css">
		<link href="style/style-l-ecole-theatrale-russe.css" rel="stylesheet" media="all" type="text/css">
		<link href="style/style-affiche-fiche.css" rel="stylesheet" media="all" type="text/css">
		<link href="style/style-nos-eleves.css" rel="stylesheet" media="all" type="text/css">
		
		<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
		
		<link rel="stylesheet" href="/lib/fancy-box/source/jquery.fancybox.css" type="text/css" media="screen" />
		<script src="/lib/fancy-box/source/jquery.fancybox.pack.js" type="text/javascript">
		</script>
		<link rel="stylesheet" href="/lib/fancy-box/source/rollover-effect.css" type="text/css" media="screen"/> 

	</head>
	
<body>

	
		<section class="conteneur-superieur">
		<div class="conteneur" style="padding-bottom: 30px">

<?php
include('db_config.php');

	$conn = mysql_connect($DB_host, $DB_login, $DB_pass);
	$db = mysql_select_db($DB_select, $conn);
	if (!$conn) { die('Erreur de connexion: ' . mysql_error()); }
	
	if(isset($_GET['eid']) )
	{
		$eid=$_GET['eid'];
		
		$SQL="SELECT * FROM etudiants WHERE eid='$eid'";
		$result=mysql_query($SQL);
		
		if(!$result||mysql_num_rows($result)==0)
		{
			?>
				<script>
					alert('PROBLEME BASE DE DONNEES');
				</script>
			<?php
		}
		else
		{
			$row=mysql_fetch_array($result);
			$nom=htmlspecialchars($row['nom']);
			$prenom=htmlspecialchars($row['prenom']);
			$photo=htmlspecialchars($row['photo']);
			$type=htmlspecialchars($row['type']);
			$email=htmlspecialchars($row['email']);
			$annee=htmlspecialchars($row['date']);
			$mois=htmlspecialchars($row['mois']);
			$eid=htmlspecialchars($row['eid']);
			
			?><table style="margin: auto">
				<?php
					if(!$photo||!file_exists("../uploaded/" . $photo))
						$photo = "Pas-de-photo.jpg";
				?>
				<!-- photo-->
				<tr>
					<td style="padding-left: 20px;padding-top: 20px">
						<img type="photo" src="/uploaded/<?php echo $photo ;?>" alt="photo-demain-le-primtemps">
					</td>
					<!-- nom  prenom-->
					<td style="padding-left: 20px;padding-top: 20px">
						<h1 align="center">
						<?php
							echo ucwords(strtolower(html_entity_decode($nom))).' '.html_entity_decode($prenom);
						?>
						</h1>
						<p>
						<?php
							/*if($email!='')
							{
								echo 'EMAIL : '.$email;
								?><br><?php
							}*/
							if($type!='')
							{
								echo 'CURSUS : ';
								?><br><?php
								echo $type;
								?><br><?php
							}
							if($mois!=''&&$annee!='')
							{
								?><br><?php
								echo 'PROMOTION : ';
								?><br><?php
								echo $annee.'-'.($annee + 1);
								?><br>
								<form method="post" action="rechercher-etudiant-par-date.php">
									<input type="hidden" name="date" value="<?php echo $annee;?>">
									<input type="hidden" name="cursus" value="<?php echo $type;?>">
									<input type="submit" value="Voir promotion">
								</form>
								<?php
							}
						?>
					</td>
				</tr>
				</table><?php
				//portrait
				$SQL="SELECT * FROM portrait WHERE eid='$eid'";
				$result=mysql_query($SQL);
				$row1=mysql_num_rows($result);
				if($row1!=0)
				{
					$row=mysql_fetch_array($result);
					$poid=htmlspecialchars($row['poid']);
					$titre=htmlspecialchars($row['titre']);
					$nom=htmlspecialchars($row['nom']);
					$prenom=htmlspecialchars($row['prenom']);
					$photo=htmlspecialchars($row['photo']);
					$article=htmlspecialchars($row['article'], ENT_QUOTES);
					
					?>
					<table>
						<?php
							if(!$photo||!file_exists("../uploaded/" . $photo))
								$photo = "Pas-de-photo.jpg";
						?>
						<tr>
							<td style="padding-left: 20px;padding-top: 20px">
								<img type="eleve" src="/uploaded/<?php echo $photo ;?>" alt="photo-demain-le-primtemps">
							</td>
							<!-- nom  prenom-->
							<td style="padding-left: 20px;padding-top: 20px">
								<?php
									if($titre!='')
									{
										?><h2><?php
										echo nl2br(html_entity_decode($titre));
										?></h2><?php
									}
									if($article!='')
									{
										?><p><b>
										<a href="<?php echo $article;?>" onclick="window.open(this.href);return false">Voir polamir sur le blog de l'ecole</a>
										<br></p><?php
									}
								?>
							</td>
						</tr>
					</table>
					<?php
				}
				$SQL="SELECT * FROM profil WHERE eid='$eid'";
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
						<a href="suppression-etudiant?eid=<?php echo $eid;?>">
							<b type="profil">Supprimer etudiant(e) de la BDD</b>
						</a>
						<br>
						<?php
							if($row!=0&&$uid>0)
							{
								?>
									<br>
									<a href="form-profil-etudiant?eid=<?php echo $eid;?>">
										<b type="profil">Modifier le profil de cet(te) etudiant(e)</b>
									</a>
									<br>
								<?php
							}
					}
					if($row1==0)//Ne possède pas encore de portrait
					{
						?>
						<br>
							<a href="form-ajouter-portrait?eid=<?php echo $eid;?>&nom=<?php echo $nom;?>&prenom=<?php echo $prenom;?>">
								<b type="profil">Ajouter un portrait a cet(te) etudiant(e)</b>
							</a>
						<br><br>
						<?php
					}
					else
					{
						?>
						<br>
							<a href="suppression-portrait?eid=<?php echo $poid;?>">
								<b type="profil">Supprimer portrait de la BDD</b>
							</a>
						<br><br>
						<?php
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
</div> 
	<!--Fin div conteneur-->
				
	</section>
	<!--Fin section conteneur-superieur-->

	<?php
	include(dirname(__FILE__)."/footer.php");
	?>
		<script type="text/javascript">
		$(document).ready(function() {
			$(".fancybox").fancybox({
				width	:	'70%',
				height 	:	'70%',
			});
	});
			
	</script>
	<script type="text/javascript">
		$(function() {
		<!--OPACITY OF BUTTON SET TO 0%-->
		$(".roll-video").css("opacity","0");
		 
		// ON MOUSE OVER
		$(".roll-video").hover(function () {
		 
		// SET OPACITY TO 70%
		$(this).stop().animate({
		opacity: .7
		}, "slow");
		},
		 
		// ON MOUSE OUT
		function () {
		 
		// SET OPACITY BACK TO 50%
		$(this).stop().animate({
		opacity: 0
		}, "slow");
		});
		});
	</script>
</body>
</html>