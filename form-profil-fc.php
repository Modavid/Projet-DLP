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
		<link rel="icon" type="image/png" href="/Image/images-design/mafavicon-1.ico" />
	</head>
	
<body>
	<?php
	include(dirname(__FILE__)."/header.php");
	?>
	
	<div class="conteneur">
	
		<?php
		if ($_SESSION["AUTH"]==1 && isset($_GET['uid']))
		{
			$userid=$_GET['uid'];
		}
		else
		{
			$userid=$_GET['uid'];
		}
		

		if($_SESSION["AUTH"]==4||$_SESSION["AUTH"]==1)
		{
			$conn = mysql_connect($DB_host, $DB_login, $DB_pass);
			$db = mysql_select_db($DB_select, $conn);
			if (!$conn) { die('Erreur de connexion: ' . mysql_error()); }
			$SQ="SELECT * FROM utilisateurs WHERE uid='$userid' ";
			$resul=mysql_query($SQ);
			$ro=mysql_fetch_array($resul);
			
			$type=htmlspecialchars($ro['type']);
			
			$test=mysql_real_escape_string($_GET['test']);
			
			$SQL="SELECT * FROM profil WHERE uid='$userid' ";
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
					<img type="eleve" src="uploaded/<?php echo $type."s/".$_GET['test']  ;?>" alt="photo-demain-le-primtemps">
				</td>
				
				<td style="padding-left: 50px;padding-top: 50px" width="300px">
					<h1>
						Gestion de votre compte
					</h1>
					<h2>
						<a href="afficher-profil-fc.php?uid=<?php echo $userid;?>">Voir profil</a>
					</h2>
				
					
				</td>
				
			</tr>
			<?php  
			if ($numr > 0 && $ph != $test){
			?>
			
			<tr><td style="padding-left: 50px;padding-top: 50px">
			<a href="echanger-photo?eid=<?php echo $eid;?> photo=<?php echo $test;?>"><img src="Image/images-design/fleche-vers-droite-double-x-icone-7652-48.png" alt"ech"/></a>
				<img type="photo" src="uploaded/<?php echo $type."s/".$photo ;?>" alt="photo-demain-le-primtemps"> </td></tr>
			<?php } ?>
		</table>

		<br><br>
	
		<h2 style="padding-left: 30px">Modification du profil</h2>
	
		
		<form method="POST" action="profil-fc.php" enctype="multipart/form-data" class="formulaire">  
			
			<input type="hidden" name="eid" value="<?php echo $userid;?>"> 
			
			<section>
				<span class="titre-ligne">Photo de profil</span>
				<input type="file" name="myfile">
				
			</section><br/>
			
			<section>
				<span class="titre-ligne">Votre pr&eacute;sentation</span>
				<textarea input type="text" name="descriptif" rows="5" cols="40"><?php
					echo $descriptif;
				?></textarea>
			</section><br>
			
                        
			<section>
				<span class="titre-ligne">Votre site</span>
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
		
		
		
		<h2 style="padding-left: 30px">Identifiants</h2>
		
		<form method="post" action="identifiants-profil-fc.php" class="formulaire">
			<input type="hidden" name="uid" value="<?php echo $uid;?>">
			
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