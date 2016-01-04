<!DOCTYPE html >
<html>
	<head>
		<title>Partenaires</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
		<!--[if lt IE 9]>
		    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="style/style-l-ecole-theatrale-russe.css" rel="stylesheet" media="all" type="text/css">
		<link rel="icon" type="image/png" href="/images-design/mafavicon-1.ico" />
	</head>
	
<body>
	<?php
		include(dirname(__FILE__)."/header.php");
	?>
	<section class="conteneur-superieur">
		<div class="conteneur">
			<?php
			include('auth.php');
			
			include('db_config.php');
			
				$conn = mysql_connect($DB_host, $DB_login, $DB_pass);
				$db = mysql_select_db($DB_select, $conn);
				if (!$conn) { die('Erreur de connexion: ' . mysql_error()); }
				
				mysql_set_charset('UTF8'); 
				$SQL	= "SELECT * FROM partenaire WHERE type = 'officiel'";
				$result	= mysql_query($SQL);
				$count 	= mysql_num_rows($result);
				
				if(!$result|| $count==0)
				{
					?>
						<p>
							Aucun partenaire - Officiel
							<a href="index.php">Retour à l'accueil</a>
						</p>
					<?php
				}
				else 
				{	
					?>
						<div class="bloc-logo-partenaires">
						<h1>Partenaires Officiels</h1>
					<?php
					
					while($row=mysql_fetch_array($result))
					{
						$nom=htmlspecialchars($row['nom']);
						$url=htmlspecialchars($row['url']);
						$photo=htmlspecialchars($row['photo']);
						$type=htmlspecialchars($row['type']);
						
						?>
						
						<div class="conteneur-logo-partenaires">
						<a href="<?php echo $url; ?>" target="_blank">
						<img class="imagelogo" src="uploaded/partenaire/<?php echo $photo; ?>" alt="logo" />
						<p><?php echo $nom; ?></p></a></div>
						<?php
					}
					?></div><?php
				}
				
				$SQL	= "SELECT * FROM partenaire WHERE type = 'culturel'";
				$result	= mysql_query($SQL);
				$count	= mysql_num_rows($result);
				
				if(!$result|| $count==0)
				{
					?>
						<p>
							Aucun partenaire - Culturel
							<a href="index.php">Retour à l'accueil</a>
						</p>
					<?php
				}
				else 
				{
				
					?>
						<div class="bloc-logo-partenaires">
						<h1>Partenaires Culturels</h1>
					<?php
					$i = 0;
					while($row=mysql_fetch_array($result))
					{
						$nom=htmlspecialchars($row['nom']);
						$url=htmlspecialchars($row['url']);
						$photo=htmlspecialchars($row['photo']);
						$type=htmlspecialchars($row['type']);
						
						?>
						
						<div class="conteneur-logo-partenaires">
						<a href="<?php echo $url; ?>" target="_blank">
						<img class="imagelogo" src="uploaded/partenaire/<?php echo $photo; ?>" alt="logo" />
						<p><?php echo $nom; ?></p></a></div>
						<?php
						$i++;
					}
					?></div><?php
				}
			?>
			
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
