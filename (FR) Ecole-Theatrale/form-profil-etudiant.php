<?php
	include("auth.php");
	include("db_config.php");
?>
<! DOCTYPE html >
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
		<!--[if lt IE 9]>
		    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="style/style-l-ecole-theatrale-russe.css" rel="stylesheet" media="all" type="text/css">
		<link href="style/style-form.css" rel="stylesheet" media="all" type="text/css">
		<link href="style/style-nos-eleves.css" rel="stylesheet" media="all" type="text/css">
		<link href="style/style-form.css" rel="stylesheet" media="all" type="text/css">
	</head>
	
<body>
	<?php
	include(dirname(__FILE__)."/header.php");
	?>
	
	<div class="conteneur">
	
		<?php
		if ($_SESSION["AUTH"]==1 && isset($_GET['eid']))
		{
			$userid=$_GET['eid'];
		}
		else
		{
			$userid=$_SESSION['USERID'];
		}
		

		if($_SESSION["AUTH"]==3||$_SESSION["AUTH"]==1)
		{
			$conn = mysql_connect($DB_host, $DB_login, $DB_pass);
			$db = mysql_select_db($DB_select, $conn);
			if (!$conn) { die('Erreur de connexion: ' . mysql_error()); }
			$SQ="SELECT * FROM photo WHERE eid='$userid' ";
			$resul=mysql_query($SQ);
			$ro=mysql_fetch_array($resul);
			$numr=mysql_num_rows($resul);
			$ph=htmlspecialchars($ro['nomph']);
			
			$test=mysql_real_escape_string($_GET['test']);
			
			$SQL="SELECT * FROM profil WHERE eid='$userid' ";
			$result=mysql_query($SQL);
			$row=mysql_fetch_array($result);
			$photo1=htmlspecialchars($row['photo1']);
			$photo2=htmlspecialchars($row['photo2']);
			$descriptif=htmlspecialchars($row['descriptif']);
			$video1=htmlspecialchars($row['video1']);
			$video2=htmlspecialchars($row['video2']);
			$commentaire=htmlspecialchars($row['commentaire']);
			$site=htmlspecialchars($row['site']);
			$pid=htmlspecialchars($row['pid']);
			$commentphoto1=htmlspecialchars($row['commentphoto1']);
			$commentphoto2=htmlspecialchars($row['commentphoto2']);
			$comment2=htmlspecialchars($row['comment2']);
			$uid=htmlspecialchars($row['uid']);
			$eid=htmlspecialchars($row['eid']);
			
			
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
					<img type="eleve" src="uploaded/<?php echo $_GET['test']  ;?>" alt="photo-demain-le-primtemps">
				</td>
				
				<td style="padding-left: 50px;padding-top: 50px" width="300px">
					<h1>
						Gestion de votre compte
					</h1>
					<h2>
						<a href="afficher-profil-eleve.php?eid=<?php echo $userid;?>">Voir profil</a>
					</h2>
				
					
				</td>
				
			</tr>
			<?php  
			if ($numr > 0 && $ph != $test){
			?>
			
			<tr><td style="padding-left: 50px;padding-top: 50px">
			<a href="echanger-photo?eid=<?php echo $eid;?> photo=<?php echo $test;?>"><img src="images-design/fleche-vers-droite-double-x-icone-7652-48.png" alt"ech"/></a>
				<img type="photo" src="uploaded/<?php echo $ph ;?>" alt="photo-demain-le-primtemps"> </td></tr>
			<?php } ?>
		</table>

		<br><br>
	
		<h2 style="padding-left: 30px">Modifier le profil</h2>
	
		
		
		<form method="POST" action="profil-etudiant.php" enctype="multipart/form-data" class="formulaire">  
			
			<input type="hidden" name="eid" value="<?php echo $userid;?>"> 
			
			<section>
				<span class="titre-ligne">Photo de profil</span>
				<input type="file" name="myfile">
				
			</section><br/>
			
			<section>
				<span class="titre-ligne">Présentation</span>
				<textarea input type="text" name="descriptif" rows="5" cols="40"><?php
					echo $descriptif;
				?></textarea>
			</section><br>
			
			<section>
				<span class="titre-ligne">Photo1:</span>
				 <input type="file" name="myfile1">
				
                                 <a href="supprimer-photo-eleve.php?eid=<?php echo $eid;?>&photo=<?php echo $photo1;?>&type=photo1" onclick="return confirm('Voulez-vous vraiment supprimer cette photo?');"><img src="images-design/suppr.png" alt"suppr"/></a>
			</section><br>
			
			<section>
				<span class="titre-ligne">Commentaire photo 1</span>
				<textarea input type="text" name="commp1" rows="5" cols="40"><?php
					echo $commentphoto1;
				?></textarea>
			</section><br>
			<section>
				<span class="titre-ligne">Photo2:</span>
				<input type="file" name="myfile2" >
                                <a href="supprimer-photo-eleve.php?eid=<?php echo $eid;?>&photo=<?php echo $photo2;?>&type=photo2" onclick="return confirm('Voulez-vous vraiment supprimer cette photo?');"><img src="images-design/suppr.png" alt"suppr"/></a>
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
							<span class="titre-ligne">Commentaire photo 2</span>
							<textarea input type="text" name="commp2" rows="5" cols="40"><?php
								echo $commentphoto2;
							?></textarea>
						</section><br>
				<?php
				if($photo2!='')
				{
					?>
					
					
					
						<td style="padding-left: 15px">
							<img type="photo" src="/uploaded/<?php echo $photo2 ;?>" alt="photo2">
						</td>
					<?php
				}
				?></tr><tr><td><br></td></tr></table><?php
			}
			?>
			
			<section>
				<span class="titre-ligne">Lien YouTube1</span>
				<input type="text" name="video1" value="<?php
					echo $video1;
				?>">
			</section><br>
			
			
			<section>
				<span class="titre-ligne">Commentaire sur la video 1</span>
				<textarea input type="text" name="commentaire" rows="5" cols="40"><?php
					echo $commentaire;
				?></textarea>
			</section><br>
			
			<section>
				<span class="titre-ligne">Lien YouTube2</span>
				<input type="text" name="video2" value="<?php
					echo $video2;
				?>">
				
			</section><br>
			
				<section>
				<span class="titre-ligne">Commentaire sur la video 2</span>
				<textarea input type="text" name="commentaire2" rows="5" cols="40"><?php
					echo $comment2;
				?></textarea>
			</section><br>
			
			
			
			<section>
				<span class="titre-ligne">Site</span>
				<input type="text" name="site" value="<?php
					echo $site;
				?>">
			</section>
				<section class="ligne" >
				<input type="hidden" name="eid" value="<?php
				echo ($eid) ?>"  >
			</section>
			<input type="submit" value="Envoyer">
		</form>
		
		<?php
		if ($_SESSION["AUTH"]==3)
		{
			?>
			<h2 style="padding-left: 30px">Ajouter un témoignage</h2>
			
			<form method="post" action="ajouter-temoignages.php" id="temoignage" class="formulaire">
				<input type="hidden" name="eid" value="<?php echo $userid;?>">
			
				<section>
					<span class="titre-ligne">Titre</span>
					<textarea input type="text" name="titre"required rows="1" cols="40"></textarea>
				</section><br>
				
				<section>
					<span class="titre-ligne">Texte</span>
					<textarea type="text" name="commentaire"required rows="15" cols="40"></textarea>
				</section><br>
				
				<input type="submit" value="Envoyer">
			</form>
			<?php
		}
		?>
		
		<h2 style="padding-left: 30px">Identifiants</h2>
		
		<form method="post" action="identifiants-profil.php" class="formulaire">
			<input type="hidden" name="pid" value="<?php echo $pid;?>">
			
			<section>
				<span class="titre-ligne">Changer MDP</span>
				<input type="password" name="mdp">
			</section><br>
			
			<section>
				<span class="titre-ligne">email</span>
				<input type="text" name="email">
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