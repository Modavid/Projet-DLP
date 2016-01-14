<?php
	include("auth.php");
	include("db_config.php");
?>
<! DOCTYPE html >
<html>
	<head>
		<title>Mon Profil</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
		<!--[if lt IE 9]>
		    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="style/style-l-ecole-theatrale-russe.css" rel="stylesheet" media="all" type="text/css">
		<link href="style/style-form.css" rel="stylesheet" media="all" type="text/css">
		<link href="style/style-nos-eleves.css" rel="stylesheet" media="all" type="text/css">
		<link href="style/style-form.css" rel="stylesheet" media="all" type="text/css">
		<link rel="icon" type="image/png" href="/Image/images-design/mafavicon-1.ico" />
		<link rel="icon" type="image/png" href="/Image/images-design/mafavicon-1.ico" />
	</head>
	
<body>
	<?php
	include(dirname(__FILE__)."/header.php");
	?>
	
	<div class="conteneur">
	
		<?php
		if ($_SESSION["AUTH"]==1 && isset($_GET['cid']))
		{
			
			$userid=$_SESSION['USERID'];
		}
		if($_SESSION["AUTH"]==2||$_SESSION["AUTH"]==1)
		{
			$conn          = mysql_connect($DB_host, $DB_login, $DB_pass);
			$db            = mysql_select_db($DB_select, $conn);

			if (!$conn) { die('Erreur de connexion: ' . mysql_error()); }
			$cid           =$_GET['cid'];
			$SQL1          ="SELECT * FROM membre WHERE cid='$cid' ";
			$result1       =mysql_query($SQL1);
			$row1          =mysql_fetch_array($result1);
			$fonction      =htmlspecialchars($row1['fonction']);
			$details       =htmlspecialchars($row1['details']);
			//$cid=$userid;
			
			$SQL           ="SELECT * FROM profil WHERE cid='$cid' ";
			$result        =mysql_query($SQL);
			$row           =mysql_fetch_array($result);
			$photo1        =htmlspecialchars($row['photo1']);
			$photo2        =htmlspecialchars($row['photo2']);
			$descriptif    =htmlspecialchars($row['descriptif']);
			$video1        =htmlspecialchars($row['video1']);
			$video2        =htmlspecialchars($row['video2']);
			$commentaire   =htmlspecialchars($row['comentaire']);
			$site          =htmlspecialchars($row['site']);
			$pid           =htmlspecialchars($row['pid']);
			$commentphoto1 =htmlspecialchars($row['commentphoto1']);
			$commentphoto2 =htmlspecialchars($row['commentphoto2']);
			$comment2      =htmlspecialchars($row['comment2']);
            $uid           =htmlspecialchars($row['uid']);
			
			if($row['photo'] != '')
			{
				$photo=htmlspecialchars($row['photo']);
			}
			else
			{
				$photo="Pas-de-photo.jpg";
			}
			
			$nom=htmlspecialchars($row['nom']);
			$prenom=htmlspecialchars($row['prenom']);
		?>
		<table>
			<tr>
				<td style="padding-left: 50px;padding-top: 50px">
					<img type="eleve" src="uploaded/<?php echo $_GET['test'] ;?>" alt="photo-demain-le-primtemps">
				</td>
				<td style="padding-left: 50px;padding-top: 50px" width="300px">
					<h1>
						Gestion de votre compte
					</h1>
					<h2>
						<a href="afficher-profil-pedago.php?cid=<?php echo $cid;?>">Voir profil</a>
					</h2>
				</td>
			</tr>
		</table>

		<br><br>

		<h2 style="padding-left: 30px">Identifiant</h2>
		
		<form method="post" action="identifiants-profils.php" class="formulaire">
			<input type="hidden" name="uid" value="<?php echo $userid;?>">
			
			<section>
				<span class="titre-ligne">Changer MDP</span>
				<input type="password" name="mdp">
			</section><br>
			
			<section>
				<span class="titre-ligne">E-mail</span>
				<input type="text" name="email">
			</section><br>
							
			<input type="submit" value="Envoyer">
		</form>
		
		<h2 style="padding-left: 30px">Modification du profil</h2>
		
		<form method="POST" action="profil-pedago.php" enctype="multipart/form-data" class="formulaire">   
			
			<input type="hidden" name="cid" value="<?php echo $cid;?>"> 
			
			<section>
				<span class="titre-ligne">Photo de profil</span>
				<input type="file" name="myfile">
			</section><br/>

			<section>
				<span class="titre-ligne">Fonction</span>
				<input type="text" name="fonction" value="<?php echo html_entity_decode($fonction);?>">
			</section><br>

			<section>
				<span class="titre-ligne">D&eacute;tails</span>
				<textarea name="descriptif" cols="40" rows="7" ><?php echo html_entity_decode($descriptif);?></textarea> 
			</section><br>
			
			<section>
				<span class="titre-ligne">Photo 1:</span>
				<input type="file" name="myfile1">
				<a href"supprimmer-infos?eid=<?php echo $eid;?>" onclick="return confirm('Voulez-vous vraiment suprimer cette photo?');"><img src="Image/images-design/suppr.png" alt"suppr"/></a>
			</section><br>

			<section>
				<span class="titre-ligne">Commentaire photo:</span>
				<textarea input type="text" name="commp1" rows="5" cols="40"><?php
					echo html_entity_decode($commentphoto1);
				?></textarea>
			</section><br>
			
			
			<section>
				<span class="titre-ligne">Photo 2:</span>
				<input type="file" name="myfile2">
				<a href"supprimmer-infos1.php" onclick="return confirm('Voulez-vous vraiment suprimer cette photo?');"><img src="Image/images-design/suppr.png" alt"suppr"/></a>
			</section><br>
			<?php
			if(!$photo1!=''||$photo2!='')
			{
				?><table align="center"><tr><?php
				if($photo1!='')
				{
					?>
						<td>
							<img type="photo" src="/uploaded/<?php echo $photo1 ;?>" alt="photo1">
						</td>
					<?php
				}
				?>
				<section>
					<span class="titre-ligne">Commentaire photo:</span>
					<textarea input type="text" name="commp2" rows="5" cols="40"><?php
						echo html_entity_decode($commentphoto2);
					?></textarea>
				</section><br>
				<?php
				if($photo2!='')
				{
					?>
						<td style="padding-left: 15px">
							<img type="photo" src="/uploaded/<?php echo $photo2;?>" alt="photo2">
						</td>
					<?php
				}
				?></tr><tr><td><br></td></tr></table><?php
			}
			?>
			
			<section>
				<span class="titre-ligne">Lien Vidéo 1:</span>
				<input type="text" name="video1" value="<?php
					echo $video1;
				?>">
			</section><br>

			<section>
				<span class="titre-ligne">Commentaire vidéo:</span>
				<textarea input type="text" name="commentaire" rows="5" cols="40"><?php
					echo html_entity_decode($commentaire);
				?></textarea>
			</section><br>
			
			<section>
				<span class="titre-ligne">Lien Vidéo 2:</span>
				<input type="text" name="video2" value="<?php
					echo $video2;
				?>">
			</section><br>

			<section>
				<span class="titre-ligne">Commentaire vidéo:</span>
				<textarea input type="text" name="commentaire2" rows="5" cols="40"><?php
					echo html_entity_decode($comment2);
				?></textarea>
			</section><br>
			
			
			<section>
				<span class="titre-ligne">Site:</span>
				<input type="text" name="site" value="<?php
					echo $site;
				?>">
			</section><br>
			
			
			<input type="submit" value="Envoyer">
		</form>
		
		
		<?php			
		}
		else
		{
			?><h2>
				Vous tentez d'acceder a une page qui vous est refusee.<br>
				<a href="index.php">Retour a l'accueil</a>
			</h2><?php
		}
		?>
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
</body>
</html>