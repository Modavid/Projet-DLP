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
		<div class="conteneur" style="padding-bottom: 30px">

<?php
include('db_config.php');

	$conn = mysql_connect($DB_host, $DB_login, $DB_pass);
	$db = mysql_select_db($DB_select, $conn);
	if (!$conn) { die('Erreur de connexion: ' . mysql_error()); }
	
	if(isset($_GET['uid']) )
	{
		$uid=$_GET['uid'];
		
		$SQL="SELECT * FROM utilisateurs WHERE uid='$uid'";
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
			$email=htmlspecialchars($row['email']);
                        $type=htmlspecialchars($row['type']);
			
			
			?><table>
				<?php
					if(!$photo||!file_exists("uploaded/" .$type."s/".$photo))
						$photo = "Pas-de-photo.jpg";
                                        
				?>
				<!-- photo-->
				<tr>
                                    
                                       
					<td style="padding-left: 50px;padding-top: 50px">
						<img type="photo" src="uploaded/<?php echo $type."s/".$photo ;?>" alt="photo-demain-le-primtemps">
                                                <?php if($_SESSION['USERID']==$uid){ ?>
                                                <a href="form-profil-fc.php?uid=<?php echo $uid;?>&test=<?php echo $photo;?>">Modifier mon profil</a>
                                                <?php } ?>
					</td>
					<!-- nom  prenom-->
					<td style="padding-left: 50px;padding-top: 50px" width="300px">
						<h1 align="center">
						<?php
							echo ucwords(strtolower(html_entity_decode($nom))).' '.html_entity_decode($prenom);
						?>
						</h1>
						<p>
						
					</td>
				</tr>
				</table>
					<?php
				}
				$SQL="SELECT * FROM profil WHERE uid= '$uid' ";
				$result=mysql_query($SQL);
				$row=mysql_num_rows($result);
				$tab=mysql_fetch_array($result);
				
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
								?></tr><br><br><?php
							
							}
							
								if($commentairev1!='')
								{
								?><tr><td align="center"><p><br><?php
								echo $commentairev1;
								?><br></p></td><?php
								}
								
								if($commentairev2!='')
								{
								?><td align="center"><p><br><?php
								echo $commentairev2;
								?><br></p></td></tr><?php
								}
							//
				if($photo1!=''||$photo2!='')
							{
								?><tr><?php
								if($photo1!='')
								{
									?>
									<td align="center">
										<img src="/uploaded/<?php echo $type."s/".$photo1 ;?>" alt="photo1" width="20%" height="20%">
									</td>
									<?php
								}
								if($photo2!='')
								{
									?>
									<td align="center" style="padding-left: 15px">
										<img  src="/uploaded/<?php echo $type."s/".$photo2 ;?>" alt="photo2" width="20%" height="20%">
									</td>
									<?php
								}
								?></tr><?php
							}
							if($commentphoto1!='')
							{
								?><tr><td align="center"><p><br><?php
								echo $commentphoto1;
								?></p></td><?php
							}
								if($commentphoto2!='')
							{
								?><td align="center"><p><br><?php
								echo $commentphoto2;
								?></p></td></tr><?php
							}
							if($site!='')
							{
								?><tr><td align="center"><p><br><?php
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
						
							<a href="suppression-fc?uid=<?php echo $uid;?>" onclick="return confirm('Voulez-vous vraiment suprimer cette personne ?');">
							<b type="profil">Supprimer utilisateur de la BDD</b>
							</a>
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
									?>
									</a>
									<br><br>
							
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
<div class="fb-like" data-href="http://www.ecole-theatrale.fr/afficher-profil-fc.php?uid=<?php echo $uid; ?>" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>
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