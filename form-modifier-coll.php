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
		if ($_SESSION["AUTH"]==1 && isset($_GET['cid']))
		{
			
			$userid=$_SESSION['USERID'];
		}
		if($_SESSION["AUTH"]==2||$_SESSION["AUTH"]==1)
		{
			$conn = mysql_connect($DB_host, $DB_login, $DB_pass);
			$db = mysql_select_db($DB_select, $conn);
			if (!$conn) { die('Erreur de connexion: ' . mysql_error()); }
			$cid=$_GET['cid'];
			$SQL1="SELECT * FROM collectif WHERE cid='$cid' ";
			$result1=mysql_query($SQL1);
			$row1=mysql_fetch_array($result1);
			$nom=htmlspecialchars($row1['nom']);
			$prenom=htmlspecialchars($row1['prenom']);
			$fonction=htmlspecialchars($row1['fonction']);
			$details=htmlspecialchars($row1['details']);
				if($row['photo'] != '')
			{
				$photo=htmlspecialchars($row1['photo']);
			}
			else
			{
				$photo="Pas-de-photo.jpg";
			}
			
			$nom=htmlspecialchars($row1['nom']);
			$prenom=htmlspecialchars($row1['prenom']);
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
						<a href="afficher-collectif.php?cid=<?php echo $cid;?>">Voir profil</a>
					</h2>
				</td>
			</tr>
		</table>
		<br><br>
		<h2 style="padding-left: 30px">Modifier le profil</h2>
		<form method="POST" action="profil-collectif.php" enctype="multipart/form-data" class="formulaire">   
			
			<input type="hidden" name="cid" value="<?php echo $cid;?>"> 
			
			<section>
				<span class="titre-ligne">Photo de profil</span>
				<input type="file" name="myfile">
			</section><br/>
			<section>
				<span class="titre-ligne">Nom</span>
				<input type="text" name="nom" value="<?php echo html_entity_decode($nom);?>">
			</section><br>
			<section>
				<span class="titre-ligne">Prenom</span>
				<input type="text" name="prenom" value="<?php echo html_entity_decode($prenom);?>">
			</section><br>
			<section>
				<span class="titre-ligne">Fonction</span>
				<input type="text" name="fonction" value="<?php echo html_entity_decode($fonction);?>">
			</section><br>
			<section>
				<span class="titre-ligne">Details</span>
				<textarea name="details" cols="40" rows="7" required ><?php echo html_entity_decode($details);?></textarea> 
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
			