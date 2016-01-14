<! DOCTYPE html >
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
		<!--[if lt IE 9]>
		    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="style/style-video.css" rel="stylesheet" media="all" type="text/css">
		<link href="style/style-l-ecole-theatrale-russe.css" rel="stylesheet" media="all" type="text/css">
		<link href="style/style-affiche-fiche.css" rel="stylesheet" media="all" type="text/css">
		<link href="style/style-nos-eleves.css" rel="stylesheet" media="all" type="text/css">
		
		<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
		
		<link rel="stylesheet" href="lib/fancy-box/source/jquery.fancybox.css" type="text/css" media="screen" />
		<script src="/lib/fancy-box/source/jquery.fancybox.pack.js" type="text/javascript">
		</script>
		<link rel="stylesheet" href="lib/fancy-box/source/rollover-effect.css" type="text/css" media="screen"/> 
		<link rel="icon" type="image/png" href="/images-design/mafavicon-1.ico" />
		<link rel="image_src" href="<?php echo $photo; ?>">

		<title>afficher profil eleve</title>
		<meta property="og:title" content="formation"/>
		<meta property="og:type" content="blog"/>
		<meta property="og:url" content="http://www.ecole-theatrale.fr/afficher-profil-eleve.php?eid=<?php echo $_GET['eid']; ?>"/>
		<meta property="og:image" content="http://www.ecole-theatrale.fr/uploaded/<?php echo $_GET['photo'] ; ?>"/>
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
		<div class="conteneur" style="overflow:auto">

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

		$SQL1="SELECT * FROM cursus WHERE eid='$eid' ORDER BY annee";
		$result1=mysql_query($SQL1);
	
		
		if(!$result||mysql_num_rows($result)==0||!$result1||mysql_num_rows($result1)==0)
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
			$email=htmlspecialchars($row['email']);
			$eid=htmlspecialchars($row['eid']);


			?><table>
				<?php
					if(!$photo||!file_exists("uploaded/" . $photo))
						$photo = "Pas-de-photo.jpg";
				?>
				<!-- photo-->
				<tr>
					<td style="padding-left: 50px;padding-top: 50px">
						<img type="photo" src="uploaded/<?php echo $photo ;?>" alt="photo-demain-le-primtemps">
					</td>
					<!-- nom  prenom-->
					<td style="padding-left: 50px;padding-top: 50px" width="300px">
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
							}*/	$i=1;
							while($row1=mysql_fetch_array($result1))
							{
							
								$type=htmlspecialchars($row1['type']);
								$annee=htmlspecialchars($row1['annee']);
								$mois=htmlspecialchars($row1['mois']);
								$lieu=htmlspecialchars($row1['lieu']);
								?>
								<font size="4"> <?php
								echo $type.' a '.$lieu.' en '.$mois.'-'.$annee;
								?> </font><br><?php
								$i=$i+1;
							}
							
							if($mois!=''&&$annee!='')
							{
								?><br>
								<form method="post" action="rechercher-etudiant-par-date.php">
									<input type="hidden" name="date" value="<?php echo $annee;?>">
									<input type="hidden" name="cursus" value="<?php echo $type;?>">
									<input type="submit" value="Voir le reste de la promotion">
								</form>
								<?php
							}
						?>
					</td>
				</tr>
				</table>


				<?php
				if($_SESSION['USERID']==$eid ) { ?>
					<div class="bloc-admin">
						<h2 style="padding-left: 10px">
							<font size="5">
							Gestion profil </font>
						</h2>

									<a href="form-profil-etudiant?eid=<?php echo $eid;?>&test=<?php echo $photo;?>">
										<b type="profil">Modifier mon profil</b>
									</a>
									<br>
									<br>

									<a href="form-modifier-album?eid=<?php echo $eid;?>&test=<?php echo $photo;?>">
										<b type="profil">Modifier mon album de profil</b>
									</a>
									<br>
									<br>
									
									<a href="form-ajouter-temoignage?eid=<?php echo $eid;?>&test=<?php echo $photo;?>">
										<b type="profil">Ajouter un t&eacute;moignage</b>
									</a>
									<br>
									<br>
									
									<a href="form-modifier-cursus?eid=<?php echo $eid;?>&test=<?php echo $photo;?>">
										<b type="profil">Modifier mon cursus</b>
									</a>
									<br>
									<br>
					</div>
				<?php } ?>


				<?php
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
							if(!$photo||!file_exists("uploaded/" . $photo))
								$photo = "Pas-de-photo.jpg";
						?>
						<tr>
							<td style="padding-left: 50px;padding-top: 50px">
								<img type="eleve" src="uploaded/<?php echo $photo ;?>" alt="photo-demain-le-primtemps">
							</td>
							<!-- nom  prenom-->
							<td style="padding-left: 50px;padding-top: 50px" width="300px">
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
				$SQL="SELECT * FROM profil WHERE eid= '$eid' ";
				$result=mysql_query($SQL);
				$row=mysql_num_rows($result);
				$tab=mysql_fetch_array($result);
				$uid=htmlspecialchars($tab['uid']);
				if($row!=0&&$uid>0)
				{
					?><br><?php
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
					?>
					<table align="center"> <tr>
						<?php 
						if($descriptif!='')
							{
								?><tr><td align="center"><p><br><?php
								echo 'Presentation : '.$descriptif;
								?></p></td></tr><?php
							}
						if($video1!=''||$video2!='')
							{
							?></tr><tr><?php
								if($video1!='')
								{
									$video1=preg_replace("@(watch\?v=)@", "embed/", preg_replace("@(https://)@", "//", $video1));
									?> <td align="center">
										<div class="case-video">
											<a class="fancybox fancybox.iframe" href="<?php echo $video1;?>"">
												<span class="roll-video"><p>Video1</p></span>
												<img src="images-design/play-video.gif" width="260px" height="140px" alt="video" />
											</a>
										</div></td>
									<?php
								}
							
								if($video2!='')
								{
									$video2=preg_replace("@(watch\?v=)@", "embed/", preg_replace("@(https://)@", "//", $video2));
									?><td align="center">
										<div class="case-video">
											<a class="fancybox fancybox.iframe" href="<?php echo $video2;?>"">
												<span class="roll-video"><p>Video2</p></span>
												<img src="images-design/play-video.gif" width="260px" height="140px" alt="video" />
											</a>
										</div></td>
									
									<?php
								}
								?></tr><?php
							
							}
							
								if($commentairev1!='')
								{
								?><tr><td align="center"><p style="margin-left:65px"><?php
								echo $commentairev1;
								?><br></p><br><br></td><?php
								}
								
								if($commentairev2!='')
								{
								?><td align="center"><p style="margin-left:65px"><?php
								echo $commentairev2;
								?><br></p><br><br></td></tr>
								
								<?php
								}
							//
				if($photo1!=''||$photo2!='')
							{
								?><tr><?php
								if($photo1!='')
								{
									?>
									
									<td align="center">
										<img src="/uploaded/<?php echo $photo1 ;?>" alt="photo1" style="min-width:100px;max-width:200px">
									</td>
									<?php
								}
								if($photo2!='')
								{
									?>
									<td align="center" style="padding-left: 15px">
										<img  src="/uploaded/<?php echo $photo2 ;?>" alt="photo2" style="min-width:100px;max-width:200px">
									</td>
									<?php
								}
								?></tr><?php
							}
							if($commentphoto1!='')
							{
								?><tr><td align="center"><p style="margin-left:70px"><?php
								echo $commentphoto1;
								?></p></td><?php
							}
								if($commentphoto2!='')
							{
								?><td align="center"><p style="margin-left:70px"><?php
								echo $commentphoto2;
								?></p></td></tr><?php
							}
							if($site!='')
							{
								?><tr><td align="center"><p style="margin-left:70px"><br><?php
								echo 'SITE :';
								?><a style="margin-left:5px" href="http://<?php echo $site;?>" onclick="window.open(this.href);return false"><?php echo $site;?>
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
						
							<a href="suppression-etudiant?eid=<?php echo $eid;?>" onclick="return confirm('Voulez-vous vraiment suprimer cette personne ?');">
							<b type="profil">Supprimer etudiant(e) de la BDD</b>
							</a>
							<br>
							
									<br>
									<a href="form-profil-etudiant?eid=<?php echo $eid;?>&test=<?php echo $photo;?>">
										<b type="profil">Modifier le profil de cet(te) etudiant(e)</b>
									</a>
									<br>
								<?php
						
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
							<br>
						<?php
						}?>
									<a href="form-modifier-album?eid=<?php echo $eid;?>&test=<?php echo $photo;?>">
										<b type="profil">Modifier album du profil</b>
									</a>
									<br>
									<br>
									
									<a href="form-cursus?eid=<?php echo $eid;?>&test=<?php echo $photo;?>">
										<b type="profil">Ajouter cursus a cet(te) etudiant(e)</b>
									</a>
									<br>
									<br>
									
									<a href="form-modifier-cursus?eid=<?php echo $eid;?>&test=<?php echo $photo;?>">
										<b type="profil">Modifier cursus de cet(te) etudiant(e)</b>
									</a>
									<br>
									<br>
							<?php
					
					
							$SQLt="SELECT * FROM collectif WHERE nom='$nom'";
							$resultt=mysql_query($SQLt);
							if(mysql_num_rows($resultt)==0)
							{	
								?>
									<a href="ajout-eleve-collectif?eid=<?php echo $eid;?>">
										<b type="profil">Ajouter cet(te) etudiant(e) aux collectifs</b>
									</a>
									<br>	
								<?php	
							}else
							{ ?>  
								<a href="supp-eleve-collectif?eid=<?php echo $eid;?>">
										<b type="profil">supprimer cet(te) etudiant(e) de la liste collectifs</b>
									</a>
									<br>	
								<?php
							}
							if($_SESSION['USERID'] == 100)
							{	
									$SQL="SELECT * FROM utilisateurs WHERE eid='$eid'";
									$result=mysql_query($SQL);
									$tab=mysql_fetch_array($result);
									$admin=htmlspecialchars($tab['type']);
									?>
									<br>
									<a href="modifier-droits-admin-eleve?eid=<?php echo $eid;?>&admin=<?php echo $admin;?>">
										<?php
											if ($admin == '')
											{
												?><b type="profil">Ajouter les droits administratifs</b><?php
											}
											else if($admin == 'admin')
											{
												?><b type="profil">Supprimer les droits administratifs</b><?php
											}
										
										
							}		?>
									</a>
									
							
					</div>
					
					
				<?php
							
				}
				
				?>	
			</p>
			<?php
		}
		
	}
	mysql_close($conn);
?>
<div class="fb-like" data-href="http://www.ecole-theatrale.fr/afficher-profil-eleve.php?eid=<?php echo $eid; ?>" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>
</div> 
	<!--Fin div conteneur-->
				
	<?php
	include(dirname(__FILE__)."/barre-laterale.php");
	?>
		
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