<!DOCTYPE html >
<?php ini_set('display_errors','off'); ?>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
		<!--[if lt IE 9]>
		    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="style/style-l-ecole-theatrale-russe.css" rel="stylesheet" media="all" type="text/css">
		<link href="style/style-affiche-fiche.css" rel="stylesheet" media="all" type="text/css">
		<link href="style/style-nos-eleves.css" rel="stylesheet" media="all" type="text/css">
		</head>
	
<body>

<?php
	include(dirname(__FILE__)."/auth.php");
	include(dirname(__FILE__)."/header.php");
	
	include("db_config.php");
	$conn = mysql_connect($DB_host, $DB_login, $DB_pass);
	$db = mysql_select_db($DB_select, $conn);
	if (!$conn) { die('Erreur de connexion: ' . mysql_error()); }
	$comparedate=0;
	?>
	<section class="conteneur-superieur">
		<div class="conteneur">
		<h1>Liste des candidats</h1>
				
	<div id="conteneur-eleves">
	<?php

$SQL1="SELECT * FROM utilisateurs WHERE type='candidat' ORDER BY uid DESC";
	$result1=mysql_query($SQL1);
	$tab=mysql_fetch_array($result1);
	$uid=htmlspecialchars($tab['uid']);
	
	$SQL="SELECT * FROM utilisateurs WHERE uid='$uid'";
	$result=mysql_query($SQL);
	
	if(!$result1||mysql_num_rows($result1)==0)
	{
		?>
		
		<script>
		alert('PROBLEME BASE DE DONNEES.');
		</script>
		
		<?php
	}
	else
	{
		
		$i = 0;
		?><table align="center"><?php
		
			
			$SQL="SELECT * FROM utilisateurs WHERE type='candidat'";
			$result=mysql_query($SQL);
			
			
				while($row = mysql_fetch_array($result))
				{
					if ($i == 0)
					{
						?><tr type="eleve"><?php
					}
                                        $uid= htmlspecialchars($row['uid']); 
					$photo = htmlspecialchars($row['photo']); 
					$nom = htmlspecialchars($row['nom']); 
					$prenom = htmlspecialchars($row['prenom']); 
					//$eid= htmlspecialchars($row['eid']);
			
					?> 
						<!-- photo -->
						<td type="eleve">
							<?php
								if(!$photo||!file_exists("uploaded/candidats/" . $photo))
									$photo = "Pas-de-photo.jpg";
							?>
							<a href="afficher-profil-fc.php?uid=<?php echo $uid;?>">
								<img type="eleve" src="/uploaded/candidats/<?php echo $photo;?>" alt="photo-demain-le-primtemps">
							</a>
							<br>
				
				
						<!-- nom et prenom -->
							<a href="afficher-profil-fc.php?uid=<?php echo $uid;?>">
								<?php echo ucwords(strtolower(html_entity_decode($nom)))?><br><? echo html_entity_decode($prenom);?>
							</a>
						</td>
				
					<?php
					$i = $i + 1;
					if ($i == 4)// $i == nombre de photos par ligne
					{
						?></tr><tr><td><br></td></tr><?php
						$i = 0;
					}	
				}
		
		?></table><?php
	}
mysql_close($conn);

?>
</div>
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