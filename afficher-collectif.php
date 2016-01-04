<!DOCTYPE html >
<html>
	<head>
		<title>Collectif</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
		<!--[if lt IE 9]>
		    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="style/style-l-ecole-theatrale-russe.css" rel="stylesheet" media="all" type="text/css">
		<link href="style/style-affiche-fiche.css" rel="stylesheet" media="all" type="text/css">
		<link href="style/style-nos-eleves.css" rel="stylesheet" media="all" type="text/css">
		<link rel="icon" type="image/png" href="/images-design/mafavicon-1.ico" />

		<link rel="image_src" href="<?php echo $photo; ?>">
		
		<title>profil collectif</title>
		<meta property="og:title" content="profil"/>
		<meta property="og:type" content="website"/>
		<meta property="og:url" content="http://www.ecole-theatrale.fr/afficher-profil-pedago?cid=<?php echo $cid ?>"/>

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
			$nom=htmlspecialchars($row['nom']);
			$prenom=htmlspecialchars($row['prenom']);
			$photo=htmlspecialchars($row['photo']);
			$details=htmlspecialchars($row['details']);
			$fonction=htmlspecialchars($row["fonction"]);
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
						
								
								
							if($fonction != "")
							{
									?><h2><?php
									echo ucfirst(strtolower(html_entity_decode($fonction)));
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
						<a href="suppression-coll?cid=<?php echo $cid;?>" onclick="return confirm('Voulez-vous vraiment suprimer cette personne ?');">
							<b type="profil">Supprimer collectif de la BDD</b>
						</a>
						
						<br>
						<br>
						<a href="form-modifier-coll?cid=<?php echo $cid;?>&test=<?php echo $photo;?>">
							<b type="profil">Modifier le profil</b>
						</a>
						<br>
						<br>
						</div>
						<?php
					
						
							
	}}}
	
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
